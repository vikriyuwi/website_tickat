{{-- tetep --}}
@extends('../../auth-template')

{{-- tetep --}}
@section('page-title','Login')


@section('main-content')


<div class="card p-3" id="loginEO">
    <div class="card-header">
        <h5 class="mb-0 text-primary"><b>Login<br>Event Organizer</b></h5>
        Are you an Customer? <a href="{{ url('/login') }}">Login here</a>
        <br>
        {{Session::get('Login')}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ url('/auth/master') }}" method="post" class="text-start">
                    @csrf
                    <div class="mb-2">
                        <label for="username">Username</label>
                        <input class="form-control @error('username') is-invalid @enderror" type="username" name="username" id="username" placeholder="tickat@fikriyuwi.com" value="{{ old('username') }}">
                        @error('username')
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
            </div>
        </div>
    </div>
</div>

@endsection