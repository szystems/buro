@extends('layouts.frontend')
{{-- Contact View --}}
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('bocacostacoffeeweb/images/varias/4.jpg')}});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ __("FAQ's") }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('Home') }}</a></span> <span>{{ __("FAQ's") }}</span>
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
                            <h2 class="h4">{{ __('Frequently asked questions') }}</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>1. </span><strong><a href="#1">{{ __('Which coffee does Bocacosta use?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>2. </span><strong><a href="#2">{{ __('Is coffee good for health?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>3. </span><strong><a href="#3">{{ __('Which country drinks the most coffee?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>4. </span><strong><a href="#4">{{ __('Where is the Bocacosta coffee from?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>5. </span><strong><a href="#5">{{ __('Why Guatemalan coffee is one of the best coffees in the world?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>6. </span><strong><a href="#6">{{ __('Where can I buy Bocacosta coffee?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>7. </span><strong><a href="#7">{{ __('Is selling coffee a profitable business?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>8. </span><strong><a href="#8">{{ __('How many cups does 5 lbs of coffee make?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>9. </span><strong><a href="#9">{{ __('How much profit per cup of coffee?') }}</a></strong></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>10. </span><strong><a href="{{ url('category') }}">{{ __('Take the quiz') }} {{ __('(find your perfect roast)') }}</a></strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">

                    <H4 id="1" for="">1. {{ __('Which coffee does Bocacosta use?') }}</H4>
                    <p>{{ __('Bocacosta only use Arabica coffee') }}</p>

                    <H4 id="2" for="">2. {{ __('Is coffee good for health?') }}</H4>
                    <p>{{ __("Hu said that moderate coffee intake—about 2–5 cups a day—is linked to a lower likelihood of type 2 diabetes, heart disease, liver and endometrial cancers, Parkinson's disease, and depression. -Harvard University") }}</p>

                    <H4 id="3" for="">3. {{ __('Which country drinks the most coffee?') }}</H4>
                    <p>{{ __('United States') }} 26,650,000 {{ __('bags') }}</p>
                    <p>{{ __('Brazil') }} 26,650,000 {{ __('bags') }}</p>
                    <p>{{ __('Germany') }} 26,650,000 {{ __('bags') }}</p>
                    <p>{{ __('Japan') }} 26,650,000 {{ __('bags') }}</p>

                    <H4 id="4" for="">4. {{ __('Where is the Bocacosta coffee from?') }}</H4>
                    <p>{{ __('Currently our coffee is from Guatemala') }}</p>

                    <H4 id="5" for="">5. {{ __('Why Guatemalan coffee is one of the best coffees in the world?') }}</H4>
                    <p>{{ __('Nearly every area receives year-round rainfall and has mineral-rich soils from nearby volcanoes and lakes. With high altitudes, ranging humidity levels and moderate temperatures, Guatemala produces a wide variety of delicious, globally appreciated Arabica coffee. Guatemala is one of the most influential coffee growers and exporters in the world.') }}</p>

                    <H4 id="6" for="">6. {{ __('Where can I buy Bocacosta coffee?') }}</H4>
                    <p>{{ __('We only have an online store. We ship Worldwide.') }}</p>

                    <H4 id="7" for="">7.{{ __('Is selling coffee a profitable business?') }}</H4>
                    <p>{{ __('One of the best products to attract customers to your coffee shop or restaurant is coffee. That is why Bocacosta works together with the coffee shop owners to maintain quality and thus provide the customer with the best experience.On average, small coffee shop owners earn between $60,000 and $160,000.') }}</p>

                    <H4 id="8" for="">8. {{ __('How many cups does 5 lbs of coffee make?') }}</H4>
                    <p>{{ __('¿Cuántas tazas hace 5 libras de café?') }}</p>

                    <H4 id="9" for="">9. {{ __('How much profit per cup of coffee?') }}</H4>
                    <div class="cart-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><h4>{{ __('Coffee cost') }}</h4></th>
                                    <th><h4>{{ __('$0.30 – $0.40') }}</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"><p>{{ __('Labour') }}</p></td>
                                    <td><p>{{ __('$0.20') }}</p></td>
                                </tr>
                                <tr>
                                    <td scope="row"><p>{{ __('Average Price of a Coffee') }}</p></td>
                                    <td><p>{{ __('$0.80 – $1.00') }}</p></td>
                                </tr>
                                <tr>
                                    <td scope="row"><p>{{ __('Net Profit') }}</p></td>
                                    <td><p>{{ __('$3.50 – $4.50') }}</p></td>
                                </tr>
                                <tr>
                                    <td scope="row"><p>{{ __('') }} ({{ __('per cup') }})</p></td>
                                    <td><p>{{ __('300% – 400%') }}</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <H4><a href="{{ url('category') }}">10. {{ __('Take the quiz') }} {{ __('(find your perfect roast)') }}</a></H4>
                </div>
            </div>
        </div>
    </section>

@endsection
