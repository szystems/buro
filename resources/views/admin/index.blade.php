@extends('layouts.admin')

@section('content')
    <div class="row">

        {{-- <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card background">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <div class="text-center pt-1">
                        <h4 class="mb-0">Dashboard</h4>
                    </div>
                    <hr class="dark horizontal my-0">
                </div> --}}
                <div class="row mb-4">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('show-user/'.Auth::id()) }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">person</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('My Profile') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('categories') }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">category</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('Categories') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('products') }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">sell</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('Products') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('orders') }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">local_shipping</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('Orders') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div> --}}
                            <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('course-categories') }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">category</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('Course Categories') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('users') }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">people_alt</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            {{-- <h6 class="text-center mb-0">Paypal</h6>
                                            <span class="text-xs">Freelance Payment</span> --}}
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('Users') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="card">
                                    <a href="{{ url('config') }}">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                <i class="material-icons opacity-10">settings</i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            {{-- <h6 class="text-center mb-0">Paypal</h6>
                                            <span class="text-xs">Freelance Payment</span> --}}
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">{{ __('Settings') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-12">

                    {{-- LAST ORDERS --}}
                    {{-- <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6>{{ __('Last Orders') }}</h6>
                                        <p class="text-sm mb-0">
                                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                                            <span class="font-weight-bold ms-1">{{ $completeOrders->count() }}</span> {{ __('Complete') }}
                                        </p>
                                        <p class="text-sm mb-0">
                                            <i class="far fa-clock text-warning" aria-hidden="true"></i>
                                            <span class="font-weight-bold ms-1">{{ $pendingOrders->count() }}</span> {{ __('Pending') }}
                                        </p>
                                        <p class="text-sm mb-0">
                                            <i class="fa fa-ban text-danger" aria-hidden="true"></i>
                                            <span class="font-weight-bold ms-1">{{ $cancelledOrders->count() }}</span> {{ __('Cancelled') }}
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-5 my-auto text-end">
                                        <a href="{{ url('orders') }}" class="btn btn-outline-info">{{ __('View All') }} <span>({{ $allOrders->count() }})</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ __('Date') }} ({{ Auth::user()->timezone }})</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    {{ __('Status') }}</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>

                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                @php
                                                                    $date = new DateTime($order->created_at, new DateTimeZone(date_default_timezone_get()));
                                                                    $date->setTimezone(new DateTimeZone(Auth::user()->timezone));
                                                                @endphp
                                                                <h6 class="mb-0 text-sm"><a href="{{ url('admin/show-order/'.$order->id) }}">{{ $date->format('d-m-Y') }}</a></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><a href="{{ url('admin/show-order/'.$order->id) }}">
                                                                    @if ($order->status == 0)
                                                                        <font color="orange">{{ __('Pending') }}</font>
                                                                    @elseif ($order->status == 1)
                                                                        <font color="limegreen">{{ __('Completed') }}</font>
                                                                    @elseif ($order->status == 2)
                                                                        <font color="red">{{ __('Cancelled') }}</font>
                                                                    @endif
                                                                </a></h6>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold"><a href="{{ url('admin/show-order/'.$order->id) }}"> {{ $config->currency_simbol }}{{ number_format($order->total_price,2, '.', ',') }} </a></span>
                                                    </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- LAST PRODUCTS --}}

                    {{-- <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6>{{ __('Top Popular Products') }}</h6>
                                    </div>
                                    <div class="col-lg-6 col-5 my-auto text-end">
                                        <a href="{{ url('orders') }}" class="btn btn-outline-info">{{ __('View All') }} <span>({{ $allProducts->count() }})</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ __('Product') }}</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Stock</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ __('Orders') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($popularProducts as $product)
                                            <tr>

                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><a href="{{ url('show-product/'.$product->product->id) }}">{{ $product->product->name }}</a></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold"><a href="{{ url('show-product/'.$product->product->id) }}">{{ $product->product->qty }}</a></span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold"><a href="{{ url('show-product/'.$product->product->id) }}">{{ $product->count }}</a></span>
                                                    </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- stock alert --}}

                    {{-- <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6>{{ __('Stock Alert') }}</h6>
                                    </div>
                                    <div class="col-lg-6 col-5 my-auto text-end">
                                        <a href="{{ url('orders') }}" class="btn btn-outline-info">{{ __('View All') }} <span>({{ $allProducts->count() }})</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ __('Product') }}</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stockAlerts as $product)
                                            <tr>

                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><a href="{{ url('show-product/'.$product->id) }}">{{ $product->name }}</a></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold"><a href="{{ url('show-product/'.$product->id) }}">{{ $product->qty }}</a></span>
                                                    </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div align="center">
                                        {{ $stockAlerts->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

    </div>
@endsection
