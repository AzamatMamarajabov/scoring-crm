@extends('admin.layout.layout')
@section('title', 'Asosiy')

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
                            <h4 class="card-title">Ariza haqida batafsil ma'lumot</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{ route('accountant.checkapplication') }}">Bosh sahifa</a>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="collapse-margin" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header collapsed" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <span class="lead collapse-title"> Mijoz haqida ma'lumot</span>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Familyasi</th>
                                                            <td>{{ $application->costumer->passport_surname }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Otasining ismi</th>
                                                            <td>{{ $application->costumer->costumer_father_name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Ismi</th>
                                                            <td>{{ $application->costumer->costumer_name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Jinsi</th>
                                                            <td>{{ $application->costumer->customSelect }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Tug'il sanasi</th>
                                                            <td>{{ $application->costumer->costumer_birthday }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Jshshir</th>
                                                            <td>{{ $application->costumer->jshshir }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Millati</th>
                                                            <td>{{ $application->costumer->citizenship }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Viloyat</th>
                                                            <td>{{ $application->costumer->region }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Yashash manzili </th>
                                                            <td>{{ $application->costumer->register_address }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tug'ilgan joyi</th>
                                                            <td>{{ $application->costumer->birthplace }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kim tomonidan berilgan</th>
                                                            <td>{{ $application->costumer->given_by_whom }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Berilgan sanasi</th>
                                                            <td>{{ $application->costumer->date_of_issue }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Amal qilish muddati </th>
                                                            <td>{{ $application->costumer->validity_period }}</td>
                                                        </tr>
                                                        @foreach ($cards as $card)
                                                        <tr class="text-center text-success">
                                                            <th colspan="2">Carta raqamlar</th>
                                                        </tr>
                                                        <tr>
                                                            <th>{{$loop->iteration}}. F.I.O</th>
                                                            <td>{{ $card->customer_card_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Raqami</th>
                                                            <td>{{ $card->customer_card_number }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Amal qilish mudati</th>
                                                            <td>{{ $card->customer_card_term }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Telefon raqam</th>
                                                            <td>{{ $card->customer_card_phone_number }}</td>
                                                        </tr>
                                                        @endforeach

                                                        <tr>
                                                            <th>Oilaviy ahvol</th>
                                                            <td>{{ $application->costumer->marital_status }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Tanlangan til</th>
                                                            <td>{{ $application->costumer->cos_language }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Faoliyat sohasi</th>
                                                            <td>{{ $application->costumer->field_of_activity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lavozim</th>
                                                            <td>{{ $application->costumer->customer_position }}</td>
                                                        </tr>
                                                        @foreach ($contacts as $contact)
                                                        <tr class="text-center text-success">
                                                            <th colspan="2">Boshqa Telefon raqamlar</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Telefon raqami</th>
                                                            <td>{{ $contact->other_contact_phone }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Kim? Birodar,singil</th>
                                                            <td>{{ $contact->other_contact_kinship }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Raqam egasining ismi</th>
                                                            <td>{{ $contact->other_contact_name }}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <th>Pasport oldi rasmi</th>
                                                            <td>

                                                                <img width="100" height="70" src="{{ asset('/uploads/' . $application->costumer->passport_front_image) }}" alt=" img">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pasport orqa rasmi</th>
                                                            <td>
                                                                <img width="100" height="70" src="{{ asset('/uploads/' . $application->costumer->passport_back_image) }}" alt=" img">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Pasport egasinig rasmi</th>
                                                            <td>
                                                                <img width="100" height="70" src="{{ asset('/uploads/' . $application->costumer->passport_customer_image) }}" alt="img">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            @if ($application->costumer->other_file)
                                                            <th>Qo'chimcha</th>
                                                            <td>

                                                                <img width="100" height="70" src="{{ asset('/uploads/' . $application->costumer->other_file) }}" alt=" img">

                                                            </td>
                                                            @else
                                                            @endif
                                                        </tr>

                                                        <tr>
                                                            <th>Limit Status</th>
                                                            <td>{{ $application->costumer->limit_status }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Limit</th>
                                                            <td>{{ $application->costumer->limit }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">

                                <tr>
                                    <th>Xodimni ismni</th>
                                    <td>
                                        {{ $application->worker->name }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Mijoz ismni</th>
                                    <td>
                                        {{ $application->costumer->costumer_name }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Tanlagan mahsulotlari</th>
                                    <td>
                                        @foreach($productModels as $item)
                                        {{$loop->iteration}}. {{$item[0]->name}} |
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <th>Oy</th>
                                    <td>{{ $application->month }}</td>
                                </tr>

                                <tr>
                                    <th>Foiz</th>
                                    <td>{{ $application->percentage }}</td>
                                </tr>

                                <tr>
                                    <th>To'lov sanasi</th>
                                    <td>{{ $application->payment_date }}</td>
                                </tr>

                                <tr>
                                    <th>Birinchi to'lovi</th>
                                    <td>{{ $application->first_payment }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    @if ($application->status == 'new')
                                    <td>Yangi</td>
                                    @endif
                                    @if ($application->status == 1)
                                    <td>Rad Etilgan</td>
                                    @endif
                                    @if ($application->status == 2)
                                    <td>Tasdiqlangan</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Summa</th>
                                    <td>{{ number_format($application->sum ) }} so'm</td>
                                </tr>





                                @if (
                                $application->costumer->limit == $application->sum ||
                                ($application->sum < $application->costumer->limit && $application->status == 'new'))
                                    <tr>
                                        <th>Limit Status</th>
                                        <td class="text-warning">{{ $application->costumer->limit_status }}</td>
                                    </tr>

                                    <tr>
                                        <th>Limit</th>
                                        <td class="text-success">{{ number_format($application->costumer->limit ) }} so'm</td>
                                    </tr>
                                    <tr>
                                        <th class="text-success">Limit yetadi</th>
                                        <th>
                                            <form action="{{ route('accountant.checkapplicationNoConfirm') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status_id" value="{{ $application->id }}">
                                                <input type="hidden" name="status" value="2">
                                                <button class="btn btn-success mr-2 btn-sm" type="submit">Tasdiqlash</button>
                                            </form>
                                        </th>
                                    </tr>
                                    @endif

                                    @if (
                                    $application->costumer->limit == $application->sum ||
                                    ($application->sum > $application->costumer->limit && $application->status == 'new'))
                                    <tr>
                                        <th>Limit Status</th>
                                        <td class="text-warning">{{ $application->costumer->limit_status }}</td>
                                    </tr>

                                    <tr>
                                        <th>Limit</th>
                                        <td class="text-danger">{{ number_format($application->costumer->limit ) }} so'm</td>
                                    </tr>
                                    <tr>
                                        <th class="text-danger">Mablag' yetarli emas</th>
                                        <th>
                                            <form action="{{ route('accountant.checkapplicationNoConfirm') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status_id" value="{{ $application->id }}">
                                                <input type="hidden" name="status" value="1">
                                                <button class="btn btn-danger mr-2 btn-sm" type="submit">Rad
                                                    etish</button>
                                            </form>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Holat</th>
                                        <td class="text-success">Boshlang'ich to'lov bilan mumkin!</td>
                                    </tr>
                                    <tr>
                                        <th>Boshlang'ich to'lov</th>
                                        <td class="text-success">{{ number_format($application->sum - $application->costumer->limit) }} so'm</td>
                                    </tr>
                                    <tr>
                                        <th class="text-success">Qabul qilish</th>
                                        <th>
                                            <form action="{{ route('accountant.checkapplicationNoConfirm') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status_id" value="{{ $application->id }}">
                                                <input type="hidden" name="status" value="2">
                                                <button class="btn btn-success mr-2 btn-sm" type="submit">Tasdiqlash</button>
                                            </form>
                                        </th>
                                    </tr>
                                    @endif






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
