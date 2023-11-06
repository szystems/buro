@extends('layouts.frontend')
{{-- Register --}}
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 sidebar ftco-animate">

                </div>

                <div class="col-xl-6 ftco-animate">
                    <form method="POST" action="{{ route('register') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading"> {{ __('Create an account') }}</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lastname">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lastname">{{  __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <input type="checkbox" onclick="showpassword(); showpasswordconfirm()"> {{ __('Show Password') }}
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">{{ __('Timezone') }}</label>
                                    <select class="form-control" name="timezone" id="timezone">
                                        <option selected value="UTC">UTC (UTC +00:00)</option>
                                        @foreach(Helpers::getTimeZoneList() as $timezone => $timezone_gmt_diff)
                                            <option value="{{ $timezone }}" {{ ( $timezone === old('timezone')) ? 'selected' : '' }}>
                                                {{ $timezone_gmt_diff }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <input type="hidden" name="timezone" id="timezone" value="UTC">
                            <div class="w-100"></div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                        <label class="custom-control-label" for="register-policy-2">{{ __('I agree to the') }} <a href="#">{{ __('privacy policy') }}</a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                    <p><button type="submit" class="btn btn-primary py-3 px-4 w-100">
                                            <font color="white"><strong>{{ __('Register') }}</strong></font>
                                        </button></p>
                                </div>
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already have an account? Log in') }}
                                </a>

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

<Script>
    function showpassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      function showpasswordconfirm() {
        var x = document.getElementById("password-confirm");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
</Script>
