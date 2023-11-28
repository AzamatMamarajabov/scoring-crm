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
                                <h4 class="card-title">Maxsulot haqida</h4>
                            </div>
                            <div class="col-12 text-right">
                                <a class="btn btn-outline-primary waves-effect mb-1" href="{{ route('products.index') }}">Bosh sahifa</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <td>{{ $product->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomi</th>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Rasmi</th>
                                            <td>
                                                <img width="50" height="30"
                                                    src="{{ asset('/uploads/' . $product->image) }}"
                                                    alt="{{ $product->name }} img">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Narxi</th>
                                            <td>{{ $product->price }}</td>
                                        </tr>
                                        <tr>

                                            <th>Shtrix code</th>
                                            <td>{{ $product->shtrix_code }}</td>
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
