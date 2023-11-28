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
                            <h4 class="card-title">Do'konlar</h4>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="modal-size-default d-inline-block">


                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Do'kon nomi</th>
                                        <th>Sana</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $store)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $store->name }}</td>
                                        <td>{{ $store->created_at->format('d.m.Y H:m') }}</td>
                                        <td class="d-flex justify-content-between">

                                            <a class="btn btn-sm btn-primary" href="{{ route('supercash.cash', [ 'store_id' => $store->id]) }}">
                                                <i data-feather="eye"></i> Show Cash
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
        </section>

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
