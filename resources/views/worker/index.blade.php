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
                            <h4 class="card-title">Hodimlar</h4>
                        </div>
                        @include('admin.layout.message')
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-primary waves-effect mb-2" href="{{ route('workers.create') }}">Qo'shish</a>
                        </div>
                        <div class="table-responsive text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Ismi</th>
                                        <th>Telefon</th>
                                        <th>Ish vaqti</th>
                                        <th>Maosh</th>
                                        <th colspan="4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $item)
                                    @if (Auth::user()->id == $item->store_id )
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ date_format($item->working_time,"d/m/Y H:i:s"); }}</td>
                                        <td>{{ number_format($item->salary) }} so'm</td>

                                        <td>
                                            <form action="{{ route('message.workersalary', ['worker_id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <label for="delete">
                                                    <button class="btn btn-sm" type="submit"><i data-feather="mail"></i></button>
                                                </label>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="modal-size-default d-inline-block">
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#defaultSize{{$item->id}}">
                                                    Jarima
                                                </button>
                                                <div class="modal fade text-left" id="defaultSize{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel18">Jarima berish
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('workerfine') }}" method="POST" class="form">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-column">Summasi</label>
                                                                                <input type="number" step="0.01" name="summa" min="1" class="form-control" placeholder="Summa yozing" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-column">Sababi</label>
                                                                                <input type="text" name="comment" class="form-control" placeholder="Aniq sababini yozing" required>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="worker_id" value="{{$item->id}}">
                                                                        <input type="hidden" name="worker_type" value="Jarima">
                                                                        <div class="col-12">
                                                                            <button type="submit" class="btn btn-danger mr-1 waves-effect waves-float waves-light">Jarima berish</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="modal-size-default d-inline-block">
                                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#bonus{{$item->id}}">
                                                    Bonus
                                                </button>
                                                <div class="modal fade text-left" id="bonus{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel18">Bonus berish
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('workerbonus') }}" method="POST" class="form">
                                                                    @csrf
                                                                    <div class="row">

                                                                        <div class="col-md-12 col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-column">Summasi</label>
                                                                                <input type="number" name="summa" min="1" class="form-control" placeholder="Summa yozing" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-column">Sababi</label>
                                                                                <input type="text" name="comment"  class="form-control" placeholder="Aniq sababini yozing" required>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="worker_id" value="{{$item->id}}">
                                                                        <input type="hidden" name="worker_type" value="Bonus">
                                                                        <div class="col-12">
                                                                            <button type="submit" class="btn btn-success mr-1 waves-effect waves-float waves-light">Bonus berish</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm" href="{{route('workers.show', $item->id)}}"><i data-feather="eye"></i></a>
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
