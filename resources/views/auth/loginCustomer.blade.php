{{-- tetep --}}
@extends('../../auth-template')

{{-- tetep --}}
@section('page-title','Login')


@section('main-content')

<div class="card p-3" id="loginC">
    <div class="card-header">
        <h5 class="mb-0 text-primary"><b>Login<br>Customer</b></h5>
        Are you an Event Organizer? <a href="{{ url('/login/event-organizer') }}">Login here</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opps..</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yey..</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endif
                <form action="{{ url('/auth/customer') }}" method="post" class="text-start">
                    @csrf
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
                        <label for="password">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="your password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-2 w-100" type="submit">Log in</button>
                </form>
                Want to get an account? <a href="{{ url('/register') }}">Register here</a>
            </div>
        </div>
    </div>
</div>

@endsection