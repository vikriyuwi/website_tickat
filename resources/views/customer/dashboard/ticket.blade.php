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
            <div class="col-md-4 col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-head p-5">
                        <img src="" class="card-img-top qr-img" alt="..." data-code="{{ $redeem->RedeemCode }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $redeem->ticket->event->EventName }}</h5>
                        <span class="badge badge-sm bg-gradient-{{ $redeem->ticket->TicketColor }}">{{ $redeem->ticket->TicketName }}</span>
                        <div class="row mt-4">
                            <div class="col-auto">
                                <b class="text-primary">Place</b>
                                <p class="mb-0 font-weight-bold text-sm">
                                    <b>{{ $redeem->ticket->event->EventLocation }}</b>
                                    <br>{{ $redeem->ticket->event->EventDetailPlace }}
                                </p>
                            </div>
                        </div>
                        <?php
                        
                        $est =  explode(" ", $redeem->ticket->event->EventStart );
                        $een =  explode(" ", $redeem->ticket->event->EventEnd );
                        
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

<script>
    $img = document.getElementsByClassName('qr-img');
    for(var i=0;i<$img.length;i++) {
        $img[i].src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+$img[i].dataset.code;
        console.log($img[i].dataset.code);
    }
</script>
@endsection