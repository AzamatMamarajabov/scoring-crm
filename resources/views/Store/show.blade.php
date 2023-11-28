@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">


            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4 class="card-title">Do'kon haqida</h4>
                            </div>
                            <div class="col-12 text-right">
                                <a href="{{ route('stores.index') }}">Bosh sahifa</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <td>{{ $store->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomi</th>
                                            <td>{{ $store->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefon raqami</th>
                                            <td>{{ $store->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Login</th>
                                            <td>{{ $store->address }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>


@endsection
