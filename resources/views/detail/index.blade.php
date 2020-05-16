

@extends('layout.master')
@section('judul', 'Kirim Bukti')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				@if ($errors->any())
					<div class="alert alert-danger">
						<strong>Perhatian</strong>Belum Memasukan photo.<br><br>
						    <ul>
						        @foreach ($errors->all() as $error)
						            <li>{{ $error }}</li>
						        @endforeach
						    </ul>
					</div>
				@endif	
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<p class="panel-subtitle text-center text-success">Kirim Bukti Aktivitas Pada Tanggal <b>{{$date}}</b></p>
									
									</div>
							</div>
								
								
								<div class="panel-body">
									
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>NAMA KEGIATAN</th>	
												<th>TANGGAL</th>
												<th>WAKTU AWAL</th>
												<th>WAKTU AKHIR</th>
												<th>MAPEL</th>
												<th>FILE</th>
												<th>KIRIM</th>
											</tr>
										</thead>
										@foreach($detail as $j)
								
											<form action="/detail/{{$j->id}}/update" method="POST" enctype="multipart/form-data">
											{{csrf_field()}}
											
										<tr>
											
											<td>{{$loop->iteration}}</td>
											<td>{{$j->nama_kegiatan}}</td>
											<td>{{$j->tanggal}}</td>
											<td>{{$j->waktu_mulai}}</td>
											<td>{{$j->waktu_selesai}}</td>
											<td>{{$j->mapel}}</td>
											
											<td><input type="file" name="photo" ><p>Photo Bukti</p></td>
											<td>
												<button type="submit" name="submit" class="{{ ( ! empty($j->photo) ? 'btn btn-success' : 'btn btn-secondary') }}"><i class="{{ ( ! empty($j->photo) ? 'fa fa-check-circle' : '') }}"> </i>{{ ( ! empty($j->photo) ? 'SUMBITED' : 'SUBMIT') }}</button>
												</form>
											</td>
										</tr>
										@endforeach
									</table>
							
							


	


@stop






