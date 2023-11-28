@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

 <!-- BEGIN: Content-->
 <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">

        <section id="histories">
            <div class="row" id="basic-table">
                <div class="col-12">
                    @include('admin.layout.message')
                </div>
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Savdo - {{ $store->name }}</h4>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="modal-size-default d-inline-block">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSizes">
                                        Savdo <i data-feather='arrow-up'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSizes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Savdo qo'shish</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('supersell.store') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">


                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">

                                                                    <label for="first-name-column">Mahsulot</label>
                                                                    <select name="product_id" class="form-control" id="productSelect" required>
                                                                        <option value="" >Tanlang</option>
                                                                        @foreach($products as $product)
                                                                            @if (request('supersell') == $product->store_id  )
                                                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>



                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Narxi</label>
                                                                    <input type="text" id="sumInput"  name="sum" class="form-control" placeholder="Narxi" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Soni</label>
                                                                    <input type="number" min="1" name="count" class="form-control" placeholder="Soni" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Platforma tanlang</label>
                                                                     <select name="platform_id" class="form-control" id="basicSelect" required>
                                                                        @foreach($platforms as $platform)
                                                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Kassa tanlang</label>
                                                                     <select name="cash_id" class="form-control" id="basicSelect" required>
                                                                        @foreach ($cashes as $cash)
                                                                        @if ($user->store_id == $cash->store_id)
                                                                        <option value="{{ $cash->id }}">{{ $cash->name }}</option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Mijoz tanlang</label>
                                                                     <select name="customer_id" class="form-control" id="basicSelect" required>
                                                                        @foreach($customers as $customer)
                                                                            <option value="{{ $customer->id }}">{{ $customer->passport_surname }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">To'lov turi</label>
                                                                     <select name="payment_type" class="form-control" id="basicSelect" required>
                                                                        <option value="cash">Naqd</option>
                                                                        <option value="card">Plastik</option>
                                                                        <option value="transfer">O'tkazma</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="userId" value="{{ $user->id }}">

                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Yuborish</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Mahsulot</th>
                                        <th>Soni</th>
                                        <th>Umumiy narxi</th>
                                        <th>To'lov turi</th>
                                        <th>Mas'ul</th>
                                        <th>Sana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sells as $sell)
                                    @if (Auth::user()->store_id == $sell->store_id || Auth::user()->role == "superadmin")
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sell->product->name }}</td>
                                        <td>{{ $sell->count }}</td>
                                        <td>{{ number_format($sell->sum) }}</td>
                                        <td>
                                            @if($sell->payment_type == 'cash')
                                                Naqd
                                            @elseif($sell->payment_type == 'card')
                                                Plastik
                                            @elseif($sell->payment_type == 'transfer')
                                                O'tkazma
                                            @endif
                                        </td>
                                        <td>{{ $sell->user->name }}</td>
                                        <td>{{ $sell->created_at->format('d.m.Y H:m') }}</td>

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </div>
    </div>
</div>
<!-- END: Content-->
<script>
    let selectElement = document.getElementById('productSelect');
    let sumInput = document.getElementById('sumInput');

    selectElement.addEventListener('change', function() {
        let selectedOption = selectElement.options[selectElement.selectedIndex];
        let price = selectedOption.getAttribute('data-price');


        sumInput.value = price;
    });
</script>
@endsection
