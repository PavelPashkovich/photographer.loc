@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main admin</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        @foreach($comments as $comment)
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-sm" src="{{ asset('storage/'.$comment->user->avatar) }}" alt="User Image">
                                <span class="username">
                                <span class="text-danger">{{ $comment->user->name }}</span>
                                <form action="{{ route('admin.comment.destroy', $comment) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="float-right btn-tool btn bg-transparent" title="Delete"><i class="far fa-trash-alt"></i></button>
                                </form>
                          <a href="{{ route('admin.comment.edit', $comment) }}" class="float-right btn-tool" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </span>
                                <span class="description">left comment to photo <a href="{{ route('main.photo.index', $comment->photo->slug) }}"><b>{{ $comment->photo->name }}</b></a> by <a
                                        href="{{ route('main.user.show', $comment->photo->user->slug) }}"><i>{{ $comment->photo->user->name }}</i></a> - {{ $comment->created_at }}</span>
                            </div>
                            <!-- /.user-block -->
                            <p>{{ $comment->comment }}</p>
                        </div>
                        @endforeach
                        <!-- /.post -->

                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
