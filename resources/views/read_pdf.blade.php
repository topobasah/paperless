<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    {{-- <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"> --}}
    {{-- <meta name="generator" content="Hugo 0.84.0"> --}}
    <title>Read :: {{ $catalog->judul }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.8.162/web/pdf_viewer.min.css">

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
    {{-- <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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

                            @endauth
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header> --}}


    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container-fluid">
            @php
                $split = explode('/', $catalog->pdf);
                // dd($split[1]);
            @endphp

            <div class="row justify-content-center">
                {{-- <object data="{{ route('view.pdf', ['id' => $catalog->id, 'file' => $split[1]]) }}" width="100%"
                    height="100%" type="application/pdf">
                    <p>Your web browser doesn't have a PDF plugin.</p>
                </object> --}}
                <embed
                    src="{{ route('view.pdf', ['id' => $catalog->id, 'file' => $split[1]]) . '#toolbar=0&view=FitH' }}"
                    width="100%" height="600px">
                {{-- <iframe src="{{ route('view.pdf', ['id' => $catalog->id, 'file' => $split[1]]) . '#toolbar=0' }}"
                    frameborder="0" width="900" height="600" scrolling="auto"></iframe> --}}
            </div>
        </div>

    </main>

    {{-- <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">&copy; 2023 - Fakultas Kedokteran dan Kesehatan UMJ</span>
        </div>
    </footer> --}}




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


</body>

</html>
