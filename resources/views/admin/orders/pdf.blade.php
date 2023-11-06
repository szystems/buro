<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Pure css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
        integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">


    <title>{{ __('Orders List') }}</title>

</head>

<body>
    <center>
        <img align="center" src="{{ $imagen }}" alt="" height="100">
    </center>
    <h3 align="center"><u>{{ __('Orders List') }}</u></h3>
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
    <label for="">
        <font size="1"><strong><u>{{ __('Filter by') }}:</u></strong></font>
    </label>
    <br>
    <label for="">
        <font size="1">{{ __('From') }}: </font>
        <font size="1" color="blue">{{ date('d-m-Y', strtotime($desde)) }}</font>
    </label>
    <label for="">
        <font size="1">{{ __('To') }}: </font>
        <font size="1" color="blue">{{ date('d-m-Y', strtotime($hasta)) }}</font>
    </label>
    <label for="">
        <font size="1">Status: </font>
        <font size="1" color="blue">
            @if ($queryStatus != null)
                @if ($queryStatus == '0')
                {{ __('Pending') }}
                @elseif ($queryStatus == '1')
                {{ __('Completed') }}
                @elseif ($queryStatus == '2')
                {{ __('Cancelled') }}
                @endif
            @else
            {{ __('All') }}
            @endif
        </font>
    </label>
    <label for="">
        <font size="1">{{ __('Payment Mode') }}: </font>
        <font size="1" color="blue">
            @if ($queryPayment != null)
                @if ($queryPayment == 'Paid by PayPal')
                {{ __('Paid by Paypal') }}
                @elseif ($queryPayment == 'POD or DBT')
                {{ __('POD or DBT') }}
                @endif
            @else
            {{ __('All') }} @endif
        </font>
    </label>
    <h5><u>{{ __('Resume') }}:</u></h5>
    <table class="pure-table pure-table-bordered" Width=100%>
        <thead>
            <tr>
                <th>
                    <font size="1">{{ __('Date') }}</font>
                </th>
                <th>
                    <font size="1">{{ __('Orders Completed') }}</font>
                </th>
                <th>
                    <font size="1">SubTotal</font>
                </th>
                <th>
                    <font size="1">{{ __('Total Tax') }}</font>
                </th>
                <th>
                    <font size="1">Total</font>
                </th>
                <th>
                    <font size="1">{{ __('Total Cancelled') }}</font>
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
                $totaltax = 0;
                $completeorders = 0;
                $cancelledorders = 0;
                $desde = date("d-m-Y", strtotime($desde));
                $hasta = date("d-m-Y", strtotime($hasta));
                $totalorders = $ordersResume->count();

            @endphp
            @foreach ($ordersResume as $resume)
                @php
                    if ($resume->status == "2") {
                        $cancelledorders = $resume->total_price;
                    }else {
                        $total += $resume->total_price;
                        $totaltax += $resume->total_tax;
                        $completeorders += $resume->status;
                    }
                @endphp
            @endforeach
                <tr>
                    <td align="center">
                        <font size="1">{{ __('From') }}: <strong>{{ date('d-m-Y', strtotime($desde)) }}</strong> {{ __('To') }}: <strong>{{ date('d-m-Y', strtotime($hasta)) }}</strong></font>
                    </td>
                    <td align="center">
                        <font size="1">({{ $completeorders }}/{{ $totalorders }})</font>
                    </td>
                    <td align="right">
                        <font size="1" color="limegreen">{{ $config->currency_simbol }}{{ number_format($total-$totaltax, 2, '.', ',') }}</font>
                    </td>
                    <td align="center">
                        <font size="1" color="orange">{{ $config->currency_simbol }}{{ number_format($totaltax, 2, '.', ',') }}</font>
                    </td>
                    <td align="center">
                        <font size="1" color="blue"><strong>{{ $config->currency_simbol }}{{ number_format($total, 2, '.', ',') }}</strong></font>
                    </td>
                    <td align="center">
                        <font size="1" color="red"><strong>{{ $config->currency_simbol }}{{ number_format($cancelledorders, 2, '.', ',') }}</strong></font>
                    </td>
                </tr>
        </tbody>
    </table>
    <h5><u>Orders List:</u></h5>
    <table class="pure-table pure-table-bordered" Width=100%>
        <thead>
            <tr>
                <th>

                    <font size="1">{{ __('Order Date') }}</font>
                </th>
                <th>
                    <font size="1">{{ __('Tracking Number') }}</font>
                </th>
                <th>
                    <font size="1">Total</font>
                </th>
                <th>
                    <font size="1">{{ __('Status') }}</font>
                </th>
                <th>
                    <font size="1">{{ __('Payment Mode') }} </font>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td align="center">
                        @php
                            $date = new DateTime($order->created_at, new DateTimeZone(date_default_timezone_get()));
                            $date->setTimezone(new DateTimeZone(Auth::user()->timezone));
                        @endphp
                        <font size="1">{{ $date->format('d-m-Y') }}</font>
                    </td>
                    <td align="center">
                        <font size="1">{{ $order->tracking_no }}</font>
                    </td>
                    <td align="right">
                        <font size="1">
                            {{ $config->currency_simbol }}{{ number_format($order->total_price, 2, '.', ',') }}</font>
                    </td>
                    <td align="center">
                        <font size="1">

                            @if ($order->status == '0')
                                <font color="orange">{{ __('Pending') }}</font>
                            @elseif ($order->status == '1')
                                <font color="limegreen">{{ __('Completed') }}</font>
                            @elseif ($order->status == '2')
                                <font color="red">{{ __('Cancelled') }}</font>
                            @endif
                        </font>
                    </td>
                    <td align="center">
                        <font size="1">
                            @if ($order->payment_mode != null)
                                    @if ($order->payment_mode == 'POD or DBT')
                                        {{ __('POD or DBT') }}
                                    @else
                                        {{ __('Paid by PayPal') }}
                                    @endif
                                @endif
                        </font>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
