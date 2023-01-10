{{-- tetep --}}
@extends('../../auth-template')

{{-- tetep --}}
@section('page-title','Login')


@section('main-content')

<div class="card p-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 d-flex text-start">
                <h5 class="mb-0 text-primary"><b>Register new<br>Event Organizer</b></h5>
            </div>
            <div class="col-md-4 text-end">
                <button onclick="closeCreateModal()" class="btn btn-sm btn-outline-secondary px-3 text-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ url('/register/event-organizer/') }}" method="post" class="text-start">
                    @csrf
                    <div class="mb-2">
                        <label for="name">Event organizer name</label>
                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="Tickat Corp" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="tickat@fikriyuwi.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email">Phone</label>
                        <div class="input-group mb-3">
                            <label for="phone" class="input-group-text mb-0">62</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="8XXXXXXXXX" name="phone" id="phone">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
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
                    </div>
                    <div class="mb-2">
                        <label for="location">Location</label>
                        <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" id="location" placeholder="Malang, East Java, Indonesia" value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Your description..." name="description" id="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-2 w-100" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
  </div>

@endsection