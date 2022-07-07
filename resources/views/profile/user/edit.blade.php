@extends('profile.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{ $user->name }}</h3>
                            <h5 class="widget-user-desc">@if(isset($user->role->name)){{ $user->role->name }}@else{{ \App\Models\Role::ROLE_PHOTOGRAPHER }}@endif</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="@if(isset($user->avatar)){{ asset('storage/'.$user->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->photos->count() }}</h5>
                                        <span class="description-text">PHOTOS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->likedPhotos->count() }}</h5>
                                        <span class="description-text">LIKED PHOTOS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->comments->count() }}</h5>
                                        <span class="description-text">COMMENTS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="col-12 mt-4 mb-2">
                                <form action="{{ route('profile.user.update', $user) }}" method="post" class="w-100" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="User name *" value="{{ $user->name }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="avatar">
                                            <label class="custom-file-label" for="customFile">Choose an avatar</label>
                                        </div>
                                        @error('avatar')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="User email *" value="{{ $user->email }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="User password *" value="{{ $user->password }}">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="User address" value="{{ $user->address }}">
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
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
                                                        @if(isset($user->city->id) && $city->id == $user->city->id)
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
                                        <input type="hidden" class="form-control" name="role_id">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- Box Comment -->
                </div>
                <!-- /.col -->
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
