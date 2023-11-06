@extends('layouts.frontend')
{{-- Sign in --}}
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 sidebar ftco-animate">

                </div>

                <div class="col-xl-6 ftco-animate">
                    <form method="POST" action="{{ route('login') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading"> {{ __('Login') }}</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">{{ __('Email Address') }}</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="checkbox" onclick="showpassword()">{{ __('Show Password') }}
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="form-group">
                                    <p><button type="submit" class="btn btn-primary py-3 px-4 w-100"><font color="white"><strong>{{ __('Login') }}</strong></font></button></p>
                                </div>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Create your account') }}
                                </a>
                                <br>
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

<Script>
    function showpassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
</Script>
