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
                    <div class="content-body">
                        <section class="app-user-view">
                            <!-- User Card & Plan Starts -->
                            <div class="row">
                                <!-- User Card starts-->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card user-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                    <div class="user-avatar-section">
                                                        <div class="d-flex justify-content-start">
                                                            <img class="img-fluid rounded" src="{{ asset('nofoto.jpg') }}"
                                                                height="104" width="104" alt="User avatar" />
                                                            <div class="d-flex flex-column ml-1">
                                                                <div class="user-info mb-1">
                                                                    <h4 class="mb-0">
                                                                        {{ $application->costumer->costumer_name }}</h4>
                                                                    <span
                                                                        class="card-text">{{ $application->costumer->passport_surname }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center user-total-numbers">
                                                        <div class="d-flex align-items-center mr-2">
                                                            <div class="color-box bg-light-primary">
                                                                <i data-feather="dollar-sign" class="text-primary"></i>
                                                            </div>
                                                            <div class="ml-1">
                                                                <h5 class="mb-0">
                                                                    {{ number_format($application->costumer->limit) }}</h5>
                                                                <small>Limit</small>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="color-box bg-light-success">
                                                                <i data-feather="trending-up" class="text-success"></i>
                                                            </div>
                                                            <div class="ml-1">
                                                                <h5 class="mb-0">
                                                                    {{ $application->costumer->limit_status }}</h5>
                                                                <small>Limit Status</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                    <div class="user-info-wrapper">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="user-info-title">
                                                                <i data-feather="user" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">#{{ $application->id }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="check" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">{{ $application->costumer->phone }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="star" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">{{ $application->costumer->register_address }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="flag" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">{{ $application->costumer->region }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /User Card Ends-->


                            </div>
                            <!-- User Card & Plan Ends -->

                            <!-- User Timeline & Permissions Starts -->
                            <div class="row">
                                <!-- User Permissions Starts -->
                                <div class="col-md-12">
                                    <!-- User Permissions -->
                                    <div class="card px-2">
                                        <div class="card-header">
                                            <h4 class="card-title">To'lov jadvali</h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="card-text ml-2">Umumiy summa:
                                                <strong>{{ number_format($application->sum) }}</strong>
                                                so'm
                                            </p>

                                            <p class="card-text ml-2">Qolgan summa:
                                                <strong>{{ number_format($sumRests, 2) }}</strong>
                                                so'm
                                            </p>

                                            @if ($sumRests == 0)
                                                {{-- tugatish --}}
                                                <form action="{{ route('endapplication') }}" method="POST" class="form">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="application_id"
                                                            value="{{ $application->id }}">
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-danger mr-1 waves-effect waves-float waves-light">Tugatish</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                            {{-- Ixtiyoriy summa --}}
                                                <div class="modal-size-default d-inline-block mr-2">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal" data-target="#defaultSize">
                                                        Ixtiyoriy summa
                                                    </button>
                                                    <div class="modal fade text-left" id="defaultSize" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel18">Ixtiyoriy
                                                                        summa
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('optionalsumma') }}"
                                                                        method="POST" class="form">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-12">
                                                                                <div class="form-group" >
                                                                                    <label for="first-name-column">Kassa tanlang</label>
                                                                                    <select name="cash_id" class="form-control" id="cashSelect" >
                                                                                        <option value="" selected disabled>Tanlang</option>
                                                                                        @foreach ($cashes as $cash)
                                                                                            @if ($cash->user_id == Auth::user()->store_id)
                                                                                            <option value="{{ $cash->id }}">{{ $cash->name }}</option>
                                                                                            @endif

                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="first-name-column">To'lov
                                                                                        turi</label>
                                                                                    <select name="payment_type"
                                                                                        class="form-control"
                                                                                        id="basicSelect" required>
                                                                                        <option value="cash">
                                                                                            Naqd</option>
                                                                                        <option value="card">
                                                                                            Plastik</option>
                                                                                        <option value="transfer">
                                                                                            O'tkazma
                                                                                        </option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>



                                                                            <div class="col-md-12 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="first-name-column">Summa
                                                                                        kiriting</label>
                                                                                    <input type="number" step="0.01"
                                                                                        name="count" min="1"
                                                                                        max="{{ $sumRests }}"
                                                                                        class="form-control"
                                                                                        placeholder="Summa yozing"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="application_id"
                                                                                value="{{ $application->id }}">
                                                                            <div class="col-12">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary mr-1 waves-effect waves-float waves-light">Qabul
                                                                                    qilish</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif




                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-striped table-borderless">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Oy</th>
                                                        <th>Ariza №</th>
                                                        <th>Summasi</th>
                                                        <th>Qolgan</th>
                                                        <th>To'lov sanasi</th>
                                                        <th>To'lov</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($debts as $debt)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $debt->application_id }}</td>
                                                            <td>
                                                                {{ $monthsumma }}

                                                            </td>
                                                            <td>
                                                                @if ($debt->active != 1)
                                                                    @if ($monthsumma != number_format($debt->summa, 2))
                                                                        {{ number_format($debt->summa, 2) }}
                                                                    @else
                                                                        {{ $monthsumma }}
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $debt->month }}
                                                            </td>
                                                            <td>
                                                                @if ($debt->active == 0)
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="contributor-create" disabled />
                                                                        <label class="custom-control-label"
                                                                            for="contributor-create"></label>
                                                                    </div>
                                                                @else
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="contributor-create" checked disabled />
                                                                        <label class="custom-control-label"
                                                                            for="contributor-create"></label>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="modal-size-default d-inline-block mr-2">
                                                                    @if ($debt->active != 1)
                                                                        <button type="button"
                                                                            class="btn btn-outline-primary"
                                                                            data-toggle="modal"
                                                                            data-target="#defaultSize{{ $debt->id }}">
                                                                            To'lash <i data-feather='arrow-down'></i>
                                                                        </button>
                                                                    @endif
                                                                    <div class="modal fade text-left"
                                                                        id="defaultSize{{ $debt->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="myModalLabel18"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title"
                                                                                        id="myModalLabel18">Mahsulot kirimi
                                                                                    </h4>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('activeapplication.store') }}"
                                                                                        method="POST" class="form">
                                                                                        @csrf
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-12">
                                                                                                <div class="form-group" >
                                                                                                    <label for="first-name-column">Kassa tanlang</label>
                                                                                                    <select name="cash_id" class="form-control" id="cashSelect" >
                                                                                                        <option value="" selected disabled>Tanlang</option>
                                                                                                        @foreach ($cashes as $cash)
                                                                                                            @if ($cash->user_id == Auth::user()->store_id)
                                                                                                            <option value="{{ $cash->id }}">{{ $cash->name }}</option>
                                                                                                            @endif

                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 col-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="first-name-column">To'lov
                                                                                                        turi</label>
                                                                                                    <select
                                                                                                        name="payment_type"
                                                                                                        class="form-control"
                                                                                                        id="basicSelect"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="cash">
                                                                                                            Naqd</option>
                                                                                                        <option
                                                                                                            value="card">
                                                                                                            Plastik</option>
                                                                                                        <option
                                                                                                            value="transfer">
                                                                                                            O'tkazma
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-12">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="first-name-column">Comment</label>
                                                                                                    <input type="text"
                                                                                                        name="comment"
                                                                                                        class="form-control"
                                                                                                        required>
                                                                                                    <input type="hidden"
                                                                                                        value="income"
                                                                                                        name="type"
                                                                                                        required>
                                                                                                    <input type="hidden"
                                                                                                        value="{{ $debt->id }}"
                                                                                                        name="id"
                                                                                                        required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12">
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary mr-1 waves-effect waves-float waves-light">Qabul
                                                                                                    qilish</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /User Permissions -->
                                </div>
                                <!-- User Permissions Ends -->
                            </div>
                            <!-- User Timeline & Permissions Ends -->


                        </section>

                    </div>
                </div>
                <!-- Tabs with Icon ends -->


            </div>

        </div>
    </div>

@endsection
