<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JaksTravel</title>

    <!-- Favicon -->
    <link href="FrontAssets/img/JaksLogo.png" rel="icon">
    <!-- <link rel="icon" type="image/x-icon" href="FrontAssets/img/JaksLogo.png"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('FrontAssets/lib/animate/animate.min.css') }} " rel="stylesheet">
    <link href="{{ asset('FrontAssets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontAssets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('FrontAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />  <!--datepicker -->


    <!-- Template Stylesheet -->
    <link href="{{ asset('FrontAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontAssets/css/customStyle.css') }}" rel="stylesheet">

    <style> 
        .custom-padding{
            padding: 75px 39px
        }
    </style>
</head>

<body>
<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        
        @yield('content')
</div>

    

      <!-- JavaScript Libraries -->
    <script src="{{ asset('FrontAssets/jquery-3.4.1.min.js') }}"></script>
    <!-- <script src="{{ asset('FrontAssets/bootstrap.bundle.min.js') }}"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  [online cdn link of jquery used for this theme]-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script src="{{ asset('FrontAssets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('FrontAssets/lib/easing/easing.min.js') }} "></script>
    <script src="{{ asset('FrontAssets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('FrontAssets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('FrontAssets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('FrontAssets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('FrontAssets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('FrontAssets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('FrontAssets/js/main.js') }}"></script>
</body>

</html>