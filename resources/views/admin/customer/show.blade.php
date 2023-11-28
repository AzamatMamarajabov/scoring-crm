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
                            <h4 class="card-title">Mijoz haqida</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-primary waves-effect mb-2" href="{{ route('customer.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Familyasi</th>
                                    <td>{{ $data->passport_surname }}</td>
                                </tr>

                                <tr>
                                    <th>Otasining ismi</th>
                                    <td>{{ $data->costumer_father_name }}</td>
                                </tr>

                                <tr>
                                    <th>Ismi</th>
                                    <td>{{ $data->costumer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Asosiy raqami</th>
                                    <td>{{ $data->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Jinsi</th>
                                    <td>{{ $data->customSelect }}</td>
                                </tr>

                                <tr>
                                    <th>Tug'il sanasi</th>
                                    <td>{{ $data->costumer_birthday }}</td>
                                </tr>

                                <tr>
                                    <th>Jshshir</th>
                                    <td>{{ $data->jshshir }}</td>
                                </tr>

                                <tr>
                                    <th>Millati</th>
                                    <td>{{ $data->citizenship }}</td>
                                </tr>
                                <tr>
                                    <th>Viloyat</th>
                                    <td>{{ $data->region }}</td>
                                </tr>
                                <tr>
                                    <th>Yashash manzili </th>
                                    <td>{{ $data->register_address }}</td>
                                </tr>
                                <tr>
                                    <th>Tug'ilgan joyi</th>
                                    <td>{{ $data->birthplace }}</td>
                                </tr>
                                <tr>
                                    <th>Kim tomonidan berilgan</th>
                                    <td>{{ $data->given_by_whom }}</td>
                                </tr>
                                <tr>
                                    <th>Berilgan sanasi</th>
                                    <td>{{ $data->date_of_issue }}</td>
                                </tr>
                                <tr>
                                    <th>Amal qilish muddati </th>
                                    <td>{{ $data->validity_period }}</td>
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
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <th>Oilaviy ahvol</th>
                                    <td>{{ $data->marital_status }}</td>
                                </tr>

                                <tr>
                                    <th>Tanlangan til</th>
                                    <td>{{ $data->cos_language }}</td>
                                </tr>
                                <tr>
                                    <th>Faoliyat sohasi</th>
                                    <td>{{ $data->field_of_activity }}</td>
                                </tr>
                                <tr>
                                    <th>Lavozim</th>
                                    <td>{{ $data->customer_position }}</td>
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

                                        <img width="100" height="70" src="{{ asset('/uploads/' . $data->passport_front_image) }}" alt=" img">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pasport orqa rasmi</th>
                                    <td>
                                        <img width="100" height="70" src="{{ asset('/uploads/' . $data->passport_back_image) }}" alt=" img">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Pasport egasinig rasmi</th>
                                    <td>
                                        <img width="100" height="70" src="{{ asset('/uploads/' . $data->passport_customer_image) }}" alt="img">
                                    </td>
                                </tr>
                                <tr>
                                    @if($data->other_file)
                                    <th>Qo'chimcha</th>
                                    <td>

                                        <img width="100" height="70" src="{{ asset('/uploads/' . $data->other_file) }}" alt=" img">

                                    </td>
                                    @else
                                    @endif
                                </tr>

                                <tr>
                                    <th>Limit Status</th>
                                    <td>{{ $data->limit_status }}</td>
                                </tr>

                                <tr>
                                    <th>Limit</th>
                                    <td>{{ $data->limit }}</td>
                                </tr>

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
