@extends('layout.admin.app')
@section('content')
    <div class="content-sidebar">
        <div class="d-flex justify-content-between h-100">
            @include('include.admin.sidebar')
            <div class="container-fluid">
                <div class="row p-3 g-3">
                    <div class="card col-md-12 shadow-sm border-0">
                        <ul class="nav nav-tabs pt-2 px-2">
                            <li class="nav-item">
                                <a class="nav-link @if ($type==='customer' || !$type) active @endif"
                                    href="{{ route('admin.user', ['type' => 'customer']) }}">
                                    Pelanggan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($type==='laundry' ) active @endif" href="{{ route('admin.user', ['type' => 'laundry']) }}">Penatu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($type==='courier' ) active @endif" href="{{ route('admin.user', ['type' => 'courier']) }}">Kurir</a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <h4 class="mb-4">
                                @if ($type === 'customer' || $type === null)
                                    Pelanggan
                                @elseif ($type==='laundry')
                                    Penatu
                                @elseif ($type==='courier')
                                    Kurir
                                @endif
                            </h4>
                            @isset($search)
                                <h5>Mencari: {{ $search }}</h5>
                            @endisset
                            <div class="my-3">
                                <div class="p-1 bg-light rounded rounded-pill shadow-sm">
                                    <form action="{{ route('admin.user') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" name="search" placeholder="Search"
                                                aria-describedby="button-addon1"
                                                class="form-control border-0 rounded-pill bg-light">
                                            <div class="input-group-append">
                                                <button id="button-addon1" type="submit"
                                                    class="btn btn-link text-primary rounded-pill"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                            <input type="hidden" name="type" value="{{ $type ?? 'customer' }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row text-center g-3">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow">
                                        <table class="table table-borderless">
                                            <thead class="table-primary">
                                                <tr class="align-middle">
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Total Transaksi</th>
                                                    <th>Email</th>
                                                    @if ($type !== 'courier')
                                                        <th>Alamat</th>
                                                    @else
                                                        <th>Plat Kendaraan</th>
                                                    @endif
                                                    <th>Telepon</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>
                                                            <small>
                                                                {{ $user->id }}
                                                            </small>
                                                        </td>
                                                        <td>
                                                            {{ $user->name }}
                                                        </td>
                                                        <td>
                                                            {{ $user->orders->count() }}
                                                        </td>
                                                        <td>
                                                            {{ $user->email }}
                                                        </td>
                                                        @if ($type !== 'courier')
                                                            <td data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ $user->address->compact() }}">
                                                                {{ Str::limit($user->address->compact(), 30) }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                {{ $user->license_plate }}
                                                            </td>
                                                        @endif
                                                        <td>
                                                            {{ $user->phone_number }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.user.edit', ['id' => $user->id, 'role' => $type]) }}"
                                                                class="badge bg-primary"
                                                                style="text-decoration: none">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <nav class="mx-3" aria-label="Page navigation">
                                            {{ $users->links() }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
