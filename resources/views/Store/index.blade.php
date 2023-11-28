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
                                <h4 class="card-title">Do'konlar</h4>
                            </div>
                            @include('admin.layout.message')
                            <div class="col-12 text-right">
                                <a class="btn btn-outline-primary waves-effect mb-2" href="{{ route('stores.create') }}">Qo'shish</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stores as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td class="d-flex justify-content-between">
                                                    <a class="" href="{{ route('stores.show', $item->id) }}">
                                                        <i data-feather="eye" class="mr-50"></i>
                                                    </a>
                                                    <a class="" href="{{ route('stores.edit', $item->id) }}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                    </a>
                                                    <form action="{{ route('stores.destroy', $item->id) }}"
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
