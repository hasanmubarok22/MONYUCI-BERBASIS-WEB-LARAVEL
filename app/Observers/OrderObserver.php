<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Order;
use App\Notifications\OrderNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as Notifications;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $order->user->notify(new OrderNotification([
            'header' => 'Pesanan Telah Dibuat!',
            'message' => 'Pesanan ' . $order->id . ' telah dibuat, siapkan cucianmu sebelum kurir ' . $order->courier->name . ' tiba.',
            'link' => route('order'),
        ]));
        $order->laundry->notify(new OrderNotification([
            'header' => 'Pesanan Telah Dibuat!',
            'message' => 'Pesanan ' . $order->id . ' telah dibuat oleh ' . $order->user->name . '. Tunggu konfirmasi selanjutnya untuk update pesanan ini.',
            'link' => route('laundry.order'),
        ]));
        Notifications::send(Admin::all(), new OrderNotification([
            'header' => 'Pesanan Telah Dibuat!',
            'message' => 'Pesanan ' . $order->id . ' telah dibuat oleh ' . $order->user->name . ' kepada ' . $order->laundry->name . ' dengan kurir ' . $order->courier->name . '.',
            'link' => route('admin.orders'),
        ]));
        $order->courier->notify(new OrderNotification([
            'header' => 'Pesanan Telah Dibuat!',
            'message' => 'Pesanan ' . $order->id . ' telah dibuat oleh ' . $order->user->name . ' kepada ' . $order->laundry->name . '.',
            'link' => route('courier.index'),
        ]));
    }

    public function updating(Order $order)
    {
        if ($order->status === 'Proses Pengiriman') {
            $order->pickedup_at = now();
        } else if ($order->status === 'Diterima Penatu') {
            $order->received_at = now();
        } else if ($order->status === 'Diterima Pelanggan') {
            $order->finished_at = now();
        }
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if ($order->status === 'Proses Pengiriman') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Telah Dikirim!',
                'message' => 'Pesanan ' . $order->id . ' telah dikirim oleh ' . $order->courier->name . ', tunggu konfirmasi pesanan kamu tiba',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Telah Dikirim!',
                'message' => 'Pesanan ' . $order->id . ' telah dikirim oleh ' . $order->courier->name . ', tunggu pesanan kamu tiba',
                'link' => route('laundry.order'),
            ]));
            Notifications::send(Admin::all(), new OrderNotification([
                'header' => 'Pesanan Telah Dikirim!',
                'message' => 'Pesanan ' . $order->id . ' telah dikirim oleh ' . $order->courier->name . '.',
                'link' => route('admin.orders'),
            ]));
            $order->courier->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima!',
                'message' => 'Pesanan ' . $order->id . ' telah berada padamu. Segera kirim pesananmu kepada ' . $order->laundry->name . '.',
                'link' => route('courier.index'),
            ]));
        } else if ($order->status === 'Diterima Penatu') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima Penatu!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->laundry->name . ', tunggu konfirmasi pesanan kamu selanjutnya.',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Telah Datang!',
                'message' => 'Pesanan ' . $order->id . ' telah sampai, lanjutkan pada proses pencucian',
                'link' => route('laundry.order'),
            ]));
            Notifications::send(Admin::all(), new OrderNotification([
                'header' => 'Pesanan Telah Diterima Penatu!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->laundry->name . '.',
                'link' => route('admin.orders'),
            ]));
            $order->courier->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima Penatu!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->laundry->name . ', tunggu konfirmasi pesanan kamu selanjutnya untuk pengembalian.',
                'link' => route('courier.index'),
            ]));
        } else if ($order->status === 'Proses Pencucian') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Dalam Proses Pencucian!',
                'message' => 'Pesanan ' . $order->id . ' telah mulai diproses oleh ' . $order->laundry->name . ', tunggu konfirmasi pesanan kamu selanjutnya.',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Dalam Proses Pencucian!',
                'message' => 'Pesanan ' . $order->id . ' telah dalam proses pencucian. Segera konfirmasi jika pesanan sudah selesai dicuci.',
                'link' => route('laundry.order'),
            ]));
        } else if ($order->status === 'Selesai Dicuci') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Telah Selesai Dicuci!',
                'message' => 'Pesanan ' . $order->id . ' telah selesai dicuci oleh ' . $order->laundry->name . ', tunggu konfirmasi pesanan kamu selanjutnya.',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Telah Datang!',
                'message' => 'Pesanan ' . $order->id . ' telah selesai dicuci, tunggu kurir datang untuk mengambil pesanan',
                'link' => route('laundry.order'),
            ]));
            $order->courier->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima Penatu!',
                'message' => 'Pesanan ' . $order->id . ' telah selesai dicuci oleh ' . $order->laundry->name . ', segera ambil pesanan pada penatu untuk proses pengembalian.',
                'link' => route('courier.index'),
            ]));
        } else if ($order->status === 'Proses Pengembalian') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Dalam Perjalanan Kembali!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->courier->name . ', tunggu pesanan kamu sampai.',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Dalam Perjalanan Kembali!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->courier->name . '.',
                'link' => route('laundry.order'),
            ]));
            Notifications::send(Admin::all(), new OrderNotification([
                'header' => 'Pesanan Dalam Perjalanan Kembali!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->courier->name . '.',
                'link' => route('admin.orders'),
            ]));
            $order->courier->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima, segera kirim pesananmu kepada ' . $order->user->name . '.',
                'link' => route('courier.index'),
            ]));
        } else if ($order->status === 'Diterima Pelanggan') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima!',
                'message' => 'Pesanan ' . $order->id . ' telah kamu terima.',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->user->name . '.',
                'link' => route('laundry.order'),
            ]));
            Notifications::send(Admin::all(), new OrderNotification([
                'header' => 'Pesanan Telah Diterima!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->user->name . '.',
                'link' => route('admin.orders'),
            ]));
            $order->courier->notify(new OrderNotification([
                'header' => 'Pesanan Telah Diterima!',
                'message' => 'Pesanan ' . $order->id . ' telah diterima oleh ' . $order->user->name . '.',
                'link' => route('courier.index'),
            ]));
        } else if ($order->status === 'Batal') {
            $order->user->notify(new OrderNotification([
                'header' => 'Pesanan Telah Dibatalkan!',
                'message' => 'Pesanan ' . $order->id . ' telah dibatalkan.',
                'link' => route('order'),
            ]));
            $order->laundry->notify(new OrderNotification([
                'header' => 'Pesanan Telah Dibatalkan!',
                'message' => 'Pesanan ' . $order->id . ' telah dibatalkan.',
                'link' => route('laundry.order'),
            ]));
            Notifications::send(Admin::all(), new OrderNotification([
                'header' => 'Pesanan Telah Dibatalkan!',
                'message' => 'Pesanan ' . $order->id . ' telah dibatalkan.',
                'link' => route('admin.orders'),
            ]));
            $order->courier->notify(new OrderNotification([
                'header' => 'Pesanan Telah Dibatalkan!',
                'message' => 'Pesanan ' . $order->id . ' telah dibatalkan.',
                'link' => route('courier.index'),
            ]));
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
