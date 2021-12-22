@extends('user.layout')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($queues as $queue)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        @if ($queue->produk->produkImages->first())
                                        <div class="d-flex">
                                            <img class="img-fluid" width="200" height="200" src="{{asset('storage/'.$queue->produk->produkImages->first()->path) }}" alt="">
                                        </div>
                                        @else
                                        <div class="d-flex">
                                            <img src="{{URL::asset('user/img/cart.jpg')}}" alt="">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <p>{{$queue->produk->nama}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>Rp {{number_format( $queue->produk->harga , 0 , '.' , '.' ) }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="{{$queue->qty}}"
                                        title="Quantity:" class="input-text qty">
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i
                                            class="lnr lnr-chevron-up"></i></button>
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i
                                            class="lnr lnr-chevron-down"></i></button>
                                </div>
                            </td>
                            <td>
                                <h5>Rp {{number_format( $queue->qty * $queue->produk->harga , 0 , '.' , '.' )}}</h5>
                            </td>
                            <td>
                                {!! Form::open(['url' => '/cart/'. $queue->id, 'class' => 'delete','style' =>
                                'display:inline-block']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>Rp {{number_format( $grand_total , 0 , '.' , '.' )}}</h5>
                            </td>
                            <td>

                            </td>
                        </tr>

                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="#">Continue Shopping</a>
                                    <a class="primary-btn" href="/checkout">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection