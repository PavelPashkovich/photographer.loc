@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editing user "{{ $user->name }}"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.user.update', $user) }}" method="post" class="w-25" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="User name *" value="{{ $user->name }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="w-50 mb-2">
                                <img src="@if(isset($user->avatar)){{ asset('storage/' . $user->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" alt="User avatar" class="w-50">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="avatar">
                                <label class="custom-file-label" for="customFile">Choose an avatar</label>
                            </div>
                            @error('avatar')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="User email *" value="{{ $user->email }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="User password *">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="User address" value="{{ $user->address }}">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="User phone *" value="{{ $user->phone }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select city</label>
                            <select name="city_id" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                            @if($city->id == $user->city->id)
                                            selected
                                    @else
                                        @endif
                                    >{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select role</label>
                            <select name="role_id" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                            @if($role->id == $user->role->id)
                                            selected
                                    @else
                                        @endif
                                    >{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
