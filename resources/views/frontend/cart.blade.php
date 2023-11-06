@extends('layouts.frontend')
{{-- Cart --}}
@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <h2 class="mb-4">{{ __('My Cart') }}</h2>
                    <div class="cart-list">
                        <table class="table">
                            @php
                                $total = 0;
                            @endphp
                            @if ($cartitems->count() > 0)
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartitems as $prod)
                                        @php
                                            if ($prod->discount == "1") {
                                                $price = $prod->selling_price;
                                            }else {
                                                $price = $prod->original_price;
                                            }
                                        @endphp
                                        <tr class="text-center product_data">
                                            <td class="product-remove delete-cart-item"><a><span class="icon-close"></span></a></td>

                                            <td class="image-prod">
                                                <a href="{{ url('category/'.$prod->CatSlug.'/'.$prod->ProdSlug) }}">
                                                    <div class="img" style="background-image:url({{ asset('assets/uploads/product/'.$prod->image) }});"></div>
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <h3><a href="{{ url('category/'.$prod->CatSlug.'/'.$prod->ProdSlug) }}">{{ $prod->Product }}</a></h3>
                                                <p>{{ $prod->small_description }}</p>
                                            </td>

                                            @if ($prod->discount == "1")
                                                    <td class="price">{{ $config->currency_simbol }}{{ number_format($prod->selling_price,2, '.', ',') }} <br> <strike><font color="c70017">{{ $config->currency_simbol }}{{ number_format($prod->original_price,2, '.', ',') }}</font></strike></td>
                                            @else
                                                <td class="price">{{ $config->currency_simbol }}{{ number_format($prod->original_price,2, '.', ',') }}</td>
                                            @endif

                                            <td class="quantity-col">
                                                <div class="input-group text-center" style="wdth:50px;">
                                                    <input type="hidden" class="prod_id" value="{{ $prod->ProdID }}">
                                                    @if ( $prod->prod_qty >= $prod->qty)
                                                        @if ($prod->qty == 0)
                                                            <h6><font color="red"><strong>Out of Stock</strong></font></h6>
                                                        @elseif ($prod->qty >= $prod->prod_qty)
                                                            <button class="input-group-text changeQuantitymenos">-</button>
                                                            <input readonly type="text" name="quantity" class="quantity form-control input-number qty-input text-center" value="{{ $prod->prod_qty }}" >
                                                            <button disabled class="input-group-text changeQuantitymas">+</button>
                                                            @php
                                                                $total +=  $price * $prod->prod_qty;
                                                            @endphp
                                                            <div class="w-100">
                                                                @if ($prod->qty > 10)
                                                                    <p>Stock: <font color="white"> 10+</font></p>
                                                                @else
                                                                    <p>Stock: <font color="white">{{ $prod->qty }}</font></p>
                                                                @endif

                                                            </div>

                                                        @elseif (($prod->qty < $prod->prod_qty))
                                                            <button class="input-group-text changeQuantitymenos">-</button>
                                                            <input readonly type="text" name="quantity" class="quantity form-control input-number qty-input text-center" value="{{ $prod->prod_qty }}" >
                                                            <button disabled class="input-group-text changeQuantitymas">+</button>
                                                            @php
                                                                $total +=  $price * $prod->prod_qty;
                                                            @endphp
                                                            <div class="w-100">
                                                                @if ($prod->qty > 10)
                                                                    <h6><font color="orange"><strong>Exceeds stock</strong></font></h6>
                                                                    <p>Stock: <font color="white"> 10+</font></p>
                                                                @else
                                                                    <h6><font color="orange"><strong>Exceeds stock</strong></font></h6>
                                                                    <p>Stock: <font color="white">{{ $prod->qty }}</font></p>
                                                                @endif
                                                            </div>

                                                        @endif

                                                    @elseif ($prod->qty > 0)
                                                        <button class="input-group-text changeQuantitymenos">-</button>
                                                        <input readonly type="text" name="quantity" class="quantity form-control input-number qty-input text-center" value="{{ $prod->prod_qty }}" >
                                                        <button  class="input-group-text changeQuantitymas">+</button>
                                                        <div class="w-100">
                                                            @if ($prod->qty > 10)
                                                                <p>Stock: <font color="white"> 10+</font></p>
                                                            @else
                                                                <p>Stock: <font color="white">{{ $prod->qty }}</font></p>
                                                            @endif
                                                        </div>

                                                    @php
                                                        $total +=  $price * $prod->prod_qty;
                                                    @endphp
                                                    @endif
                                                    @php
                                                        $subtotal =  $price * $prod->prod_qty;
                                                    @endphp
                                                </div>
                                            </td>

                                            <td class="total"><h4>{{ $config->currency_simbol }}{{ number_format($subtotal,2, '.', ',') }}</h4></td>
                                        </tr><!-- END TR-->
                                    @endforeach

                                </tbody>
                            @else
                            <span class="help-block opacity-7">
                                <strong>
                                    <font color="red">Cart is empty</font>
                                </strong>
                            </span>
                            <a href="{{ url('category') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>{{ __('CONTINUE SHOPPING') }}</span> <i class="icon-refresh"></i></a>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>{{ __('Cart Totals') }}</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>{{ $config->currency_simbol }}{{ number_format($total,2, '.', ',') }}</span>
                        </p>
                        {{-- <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p> --}}
                        @if ($config->tax_status == 1)
                            @php

                                $tax = $config->tax;
                                $tax = $tax/100;
                                $tax_total = $tax * $total;
                                $total = $total + $tax_total;

                            @endphp
                            <p class="d-flex">
                                <span>Tax</span>
                                <span>{{ $config->currency_simbol }}{{ number_format($tax_total, 2, '.', ',') }}</span>
                            </p>
                        @else
                            @php
                                $tax_total =  0;
                            @endphp
                            <input type="hidden" name="tax" value="{{ $tax_total }}">
                        @endif
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>{{ $config->currency_simbol }}{{ number_format($total,2, '.', ',') }}</span>
                        </p>
                    </div>
                    <p class="text-center">
                        @if ($cartitems->count() > 0)
                            @php
                                $outofstock = 0;
                                $cant = 0;
                                foreach($cartitems as $item)
                                {
                                    if ($item->qty < $item->prod_qty) {
                                        $outofstock++;
                                    }

                                    $cant = $cant + $item->prod_qty;
                                }
                            @endphp
                            @if ($cant < 11)
                                @if ($outofstock > 0)
                                    <a href="{{ url('checkout') }}" class="btn btn-primary py-3 px-4 btn-block">{{ __('Proceed to Checkout') }}</a>
                                    <div class="alert alert-danger" role="alert">
                                        {{ __('You have') }} <strong>{{ $outofstock }}</strong> {{ __('item(s) out of stock, if you proceed it will be removed from your cart') }}.
                                    </div>
                                @else
                                    <a href="{{ url('checkout') }}" class="btn btn-primary py-3 px-4">{{ __('Proceed to Checkout') }}</a>
                                @endif
                            @else
                                <a href="{{ url('checkout') }}" class="btn btn-primary py-3 px-4 btn-block disabled">{{ __('Proceed to Checkout') }}</a>
                                <div class="alert alert-danger" role="alert">
                                    {{ __('You must have a maximum of 10 items in your cart you must delete a certain amount to proceed to checkout') }}.
                                </div>
                            @endif


                        @endif

                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
