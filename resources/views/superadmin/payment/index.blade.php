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
                            <h4 class="card-title">Kassalar</h4>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Do'kon</th>
                                        <th>Umumiy kirim</th>
                                        <th>Umumiy chiqim</th>
                                        <th>Tarix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $income = 0; ?>
                                    <?php $outcome = 0; ?>
                                    @foreach($stores as $store)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $store->name }}</td>
                                            <td>{{ number_format($store->payments->where('type', 'income')->sum('sum')) }}</td>
                                            <?php
                                            $income += $store->payments->where('type', 'income')->sum('sum');
                                            $outcome += $store->payments->where('type', 'outcome')->sum('sum');
                                            ?>
                                            <td>{{ number_format( $store->payments->where('type', 'outcome')->sum('sum')) }}</td>
                                            <td><a href="{{ route('info.store', ['id' => $store->id]) }}" class="btn btn-outline-primary waves-effect">Tarix <i data-feather='list'></i></a></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Umumiy:</td>
                                        <td></td>
                                        <td>{{ number_format($income) }}</td>
                                        <td>{{ number_format($outcome) }}</td>
                                        <td></td>
                                    </tr>
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
