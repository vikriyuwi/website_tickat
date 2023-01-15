{{-- tetep --}}
@extends('../../dashboard-template')

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
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="{{ url('dashboard/event/'.$eventHighSold->EventId) }}">
                            <div class="card bg-gradient-primary h-100">
                                <div class="card-header bg-transparent text-white">
                                    <span class="badge bg-gradient-danger"><b>Trending Event this month</b></span>
                                </div>
                                <div class="card-body text-white">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h3>{{ $eventHighSold->EventName }}</h3>
                                            <span class="badge bg-gradient-light text-dark mb-2">{{ $eventHighSold->EventTypeName }}</span>
                                            <br>by {{ $eventHighSold->EventOrganizerName }}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-auto h-auto text-white text-end">
                                                <h1 class=" m-0"><b>{{ $eventHighSold->JumlahPenjualan }}</b></h1>
                                                ticket sold
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Top 3 ticket sales data</h6>
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
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sold</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($eventSales as $event)
                                            <tr>
                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ url('/assets/img/team-1.jpg') }}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $event->EventName }}</h6>
                                                            <span class="badge badge-sm bg-gradient-primary">{{ $event->EventTypeName }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $event->JumlahPenjualan }}
                                                </td>
                                                <td class="text-center d-flex">
                                                    <a href="{{ url('/dashboard/event/'.$event->EventId) }}" class="btn btn-sm btn-primary px-3 text-light text-center me-2">
                                                        <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ url('/dashboard/event/'.$event->EventId.'/edit') }}" class="btn btn-sm btn-secondary px-3 text-light text-center me-2">
                                                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ url('/dashboard/event/'.$event->EventId) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger px-3 text-center" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Are you sure want to delete {{ $event->EventName }}?')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
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
            <div class="col-md-4">
                <div class="card mb-4 h-100">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Waiting confirmation payment</h6>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($redeems as $data)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ url('/assets/img/team-1.jpg') }}" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->customer->CustomerName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $data->RedeemCode }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ url('dashboard/redeem/'.$data->TicketRedeemId) }}" class="btn btn-sm btn-primary px-3 mb-0"><i class="fas fa-eye"></i></a>
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