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
                        <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">My account</a>
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

<section class="my-4">
    <div class="container">
        @if(session()->has('status'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success py-3" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-start">
                <div>
                    <div class="page-header min-height-300 border-radius-xl" style="background-image: url({{ url('/assets/img/curved-images/curved0.jpg') }}); background-position-y: 50%;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
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
        <div class="row">
            <div class="col-md-6 mt-4">
                <div class="card h-100">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-item-center">
                                <h6 class="mb-0">Event Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('/dashboard/event/'.$event->EventId.'/edit') }}">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i>
                                    <span class="sr-only">Edit</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            {{ $event->EventDesc }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{ $event->EventLocation }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Place:</strong> &nbsp; {{ $event->EventDetailPlace }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4" style="overflow: hidden">
                <div class="card h-100 widget-maps">
<<<<<<< HEAD
                    <div class="row my-auto">
                        <div class="col-md-12 text-center">
                            <a href="{{ $event->EventGmapsCode }}" class="btn btn-success mx-auto">
                                <i class="fas fa-location-dot"></i> Open in Google Maps
                            </a>
                        </div>
=======
                    <div class="card-header h-100 d-flex">
                        <a href="{{ $event->EventGmapsCode }}" class="btn btn-success mx-auto my-auto">
                            <i class="fas fa-location-dot"></i> Open in Google Maps
                        </a>
>>>>>>> newbranch
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="ticket">
    <div class="container mb-4">
        @foreach($tickets as $ticket)
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="row p-1 d-flex align-items-center">
                        <div class="col-md-3">
                            <div class="h-100 bg-gradient-{{ $ticket->TicketColor }} card text-center py-4 text-white" >
                                <b class="w-400">{{ $ticket->TicketName }}</b>
                            </div>
                        </div>
                        <div class="col-md-9 h-100 p-4 p-md-2">
                            <div class="row w-100 text-end">
                                <div class="col-auto d-flex align-items-center">
                                    <span>Available : <span class="pill-primary">{{ $ticket->TicketAmount }}</span></span>
                                </div>
                                <div class="col-auto ms-auto">
                                    <div class="row">
                                        <div class="col-auto d-flex align-items-center">
                                            <h5 class="text-primary mb-0"><b>IDR {{number_format($ticket->TicketPrice, 0)}}</b></h5>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <td class="text-center d-flex">
<<<<<<< HEAD
                                                <a href="{{ url('/dashboard/book/'.$ticket->TicketId) }}" class="btn btn-success text-center">
=======
                                                <a href="{{ url('/my-ticket/book/'.$ticket->TicketId) }}" class="btn btn-success text-center">
>>>>>>> newbranch
                                                    <i class="fas fa-receipt"></i> BOOK
                                                </a>
                                            </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection