{{-- tetep --}}
@extends('../../customer-dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Make book')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/my-ticket') }}">My Ticket</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Book</li>
@endsection

@section('main-content')

<section>
    <div class="controller">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 everflow-hidden">
                            <img src="{{ url('/assets/img/curved-images/curved'. rand(0,14) .'.jpg') }}" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body h-100">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h5 class="card-title">{{$event->EventName}}</h5>
                                        <span class="badge badge-sm bg-gradient-primary">{{ $eo->EventOrganizerName }}</span>
                                        <div class="row mt-4">
                                            <div class="col-auto">
                                                <b>Start</b>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                                </p>
                                            </div>
                                            <div class="col-auto">
                                                <b>End</b>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    {{ $een[0] }} <h5>{{ $een[1] }}</h5>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-auto">
                                                <b>Place</b>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    <b>{{ $event->EventLocation }}</b>
                                                    <br>{{ $event->EventDetailPlace }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-auto">
                                                <b>Ticket</b>
                                                <p class="mb-0 font-weight-bold">
                                                    <span class="badge badge-lg bg-gradient-{{ $ticket->TicketColor }}">{{$ticket->TicketName}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <form action="{{ url('/my-ticket') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$ticket->TicketId}}">
                                                    <label for="paymentMethod">Payment method :</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select class="form-select @error('paymentMethod') is-invalid @enderror" aria-label="Default select example" name="paymentMethod">
                                                                <option value="0">Select Payment Method</option>
                                                                <option value="OVO">OVO</option>
                                                                <option value="Gopay">Gopay</option>
                                                                <option value="BCA">BCA bank transfer</option>
                                                            </select>
                                                            @error('paymentMethod')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-success">Confirmation Book</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card h-100 widget-maps">
                                            <div class="row my-auto">
                                                <div class="col-md-12 text-center">
                                                    <a href="{{ $event->EventGmapsCode }}" class="btn btn-success mx-auto my-4">
                                                        <i class="fas fa-location-dot"></i> Open in Google Maps
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection