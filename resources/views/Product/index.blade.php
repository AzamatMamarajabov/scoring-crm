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
                            <a class="btn btn-outline-primary waves-effect mb-2" href="{{ route('products.create') }}">Qo'shish</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Do'kon</th>
                                        <th>Nomi</th>
                                        <th>Rasmi</th>
                                        <th>Narxi ($)</th>
                                        <th>Narxi (So'm)</th>
                                        <th>Shtrix code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    @if (Auth::user()->store_id == $item->store_id || Auth::user()->role=='superadmin')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->store->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img width="30" height="30" style="border-radius: 50%" src="{{ asset('/uploads/' . $item->image) }}" alt="{{ $item->name }} img">
                                        </td>
                                        <td>{{ number_format( $item->price / $dollar->dollar, 2) }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->shtrix_code }}</td>
                                        <td class="d-flex justify-content-between">
                                            <a class="btn btn-sm btn-success" href="{{ route('productImage', $item->id) }}">
                                                <i data-feather="dollar-sign"></i>
                                            </a>

                                            <a class="btn btn-sm btn-primary" href="{{ route('products.show', $item->id) }}">
                                                <i data-feather="eye"></i>
                                            </a>
                                            @php
                                            $created_at = $item->created_at;
                                            $canDelete = now()->subHours(24)->gt($created_at);
                                            @endphp
                                            @if(!$canDelete && Auth::user()->role=='admin' || Auth::user()->role=='superadmin')

                                            <a class="btn btn-sm btn-warning" href="{{ route('products.edit', $item->id) }}">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            @else
                                            <button class="btn btn-sm btn-warning" disabled><i data-feather="edit-2"></i></button>
                                            @endif

                                            @if(!$canDelete && Auth::user()->role=='admin' || Auth::user()->role=='superadmin')
                                            <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <label class="btn btn-sm btn-danger" for="delete{{$item->id}}">
                                                    <button type="submit" onclick="return confirm('O\'chirilsinmi?')" id="delete{{$item->id}}" class="d-none"></button>
                                                    <i data-feather="trash"></i>
                                                </label>
                                            </form>
                                            @else
                                            <button class="btn btn-sm btn-danger" disabled><i data-feather="trash"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
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
