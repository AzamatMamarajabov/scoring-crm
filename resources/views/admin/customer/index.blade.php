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
                            <h4 class="card-title">Mijozlar</h4>
                        </div>
                        @include('admin.layout.message')
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-primary waves-effect mb-2" href="{{route('customer.create')}}">Qo'shish</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Mijoz</th>
                                        <th>Pasport raqami</th>
                                        <th>Manzili</th>
                                        <th>Tug'ilgan sanasi</th>
                                        <th>Ko'rish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    @if($customer->store_id == Auth::user()->store_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->passport_surname}}</td>
                                        <td>{{ $customer->passport_number}}</td>
                                        <td>{{ $customer->citizenship}}</td>
                                        <td>{{ $customer->costumer_birthday }}</td>

                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-primary btn-sm" href="{{ route('customer.show', $customer['id']) }}">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
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
