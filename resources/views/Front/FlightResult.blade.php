<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search Result- JaksTravel</title>
    <link href="FrontAssets/img/JaksLogo.png" rel="icon">
    @extends('Front.app')
</head>

@section('content')
<div class="container-xxl position-relative p-0">
    @include('Front.header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Flight Search Result</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Flights Search Result </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@if($searchFlightResult == "https://www.btres.com/FailedRes?_@=Response Unavail")
<div class="container text-center">
    <h4  class="display-8 text-danger text-center mb-3 animated slideInDown">Sorry, No Result found for the search criteria !</h4>
    <a class="btn btn-sm  btn-warning w-90 py-2 custom-hover-btn" id="goBack" href="/flights">Go Back!</a>
</div>
@else
<iframe src=" {{ $searchFlightResult }}" width="100%" height="100%" style="background-color: yellowgreen;"></iframe>
@endif

@include('Front.footer')
@endsection