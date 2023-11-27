<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title> {{$title ?? 'Beranda'}} | Wisnu Trisardi </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user') }}/css/vendor.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user') }}/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800;900&family=Nunito+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- script
        ================================================== -->
    <script src="{{ asset('assets/user') }}/js/modernizr.js"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navigation-bar" tabindex="0">


    <div class=" offcanvas-btn text-end m-3">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight">
            <iconify-icon icon="ci:hamburger-lg" style="font-size: 30px;"></iconify-icon>
        </button>
    </div>

    {{$slot}}

    <script src="{{ asset('assets/user') }}/js/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('assets/user') }}/js/plugins.min.js"></script>
    <script src="{{ asset('assets/user') }}/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>


</body>

</html>
