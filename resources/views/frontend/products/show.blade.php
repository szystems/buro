@extends('layouts.frontend')
{{-- Trending products --}}
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('assets/uploads/product/'.$product->image) }}" class="image-popup"><img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate product_data">
                    <h3>
                        {{ $product->name }}
                    </h3>
                    @if ($config->store == 1)
                        @if($product->qty > 0)
                            <span class="badge badge-success">{{ __('In stock') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('Out of stock') }}</span>
                        @endif
                    @endif
                    @if ($product->trending == "1")
                        <span class="badge badge-info">{{ __('Trending') }}</span>
                    @endif
                    @if ($product->discount == "1")
                        <span class="badge badge-warning">{{ __('% Off') }}</span>
                    @endif
                    <p>{{ $product->description }}</p>
                    <p class="price">
                        @if ($product->discount == "1")
                            <span><font color="white">{{ $config->currency_simbol }}{{ number_format($product->selling_price,2, '.', ',') }}</font></span>
                            <span><strike>{{ $config->currency_simbol }}{{ number_format($product->original_price,2, '.', ',') }}</strike></span>
                        @else
                            <span>{{ $config->currency_simbol }}{{ number_format($product->original_price,2, '.', ',') }}</span>
                        @endif
                    </p>
                    @if ($config->store == 1)
                        @if($product->qty > 0)
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                    <input type="number" name="quantity" class="form-control qty-input" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->
                        @endif

                        <p>
                            @if (Auth::guest())
                                    <a href="{{ route('login') }}" class="btn btn-link addToWishlist btn-outline-white"><span class="material-symbols-outlined">favorite</span></a>
                            @else
                                    <a href="#" class="btn btn-link addToWishlist btn-outline-white"><span class="material-symbols-outlined">favorite</span></a>
                            @endif
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if ($product->qty > 0)
                                @if (Auth::guest())
                                    <a href="{{ url('login') }}" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                @else
                                    <a href="#" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                @endif
                            @else
                                <div class="product-action">
                                    <a href="{{ url('category/'.$category->slug.'/'.$product->slug) }}" class="btn-product"><i class="icon-search"></i><span> View Details...</span></a>
                                </div><!-- End .product-action -->
                                <a href="{{ url('category/'.$category->slug.'/'.$product->slug) }}" class="btn btn-primary btn-outline-primary">View Product...</a>
                            @endif

                        </p>
                    @endif
                    <p>
                        @if ($config->shopify == 1)

                            @if ($product->shopify_link != null)
                                <a href="{{ $product->shopify_link }}" target="_blank">
                                    {{-- <img src="{{ asset('assets/imgs/buynowshopify.png') }}" class="img-fluid"  alt=""> --}}
                                    <a href="{{ $product->shopify_link }}" class="btn btn-primary btn-outline-primary">Buy Now</a>
                                </a>
                            @else
                                <a href="{{ $config->shopify_link }}" target="_blank">
                                    {{-- <img src="{{ asset('assets/imgs/buynowshopify.png') }}" class="img-fluid"  alt=""> --}}
                                    <a href="{{ $config->shopify_link }}" class="btn btn-primary btn-outline-primary">Buy Now</a>
                                </a>
                            @endif

                        @endif
                        @if ($config->amazon == 1)
                            @if ($product->shopify_link != null)
                                <a href="{{ $product->amazon_link }}" target="_blank">
                                    <img src="{{ asset('assets/imgs/buynowamazon.png') }}" class="img-fluid"  alt="">
                                </a>
                            @else
                                <a href="{{ $config->amazon_link }}" target="_blank">
                                    <img src="{{ asset('assets/imgs/buynowamazon.png') }}" class="img-fluid"  alt="">
                                </a>
                            @endif
                            @endif
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection
