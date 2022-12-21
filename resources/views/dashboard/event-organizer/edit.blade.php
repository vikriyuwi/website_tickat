{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Edit Event Organizer')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/event-organizer') }}">Event Organizer</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-start">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="text-primary">Edit event organizer</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <a href="{{ url('/dashboard/event-organizer/'.$eos->EventOrganizerId.'/change-password') }}" class="btn btn-primary mt-2 w-100">Change Password</a>
                                </div>
                                @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ url('/dashboard/event-organizer/'.$eos->EventOrganizerId) }}" method="post" class="text-start">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-2">
                                        <label for="name">Event organizer name</label>
                                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="Tickat Corp" value="{{ $eos->EventOrganizerName }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="tickat@fikriyuwi.com" value="{{ $eos->EventOrganizerEmail }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" placeholder="62xxxxxxxx" value="{{ $eos->EventOrganizerPhone }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="your password" value="{{ old('password') }}">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password-confirm">Password Confirm</label>
                                                <input class="form-control @error('password-confirm') is-invalid @enderror" type="password" name="password-confirm" id="password-confirm" placeholder="confirm your password" value="{{ old('password-confirm') }}">
                                                @error('password-confirm')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="mb-2">
                                        <label for="location">Location</label>
                                        <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" id="location" placeholder="Malang, East Java, Indonesia" value="{{ $eos->EventOrganizerOfficeAddress }}">
                                        @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Your description..." name="description" id="description">{{ $eos->EventOrganizerDesc }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary mt-2 w-100" type="submit">Update this data</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img class="w-100 position-relative z-index-2 pt-4" src="{{ url('assets/img/illustrations/rocket-white.png') }}" alt="rocket">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection