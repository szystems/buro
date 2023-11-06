@extends('layouts.frontend')
{{-- Trending products --}}
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <form action="{{ url('confirm-order') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="col-xl-12 ftco-animate">

                        <h3 class="mb-4 billing-heading">{{ __('Billing and Shipping Details') }}</h3>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger text-white" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row align-items-end">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">{{ __('First Name') }} *</label>
                                    @php
                                        $usuario = Auth::user()->name;
                                        $nombre = explode(' ', trim($usuario));
                                        $names = str_word_count($usuario);
                                    @endphp

                                    <input type="text" name="fname" class="form-control" id="fname"
                                        placeholder="Enter First Name" value="{{ ucwords($nombre[0]) }}">
                                    <span id="fname_error" class="text-danger"></span>
                                    @if ($errors->has('fname'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('fname') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">{{ __('Last Name') }} *</label>
                                    @if ($names > 1)
                                        <input type="text" name="lname" class="form-control" id="lname"
                                            placeholder="Enter Last Name" value="{{ ucwords($nombre[1]) }}">
                                    @else
                                        <input type="text" name="lname" class="form-control" id="lname"
                                            placeholder="Enter Last Name">
                                    @endif
                                    <span id="lname_error" class="text-danger"></span>
                                    @if ($errors->has('lname'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('lname') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">{{ __('Email Address') }} *</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Email" value="{{ Auth::user()->email }}">
                                    <span id="email_error" class="text-danger"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('email') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('Phone') }} *</label>
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        placeholder="Enter Phone Number" value="{{ Auth::user()->phone }}">
                                    <span id="phone_error" class="text-danger"></span>
                                    @if ($errors->has('phone'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('phone') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="w-100"></div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="country">{{ __('Country') }} *</label>
                                    <input readonly type="text" name="country" class="form-control" id="country" placeholder="Enter Country" value="Guatemala">
                                <span id="country_error" class="text-danger"></span>
                                @if ($errors->has('country'))
                                    <span class="help-block opacity-7">
                                        <strong>
                                            <font color="red">{{ $errors->first('country') }}</font>
                                        </strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="state">{{ __('State') }} *</label>
                                    <select class="form-control" name="state" id="state" onchange="cargarMunicipios()" required>
                                        <option selected value="{{ Auth::user()->state }}">{{ Auth::user()->state }}</option>

                                        <option value="">Selecciona un departamento</option>
                                        <option value="Alta Verapaz">Alta Verapaz</option>
                                        <option value="Baja Verapaz">Baja Verapaz</option>
                                        <option value="Chimaltenango">Chimaltenango</option>
                                        <option value="Chiquimula">Chiquimula</option>
                                        <option value="El Progreso">El Progreso</option>
                                        <option value="Escuintla">Escuintla</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Huehuetenango">Huehuetenango</option>
                                        <option value="Izabal">Izabal</option>
                                        <option value="Jalapa">Jalapa</option>
                                        <option value="Jutiapa">Jutiapa</option>
                                        <option value="Petén">Petén</option>
                                        <option value="Quetzaltenango">Quetzaltenango</option>
                                        <option value="Quiché">Quiché</option>
                                        <option value="Retalhuleu">Retalhuleu</option>
                                        <option value="Sacatepéquez">Sacatepéquez</option>
                                        <option value="San Marcos">San Marcos</option>
                                        <option value="Santa Rosa">Santa Rosa</option>
                                        <option value="Sololá">Sololá</option>
                                        <option value="Suchitepéquez">Suchitepéquez</option>
                                        <option value="Totonicapán">Totonicapán</option>
                                        <option value="Zacapa">Zacapa</option>
                                    </select>
                                    <span id="state_error" class="text-danger"></span>
                                    @if ($errors->has('state'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('state') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city">{{ __('City') }} *</label>
                                    <select name="city" type="text" class="form-control" id="city" required>
                                        <option selected value="{{ Auth::user()->city }}">{{ Auth::user()->city }}</option>

                                        <option value="">Selecciona un municipio</option>
                                    </select>
                                    <span id="city_error" class="text-danger"></span>
                                    @if ($errors->has('city'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('city') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="zipcode">{{ __('Zipcode') }} *</label>
                                    <input type="text" name="zipcode" class="form-control" id="zipcode"
                                        placeholder="Enter Postcode / Zipcode" value="{{ Auth::user()->zipcode }}">
                                    <span id="zipcode_error" class="text-danger"></span>
                                    @if ($errors->has('zipcode'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('zipcode') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address2">{{ __('Address') }} 1 *</label>
                                    <input type="text" name="address1" class="form-control" id="address1"
                                        placeholder="House number and Street name" value="{{ Auth::user()->address1 }}">
                                    <span id="address1_error" class="text-danger"></span>
                                    @if ($errors->has('address1'))
                                        <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('address1') }}</font>
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address2">{{ __('Address') }} 2</label>
                                    <input type="text" name="address2" class="form-control" id="address2"
                                placeholder="House number and Street name (optional)" value="{{ Auth::user()->address2 }}">
                                </div>
                            </div>

                            <div class="w-100"></div>

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="postcodezip">Order Notes (optional)</label>
                                    <textarea class="form-control" id="note" name="note" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div>
                            </div> --}}

                            {{-- <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Create an Account?
                                        </label>
                                        <label><input type="radio" name="optradio"> Ship to different address</label>
                                    </div>
                                </div>
                            </div> --}}
                        </div>




                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-4 d-flex">
                                <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('Cart Order') }}</h3>
                                    @php
                                        $total = 0;
                                    @endphp
                                    <p class="d-flex">
                                        <h5>
                                            <span>{{ __('Products') }}</span>
                                        </h5>
                                    </p>
                                    @foreach ($cartProducts as $item)
                                        @php
                                            if ($item->products->discount == '1') {
                                                $price = $item->products->selling_price;
                                            } else {
                                                $price = $item->products->original_price;
                                            }
                                        @endphp

                                        <p class="d-flex">
                                            <span><a href="{{ url('category/' . $item->products->category->slug . '/' . $item->products->slug) }}">{{ $item->products->name }}</a></span>
                                            @if ($item->products->discount == '1')
                                                <span>{{ $item->prod_qty }} x
                                                    {{ $config->currency_simbol }}{{ number_format($item->products->selling_price, 2, '.', ',') }}
                                                    <strike>{{ $config->currency_simbol }}{{ number_format($item->products->original_price, 2, '.', ',') }}</strike>
                                                </span>
                                            @else
                                                <span>{{ $item->prod_qty }} x
                                                    {{ $config->currency_simbol }}{{ number_format($item->products->original_price, 2, '.', ',') }}
                                                </span>
                                            @endif
                                        </p>
                                        @php
                                            $total += $price * $item->prod_qty;
                                            $tax_total = 0;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('Shipping') }}</h3>
                                    <p class="d-flex total-price">
                                        <span>Guatemala, Guatemala</span>
                                        <span>{{ __('Free') }}</span>
                                    </p>
                                    <p class="d-flex total-price">
                                        <span>Quetzaltenango, Quetzaltenango</span>
                                        <span>{{ __('Free') }}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>{{ __('Rest of the Country') }}</span>
                                        <span><b>{{ $config->currency_simbol }}{{ number_format($config->shipping, 2, '.', ',') }}</b></span>

                                    </p>
                                    <p class="d-flex">
                                        {{ $config->shipping_description }}
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('Cart Total') }}</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>{{ $config->currency_simbol }}{{ number_format($total, 2, '.', ',') }}</span>

                                    </p>

                                    <p class="d-flex">
                                        <span>{{ __('Shipping') }}</span>
                                        @if (((Auth::user()->city == "Guatemala") and (Auth::user()->state == "Guatemala")) or ((Auth::user()->city == "Quetzaltenango") and (Auth::user()->state == "Quetzaltenango")))
                                            <span>{{ __('Free') }}</span>
                                            <input type="hidden" name="shipping" value="0.00" id="shipping">
                                        @else
                                            <span>{{ $config->currency_simbol }}{{ number_format($config->shipping , 2, '.', ',') }}</span>
                                            <input type="hidden" name="shipping" value="{{ $config->shipping }}" id="shipping">
                                        @endif

                                    </p>
                                    <p class="d-flex">
                                        @if ($config->tax_status == 1)
                                            @php
                                                if (((Auth::user()->city == "Guatemala") and (Auth::user()->state == "Guatemala")) or ((Auth::user()->city == "Quetzaltenango") and (Auth::user()->state == "Quetzaltenango")))
                                                {
                                                    $shipping = 0;
                                                }else
                                                {
                                                    $shipping = $config->shipping;
                                                }

                                                $total = $total + $shipping;
                                                $tax = $config->tax;
                                                $tax = $tax/100;
                                                $tax_total = $tax * $total;
                                                $total = $total + $tax_total;

                                            @endphp
                                            <span>Tax</span>
                                            <span>{{ $config->currency_simbol }}{{ number_format($tax_total, 2, '.', ',') }}</span>
                                            <input type="hidden" name="tax" value="{{ $tax_total }}" id="tax">
                                        @else
                                            @php
                                                if (((Auth::user()->city == "Guatemala") and (Auth::user()->state == "Guatemala")) or ((Auth::user()->city == "Quetzaltenango") and (Auth::user()->state == "Quetzaltenango")))
                                                {
                                                    $shipping = 0;
                                                }else
                                                {
                                                    $shipping = $config->shipping;
                                                }
                                                $tax_total =  0;
                                                $total = $total + $shipping;
                                            @endphp
                                            <input type="hidden" name="tax" value="{{ $tax_total }}" id="tax">
                                        @endif
                                    </p>

                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>{{ $config->currency_simbol }}{{ number_format($total, 2, '.', ',') }}</span>
                                    </p>
                                    <p><button type="submit"class="btn btn-primary py-3 px-4 ">{{ __('Checkout') }}</button></p>
                                </div>
                            </div>

                            {{-- <div class="col-md-4">
                                <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('Payment Method') }}</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>

                                    <p><button type="submit"class="btn btn-primary py-3 px-4 ">{{ __('Direct Bank Transfer or Payment on Delivery') }}</button></p>
                                    <input type="hidden" name="payment_mode" value="POD or DBT">
                                </div>
                            </div> --}}
                        </div>
                    </div> <!-- .col-md-12 -->

                </form>
            </div>
        </div>
    </section> <!-- .section -->
