@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">


        <div class="content-body">
            <!-- Tabs with Icon starts -->
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">


                        @if($status == null)
                        <section id="multiple-column-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Mijoz autentifikatsiyasi</h4>
                                        </div>
                                        @include('admin.layout.message')
                                        <div class="card-body">
                                            @if(isset($otp))
                                            <form action="{{ route('check.otp') }}" class="form" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Tekshirish kodi</label>
                                                            <input type="number" class="form-control" placeholder="Tekshirish kodi" name="otp" required>
                                                        </div>
                                                        <a href="{{ route('reset.otp') }}">Qaytadan yuborish</a>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Tekshirish</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @else
                                            <form action="{{ route('send.otp') }}" class="form" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Telefon raqam</label>
                                                            <input type="text" id="325" class="form-control" placeholder="Telefon raqam" name="phone" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Sms yuborish</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @elseif($status == "success")
                        <section class="modern-vertical-wizard">
                            <div class="bs-stepper vertical wizard-modern modern-vertical-wizard-example">
                                <div class="bs-stepper-header">
                                    <div class="step" data-target="#account-details-vertical-modern">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Passport</span>
                                                <span class="bs-stepper-subtitle">Passport
                                                    ma'lumotlari</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="step" data-target="#personal-info-vertical-modern">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather='credit-card' class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Karta</span>
                                                <span class="bs-stepper-subtitle">Karta qo'shing</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="step" data-target="#address-step-vertical-modern">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="image" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Qo'shimcha rasmlar</span>
                                                <span class="bs-stepper-subtitle">Pasport hamda Mijoz yuzi
                                                    surati</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="step" data-target="#social-links-vertical-modern">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="user" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Shaxsiy ma'lumotlar</span>
                                                <span class="bs-stepper-subtitle">Anketa</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="step" data-target="#otgher-contacts-vertical-modern">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="phone-call" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Kontaktlar</span>
                                                <span class="bs-stepper-subtitle">Qo'shimcha
                                                    kontaktlar</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div id="account-details-vertical-modern" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">Passport</h5>
                                                <small class="text-muted">Enter Your Account Details.</small>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="passport_surname">Familiya</label>
                                                    <input type="text" id="passport_surname" name="passport_surname" class="form-control" placeholder="Familiya" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="costumer_father_name">Sharif</label>
                                                    <input type="text" id="costumer_father_name" name="costumer_father_name" class="form-control" placeholder="Sharif" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="costumer_name">Ism</label>
                                                    <input type="text" id="costumer_name" name="costumer_name" class="form-control" placeholder="Ism" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="gender">Jins</label>
                                                    <select class="custom-select" name="customSelect" id="customSelect" required>
                                                        <option disabled selected="false">Tanlash</option>
                                                        <option value="Erkak">Erkak</option>
                                                        <option value="Ayol">Ayol</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="costumer_birthday">Tug'ilgan
                                                        sana</label>
                                                    <input type="date" id="costumer_birthday" name="costumer_birthday" class="form-control" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="passport_number">Passport
                                                        seriya va raqam</label>
                                                    <input type="text" id="passport_number" name="passport_number" class="form-control" placeholder="AB1234567" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="jshshir">JShShIR</label>
                                                    <input type="text" id="jshshir" name="jshshir" class="form-control" placeholder="Passport raqamidagi oxirgi 14 ta belgilar" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="citizenship">Fuqarolik</label>
                                                    <input type="text" id="citizenship" name="citizenship" class="form-control" placeholder="Fuqarolik" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="region">Viloyat</label>
                                                    <select class="custom-select" name="region" id="region" required>
                                                        <option disabled selected="false">Tanlash</option>
                                                        <option value="Toshkent">Toshkent</option>
                                                        <option value="Samarqand">Samarqand</option>
                                                        <option value="Namangan">Namangan</option>
                                                        <option value="Andijon">Andijon</option>
                                                        <option value="Buxoro">Buxoro</option>
                                                        <option value="Farg'ona">Farg'ona</option>
                                                        <option value="Xorazm">Xorazm</option>
                                                        <option value="Jizzax">Jizzax</option>
                                                        <option value="Qashqadaryo">Qashqadaryo</option>
                                                        <option value="Navoiy">Navoiy</option>
                                                        <option value="Surxondaryo">Surxondaryo</option>
                                                        <option value="Sirdaryo">Sirdaryo</option>
                                                        <option value="Karakalpakistan">Karakalpakistan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label class="form-label" for="register_address">Ro'yxatdan
                                                        o'tgan manzil</label>
                                                    <input type="text" id="register_address" name="register_address" class="form-control" placeholder="Tuman, MFY, Ko'cha, uy nomeri" required />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label" for="birthplace">Tug'ilgan
                                                        joy</label>
                                                    <input type="text" id="birthplace" name="birthplace" class="form-control" placeholder="Tug'ilgan joy" required />
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label class="form-label" for="given_by_whom">Kim
                                                        tomonidan
                                                        berilgan</label>
                                                    <input type="text" id="given_by_whom" name="given_by_whom" class="form-control" placeholder="Passport kim tomondan berilgan" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="date_of_issue">Berilgan
                                                        sana</label>
                                                    <input type="date" id="date_of_issue" name="date_of_issue" class="form-control" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validity_period">Amal
                                                        qilish
                                                        muddati</label>
                                                    <input type="date" id="validity_period" name="validity_period" class="form-control" required />
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
                                        <div id="personal-info-vertical-modern" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">Karta</h5>
                                                <small>Faqatgina Uzcard yoki humocard raqamlarini
                                                    kiriting</small>
                                            </div>
                                            <section class="form-control-repeater repeater">
                                                <div class="row">
                                                    <div class="col-12 invoice-repeater mb-3">
                                                        <div data-repeater-list="invoice1">
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="customer_card_name">Karta
                                                                                egasi</label>
                                                                            <input type="text" id="customer_card_name" name="customer_card_name" class="form-control" placeholder="FIO" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="customer_card_number">Karta
                                                                                raqami</label>
                                                                            <input type="number" id="customer_card_number" name="customer_card_number" class="form-control" placeholder="8600XXXXXXXXXXXX" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="customer_card_term">Amal qilish
                                                                                muddati</label>
                                                                            <input type="date" id="customer_card_term" name="customer_card_term" class="form-control" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="customer_card_phone_number">Karta
                                                                                ulangan nomer</label>
                                                                            <input type="text" id="customer_card_phone_number" name="customer_card_phone_number" class="form-control" placeholder="+998991234567" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <a class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                                <i data-feather="x" class="mr-25"></i>
                                                                                <span>Delete</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <a class="btn btn-icon btn-success" type="button" data-repeater-create>
                                                                    <i data-feather="plus" class="mr-25"></i>
                                                                    <span>Add New</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
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
                                        <div id="address-step-vertical-modern" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">Qo'shimcha rasmlar</h5>
                                                <small>Maksimal fayl hajmi - 5mb</small>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="passport_front_image">Passport
                                                        rasmli
                                                        tomoni</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="passport_front_image" id="passport_front_image" required>
                                                        <label class="custom-file-label" for="customFile">Yuklash</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="passport_back_image">Propiska</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="passport_back_image" id="passport_back_image" required>
                                                        <label class="custom-file-label" for="customFile">Yuklash</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="passport_customer_image">Passport
                                                        mijoz yuzi
                                                        yonida</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="passport_customer_image" id="passport_customer_image" required>
                                                        <label class="custom-file-label" for="customFile">Yuklash</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="other_file">Boshqa
                                                        fayl</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="other_file" id="other_file" required>
                                                        <label class="custom-file-label" for="customFile">Yuklash</label>
                                                    </div>
                                                </div>

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
                                        <div id="social-links-vertical-modern" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">Shaxsiy ma'lumotlar</h5>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="marital_status">Oilaviy
                                                        ahvol</label>
                                                    <select class="custom-select" id="marital_status" name="marital_status" required>
                                                        <option disabled selected="false">Tanlash</option>
                                                        <option value="Turmush qurgan">Turmush qurgan</option>
                                                        <option value="Beva">Beva</option>
                                                        <option value="Ajrashgan">Ajrashgan</option>
                                                        <option value="Turmush qurmagan">Turmush qurmagan</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="cos_language">Tanlangan til</label>
                                                    <select class="custom-select" id="cos_language" name="cos_language" required>
                                                        <option disabled selected="false">Tanlash</option>
                                                        <option value="Turmush qurgan">Uzbek tili</option>
                                                        <option value="Turmush qurgan">Rus tili</option>
                                                    </select>
                                                </div>


                                            </div>


                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="field_of_activity">Faoliyat
                                                        sohasi</label>
                                                    <input type="text" placeholder="Yozing" class="form-control" id="field_of_activity" name="field_of_activity" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="customer_position">Lavozim</label>
                                                    <input type="text" id="customer_position" name="customer_position" class="form-control" placeholder="Lavozim" required />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label class="form-label" id="other_about" for="other_about">
                                                        <strong>Qo'shimchalar</strong>
                                                    </label>
                                                    <textarea class="form-control" id="other_about" name="other_about" rows="3" required=""></textarea>
                                                </div>
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
                                        <div id="otgher-contacts-vertical-modern" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">Kontaktlar</h5>
                                                <small>Asosiy raqam: <strong>{{ $main_phone }}</strong></small> /
                                                <small><a href="{{ route('deleteOtp.otp') }}">Boshqa raqam bilan ro'yxatdan o'tish</a></small>
                                            </div>
                                            <div class="row repeater">
                                                <div class="col-12 invoice-repeater mb-3">
                                                    <div data-repeater-list="invoice2">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="other_contact_phone">Telefon
                                                                            raqami</label>
                                                                        <input type="text" id="other_contact_phone" name="other_contact_phone" class="form-control" placeholder="+998991234567" required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="other_contact_kinship">Kim?
                                                                            Birodar,singil</label>
                                                                        <select class="custom-select" id="other_contact_kinship" name="other_contact_kinship" required>
                                                                            <option disabled selected="false">
                                                                                Tanlash</option>
                                                                            <option value="Ota/Ona">Ota / Ona
                                                                            </option>
                                                                            <option value="Aka / Opa">Aka / Opa
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="other_contact_name">Raqam
                                                                            egasining ismi</label>
                                                                        <input type="text" id="other_contact_name" name="other_contact_name" class="form-control" placeholder="FIO" required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="form-group">
                                                                        <a class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                            <i data-feather="x" class="mr-25"></i>
                                                                            <span>Delete</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="btn btn-icon btn-success" type="button" data-repeater-create>
                                                                <i data-feather="plus" class="mr-25"></i>
                                                                <span>Add New</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" name="store_id" value="{{Auth::user()->store_id}}">
                                            <div class="d-flex justify-content-between">
                                                <a class="btn btn-primary btn-prev">
                                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </a>
                                                <button type="submit" class="btn btn-success btn-submit">Saqlash</button>
                                            </div>
                                        </div>
                                    </form>






                                </div>
                            </div>
                        </section>
                        @endif





                    </div>
                </div>
            </div>
            <!-- Tabs with Icon ends -->


        </div>

    </div>
</div>


<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('admin/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/scripts/forms/form-repeater.js') }}"></script>
<script>
    $('.repeater').repeater();

</script>
@endsection
