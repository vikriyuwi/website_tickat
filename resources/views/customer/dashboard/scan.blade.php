{{-- tetep --}}
@extends('../../my-event-template')

{{-- tetep --}}
@section('page-title','Dashboard')

{{-- Sessuain --}}
@section('title','My Book')

{{--  --}}
@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ url('/my-ticket') }}">My Ticket</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Scan</li>
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
        @if(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div id="qr-reader" style="width: 100%"></div>
            </div>
        </div>
        <div class="row">
            <div id="inset_form">
                <form action="{{ url("/my-event/scan") }}" method="post" name="redeemticket">
                    @csrf
                    <input type="hidden" name="RedeemCode" id="RedeemCodeInput">
                </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ url('assets/js/core/jquery.js') }}"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code scanned = ${decodedText}`);
        html5QrcodeScanner.clear().then(_ => {
            document.getElementById("RedeemCodeInput").value = decodedText;
            document.forms['redeemticket'].submit();
        }).catch(error => {
            // Could not stop scanning for reasons specified in `error`.
            // This conditions should ideally not happen.
        });
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 500 });
    html5QrcodeScanner.render(onScanSuccess);
    
</script>
@endsection