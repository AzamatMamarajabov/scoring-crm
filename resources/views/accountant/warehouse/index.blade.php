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
                                <h4 class="card-title">Maxsulotlar</h4>
                            </div>
                            @include('admin.layout.message')
                            <div class="col-12 text-right">
                                <a href="{{ route('warehouse.create') }}">Qo'shish</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Nomi</th>
                                            <th>Rasmi</th>
                                            <th>Kirim</th>
                                            <th>Chiqim</th>
                                            <th>Qoldiq</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($warehouse as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <img width="50" height="30"
                                                        src="{{ asset('/uploads/' . $item->image) }}"
                                                        alt="{{ $item->name }} img">
                                                </td>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->sold }}</td>
                                                <td>{{ $item->residual }}</td>
                                                <td class="d-flex justify-content-between">
                                                    <a class="" href="{{ route('warehouse.show', $item->id) }}">
                                                        <i data-feather="eye" class="mr-50"></i>
                                                    </a>
                                                    <a class="" href="{{ route('warehouse.edit', $item->id) }}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                    </a>
                                                    <form action="{{ route('warehouse.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <label for="delete">
                                                            <button type="submit" onclick="return confirm('Delete?')"
                                                                id="delete" class="d-none"></button>
                                                            <i data-feather="trash" class="mr-50"></i>
                                                        </label>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
