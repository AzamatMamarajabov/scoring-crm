@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

 <!-- BEGIN: Content-->
 <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">
           
        <section id="histories">
            <div class="row" id="basic-table">
                <div class="col-12">
                    @include('admin.layout.message')
                </div>
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Savdo - {{ $store->name }}</h4>
                            <a href="{{ route('sell.index') }}" class="btn btn-outline-primary waves-effect">Ortga <i data-feather='arrow-left'></i></a>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Summa</th>
                                        <th>Mas'ul</th>
                                        <th>Mahsulot</th>
                                        <th>To'lov turi</th>
                                        <th>Sana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sells as $sell)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ number_format($sell->sum) }}</td>
                                        <td>{{ $sell->user->name }}</td>
                                        <td>{{ $sell->product->name }}</td>
                                        <td> 
                                            @if($sell->payment_type == 'cash')
                                                Naqd
                                            @elseif($sell->payment_type == 'card')
                                                Plastik
                                            @elseif($sell->payment_type == 'transfer')
                                                O'tkazma
                                            @endif
                                        </td>
                                        <td>{{ $sell->created_at->format('d.m.Y H:m') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
