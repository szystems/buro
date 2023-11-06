@extends('layouts.frontend')
{{-- Wholesale View --}}
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('bocacostacoffeeweb/images/pics2/Bocacostas-Warehouse.jpg')}});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ __('Wholesale') }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">{{ __('Home') }}</a></span> <span>{{ __('Wholesale') }}</span>
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
                            <h2 class="h4">{{ __('Wholesale') }}</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p>{{ __('Are you looking for high-quality coffee for your business? Look no further than us! We take pride in offering top-notch coffee that is perfect for wholesale purchases. We work tirelessly to ensure that every batch of our coffee is of the highest quality, ensuring your customers are always satisfied. So choose us for your wholesale coffee needs and experience the difference in our unique blend.') }}
                            <br><span>{{ __('THERE IS NO OTHER LIKE OURS') }}</span></p>
                        </div>
                        <!-- <div class="col-md-12 mb-3">
                            <p><span>Address:</span> Portland Oregon, USA</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Phone:</span> <a href="tel://1234567920">+1(346) 971 2038</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Email:</span> <a href="mailto:info@bocacostacoffee.com">info@bocacostacoffee.com</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
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
                    <form action="{{ url('send-wholesale') }}" class="contact-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Your Full Name') }}" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Job Title') }}" name="job" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Your Email') }}" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Name of Business') }}" name="business" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Years in Business?') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="{{ __('Years') }}" name="years" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Number of Locations?') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control number" placeholder="{{ __('Locations') }}" name="locations" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('What is your level of experience working with coffee?') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class=" form-control custom-select" placeholder="{{ __('What is your level of experience working with coffee?') }}" name="level" required>
                                        <option selected>{{ __('Choose...') }}</option>
                                        <option value="Non experience">{{ __('Non experience') }}</option>
                                        <option value="Experienced">{{ __('Experienced') }}</option>
                                        <option value="A lot experienced">{{ __('A lot experienced') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Volume of pounds of coffee needed per week?') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control number" placeholder="{{ __('Volume of pounds') }}" name="volume" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('How did you hear about us?') }}</label>
                        </div>
                        <div class="form-group">
                            <textarea name="about" id="" cols="30" rows="7" class="form-control" placeholder="{{ __('Tell us how you heard about us...') }}" required></textarea>
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
