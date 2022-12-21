{{-- tetep --}}
@extends('../../dashboard-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','View Event Organizer')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Event Organizer</li>
@endsection

@section('main-content')
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
                                <h6>Event Organizer Data</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <a class="btn btn-primary" type="button" href="{{ url('/dashboard/event-organizer/create') }}">add new event organizer</a>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eos as $eo)
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
                                                    <h6 class="mb-0 text-sm">{{ $eo->EventOrganizerName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $eo->EventOrganizerOfficeAddress }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $eo->EventOrganizerEmail }}</p>
                                            <p class="text-xs text-secondary mb-0">{{ $eo->EventOrganizerPhone }}</p>
                                        </td>
                                        <td class="text-center d-flex">
                                            <a href="{{ url('/dashboard/event-organizer/'.$eo->EventOrganizerId) }}" class="btn btn-sm btn-primary px-3 text-light text-center me-2">
                                                <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('/dashboard/event-organizer/'.$eo->EventOrganizerId.'/edit') }}" class="btn btn-sm btn-secondary px-3 text-light text-center me-2">
                                                <i class="fa-solid fa-pen" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ url('/dashboard/event-organizer/'.$eo->EventOrganizerId) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button href="{{ url('/dashboard/event-organizer/destroy/'.$eo->EventOrganizerId) }}" class="btn btn-sm btn-danger px-3 text-center" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Are you sure want to delete {{ $eo->EventOrganizerName }}?')">
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