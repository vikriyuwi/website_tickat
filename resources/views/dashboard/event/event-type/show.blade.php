 {{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Event Type')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/event-type') }}">Event Type</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">View</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-start">
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
                                        {{ $ets->EventTypeName }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <div class="card h-100">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-item-center">
                                <h6 class="mb-0">Event Type Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('/dashboard/event-type/edit'.$ets->EventTypeId.'/edit') }}">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i>
                                    <span class="sr-only">Edit Profile</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
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
        </div>
    </div>
</section>
@endsection