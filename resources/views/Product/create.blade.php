@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">


        <div class="content-body">
            <!-- Bootstrap Validation -->
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Maxsulot qo'shish</h4>
                    </div>
                    @include('admin.layout.message')
                    <div class="col-12 text-right">
                        <a class="btn btn-outline-primary waves-effect" href="{{ route('products.index') }}">Bosh sahifa</a>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation row" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group col-12">
                                <label class="form-label" for="name">Nomi</label>
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="Nomi" aria-label="Name" required />

                                <div class="invalid-feedback">Please enter name.</div>
                            </div>
                            <div class="form-group col-12">
                                <label for="customFile">Mahsulotning rasmini yuklash</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Fayl tanlash</label>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label" for="pricedollar">Narxi ($)</label>
                                <input type="number" id="pricedollar" value="{{old('pricedollar')}}" name="pricedollar" class="form-control" placeholder="Narxi ($)">
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label" for="pricesum">Narxi (So'm)</label>
                                <input type="number" id="pricesum" value="{{old('pricesum')}}" name="pricesum" class="form-control" placeholder="Narxi (So'm)"  >
                            </div>

                            <div class="form-group col-12">
                                <label class="form-label" for="shtrix_code">Shtrix code</label>
                                <input type="number" id="shtrix_code" value="{{old('shtrix_code')}}" name="shtrix_code" class="form-control" placeholder="shtrix code" aria-label="shtrix_code" required />

                                <div class="invalid-feedback">Please enter shtrix_code.</div>
                            </div>
                            <input type="hidden" name="store_id" value="{{ Auth::user()->store_id}}">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Bootstrap Validation -->
        </div>
    </div>
</div>


@endsection
