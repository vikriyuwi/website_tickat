{{-- tetep --}}
@extends('../../my-event-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','Edit my-event')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/my-event/event') }}">Event</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
@endsection

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-start">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="text-primary">Edit event</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if(session()->has('status'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{ url('/my-event/event/'.$es->EventId) }}" method="post" class="text-start">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-2">
                                        <label for="name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" id="name" placeholder="Open Festival" value="{{ $es->EventName }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="eventOrganizer">Event Organizer</label>
                                        <select class="form-select @error('eventOrganizer') is-invalid @enderror" aria-label="Default select example" name="eventOrganizer">
                                            <option value="0">Select Event Organizer</option>
                                            @foreach($eos as $eo)
                                                @if($es->EventOrganizerId == $eo->EventOrganizerId)
                                                    <option value="{{ $eo->EventOrganizerId }}" selected>{{ $eo->EventOrganizerName }}</option>
                                                @else
                                                    <option value="{{ $eo->EventOrganizerId }}">{{ $eo->EventOrganizerName }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('eventOrganizer')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="eventType">Event Type</label>
                                        <select class="form-select @error('eventType') is-invalid @enderror" aria-label="Default select example" name="eventType">
                                            <option value="0">Select Event Type</option>
                                            @foreach($ets as $et)
                                                @if($es->EventTypeId == $et->EventTypeId)
                                                    <option value="{{ $et->EventTypeId }}" selected >{{ $et->EventTypeName }}</option>
                                                @else
                                                    <option value="{{ $et->EventTypeId }}">{{ $et->EventTypeName }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('eventType')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Your description..." name="description" id="description">{{ $es->EventDesc }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="eventStartDate">Event start</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control @error('eventStartDate') is-invalid @enderror" type="date" name="eventStartDate" id="eventStartDate" placeholder="tickat@fikriyuwi.com" value="{{ $est[0] }}">
                                                @error('eventStartDate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control @error('eventStartTime') is-invalid @enderror" type="time" name="eventStartTime" id="eventStartTime" placeholder="tickat@fikriyuwi.com" value="{{ $est[1] }}">
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
                                                <input class="form-control @error('eventEndDate') is-invalid @enderror" type="date" name="eventEndDate" id="eventEndDate" placeholder="tickat@fikriyuwi.com" value="{{ $een[0] }}">
                                                @error('eventEndDate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control @error('eventEndTime') is-invalid @enderror" type="time" name="eventEndTime" id="eventEndTime" placeholder="tickat@fikriyuwi.com" value="{{ $een[1] }}">
                                                @error('eventEndTime')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="eventLocation">Location</label>
                                        <input class="form-control @error('eventLocation') is-invalid @enderror" type="text" name="eventLocation" id="eventLocation" placeholder="Place name" value="{{ $es->EventLocation }}">
                                        @error('eventLocation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="gmapsCode">Google maps code</label>
                                        <input class="form-control @error('gmapsCode') is-invalid @enderror" type="text" name="gmapsCode" id="gmapsCode" placeholder="Find in google maps" value="{{ $es->EventGmapsCode }}">
                                        <a href="{{ url('/dashboard/help/how-to-fill-gmaps-code-field') }}" class="text-small link-secondary">How to fill this field?</a>
                                        @error('gmapsCode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="detailPlace">Detail place</label>
                                        <textarea class="form-control @error('detailPlace') is-invalid @enderror" placeholder="State, country" name="detailPlace" id="detailPlace">{{ $es->EventDetailPlace }}</textarea>
                                        @error('detailPlace')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary mt-2 w-100" type="submit">update this data</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img class="w-100 position-relative z-index-2 pt-4" src="{{ url('assets/img/illustrations/rocket-white.png') }}" alt="rocket">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection