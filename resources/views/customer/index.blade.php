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
<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url({{url('/assets/img/curved-images/curved.jpg')}})">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Tick At</h1>
          <p class="lead text-white mt-3">Explore and have a great experience in the middle of people</p>
          <a href="#events" class="btn btn-primary">Explore now</a>
        </div>
      </div>
    </div>
    <div class="position-absolute w-100 z-index-1 bottom-0">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="moving-waves">
          <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
          <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
          <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
          <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
        </g>
      </svg>
    </div>
  </div>
</header>
<section class="pt-3 pb-4" id="count-stats">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
        <div class="row">
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"><span id="state1" countTo="70">{{ $EventCount }}</span></h1>
              <h5 class="mt-3">Event</h5>
              <p class="text-sm">with varous atmosphere</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"> <span id="state2" countTo="15">{{ $EventOrganizerCount }}</span></h1>
              <h5 class="mt-3">Event Organizer</h5>
              <p class="text-sm">has been made a wonderful event</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary" id="state3" countTo="4">{{ $TicketRedeemCount }}</h1>
              <h5 class="mt-3">People</h5>
              <p class="text-sm">joined</p>
            </div>
          </div>
        </div>
      </div>
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