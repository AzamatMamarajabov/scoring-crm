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
                                <h4 class="card-title">Yakunlangan Arizalar</h4>
                            </div>
                            @include('admin.layout.message')

                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Mijoz</th>
                                        <th>Raqami</th>
                                        <th>Manzili</th>
                                        <th>Ariza summasi</th>
                                        <th>Ko'rish</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($application as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->costumer->costumer_name}}</td>
                                            <td>{{ $item->costumer->phone}}</td>
                                            <td>{{ $item->costumer->register_address}}</td>
                                            <td>{{ number_format($item->sum)}}</td>

                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" href="{{ route('noactiveapplicationshow', $item['id']) }}">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

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
