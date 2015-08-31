@extends('layouts.default')
@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.titulo_2') }}</h1></div>
  <div class="contenido">
  	<script>
  	// This is called with the results from from FB.getLoginStatus().
	  function statusChangeCallback(response) {
	    console.log('statusChangeCallback');
	    console.log(response);
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      testAPI();
	    } else if (response.status === 'not_authorized') {
	      // The person is logged into Facebook, but not your app.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into this app.';
	    } else {
	      // The person is not logged into Facebook, so we're not sure if
	      // they are logged into this app or not.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into Facebook.';
	    }
	  }

	  // This function is called when someone finishes with the Login
	  // Button.  See the onlogin handler attached to it in the sample
	  // code below.
	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	  window.fbAsyncInit = function() {
	  FB.init({
	    appId      : '{your-app-id}',
	    cookie     : true,  // enable cookies to allow the server to access 
	                        // the session
	    xfbml      : true,  // parse social plugins on this page
	    version    : 'v2.2' // use version 2.2
	  });

	  // Now that we've initialized the JavaScript SDK, we call 
	  // FB.getLoginStatus().  This function gets the state of the
	  // person visiting this page and can return one of three states to
	  // the callback you provide.  They can be:
	  //
	  // 1. Logged into your app ('connected')
	  // 2. Logged into Facebook, but not your app ('not_authorized')
	  // 3. Not logged into Facebook and can't tell if they are logged into
	  //    your app or not.
	  //
	  // These three cases are handled in the callback function.

	  FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	  });

	  };

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));

	  // Here we run a very simple test of the Graph API after login is
	  // successful.  See statusChangeCallback() for when this call is made.
	  function testAPI() {
	    console.log('Welcome!  Fetching your information.... ');
	    FB.api('/me', function(response) {
	      console.log('Successful login for: ' + response.name);
	      document.getElementById('status').innerHTML =
	        'Thanks for logging in, ' + response.name + '!';
	    });
	  }
	</script>

	<!--
	  Below we include the Login Button social plugin. This button uses
	  the JavaScript SDK to present a graphical Login button that triggers
	  the FB.login() function when clicked.
	-->

	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>

	<div id="status">
	</div>
    <form action="{{ URL::to('iniciar-sesion/autenticar') }}" method="POST">
		@if (Session::has('error'))
		<div class="col-xs-12">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="textoPromedio">{{ Session::get('error') }}</p>
			</div>
		</div>
		<div class="clearfix"></div>
		@elseif(Session::has('success'))
		<div class="col-xs-12">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="textoPromedio">{{ Session::get('success') }}</p>
			</div>
		</div>
		@endif
		<div class="col-xs-12">
			<label for="username" class="textoPromedio">{{ Lang::get('lang.login_username') }}:</label>
			{{ Form::text('username','', array('class'=>'form-control','required' => 'required')) }}
		</div>
		<div class="clearfix"></div>
		<div class="col-xs-12">
			<label for="pass" class="textoPromedio">{{ Lang::get('lang.login_pass') }}</label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<div class="col-xs-12">
			<label for="pass" class="textoPromedio"><a href="#" class="forgot" data-toggle="modal" data-target="#changePass">{{ Lang::get('lang.login_forgot') }}</a></label>
		</div>
		<div class="col-xs-12">
			<label for="remember" class="textoPromedio">{{ Lang::get('lang.login_remember') }}</label>
			<input type="checkbox" name="remember">
		</div>
		<div class="col-xs-12">
			<input type="submit" name="enviar" value="{{ Lang::get('lang.btn_send') }}" class="btn btn-primary">
		</div>

	</form>
	<div class="col-xs-12">
		<button class="fb-get-login" onclick="testAPI()">Loguear</button>
	</div>
	<div class="clearfix"></div>
  </div>
</div>
<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="modalForggo" aria-hidden="true">
	<div class="forgotPass modal-dialog imgLiderUp">
		<div class="modal-content" style="color:black;padding:1em;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<h3>{{ Lang::get('lang.login_getback') }}</h3>
			<div class="modal-footer " style="text-align:center;">
				<div class="alert responseDanger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				</div>
					<p class="textoPromedio">{{ Lang::get('lang.login_text1') }}</p>
					<input class="form-control emailForgot" name="email" placeholder="{{ Lang::get('lang.form_email') }}">
					<button class="btn btn-success envForgot" style="margin-top:2em;">{{ Lang::get('lang.btn_send') }}</button>	
			</div>
		</div>
	</div>
</div>

@stop

@section('postscript')

@stop