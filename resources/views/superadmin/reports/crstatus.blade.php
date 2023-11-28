@extends('admin.layout.layout')
@section('title', "Kredit holati")

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">


        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="card-title">Kredit holati</h4>
                            <p>{{ date('d.m.Y H:i') }} holatiga ko'ra</p>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">№</th>
                                        <th class="text-center">Oy</th>
                                        <th class="text-center">Rejalashtirilgan to'lovlar (shartnoma)</th>
                                        <th class="text-center">To'lovlar amalga oshirildi</th>
                                        <th class="text-center">Qolgan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monthlyTotals as $month => $totalSum)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('F Y', strtotime($month . '-01')) }}</td> <!-- Display the month in text format -->
                                        <td>{{ number_format($totalSum) }}</td>
                                        <td>{{ number_format($qoldqSum) }}</td> <!-- Display the calculated qoldqSum -->
                                        <td>{{ number_format($difference) }}</td> <!-- Display the calculated difference -->
                                    </tr>
                                @endforeach






                                    {{-- Umumiy summa --}}
                                    <tr>
                                        <th>Jami</th>
                                        <th> summa</th>
                                        <th>{{ $allPrice }}</th>
                                        <th>{{ $allqoldsum }}</th>
                                        <th>{{ $alldifference }}</th>
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
</div>


@endsection
