@extends('layouts.main')
@section('content')
<div class="px-4 py-5">
    <div class="container-fluid">
        <div class="row gy-4 gx-5 masonry-wrapper">
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top" src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->name }}">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <a href="{{ route('main.user.show', $user->id) }}"><h4 class="card-title text-primary text-white"><strong>{{ $user->name }}</strong></h4></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
