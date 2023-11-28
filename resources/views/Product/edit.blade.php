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
                            <h4 class="card-title"> Maxsulotni o'zgartirish</h4>
                        </div>
                        @include('admin.layout.message')
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-primary waves-effect" href="{{ route('products.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="name">Nomi</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Nomi" value="{{$product->name}}" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter name.</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="image">Rasmi</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a valid image</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="price">Narxi</label>
                                    <input type="number" id="price" value="{{$product->price}}" name="price" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>



                                <div class="form-group">
                                    <label class="form-label" for="shtrix_code">Soni</label>
                                    <input type="number" value="{{$product->shtrix_code}}" id="shtrix_code" name="shtrix_code" class="form-control"
                                        placeholder="shtrix code" aria-label="shtrix_code" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>
                                <input type="hidden" value="{{ Auth::user()->store_id}}" name="store_id" />
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
