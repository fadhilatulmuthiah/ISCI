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
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
						<span>Achievements</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">

						<div class="grid_3 grid_4">
							<h3 class="head-top">Achievement</h3>
							@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
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
															@if ($data['role']!='student')
															<th>Status</th>
															@endif
														</tr>
													</thead>
													<tbody>
														@foreach ($waitinglist as $medal)
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
																{{$medal['lampiran']}}
															</td>
															<td>
																{{$medal['keterangan']}}
															</td>
															@if ($data['role']!='student')
															<td>
																<a href="/konfirmasi/<?= $medal->id ?>" onclick="return confirm('Are you sure to CONFIRM this submission ?')" class="badge badge-success">Confirm</a>
																<a href="/tolak/<?= $medal->id ?>" onclick="return confirm('Are you sure to REJECT this submission ?')" class="badge badge-danger">Reject</a>
															</td>
															@endif
														</tr>
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