@extends('profile.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex justify-content-start">
                        <h1 class="m-0 mr-2">{{ $likedPhoto->name }}</h1>
                        <form action="{{ route('profile.liked-photo.destroy', $likedPhoto->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent" title="Delete">
                                <i class="far fa-trash-alt text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('profile.main.index') }}">Main profile</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profile.liked-photo.index') }}">Liked photos</a></li>
                        <li class="breadcrumb-item active">{{ $likedPhoto->name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-md-7">
            <!-- Box Comment -->
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <img class="img-circle" src="@if(isset($likedPhoto->user->avatar)){{ asset('storage/'.$likedPhoto->user->avatar) }}@else{{ asset('storage/avatars/noavatar.jpg') }}@endif" alt="User Image">
                        <span class="username text-danger">{{ $likedPhoto->user->name }}</span>
                        <span class="description">Shared publicly - {{ $likedPhoto->created_at }}</span>
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
                    <img class="img-fluid pad" src="{{ asset('storage/'.$likedPhoto->photo) }}" alt="Photo">
                    <p></p>
                    <span class="float-right text-muted">
                        <div class="d-flex justify-content-between">
                            <div class="mr-2"><i class="far fa-heart"></i> {{ $likedPhoto->likedUsers->count() }}</div>
                            <div><i class="far fa-comments"></i> {{ $likedPhoto->comments->count() }}</div>
                        </div>
                    </span>
                </div>
                @if($comments->count() > 0)
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
                @endif
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection
