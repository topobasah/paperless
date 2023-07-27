<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=1050, user-scalable=no">
    {{-- <meta name="description" content=""> --}}
    {{-- <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"> --}}
    {{-- <meta name="generator" content="Hugo 0.84.0"> --}}
    <title>Read :: {{ $catalog->judul }}</title>

    <script type="text/javascript" src="{{ asset('frontend/turnjs4/extras/jquery.min.1.7.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/turnjs4/extras/jquery-ui-1.8.20.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/turnjs4/extras/modernizr.2.5.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/turnjs4/lib/hash.js') }}"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer-navbar/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        main>.container {
            padding: 60px 15px 0;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">{{ $catalog->judul }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('all.dashbook') }}">Home</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ route('/dashbook') }}" class="nav-link">DASHBOARD</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                                </li>
                                {{-- @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">REGISTER</a></li>
                                @endif --}}
                            @endauth
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Begin page content -->
    <main class="flex-shrink-0">

        <div class="flipbook-viewport">
            <div class="container">
                <div class="flipbook">
                    @for ($i = 1; $i <= $catalog->halaman; $i++)
                        <div
                            style="background-image: url({{ route('view.flipbook', ['id' => $catalog->id, 'file' => $i . '.png']) }})">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">&copy; 2023 - Fakultas Kedokteran dan Kesehatan UMJ</span>
        </div>
    </footer>


    <script type="text/javascript">
        function loadApp() {

            // Create the flipbook

            $('.flipbook').turn({
                // Width

                width: 922,

                // Height

                height: 600,

                // Elevation

                elevation: 50,

                // Enable gradients

                gradients: true,

                // Auto center this flipbook

                autoCenter: true

            });
        }

        // Load the HTML4 version if there's not CSS transform

        yepnope({
            test: Modernizr.csstransforms,
            yep: ['{{ asset('frontend/turnjs4/lib/turn.js') }}'],
            nope: ['{{ asset('frontend/turnjs4/lib/turn.html4.min.js') }}'],
            both: ['{{ asset('frontend/turnjs4/css/basic.css') }}'],
            // yep: ['../../lib/turn.js'],
            // nope: ['../../lib/turn.html4.min.js'],
            // both: ['css/basic.css'],
            complete: loadApp
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


</body>

</html>
