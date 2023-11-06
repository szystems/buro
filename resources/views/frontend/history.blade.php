@extends('layouts.frontend')
{{-- History View --}}
@section('content')

    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('bocacostacoffeeweb/images/pics/2.jpg')}});"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <!-- <span class="subheading">Discover</span> -->
                    <h2 class="mb-4">{{ __("Our Story") }}</h2>
                </div>
                <!-- <div>
                    <p>In 2019, when our founder arrived at a coffee shop in Portland, he ordered a cup of coffee and
                        when he tasted it, he could see that the coffee was not of good quality. He knows that he was left
                        with the doubt because there was not a good quality. Our founder, seeing that there was no such
                        good quality coffee in the coffee market, began with the idea of offering high-quality coffee. Our
                        name is inspired by a region that after the high temperatures, the rain comes to refresh. We take
                        care of choosing the best coffee in the country and or the region.
                    </p>
                    <span class="subheading">Place and date of foundation:</span>
                    <p>
                        Portland, Oregon, 2019.
                        The founders have more than 30 years of experience in coffee. We are working so that each cup of
                        Bocacosta coffee is a unique experience and you can enjoy a coffee with the highest quality
                        standards.
                    </p> -->
                    <p>{{ __("Our founder's discovery and passion for high-quality coffee began our brand's origin story in a quaint Portland coffee shop. After tasting a lackluster cup of coffee, it became clear to him that the market needed better options. Our brand name, Bocacosta, is derived from a region known for experiencing rejuvenating rainfall after enduring high temperatures. With over 30 years of experience in the coffee industry, we strive to provide a unique and satisfying experience with every cup of our coffee. Our unwavering commitment to the highest quality standards ensures that every sip of Bocacosta coffee is consistently delightful.") }}</p>
                    <p>{{ __("Bocacosta Coffee stands out as a premium coffee brand thanks to the expertise of our professionals with years of experience. Our competition coffee is unparalleled and cannot be found anywhere else. With Bocacosta, there is simply no comparison.") }}</p>
                    <p>{{ __("Each sip of our coffee reveals special notes unique to our collection. We take great care to guarantee the flavor and quality that our customers have come to expect from us. Choose Bocacosta Coffee for an unparalleled coffee experience that you won't find anywhere else.") }}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
