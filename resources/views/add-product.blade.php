@extends('layouts.admin.master')
{{--@extends('layouts.admin.master')--}}

@section('title')Create Order
 {{ $title ?? '' }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/timepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tempus-dominus.css') }}">
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Add Products</h3>
		@endslot
		<li class="breadcrumb-item">Add Product</li>
	@endcomponent

	<div class="container-fluid">
	    <div class="row">
            <div class="col-xl-9 xl-60 box-col-8">
                <div class="card">
                    <div class="job-search">
                        <div class="card-body pb-0">
                            <div class="job-description">
                                <h6 class="mb-0">Product Details</h6>
                                <form class="form theme-form" method="post" action="{{route('add-products')}}" enctype="multipart/form-data">
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
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="product-name">Product Name:<span class="font-danger">*</span></label>
                                                <input class="form-control" id="product-name" name="product_name" type="text" placeholder="Hewlett Packard Computers" value="{{old('product_name')}}"/>
                                            </div>
                                            @if ($errors->has('product_name'))
                                                <span class="text-danger text-left">{{ $errors->first('product_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group input-group-solid">
                                                <label class="form-label" for="buying-price">Buying Price:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Ksh </span>
                                                    <input class="form-control" id="buying-price" name="buying_price" type="text" placeholder="4000" value="{{old('buying_price')}}"/>
                                                </div>
                                            </div>
                                            @if ($errors->has('buying_price'))
                                                <span class="text-danger text-left">{{ $errors->first('buying_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group input-group-solid">
                                                <label class="form-label" for="expected-selling-price">Expected Selling Price:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Ksh </span>
                                                    <input class="form-control" id="expected-selling-price" name="expected_selling_price" type="text" placeholder="4000" readonly value="{{old('expected_selling_price')}}"/>
                                                </div>
                                            </div>
                                            @if ($errors->has('expected_selling_price'))
                                                <span class="text-danger text-left">{{ $errors->first('expected_selling_price') }}</span>
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
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="barcode">Barcode:<span class="font-danger">*</span></label>
                                                <input class="form-control" id="barcode" name="barcode" type="text" data-language="en" placeholder="KL6438753FFSDF" value="{{old('barcode')}}"/>
                                            </div>
                                            @if ($errors->has('barcode'))
                                                <span class="text-danger text-left">{{ $errors->first('barcode') }}</span>
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
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
{{--    <script src="{{ asset('assets/js/datepicker/date-time-picker/moment.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/tempus-dominus.js') }}"></script>--}}
    <script src="{{ asset('assets/js/jQuery-provider.js') }}"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
{{--    <script src="{{ asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js') }}"></script>--}}


    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('assets/js/expected-selling-price-calculator.js')}}"></script>

{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            $('#datetimepicker1').datetimepicker();--}}
{{--        });--}}
{{--    </script>--}}
	@endpush

@endsection
