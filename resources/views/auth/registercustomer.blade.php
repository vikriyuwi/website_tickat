{{-- tetep --}}
@extends('../../auth-template')

{{-- tetep --}}
@section('page-title','Register')


@section('main-content')

<div class="card p-3" id="loginC">
    <div class="card-header">
        <h5 class="mb-0 text-primary"><b>Registration<br>Customer</b></h5>
        Already have account? <a href="{{ url('/login') }}">Login here</a>
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
                <form action="{{ url('/register') }}" method="post" class="text-start">
                    @csrf
                    <div class="mb-2">
                        <label for="name">Customer Name</label>
                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="Joy Sakera" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email">Customer Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="joy@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="phone">Customer Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" placeholder="62xxxxxxxx" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="gender">Customer Gender</label>
                        <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                    <button class="btn btn-primary mt-2 w-100" type="submit">add this data</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection