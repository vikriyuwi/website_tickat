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
<section id="screen" class="fixed-top py-5">
    <div class="controller">
        <div class="row">
            <div class="col-md-4 col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 text-start">
                                <h5 class="card-title">{{ $ticketredeem->ticket->event->EventName }}</h5>
                                <span class="badge badge-sm bg-gradient-{{ $ticketredeem->ticket->TicketColor }}">{{ $ticketredeem->ticket->TicketName }}</span>
                            </div>
                            <div class="col-md-4 text-end">
                                <button onclick="closeCreateModal()" class="btn btn-sm btn-outline-secondary px-3 text-center">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-head px-5 text-center">
                        <img src="" class="card-img-top qr-img" alt="..." data-code="{{ $ticketredeem->RedeemCode }}">
                        <span class="mt-4">{{ $ticketredeem->RedeemCode }}</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <b class="text-primary">Place</b>
                                <p class="mb-0 font-weight-bold text-sm">
                                    <b>{{ $ticketredeem->ticket->event->EventLocation }}</b>
                                    <br>{{ $ticketredeem->ticket->event->EventDetailPlace }}
                                </p>
                            </div>
                        </div>
                        <?php
                        
                        $est =  explode(" ", $ticketredeem->ticket->event->EventStart );
                        $een =  explode(" ", $ticketredeem->ticket->event->EventEnd );
                        
                        ?>
                        <div class="row mt-4">
                            <div class="col-auto">
                                <b class="text-primary">Start</b>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                </p>
                            </div>
                            <div class="col-auto">
                                <b class="text-primary">End</b>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $een[0] }} <h5>{{ $een[1] }}</h5>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                                        <span class="badge badge-sm bg-gradient-primary">{{ $eo->EventOrganizerName }}</span>
                                        <div class="row mt-2">
                                            <div class="col-auto">
                                                <b>Redeem Code</b>
                                                <p class="mb-0 text-sm">
                                                    <b>{{ $ticketredeem->RedeemCode }}</b>
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
                                        <?php
                                                    
                                        $payat = explode(" ", $payment->PaymentTime );
                                        $verifat = explode(" ", $payment->PaymentVerificationTime );

                                        ?>
                                        <div class="card mb-2 pb-0 bg-primary text-white">
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
                                                <span class="text-sm text-white">{{ $payment->PaymentCode }}</span>
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
                                                <div class="row mt-4">
                                                    <button class="btn btn-light mb-0" type="button" onclick="showCreateModal()">Show ticket</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-1">
                                            <a href="{{ $ticketredeem->ticket->event->EventGmapsCode }}" target="_blank" class="btn btn-success mt-4"><i class="fas fa-map"></i> Open maps</a>
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

<script>
    $img = document.getElementsByClassName('qr-img');
    for(var i=0;i<$img.length;i++) {
        $img[i].src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+$img[i].dataset.code;
        console.log($img[i].dataset.code);
    }
</script>
@endsection