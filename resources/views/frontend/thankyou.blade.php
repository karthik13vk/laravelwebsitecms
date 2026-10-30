@extends('frontend.layouts.app')

@section('title', 'Thank You')

@section('content')
    <section class="thankyou_pages">
        <div class="container">
            <div class="thankyou_content">
                <img src="{{ asset('assets/frontend/images/thankyou/thankyou.png') }}" alt="img">
                <h1>Thank You</h1>
                <p>Thank you for taking the time to send us a message, a member of our team will contact you shortly, if you
                    want to have a informal chat with one of our team do not hesitate to call us.</p>
                <h4><img src="{{ asset('assets/frontend/images/logo/logo.png') }}" alt="Thank You" class="thank_you lazyload"></h4>
                <a href="{{ url('/') }}" title=" Home">
                    <button></i> Home</button>
                </a>
            </div>
        </div>
    </section>

@endsection
