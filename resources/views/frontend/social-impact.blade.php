@extends('layouts.frontend')
{{-- Social Impact View --}}
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('bocacostacoffeeweb/images/varias/4.jpg')}});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ __('Social Impact') }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html"{{ __('Home') }}n>{{__('Social Impact')}}</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate text-center">
                    <h2 class="mb-3">{{ __('World') }}</h2>
                    <p>{{ __('At Bocacosta, we are committed to taking care of the planet. Our traditional processes are designed to minimize any potential environmental contamination, and we firmly believe that every small step we take can make a positive impact. For example, we use recyclable materials to package our products as part of our ongoing efforts. However, our dedication to the well-being of our customers extends beyond just the environment, and we strive to provide healthy options at Bocacosta.') }}</p>
                    <p>
                        <img src="{{ asset('bocacostacoffeeweb/images/varias/10.jpg')}}" alt="" class="img-fluid">
                    </p>
                    <h2 class="mb-3">{{ __('Social Impact') }}</h2>
                    <p>{{ __("Our commitment goes beyond just maintaining the best coffee flavors and quality. We understand that our actions can have a social impact, and we strive to make a positive difference in the communities where our coffee is grown. That's why we work closely with our partners in the field to support the development of coffee farming and ensure that workers have access to the best comforts and social resources possible. At Bocacosta, a healthy work environment is essential for producing the best coffee, and we are committed to making a positive social impact through our business practices.") }}</p>
                    <p>
                        <img src="{{ asset('bocacostacoffeeweb/images/varias/21.jpg')}}" alt="" class="img-fluid">
                    </p>
                </div> <!-- .col-md-8 -->

            </div>
        </div>
    </section> <!-- .section -->

@endsection
