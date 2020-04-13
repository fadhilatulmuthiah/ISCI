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
						<span>{{Session::get('form_mode')}}</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">

						<div class="grid_3 grid_4">
							<h3 class="head-top">Form {{Session::get('form_mode')}} user</h3>
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>
										<h6>{{ $error }}</h6>
									</li>
									@endforeach
								</ul>
							</div>
							@endif
							<h4 class="head-top">Achievement Details</h5>

								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div calss="container">
												<form action="/newachiev" method="POST" enctype="multipart/form-data">
													{{ csrf_field() }}
													<input type="hidden" name="username" value="{{Session::get('loggedas')}}">
													<div class="form-group">
														<label for="username">Event / Tournament Name </label>
														<input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Event/Tournament Name" value="{{ old('username') }}">

													</div>
													<div class="form-group">
														<label for="password1">Date </label>
														<input type="date" class="form-control" id="tanggal_event" name="tanggal_event" placeholder="Date Event" value="{{ old('noreg') }}">

													</div>
													<div class="form-group">
														<label for="password2">Place</label>
														<input type="text" class="form-control" id="tempat_event" name="tempat_event" placeholder="Country, Prov. , Address" value="{{ old('noreg') }}">
													</div>
													<div class="form-group">
														<label for="noreg">Medal</label>
														<input type="text" class="form-control" id="medali" name="medali" placeholder="Medal/Ranking" value="{{ old('noreg') }}">
													</div>
													<div class="form-group">
														<label for="foto">Attachment</label>
														<input type="file" class="form-control" id="lampiran" name="lampiran" placeholder="Certificate">
													</div>
													<div class="form-group">
														<label for="tgllahir">Additional info</label>
														<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Additional Informations" value="{{ old('tgllahir') }}">
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div> <!-- tutup tabel -->
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