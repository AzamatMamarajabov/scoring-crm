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
                            <h4 class="card-title">Kirim-Chiqim tarixi</h4>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="modal-size-default d-inline-block mr-2">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSize">
                                        Kirim <i data-feather='arrow-down'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Mahsulot kirimi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('superwarehouse.store') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Mahsulot</label>
                                                                <select name="product_id" class="form-control" id="basicSelect" required>
                                                                    @foreach($products as $product)
                                                                    @if ($superwarehouse == $product->store_id )
                                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Soni</label>
                                                                    <input type="number" name="count" min="1" class="form-control" placeholder="Mahsulot soni" required>
                                                                    <input type="hidden" value="income" name="type" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="store_id" value="{{ $superwarehouse }}">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Qabul qilish</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-size-default d-inline-block">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSizes">
                                        Chiqim <i data-feather='arrow-up'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSizes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Mahsulotlar chiqimi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('superwarehouse.store') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Mahsulot</label>
                                                                    <select name="product_id" class="form-control" id="basicSelect" required>
                                                                        @foreach($products as $product)
                                                                        @if ($superwarehouse == $product->store_id )
                                                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Soni</label>
                                                                    <input type="number" name="count" min="1" class="form-control" placeholder="Mahsulot soni" required>
                                                                    <input type="hidden" value="outcome" name="type" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Kimdan</label>
                                                                    <input type="text" class="form-control" value="{{ $shop->name }}" required>
                                                                    <input type="hidden" name="from_id" value="{{ $shop->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Kimga</label>
                                                                    <select name="to_id" class="form-control" id="basicSelect" required>
                                                                        @foreach($stores as $store)
                                                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="store_id" value="{{ $superwarehouse }}">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Yuborish</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Mahsulot</th>
                                        <th>Narxi</th>
                                        <th>Kimdan</th>
                                        <th>Kimga</th>
                                        <th>Soni</th>
                                        <th>Mas'ul</th>
                                        <th>Turi</th>
                                        <th>Sana</th><!--
                                        <th>Amallar</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($histories as $history)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $history->product->name ?? "" }}</td>
                                        <td>{{ $history->product->price ?? "" }}</td>
                                        <td>{{ $history->sender->name ?? "-" }}</td>
                                        <td>{{ $history->reciever->name ?? "-" }}</td>
                                        <td>{{ $history->count }}</td>
                                        <td>{{ $history->responsible->name }}</td>
                                        <td>
                                            @if($history->from_id == $shop->id)
                                                Chiqim <i data-feather='arrow-up'></i>
                                            @elseif($history->to_id == $shop->id)
                                                Kirim <i data-feather='arrow-down'></i>
                                            @endif
                                        </td>
                                        <td>{{ $history->created_at->format('d.m.Y H:m') }}</td>

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
