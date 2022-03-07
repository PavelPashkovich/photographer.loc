@extends('profile.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Photos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('profile.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item active">Photos</li>
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
                    <a href="{{ route('profile.photo.create') }}" class="btn btn-block btn-primary">Add new</a>
                </div>
                <!-- ./col -->
            </div>
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        @foreach($photos as $photo)
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <div class="card mb-2 bg-gradient-dark">
                                <img class="card-img-top" src="{{ asset('storage/'.$photo->photo) }}" alt="{{ $photo->name }}">
                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <a href="{{ route('profile.photo.show', $photo->id) }}"><h4 class="card-title text-primary text-white"><strong>{{ $photo->name }}</strong></h4></a>
                                    <h6 class="card-text text-white pb-2 pt-1">{{ $photo->category->name }}</h6>
                                    <div class="d-flex justify-content-between">
                                        <h6 href="#" class="text-white">{{ $photo->created_at }}</h6>
                                        <div>
                                            <i class="far fa-comments mr-2"> 5 </i>
                                            <i class="far fa-heart"> 3 </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="m-auto">
{{--                    {{ $photos->links() }}--}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
