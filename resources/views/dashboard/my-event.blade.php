{{-- tetep --}}
@extends('../../my-event-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Event Organizer')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
@endsection

@section('main-content')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Dashboard is under development</h1>
                {{ Session::get('LoginRole') }}
            </div>
        </div>
    </div>
</section>
@endsection