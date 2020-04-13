@extends('layout/headerfooter')
@section('title','Detail per User')

@section('panel')

<body>
	<div id="wrapper">

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="content-main">
				<!--banner-->
				<div class="banner">
					<h2>
						<a href="#">Home</a>
						<i class="fa fa-angle-right"></i>
						<span>Detail Person</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">
						<div class="grid_3 grid_4">
							@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
							@endif
							<h3 class="head-top">User Name : {{$data['username']}}</h3>
							@if (Session::get('loggedas') != $data->username)
								@if(Session::get('auth') == 'super_admin')
								<a href="/edituser/<?= $data->username ?>" class="btn btn-primary">Edit User</a>
								@elseif(Session::get('auth') == 'admin' and $data->role == 'student')
								<a href="/edituser/<?= $data->username ?>" class="btn btn-primary">Edit User</a>
								@else
								<button href="/edituser/<?= $data->username ?>" class="btn btn-primary" disabled>Edit User</button>
								@endif
							@endif

							@if(Session::get('auth') == 'admin' and $data->role == 'student')
							<a href="/delete/<?= $data->username ?>" onclick="return confirm('WARNING !!! Are you sure to delete this user ?')" class="btn btn-danger" style="float: right">Delete User</a>
							@elseif(Session::get('auth') == 'super_admin')
							<a href="/delete/<?= $data->username ?>" onclick="return confirm('WARNING !!! Are you sure to delete this user ?')" class="btn btn-danger" style="float: right">Delete User</a>
							@else
							<button href="/delete/<?= $data->username ?>" onclick="return confirm('WARNING !!! Are you sure to delete this user ?')" class="btn btn-danger" style="float: right" disabled>Delete User</button>
							@endif

							<div class="container">
								<div class="row">
									<div class="col-md-8">
										<div calss="container">

											<table class="table table-bordered">
												<thead>
													<tr>
														<th width="30%">Nama</th>
														<th width="70%">{{$data['nama']}}</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															Registration Number
														</td>
														<td>
															{{$data['no_reg']}}
														</td>
													</tr>
													<tr>
											<td>
												Address
											</td>
											<td>
												{{$data['alamat']}}
											</td>
										</tr>
										<tr>
											<td>
												Phone Number
											</td>
											<td>
												{{$data['phone']}}
											</td>
										</tr>
													<tr>
														<td>
															Birth place, date
														</td>
														<td>
															<!-- <span class="badge badge-success">22</span> -->
															{{$data['tempat_lahir']}},
															{{date("d-M-Y", strtotime($data['tanggal_lahir']))}}
														</td>
													</tr>
												</tbody>
											</table>

										</div>
									</div> <!-- tutup tabel -->

									<div class="col-md-4">
										<?php $url = 'images/userpicture/' . $data["foto"]; ?>
										<img src="{{URL::asset($url)}}" height="260dp" width="180dp" class="img-thumbnail">
									</div>
								</div>
							</div>
						</div>

						<div class="grid_3 grid_4">
							<h3 class="head-top">Additional Information</h3>
							<div calss="container">

								<table class="table table-striped">
									<tbody>
										
										<tr>
											<td>
												<b>Belt / Score</b>
											</td>
											<td>
												@if ($data['sabuk_terakhir']=='white')
													'White' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_9')
													'Yellow (Geup 9)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_8')
													'Yellow strip Green (Geup 8)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_7')
													'Green (Geup 7)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_6')
													'Green strip Blue (Geup 6)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_5')
													'Blue (Geup 5)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_4')
													'Blue strip Red (Geup 4)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_3')
													'Red (Geup 3)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_2')
													'Red strip I (Geup 2)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_1')
													'Red strip II (Geup 1)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN1')
													'Black DAN 1' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN2')
													'Black DAN 2' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN3')
													'Black DAN 3' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN4')
													'Black DAN 4' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN5')
													'Black DAN 5' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN6')
													'Black DAN 6' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN7')
													'Black DAN 7' / {{$data['score_ujian']}}
												@else
													'Black DAN 8' / {{$data['score_ujian']}}
												@endif
											</td>
											</tr>
											<tr>
												<td>
													<b>Exam. Place</b>
												</td>
												<td>
													{{$data['tmpt_ujian_terakhir']}}
												</td>
											</tr>
										<tr>
											<td>
												<b>Dojang</b>
											</td>
											<td>
												<b>{{$dojang['nama']}}</b><br>
												{{$dojang['alamat']}}

											</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>

						<div class="grid_3 grid_4">
							<h3 class="head-top">Achievements</h3>
							<div calss="container">

								<table class="table table-bordered">
									<thead class="thead-light">
										<tr>
											<th>ID Achievement</th>
											<th>Event/Tournament</th>
											<th>Date</th>
											<th>Place</th>
											<th>Medal</th>
											<th>Attachment</th>
											<th>Additional info</th>
											@if(Session::get('auth')!='super_admin')
											<th>Action</th>
											@endif
										</tr>
									</thead>
									<tbody>
										@foreach ($achievs as $medal)
										@if($medal['status'] == 'confirmed')

										<tr>
											<td>
												{{$medal['id']}}
											</td>
											<td>
												{{$medal['nama_event']}}
											</td>
											<td>
												{{$medal['tanggal_event']}}
											</td>
											<td>
												{{$medal['tempat_event']}}
											</td>
											<td>
												{{$medal['medali']}}
											</td>
											<td>
												<a href="/getfile/<?= $medal->id ?>">{{$medal['lampiran']}}</a>

											</td>
											<td>
												{{$medal['keterangan']}}
											</td>
											@if(Session::get('auth')=='super_admin')
											<td>
												<a href="/deleteachiev/<?= $medal->id ?>" onclick="return confirm('WARNING !!! Are you sure to delete this achievement ?')" class="badge badge-danger">delete</a>
											</td>
											@endif
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								<br>
							</div>
						</div>
					</div> <!-- tutup grid3 -->
				</div> <!-- tutup typo 1 -->
			</div> <!-- ttup typo grid -->

			<!--//grid-->
			<!---->
		</div>
	</div>
	<div class="clearfix"> </div>

	</div>
	@endsection