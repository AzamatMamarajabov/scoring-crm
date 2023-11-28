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
                            <h4 class="card-title"> Hodim qo'shish</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-primary waves-effect" href="{{ route('workers.index') }}">Bosh
                                sahifa</a>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('workers.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')


                                <div class="form-group">
                                    <label class="form-label" for="name">Ismi</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Xodim ismini yozing" aria-label="Name" required />


                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone">Telefon raqami</label>
                                    <input type="text" id="325" name="phone" class="form-control"
                                        placeholder="Telefon raqamini kiriting" aria-label="phone" required />


                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="working_time">Ish vaqtini tanlang</label>
                                    <input type="datetime-local" id="working_time" name="working_time" class="form-control"
                                        required />


                                </div>

                                    <div class="form-group">
                                        <label for="first-name-column">Oylik</label>
                                         <select name="salary" class="form-control" id="basicSelect" required>
                                            @foreach ($aclats as $aclat)
                                            <option value="{{ $aclat->price }}">{{ $aclat->percentage }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                <div class="form-group">
                                    <label class="form-label" for="other_phone">Boshqa telefon raqami</label>
                                    <input type="text" id="326" name="other_phone" class="form-control"
                                        placeholder="Boshqa telefon raqam kiriting" aria-label="Name" required />


                                </div>
                                <input type="hidden" name="store_id" value="{{ Auth::user()->id}}">

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">Qo'shish</button>
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
