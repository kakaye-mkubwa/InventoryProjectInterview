@extends('authentication.master')

@section('title')Login
 {{ $title ?? '' }}
@endsection

@push('css')
@endpush

@section('content')
    <section>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/1.jpg') }}" alt="looginpage" /></div>
	            <div class="col-xl-5 p-0">
	                <div class="login-card">
	                    <form class="theme-form login-form needs-validation" method="post" action="{{route('login')}}">
	                        <h4>Login</h4>
	                        <h6>Welcome back! Log in to your account.</h6>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            @include('layouts.partials.messages')
	                        <div class="form-group">
	                            <label>Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i data-feather="user"></i></span>
	                                <input class="form-control" type="email" name="email" required="required" placeholder="johndoe@gmail.com" />
	                            </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i data-feather="lock"></i></span>
	                                <input class="form-control" type="password" name="password" required="required" placeholder="*********" />
	                                <div class="show-hide"><span class="show"> </span></div>
	                            </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
	                        </div>

	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
	                        </div>

	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<script>
	    (function () {
	        "use strict";
	        window.addEventListener(
	            "load",
	            function () {
	                // Fetch all the forms we want to apply custom Bootstrap validation styles to
	                var forms = document.getElementsByClassName("needs-validation");
	                // Loop over them and prevent submission
	                var validation = Array.prototype.filter.call(forms, function (form) {
	                    form.addEventListener(
	                        "submit",
	                        function (event) {
	                            if (form.checkValidity() === false) {
	                                event.preventDefault();
	                                event.stopPropagation();
	                            }
	                            form.classList.add("was-validated");
	                        },
	                        false
	                    );
	                });
	            },
	            false
	        );
	    })();
	</script>


    @push('scripts')
    @endpush

@endsection
