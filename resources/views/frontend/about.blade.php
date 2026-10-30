@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')
    <section class="about-banner">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-head">
                        <h1>
                            About Us
                        </h1>
                        <ul>
                            <li>
                                <a href="index.php" title=" Home">Home</a>
                            </li>

                            <li>
                                |
                            </li>

                            <li>
                                About Us
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-first">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-about">

                        <img src="{{ asset('assets/frontend/images/about/about-first.jpg') }}" alt="img">
                        <div class="about-us-float">
                            <h5>
                                ABOUT <span class="abt">US
                                    <img src="{{ asset('assets/frontend/images/icon.png') }}" alt="img">
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="right-about">
                        <p>
                            At Smile, we're more than just a gift shop, we're your partner in creating moments of joy,
                            warmth, and lasting connections. Our passion for thoughtful gifting drives everything we do, and
                            we take pride in curating a collection of unique gifts that reflect the essence of happiness.
                            Founded with the belief that every gift should bring a smile, we've dedicated ourselves to
                            making your gift-giving experience extraordinary. Whether celebrating milestones, expressing
                            appreciation, or simply sharing a moment of happiness, our gifts are carefully chosen to convey
                            your emotions and leave a lasting impression. We understand that the best gifts are personal and
                            meaningful. That's why we offer personalised options, allowing you to add that special touch to
                            your chosen item. Our friendly team is here to assist you in finding the perfect gift for every
                            occasion.
                            At Smile, we believe in the power of human connection, and we're honored to play a part in
                            making your moments more memorable.
                            Join us on this journey of spreading joy, one thoughtful gift at a time.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="big-image">
                        <img src="{{ asset('assets/frontend/images/about/big.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us-two">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="about-box  wow fadeInLeft infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <div class="abt-img">
                            <img src="{{ asset('assets/frontend/images/about/Galore.png') }}" alt="img">
                        </div>
                        <h2>A World of Choices</h2>
                        <h5>Gift Galore</h5>
                        <p>
                            Our eclectic mix caters to all tastes, ensuring the ideal gift for any and every
                            occasion.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="about-box  wow fadeInUp infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="abt-img">
                            <img src="{{ asset('assets/frontend/images/about/Corporate.png') }}" alt="img">
                        </div>
                        <h2>Elevate Your Impressions</h2>
                        <h5>Corporate Gifting
                        </h5>
                        <p>Custom-crafted corporate gifts designed to wow your clients and delight your employees.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="about-box  wow fadeInRightt infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
                        <div class="abt-img">
                            <img src="{{ asset('assets/frontend/images/about/Splendor.png') }}" alt="img">
                        </div>
                        <h2>Gifts for Every Time of Year</h2>
                        <h5>Seasonal Splendor</h5>
                        <p>Dive into our rotating array of seasonal and themed gifts, always offering something new
                            and exciting.</p>
                    </div>
                </div>
                <div class="about-right">
                    <img src="{{ asset('assets/frontend/images/about/Vector.png') }}" alt="img">
                </div>

            </div>
        </div>
    </section>
    <section class="about-slider">
        <div class="container">
            <div class="row">
                <div class="test-haed wow fadeInDown infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <h5>
                        Customer Stories of

                        <span class="color">
                            Gifting Excellence
                        </span>
                    </h5>
                    <p>
                        Explore heartfelt experiences shared by our loyal customers. Their testimonials reflect the
                        high quality and originality of our gift gifts.
                    </p>
                </div>
                <div class="vector-3">
                    <img src="{{ asset('assets/frontend/images/about/vector-3.png') }}" alt="img">
                </div>
            </div>
            <div class="row about-slider">
                <div class="col-lg-6 col-md-6">
                    <div class="left-box-slide">
                        <div class=" owl-carousel owl-two owl-theme">
                            <div class="item">
                                <div class="left-side">
                                    <div class="slider-head">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                    <div class="slider-parah">
                                        <!-- <div class="slide-image">
                                                    <img src="./assets/images/about/tset.jpg" alt="img">
                                                </div> -->
                                        <div class="slider-text">
                                            <p>
                                                Smile's unique gifts transformed our workspace, adding a special
                                                touch. Their perfect blend of aesthetics truly sets them apart!
                                            </p>
                                            <h5>
                                                Pragathi
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="left-side">
                                    <div class="slider-head">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                    <div class="slider-parah">

                                        <div class="slider-text">
                                            <p>
                                                Our team loved the gifts, and it meant a lot to see their happiness.
                                                Choosing thoughtful gifts shows our dedication to strong connections
                                                with employees.
                                            </p>
                                            <h5>
                                                Praveen Kumar
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="left-side">
                                    <div class="slider-head">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                    <div class="slider-parah">

                                        <div class="slider-text">
                                            <p>
                                                Just had an awesome shopping experience at Smile Gift Shop! Their
                                                collections are unique and charming.
                                            </p>
                                            <h5>
                                                Ryan Davis
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="left-side">
                                    <div class="slider-head">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                    <div class="slider-parah">

                                        <div class="slider-text">
                                            <p>
                                                Smile Gift Shop is a hidden treasure. From affordable luxury to
                                                heartfelt gifts, it's a delightful experience. Highly recommended!!!
                                            </p>
                                            <h5>
                                                Zayd
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="left-side">
                                    <div class="slider-head">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                    <div class="slider-parah">

                                        <div class="slider-text">
                                            <p>
                                                Visit a smile store to get the ideal combination of cosy business
                                                attire! Excellent find for classy business presents.
                                            </p>
                                            <h5>
                                                Swathi
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="right-common wow fadeInRight infinite" data-wow-duration="3s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 3s; animation-delay: 0.2s; animation-name: fadeInRight;">
                        <div class="right-side">
                            <div class="first-image">
                                <img src="{{ asset('assets/frontend/images/about/01.jpg') }}" alt="img">
                            </div>
                            <div class="first-image">
                                <img src="{{ asset('assets/frontend/images/about/02.jpg') }}" alt="img">
                            </div>
                        </div>

                        <div class="right-side-2">
                            <div class="first-image">
                                <img src="{{ asset('assets/frontend/images/about/03.jpg') }}" alt="img">
                            </div>
                            <div class="first-image">
                                <img src="{{ asset('assets/frontend/images/about/04.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="two-left">
                        <div class="main-1 ">
                            <img src="{{ asset('assets/frontend/images/about/main-1.png') }}" alt="img">

                            <div class="main-2 ">
                                <img src="{{ asset('assets/frontend/images/about/main-2.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="tow-right">
                        <div class="right-head wow fadeInRight infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                            style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInRight;">
                            <h1>
                                Meet Our Customer Favorites

                            </h1>
                            <p>
                                Discover the gifts that have won the hearts of our customers. Explore our selection
                                of beloved items, tried and loved by those who value quality and thoughtfulness.
                            </p>

                        </div>
                        <div class="btn-area">
                            <a href="{{ url('/retail') }}" class="main-btn" title="Discover Favorites "> Discover
                                Favorites <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
