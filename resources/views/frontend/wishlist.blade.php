@extends('layouts.frontend')
{{-- Wishlist --}}
@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <h2 class="mb-4">{{ __('My Whishlist') }}</h2>
                    <div class="cart-list">
                        <table class="table">
                            @if ($wishlist->count() > 0)
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlist as $prod)
                                        @php
                                            if ($prod->discount == "1") {
                                                $price = $prod->selling_price;
                                            }else {
                                                $price = $prod->original_price;
                                            }
                                        @endphp
                                        <tr class="text-center product_data">
                                            <td class="product-remove remove-wishlist-item"><a><span class="icon-close"></span></a></td>

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

                                            @if ($prod->qty == 0)
                                                <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                                            @else
                                                <td class="stock-col">
                                                    <input type="number" name="quantity" class="form-control qty-input" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                    @if ($prod->qty > 10)
                                                        <span class="in-stock">In stock:</span><font color="white"> <strong>10 +</strong></font>
                                                    @else
                                                        <span class="in-stock">In stock:</span><font color="white"> <strong>{{ $prod->qty }}</strong></font>
                                                    @endif
                                                </td>
                                            @endif

                                            @if ($prod->qty == 0)
                                                <td class="action-col">
                                                    <button disabled class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>{{ __('Add to Cart') }}</button>
                                                </td>
                                            @else
                                                <td class="action-col" align="center">
                                                    <input type="hidden" class="prod_id" value="{{ $prod->ProdID }}">
                                                    {{-- <input type="hidden" value="1" class="qty-input"> --}}
                                                    <a href="#" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                                </td>
                                            @endif
                                        </tr><!-- END TR-->
                                    @endforeach
                                </tbody>
                            @else
                                <span class="help-block opacity-7">
                                    <strong>
                                        <font color="red">{{ __('Whishlist is empty') }}</font>
                                    </strong>
                                </span>
                                <a href="{{ url('category') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>{{ __('CONTINUE SHOPPING') }}</span> <i class="icon-refresh"></i></a>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
