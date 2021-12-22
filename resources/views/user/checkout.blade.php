@extends('user.layout')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Confirmation</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Confirmation</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-8">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><a href="#"><span>Order number</span> : {{$order->no_order}}</a></li>
                        <li><a href="#"><span>Date</span> : {{date('Y-m-d H:i', strtotime($order->created_at))}}</a>
                        </li>
                        <li><a href="#"><span>Total</span> : Rp
                                {{number_format( $order->grand_total , 0 , '.' , '.' )}}</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex flex-row-reverse">
                    <img src="{{URL::asset('user/img/frame.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order->orderDetails as $orderDetail)
                        <tr>
                            <td>
                                <p>{{$orderDetail->produk->nama}}</p>
                            </td>
                            <td>
                                <h5>x {{$orderDetail->qty}}</h5>
                            </td>
                            <td>
                                <p>Rp {{number_format( $orderDetail->total , 0 , '.' , '.' )}}</p>
                            </td>
                        </tr>
                        @empty
                        <tr>
                        </tr>
                        @endforelse
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Rp {{number_format( $order->grand_total , 0 , '.' , '.' )}}</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Order Details Area =================-->

@endsection