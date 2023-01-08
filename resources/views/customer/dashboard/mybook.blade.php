{{-- tetep --}}
@extends('../../customer-dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','My Book')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/my-ticket') }}">My Ticket</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Book</li>
@endsection

@section('main-content')

@if(session()->has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yeay!</strong> {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

@endsection