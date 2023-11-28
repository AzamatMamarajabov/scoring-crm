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
                            <h4 class="card-title"> Depositni o'zgartirish</h4>
                        </div>
                            @include('admin.layout.message')
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('deposits.update',$deposit->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="deposit_sum">Deposit summasi</label>
                                    <input type="text" id="deposit_sum" name="deposit_sum" class="form-control"
                                        placeholder="Deposit sum" value="{{$deposit->deposit_sum}}" aria-label="deposit_sum" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter name.</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="start_sum">Start summasi</label>
                                    <input type="text" id="start_sum" value="{{$deposit->start_sum}}" name="start_sum" class="form-control"
                                        placeholder="Start sum" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="vip_sum">Vip summasi</label>
                                    <input type="number" id="vip_sum" value="{{$deposit->vip_sum}}" name="vip_sum" class="form-control"
                                        placeholder="Vip sum" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="gold_sum">Gold summasi</label>
                                    <input type="number" id="gold_sum" value="{{$deposit->gold_sum}}" name="gold_sum" class="form-control"
                                        placeholder="Gold sum" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
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
