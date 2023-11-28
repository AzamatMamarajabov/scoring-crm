@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

 <!-- BEGIN: Content-->
 <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">

            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kirim-Chiqim o'zgartirish</h4>
                                <a href="{{ route('warehouse.index') }}">
                                    <button type="button" class="btn btn-danger waves-effect waves-float waves-light"><i data-feather='arrow-left'></i> Ortga</button>
                                </a>    
                            </div>
                            <div class="card-body">
                                <form action="{{ route('warehouse.update', ['warehouse' => $warehouse->id]) }}" class="form" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Mahsulot</label>
                                                <select name="product_id" class="form-control" id="basicSelect" required>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" @selected($history->product_id == $product->id)>{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Soni</label>
                                                <input type="number" name="count" min="1" value="{{ $history->count }}" class="form-control" placeholder="Mahsulot soni" required>
                                            </div>
                                        </div>

                                        @if($history->type == 'outcome')
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Kimdan</label>
                                                    <select name="from_id" class="form-control" id="basicSelect" required>
                                                        @foreach($stores as $store)
                                                            <option value="{{ $store->id }}" @selected($history->from_id == $store->id)>{{ $store->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Kimga</label>
                                                    <select name="to_id" class="form-control" id="basicSelect" required>
                                                        @foreach($stores as $store)
                                                            <option value="{{ $store->id }}" @selected($history->to_id == $store->id)>{{ $store->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">O'zgartirish</button>
                                        </div>
                                    </div>
                                </form>
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
