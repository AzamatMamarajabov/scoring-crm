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
                                <a href="{{ route('warehouse.index') }}">Bosh sahifa</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <td>{{ $warehouse->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomi</th>
                                            <td>{{ $warehouse->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Rasmi</th>
                                            <td>
                                                <img width="50" height="30"
                                                    src="{{ asset('/uploads/' . $warehouse->image) }}"
                                                    alt="{{ $warehouse->name }} img">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kirim</th>
                                            <td>{{ $warehouse->number }}</td>
                                        </tr>
                                        <tr>

                                            <th>Chiqim</th>
                                            <td>{{ $warehouse->sold }}</td>
                                        </tr>
                                        <tr>
                                            <th>Qoldiq</th>
                                            <td>{{ $warehouse->residual }}</td>
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
