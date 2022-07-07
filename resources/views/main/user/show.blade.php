@extends('layouts.main')
@section('content')

    <div class="px-4 py-5">
        <div class="container-fluid">
            <div class="p-5 mb-5 bg-light">
                <div class="row gy-3">
                    <div class="col-sm-9">
                        <h1 class="fw-normal">Hello! I'm <strong>{{ $user->name }}</strong>. </h1>
                        <div class="p-4 bg-light mb-3">
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">City:</h6>
                                    <a href="{{ route('main.city.show', $user->city->slug) }}"><p class="ms-3 text-muted mb-0">{{ $user->city->name }}</p></a>
                                </li>
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">Address:</h6>
                                    <p class="ms-3 text-muted mb-0">{{ $user->address }}</p>
                                </li>
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">Phone:</h6>
                                    <p class="ms-3 text-muted mb-0">{{ $user->phone }}</p>
                                </li>
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">Email:</h6>
                                    <p class="ms-3 text-muted mb-0">{{ $user->email }}</p>
                                </li>
                            </ul>
                        </div>
                        <p class="text-muted mb-4">About me: </p>
                        <ul class="list-inline mb-0">

                            <li class="list-inline-item my-2">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fab fa-dribbble"></i></a></li>
                                    <li class="list-inline-item"><a class="reset-anchor" href="#!"><i class="fas fa-envelope"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3"><img class="img-fluid img-thumbnail rounded-circle" src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->name }}"></div>
                </div>
                @auth()
                    <li class="list-inline-item w-25">
                        <form class="form-horizontal" style="margin-top: 30px" action="{{ route('main.user.message.store', $user->slug) }}" method="post">
                            @csrf
                            <div class="input-group input-group-sm mb-0">
                                <input class="form-control form-control-sm" placeholder="Write me a message" name="user-message">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-danger">Send</button>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>
                            @error('user-message')
                            <div class="text-danger">
                                <p><small>{{ $message }}</small></p>
                            </div>
                            @enderror
                        </form>
                    </li>
                @endauth
            </div>
            <div class="px-lg-5">
                <div class="row text-center align-items-stretch">
                    <div class="col-lg-3">
                        <div class="border p-4 h-100 d-flex align-items-center">
                            <div class="w-100">
                                <svg class="svg-icon text-gray mb-2">
                                    <use xlink:href="#stack-1"> </use>
                                </svg>
                                <h5>Photos</h5>
                                <p class="mb-0 text-gray h5">{{ $user->photos->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="border p-4 h-100 d-flex align-items-center bg-light">
                            <div class="w-100">
                                <svg class="svg-icon text-gray mb-2">
                                    <use xlink:href="#time-1"> </use>
                                </svg>
                                <h5>Comments</h5>
                                <p class="mb-0 text-gray h5">{{ $user->comments->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="border p-4 h-100 d-flex align-items-center">
                            <div class="w-100">
                                <svg class="svg-icon text-gray mb-2">
                                    <use xlink:href="#quality-1"> </use>
                                </svg>
                                <h5>Liked photos</h5>
                                <p class="mb-0 text-gray h5">{{ $user->likedPhotos->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="border p-4 h-100 d-flex align-items-center bg-light">
                            <div class="w-100">
                                <svg class="svg-icon text-gray mb-2">
                                    <use xlink:href="#hot-coffee-1"> </use>
                                </svg>
                                <h5>Coffee consumed</h5>
                                <p class="mb-0 text-gray h5">18000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="px-4 py-2">
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
                                        <a href="{{ route('main.photo.index', ['slug' => $photo->slug]) }}"><h4 class="card-title text-primary text-white"><strong>{{ $photo->name }}</strong></h4></a>
                                        <a href="{{ route('main.category.show', ['slug' => $photo->category->slug]) }}"><h6 class="card-text text-white pb-2">{{ $photo->category->name }}</h6></a>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-white" style="font-size: 13px">by {{ $photo->user->name }}</h6>
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
