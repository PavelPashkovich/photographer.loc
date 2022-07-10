@extends('profile.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editing photo "{{ $photo->name }}"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('profile.main.index') }}">Main profile</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profile.photo.index') }}">Photos</a></li>
                        <li class="breadcrumb-item active">{{ $photo->name }}</li>
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
                <div class="col-md-7">
                    <!-- Box Comment -->
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <img class="img-circle" src="@if(isset($photo->user->avatar)){{ asset('storage/'.$photo->user->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" alt="User Image">
                                <span class="username text-danger">{{ $photo->user->name }}</span>
                                <span class="description">Shared publicly - {{ $photo->created_at }}</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="card-tools">
                                <div class="text-black-50 mr-2">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ asset('storage/'.$photo->photo) }}" alt="Photo">
                            <p></p>
                            <span class="float-right text-muted">
                            <div class="d-flex justify-content-between">
                                <div class="mr-2"><i class="far fa-heart"></i> {{ $photo->likedUsers->count() }}</div>
                                <div><i class="far fa-comments"></i> {{ $photo->comments->count() }}</div>
                            </div>
                            </span>
                        </div>
                        <!-- /.card-body -->
                        @foreach($comments as $comment)
                        <div class="card-footer card-comments">
                            <div class="card-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="@if(isset($comment->user->avatar)){{ asset('storage/'.$comment->user->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" alt="User Image">

                                <div class="comment-text">
                                <span class="username text-danger">{{ $comment->user->name }}<span class="text-muted float-right">{{ $comment->created_at }}</span></span>
                                    {{ $comment->comment }}
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <hr>
                            <!-- /.card-comment -->
                        </div>
                        @endforeach
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-5">
                    <!-- Box Comment -->
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <img class="img-circle" src="@if(isset($photo->user->avatar)){{ asset('storage/'.$photo->user->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" alt="User Image">
                                <span class="username"><span class="text-danger">{{ $photo->user->name }}</span></span>
                                <span class="description">Shared publicly - {{ $photo->created_at }}</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="card-tools">
                                <div class="text-black-50 mr-2">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <div class="col-12 mt-4 mb-2">
                            <form action="{{ route('profile.photo.update', $photo) }}" method="post" class="w-100" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Photo name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Photo name" value="{{ $photo->name }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Add a photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo">
                                            <label class="custom-file-label">Choose a photo</label>
                                        </div>
                                    </div>
                                    @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Select category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if($category->id == $photo->category->id)
                                                    selected
                                            @else
                                                @endif
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                        <!-- /.card-footer -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
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
