@extends('layouts.main')
@section('content')
<div class="px-4 py-5">
    <div class="container-fluid">
        <div class="row gy-4 gx-5 masonry-wrapper" style="min-height: calc(100vh - 69.609px)">
            @if($cities->count() > 0)
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        @foreach($cities as $city)
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="card mb-2 bg-gradient-dark">
                                    @if(isset($city->users->first()->photos) && !empty($city->users->first()->photos))
                                        <img class="card-img-top" src="@if(isset($city->users->first()->photos->first()->photo)){{ asset('storage/'.$city->users->first()->photos->first()->photo) }}@else{{ asset('storage/city.jpg') }}@endif" alt="{{ $city->name }}">
                                    @else
                                        <img class="card-img-top" src="{{ asset('storage/city.jpg') }}" alt="{{ $city->name }}">
                                    @endif
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <a href="{{ route('main.city.show', ['slug' => $city->slug]) }}"><h4 class="card-title text-primary text-white"><strong>{{ $city->name }}</strong></h4></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
