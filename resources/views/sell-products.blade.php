@extends('layouts.admin.master')

@section('title')Sell Products
 {{ $title ?? '' }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Sell Products</h3>
		@endslot

		<li class="breadcrumb-item active">Sell Products</li>
	@endcomponent

	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-header pb-0">
	                    <h5>Cart</h5>
	                </div>
	                <div class="card-body">
	                    <div class="row">
                            @include('layouts.partials.messages')
                            @if(session()->has('status'))
                                <div class="alert alert-success" role="alert">
                                    <ul class="list-unstyled mb-0">
                                        <li>{{session()->get('status')}}</li>
                                    </ul>
                                </div>
                            @endif

	                        <div class="order-history table-responsive wishlist">
	                            <table class="table table-bordered">
	                                <thead>
	                                    <tr>
	                                        <th>Product Name</th>
	                                        <th>Price</th>
	                                        <th>Quantity</th>
	                                        <th>Action</th>
	                                        <th>Total</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
                                        @if($cart != null)
                                            @foreach($cart as $cartProduct)
                                                <tr>
                                                    <td>
                                                        <div class="product-name">
                                                            <a href="#"> <h6>{{$cartProduct->productName}}</h6></a>
                                                        </div>
                                                    </td>
                                                    <td>Ksh {{$cartProduct->sellingPrice}}</td>
                                                    <td>
                                                        <input class="input-group-solid" type="number" value="{{$cartProduct->quantity}}" readonly>
                                                        {{--                                                        <fieldset class="qty-box">--}}
                                                        {{--                                                            <div class="input-group">--}}
                                                        {{--                                                                <input id="touch-spin-quantity" class="touchspin text-center" type="text" value="{{$cartProduct->quantity}}" />--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </fieldset>--}}
                                                    </td>
                                                    <td><i data-feather="x-circle"></i></td>
                                                    <td>Ksh {{$cartProduct->quantity * $cartProduct->sellingPrice}}</td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td class="total-amount">
                                                    <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                                                </td>
                                                <td><span>$ {{$sum}} </span></td>
                                            </tr>
                                            <tr>
                                                <td class="float-end">
                                                    <form action="{{route('checkout')}}" method="post">
                                                        @csrf
                                                        <input class="btn btn-success cart-btn-transform" type="submit" value="Check Out"/>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif

	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>

                <div class="col-xl-9 xl-60 box-col-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Add Product</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form class="form theme-form" method="post" action="{{route('sell-products')}}">
                                    @include('layouts.partials.messages')
                                    @if(session()->has('status'))
                                        <div class="alert alert-success" role="alert">
                                            <ul class="list-unstyled mb-0">
                                                <li>{{session()->get('status')}}</li>
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Products</label>
                                                <select class="js-example-basic-single col-sm-12" id="product" name="product_id">
                                                    <optgroup label="Products">
                                                        <option value="{{null}}">Select Product</option>
                                                        @foreach($products as $product)
                                                            <option value="{{$product->id}}">{{$product->productName}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        @if ($errors->has('product_id'))
                                            <span class="text-danger text-left">{{ $errors->first('product_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group input-group">
                                                <label class="form-label" for="selling-price">Selling Price:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Ksh </span>
                                                    <input class="form-control" id="selling-price" name="selling_price" type="text" placeholder="4000" value="{{old('selling_price')}}"/>
                                                </div>
                                            </div>
                                            @if ($errors->has('selling_price'))
                                                <span class="text-danger text-left">{{ $errors->first('selling_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="quantity">Quantity:<span class="font-danger">*</span></label>
                                                <input class="form-control" id="quantity" name="quantity" min="0" type="number" data-language="en" placeholder="eg. 45" value="{{old('quantity')}}"/>
                                            </div>
                                            @if ($errors->has('quantity'))
                                                <span class="text-danger text-left">{{ $errors->first('quantity') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        <input class="btn btn-light" type="reset" value="Cancel" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

	        </div>
	    </div>
	</div>

	@push('scripts')
	<script src="{{asset('assets/js/touchspin/vendors.min.js')}}"></script>
    <script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
    <script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
    <script>
        $("#touch-spin-quantity").TouchSpin({
            min: 0,
            max: 1000,
            step: 1,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
    </script>
	@endpush

@endsection
