@extends('layouts.frontend')
{{-- Contact View --}}
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('bocacostacoffeeweb/images/varias/4.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ __("FAQ's") }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('Home') }}</a></span>
                            <span>{{ __("FAQ's") }}</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container mt-5">
            <div class="row block-9">
                <div class="col-md-1"></div>
                <div class="col-md-12 ftco-animate">

                    <div class="heading-section ftco-animate">
                        <!-- <span class="subheading" align="center">Discover</span> -->
                        <h2 class="mb-4" align="center"><u>{{ __('Frequently asked questions') }}</u></h2>
                    </div>

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4>1. {{ __('Which coffee does Bocacosta use?') }}</h4>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('Bocacosta only use Arabica coffee') }}
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h4>2. {{ __('Where can I buy Bocacosta coffee?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('We only have an online store. We ship Worldwide.') }}
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h4>3. {{ __('Is selling coffee a profitable business?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('One of the best products to attract customers to your coffee shop or restaurant is coffee. That is why Bocacosta works together with the coffee shop owners to maintain quality and thus provide the customer with the best experience.On average, small coffee shop owners earn between $60,000 and $160,000.') }}
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <h4>4. {{ __('Is coffee good for health?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __("Hu said that moderate coffee intake—about 2–5 cups a day—is linked to a lower likelihood of type 2 diabetes, heart disease, liver and endometrial cancers, Parkinson's disease, and depression. -Harvard University") }}
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h4>5. {{ __('Where is the Bocacosta coffee from?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('Currently our coffee is from Guatemala') }}
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <h4>6. {{ __('Which country drinks the most coffee?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ __('United States') }} 26,650,000 {{ __('bags') }}</p>
                                    <p>{{ __('Brazil') }} 26,650,000 {{ __('bags') }}</p>
                                    <p>{{ __('Germany') }} 26,650,000 {{ __('bags') }}</p>
                                    <p>{{ __('Japan') }} 26,650,000 {{ __('bags') }}</p>
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h4>7. {{ __('Why Guatemalan coffee is one of the best coffees in the world?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('Nearly every area receives year-round rainfall and has mineral-rich soils from nearby volcanoes and lakes. With high altitudes, ranging humidity levels and moderate temperatures, Guatemala produces a wide variety of delicious, globally appreciated Arabica coffee. Guatemala is one of the most influential coffee growers and exporters in the world.') }}
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingEight">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h4>8. {{ __('How many cups does 5 lbs of coffee make?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ __('You can get around 120 (12oz) cups of coffee.') }}
                                </div>
                            </div>
                        </div>

                        {{-- <div div class="card">
                            <div class="card-header" id="headingNine">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h4>9. {{ __('How much profit per cup of coffee?') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                data-parent="#accordionExample">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>

                        <div div class="card">
                            <div class="card-header" id="headingTen">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTen" aria-expanded="false"
                                        aria-controls="collapseTen">
                                        <h4>10. {{ __('Take the quiz') }} {{ __('(find your perfect roast)') }}</h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    ...
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