@endsection

@section('scripts')
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AZcA7N1HfyovVsRKIMRhHPKInRReBAI2qEyto2N8CLRXO-kCcjhpZwYuWpMJ59TRZxxGmwA5uh1Pvfc-&currency=USD">
    </script>
    {{-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> --}}
    {{-- <script>
        paypal.Buttons({
            onClick() {

                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address1 = $('#address1').val();
                var address2 = $('#address2').val();
                var city = $('#city').val();
                var state = $('#state').val();
                var country = $('#country').val();
                var zipcode = $('#zipcode').val();
                var note = $('#note').val();

                if (fname.length == 0) {
                    fname_error = "First Name is required";
                    $('#fname_error').html('');
                    $('#fname_error').html('<font color="red"><strong>' + fname_error + '</strong></font>');
                } else {
                    fname_error = "";
                    $('#fname_error').html('');
                }

                if (lname.length == 0) {
                    lname_error = "Last Name is required";
                    $('#lname_error').html('');
                    $('#lname_error').html('<font color="red"><strong>' + lname_error + '</strong></font>');
                } else {
                    lname_error = "";
                    $('#lname_error').html('');
                }
                if (email.length == 0) {
                    email_error = "Email is required";
                    $('#email_error').html('');
                    $('#email_error').html('<font color="red"><strong>' + email_error + '</strong></font>');
                } else {
                    email_error = "";
                    $('#email_error').html('');
                }

                if (phone.length == 0) {
                    phone_error = "Phone is required";
                    $('#phone_error').html('');
                    $('#phone_error').html('<font color="red"><strong>' + phone_error + '</strong></font>');
                } else {
                    phone_error = "";
                    $('#phone_error').html('');
                }

                if (address1.length == 0) {
                    address1_error = "Address 1 is required";
                    $('#address1_error').html('');
                    $('#address1_error').html('<font color="red"><strong>' + address1_error + '</strong></font>');
                } else {
                    address1_error = "";
                    $('#address1_error').html('');
                }

                if (city.length == 0) {
                    city_error = "City is required";
                    $('#city_error').html('');
                    $('#city_error').html('<font color="red"><strong>' + city_error + '</strong></font>');
                } else {
                    city_error = "";
                    $('#city_error').html('');
                }

                if (state.length == 0) {
                    state_error = "State is required";
                    $('#state_error').html('');
                    $('#state_error').html('<font color="red"><strong>' + state_error + '</strong></font>');
                } else {
                    state_error = "";
                    $('#state_error').html('');
                }

                if (country.length == 0) {
                    country_error = "Country is required";
                    $('#country_error').html('');
                    $('#country_error').html('<font color="red"><strong>' + country_error + '</strong></font>');
                } else {
                    country_error = "";
                    $('#country_error').html('');
                }

                if (zipcode.length == 0) {
                    zipcode_error = "Zipcode is required";
                    $('#zipcode_error').html('');
                    $('#zipcode_error').html('<font color="red"><strong>' + zipcode_error + '</strong></font>');
                } else {
                    zipcode_error = "";
                    $('#zipcode_error').html('');
                }

                if (fname.length == 0 || lname.length == 0 || email.length == 0 || phone.length == 0 || address1
                    .length == 0 || city.length == 0 || state.length == 0 || country.length == 0 || zipcode
                    .length == 0) {
                    return false;
                }


            },
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}' // Can also reference a variable or function
                        }
                    }]
                });

            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    //begin data for app
                    var fname = $('#fname').val();
                    var lname = $('#lname').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var address1 = $('#address1').val();
                    var address2 = $('#address2').val();
                    var city = $('#city').val();
                    var state = $('#state').val();
                    var country = $('#country').val();
                    var zipcode = $('#zipcode').val();
                    var note = $('#note').val();
                    var tax = $('#tax').val();
                    var shipping = $('#shipping').val();

                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'fname' :fname,
                            'lname' :lname,
                            'email' :email,
                            'phone' :phone,
                            'address1' :address1,
                            'address2' :address2,
                            'city' :city,
                            'state' :state,
                            'country' :country,
                            'zipcode' :zipcode,
                            'note' :note,
                            'payment_mode' :"Paid by PayPal",
                            'tax' : tax,
                            'shipping' : shipping,
                            'payment_id' : transaction.id,
                        },
                        success: function (response) {
                            alert("Order placed Sussesfully");


                            window.location.href = "/my-orders";
                        }
                    });

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script> --}}

    <script>
        const municipiosPorDepartamento = {
        "Alta Verapaz": ["Cobán", "Chisec", "San Cristóbal Verapaz", "Santa Cruz Verapaz", "Tactic", "Tamahú", "San Juan Chamelco", "Panzós", "Senahú", "Cahabón", "Chahal", "Fray Bartolomé de las Casas", "Santa María Cahabón", "La Tinta", "Raxruhá"],
        "Baja Verapaz": ["Salamá", "San Miguel Chicaj", "Rabinal", "Cubulco", "Granados", "San Jerónimo", "Purulhá"],
        "Chimaltenango": ["Chimaltenango", "San José Poaquil", "San Martín Jilotepeque", "Comalapa", "Santa Apolonia", "Tecpán Guatemala", "Patzún", "Pochuta", "Patzicía", "Santa Cruz Balanyá", "Acatenango", "Yepocapa", "San Andrés Itzapa", "Parramos", "Zaragoza", "El Tejar"],
        "Chiquimula": ["Chiquimula", "San José La Arada", "San Juan Ermita", "Jocotán", "Camotán", "Olopa", "Esquipulas", "Concepción Las Minas", "Quetzaltepeque"],
        "El Progreso": ["Guastatoya", "Morazán", "San Agustín Acasaguastlán", "San Antonio La Paz", "San Cristóbal Acasaguastlán", "Sanarate", "Sansare", "Santa María Ixhuatán"],
        "Escuintla": ["Escuintla", "Santa Lucía Cotzumalguapa", "La Democracia", "Siquinalá", "Masagua", "Tiquisate", "La Gomera", "Guazacapán", "San José", "Iztapa", "Palín", "San Vicente Pacaya", "Nueva Concepción"],
        "Guatemala": ["Guatemala", "Santa Catarina Pinula", "San José Pinula", "San José del Golfo", "Palencia", "Chinautla", "San Pedro Ayampuc", "Mixco", "San Pedro Sacatepéquez", "San Juan Sacatepéquez", "San Raymundo", "Chuarrancho", "Fraijanes", "Amatitlán", "Villa Nueva", "Villa Canales", "San Miguel Petapa"],
        "Huehuetenango": ["Huehuetenango", "Chiantla", "Malacatancito", "Cuilco", "Nentón", "San Pedro Necta", "Jacaltenango", "San Pedro Soloma", "San Ildelfonso Ixtahuacán", "Santa Bárbara", "La Libertad", "La Democracia", "San Miguel Acatán", "San Rafael La Independencia", "Todos Santos Cuchumatán", "San Juan Atitán", "Santa Eulalia", "San Mateo Ixtatán", "Colotenango", "San Sebastián Huehuetenango", "Tectitán", "Concepción Huista", "San Juan Ixcoy", "San Antonio Huista", "San Sebastián Coatán", "Santa Cruz Barillas", "Aguacatán", "San Rafael Petzal", "San Gaspar Ixchil", "Santiago Chimaltenango", "Santa Ana Huista"],
        "Izabal": ["Puerto Barrios", "Livingston", "El Estor", "Morales", "Los Amates"],
        "Jalapa": ["Jalapa", "San Pedro Pinula", "San Luis Jilotepeque", "San Manuel Chaparrón", "San Carlos Alzatate", "Monjas", "Mataquescuintla"],
        "Jutiapa": ["Jutiapa", "El Progreso", "Santa Catarina Mita", "Agua Blanca", "Asunción Mita", "Yupiltepeque", "Atescatempa", "Jerez", "El Adelanto", "Zapotitlán", "Comapa", "Jalpatagua", "Conguaco", "Moyuta", "Pasaco", "San José Acatempa", "Quesada"],
        "Petén": ["Flores", "San José", "San Benito", "San Andrés", "La Libertad", "San Francisco", "Santa Ana", "Dolores", "San Luis", "Sayaxché", "Melchor de Mencos", "Poptún", "Las Cruces", "La Blanca", "El Chal"],
        "Quetzaltenango": ["Quetzaltenango", "Salcajá", "Olintepeque", "San Carlos Sija", "Sibilia", "Cabricán", "Cajolá", "San Miguel Siguilá", "Ostuncalco", "San Mateo", "Concepción Chiquirichapa", "San Martín Sacatepéquez", "Almolonga", "Cantel", "Huitán", "Zunil", "Colomba", "San Francisco La Unión", "El Palmar", "Coatepeque", "Génova", "Flores Costa Cuca", "La Esperanza"],
        "Quiché": ["Santa Cruz del Quiché", "Chiché", "Chinique", "Zacualpa", "Chajul", "Chichicastenango", "Patzité", "San Antonio Ilotenango", "San Pedro Jocopilas", "Cunén", "San Juan Cotzal", "Joyabaj", "Nebaj", "San Andrés Sajcabajá", "Uspantán", "Sacapulas", "San Bartolomé Jocotenango", "Canillá"],
        "Retalhuleu": ["Retalhuleu", "San Sebastián", "Santa Cruz Mulúa", "San Martín Zapotitlán", "San Felipe", "San Andrés Villa Seca", "Champerico", "Nuevo San Carlos", "El Asintal"],
        "Sacatepéquez": ["Antigua Guatemala", "Jocotenango", "Pastores", "Sumpango", "Santo Domingo Xenacoj", "Santiago Sacatepéquez", "San Bartolomé Milpas Altas", "San Lucas Sacatepéquez", "Santa Lucía Milpas Altas", "Magdalena Milpas Altas", "Santa María de Jesús", "Ciudad Vieja", "San Miguel Dueñas", "San Juan Alotenango", "San Antonio Aguas Calientes"],
        "San Marcos": ["San Marcos", "San Pedro Sacatepéquez", "San Antonio Sacatepéquez", "Comitancillo", "San Miguel Ixtahuacán", "Concepción Tutuapa", "Tacaná", "Sibinal", "Tajumulco", "Tejutla", "San Rafael Pie de la Cuesta", "Nuevo Progreso", "El Tumbador", "San José El Rodeo", "Malacatán", "Catarina", "Ayutla", "Ocós", "San Pablo", "El Quetzal", "La Reforma", "Pajapita", "Ixchiguan", "San José Ojetenam"],
        "Santa Rosa": ["Cuilapa", "Barberena", "Santa Rosa de Lima", "Casillas", "San Rafael Las Flores", "Oratorio", "San Juan Tecuaco", "Chiquimulilla", "Taxisco", "Santa María Ixhuatán", "Guazacapán", "Santa Cruz Naranjo", "Pueblo Nuevo Viñas", "Nueva Santa Rosa"],
        "Sololá": ["Sololá", "San José Chacayá", "Santa María Visitación", "Santa Lucía Utatlán", "Nahualá", "Santa Catarina Ixtahuacán", "Santa Clara La Laguna", "Concepción", "San Andrés Semetabaj", "Panajachel", "Santa Catarina Palopó", "San Antonio Palopó", "San Lucas Tolimán", "Santa Cruz La Laguna", "San Pablo La Laguna", "San Marcos La Laguna", "San Juan La Laguna", "San Pedro La Laguna"],
        "Suchitepéquez": ["Mazatenango", "Cuyotenango", "San Francisco Zapotitlán", "San Bernardino", "San José El Idolo", "Santo Domingo Suchitepéquez", "San Lorenzo", "Samayac", "San Pablo Jocopilas", "San Antonio Suchitepéquez", "San Miguel Panán", "San Gabriel", "Chicacao", "Patulul", "Santa Bárbara", "San Juan Bautista", "Santo Tomás La Unión", "Zunilito", "Pueblo Nuevo"],
        "Totonicapán": ["Totonicapán", "San Cristóbal Totonicapán", "San Francisco El Alto", "Santa María Chiquimula", "San Bartolo", "Santa Lucía La Reforma", "San Andrés Xecul", "Momostenango"],
        "Zacapa": ["Zacapa", "Estanzuela", "Río Hondo", "Gualán", "Teculután", "Usumatlán", "Cabañas", "San Diego", "La Unión", "Huite"],
        };

        function cargarMunicipios() {
        const departamentoSelect = document.getElementById("state");
        const municipioSelect = document.getElementById("city");
        const departamento = departamentoSelect.value;

        municipioSelect.innerHTML = "<option value=''>Selecciona un municipio</option>";

        if (departamento && municipiosPorDepartamento.hasOwnProperty(departamento)) {
            const municipios = municipiosPorDepartamento[departamento];
            municipios.forEach(function(municipio) {
            const option = document.createElement("option");
            option.value = municipio;
            option.text = municipio;
            municipioSelect.appendChild(option);
            });
        }
        }
    </script>
@endsection
