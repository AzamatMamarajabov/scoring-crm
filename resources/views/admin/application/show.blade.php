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
                                <h4 class="card-title">Ariza haqida batafsil ma'lumot</h4>
                            </div>
                            <div class="col-12 text-right">
                                <a class="btn btn-outline-primary waves-effect mb-2" href="{{route('application.index')}}">Bosh sahifa</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                        <tr>
                                            <th>Xodimni ismni</th>
                                            <td>
                                                <a href="{{ route('workers.show', $application->worker_id) }}">
                                                    {{ $application->worker->name }}</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Mijoz ismni</th>
                                            <td>
                                                <a href="{{ route('customer.show', $application->costumer_id) }}">
                                                    {{ $application->costumer->costumer_name }}</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Tanlagan mahsulotlari</th>
                                            <td>
                                                @foreach($productModels  as $item)
                                                {{ $loop->iteration . '. ' .$item[0]->name}}
                                            @endforeach
                                            </td>
                                        </tr>




                                        <tr>
                                            <th>Summa</th>
                                            <td>{{ $application->sum }}</td>
                                        </tr>

                                        <tr>
                                            <th>Oy</th>
                                            <td>{{ $application->month }}</td>
                                        </tr>

                                        <tr>
                                            <th>Foiz</th>
                                            <td>{{ $application->percentage }}</td>
                                        </tr>

                                        <tr>
                                            <th>To'lov sanasi</th>
                                            <td>{{ $application->payment_date }}</td>
                                        </tr>

                                        <tr>
                                            <th>Birinchi to'lovi</th>
                                            <td>{{ $application->first_payment }}</td>
                                        </tr>

                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $application->status }}</td>
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
