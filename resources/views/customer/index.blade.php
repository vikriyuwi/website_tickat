{{-- tetep --}}
@extends('../../template')

{{-- tetep --}}
@section('page-title','Tickat')


@section('main-content')

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand me-5 my-1 p-auto" href="#">
            <img class="nav-icon" src="/img/logo/logo.png" alt="">
            <b class="fw-bold"><span class="color-theme">Tick</span>At</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item ms-lg-5">
                    <a class="nav-link active" aria-current="page" href="#">All event list</a>
                </li>
                @if(Session::get('Login'))
                    <li class="nav-item ms-lg-5">
                        <a class="nav-link active" aria-current="page" href="{{ url('/my-ticket') }}">My account</a>
                    </li>
                @else
                    <li class="nav-item ms-lg-5">
                        <a class="nav-link active" aria-current="page" href="{{ url('/login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<section id="header" class="overlaybox">
    <div class="container py-5">
        <div class="row py-5">
            <div class="card blur shadow-blur overflow-hidden my-auto p-5">
                <h1><b>Tickat</b></h1>
                <p>Explore and have a great experience in the middle of people</p>
                <a href="#events" class="btn btn-primary">Explore now</a>
            </div>
            {{-- <div class="card card-body blur shadow-blur overflow-hidden my-auto">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ url('/assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $event->EventName }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ $event->EventOrganizer->EventOrganizerName }} <span class="badge badge-sm ms-2 bg-gradient-primary">{{ $event->EventType->EventTypeName }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <div class="row">
                                <div class="col-auto text-lg-start ms-md-auto me-md-4">
                                    <b>Start</b>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                    </p>
                                </div>
                                <div class="col-auto text-lg-end me-md-4">
                                    <b>End</b>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-12 py-5 text-center my-auto">
                <h1><b>Tickat</b></h1>
                <p>Explore and have a great experience in the middle of people</p>
                <a href="" class="btn btn-outline-light">Explore now</a>
            </div> --}}
        </div>
    </div>
</section>
<section id="newevent">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 py-3">
                <h1><b>Upcoming Event</b></h1>
            </div>
        </div>
        <a href="{{ url('/event/'.$event->EventId) }}">
            <div class="row">
                <div class="col-12 text-start">
                    <div>
                        <div class="page-header min-height-300 border-radius-xl" style="background-image: url({{ url('/assets/img/curved-images/curved11-small.jpg') }}); background-position-y: 50%;">
                            
                        </div>
                        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                            <div class="row gx-4">
                                <div class="col-auto">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ url('/assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col-auto my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1">
                                            {{ $event->EventName }}
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            {{ $event->EventOrganizer->EventOrganizerName }} <span class="badge badge-sm ms-2 bg-gradient-primary">{{ $event->EventType->EventTypeName }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                    <div class="nav-wrapper position-relative end-0">
                                        <div class="row">
                                            <div class="col-auto text-lg-start ms-md-auto me-md-4">
                                                <b>Start</b>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                                </p>
                                            </div>
                                            <div class="col-auto text-lg-end me-md-4">
                                                <b>End</b>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
<section id="events" class="py-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 py-3 text-center">
                <h1><b>Explore all event</b></h1>
            </div>
        </div>
        <div class="row">
            @foreach ($events as $e)
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ url('/event/'.$e->EventId) }}">
                    <div class="row">
                        <div class="col-12 text-start">
                            <div>
                                <div class="page-header min-height-300 border-radius-xl" style="background-image: url({{ url('/assets/img/curved-images/curved'. rand(0,14) .'.jpg') }}); background-position-y: 50%;">
                                    
                                </div>
                                <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                                    <div class="row gx-4">
                                        <div class="col-auto">
                                            <div class="avatar avatar-xl position-relative">
                                                <img src="{{ url('/assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                            </div>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <div class="h-100">
                                                <h5 class="mb-1">
                                                    {{ $e->EventName }}
                                                </h5>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    <?php
                                                        $EStart=  explode(" ", $e->EventStart );
                                                        $date = date_create($EStart[0]);
                                                    ?>
                                                    {{ date_format($date,"d M Y") }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection