{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Event')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/event') }}">Event</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">View</li>
@endsection

@section('main-content')
<section>
    <div class="container">
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
                            {{-- <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4" style="overflow: hidden">
                <div class="card h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15775.547854519607!2d115.1794167!3d-8.7022835!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246b47210cf3d%3A0x61ebeb599ddae08a!2sHillsong%20Church%20Bali%20Campus!5e0!3m2!1sen!2sid!4v1671640234075!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection