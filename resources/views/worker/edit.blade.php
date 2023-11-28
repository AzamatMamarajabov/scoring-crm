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
                            <a href="{{ route('deposits.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('deposits.update',$deposit->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="deposit_sum">Nomi</label>
                                    <input type="text" id="deposit_sum" name="deposit_sum" class="form-control"
                                        placeholder="deposit_sum" value="{{$deposit->deposit_sum}}" aria-label="deposit_sum" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter name.</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="start_sum">Narxi</label>
                                    <input type="text" id="start_sum" value="{{$deposit->start_sum}}" name="start_sum" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="vip_sum">Narxi</label>
                                    <input type="number" id="vip_sum" value="{{$deposit->vip_sum}}" name="vip_sum" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>
                                deposit_sum	start_sum	vip_sum	gold_sum	worker_salary_persentage
                                <div class="form-group">
                                    <label class="form-label" for="gold_sum">Narxi</label>
                                    <input type="number" id="gold_sum" value="{{$deposit->gold_sum}}" name="gold_sum" class="form-control"
                                        placeholder="Narxi" aria-label="Name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>



                                <div class="form-group">
                                    <label class="form-label" for="worker_salary_persentage">Soni</label>
                                    <input type="text" value="{{$deposit->worker_salary_persentage}}" id="worker_salary_persentage" name="worker_salary_persentage" class="form-control"
                                        placeholder="shtrix code" aria-label="worker_salary_persentage" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter price.</div>
                                </div>
                                <input type="hidden" value="{{ Auth::user()->id}}" name="store_id" />
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
