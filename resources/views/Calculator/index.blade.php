@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row" data-select2-id="265">
                <div class="col-12" data-select2-id="264">
                    <div class="card" data-select2-id="263">
                        <div class="card-header">
                            <h4 class="card-title">Kalkulyator</h4>
                        </div>
                        <div class="card-body" data-select2-id="262">
                            <div class="row" data-select2-id="261">
                                <!-- Basic -->

                                <div class="col-md-4 mb-1" data-select2-id="52">
                                    <label>Mahsulot nomi</label>
                                    <select class="form-control" multiple id="sum">
                                        @foreach ($products as $product)
                                        <option value="{{ $product->price }}">
                                            {{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Disabled Results -->
                                <div class="col-md-4 mb-1" data-select2-id="52">
                                    <label>Muddat</label>
                                    <select name="" id="loanTerm" class="form-select form-control percentagesSelect">
                                        <option disabled="disabled" selected="false">Tanlash</option>
                                        @foreach ($percentages as $item)
                                        <option data-percentage="{{ $item->percentage }}" value="{{ $item->month }}">{{ $item->month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1" data-select2-id="52">
                                    <label class="form-label">Xisoblash</label>
                                    <input type="submit" onclick="summa()" class="form-control bg-success" value="Xisoblash">
                                </div>

                                <div class="col-12 mt-4">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">№</th>
                                                <th scope="col">Summa</th>
                                                <th scope="col">Ariza Narxi</th>
                                                <th scope="col">Ustama</th>
                                                <th scope="col">OYLIK TO'LOV</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('js')
<script>
    var totalValue = 0;
    document.getElementById("sum").addEventListener("change", function() {
        var selectedOptions = this.selectedOptions;
        totalValue = 0;


        for (var i = 0; i < selectedOptions.length; i++) {
            totalValue += parseFloat(selectedOptions[i].value);
        }

        console.log("Jami qiymat: " + totalValue);

    });

    let tbody = document.getElementById("tbody");
    let percentage = 0;

    let selectElement = document.getElementById('loanTerm');
    selectElement.addEventListener('change', function() {
        let selectedOption = selectElement.options[selectElement.selectedIndex];
        percentage = selectedOption.getAttribute('data-percentage');
        percentage = parseInt(percentage);
    });

    function summa() {
        tbody.innerHTML = "";

        let loanTerm = document.getElementById("loanTerm");
        for (let i = 1; i <= loanTerm.value; i++) {
            let tr = document.createElement("tr");
            let td = `
                <td>${i}</td>
                <td>${new Intl.NumberFormat('en-US').format(totalValue)} so'm</td>
                <td>${new Intl.NumberFormat('en-US').format(Math.round((totalValue / 100 * percentage)+ +totalValue))} so'm</td>
                <td>${percentage}%</td>
                <td>${new Intl.NumberFormat('en-US').format(Number((Math.round(((totalValue / 100 * percentage)+ +totalValue))/loanTerm.value).toPrecision(4)))} so'm</td>
            `;
            tr.innerHTML = td;
            tbody.append(tr);
        }
    }

</script>
@endsection
