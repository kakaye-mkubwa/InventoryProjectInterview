@extends('layouts.admin.master')

@section('title', 'List Sales')

@push('components.breadcrumb')
{{--    <li class="breadcrumb-item">View</li>--}}
{{--    <li class="breadcrumb-item active">List Products</li>--}}
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vector-map.css')}}">
@endpush
@section('content')
{{--    @yield('breadcrumb-list')--}}
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Sales</h3>
        @endslot
{{--        <li class="breadcrumb-item">Home</li>--}}
        <li class="breadcrumb-item">List Sales</li>
    @endcomponent
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default-sec">
        <div class="row">
            <div class="col-xl-12 recent-order-sec">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5>All Sales</h5>
                            <table class="table table-bordernone">
                                <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Vat</th>
                                    <th>Sold By</th>
                                    <th>Date</th>
                                    <th>
{{--                                        <div class="setting-list">--}}
{{--                                            <ul class="list-unstyled setting-option">--}}
{{--                                                <li>--}}
{{--                                                    <div class="setting-primary"><i class="icon-settings">                                      </i></div>--}}
{{--                                                </li>--}}
{{--                                                <li><i class="view-html fa fa-code font-primary"></i></li>--}}
{{--                                                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>--}}
{{--                                                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>--}}
{{--                                                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>--}}
{{--                                                <li><i class="icofont icofont-error close-card font-primary"></i></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <a href="#">
                                                        <span>{{substr($sale->barCode,0,30)}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{$sale->productName}}</p>
                                        </td>
                                        <td>
                                            <p>{{$sale->quantity}}</p>
                                        </td>
                                        <td>
                                            <p>{{$sale->sellingPrice}}</p>
                                        </td>
                                        <td>
                                            <p>{{$sale->vat}}</p>
                                        </td>
                                        <td>
                                            <p>{{$sale->name}}</p>
                                        </td>
                                        <td>
                                            <p>{{\App\Http\Controllers\ListProductsController::formatDate($sale->updated_at)}}</p>
                                        </td>

                                    </tr>
                                @endforeach
                                {{$sales->links()}}
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{$sales->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    @push('scripts')
        <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
        <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
        <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
        <script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
        <script src="{{asset('assets/js/dashboard/default.js')}}"></script>
        <script src="{{asset('assets/js/notify/index.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    @endpush
@endsection
