@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">


        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-12">
                    <a href="{{route('products.index')}}">Bosh sahifa</a>
                </div>
            </div>
            <div class="row justify-content-center text-center align-items-center" id="print">
                <div class="col-6">
                    <img width="100" height="50" src="{{asset('/uploads/'.$image->logotip)}}" alt="">
                </div>
                <div class="col-6">
                    <h1>#{{ $product->shtrix_code }}</h1>
                </div>
                <div class="col-12 text-center">
                    <h1>{{ $product->name }}</h1>
                </div>

                <div class="col-10">
                    <table class="table table-bordered text-center">
                        @foreach ($percentage as $item)
                        <tr>
                            <th>{{ $item->month }} oyga</th>
                            <th>{{ number_format(((($product->price /100)*$item->percentage)+$product->price)/$item->month) }} so'm</th>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Boshlang'ich to'lovsiz</th>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Basic Tables end -->
            <div class="row">
                <div class="col-12 mt-3 justify-content-center text-center align-items-center">
                    <button class="btn btn-success mr-2" id="printtables">Chop etish</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/print-this/printThis.min.js"></script>
<script>
    $(document).ready(function() {
        $('#printtables').click(function() {
            $('#print').printThis({
                importCSS: true
                , importStyle: true
                , deferredLoading: true
            });
        });
    });

</script>
@endsection
