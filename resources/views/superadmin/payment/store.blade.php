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
                            <h4 class="card-title">Kassa kirim-Chiqim - {{ $store->name }}</h4>
                            <a href="{{ route('payment.index') }}" class="btn btn-outline-primary waves-effect">Ortga <i data-feather='arrow-left'></i></a>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Summa</th>
                                        <th>Mas'ul</th>
                                        <th>Kirim/Chiqim</th>
                                        <th>To'lov turi</th>
                                        <th>Kommentariya</th>
                                        <th>Sana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ number_format($payment->sum) }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>
                                            @if($payment->type == 'income')
                                                Kirim <i data-feather='arrow-down'></i> 
                                            @elseif($payment->type == 'outcome')
                                                Chiqim <i data-feather='arrow-up'></i> 
                                            @endif
                                        </td>
                                        <td> 
                                            @if($payment->payment_type == 'cash')
                                                Naqd
                                            @elseif($payment->payment_type == 'card')
                                                Plastik
                                            @elseif($payment->payment_type == 'transfer')
                                                O'tkazma
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($payment->comment, 20) }}</td>
                                        <td>{{ $payment->created_at->format('d.m.Y H:m') }}</td>
                                    </tr>
                                    @endforeach
                                 <!--    <tr>
                                     <td>Kirim:</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td> 
                                     <td></td>         
                                 </tr> -->
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
