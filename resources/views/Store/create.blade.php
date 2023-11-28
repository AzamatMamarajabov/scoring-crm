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
                            <h4 class="card-title"> Do'kon qo'shish</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{ route('products.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('stores.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="form-label" for="name">Nomi</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Nomi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter name.</div>
                                </div>


                                <div class="form-group">
                                    <label class="d-block" for="phone">Telefon raqami</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Telefon raqami" aria-label="phone" required />
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="address" aria-label="address" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter address.</div>
                                </div>
                                

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
