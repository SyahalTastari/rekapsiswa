<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">							
								<p class="lead">Login Dulu</p>
							</div>
							@if ($message = Session::get('danger'))
        					<div class="alert alert-danger">
            				<p>{{ $message }}</p>
        					</div>
    						@endif
							@if ($errors->any())
								<div class="alert alert-danger">
									<p>Datanya isi yahh</p>
									    <ul>
									        @foreach ($errors->all() as $error)
									            <li>{{ $error }} Belum ke isi nih </li>
									        @endforeach
									    </ul>
								</div>
							@endif
							<form class="form-auth-small" action="/postlogin" method="POST">
								{{csrf_field()}}
								<div class="form-group">
									<label for="signin-username" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="signin-username" name="username" placeholder="Username" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
								</div>
								
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<a href="/register">klik ini kalau kamu belum punya akun</a>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
