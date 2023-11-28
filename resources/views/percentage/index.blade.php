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
                                <h4 class="card-title">Foizlar</h4>
                            </div>
                            @include('admin.layout.message')
                            <div class="col-12 text-right">
                                <a class="btn btn-outline-primary waves-effect mb-2" href="{{ route('percentages.create') }}">Qo'shish</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Oy</th>
                                            <th>Foiz</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($percentages as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->month }}</td>
                                                <td>{{ $item->percentage }}</td>
                                                <td class="d-flex justify-content-between">
                                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('percentages.show', $item->id) }}">
                                                        <i data-feather="eye" ></i>
                                                    </a>
                                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('percentages.edit', $item->id) }}">
                                                        <i data-feather="edit-2" ></i>
                                                    </a>
                                                    <form action="{{ route('percentages.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <label class="btn btn-outline-primary btn-sm" for="delete">
                                                            <button type="submit" onclick="return confirm('Delete?')"
                                                                id="delete" class="d-none"></button>
                                                            <i data-feather="trash" ></i>
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
