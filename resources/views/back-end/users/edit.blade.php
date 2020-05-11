@extends('back-end.layouts.master')

@section('content')
@if (session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            {{ session()->get('error') }}
        </div>
    </div>
@endif
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Edit User</div>
        <div class="card-body card-block">
            <form action="{{ route('be.user-update', ['id'=>$user['id']]) }}" method="post" class="">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="input-group">
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Select Role</option>
                            <option value="admin" @if($user['role'] == 'admin') selected @endif>Admin</option>
                            <option value="mentor" @if($user['role'] == 'mentor') selected @endif>Mentor</option>
                            <option value="trainee" @if($user['role'] == 'trainee') selected @endif>Trainee</option>
                        </select>
                        <div class="input-group-addon" style="background-color:#4272d7; color:whitesmoke; border-color:#4272d7">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{ $user['name'] }}" required>
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{ $user['email'] }}" required>
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                        <div class="input-group-addon">
                            <i class="fa fa-asterisk"></i>
                        </div>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection