{{-- tetep --}}
@extends('../../my-event-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Ticket Readem')

{{--  --}}

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ticket Readem</li>
@endsection

@section('main-content')

<section>
    <div class="controller">
        @if(session()->has('success'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yey..</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        @endif
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
                                    <div class="col-lg-6">
                                        <h5 class="card-title">{{$event->EventName}}</h5>
                                        <span class="badge badge-sm bg-gradient-primary">{{ $redeems->Ticket->Event->EventOrganizer->EventOrganizerName }}</span>
                                        <div class="row mt-2">
                                            <div class="col-auto">
                                                <b>Redeem Code</b>
                                                <p class="mb-0 text-sm">
                                                    <b>{{ $redeems->RedeemCode }}</b>
                                                </p>
                                            </div>
                                        </div>
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
                                    </div>
                                    <div class="col-lg-6">
                                        @foreach($payments as $payment)
                                        <?php
                                                    
                                        $payat = explode(" ", $payment->PaymentTime );
                                        $verifat = explode(" ", $payment->PaymentVerificationTime );

                                        ?>
                                        <div class="card mb-2 {{ $loop->iteration == 1 ? 'bg-primary text-white' : '' }}">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        @if($payment->PaymentVerification == 'CANCELED')
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <b>{{ $payment->PaymentMethod }}</b>
                                                            </div>
                                                            <div class="col-auto ms-auto">
                                                                <span class="badge bg-secondary">CANCELED</span>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <h5 class="mb-0">{{ $payment->PaymentMethod }} </h5> 
                                                            </div>
                                                            <div class="col-auto ms-auto">
                                                                <span class="badge bg-{{ $payment->PaymentVerification == 'PAID' ? 'success' : 'light'}} text-dark"><i class="fas fa-{{ $payment->PaymentVerification == 'PAID' ? 'check' : '' }}"></i> {{ $payment->PaymentVerification }}</span>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <span class="text-sm {{ $loop->iteration == 1 ? 'text-white' : 'text-secondary' }}">{{ $payment->PaymentCode }}</span>
                                                @if($loop->iteration == 1)
                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <b>Pay at</b>
                                                            <p class="mb-0 font-weight-bold text-sm">
                                                                {{ $payat[0] }} {{ $payat[1] }}
                                                            </p>
                                                        </div>
                                                        @if($verifat[0] != NULL)
                                                        <div class="col-6">
                                                            <b>Verified at</b>
                                                            <p class="mb-0 font-weight-bold text-sm">
                                                                {{ $verifat[0] }} {{ $verifat[1] }}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
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