@extends('layouts.main')
@section('content')
<div class="px-4 py-5">
    <div class="container-fluid">
        <div class="row gy-4 gx-5 masonry-wrapper">
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="card mb-2 bg-gradient-dark">
                                    @if(isset($category->photos->first()->photo) && !empty($category->photos->first()->photo))
                                        <img class="card-img-top" src="{{ asset('storage/'.$category->photos->first()->photo) }}" alt="{{ $category->name }}">
                                    @else
                                        <img class="card-img-top" src="{{ asset('storage/category.jpg') }}" alt="{{ $category->name }}">
                                    @endif
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <a href="{{ route('main.category.show', ['slug' => $category->slug]) }}"><h4 class="card-title text-primary text-white"><strong>{{ $category->name }}</strong></h4></a>
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
