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
                        <div class="col-12 text-right">
                            <a href="{{ route('warehouse.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('warehouse.store') }}" method="POST"
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
                                    <label class="form-label" for="image">Rasmi</label>
                                    <input type="file" id="image" name="image" class="form-control" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a valid image</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="number">Narxi</label>
                                    <input type="number" id="number" name="number" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter number.</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="sold">Narxi</label>
                                    <input type="number" id="sold" name="sold" class="form-control"
                                        placeholder="sold" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter sold.</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="residual">Soni</label>
                                    <input type="number" id="residual" name="residual" class="form-control"
                                        placeholder="residual" aria-label="residual" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter residual.</div>
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
