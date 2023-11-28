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
                            <h4 class="card-title"> Valyuta o'zgartirish</h4>
                        </div>
                            @include('admin.layout.message')
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('exchangerate.update',$exchangerate->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="dollar">Valyuta summasi ($1)</label>
                                    <input type="text" id="dollar" name="dollar" class="form-control"
                                        placeholder="Valyuta sum" value="{{$exchangerate->dollar}}" aria-label="dollar" required />

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Saqlash</button>
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
