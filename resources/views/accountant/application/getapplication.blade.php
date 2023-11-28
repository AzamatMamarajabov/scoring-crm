@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">


            <div class="content-body">
                <!-- Tabs with Icon starts -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Description lists horizontal -->
                            <div class="row">
                                @foreach ($applications as $application)
                                    <div class="col-sm-4 col-md-4">
                                        <div class="card"
                                            style="box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1) !important">
                                            <div class="card-body pb-0">
                                                <dl class="row">
                                                    <dt class="col-sm-4">№ 1</dt>
                                                    <dd class="col-sm-8">
                                                        @if ($application->status == "new")
                                                        <div class="badge badge-light-primary">
                                                                Yangi
                                                        </div>
                                                        @endif
                                                        @if ($application->status == 2)
                                                        <div class="badge badge-light-success">
                                                                Tasdiqlangan
                                                        </div>
                                                        @endif
                                                        @if ($application->status == 1)
                                                        <div class="badge badge-light-danger">
                                                                Rad Etilgan
                                                        </div>
                                                        @endif
                                                    </dd>
                                                </dl>
                                                <dl class="row">
                                                    <dt class="col-sm-4">Miqdori</dt>
                                                    <dd class="col-sm-8">{{ number_format($application->sum) }} so'm</dd>
                                                </dl>
                                                <dl class="row">
                                                    <dt class="col-sm-4">Yaratilgan sana</dt>
                                                    <dd class="col-sm-8">{{$application->created_at}}</dd>
                                                </dl>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-truncate">Ariza turi</dt>
                                                    <dd class="col-sm-8">
                                                        Qisman Ariza
                                                    </dd>
                                                </dl>
                                                <hr>
                                                <dl class="row justify-content-end">
                                                    <dl class="text-right">
                                                        <a href="{{ route('accountant.checkapplicationid', $application->id) }}" class="btn btn-primary mr-2 btn-sm">Batafsil</a>
                                                    </dl>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <!--/ Description lists horizontal-->
                        </div>
                    </div>
                </div>
                <!-- Tabs with Icon ends -->


            </div>

        </div>
    </div>



@endsection
