@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

 <!-- BEGIN: Content-->
 <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">

        <section id="histories">
            <div class="row" id="basic-table">
                <div class="col-12">
                    @include('admin.layout.message')
                </div>
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Kassalar</h4>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="modal-size-default d-inline-block">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#defaultSizes">
                                        Kassa qo'shish <i data-feather='arrow-up'></i>
                                    </button>
                                    <div class="modal fade text-left" id="defaultSizes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Kassa qo'shish</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('supercash.store') }}" method="POST" class="form">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Kassa nomi</label>
                                                                    <input type="text" name="name" min="1" class="form-control" placeholder="Kassa nomi" required>
                                                                </div>
                                                                <input type="hidden" name="store_id" value="{{$store_id}}">
                                                                <input type="hidden" name="user_id" value="{{ $userId}}">
                                                            </div>


                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Saqlash</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Kassa nomi</th>
                                        <th>Sana</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cashes as $cash)
                                    @if ($store_id == $cash->store_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cash->name }}</td>
                                        <td>{{ $cash->created_at->format('d.m.Y H:m') }}</td>
                                        <td class="d-flex justify-content-between">

                                            <a class="btn btn-sm btn-primary" href="{{ route('supercash.show', ['supercash' => $cash->id, 'user_id' => $userId]) }}">
                                                <i data-feather="eye"></i>
                                            </a>


                                            <form action="{{ route('supercash.destroy', ['supercash' => $cash->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <label class="btn btn-sm btn-danger" for="delete{{$cash->id}}">
                                                    <button type="submit" onclick="return confirm('Delete?')" id="delete{{$cash->id}}" class="d-none"></button>
                                                    <i data-feather="trash"></i>
                                                </label>
                                            </form>

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
        </section>

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
