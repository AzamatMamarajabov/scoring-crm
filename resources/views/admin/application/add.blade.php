@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-wizard.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Tovarlar</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#personal-info">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Shartlar</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>

                            <div class="step" data-target="#social-links">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Ariza yaratish</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="account-details" class="content">
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <select name="costumer_id" class="form-control mb-2">
                                                <option disabled selected="false">Mijoz tanlash</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->costumer_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <select name="" id="list_id" class="form-control mb-2">
                                                <option disabled selected="false">Tanlash</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->name }}" myid="{{ $product->id }}"
                                                        price="{{ $product->price }}">
                                                        {{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            <select name="worker_id" class="form-control mb-2">
                                                <option disabled selected="false">Ishchi</option>
                                                @foreach ($workers as $worker)
                                                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <!-- Basic Tables start -->
                                            <div class="row" id="basic-table">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Tovarlar</h4>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nomi</th>
                                                                        <th>Narxi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list">

                                                                    <tr>
                                                                        <td colspan="1">Jami </td>
                                                                        <td id="jami"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Basic Tables end -->
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-outline-secondary btn-prev" disabled>
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="personal-info" class="content">
                                    <div class="row">
                                        @foreach ($percentage as $item)
                                            <div class="col-sm-4 col-md-4">
                                                <div class="card"
                                                    style="box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1) !important">
                                                    <div class="card-body pb-0">
                                                        <dl class="row">
                                                            <dt class="col-sm-12 text-center">
                                                                <input type="radio" class="radio-prs" name="sum">

                                                            </dt>
                                                        </dl>
                                                        <dl class="row mmonth">
                                                            <dt class="col-sm-6 text-center mmmonth">
                                                                <span>Oyga</span> <br>
                                                                <strong class="mmmmonth">{{ $item->month }}</strong>
                                                            </dt>
                                                            <dt class="col-sm-6 text-center ">
                                                                <span>Sum/Oyiga</span> <br>
                                                                <strong month="{{ $item->month }}"
                                                                    class="month"></strong>
                                                            </dt>
                                                        </dl>
                                                        <dl class="row">
                                                            <dt class="col-sm-8">Ariza Narxi</dt>
                                                            <dd class="col-sm-4 applicationSum"></dd>
                                                        </dl>
                                                        <dl class="row pers_parent">
                                                            <dt class="col-sm-8">Ustama {{ $item->percentage }}%</dt>
                                                            <dd class="col-sm-4 percentage"
                                                                percentage="{{ $item->percentage }}"></dd>
                                                        </dl>
                                                        <dl class="row totalParent">
                                                            <dt class="col-sm-8 text-truncate">Muddatli to'lov narxi</dt>
                                                            <dd class="col-sm-4 totalSum">

                                                            </dd>
                                                        </dl>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                        </a>
                                    </div>
                                </div>

                                <div id="social-links" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">Mijoz uchun qulay bo'lgan to'lov kunini tanlang</h5>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="goosummadategle">Birinchi to'lov sanasi</label>
                                            <input type="date" id="summadate" name="payment_date"
                                                class="form-control" />
                                            <input type="hidden" id="products" name="products[]">
                                            <input type="hidden" name="percentage" class="percentage_month">
                                            <input type="hidden" name="month" class="month_number">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success">Ariza yaratish</button>
                                    </div>
                            </form>
                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>
    </div>
    <!-- END: Content-->

@endsection

@section('js')
    <script src="app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    {{-- <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script> --}}
    <script src="app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="app-assets/js/scripts/forms/form-wizard.js"></script>
    <script src="app-assets/js/scripts/forms/form-repeater.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script>
        $(document).ready(function() {
            var sum = 0;
            var ids = [];
            $('#list_id').on("change", function(e) {
                var name = $(this).val();
                var element = $(this).find('option:selected');
                var price = element.attr("price");
                var product_id = element.attr("myId");
                ids.push(product_id);

                $('#products').val(ids);
                var tr = `<tr> <td>${name}</td> <td>${price}</td> </tr>`;

                $('#list').prepend(tr);
                sum += parseFloat(price);

                $('#jami').html(sum);

                $(".applicationSum").text(sum);

                $('.percentage').each(function(index) {
                    var prc = $(this).attr('percentage');
                    var s = sum / 100 * prc;
                    $(this).text(s)
                })

                $('.totalSum').each(function(index) {
                    var pers_parent = $(this).parent().parent().children('.pers_parent').children(
                        '.percentage').text();

                    $(this).text(sum + +pers_parent);
                })

                $('.month').each(function(index) {
                    var totalParent = $(this).parent().parent().parent().children('.totalParent')
                        .children(
                            '.totalSum').text();

                    var monthes = $(this).attr('month')

                    $(this).text(Math.ceil(totalParent / monthes));
                })

            });

            $('.radio-prs').on("change", function(e) {
                var summa = $(this).parent().parent().parent().children('.totalParent').children(
                    '.totalSum').text();
                var perss = $(this).parent().parent().parent().children('.pers_parent').children(
                    '.percentage').attr('percentage');
                var mm = $(this).parent().parent().parent().children('.mmonth').children(
                    '.mmmonth').children('.mmmmonth').text();

                $('.percentage_month').val(perss);
                $('.month_number').val(mm);

                $(this).val(summa);
            });



        });
    </script>
@endsection
