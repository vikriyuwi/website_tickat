{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Edit Payment')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/payment') }}">Payment Edit</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-start">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="text-primary">Edit Payment</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                </div>
                                @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ url('/dashboard/payment/'.$payments->PaymentId) }}" method="post" class="text-start">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-2">
                                        <label for="Method">Payment Method</label>
                                        <input class="form-control @error('method') is-invalid @enderror " type="text" name="method" id="method" placeholder="Ovo" value="{{ $payments->PaymentMethod }}">
                                        @error('method')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="Code">Payment Code</label>
                                        <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" placeholder="OVxxxx" value="{{ $payments->PaymentCode }}">
                                        @error('code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="verification">Payment Verification</label>
                                        <input class="form-control @error('verification') is-invalid @enderror" type="text" name="verif" id="verif" placeholder="paid" value="{{ $payments->PaymentVerification }}">
                                        @error('verification')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="time">Payment Time</label>
                                        <input class="form-control @error('time') is-invalid @enderror" type="date" name="time" id="time" placeholder="2023-01-01 00:00:00" value="{{ $payments->PaymentTime }}">
                                        @error('time')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="verification">Payment Verification Time</label>
                                        <input class="form-control @error('verification') is-invalid @enderror" type="date" name="verif" id="verif" placeholder="2023-01-01 00:00:00" value="{{ $payments->PaymentVerificationTime }}">
                                        @error('verification')
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