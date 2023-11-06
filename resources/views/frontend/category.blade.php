@extends('layouts.frontend')
{{-- OurCoffee Categories --}}
@section('content')
    <section class="ftco-menu mb-5 pb-5">
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="heading-section ftco-animate">
                            <!-- <span class="subheading" align="center">Discover</span> -->
                            <h2 class="mb-4" align="center">{{ __('Our Coffee') }}</h2>
                            <p class="mb-4">{{ __("Our coffee beans 100% arabica are carefully selected from the lush region of Guatemala, renowned for its unique and exquisite coffee varieties. The elevated terrain in which our coffee is grown ensures that every cup is infused with unparalleled excellence and taste.") }}</p>
                        </div>
                        <div>
                            <h3>{{ __('Choose your type of flavor:') }}</h3>
                        </div>
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                @foreach ($categories as $cat)
                                    <a class="nav-link" id="v-pills-{{ $cat->id }}-tab" data-toggle="pill" href="#v-pills-{{ $cat->id }}" role="tab" aria-controls="v-pills-{{ $cat->id }}" aria-selected="true">
                                        {{ $cat->name }}
                                        @if ($cat->popular == "1")
                                            <span class="badge badge-info">{{ $cat->popular == '1'? 'Popular':''}}</span>
                                        @endif
                                    </a>

                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">
                            <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                @foreach ($categories as $cat)
                                <div class="tab-pane fade show " id="v-pills-{{ $cat->id }}" role="tabpanel" aria-labelledby="v-pills-0-tab">
                                    <div class="row">
                                            @php
                                                $products=DB::table('products')
                                                ->where('status','=',1)
                                                ->where('cate_id', '=', $cat->id)
                                                ->orderBy('name','asc')
                                                ->get();

                                                $numProds = $products->count();
                                                if ($numProds > 4) {
                                                    $numProds = 3;
                                                }else {
                                                    $numProds = 12/$numProds;
                                                }
                                            @endphp
                                            @foreach ($products as $prod)
                                            <div class="col-md-{{ $numProds }} product_data">
                                                <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                                                <input type="hidden" value="1" class="qty-input">
                                                <div class="menu-entry">
                                                    <div class="text text-center pt-4">
                                                        <h3><a href="{{ url('category/'.$cat->slug.'/'.$prod->slug) }}">
                                                            {{ $prod->name }}
                                                        </a></h3>

                                                    </div>
                                                    <a href="{{ url('category/'.$cat->slug.'/'.$prod->slug) }}" class="img" style="background-image: url({{ asset('assets/uploads/product/'.$prod->image) }});"></a>
                                                    <div class="text text-center pt-4">
                                                        <p>{{ $prod->description }}</p>

                                                            @if ($prod->discount == "1")
                                                                <p class="price">
                                                                    <span>{{ $config->currency_simbol }}{{ number_format($prod->selling_price,2, '.', ',') }}</span>
                                                                    <span><strike><font color="c70017">{{ $config->currency_simbol }}{{ number_format($prod->original_price,2, '.', ',') }}</font></strike></span>
                                                                    @if ($prod->discount == "1")
                                                                        <span class="badge badge-warning">{{ $prod->discount == '1'? '% Off':''}}</span>
                                                                    @endif
                                                                </p>
                                                            @else
                                                                <p class="price">
                                                                    <span>{{ $config->currency_simbol }}{{ number_format($prod->original_price,2, '.', ',') }}</span>
                                                                    @if ($prod->discount == "1")
                                                                        <span class="badge badge-warning">{{ __('% Off') }}</span>
                                                                    @endif
                                                                </p>
                                                            @endif


                                                        <p>
                                                            @if ($config->store == 1)
                                                                @if (Auth::guest())
                                                                    <div class="product-action-vertical">
                                                                        <a href="{{ route('login') }}" class="btn btn-link addToWishlist btn-outline-white"><span class="material-symbols-outlined">favorite</span></a>
                                                                    </div><!-- End .product-action-vertical -->
                                                                @else
                                                                    <div class="product-action-vertical">
                                                                        <a href="#" class="btn btn-link addToWishlist btn-outline-white"><span class="material-symbols-outlined">favorite</span></a>
                                                                    </div><!-- End .product-action-vertical -->
                                                                @endif
                                                            @endif

                                                            @if ($config->store == 1)
                                                                @if ($prod->qty > 0)
                                                                    @if (Auth::guest())
                                                                        <a href="{{ url('login') }}" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                                                    @else
                                                                        <a href="#" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                                                    @endif
                                                                @else
                                                                    <div class="product-action">
                                                                        <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}" class="btn-product"><i class="icon-search"></i><span> View Details...</span></a>
                                                                    </div><!-- End .product-action -->
                                                                    <a href="{{ url('category/'.$cat->slug.'/'.$prod->slug) }}" class="btn btn-primary btn-outline-primary">View Product...</a>
                                                                @endif

                                                            @endif

                                                            @if ($config->shopify == 1)

                                                                @if ($prod->shopify_link != null)
                                                                    <a href="{{ $prod->shopify_link }}" target="_blank">
                                                                        {{-- <img src="{{ asset('assets/imgs/buynowshopify.png') }}" class="img-fluid"  alt=""> --}}
                                                                        <a href="{{ $prod->shopify_link }}" class="btn btn-primary btn-outline-primary">Buy Now</a>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ $config->shopify_link }}" target="_blank">
                                                                        {{-- <img src="{{ asset('assets/imgs/buynowshopify.png') }}" class="img-fluid"  alt=""> --}}
                                                                        <a href="{{ $config->shopify_link }}" class="btn btn-primary btn-outline-primary">Buy Now</a>
                                                                    </a>
                                                                @endif

                                                            @endif
                                                            @if ($config->amazon == 1)
                                                                @if ($prod->shopify_link != null)
                                                                    <a href="{{ $prod->amazon_link }}" target="_blank">
                                                                        <img src="{{ asset('assets/imgs/buynowamazon.png') }}" class="img-fluid"  alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{ $config->amazon_link }}" target="_blank">
                                                                        <img src="{{ asset('assets/imgs/buynowamazon.png') }}" class="img-fluid"  alt="">
                                                                    </a>
                                                                @endif
                                                            @endif
                                                            <br>
                                                            @if ($config->store == 1)
                                                                @if($prod->qty > 0)
                                                                    <span class="badge badge-success">{{ __('In stock') }}</span>
                                                                @else
                                                                    <span class="badge badge-danger">{{ __('Out of stock') }}</span>
                                                                @endif
                                                            @endif
                                                            @if ($prod->trending == "1")
                                                                <span class="badge badge-info">{{ __('Trending') }}</span>
                                                            @endif

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Best Sellers --}}
    {{-- <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">{{ __('Best Sellers') }}</h2>
                    <p>{{$category->description}}</p>
                </div>
            </div>
            <div class="row">
                @php
                    $numProds = $popularProducts->count();
                    if ($numProds > 4) {
                        $numProds = 3;
                    }else {
                        $numProds = 12/$numProds;
                    }
                @endphp
                @foreach ($popularProducts as $prod)

                    <div class="col-md-{{ $numProds }} product_data">

                        <input type="hidden" value="{{ $prod->product->id }}" class="prod_id">
                        <input type="hidden" value="1" class="qty-input">

                        <div class="menu-entry">
                            <a href="{{ url('category/'.$prod->product->category->slug.'/'.$prod->product->slug) }}" class="img" style="background-image: url({{ asset('assets/uploads/product/'.$prod->product->image) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ url('category/'.$prod->product->category->slug.'/'.$prod->product->slug) }}">{{ substr($prod->product->name, 0, 20) }}...</a></h3>
                                <p>
                                    @if (Auth::guest())
                                        <div class="product-action-vertical">
                                            <a href="{{ route('login') }}" class="btn btn-link addToWishlist btn-outline-white"><span class="material-symbols-outlined">favorite</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    @else
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn btn-link addToWishlist btn-outline-white"><span class="material-symbols-outlined">favorite</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    @endif

                                    @if ($prod->product->qty > 0)
                                        @if (Auth::guest())
                                            <a href="{{ url('login') }}" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                        @else
                                            <a href="#" class="btn btn-primary btn-outline-primary addToCartBtn">{{ __('Add to Cart') }}</a>
                                        @endif
                                    @else
                                        <div class="product-action">
                                            <a href="{{ url('category/'.$prod->product->category->slug.'/'.$prod->product->slug) }}" class="btn-product"><i class="icon-search"></i><span> View Details...</span></a>
                                        </div><!-- End .product-action -->
                                        <a href="{{ url('category/'.$prod->product->category->slug.'/'.$prod->product->slug) }}" class="btn btn-primary btn-outline-primary">View Product...</a>
                                    @endif
                                    <br>
                                    @if($prod->product->qty > 0)
                                        <span class="badge badge-success">{{ __('In stock') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Out of stock') }}</span>
                                    @endif
                                </p>
                                <p class="price">
                                    @if ($prod->product->discount == "1")
                                        <span>{{ $config->currency_simbol }}{{ number_format($prod->product->selling_price,2, '.', ',') }}</span>
                                        <span><strike><font color="c70017">{{ $config->currency_simbol }}{{ number_format($prod->product->original_price,2, '.', ',') }}</font></strike></span>
                                    @else
                                        <span>{{ $config->currency_simbol }}{{ number_format($prod->product->original_price,2, '.', ',') }}</span>
                                    @endif
                                    @if ($prod->product->discount == "1")
                                        <span class="badge badge-warning">{{ __('% Off') }}</span>
                                    @endif
                                </p>

                                    @if ($prod->product->trending == "1")
                                        <span class="badge badge-info">{{ __('Trending') }}</span>
                                    @endif

                                <p>{{ $prod->product->small_description }}</p>


                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section> --}}
@endsection
