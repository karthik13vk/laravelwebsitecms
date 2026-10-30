@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')
    <section class="about-banner">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-head">
                        <h1>
                            Contact Us
                        </h1>
                        <ul>
                            <li>
                                <a href="index.php" title=" Home">Home</a>
                            </li>

                            <li>
                                |
                            </li>

                            <li class="circle">
                                Contact Us
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="contact-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact-left wow fadeInLeft infinite" data-wow-duration="1s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInLeft">
                        <div class="contact-head">
                            <h5>We’re Here. <span class="color"> Connect Now!</span></h5>
                            <p>
                                We love to hear from you! Feel free to reach out
                            </p>
                        </div>
                        <div class="contact-box">
                            <h5>
                                Phone
                            </h5>
                            <div class="flex-div">
                                <div class="icon-div">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="parah-div">
                                    <p>
                                        <a href="Tel:+919087233555" title="Call Now"> +91 9087233555</a>
                                        |
                                        <a href="Tel:+919087433555" title="Call Now"> +91 9087433555 </a>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-box">
                            <h5>
                                Email
                            </h5>
                            <div class="flex-div">
                                <div class="icon-div">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="parah-div">
                                    <p>
                                        <a href="mailto:smile3denterprises@gmail.com" title="Mail us">
                                            smile3denterprises@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-box">
                            <h5>
                                Address
                            </h5>
                            <div class="flex-div">
                                <div class="icon-div">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="parah-div">
                                    <p>
                                        First Floor, SF No.61/ 5A-B, PVS Complex, Aruna Nagar, <br>
                                        Kurudampalayam Panchayat, K.Vadamadurai,<br>
                                        Coimbatore, Tamil Nadu 641017
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-area wow fadeInRight infinite" data-wow-duration="1s" data-wow-delay="0.2s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInRight">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                                {{ session('success') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- <form action="{{ route('contact.submit') }}" method="POST" class="row g-3 support-form"
                            id="contactForm" name="contactForm">
                            @csrf

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="h_name" name="h_name"
                                    placeholder="Enter Name" value="{{ old('h_name') }}" required>
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" id="h_email" name="h_email"
                                    placeholder="Enter Email" value="{{ old('h_email') }}" required>
                            </div>

                            <div class="col-md-6">
                                <input type="tel" class="form-control" id="h_phone" name="h_phone"
                                    placeholder="Enter Mobile Number" value="{{ old('h_phone') }}" required>
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="h_subject" name="h_subject"
                                    placeholder="Enter Subject" value="{{ old('h_subject') }}" required>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" id="h_message" name="h_message" rows="7" placeholder="Enter Message" required>{{ old('h_message') }}</textarea>
                            </div>


                            <div class="col-12">
                                <div class="btn-area">
                                    <button class="main-btn" type="submit" id="h_submit" title="Send Message">
                                        Send Message
                                    </button>
                                </div>
                            </div>

                        </form> --}}
                        <form action="{{ route('contact.submit') }}" method="POST" class="row g-3 support-form">
                            @csrf
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="h_name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="email" name="h_email" placeholder="Your email" required>
                            </div>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" name="h_phone" placeholder="Mobile" required>
                            </div>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" name="h_subject" placeholder="Subject" required>
                            </div>
                            <div class="col-md-6">
                                 <textarea class="form-control" name="h_message" placeholder="Your message" required></textarea>
                            </div>

 <div class="col-12">
  <button  class="main-btn"  type="submit">Send Message</button>
 </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="map-area">
        <div class="container-fluid">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3915.3986910575304!2d76.92925807377935!3d11.083634453454637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8f7cf3adb2dcd%3A0xa05d29f71d9a3f2d!2sSmile%203D%20Enterprises!5e0!3m2!1sen!2sin!4v1704541912155!5m2!1sen!2sin"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>



@endsection
