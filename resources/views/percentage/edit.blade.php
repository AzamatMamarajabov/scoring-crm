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
                            <h4 class="card-title"> Percentage o'zgartirish</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{ route('percentages.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('percentages.update',$percentage->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="month">Month</label>
                                    <input type="text" id="month" name="month" class="form-control"
                                        placeholder="month" value="{{$percentage->month}}" aria-label="month" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter name.</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="percentage">Percentage</label>
                                    <input type="text" id="percentage" value="{{$percentage->percentage}}" name="percentage" class="form-control"
                                        placeholder="percentage" aria-label="percentage" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
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
