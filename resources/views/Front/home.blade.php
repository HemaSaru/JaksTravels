<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home- JaksTravels</title>

    <link href="FrontAssets/img/JaksLogo.png" rel="icon">
    @extends('Front.app')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    @section('content')
    <div class="bg-grey">
        <div class="container-xxl position-relative p-0 bg-white">
            @include('Front.header')

            <!-- home slider section  -->
            <section class="hero-slider-section">
                <!-- slider-area -->
                <div class="slider-wrapper">
                    <div class="active-slider owl-carousel">
                        <div class="slider-items bg-img-1">
                            <div class="sigle-item">
                                <div class="container g-4 ">
                                    <h2 class="text-primary">Limited-Time Savings – Your Next Adventure Awaits!</h2>
                                    <p>Enjoy unparalleled savings on flights and hotels, carefully negotiated to bring you the best value. From city escapes to seaside retreats, these exclusive offers are available for a limited time only.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider-items bg-img-2">
                            <div class="sigle-item">
                                <div class="container g-4 ">
                                    <h2 class="text-primary">Unwrap the Warmth of the Maldives</h2>
                                    <p>Trade the winter chill for sun-kissed beaches and crystal-clear waters in the Maldives. Immerse yourself in luxury, unwind in overwater bungalows, and experience the warmth of a tropical haven.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider-items bg-img-3">
                            <div class="sigle-item">
                                <div class="container g-4 ">

                                    <h2 class="text-primary">Themed Packages for Every Taste</h2>
                                    <p>From romantic getaways along the breathtaking coastline to family adventures in the heart of historic cities, our themed packages offer a spectrum of experiences.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-area-ends -->
            </section>
            <!-- Search Toggle Filter Start  -->
            <div class="form-container container-xxl3 py-0 mb-9">

                <div class="text-center " data-wow-delay="0.1s">
                </div>
                <div class="tab-class text-center" data-wow-delay="0.1s" style="background-color: #fff; padding: 20px">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fas fa-plane-departure fa-2x text-dark"></i>
                                <div class="ps-3">
                                    <!-- <small class="text-body">Popular</small> -->
                                    <h6 class="mt-n1 mb-0 text-primary">Flights</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">

                                <!-- <i class="fas fa-home fa-2x text-dark"></i> -->
                                <div class="ps-3">
                                    <!-- <h6 class="mt-n1 mb-0 text-primary">Hotels</h6> -->
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
                                <div class="row g-3">
                                    <div class="col-lg-3">
                                        <div class="d-flex">
                                            <h6 class="text">Trip Type: </h6>
                                            <input type="radio" class="custom-ml-15" id="returnType" value="true" name="tripType" checked="checked">
                                            <label for="returnType" class="custom-ml-5">Return</label>

                                            <input type="radio" class="custom-ml-15" id="oneWayType" value="false" name="tripType">
                                            <label for="oneWayType" class="custom-ml-5"> One Way</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-12">
                                        <input type="checkbox" class="form-check-input" id="directFlightsOnly">
                                        <label class="form-check-label" for="directFlightsOnly">
                                            Direct Flights Only
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-12">
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
                                                <input type="text" class="form-control required ph @if($errors->has('error')) is-required @endif" id="leavingFrom" name="leavingFrom" value="{{ old('leavingFrom') }}" placeholder="Departure Airport" style="z-index: 1; ">
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
                                                <input type="text" class="form-control required @if($errors->has('error')) is-required @endif" id="goingTo" name="goingTo" value="{{ old('goingTo') }}" placeholder="Destination Airport" style="z-index: 1;">
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
                                        <select class=" form-select required  @if($errors->has('error')) is-required @endif" id="airlinesClass" name="airlinesClass">
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

        <!-- Services Section Start -->
        <div class="container home-sec-services">
            <div class="row g-4 mt-6">
                <div class="col-12  text-center">
                    <h6 class="section-title text-center text-primary fw-normal wow slideInUp">What Sets Us Apart</h6>
                    <h4 class="mb-4 wow slideInUp">Why Choose JaksTravel?</h4>
                </div>
                <div class="owl-carousel services-carousel wow slideInUp text-center">
                    <div class=" pt-3 p-4 border ">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h6>Expert Guidance</h6>

                    </div>
                    <div class=" pt-3 p-4 border">
                        <i class="fa fa-3x fa-check-circle text-primary mb-4"></i>
                        <h6>Unparalleled Convenience</h6>
                    </div>
                    <div class=" pt-3  p-4 border">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h6>A Global Network</h6>
                    </div>
                    <div class=" pt-3 p-4 border">
                        <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                        <h6>Commitment to Value</h6>
                    </div>
                    <div class=" pt-3   p-4 border">
                        <i class="fa fa-3x fa-suitcase text-primary mb-4"></i>
                        <h6>Personalised Experiences</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us, Top Destinations, FAQs Section -->
        <div class="container-xxl py-5 mt-4">
            <div class="container">
                <!-- About Us Section -->
                <div class="row g-5 align-items-center">
                    <div class="col-12 text-center">
                        <h5 class="section-title  text-center text-primary fw-normal wow slideInUp">Know About Us</h5>
                        <h2 class="mb-4 wow slideInUp">JaksTravel - An Overview</h2>
                        <p class="mb-4 txt-line-height wow slideInUp">Welcome to JaksTravel, where we redefine your journey. We specialise in curating unbeatable deals on airline tickets, ensuring seamless travel experiences. Let us elevate your adventures, making every flight an opportunity to explore more while saving big. Your dream destinations await – discover, book, and fly with JaksTravel
                        </p>
                        <a href="/about" class="mb-4 text-dark">
                            <button class="btn btn-sm btn-warning w-90 py-2 custom-hover-btn" id="btnSearch" type="submit">Read More </button>
                        </a>
                    </div>
                </div>

                <!-- Top Destinations section  -->
                <div class="row g-5 align-items-center mt-4">
                    <div class="col-12 text-center">
                        <h5 class="section-title  text-center text-primary fw-normal wow slideInUp">Popular Places</h5>
                        <h2 class="mb-4 wow slideInUp">Top Destinations</h2>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <figure class="destination-img hover">
                                <img src="/FrontAssets/img/destination/dubai.jpg" />
                                <figcaption>
                                    <h3><u>DUBAI FLIGHTS</u></h3>
                                    <h4>Indulge in luxury amid futuristic skyscrapers, desert adventures, and opulent shopping, where tradition meets modern extravagance in the desert city.</h4>
                                </figcaption>
                                <a href="#"></a>
                            </figure>
                        </div>
                        <div class="col-lg-3">
                            <figure class="destination-img "><img src="/FrontAssets/img/destination/thailand.jpg" alt="sample109" />
                                <figcaption>
                                    <h3><U>Thailand Flights</U></h3>
                                    <h4>Discover tropical paradise with pristine beaches, bustling markets, and rich cultural heritage, offering a perfect blend of adventure and relaxation</h4>
                                </figcaption>
                                <a href="#"></a>
                            </figure>
                        </div>
                        <div class="col-lg-3">
                            <figure class="destination-img"><img src="/FrontAssets/img/destination/usa.jpg" alt="sample117" />
                                <figcaption>
                                    <h3><u>USA Flights</u></h3>
                                    <h4>Experience the American dream with iconic landmarks, diverse cities, and breathtaking national parks, from the vibrant NYC to the Grand Canyon.</h4>
                                </figcaption>
                                <a href="#"></a>
                            </figure>
                        </div>
                        <div class="col-lg-3">
                            <figure class="destination-img"><img src="/FrontAssets/img/destination/australia.jpg" alt="sample117" />
                                <figcaption>
                                    <h3 style="text-transform: uppercase;"><u>Australia Flights</u></h3>
                                    <h4>Explore the land Down Under, home to stunning beaches, unique wildlife, and the iconic Sydney Opera House, offering adventure and relaxation.</h4>
                                </figcaption>
                                <a href="#"></a>
                            </figure>
                        </div>
                    </div>
                </div>

                <!-- FAQs section -->
                <div class="row g-5 align-items-center mt-4">
                    <div class="col-12 text-center">
                        <h2 class="mb-4 wow slideInUp">FAQs</h2>
                        <h5 class="section-title  text-center text-primary fw-normal wow slideInUp"></h5>

                    </div>
                    <div class="row align-items-center mt-5">
                        <div class="col-lg-6 faq-accordion">
                            <ul class="">
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>What information do you need when booking a flight?</h5>
                                    <p>For a smooth booking experience, provide departure/destination airports, travel dates, passenger details, class preference, airline choices, and accurate contact/payment information. Tailor your journey effortlessly with us!</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>How many hours before can we book flight tickets?</h5>
                                    <p>Flight tickets are usually available for booking up to 24 hours before departure. Secure your seats, plan your journey, and enjoy a hassle-free experience with our timely reservations.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>Which time flight ticket is cheapest?</h5>
                                    <p>Off-peak hours often offer the cheapest flight tickets. Plan your journey during less busy times for budget-friendly options and a smoother travel experience.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>How can I modify or cancel my flight reservation?</h5>
                                    <p>You can easily modify or cancel your flight reservation through the "Manage Booking" section on our website. Please note that certain changes may incur fees, and refund policies vary depending on the fare type.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>What is the difference between economy, premium economy, and business class?</h5>
                                    <p>Economy class provides standard seating, while premium economy offers more legroom and enhanced services. Business class provides additional amenities, including priority boarding, premium seating, and gourmet meals.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 faq-accordion">
                            <ul>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>Are there any restrictions on baggage allowances?</h5>
                                    <p>Baggage allowances vary by airline and fare type. Check the specific baggage policies during the booking process or contact our customer service for detailed information on weight limits, fees for excess baggage, and carry-on restrictions.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>Can I book a one-way ticket or do I have to book a round trip?</h5>
                                    <p>You can book either a one-way or round-trip ticket based on your travel needs. Some airlines may offer discounts for round-trip bookings, so it's worth exploring both options to find the best deal.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>What travel documents do I need for international flights?</h5>
                                    <p>Ensure you have a valid passport and any required visas for your destination. Check entry requirements and travel advisories, and make sure your passport has at least six months' validity beyond your intended return date.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>How do I request special assistance or meals during the flight?</h5>
                                    <p>You can request special assistance, such as wheelchair service or special meals, during the booking process or by contacting our customer service. Airlines provide various services to accommodate passengers with specific needs</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h5>Can I earn frequent flyer miles for my flight?</h5>
                                    <p>Yes, you can earn frequent flyer miles with most airlines by providing your loyalty program information during the booking process. Make sure to enter your membership details to accumulate miles for future rewards and benefits.</p>
                                </li>
                            </ul>
                        </div>
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

            //Services Carousel
            var owl = $('.services-carousel');
            owl.owlCarousel({
                items: 5,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 3
                    },
                    769: {
                        items: 6
                    }
                }
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })

            //home carousel
            $(".active-slider").owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                //animation
                animateOut: "fadeOut",
                autoplay: true,
                //icon for nav
                navText: ["<h1> < </h1>", "<h1> > </h1>"]
            });

            //Top destination card
            $(".hover").mouseleave(
                function() {
                    $(this).removeClass("hover");
                }
            );

        });
    </script>
    <script>

    </script>
    <!-- Service End -->




    @endsection
</body>

</html>