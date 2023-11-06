<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Pure css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
        integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">


    <title>{{ __('Order Details') }}</title>

</head>

<body>
    <center>
        <img align="center" src="{{ $imagen }}" alt="" height="100">
    </center>
<h3 align="center"><u>{{ __('Order Details') }}</u></h3>
    <label>
<font size="1">{{ __('Report Date') }}:</font>
        <font color="blue" size="1">
            @php
                $horafecha = new DateTime("now", new DateTimeZone(Auth::user()->timezone));
                $horafecha = $horafecha->format('d-m-Y, H:i:s')
            @endphp
            {{ $horafecha }} ({{ Auth::user()->timezone }})
        </font>
    </label>
    <br>

    <table class="pure-table pure-table-bordered" Width=100%>
        <thead>
            <tr>
                <th align="right">
                    <font size="1">{{ __('First Name') }}:</font>
                </th>
                <td align="left">
                    <font size="1">{{ $order->fname }}</font>
                </td>
                <th align="right">
                    <font size="1">{{ __('Last Name') }}:</font>
                </th>
                <td>
                    <font size="1">{{ $order->lname }}</font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">Email:</font>
                </th>
                <td>
                    <font size="1">{{ $order->email }}</font>
                </td>
                <th align="right">
            <font size="1">{{ __('Phone') }}:</font>
                </th>
                <td>
                    <font size="1">{{ $order->phone }}</font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">{{ __('Shipping Address') }} 1:</font>
                </th>
                <td colspan="3">
                    <font size="1">{{ $order->address1 }}</font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">{{ __('Shipping Address') }} 2:</font>
                </th>
                <td colspan="3">
                    <font size="1">{{ $order->address2 }}</font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">{{ __('Zip / Postal Code') }}:</font>
                </th>
                <td>
                    <font size="1">{{ $order->zipcode }}</font>
                </td>
                <th align="right">
                    <font size="1">{{ __('Tracking Number') }}:</font>
                </th>
                <td>
                    <font size="1">{{ $order->tracking_no }}</font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">{{ __('Order Date') }}:</font>
                </th>
                <td>
                    @php
                        $date = new DateTime($order->created_at, new DateTimeZone(date_default_timezone_get()));
                        $date->setTimezone(new DateTimeZone(Auth::user()->timezone));
                    @endphp
                    <font size="1">{{ $date->format('d-m-Y')}}</font>
                </td>
                <th align="right">
                    <font size="1">{{ __('Order Status') }}:</font>
                </th>
                <td>
                    <font size="1">
                        {{ $order->status }}
                        @if ($order->status == 0)
                        {{ __('Pending') }}
                        @elseif ($order->status == 1)
                        {{ __('Completed') }}
                        @elseif ($order->status == 2)
                        {{ __('Cancelled') }}
                        @endif
                    </font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">{{ __('Payment Mode') }}:</font>
                </th>
                <td colspan="3">
                    <font size="1">
                        @if ($order->payment_mode == "Paid by PayPal")
                            {{ __('Paid by PayPal') }} ({{ $order->payment_id }})
                        @elseif ($order->payment_mode == "POD or DBT")
                            {{ __('POD or DBT') }}
                        @endif</font>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <font size="1">{{ __('Note') }}:</font>
                </th>
                <td colspan="3">
                    <font size="1">{{ $order->note }}</font>
                </td>
            </tr>
        </thead>

        {{-- <tbody>
            <tr>
                <td align="right">
                    <font size="1">Image:</font>
                </td>
                <td align="center" colspan="3">



                </td>
            </tr>
        </tbody> --}}

    </table>

    <h5><u>{{ __('Product Details') }}:</u></h5>

    <table class="pure-table pure-table-bordered" Width=100%>
        @php
            $total = 0;
        @endphp
        <thead>
            <tr>
                <th>
                    <font size="1">{{ __('Product') }}</font>
                </th>
                <th>
                    <font size="1">{{ __('Price') }}</font>
                </th>
                <th>
                    <font size="1">{{ __('Quantity') }}</font>
                </th>
                <th>
                    <font size="1">SubTotal</font>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                @php
                    if ($item->discount == "1") {
                        $price = $item->selling_price;
                    }else {
                        $price = $item->original_price;
                    }
                @endphp
                <tr>
                    <td align="center">
                        <font size="1">{{ $item->Product }}
                    </td>
                    @if ($item->discount == 1)
                        <td align="right">
                            <font size="1" color="blue">
                                {{ $currency }}{{ number_format($item->price, 2, '.', ',') }}</font>
                            <br>
                            <strike>
                                <font size="1" color="red">
                                    {{ $currency }}{{ number_format($item->original_price, 2, '.', ',') }}</font>
                            </strike>
                        </td>
                    @else
                        <td align="right">
                            <font size="1" color="blue">
                                {{ $currency }}{{ number_format($item->price, 2, '.', ',') }}</font>
                        </td>
                    @endif
                    <td align="center">
                        <font size="1">{{ $item->qty }}</font>
                        @php
                            $total +=  $price * $item->qty;
                            $subtotal =  $price * $item->qty;
                        @endphp
                    </td>
                    <td align="right">
                        {{ $config->currency_simbol }}{{ number_format($subtotal,2, '.', ',') }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right">
                    {{ __('Sub-Total') }}:
                </td>
                <td align="right">
                    {{ $config->currency_simbol }}{{ number_format($total,2, '.', ',') }}</>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    {{ __('Shipping') }}:
                </td>
                <td align="right">
                    {{ $config->currency_simbol }}{{ number_format($order->shipping,2, '.', ',') }}</>
                </td>
            </tr>
            @if ($order->total_tax != 0)
                <tr>
                    @php
                        $tax_total = $order->total_tax;
                        $shipping = $order->shipping;
                        $total = $total + $tax_total + $shipping;
                    @endphp
                    <td colspan="3" align="right">
                        {{ __('Total Tax') }}:
                    </td>
                    <td align="right">
                        {{ $config->currency_simbol }}{{ number_format($tax_total,2, '.', ',') }}</>
                    </td>
                </tr>
            @else
                @php
                    $shipping = $order->shipping;
                    $total = $total + $shipping;
                @endphp
            @endif
            <tr>
                <td colspan="3" align="right">
                    <b>Total:</b>
                </td>
                <td align="right">
                    <b>{{ $config->currency_simbol }}{{ number_format($total,2, '.', ',') }}</b>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
