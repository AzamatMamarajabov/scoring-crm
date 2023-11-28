@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

      <!-- Basic Tables start -->
      <div class="row" id="basic-table">
          <div class="col-12">
              @include('admin.layout.message')
          </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Userlar</h4>
                    <div class="dt-buttons btn-group flex-wrap">
                        <a href="{{ route('users.create') }}"> <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in">
                            Yangi User qo'shish</button></a>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ismi</th>
                                <th>Telefon raqami</th>
                                <th>Role</th>
                                <th>Do'kon</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->store->name ?? "-" }}</td>
                                <td>{{ $user->active }}</td>
                                @if($user->role != 'superadmin')
                                <td class="d-flex justify-content-between">
                                    <a class="" href="{{ route('users.edit', ['user' => $user]) }}">
                                        <i data-feather="edit-2" class="mr-50"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <label for="delete">
                                            <button type="submit" onclick="return confirm('Delete?')" id="delete" class="d-none"></button>
                                            <i data-feather="trash" class="mr-50"></i>
                                        </label>
                                    </form>
                                </td>
                                @else
                                <td>
                                    -
                                </td>
                                @endif
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
     <!-- Basic Tables start -->

    <!-- Basic Tables end -->

@endsection
