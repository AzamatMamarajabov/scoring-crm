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
                            <h4 class="card-title"> Sozlanmalar</h4>
                        </div>

                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('stores.update',$store->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Kod</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Code"  @if ($store->code !== null)
                                                value="{{$store->code}}"
                                                   @endif name="code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Name" value="{{$store->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Name MCHJ</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Name MCHJ" @if ($store->name_gl !== null)
                                                value="{{$store->name_gl}}"
                                                   @endif  name="name_gl">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Telefon raqam</label>
                                            <input type="text" id="country-floating" class="form-control" name="phone" value="{{$store->phone}}" placeholder="Telefon raqam">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Telefon raqam 2</label>
                                            <input type="text" id="company-column" class="form-control" name="phone2"  @if ($store->phone2 !== null)
                                                value="{{$store->phone2}}"
                                                   @endif  placeholder="Telefon raqam 2">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Telegram</label>
                                            <input type="text" id="company-column" class="form-control"  @if ($store->telegram !== null)
                                                value="{{$store->telegram}}"
                                                   @endif name="telegram" placeholder="Telegram">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Web site</label>
                                            <input type="text" id="company-column" class="form-control"  @if ($store->website !== null)
                                                value="{{$store->website}}"
                                                   @endif name="website" placeholder="Web site">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Inn</label>
                                            <input type="text" id="company-column" class="form-control"  @if ($store->inn !== null)
                                                value="{{$store->inn}}"
                                                   @endif name="inn" placeholder="Inn">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Okonx</label>
                                            <input type="text" id="email-id-column" class="form-control"  @if ($store->okonx !== null)
                                                value="{{$store->okonx}}"
                                                   @endif name="okonx" placeholder="Okonx">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Oked</label>
                                            <input type="text" id="first-name-column" class="form-control"  @if ($store->oked !== null)
                                                value="{{$store->oked}}"
                                                   @endif placeholder="Oked" name="oked">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">KKS</label>
                                            <input type="text" id="last-name-column" class="form-control"  @if ($store->kks !== null)
                                                value="{{$store->kks}}"
                                                   @endif placeholder="KKS" name="kks">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Xisob raqam</label>
                                            <input type="text" id="city-column" class="form-control"  @if ($store->account_number !== null)
                                                value="{{$store->account_number}}"
                                                   @endif placeholder="Xisob raqam" name="account_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Direktor</label>
                                            <input type="text" id="country-floating" class="form-control"  @if ($store->director !== null)
                                                value="{{$store->director}}"
                                                   @endif name="director" placeholder="Direktor">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Bosh bug'alter</label>
                                            <input type="text" id="company-column" class="form-control" name="accountant"  @if ($store->accountant !== null)
                                                value="{{$store->accountant}}"
                                                   @endif placeholder="Bosh bug'alter">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Logotip</label>
                                            <input type="file" id="company-column" class="form-control" name="logotip" placeholder="Logotip">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Address</label>
                                            <input type="text" id="company-column" class="form-control" value="{{$store->address}}" name="address" placeholder="Address">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Slogan</label>
                                            <textarea data-length="20" class="form-control char-textarea" name="slogan" id="textarea-counter" rows="3"  @if ($store->slogan !== null)
                                                value="{{$store->slogan}}"
                                                      @endif placeholder="Slogan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Slogan mini</label>
                                            <textarea data-length="20" class="form-control char-textarea" name="slogan_mini" id="textarea-counter" rows="3"  @if ($store->slogan_mini !== null)
                                                value="{{$store->slogan_mini}}"
                                                      @endif placeholder="Slogan mini"></textarea>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
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
