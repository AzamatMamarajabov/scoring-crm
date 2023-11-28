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
                            <h4 class="card-title">Hodim haqida</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-primary waves-effect mb-2" href="{{ route('workers.index') }}">Bosh sahifa</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <td>{{ $worker->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ismi</th>
                                        <td>{{ $worker->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telefon raqami</th>
                                        <td>{{ $worker->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ish vaqti</th>
                                        <td>{{ $worker->working_time }}</td>
                                    </tr>
                                    <tr>

                                        <th>Xozirda oylik maoshi</th>
                                        <td>{{ number_format($worker->salary) }} so'm</td>
                                    </tr>
                                    <tr>

                                        <th>Ota-ona telefon raqami</th>
                                        <td>{{ $worker->other_phone }}</td>
                                    </tr>

                                    <tr>
                                        <th>Hodimni o'chirish</th>
                                        <td>
                                            <form action="{{ route('workers.destroy', $worker->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <label class="btn btn-sm btn-danger" for="delete{{$worker->id}}">
                                                    <button type="submit" onclick="return confirm('Delete?')" id="delete{{$worker->id}}" class="d-none"></button>
                                                    <i data-feather="trash"></i>
                                                </label>

                                            </form>
                                        </td>
                                    </tr>

                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h6>Jarima hamda Bonuslar</h6>
                </div>

                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Nomi</th>
                                    <th>Vaqti</th>
                                    <th>Summasi</th>
                                    <th>Sababi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workerHistories as $item)
                                <tr class="{{ $item->worker_type === 'Jarima' ? 'text-danger' : 'text-success' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->worker_type}}</td>
                                    <td>{{ date_format($item->created_at,"d.m.Y H:i:s"); }}</td>
                                    <td>{{ number_format($item->summa)}} so'm</td>
                                    <td>{{ $item->comment}}</td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h6>Oylik</h6>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Vaqti</th>
                                    <th>Summasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workerSalaries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date_format($item->created_at,"d.m.Y H:i:s"); }}</td>
                                    <td>{{ number_format($item->salary)}} so'm</td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>


@endsection
