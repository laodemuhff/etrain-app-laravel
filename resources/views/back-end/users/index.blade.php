@extends('back-end.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1 m-b-25">Data {{ ucfirst($role) }}</h2>
                <a class="au-btn au-btn-icon au-btn--blue" href="{{ route('be.user-register') }}">
                    <i class="zmdi zmdi-plus"></i>add user
                </a>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a class="btn btn-primary" href="#"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning" href="{{ route('be.user-edit', ['id' => $user->id]) }}"><i class="fa fa-edit" style="color:white"></i></a>
                                    @if ($user->role != 'admin')
                                        <a class="btn btn-danger delete-confirm" href="#" data-url="{{ route('be.user-delete', ['id' => $user->id]) }}">
                                            <i class="fa fa-trash" style="color:white"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function(event){
            event.preventDefault();
            const url = $(this).data('url');
            swal({
                title: 'Are you sure want to delete this User?',
                text: 'This record and it\'s detail will permanently deleted!',
                icon: 'warning',
                buttons: ['Cancel', 'Yes!'],
            }).then(function(value){
                if(value){
                    window.location.href = url;
                }
            })
        });
    </script>
@endsection