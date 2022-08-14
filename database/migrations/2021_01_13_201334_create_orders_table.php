<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('laundry_id')->references('id')->on('laundries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('courier_id')->nullable()->references('id')->on('couriers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_cost')->default(0);
            $table->string('status');
            $table->text('notes')->nullable();
            $table->dateTime('pickedup_at');
            $table->dateTime('finished_at')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->timestamps();
        });

        Schema::create('order_service', function (Blueprint $table) {
            $table->primary(['order_id', 'service_id']);
            $table->foreignUuid('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
