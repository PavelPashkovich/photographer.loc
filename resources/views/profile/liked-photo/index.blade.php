@extends('profile.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liked photos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('profile.main.index') }}">Main profile</a></li>
                        <li class="breadcrumb-item active">Liked photos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if($likedPhotos->count() > 0)
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="card card-success">
                    <div class="card-body">
                        <div class="row">
                            @if($likedPhotos->count() > 0)
                            @foreach($likedPhotos as $likedPhoto)
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top" src="{{ asset('storage/'.$likedPhoto->photo) }}" alt="{{ $likedPhoto->name }}">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <a href="{{ route('profile.liked-photo.show', $likedPhoto->id) }}"><h4 class="card-title text-primary text-white"><strong>{{ $likedPhoto->name }}</strong></h4></a>
                                            <a href="{{ route('main.category.show', ['slug' => $likedPhoto->category->slug]) }}" class="card-text text-white pb-2 pt-1">{{ $likedPhoto->category->name }}</a>
                                            <div class="d-flex justify-content-between">
                                                <h6 href="#" class="text-white">{{ $likedPhoto->created_at }}</h6>
                                                <a href="{{ route('main.user.show', ['slug' => $likedPhoto->user->slug]) }}" class="text-white"> by {{ $likedPhoto->user->name }}</a>
                                                <div>
                                                    <i class="far fa-comments mr-2"> {{ $likedPhoto->comments->count() }} </i>
                                                    <i class="far fa-heart"> {{ $likedPhoto->likedUsers->count() }} </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="m-auto">
                        {{ $likedPhotos->links() }}
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endif
</div>
<!-- /.content-wrapper -->
@endsection
