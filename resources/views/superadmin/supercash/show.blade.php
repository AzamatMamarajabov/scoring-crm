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
                            <h4 class="card-title">Kassa kirim-Chiqim - {{ $store->name ?? 'superadmin' }}</h4>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="modal-size-default d-inline-block mr-2">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSize">
                                        Kirim <i data-feather='arrow-down'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Mahsulot kirimi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('PaymentStore') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Summa</label>
                                                                    <input type="number" name="sum" min="1" class="form-control" placeholder="Summa" required>
                                                                    <input type="hidden" name="type" value="income" required>
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
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Kommentariya</label>
                                                                     <input type="text" name="comment" class="form-control" placeholder="Kommentariya">
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="cash_id" value="{{ request('supercash') }}">
                                                            <input type="hidden" name="cash" value="{{ request('supercash') }}">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Qabul qilish</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-size-default d-inline-block">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSizes">
                                        Chiqim <i data-feather='arrow-up'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSizes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Mahsulotlar chiqimi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('PaymentStore', ['supercash' => request('supercash')  ]) }}" method="POST" class="form">

                                                        @csrf
                                                        <div class="row">


                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Summa</label>
                                                                    <input type="number" name="sum" min="1" class="form-control" placeholder="Summa" required>
                                                                    <input type="hidden" name="type" value="outcome" required>
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


                                                            <div class="col-md-12 col-12">

                                                                    <div class="form-group">
                                                                        <label for="first-name-column">Kommentariya</label>
                                                                         <input type="text" name="comment" class="form-control" placeholder="Kommentariya">
                                                                    </div>

                                                            </div>

                                                            <input type="hidden" name="cash" value="{{ request('supercash') }}">

                                                            <div class="col-md-12 col-12" id="toggleDropdownCheck" >
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" onclick="toggleDropdown()">
                                                                        <label class="custom-control-label" for="customCheck1">Boshqa kassaga</label>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-12 col-12" id="dropdownContainer" style="display: none;">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Do'kon tanlang</label>
                                                                    <select name="store_id" class="form-control" id="storeSelect" >
                                                                        <option value="" >Do'kon tanlang</option>
                                                                        @foreach ($stores as $store)
                                                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group" id="cashSelectContainer" style="display: none;">
                                                                    <label for="first-name-column">Kassa tanlang</label>
                                                                    <select name="cash_id" class="form-control" id="cashSelect" >
                                                                        <option value="">Tanlanmagan</option>
                                                                        <option value="{{ request('payment') }}">Ushbu kassaga</option>
                                                                        @foreach ($cashes as $cash)
                                                                            <option value="{{ $cash->id }}" data-store-id="{{ $cash->user_id }}">{{ $cash->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


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

                                <div class="modal-size-default d-inline-block mr-2 ml-2">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSizee">
                                        Oylik <i data-feather='arrow-down'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSizee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Oylik qo'shish</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('WorkerSalary') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">

                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Hodim tanlang</label>
                                                                    <select name="worker" class="form-control"  >
                                                                        <option value="" >Hodim tanlang</option>
                                                                        @foreach ($workers as $worker)
                                                                            <option value="{{ $worker->id }}">{{ $worker->name}}</option>
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
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Summa</label>
                                                                    <input type="number" name="sum" min="1" class="form-control" placeholder="Summa" required>
                                                                    <input type="hidden" name="type" value="outcome" required>
                                                                </div>
                                                            </div>


                                                            <input type="hidden" name="cash_id" value="{{ request('supercash') }}">
                                                            <input type="hidden" name="cash" value="{{ request('supercash') }}">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Qabul qilish</button>
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
                                        <th>Summa</th>
                                        <th>Mas'ul</th>
                                        <th>Kirim/Chiqim</th>
                                        <th>To'lov turi</th>
                                        <th>Kommentariya</th>
                                        <th>Sana</th>
                                        <!-- <th>Amallar</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    @if (request('supercash') == $payment->cash_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ number_format($payment->sum) }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>
                                            @if($payment->type == 'income')
                                                Kirim <i data-feather='arrow-down'></i>
                                            @elseif($payment->type == 'outcome')
                                                Chiqim <i data-feather='arrow-up'></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if($payment->payment_type == 'cash')
                                                Naqd
                                            @elseif($payment->payment_type == 'card')
                                                Plastik
                                            @elseif($payment->payment_type == 'transfer')
                                                O'tkazma
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($payment->comment, 20) }}</td>
                                        <td>{{ $payment->created_at->format('d.m.Y H:m') }}</td>

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
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdownContainer");
        if (document.getElementById("customCheck1").checked) {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";

        }
    }



function toggleDropdown() {
var checkbox = document.getElementById("customCheck1");
var dropdown = document.getElementById("dropdownContainer");
var storeSelect = document.getElementById("storeSelect");
var cashSelect = document.getElementById("cashSelect");

if (checkbox.checked) {
dropdown.style.display = "block"; // Show the dropdown

// Initially, match the selected store in storeSelect with cashSelect
var selectedStoreId = storeSelect.value;
for (var i = 0; i < cashSelect.options.length; i++) {
var cashOption = cashSelect.options[i];
if (cashOption.getAttribute("data-store-id") === selectedStoreId) {
cashOption.style.display = "block";
} else {
cashOption.style.display = "none";
}
}
} else {
dropdown.style.display = "none"; // Hide the dropdown
}
}

document.getElementById("storeSelect").addEventListener("change", function() {
var selectedStoreId = this.value;
var cashSelect = document.getElementById("cashSelect");

for (var i = 0; i < cashSelect.options.length; i++) {
var cashOption = cashSelect.options[i];
if (cashOption.getAttribute("data-store-id") === selectedStoreId) {
cashOption.style.display = "block";
} else {
cashOption.style.display = "none";
}
}
});


document.getElementById("storeSelect").addEventListener("change", function() {
var cashSelectContainer = document.getElementById("cashSelectContainer");
var cashSelect = document.getElementById("cashSelect");

if (this.value === "") {
// No store selected, hide the cashSelect dropdown and set placeholder message
cashSelectContainer.style.display = "none";
cashSelect.value = ""; // Reset the value to an empty string
} else {
// Store selected, show the cashSelect dropdown
cashSelectContainer.style.display = "block";
}
});
</script>

@endsection

