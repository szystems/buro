@extends('layouts.frontend')
{{-- Order Show --}}
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">

                @php
                    $usuario = Auth::user()->name;
                    $nombre = explode(' ', trim($usuario));
                    $names = str_word_count($usuario);
                @endphp

                <div class="col-md-3 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>{{ ucwords($nombre[0]) }}'s <a href="{{ url('my-account') }}">{{ __('Dashboard') }}</a></h3>
                            <li><a href="{{ url('my-orders') }}"><font color="c70017">-> {{ __('Orders') }}<strong></strong></font><!--<span>(12)</span>--></a></li>
                            <li><a href="{{ url('user-details/'.Auth::id()) }}">- {{ __('Account Details') }} <!--<span>(12)</span>--></a></li>
                            <li><a href="javascript:; {{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><font color="red">- {{ __('Logout') }}</font>  </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 ftco-animate">
                    <div class="col-md-12 ftco-animate">

                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ __('Order Details') }}</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Order Date') }} <small>({{ Auth::user()->timezone }})</small></label>
                                    @php
                                        $date = new DateTime($orders->created_at, new DateTimeZone(date_default_timezone_get()));
                                        $date->setTimezone(new DateTimeZone(Auth::user()->timezone));
                                    @endphp
                                    <p><font color="white">{{ $date->format('d-m-Y')}}</font></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Status') }}</label>
                                    <p>
                                        <font color="white">
                                            @if ($orders->status == '0')
                                                {{ __('Pending') }}
                                            @elseif ($orders->status == '1')
                                                {{ __('Completed') }}
                                            @elseif ($orders->status == '2')
                                                {{ __('Cancelled') }}
                                            @endif
                                        </font>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Tracking Number') }}</label>
                                    <p><font color="white">{{ $orders->tracking_no }}</font></p>
                                </div>
                            </div>
                            @if ($orders->payment_mode != null)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Payment Mode') }}</label>
                                    <p><font color="white">
                                        {{ $orders->payment_mode }}
                                        @if ($orders->payment_id != null)
                                            {{ $orders->payment_id }}
                                        @endif
                                    </font></p>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Name') }}</label>
                                    <p><font color="white">{{ $orders->fname }} {{ $orders->lname }}</font></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Phone') }}</label>
                                    <p><font color="white">{{ $orders->phone }}</font></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ __('Zipcode') }}</label>
                                    <p><font color="white">{{ $orders->zipcode }}</font></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <p><font color="white">{{ $orders->email }}</font></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Shipping Address') }}</label>
                                    <p><font color="white">
                                        {{ $orders->address1 }},
                                        @if($orders->address2 != null)
                                            {{ $orders->address2 }}
                                        @endif
                                        {{ $orders->city }},
                                        {{ $orders->state }},
                                        {{ $orders->country }}.
                                    </font></p>
                                </div>
                            </div>
                            @if ($orders->note != null)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">{{ __('Order Note') }}</label>
                                        <p><font color="white">{{ $orders->note }}</font></p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="cart-list">
                            <table class="table">
                                @if ($orders->count() > 0)
                                    @php
                                        $total = 0;
                                    @endphp
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>{{ __('Product') }}</th>
                                            <th>{{ __('Price') }}</th>
                                            <th>{{ __('Quantity') }}</th>
                                            <th>SubTotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $item)
                                            <tr class="text-center product_data">
                                                @php
                                                    if ($item->discount == "1") {
                                                        $price = $item->selling_price;
                                                    }else {
                                                        $price = $item->original_price;
                                                    }
                                                @endphp
                                                <td class="image-prod">
                                                    <a href="{{ url('category/'.$item->CatSlug.'/'.$item->ProdSlug) }}">
                                                        <div class="img" style="background-image:url({{ asset('assets/uploads/product/'.$item->image) }});"></div>
                                                    </a>
                                                    <a href="{{ url('category/'.$item->CatSlug.'/'.$item->ProdSlug) }}">{{ $item->Product }}</a>
                                                </td>
                                                @if ($item->discount == "1")
                                                    <td class="price">
                                                        <font color="white">{{ $config->currency_simbol }}{{ number_format($item->price,2, '.', ',') }}</font>
                                                        <font color="c70017"><strike>{{ $config->currency_simbol }}{{ number_format($item->original_price,2, '.', ',') }}</strike></font>
                                                    </td>
                                                @else
                                                    <td class="price">
                                                        {{ $config->currency_simbol }}{{ number_format($item->price,2, '.', ',') }}
                                                    </td>
                                                @endif

                                                <td class="price">
                                                    {{ $item->qty }}
                                                    @php
                                                        $total +=  $price * $item->qty;
                                                        $subtotal =  $price * $item->qty;
                                                    @endphp
                                                </td>

                                                <td class="price">
                                                    {{ $config->currency_simbol }}{{ number_format($subtotal,2, '.', ',') }}
                                                </td>
                                            </tr><!-- END TR-->
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="price"></td>
                                            <td class="price"></td>
                                            <td class="price"><h8>{{ __('Sub-Total') }}: </h8></td>
                                            <td class="price"><h8><font color=""> {{ $config->currency_simbol }}{{ number_format($total,2, '.', ',') }}</font></h8></td>
                                        </tr>
                                        <tr>
                                            <td class="price"></td>
                                            <td class="price"></td>
                                            <td class="price"><h8>{{ __('Shipping') }}: </h8></td>
                                            <td class="price"><h8><font color=""> {{ $config->currency_simbol }}{{ number_format($orders->shipping,2, '.', ',') }}</font></h8></td>
                                        </tr>
                                        @if ($orders->total_tax != 0)
                                            <tr>
                                                @php
                                                    $tax_total = $orders->total_tax;
                                                    $shipping = $orders->shipping;
                                                    $total = $total + $tax_total + $shipping;
                                                @endphp
                                                <td class="price"></td>
                                                <td class="price"></td>
                                                <td class="price"><h8>{{ __('Total Tax') }}: </h8></td>
                                                <td class="price"><h8><font color=""> {{ $config->currency_simbol }}{{ number_format($tax_total,2, '.', ',') }}</font></h8></td>
                                            </tr>
                                        @else
                                            @php
                                                $shipping = $orders->shipping;
                                                $total = $total + $shipping;
                                            @endphp
                                        @endif
                                        <tr>
                                            <td class="price"></td>
                                            <td class="price"></td>
                                            <td class="price"><h4>Total: </h4></td>
                                            <td class="price"><h4><font color=""> {{ $config->currency_simbol }}{{ number_format($total,2, '.', ',') }}</font></h4></td>
                                        </tr>
                                    </tfoot>
                                @else
                                <span class="help-block opacity-7">
                                    <strong>
                                        <font color="red">Orders list is empty.</font>
                                    </strong>
                                </span>
                                <a href="{{ url('category') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span> <i class="icon-refresh"></i></a>
                                @endif
                            </table>
                        </div>

                    </div>
                </div> <!-- .col-md-8 -->

            </div>
        </div>
    </section> <!-- .section -->
@endsection
