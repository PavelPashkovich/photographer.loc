@extends('layouts.main')
@section('content')
<div class="px-4 py-5">
    <div class="container-fluid">
        <div class="row gy-4 gx-5 masonry-wrapper">
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        @foreach($photos as $photo)
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="card mb-2 bg-gradient-dark">
                                    <img class="card-img-top" src="{{ asset('storage/'.$photo->photo) }}" alt="{{ $photo->name }}">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <a href="{{ route('admin.photo.show', $photo->id) }}"><h4 class="card-title text-primary text-white"><strong>{{ $photo->name }}</strong></h4></a>
                                        <h6 class="card-text text-white pb-2">{{ $photo->category->name }}</h6>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-white">{{ $photo->created_at }}</h6>
                                            <div class="d-flex">
                                                <div >
                                                    <i class="far fa-comments text-white" style="margin-right: 10px"> {{ $photo->comments->count() }} </i>
                                                </div>
                                                <div>
                                                    <i class="far fa-heart text-white"> {{ $photo->likedUsers->count() }}  </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto">
                    {{ $photos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
