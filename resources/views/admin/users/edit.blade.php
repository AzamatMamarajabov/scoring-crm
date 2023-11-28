@extends('admin.layout.layout')
@section('title', 'Asosiy')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST"  class="form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" id="name" value="{{ $user->name }}"  class="form-control" placeholder="User Name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input type="text" value="{{ $user->phone }}" id="phone" class="form-control" placeholder="Phone number" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="cpassword">Password</label>
                                        <input type="password"  id="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select value="{{ $user->role }}" class="custom-select" name="role" id="role" required>
                                            <option selected="">Role tanlang</option>
                                            <option value="superadmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="manager">Manager</option>
                                            <option value="accountant">Accountant</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="role">Do'kon</label>
                                        <select class="custom-select" name="store_id" id="role" required>
                                            @foreach($stores as $store)
                                               <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button   class="btn btn-primary mr-1 waves-effect waves-float waves-light">Saqlash</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
