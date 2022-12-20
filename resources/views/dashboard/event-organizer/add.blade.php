{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Add Event Organizer')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Event Organizer</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">add</li>
@endsection

@section('main-content')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-start">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="text-info">Add new event organizer</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post" class="text-start">
                                    <div class="mb-2">
                                        <label for="name">Event organizer name</label>
                                        <input class="form-control" type="text" name="name" id="name" placeholder="Tickat Corp">
                                    </div>
                                    <div class="mb-2">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="tickat@fikriyuwi.com">
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Phone</label>
                                        <input class="form-control" type="text" name="phone" id="phone" placeholder="62xxxxxxxx">
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" id="password" placeholder="your password">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password-confirm">Password Confirm</label>
                                                <input class="form-control" type="password" name="password-confirm" id="password-confirm" placeholder="confirm your password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="location">Location</label>
                                        <input class="form-control" type="text" name="location" id="location" placeholder="Malang, East Java, Indonesia">
                                    </div>
                                    <button class="btn btn-success mt-2 w-100" type="submit">add this data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection