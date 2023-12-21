<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-inner-pages">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{ route('home') }}">ALLUC</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="{{ route('home') }}">Home</a></li>
                    <li><a class="active" href="{{ route('carss') }}">Cars</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">{{ $car->car_name }}</a></li>
                </ol>
                <h2>{{ $car->car_name }} details</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">
                            <div id="datepicker"></div>
                            <div class="entry-img">
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->car_name }}"
                                    class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="#">{{ $car->car_name }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{ $car->staff->first_name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="#"><time
                                                datetime="{{ $car->created_at }}">{{ $car->created_at->format('M d, Y') }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-geo"></i> <a
                                            href="#">{{ $car->location }}</a></li>
                                </ul>
                            </div>
                            <h5 class="entry-meta">Rate:</h5>
                            <form method="POST" action="{{ route('car.review') }}">
                                @csrf
                                <div class="rating">
                                    <input type="hidden" name="car_id" value="{{ $car->car_id }}">
                                    <input type="radio" name="star" id="star1" value="1"><label
                                        for="star1"></label>
                                    <input type="radio" name="star" id="star2" value="2"><label
                                        for="star2"></label>
                                    <input type="radio" name="star" id="star3" value="3"><label
                                        for="star3"></label>
                                    <input type="radio" name="star" id="star4" value="4"><label
                                        for="star4"></label>
                                    <input type="radio" name="star" id="star5" value="5"><label
                                        for="star5"></label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </form>
                            <div>

                            </div>

                            <br>
                            <div class="entry-content">
                                <p>
                                    {{ $car->description }}
                                </p>

                                <ul>
                                    <li><strong>Plate Number:</strong> {{ $car->plate_number }}</li>
                                    <li><strong>Model Year:</strong> {{ $car->car_model_year }}</li>
                                    <li><strong>Color:</strong> {{ $car->color }}</li>
                                    <li><strong>Rate:</strong> {{ $car->rate }}</li>
                                    <li><strong>Status:</strong> {{ $car->status }}</li>
                                </ul>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-warning text-light"
                                        style="background-color: #f6b024;"> <a href="{{ route('bookings') }}}}"
                                            class="text-light">Book Now!</a></button>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="{{ route('car.search') }}" method="GET">
                                    <input type="text" name="query">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @php
                                        $categories = ['SEDAN', 'SUV', 'PICKUP', 'CITY CAR', 'UTILITY VEHICLE'];
                                    @endphp

                                    @foreach ($categories as $category)
                                        @php
                                            $count = \App\Models\Car::where('category', $category)->count();
                                        @endphp
                                        <li><a href="{{ route('category.cars', ['category' => $category]) }}">{{ $category }}
                                                <span>({{ $count }})</span></a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar categories-->
                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->


    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

    </script>

</body>

</html>
