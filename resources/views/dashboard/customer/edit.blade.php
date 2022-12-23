{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Edit Customer')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/customer') }}">Customer Edit</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-start">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="text-primary">Edit Customer</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <a href="{{ url('/dashboard/customer/'.$customers->CustomerId.'/change-password') }}" class="btn btn-primary mt-2 w-100">Change Password</a>
                                </div>
                                @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ url('/dashboard/customer/'.$customers->CustomerId) }}" method="post" class="text-start">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-2">
                                        <label for="name">Customer name</label>
                                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="Joy Sakera" value="{{ $customers->CustomerName }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="email">Customer Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="tickat@fikriyuwi.com" value="{{ $customers->CustomerEmail }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Customer Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" placeholder="62xxxxxxxx" value="{{ $customers->CustomerPhone }}">
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
                                        <label for="gender">Customer Gender</label>
                                        <input class="form-control @error('gender') is-invalid @enderror" type="text" name="gender" id="gender" placeholder="Male" value="{{ $customers->CustomerGender }}">
                                        @error('customer')
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