    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/calendar/main.css') }}">
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/woah.css') }}">

    @foreach ($dataProfile as $itemProfile)
        <link rel="icon" type="image/png" sizes="16x16" href="{{ $itemProfile->favicon }}">
    @endforeach

    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/dist/assets/owl.theme.default.min.css') }}" />

    <!-- LIGHTBOX CSS -->
    <link rel="stylesheet" href="{{ asset('assets/lightbox2-dev/dist/css/lightbox.css') }}" />


    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/limarquee/css/liMarquee.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/limarquee/style.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/lightgallery/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-v6.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/nivo-slider/themes/default/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/nivo-slider/nivo-slider.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/nivo-slider/jquery.nivo.slider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="{{ asset('assets/calendar/main.js') }}"></script>
    <script src="{{ asset('assets/scrolling/jquery.marquee.js') }}"></script>
    <script src="{{ asset('assets/scrolling/jquery.easing.1.3.js') }}"></script>


    <script src="{{ asset('assets/limarquee/js/jquery.liMarquee.js') }}"></script>
    <script src="{{ asset('assets/lightgallery/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/owlcarousel/dist/owl.carousel.min.js') }}"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous"></script>



    <link href=" https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/css/nanogallery2.min.css" rel="stylesheet"
        type="text/css">
    <script script type="text/javascript" src="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/jquery.nanogallery2.min.js">

    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('assets/lightbox2-dev/dist/js/lightbox.js') }}"></script>
