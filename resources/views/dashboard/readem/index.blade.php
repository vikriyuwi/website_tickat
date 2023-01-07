{{-- tetep --}}
@extends('../../dashboard-template')

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
<section id="screen" class="fixed-top py-5 @error('name','Customer','Ticket','description') show @enderror">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-6 text-center mx-auto">
            <div class="card p-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 d-flex text-start">
                            <h5 class="mb-0 text-primary"><b>Add new<br>Ticket Readem</b></h5>
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
                            <form action="{{ url('/dashboard/readem/') }}" method="post" class="text-start">
                                @csrf
                                <div class="mb-2">
                                    <label for="ReademCode">Readem Code</label>
                                    <input class="form-control @error('ReademCode') is-invalid @enderror " type="text" name="name" id="name" placeholder="Open Festival" value="{{ old('ReademCode') }}">
                                    @error('ReademCode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="Customer">Customer</label>
                                    <select class="form-select @error('Customer') is-invalid @enderror" aria-label="Default select example" name="Customer">
                                        <option value="0">Select CustomerId</option>
                                        @foreach($customers as $customer)
                                            @if(old('customer') == $customer->CustomerId)
                                                <option value="{{ $customer->CustomerId }}" selected>{{ $customer->CustomerName }}</option>
                                            @else
                                                <option value="{{ $customer->CustomerId }}">{{ $customer->CustomerName }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('customer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="Ticket">Ticket</label>
                                    <select class="form-select @error('Ticket') is-invalid @enderror" aria-label="Default select example" name="Ticket">
                                        <option value="0">Select Ticket</option>
                                        @foreach($ticket as $item)
                                            @if(old('ticket') == $item->TicketId)
                                                <option value="{{ $item->TicketId }}" selected >{{ $item->TicketColor }}</option>
                                            @else
                                                <option value="{{ $item->TicketId }}">{{ $item->TicketColor }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('ticket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="eventStartDate">Event start</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control @error('eventStartDate') is-invalid @enderror" type="date" name="eventStartDate" id="eventStartDate" placeholder="tickat@fikriyuwi.com" value="{{ old('eventStartDate') }}">
                                            @error('eventStartDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control @error('eventStartTime') is-invalid @enderror" type="time" name="eventStartTime" id="eventStartTime" placeholder="tickat@fikriyuwi.com" value="{{ old('eventStartTime') }}">
                                            @error('eventStartTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="eventEndDate">Event end</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control @error('eventEndDate') is-invalid @enderror" type="date" name="eventEndDate" id="eventEndDate" placeholder="tickat@fikriyuwi.com" value="{{ old('eventEndDate') }}">
                                            @error('eventEndDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control @error('eventEndTime') is-invalid @enderror" type="time" name="eventEndTime" id="eventEndTime" placeholder="tickat@fikriyuwi.com" value="{{ old('eventEndTime') }}">
                                            @error('eventEndTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
                                <h6>Ticket Readem Data</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary" type="button" onclick="showCreateModal()">add new ticket readem</button>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($readem as $data)
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
                                                    <h6 class="mb-0 text-sm">{{ $data->customer->CustomerName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $item->TicketColor }}</p>
                                                </div>
                                            </div>
                                            <td>
                                                <span class="badge badge-sm bg-gradient-{{ $data->Status == 'ready' ? 'success' : 'danger' }}">{{ $data->Status }}</span>
                                            </td>
                                        </td>
                                        </td>
                                        <td class="text-center d-flex">
                                            <a href="{{ url('/dashboard/readem/'.$item->TicketId) }}" class="btn btn-sm btn-primary px-3 text-light text-center me-2">
                                                <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('/dashboard/readem/'.$item->TicketId.'/edit') }}" class="btn btn-sm btn-secondary px-3 text-light text-center me-2">
                                                <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ url('/dashboard/readem/'.$item->TicketId) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger px-3 text-center" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Are you sure want to delete {{ $item->ReademCode }}?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <form action="{{ url('/dashboard/readem/'.$item->TicketId) }}{{$data->Status == 'expired' ? '/deactive' : '/active'}}" method="get">
                                                    @csrf
                                                    <button class="btn btn-sm btn-{{ $data->Status == 'ready' ? 'danger' : 'success' }} px-3 text-center" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Are you sure want to {{ $data->Status == 'ready' ? 'deactive ' : 'active '}}{{$data->customer->CustomerName}}?')">
                                                        <i class="fa-solid fa-{{ $data->Status == 'ready' ? 'xmark' : 'check' }}"></i>
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