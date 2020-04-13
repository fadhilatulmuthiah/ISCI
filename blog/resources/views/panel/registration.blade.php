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
						<span>{{Session::get('form_mode')}}</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">

						<div class="grid_3 grid_4">
							<h3 class="head-top">{{Session::get('form_mode')}} form</h3>
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

							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div calss="container">
											<h4 class="head-top">Account info</h4><br>
											@if(Session::get('form_mode')=='edit')
											<form action="/submit_edit" method="POST" enctype="multipart/form-data">
												@else
												<form action="/newuser" method="POST" enctype="multipart/form-data">
													@endif
													{{ csrf_field() }}
													<div class="form-group">
														<label for="username">Username <sub>
																<font color='blue'>*Login requirement</font>
															</sub> </label>
														@if(Session::get('form_mode')=='edit')
														<input type="hidden" class="form-control" id="username" name="username" value="{{ $selecteduser->username }}">
														<input type="text" class="form-control" id="username" name="new_username" placeholder="min 5 karakter" value="{{ $selecteduser->username }}">
														@else
														<input type="text" class="form-control" id="username" name="username" placeholder="min 5 karakter" value="{{ old('username') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="password">Password <sub>
																<font color='blue'>*Login requirement</font>
															</sub></label>

														@if(Session::get('form_mode')=='edit')
														<br>
															@if(Session::get('auth')!='super_admin' and $selecteduser->username != Session::get('loggedas'))
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPassword" disabled>
															@else
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPassword">
															@endif
															Change only Password
														</button>
														@else
														<input type="password" class="form-control" id="password" name="password" placeholder="Password">
													</div>
													<div class="form-group">
														<label for="confirmation_password">Password Confirmation<sub>
																<font color='blue'>*please re-type your password</font>
															</sub></label>
														<input type="password" class="form-control" id="confirmation_password" name="confirmation_password" placeholder="Konfirmasi Password">
														@endif
													</div>

													<br>
													<div class="dropdown-divider"></div>
													<br>

													<h4 class="head-top">User info</h4><br>
													<div class="form-group">
														<label for="noreg">No. Registrasi</label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="noreg" name="noreg" placeholder="No. registrasi" value="{{ $selecteduser->no_reg }}">
														@else
														<input type="text" class="form-control" id="noreg" name="noreg" placeholder="No. registrasi" value="{{ old('noreg') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="nama">Nama</label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Panjang" value="{{ $selecteduser->nama }}">
														@else
														<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Panjang" value="{{ old('nama') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="tgllahir">Tanggal Lahir</label>
														@if(Session::get('form_mode')=='edit')
														<input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" value="{{ $selecteduser->tanggal_lahir }}">
														@else
														<input type="date" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" value="{{ old('tgllahir') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="tmplahir">Tempat Lahir</label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="tmplahir" name="tmplahir" placeholder="Tempat Lahir" value="{{ $selecteduser->tempat_lahir }}">
														@else
														<input type="text" class="form-control" id="tmplahir" name="tmplahir" placeholder="Tempat Lahir" value="{{ old('tmplahir') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="alamat">Alamat</label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="{{ $selecteduser->alamat }}">
														@else
														<input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="{{ old('alamat') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="alamat">Phone Number</label>
														@if(Session::get('form_mode')=='edit')
														<input type="number" class="form-control" min="0" id="notlp" name="notlp" placeholder="Phone Number" value="{{ $selecteduser->phone }}">
														@else
														<input type="number" class="form-control" min="0" id="notlp" name="notlp" placeholder="Phone Number" value="{{ old('notlp') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="dojang">Dojang</label>
														<select class="form-control" id="dojang" name="dojang">
															@if(Session::get('form_mode')=='edit')
															<option value="{{ $selecteduser->id_dojang }}" selected>(current Dojang ID) {{ $selecteduser->id_dojang }}</option>
															@foreach ($dojang as $dojang)
															<option value={{$dojang['id']}}>( {{$dojang['id']}} ) {{$dojang['nama']}}</option>
															@endforeach
														</select>
														@else
														@foreach ($dojang as $dojang)
														<option value={{$dojang['id']}}>( {{$dojang['id']}} ) {{$dojang['nama']}}</option>
														@endforeach
														</select>
														@endif
													</div>
													<div class="form-group">
														<label for="role">User Role</label>
														<select class="form-control" id="role" name="role">
															@if(Session::get('form_mode')=='edit')
															<option value="{{ $selecteduser->role }}" selected>(current Role) {{ $selecteduser->role }}</option>
															<option value="student">Student</option>
															@if (Session::get('auth')=='super_admin')
															<option value="admin">Pengajar/Admin</option>
															<option value="super_admin">Super Admin</option>
															@endif
														</select>
														@else
														<option value="student">Student</option>
														<option value="admin">Pengajar/Admin</option>
														@if (Session::get('auth')=='super_admin')
														<option value="super_admin">Super Admin</option>
														@endif
														</select>
														@endif
													</div>
													<div class="form-group">
														<label for="foto">Foto Diri</label>
														@if(Session::get('form_mode')=='edit')
														<br>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfpic">
															Change only Profile Picture
														</button>
														@else
														<input type="file" class="form-control" id="foto" name="foto" placeholder="Upload Foto">
														@endif
													</div>
													<div class="form-group">
														<label for="sabuk">Sabuk</label>
														<select class="form-control" id="sabuk" name="sabuk" onChange="checkOption(this)">
															@if(Session::get('form_mode')=='edit')	
															<option value="{{ $selecteduser->sabuk_terakhir }}">(Current Belt) {{ $selecteduser->sabuk_terakhir }}</option>
															@endif
															<option value="" selected>---</option>
															<option value="white">White</option>
															<option value="geup_9">Yellow (Geup 9)</option>
															<option value="geup_8">Yellow strip Green (Geup 8)</option>
															<option value="geup_7">Green (Geup 7)</option>
															<option value="geup_6">Green strip Blue (Geup 6)</option>
															<option value="geup_5">Blue (Geup 5)</option>
															<option value="geup_4">Blue strip Red (Geup 4)</option>
															<option value="geup_3">Red (Geup 3)</option>
															<option value="geup_2">Red strip I (Geup 2)</option>
															<option value="geup_1">Red strip II (Geup 1)</option>
															<option value="DAN1">Black DAN 1</option>
															<option value="DAN2">Black DAN 2</option>
															<option value="DAN3">Black DAN 3</option>
															<option value="DAN4">Black DAN 4</option>
															<option value="DAN5">Black DAN 5</option>
															<option value="DAN6">Black DAN 6</option>
															<option value="DAN7">Black DAN 7</option>
															<option value="DAN8">Black DAN 8</option>
														</select>
													</div>

													<br>
													<div class="dropdown-divider"></div>
													<br>

													<!-- <fieldset id="exam_form"> -->
														<h4 class="head-top">Examination Detail <sub>
																<font color='blue'>*left this forms empty for white belt</font>
															</sub></h4><br>
														<div class="form-group">
															<label for="tglujian">Last Exam. Date<sub>
																	<font color='blue'>*left this forms empty for white belt</font>
																</sub></label>

															@if(Session::get('form_mode')=='edit')
															<input type="date" class="form-control" id="tglujian" name="tglujian" placeholder="Exam Date" value="{{ $selecteduser->ujian_terakhir }}" disabled>
															@else
															<input type="date" class="form-control" id="tglujian" name="tglujian" placeholder="Exam Date" value="{{ old('tglujian') }}" disabled>
															@endif
														</div>
														<div class="form-group">
															<label for="tmptujian">Last Exam. Place<sub>
																	<font color='blue'>*left this forms empty for white belt</font>
																</sub></label>
															@if(Session::get('form_mode')=='edit')
															<input type="text" class="form-control" id="tmptujian" name="tmptujian" placeholder="Country, City, Address" value="{{ $selecteduser->tmpt_ujian_terakhir }}" disabled>
															@else
															<input type="text" class="form-control" id="tmptujian" name="tmptujian" placeholder="Country, City, Address" value="{{ old('tmptujian') }}" disabled>
															@endif
														</div>
														<div class="form-group">
															<label for="score">Exam Score</label>
															@if(Session::get('form_mode')=='edit')
															<input type="number" step="0.01" class="form-control" id="score" name="score" min=0 max=10 placeholder="Exam Score" value="{{ $selecteduser->score_ujian }}" disabled>
															@else
															<input type="number" step="0.01" class="form-control" id="score" name="score" min=0 max=10 placeholder="Exam Score 1" value="{{ old('score') }}" disabled>
															@endif
														</div>
													<!-- </fieldset> -->

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

	<script type="text/javascript">
		function checkOption(obj) {
			// var examForms = document.querySelectorAll('.exam_form');
			var examForms = document.querySelectorAll('[name="tglujian"], [name="tmptujian"], [name="score"]');

			for (var i = 0; i < examForms.length; i++) {
				examForms[i].disabled = !(obj.value != "white");
			}
		}
	</script>
@if(Session::get('form_mode')=='edit')
	<!-- Modal 1-->
<div class="modal fade" id="editProfpic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Your Profile Picture (<5MB)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="/submit_pic" method="POST" enctype="multipart/form-data">
	  {{ csrf_field() }}
	  <input type="hidden" name="username" value="{{ $selecteduser->username }}">
	  <input type="file" class="form-control" id="foto" name="foto" placeholder="Upload Foto">
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
	  </form>
    </div>
  </div>
</div>

	<!-- Modal 2-->
<div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="/submit_edit_pass" method="POST" enctype="multipart/form-data">
		  {{ csrf_field() }}
			<input type="hidden" name="username" value="{{ $selecteduser->username }}">
			<div class="form-group">
				<label for="old_password">Old Password
				<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Please input your old password">
			</div>
			<div class="form-group">
				<label for="new_password">New Password
				<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Please input your new password">
			</div>
			<div class="form-group">
				<label for="confirmation_new_password">Confirm New Password
				<input type="password" class="form-control" id="confirmation_new_password" name="confirmation_new_password" placeholder="Re-type your new password">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
			</form>
			@if(Session::get('auth')=='super_admin')
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forcePassword">
				Force change
			</button>
			@endif
	  
    </div>
  </div>
</div>
</div>

<!-- Modal 3-->
<div class="modal fade" id="forcePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit password as Super Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="/submit_force_pass" method="POST" enctype="multipart/form-data">
	  {{ csrf_field() }}
		<input type="hidden" name="username" value="{{ $selecteduser->username }}">
		<input type="hidden" name="username" value="{{ $selecteduser->username }}">
			<div class="form-group">
				<label for="new_password">New Password
				<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Please input your new password">
			</div>
			<div class="form-group">
				<label for="confirmation_new_password">Confirm New Password
				<input type="password" class="form-control" id="confirmation_new_password" name="confirmation_new_password" placeholder="Re-type your new password">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
	  </form>
    </div>
  </div>
</div>
</div>
@endif

	@endsection