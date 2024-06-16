<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About- JaksTravels</title>
    <link href="FrontAssets/img/JaksLogo.png" rel="icon">

    @extends('Front.app')

</head>

<body>
    @section('content')
    <div class="container-xxl position-relative p-0">
        @include('Front.header')
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/about">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7  wow fadeInUp">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Welcome to JaksTravel</h5>
                    <h2 class="mb-4">Your Passport to Exceptional Journeys </h2>
                    <p class="mb-4 txt-line-height">Embark on a journey of a lifetime with JaksTravel, where each destination is a canvas waiting to be painted with your unique experiences. We extend a warm invitation to explorers, dreamers, and seekers of unforgettable moments. JaksTravel is not just a travel platform; it is a sanctuary for those who believe in the transformative power of travel. Your adventure begins here, and the world is ready to be discovered.</p>
                </div>
                <div class="col-lg-5 ">
                    <img class="img-fluid rounded w-75 wow zoomIn cstm-img-round" data-wow-delay="0.5s" src="FrontAssets/img/About/about1.jpg">
                </div>

            </div>
            <div class="row g-5 align-items-center mt-3 mb-3">
                <div class="col-lg-5">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="FrontAssets/img/About/about3.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="FrontAssets/img/About/about4.jpg" style="margin-top: 25%;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7  wow fadeInUp">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Know About Us</h5>
                    <h2 class="mb-4">Who We Are ?</h2>
                    <p class="mb-4 txt-line-height">JaksTravel is more than a team; it's a family of travel enthusiasts, industry veterans, and creative minds driven by a shared passion for wanderlust. As avid explorers ourselves, we understand the transformative impact that travel can have on one's perspective. This empathy forms the cornerstone of JaksTravel's ethos – creating travel experiences that resonate with the soul.</p>


                </div>
            </div>

        </div>

    </div>

    <!-- hero background start -->
    <div class="container-xxl position-relative p-0 mt-4">
        <div class="container-xxl py-5 bg-dark about-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h3 class="display-5 text-primary2 mb-3 animated wow slideInDown">Our Mission</h3>
                <p class="mb-4 text-white txt-line-height wow slideInUp">Our mission at JaksTravel transcends the mere logistics of travel. We are on a quest to redefine the very essence of your journeys, turning each expedition into a tapestry of memories. Guided by the belief that travel is not just a physical movement but a spiritual and emotional odyssey, we aspire to make every step of your adventure a chapter worth telling.</p>

                <p class="mb-4 text-white txt-line-height wow slideInUp">At the core of our mission is a commitment to facilitating travel experiences that inspire, connect, and empower. We endeavour to go beyond being mere facilitators of trips; we aim to be the architects of transformative journeys that leave an indelible mark on your life.
                </p>

            </div>
        </div>
    </div>
    <!-- hero background end -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-12 text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal wow slideInUp">What Sets Us Apart?</h5>
                    <h2 class="mb-4 wow slideInUp">Why Choose JaksTravel? </h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="owl-carousel testimonial-carousel wow slideInUp">
                    <div class="service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>Expert Guidance</h5>
                        <p>Our travel experts are your navigators in the vast realm of travel. From planning itineraries to suggesting hidden gems, we are here to ensure your journey is as smooth as the waves lapping a tranquil beach.</p>

                    </div>
                    <div class="service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                        <h5>Unparalleled Convenience</h5>
                        <p>Booking with JaksTravel means embracing convenience. Our user-friendly platform ensures that your travel arrangements are just a click away, allowing you to focus on the excitement of your upcoming adventure.</p>
                    </div>
                    <div class="service-item rounded pt-3 custom-hover-btn p-4 border">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h5>A Global Network</h5>
                            <p>With a vast network of partners, JaksTravel opens doors to a world of possibilities. Whether you seek the bustling streets of a metropolis or the serene landscapes of a hidden retreat, our connections ensure that your dream destinations are within reach.</p>
                    </div>
                    <div class="service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>Commitment to Value</h5>
                        <p>We understand the importance of your hard-earned money. JaksTravel is committed to providing value for every penny spent. Our exclusive deals and discounts are designed to make your travel not just memorable but also cost-effective.</p>
                    </div>
                    <div class="service-item rounded pt-3 custom-hover-btn p-4 border">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>Personalised Experiences</h5>
                        <p>Your journey is personal, and so is our approach. JaksTravel crafts experiences that align with your preferences, ensuring that each adventure reflects your unique taste and style.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-xxl py-5 mt-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-12 text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal wow slideInUp">Our Word to You</h5>
                    <h2 class="mb-4 wow slideInUp">Our Promise </h2>
                     <p class="mb-4 txt-line-height wow slideInUp">At JaksTravel, we don't just sell tickets and book accommodations; we craft memories. Our promise is to be your trusted companion throughout your travel journey, offering support, inspiration, and the assurance that your experiences matter to us.
                </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5 mt-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-12 text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal wow slideInUp">Explore the Road Ahead</h5>
                    <h2 class="mb-4 wow slideInUp">Join Us on the Journey</h2>
                     <p class="mb-4 txt-line-height wow slideInUp">Embark on a journey with JaksTravel, where every destination is a chapter waiting to be written. Whether you're a seasoned traveller or venturing into the unknown for the first time, let JaksTravel be your guide.
                </p>
                     <p class="mb-4 txt-line-height wow slideInUp">Thank you for choosing JaksTravel – where your adventure begins, and the world awaits.
                </p>
                </div>
            </div>
        </div>
    </div>


    <!-- About End -->




    </div>


    @include('Front.footer')

    @endsection
</body>

</html>