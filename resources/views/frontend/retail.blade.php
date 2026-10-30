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
                        Bulk Orders
                    </h1>
                    <ul>
                        <li>
                            <a href="index.php" title=" Home">Home</a>
                        </li>

                        <li>
                            |
                        </li>

                        <li class="circle">
                            Bulk Orders
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="order-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-head">

                    <h5>
                        Looking for
                        <span class="color"> Bulk Orders</span>? Get in Touch Today!
                        <p class="left-side">
                            Corporate Gifts | <span class="color">Bulk Orders</span>
                        </p>

                    </h5>
                    <p>
                        Elevate your business with our pro bulk solutions. Fill out the form below, and
                        <br>we'll reach out to discuss your needs.
                    </p>
                </div>
            </div>
        </div>
        <div class="row bulk-order-row">
            <div class="col-lg-6 col-md-6 col-12">

                <div class="form-box wow fadeInRight infinite" data-wow-duration="1s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInRight">
                    <form class="row g-3 support-form" id="contactForm-2" name="contactForm-2" method="post">

                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" id="h_name" name="h_name" placeholder="Enter Name">
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="email" class="form-control" id="h_email" name="h_email"
                                placeholder="Enter Email">
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" id="h_subject" name="h_subject"
                                placeholder="Enter Subject">
                        </div>

                        <div class="col-lg-6 col-md-6 col-12z">
                            <input type="number" class="form-control" id="h_quantity" name="h_quantity"
                                placeholder="Qty (Minimum 200 nos)">
                        </div>


                        <div class="col-md-12">
                            <input type="tel" class="form-control" id="h_phone" name="h_phone"
                                placeholder="Enter Mobile Number">
                        </div>

                        <div class="col-12">
                            <textarea name="form_message" class="form-control" id="h_message" name="h_message" rows="7"
                                placeholder="Enter Message"></textarea>
                        </div>

                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <div class="captcha">
                                <div class="g-recaptcha" data-sitekey="6Lf782ApAAAAAAnhW1V1mgr22QH67n-F3ZOQ7PqU">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="btn-area">
                                <button class="main-btn" type="submit" value="h_submit" id="h_submit-2"
                                    title="Send Message">
                                    Send Message </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="bulk-order-image wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <img src="{{ asset('assets/frontend/images/bulk/girl.png') }}" alt="img">

                </div>
            </div>
        </div>
    </div>
</section>

<div class="why-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="why-head  wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <h5>Why Choose <span class="color-main">Smile

                            <img src="{{ asset('assets/frontend/images/icon.png') }}" alt="img">
                        </span>

                    </h5>

                </div>
            </div>
        </div>
        <div class="row why-row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Handpicked.png') }}" alt="img">
                    </div>

                    <div class="why-content">
                        <p>
                            Handpicked Selection

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInUp infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Personalization.png') }}" alt="img">
                    </div>
                    <div class="why-content">
                        <p>
                            Personalization
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInUp infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/eco.png') }}" alt="img">
                    </div>
                    <div class="why-content">
                        <p>
                            Eco-Friendly Packaging

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Occasion.png') }}" alt="img">
                    </div>
                    <div class="why-content">
                        <p>
                            Gifts for Every Occasion

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInUp infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Quality.png') }}" alt="img">
                    </div>

                    <div class="why-content">
                        <p>
                            Quality Assurance

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Secure.png') }}" alt="img">
                    </div>

                    <div class="why-content">
                        <p>
                            Secure Gifting
                        </p>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Quick.png') }}" alt="img">
                    </div>

                    <div class="why-content">
                        <p>
                            Quick Delivery

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <div class="why-topic  wow fadeInDown infinite" data-wow-duration="4s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 4s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="why-image">
                        <img src="{{ asset('assets/frontend/images/bulk/Budgets.png') }}" alt="img">
                    </div>

                    <div class="why-content">
                        <p>
                            Gifts for All Budgets
                        </p>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<div class="contact-galler-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="gal-head  wow fadeInDown infinite" data-wow-duration="1s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <h1>
                        Explore Our
                    </h1>
                    <p>
                        Top-Selling Gifts
                        <img src="{{ asset('assets/frontend/images/icon.png') }}" alt="img">

                    </p>

                </div>
            </div>
        </div>
        <div class="row gallery-row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="gallery-total wow fadeInLeft infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInLeft">
                    <div class="gallery-image">
                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/5.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/5.png') }}" alt="img">
                            </div>
                        </a>
                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/2.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/2.png') }}" alt="img">
                            </div>
                        </a>
                    </div>


                    <div class="gallery-image-2">
                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/3.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/3.png') }}" alt="img">
                            </div>
                        </a>

                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/4.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/4.png') }}" alt="img">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                    href="{{ asset('assets/frontend/images/bulk/1.png') }}">
                    <div class="image-1 wow fadeInDown infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInDown">
                        <img src="{{ asset('assets/frontend/images/bulk/1.png') }}" alt="img">
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="gallery-total wow fadeInRight infinite" data-wow-duration="2s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight">
                    <div class="gallery-image">
                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/6.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/6.png') }}" alt="img">
                            </div>
                        </a>
                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/7.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/7.png') }}" alt="img">
                            </div>
                        </a>
                    </div>
                    <div class="gallery-image-2">
                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/8.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/8.png') }}" alt="img">
                            </div>
                        </a>

                        <a class="ttm_prettyphoto ttm_image zoom-img" data-fancybox="gallery-images"
                            href="{{ asset('assets/frontend/images/bulk/9.png') }}">
                            <div class="image-1">
                                <img src="{{ asset('assets/frontend/images/bulk/9.png') }}" alt="img">
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<section class="float-section-2">
    <div class="container">
        <!-- <div class="row">
                    <div class="float-head">
                        <h5>
                            Dummy Content <span class="color">here</span>
                        </h5>
                    </div>
                </div> -->
        <div class="row float-row">
            <div class="col-lg-12">
                <div class="float-image">
                    <img src="{{ asset('assets/frontend/images/bulk/banner-3.png') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
