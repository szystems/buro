@extends('layouts.frontend')
{{-- Contact View --}}
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('bocacostacoffeeweb/images/varias/11.jpg')}});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ __('Contact') }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('Home') }}</a></span> <span>{{ __('Contact') }}</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container mt-5">
            <div class="row block-9">
                <div class="col-md-4 contact-info ftco-animate">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h2 class="h4">{{ __('Contact Information') }}</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>{{ __('Address') }}:</span><strong> Portland, Oregon, USA</strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>{{ __('Phone') }}:</span> <a href="tel://15037440078">+1 503 744 0078</a></p>
                        </div>
                        <!-- <div class="col-md-12 mb-3">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">	info@bocacostacoffee.com</a></p>
                        </div> -->
                        <!-- <div class="col-md-12 mb-3">
                            <p><span>Website:</span> <a href="#">www.bocacostacoffee.com</a></p>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ url('send-contact') }}" class="contact-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Name') }}" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('Subject') }}" name="subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="contact_message" cols="30" rows="7" class="form-control" placeholder="{{ __('Message') }}" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="{{ __('Send Message') }}" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
