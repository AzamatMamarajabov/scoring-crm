@extends('admin.layout.layout')
@section('title', "Korxonaning Umumiy Xolati")

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
                            <h4 class="card-title">Korxonaning Umumiy Xolati</h4>
                            <p>{{ date('d.m.Y H:i') }} holatiga ko'ra</p>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kassadagi Pullar</th>
                                        <th class="text-center">{{ number_format($totalSum) }} so'm</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Click</td>
                                        <td>{{ number_format($transferTotal) }} so'm</td>
                                    </tr>
                                    <tr>
                                        <td>Plastik</td>
                                        <td>{{ number_format($cardTotal) }} so'm</td>
                                    </tr>
                                    <tr>
                                        <td>Naqd</td>
                                        <td>{{ number_format($cashTotal) }} so'm</td>
                                    </tr>

                                    <tr>
                                        <th class="text-center">Jami Xodimlar soni</th>
                                        <th class="text-center">{{ $workerCount }}ta</th>
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
