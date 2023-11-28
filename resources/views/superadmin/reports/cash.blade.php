@extends('admin.layout.layout')
@section('title', "Kassalardagi pul qoldig'i")

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
                            <h4 class="card-title">Kassalardagi pul qoldig'i</h4>
                            <p>{{ date('d.m.Y H:i') }} holatiga ko'ra</p>
                        </div>


                        <div class="table-responsive">
                            <table class="table text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">№</th>
                                        <th class="text-center">Kassa Nomi</th>
                                        <th class="text-center">Summa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cashes as $cash)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cash->name }}</td>
                                        <td>{{ number_format($cash->totalCashSum) }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td >Total:</td>
                                    <td >Kassalar:</td>
                                    <td>{{ number_format($totalSum) }}</td>
                                </tr>







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
