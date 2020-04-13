@extends('layout/headerfooter')
@section('title','Taekwondo Bulungan ISCI')

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
						<span>Achievements</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">

						<div class="grid_3 grid_4">
							<h3 class="head-top">User Achievements</h3>
							@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
							@endif

							<a href="/addachiev" class="btn btn-light">Submit New Achievement</a>
							@if ($data['role']!='student')
							<a href="/waitinglist" class="btn btn-light" style="float: right">Waiting for confirmation</a>
							@endif
							<div class="tab-content" id="nav-tabContent">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div calss="container">

												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
														<th>ID Achievement</th>
															<th>Event / Tournament</th>
															<th>Date</th>
															<th>Place</th>
															<th>Medal</th>
															<th>Attachment</th>
															<th>Additional info</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($achievements as $medal)
														@if($medal['status'] != 'waiting')

														<tr>
															@if($medal['status']=='rejected')
														<tr class="table-danger">
															@endif
															<td>
																<h6>
																	{{$medal['id']}}
																	@if($medal['status']=='rejected')
																	<font color='red'>(submission RECJECTED)</font>
																	@endif
																</h6>
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
															<td>
																<a href="/deleteachiev/<?= $medal->id ?>" onclick="return confirm('WARNING !!! Are you sure to delete this achievement ?')" class="badge badge-danger">delete</a>
															</td>
														</tr>

														@endif
														@endforeach
													</tbody>
												</table>

											</div>
										</div> <!-- tutup tabel -->
									</div>
								</div>
							</div>
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