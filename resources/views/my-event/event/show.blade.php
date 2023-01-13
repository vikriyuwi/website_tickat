{{-- tetep --}}
@extends('../../my-event-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Event')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/event') }}">Event</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">View</li>
@endsection

@section('main-content')
<section id="screen" class="fixed-top py-5 @error('name','eventOrganizer','eventType','description') show @enderror">
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
                            <form action="{{ url('/my-event/ticket/') }}" method="post" class="text-start">
                                @csrf

                                <input class="form-control" type="hidden" name="eventId" id="eventId" placeholder="VVIP" value="{{ $EventId }}">
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="VVIP" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="amount">Amount</label>
                                    <input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount" id="amount" placeholder="1000" value="{{ old('amount') }}">
                                    @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="price">Price</label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price" placeholder="200000" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <div class="col-12 p-3 color-theme bg rounded"></div>
                                    <label for="color">Color</label>
                                    <select class="form-select @error('color') is-sinvalid @enderror" aria-label="Default select example" name="color" id="colorOption">
                                        <option value="0">Select color</option>
                                        @foreach($colors as $color)
                                            @if(old('color') == $color)
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
<section class="mb-4">
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
            <div class="col-md-12 text-start">
                <div>
                    <div class="page-header min-height-300 border-radius-xl" style="background-image: url({{ url('/assets/img/curved-images/curved0.jpg') }}); background-position-y: 50%;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
                    </div>
                    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="{{ url('/assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        {{ $event->EventName }}
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ $event->EventOrganizer->EventOrganizerName }} <span class="badge badge-sm ms-2 bg-gradient-primary">{{ $event->EventType->EventTypeName }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                <div class="nav-wrapper position-relative end-0">
                                    <div class="row">
                                        <div class="col-auto text-lg-start ms-md-auto me-md-4">
                                            <b>Start</b>
                                            <p class="mb-0 font-weight-bold text-sm">
                                                {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                            </p>
                                        </div>
                                        <div class="col-auto text-lg-end me-md-4">
                                            <b>End</b>
                                            <p class="mb-0 font-weight-bold text-sm">
                                                {{ $est[0] }} <h5>{{ $est[1] }}</h5>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-4">
                <div class="card h-100">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-item-center">
                                <h6 class="mb-0">Event Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('/my-event/event/'.$event->EventId.'/edit') }}">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i>
                                    <span class="sr-only">Edit</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            {{ $event->EventDesc }}
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{ $event->EventLocation }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Place:</strong> &nbsp; {{ $event->EventDetailPlace }}</li>
                            {{-- <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4" style="overflow: hidden">
                <div class="card h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15775.547854519607!2d115.1794167!3d-8.7022835!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246b47210cf3d%3A0x61ebeb599ddae08a!2sHillsong%20Church%20Bali%20Campus!5e0!3m2!1sen!2sid!4v1671640234075!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="ticket">
    <div class="container">
        @foreach($tickets as $ticket)
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="row p-1 d-flex align-items-center">
                        <div class="col-md-3">
                            <div class="h-100 bg-gradient-{{ $ticket->TicketColor }} card text-center py-4 text-white" >
                                <b class="w-400">{{ $ticket->TicketName }}</b>
                            </div>
                        </div>
                        <div class="col-md-9 h-100 p-4 p-md-2">
                            <div class="row w-100 text-end">
                                <div class="col-auto d-flex align-items-center">
                                    <span>Available : <span class="pill-primary">{{ $ticket->TicketAmount }}</span></span>
                                </div>
                                <div class="col-auto ms-auto">
                                    <div class="row">
                                        <div class="col-auto d-flex align-items-center">
                                            <h5 class="text-primary mb-0"><b>IDR {{number_format($ticket->TicketPrice, 0)}}</b></h5>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <td class="text-center d-flex">
                                                <a href="{{ url('/dashboard/ticket/'.$ticket->TicketId.'/edit') }}" class="btn btn-sm btn-secondary px-3 text-light text-center me-2">
                                                    <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ url('/my-event/ticket/'.$ticket->TicketId) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger px-3 text-center" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Are you sure want to delete {{ $ticket->TicketName }}?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-primary" type="button" onclick="showCreateModal()">add new ticket</button>
            </div>
        </div>
    </div>
</section>
@endsection