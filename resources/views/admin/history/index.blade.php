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
                                                    <form action="{{ route('warehouse.store') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Mahsulot</label>
                                                                <select name="product_id" class="form-control" id="basicSelect" required>
                                                                    @foreach($products as $product)
                                                                    @if (Auth::user()->store_id == $product->store_id || Auth::user()->role == "superadmin")
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
                                                    <form action="{{ route('warehouse.store') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Mahsulot</label>
                                                                    <select name="product_id" class="form-control" id="basicSelect" required>
                                                                        @foreach($products as $product)
                                                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
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
                                        <!-- <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('warehouse.edit', ['warehouse' => $history->id]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                        <span>O'zgartirish</span>
                                                    </a>
                                                    <form action="{{ route('warehouse.destroy', ['warehouse' => $history->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                        <span>O'chirish</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td> -->
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
