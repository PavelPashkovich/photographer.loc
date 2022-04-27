@extends('layouts.main')
@section('content')
        <div class="px-4 py-5">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-lg-7"><a class="glightbox product-view" href="{{ asset('storage/'.$photo->photo) }}" target="_blank" data-gallery="gallery" data-glightbox="Tour de France"><img class="img-fluid mb-4" src="{{ asset('storage/'.$photo->photo) }}" alt="{{ $photo->name }}"></a></div>
                    <div class="col-lg-5 position-sticky">
                        <div class="d-flex">
                            <div>
                                <h2>{{ $photo->name }}</h2>
                            </div>
                            @auth()
                            @if(!($photo->user->id == auth()->user()->id))
                            <div>
                                <div>
                                    <form action="{{ route('photo.like.store', $photo) }}" method="post">
                                        @csrf
                                        <button  class="text-black border-0 bg-transparent">
                                            @if(auth()->user()->likedPhotos->contains($photo->id))
                                                <i class="fas fa-heart text-danger"></i>
                                            @else
                                                <i class="far fa-heart text-danger"></i>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @else
                            @endif
                            @endauth
                        </div>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="p-4 bg-light mb-3">
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">Category:</h6>
                                    <p class="ms-3 text-muted mb-0"><a class="reset-anchor me-1" href="{{ route('main.category.show', $photo->category) }}">{{ $photo->category->name }}</a></p>
                                </li>
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">Date:</h6>
                                    <p class="ms-3 text-muted mb-0">{{ $date->format('F d, Y (H:i)') }}</p>
                                </li>
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">City:</h6>
                                    <p class="ms-3 text-muted mb-0"><a class="reset-anchor me-1" href="{{ route('main.city.show', $photo->user->city) }}">{{ $photo->user->city->name }}</a></p>
                                </li>
                                <li class="d-flex mb-2">
                                    <h6 class="mb-0">Author:</h6>
                                    <p class="ms-3 text-muted mb-0"><a class="reset-anchor me-1" href="{{ route('main.user.show', $photo->user) }}">{{ $photo->user->name }}</a></p>
                                </li>
                            </ul>
                        </div>
                        <!-- Post -->

                        <h2 class="h5 text-black mb-4">Comments ({{ $comments->count() }})</h2>
                        <div class="post clearfix">
                            @foreach($comments as $comment)
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('storage/'.$comment->user->avatar) }}" width="40px" height="40px" style="margin-right: 6px; border-radius: 50%" alt="User avatar">
                                <span class="username">
                                    <a href="{{ route('main.user.show', $comment->user) }}"><b>{{ $comment->user->name }}</b></a>
                                </span>
                                <span class="description" style="font-size: small">left this comment {{ $comment->getDateCreatedAt()->diffForHumans() }}</span>
                            </div>
                            <!-- /.user-block -->
                            <p class="my-2">{{ $comment->comment }}</p>
                            <hr>
                            @endforeach
                            @auth()
                            <form class="form-horizontal" style="margin-top: 30px" action="{{ route('photo.comment.store', $photo) }}" method="post">
                                @csrf
                                <div class="input-group input-group-sm mb-0">
                                    <input class="form-control form-control-sm" placeholder="Your comment here" name="comment">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-danger">Comment</button>
                                    </div>
                                </div>
                                @error('comment')
                                <div class="text-danger">
                                    <p><small>{{ $message }}</small></p>
                                </div>
                                @enderror
                            </form>
                            @endauth
                        </div>

                        <h2 class="h3 my-4">Share</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="reset-anchor social-share-link twitter" target="_blank" href="https://t.me/share/url?url={{ route('main.photo.index', $photo->id) }}&text=Photo '{{ $photo->name }}' by {{ $photo->user->name }}"><i class="fab me-2 fa-telegram"></i>Share</a></li>
                            <li class="list-inline-item"><a class="reset-anchor social-share-link facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('main.photo.index', $photo->id) }}"><i class="fab me-2 fa-facebook-f"></i>Share</a></li>
                            <li class="list-inline-item"><a class="reset-anchor social-share-link twitter" target="_blank" href="https://twitter.com/intent/tweet?text={{ route('main.photo.index', $photo->id) }}"><i class="fab me-2 fa-twitter"></i>Share</a></li>
                        </ul>
                    </div>
                </div>
                <h3 class="h3 mb-4">More photos of {{ $photo->user->name }}</h3>

                <div class="row gy-4 gx-5">
                    @foreach($relatedPhotos as $relatedPhoto)
                    <div class="col-lg-4">
                        <div class="listing-item ps-0">
                            <div class="position-relative">
                                <ul class="list-inline listing-tags m-0">
                                    <li class="list-inline-item"><a class="reset-anchor fw-normal text-gray text-sm" href="{{ route('main.category.show', $relatedPhoto->category) }}">{{ $relatedPhoto->category->name }}</a></li>
                                </ul>
                                    <a class="reset-anchor d-block listing-img-holder" href="{{ route('main.photo.index', $relatedPhoto) }}"><img class="img-fluid rounded-lg" src="{{ asset('storage/'.$relatedPhoto->photo) }}" alt="{{ $relatedPhoto->name }}">
                                    <p class="mb-0 text-primary small d-flex align-items-center listing-btn"> <span>Look inside</span>
                                        <svg class="svg-icon text-primary svg-icon-sm ms-1">
                                            <use xlink:href="#arrow-right-1"> </use>
                                        </svg>
                                    </p></a>
                            </div>
                            <div class="py-3">
                                <a class="reset-anchor" href="{{ route('main.photo.index', $relatedPhoto) }}"><h2 class="h5 listing-item-heading">{{ $relatedPhoto->name }}</h2></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <footer class="text-muted" style="background: #0d0d0d">
            <div class="container-fluid py-5">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row gy-4">
                            <div class="col-lg-4">
                                <h2 class="h4 text-white mb-4">About me</h2>
                                <h4 class="h6 text-white">{{ $photo->user->name }}</h4>
                                <p class="text-sm"> ({{ $photo->user->role->name }})</p>
                                <ul class="list-unstyled text-sm mb-0 text-white">
                                    <li class="mb-1"><a class="reset-anchor" href="{{ route('main.city.show', $photo->user->city) }}"> <i class="fas text-muted me-2 fa-fw fa-globe-americas"></i>{{ $photo->user->city->name }}</a></li>
                                    <li class="mb-1"><a class="reset-anchor" href="#!"> <i class="fas text-muted me-2 fa-fw fa-mobile"></i>{{ $photo->user->phone }}</a></li>
                                    <li class="mb-1"><a class="reset-anchor" href="#!"> <i class="fas text-muted me-2 fa-fw fa-envelope"></i>{{ $photo->user->email }}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="h4 text-white mb-4">Follow me</h2>
                                <ul class="list-inline">
                                    <div class="row text-white text-sm">
                                        <div class="col-6">
                                            <ul class="list-unstyled">
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-facebook-f"></i>Facebook</a></li>
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-twitter"></i>Twitter</a></li>
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-instagram"></i>Instagram</a></li>
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-dribbble"></i>Dribbble</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled">
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-linkedin-in"></i>Linkedin</a></li>
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-pinterest"></i>Pinterest</a></li>
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-vimeo"></i>Vimeo</a></li>
                                                <li><a class="reset-anchor" href="#!"><i class="fab me-2 mb-2 fa-fw fa-youtube"></i>Youtube</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="h4 text-white mb-4">News</h2>
                                <ul class="list-unstyled mb-0">
                                    <li><a class="reset-anchor" href="#!">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="{{ asset('minimal-theme/img/news-1.jpg') }}" alt="Design is all" width="50"></div>
                                                <div class="ms-3">
                                                    <p class="text-white mb-0">Design is all</p>
                                                    <p class="small mb-1"></p>
                                                    <p class="text-gray text-sm">Lorem ipsum dolor sit amet, consetetur sadipscing.</p>
                                                </div>
                                            </div></a></li>
                                    <li><a class="reset-anchor" href="#!">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="{{ asset('minimal-theme/img/news-2.jpg') }}" alt="Power is art" width="50"></div>
                                                <div class="ms-3">
                                                    <p class="text-white mb-0">Power is art</p>
                                                    <p class="small mb-1">23 Dec 2019</p>
                                                    <p class="text-gray text-sm">Lorem ipsum dolor sit amet, consetetur sadipscing.</p>
                                                </div>
                                            </div></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

@endsection
