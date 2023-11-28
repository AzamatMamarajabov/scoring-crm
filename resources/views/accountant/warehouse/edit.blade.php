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
                        <div class="col-12 text-right">
                            <a href="{{ route('warehouse.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('warehouse.update',$warehouse->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="name">Nomi</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Nomi" value="{{$warehouse->name}}" aria-label="Name" required />
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
                                    <label class="form-label" for="number">Narxi</label>
                                    <input type="number" id="number" value="{{$warehouse->number}}" name="number" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter number.</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="sold">Narxi</label>
                                    <input type="number" id="sold" value="{{$warehouse->sold}}" name="sold" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter sold.</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="residual">Soni</label>
                                    <input type="number" value="{{$warehouse->residual}}" id="residual" name="residual" class="form-control"
                                        placeholder="Soni" aria-label="count" required />
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
