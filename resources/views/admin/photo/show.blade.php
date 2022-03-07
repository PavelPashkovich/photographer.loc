@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex justify-content-start">
                        <h1 class="m-0 mr-2">{{ $photo->name }}</h1>
                        <a href="{{ route('admin.photo.edit', $photo->id) }}" class="px-2" title="Edit"><i class="far fa-edit"></i></a>
                        <form action="{{ route('admin.photo.destroy', $photo->id) }}" method="post">
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.photo.index') }}">Photos</a></li>
                        <li class="breadcrumb-item active">{{ $photo->name }}</li>
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
                        <img class="img-circle" src="{{ asset('storage/'.$photo->user->avatar) }}" alt="User Image">
                        <span class="username"><a href="#">{{ $photo->user->name }}</a></span>
                        <span class="description">Shared publicly - {{ $photo->created_at }}</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" title="Mark as read">
                            <i class="far fa-circle"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <img class="img-fluid pad" src="{{ asset('storage/'.$photo->photo) }}" alt="Photo">

                    <p>I took this photo this morning. What do you guys think?</p>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                    <span class="float-right text-muted">127 likes - 3 comments</span>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection
