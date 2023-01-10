{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Edit Ticket')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard/event/'.$ticket->EventId) }}">Event</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Ticket</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-start">
                <div class="card p-3">
                    <div class="card-header">
                        <h1>Edit ticket</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if(session()->has('status'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                
                                <form action="{{ url('/dashboard/ticket/'.$ticket->TicketId) }}" method="post" class="text-start">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-2">
                                        <label for="name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="VVIP" value="{{ $ticket->TicketName }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
                                    <button class="btn btn-primary mt-2 w-100" type="submit">Update this ticket</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                
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
    
</script>
@endsection