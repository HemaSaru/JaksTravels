<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Flights- JaksTravels</title>

    <link href="FrontAssets/img/JaksLogo.png" rel="icon">

    @extends('Front.app')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

</head>

<body>
    @section('content')
    <div class=" bg-grey container-xxl position-relative p-0">
        @include('Front.header')
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Flights</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/flights">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Flights</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Search Toggle Filter Start  -->
        <div class="flight-form-container container-xxl py-0 mb-8">
            <div class="container1">
                <div class="text-center " data-wow-delay="0.1s">
                </div>
                <div class="tab-class text-center" data-wow-delay="0.1s" style="background-color: #fff; padding: 20px">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fas fa-plane-departure fa-2x text-dark"></i>
                                <div class="ps-3">
                                    <!-- <small class="text-body">Popular</small> -->
                                    <h6 class="mt-n1 mb-0 text-primary">Search Flights</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            @if($errors->has('error'))
                            <div class="alert alert-danger" id="success-alert" style="text-align: left;">
                                <strong> {{ $errors->first('error') }}</strong>
                            </div>
                            @endif

                            <form method="POST" id="searchFlightsForm" action=" {{ url('searchFlight') }}">
                                @csrf
                                <div class="row row g-3">
                                    <div class="col-lg-3">
                                        <div class="d-flex">
                                            <h6 class="text">Trip Type: </h6>
                                            <input type="radio" class="custom-ml-15" id="returnType" value="true" name="tripType" checked="checked">
                                            <label for="returnType" class="custom-ml-5">Return</label>

                                            <input type="radio" class="custom-ml-15" id="oneWayType" value="false" name="tripType">
                                            <label for="oneWayType" class="custom-ml-5"> One Way</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-auto col-sm-6">
                                        <input type="checkbox" class="form-check-input" id="directFlightsOnly">
                                        <label class="form-check-label" for="directFlightsOnly">
                                            Direct Flights Only
                                        </label>
                                    </div>
                                    <div class="col-lg-auto col-sm-6">
                                        <input type="checkbox" class="form-check-input" id="flexibleDatesFlight">
                                        <label class="form-check-label" for="flexibleDatesFlight">
                                            Flexible Date (+/-3 days)
                                        </label>
                                    </div>

                                </div>


                                <div class="row g-3 mt-2">
                                    <div class="col-lg-3 col-12">
                                        <div class="input-group">
                                            <div class="autocomplete" style="width: 500px;">
                                                <input type="text" class="form-control required @if($errors->has('error')) is-required @endif" id="leavingFrom" name="leavingFrom" value="{{ old('leavingFrom') }}" placeholder="Leaving From" style="z-index: 1; ">
                                                <span class="input-group-addon customFont" style="z-index: 10;">
                                                    <i class="fas fa-plane-departure text-primary custom-mt-ml"></i>
                                                </span>
                                                <div id="autocomplete-results" class="autocomplete-items "></div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-12">
                                        <div class="input-group">
                                            <div class="autocomplete" style="width: 500px;">
                                                <input type="text" class="form-control required @if($errors->has('error')) is-required @endif" id="goingTo" name="goingTo" value="{{ old('goingTo') }}" placeholder="Going To" style="z-index: 1;">
                                                <span class="input-group-addon customFont" style="z-index: 10;">
                                                    <i class="fas fa-map-marker-alt text-primary custom-mt-ml"></i>
                                                </span>
                                                <div id="autocomplete-results2" class="autocomplete-items "></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-12">
                                        <div id="departDatepicker" class="input-group date" data-date-format="dd/mm/yyyy">
                                            <input class="form-control" id="depart" name="depart" type="text" style="z-index: 1;" placeholder="Depart Date" readonly />

                                            <span class="input-group-addon" style="z-index: 10;">
                                                <i class="far fa-calendar-alt text-primary custom-mt-ml"></i>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div id="returnDatepicker" class="input-group date" data-date-format="dd/mm/yyyy">
                                            <input class="form-control" type="text" style="z-index: 1;" id="return" name="return" placeholder="Depart Date" readonly />

                                            <span class="input-group-addon" style="z-index: 10;">
                                                <i class="far fa-calendar-alt text-primary custom-mt-ml"></i>
                                            </span>
                                        </div>

                                    </div>

                                </div>

                                <div class="row g-3 mt-1">

                                    <div class="col-lg-3 col-12">
                                        <select class=" form-select" name="airlinesList" id="airlinesList">
                                            <option value=""> List of Airlines </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-12">
                                        <select class=" form-select required @if($errors->has('error')) is-required @endif" id="airlinesClass" name="airlinesClass">
                                            <option selected value="0"> Class</option>
                                            <option value="Business"> Business</option>
                                            <option value="Economy"> Economy</option>
                                            <option value="First"> First </option>
                                            <option value="Premium"> Premium </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-12"> <!-- touchspin area -->
                                        <div class="passengerSelectContainer">

                                            <div class="total-container">
                                                <input type="text" id="total" class="form-control" placeholder="No Of Passengers" readonly>

                                                <span class="input-group-addon" style="z-index: 10;">
                                                    <i class="fas fa-users text-primary custom-mt-ml"></i>
                                                </span>
                                            </div>
                                            <div id="NoOfPassSubSection" class="sub-section mt-3">
                                                <div class="sub-row">
                                                    <label class="sub-label" for="adult">Adult (>12)</label>
                                                    <input type="text" id="adult" name="adult" class="form-control sub-input" value="1">
                                                </div>
                                                <div class="sub-row">
                                                    <label class="sub-label" for="youth">Youth (12-15):</label>
                                                    <input type="text" id="youth" name="youth" class="form-control sub-input" value="0">
                                                </div>
                                                <div class="sub-row">
                                                    <label class="sub-label" for="child">Child (2-11):</label>
                                                    <input type="text" id="child" name="child" class="form-control sub-input" value="0">
                                                </div>
                                                <div class="sub-row">
                                                    <label class="sub-label" for="infant">Infant ( <2): </label>
                                                            <input type="text" id="infant" name="infant" class="form-control sub-input" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 mt-1">
                                    <div class="col-12 align-centre">
                                        <button class="btn btn-sm btn-warning w-90 py-2 custom-hover-btn" id="btnSearch" type="submit">Search</button>
                                    </div>

                                </div>


                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- flight content -->
        <div class="container home-sec-services flight-home-sec-services mt-8">
            <div class="row g-4 mt-6">
                <div class="col-12 text-center">
                    <h6 class="section-title ff-secondary text-center text-primary fw-normal wow slideInUp">Your Gateway to Seamless Travel!</h6>
                    <h4 class="mb-4 wow slideInUp">Welcome to JaksTravel </h4>
                    <p>At JaksTravel, we understand that your journey begins the moment you start planning. Our dedicated Flight page is tailored to make your air travel experience not just convenient, but also cost-effective. Here's how we go the extra mile to ensure you soar smoothly through the skies:</p>
                </div>

            </div>
        </div>
        <!-- Services section -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-12 text-center">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal wow slideInUp">What Sets Us Apart?</h5>
                        <h2 class="mb-4 wow slideInUp">Why Choose Us? </h2>
                    </div>
                </div>

                <div class="row g-4 mt-3">
                    <div class="col-lg-4 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-tags text-primary mb-4"></i>
                        <h5>Unbeatable Deals and Discounts</h5>
                        <p>Why pay more when you can pay less? At JaksTravel, we pride ourselves on sourcing the best flight deals and discounts for our customers. Our team tirelessly scours the web to bring you exclusive offers that guarantee savings on every booking. Whether you're a frequent flyer or planning a one-time getaway, we've got the deals that fit your budget.</p>

                    </div>
                    <div class="col-lg-4 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-search-plus text-primary mb-4"></i>

                        <h5>Smart Search Engine</h5>
                        <p>Navigating through countless flight options can be overwhelming. That's why our user-friendly search engine is designed to simplify the process. Enter your preferences, and let our advanced algorithms find the best matches. Filter results based on airlines, prices, and layovers to customise your journey and make informed decisions</p>

                    </div>
                    <div class="col-lg-4 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>Expert Advice for Maximum Savings</h5>
                        <p>Not sure when to book or which days are the cheapest to fly? Our expert travel advisors are here to guide you. Receive real-time insights into the best times to book, travel hacks, and insider tips to maximise your savings. Trust JaksTravel to turn your travel dreams into affordable realities</p>

                    </div>
                </div>
                <div class="row g-4 mt-3">
                    <div class="col-lg-4 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-atlas text-primary mb-4"></i>
                        <h5>Exclusive Loyalty Program</h5>
                        <p>Why stop at one trip? Join our loyalty program and unlock a world of exclusive benefits. Earn points with every booking and enjoy perks like free upgrades, priority boarding, and more. JaksTravel believes in rewarding your loyalty, making your travel experience not just economical but also luxurious.</p>

                    </div>
                    <div class="col-lg-4 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-handshake text-primary mb-4"></i>
                        <h5>Hassle-Free Booking</h5>
                        <p>Say goodbye to long queues and complicated booking processes. With JaksTravel, booking your flights is a breeze. Our streamlined platform ensures a hassle-free experience, allowing you to secure your seats with just a few clicks. Enjoy the convenience of instant confirmations and e-tickets sent directly to your inbox.</p>

                    </div>
                    <div class="col-lg-4 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-bell text-primary mb-4"></i>
                        <h5>Stay Informed with Travel Alerts</h5>
                        <p>We know that plans can change. That's why our travel alerts keep you in the loop. Receive real-time updates on your flight status, gate changes, and more. JaksTravel ensures that you're always informed, allowing you to navigate your journey with confidence.</p>

                    </div>
                </div>

                <div class="row g-4 mt-3">
                    <div class="col-lg-3 service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-luggage-cart text-primary mb-4"></i>
                        <h5>Your Journey, Our Priority</h5>
                        <p>At JaksTravel, we're not just a travel website; we're your travel partners. Our commitment to providing unbeatable deals, smart solutions, and personalised assistance sets us apart. Let JaksTravel be your companion in making every flight a memorable and budget-friendly experience.</p>

                    </div>
                </div>

            </div>

        </div>

    </div>
    @include('Front.footer')

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->


    <script src="{{ asset('FrontAssets/js/flightSearch.js') }}"></script>

    <script>
        $(function() {
            let currentDate = new Date();
            var returnDate = new Date(currentDate);
            returnDate.setDate(currentDate.getDate() + 5);

            $("#departDatepicker").datepicker({

                autoclose: true,
                todayHighlight: true,

            }).datepicker("setDate", currentDate);

            $("#returnDatepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
            }).datepicker("setDate", returnDate);
        });
    </script>
    <script>
        $(document).ready(function() {


            $('#adult, #youth, #child, #infant').TouchSpin();
            // Show the sub-section when #total input is focused
            $('#total').focus(function() {
                $('#NoOfPassSubSection').show();
            });

            $('#total').blur(function() {
                $('#NoOfPassSubSection').hide();
            });

            // Update the total in the main input based on sub-section inputs
            function updateTotal() {
                var input1Val = parseInt($('#adult').val()) || 0;
                var input2Val = parseInt($('#youth').val()) || 0;
                var input3Val = parseInt($('#child').val()) || 0;
                var input4Val = parseInt($('#infant').val()) || 0;

                var total = input1Val + input2Val + input3Val + input4Val;
                $('#total').val(total);
            }

            // Update the total when any sub-section input changes
            $('#adult, #youth, #child, #infant').change(updateTotal);



        });
    </script>

    @endsection
</body>

</html>