<header id="mu-header" class="" role="banner">
    <div class="container">
        <nav class="navbar navbar-default mu-navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Text Logo -->
                    <a class="navbar-brand" href="index.html"><i class="fa fa-book" aria-hidden="true"></i>
                        Read The Books</a>

                    <!-- Image Logo -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav mu-menu navbar-right">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#mu-book-overview">OVERVIEW</a></li>
                        <li><a href="#mu-author">AUTHOR</a></li>
                        {{-- <li><a href="#mu-pricing">PRICE</a></li> --}}
                        <li><a href="#mu-testimonials">TESTIMONIALS</a></li>
                        {{-- <li><a href="#mu-contact">CONTACT</a></li> --}}
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ route('/dashbook') }}">DASHBOARD</a></li>
                            @else
                                <li><a href="{{ route('login') }}">LOGIN</a></li>
                                {{-- @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">REGISTER</a></li>
                                @endif --}}
                            @endauth
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>
