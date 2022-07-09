@extends('layouts.main')
@section('content')
<div class="px-4 py-5">
    <div class="container-fluid">
        <div class="row gy-4 gx-5 masonry-wrapper" style="min-height: calc(100vh - 69.609px)">
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        @if($photos->count() > 0)
                        @foreach($photos as $photo)
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="card mb-2 bg-gradient-dark">
                                    <img class="card-img-top" src="{{ asset('storage/'.$photo->photo) }}" alt="{{ $photo->name }}">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <a href="{{ route('main.photo.index', ['slug' => $photo->slug]) }}"><h4 class="card-title text-primary text-white"><strong>{{ $photo->name }}</strong></h4></a>
                                        <a href="{{ route('main.category.show', $photo->category->slug) }}"><h6 class="card-text text-white pb-2">{{ $photo->category->name }}</h6></a>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('main.user.show', $photo->user->slug) }}"><h6 class="text-white" style="font-size: 13px">by {{ $photo->user->name }}</h6></a>
                                            <div class="d-flex">
                                                @guest()
                                                    <div >
                                                        <i class="far fa-comments text-white" style="margin-right: 10px"> {{ $photo->comments->count() }} </i>
                                                    </div>
                                                    <div>
                                                        <i  class="text-white far fa-heart"> {{ $photo->likedUsers->count() }}</i>
                                                    </div>
                                                @endguest
                                                @auth()
                                                @if(!($photo->user->id == auth()->user()->id))
                                                <div style="margin-top: 1px; margin-right: 2px">
                                                    <i class="far fa-comments text-white"> {{ $photo->comments->count() }} </i>
                                                </div>
                                                <div>
                                                    <form action="{{ route('photo.like.store', $photo->slug) }}" method="post">
                                                        @csrf
                                                        <button  class="text-white border-0 bg-transparent">
                                                            @if(auth()->user()->likedPhotos->contains($photo->id))
                                                                <i class="fas fa-heart"></i>
                                                            @else
                                                                <i class="far fa-heart"></i>
                                                            @endif
                                                                {{ $photo->likedUsers->count() }}
                                                        </button>
                                                    </form>
                                                </div>
                                                @else
                                                <div style="margin-right: 8px">
                                                    <i class="far fa-comments text-white"> {{ $photo->comments->count() }} </i>
                                                </div>
                                                <div>
                                                    <span  class="text-white border-0 bg-transparent" title="You can not like your photo ;)">
                                                        @if(auth()->user()->likedPhotos->contains($photo->id))
                                                            <i class="fas fa-heart"></i>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                        @endif
                                                        {{ $photo->likedUsers->count() }}
                                                    </span>
                                                </div>
                                                @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
{{--                <div class="mx-auto">--}}
{{--                    {{ $photos->links() }}--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
