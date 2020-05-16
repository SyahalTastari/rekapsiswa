

@extends('layout.master')
@section('judul', 'Lihat Kegiatan')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel panel-headline">
								<div class="panel-heading">
									
									<p class="panel-subtitle text-center text-success">Jadwal Anda Pada Tanggal <?php $value = null ?>@foreach($lihat as $data)@if ($value != $data->tanggal) <b>{{$data->tanggal}}</b><?php $value = $data->tanggal ?> @endif @endforeach</p>
									
									</div>
							</div>
								
									
								<div class="panel-body">
									
									
									  
									  <table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>NAMA KEGIATAN</th>
												<th>TANGGAL</th>
												<th>WAKTU MULAI</th>
												<th>WAKTU SELESAI</th>
												<th>MAPEL</th>
												<th>PHOTO</th>
												<th>WAKTU BUKTI DIKIRIM</th>
												<th>STATUS</th>
												
											</tr>
										</thead>
										<tbody>
										 @foreach($lihat as $data)
											<tr>												
												<td>{{$loop->iteration}}</td>												
												<td>{{$data->nama_kegiatan }}</td>												
												<td>{{$data->tanggal}}</td>
												<td>{{$data->waktu_mulai}}</td>
												<td>{{$data->waktu_selesai}}</td>
												<td>{{$data->mapel}}</td>
												
												<td>
												@if (!empty($data->photo))
                                                    <img src="{{ asset('uploads/' . $data->photo) }}" 
                                                         width="50px" height="50px">
                                                @else
                                                    <img src="http://via.placeholder.com/50x50">
                                                @endif
												</td>
                                               	<td>
                                               		@if(!empty($data->photo))
                                               		{{$data->updated_at}}
                                               		@else
                                               		Bukti Belum Dikirim
                                               		@endif

                                               	</td>
                                               	@if($data->status == 'merah')
                                                <td>
                                                	<div class="alert alert-danger alert-dismissible" role="alert">
													<i class="fa fa-times-circle"></i> Belum Mengirim Bukti
													</div>
												</td>
												@endif
												@if($data->status == 'kuning')
												<td>
													<div class="alert alert-warning alert-dismissible" role="alert">
													<i class="fa fa-warning"></i>Orang Tua Segera Validasi 
													</div>
												</td>
												@endif
												@if($data->status == 'hijau')
												<td>
													<div class="alert alert-success alert-dismissible" role="alert">
													<i class="fa fa-check-circle"></i> Kamu Sudah Melakukan Kegiatan
													</div>
												</td>
												@endif
											</tr>
										</tbody>
										@endforeach
									</table>
									  
									  
										</td>
									</form>
								</div>
									
									
							
							


	


@stop






