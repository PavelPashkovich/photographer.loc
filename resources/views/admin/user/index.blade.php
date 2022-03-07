@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Add new</a>
                </div>
                <!-- ./col -->
            </div>
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">

                    <div class="card-body pb-0">
                        <div class="row">
                            @foreach($users as $user)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">

                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{$user->name}}</b></h2>
                                                <p class="text-muted text-sm">({{ $user->role->name }})</p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> City: {{ $user->city->name }}</li>
                                                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:{{ $user->phone }}</li>
                                                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-mail-bulk"></i></span> E-mail: {{ $user->email }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                @if(isset($user->avatar) && !empty($user->avatar))
                                                    <img src="{{ asset('storage/'.$user->avatar) }}" alt="user-avatar" class="img-circle img-fluid w-75">
                                                @else
                                                    <img src="{{ asset('storage/avatars/noavatar.jpg') }}" alt="user-avatar" class="img-circle img-fluid w-75">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right d-flex justify-content-end">
                                            <a href="#" class="btn btn-sm btn-primary mr-2"><i class="fas fa-user"></i> View Profile </a>
                                            <a href="#" class="btn btn-sm bg-teal mr-2"><i class="fas fa-comments"></i></a>
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm bg-cyan mr-2"><i class="far fa-edit" title="Edit"></i></a>
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                <!-- /.card-body -->
                    <div class="m-auto">
                        {{ $users->links() }}
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->

            </section>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
