<header>
     <section class="header-section p-0 new-header">
                <div class="main-header">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container">
                            <a class="navbar-brand main-logo" href="index.php" title="Smile">
                                <div class="logo-div">
                                    <img src="{{ asset('assets/frontend/images/logo-new.png') }}" alt="Logo">

                                </div>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="{{ url('/') }}" title="Home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="{{ url('/about') }}" title="About Us">About
                                            Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="{{ url('/retail') }}"
                                            title="Retail">Retail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="{{ url('/bulk_order') }}"
                                            title="Bulk Orders">Bulk
                                            Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="{{ url('/contact') }}"
                                            title="Contact Us">Contact Us</a>
                                    </li>

                                </ul>
                                <li class="d-flex" role="search">
                                    <a class="nav-link main-btn outline-green-btn" href="{{ url('/contact') }}"
                                        title="Enquiry Now">Enquiry
                                        Now </a>
                                </li>
                            </div>
                        </div>
                    </nav>
                    <!-- responsive -->

                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <div>
                                <img src="{{ asset('assets/frontend/images/smile-logo.png') }}" alt="logo">
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/') }}" title="Home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/about') }}" title="About Us">About
                                        Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/retail') }}" title="Retail">Retail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/bulk_orders') }}"
                                        title="Bulk Orders">Bulk
                                        Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/contact') }}"
                                        title="Contact Us">Contact Us</a>
                                </li>

                            </ul>
                            <li class="d-flex" role="search">
                                <a class="nav-link main-btn outline-green-btn" href="{{ url('/contact') }}"
                                    title="Enquiry Now">Enquiry
                                    Now </a>
                            </li>
                        </div>
                    </div>
                </div>
            </section>

            <div id="preloader">
                <div class="preloader">
                    <span></span>
                    <span></span>
                </div>
            </div>
</header>
