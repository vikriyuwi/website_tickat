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


<section>
    <div class="container">
        @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Yeay!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Book data</h6>
                            </div>
                            <div class="col-md-6 text-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($redeems as $redeem)
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $redeem->ticket->event->EventName }}</h6>
                                                    <span class="badge badge-sm bg-gradient-{{ $redeem->ticket->TicketColor }}">{{ $redeem->ticket->TicketName }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-{{ $redeem->payment->last()->PaymentVerification == 'PAID' ? 'success' : 'danger' }}">{{ $redeem->payment->last()->PaymentVerification }}</span>
                                        </td>
                                        <td>
                                            @if($redeem->Status === 'PENDING')
                                            <a href="{{ url('my-ticket/book/'.$redeem->TicketRedeemId.'/change-payment') }}" class="btn btn-sm btn-primary px-3 text-center">change payment</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection