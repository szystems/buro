@extends('layouts.frontend')
{{-- Confirm --}}
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 sidebar ftco-animate">

                </div>

                <div class="col-xl-6 ftco-animate">
                    <form  method="POST" action="{{ route('password.confirm') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading"> {{ __('Forgot Your Password?') }}</h3>

                        <div class="row align-items-end">
                            {{ __('Please confirm your password before continuing.') }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <p><button type="submit" class="btn btn-primary py-3 px-4 w-100">
                                            <font color="white"><strong>{{ __('Confirm Password') }}</strong></font>
                                        </button></p>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            </div>


                        </div>
                    </form><!-- END -->
                </div> <!-- .col-md-6 -->




                <div class="col-xl-3 sidebar ftco-animate">

                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
