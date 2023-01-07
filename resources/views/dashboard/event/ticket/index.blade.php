{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Ticket')

{{--  --}}

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ticket</li>
@endsection

@section('main-content')
<section id="screen" class="fixed-top py-5 @error('name','event','amount','price','color') show @enderror">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-6 text-center mx-auto">
            <div class="card p-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 d-flex text-start">
                            <h5 class="mb-0 text-primary"><b>Add new<br>Ticket</b></h5>
                        </div>
                        <div class="col-md-4 text-end">
                            <button onclick="closeCreateModal()" class="btn btn-sm btn-outline-secondary px-3 text-center">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session()->has('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form action="{{ url('/dashboard/event/') }}" method="post" class="text-start">
                                @csrf
                                <div class="mb-2">
                                    <label for="name">Ticket Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="Open Festival" value="{{ old('TicketName') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="event">EventId</label>
                                    <select class="form-select @error('event') is-invalid @enderror" aria-label="Default select example" name="Event">
                                        <option value="0">Select EventId</option>
                                        @foreach($events as $event)
                                            @if(old('event') == $event->EventId)
                                                <option value="{{ $event->EventId }}" selected>{{ $event->EventName }}</option>
                                            @else
                                                <option value="{{ $event->EventId }}">{{ $event->EventName }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('event')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="mb-2">
                                        <label for="amount">Amount</label>
                                        <input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount" id="amount" placeholder="1000" value="{{ $ticket->TicketAmount }}">
                                        @error('amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="price">Price</label>
                                        <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price" placeholder="200000" value="{{ $ticket->TicketPrice }}">
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-12 p-3 color-theme bg-{{ $ticket->TicketColor }} rounded"></div>
                                        <label for="color">Color</label>
                                        <select class="form-select @error('color') is-sinvalid @enderror" aria-label="Default select example" name="color" id="colorOption">
                                            <option value="0">Select color</option>
                                            @foreach($colors as $color)
                                                @if($ticket->TicketColor == $color)
                                                    <option value="{{$color}}" class="bg-{{$color}}" selected>{{$color}}</option>
                                                @else
                                                    <option value="{{$color}}" class="bg-{{$color}}">{{$color}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('color')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                <button class="btn btn-primary mt-2 w-100" type="submit">add this data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
<section>
    <div class="container">
        @if(session()->has('status'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success py-3" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Ticket Data</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary" type="button" onclick="showCreateModal()">add new ticket</button>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Color</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
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
                                                    <h6 class="mb-0 text-sm">{{ $ticket->TicketName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $ticket->TicketColor }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-primary">{{ $ticket->TicketAmount }}</span>
                                        </td>
                                        <td class="text-center d-flex">
                                            <a href="{{ url('/dashboard/ticket/'.$ticket->TicketId) }}" class="btn btn-sm btn-primary px-3 text-light text-center me-2">
                                                <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('/dashboard/ticket/'.$ticket->TicketId.'/edit') }}" class="btn btn-sm btn-secondary px-3 text-light text-center me-2">
                                                <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ url('/dashboard/ticket/'.$ticket->TicketId) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger px-3 text-center" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Are you sure want to delete {{ $ticket->TicketName }}?')">
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
</section>
@endsection