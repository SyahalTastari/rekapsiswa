@extends('layout.master')
@section('judul', 'Ganti Password')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">

								<div class="panel-heading">
									<h3 class="panel-title">Ganti Password</h3>
									<div class="right">
									</div>
								</div>
								<div class="panel-body">
									<form action="/profile/{{auth()->user()->id}}/reset" method="post">
										{{csrf_field()}}

									<div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
									<label>Password</label>
									<input type="text" class="form-control" placeholder="Masukan Password baru" name="password" autofocus="true">
									@if($errors->has('password'))
										<span class="help-block">{{$errors->first('password')}}</span>
									@endif
									</div>

									<div class="form-group {{$errors->has('cpassword') ? 'has-error' : ''}}">
									<label>Confirm Password</label>
									<input type="text" class="form-control" placeholder="Confirm Password" name="cpassword">
									@if($errors->has('cpassword'))
										<span class="help-block">{{$errors->first('cpassword')}}</span>
									@endif
									</div>
									
								</div>
								<button type="submit" class="btn btn-warning btn-block">Ganti</button>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop




