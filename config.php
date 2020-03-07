<?php

	$con = mysqli_connect ("localhost", "root", "", "icsi");

	if (isset($_POST["butoncreate"])) {
		$nama=htmlspecialchars($_POST["naame"]);
		$noreg=htmlspecialchars($_POST["regg"]);
		$pasw=htmlspecialchars($_POST["pass"]);
		$nohp=htmlspecialchars($_POST["hape"]);
		$rumah=htmlspecialchars($_POST["home"]);
		$tgl=htmlspecialchars($_POST["tgl"]);
		$tptlhr=htmlspecialchars($_POST["tptlhr"]);
		$stat=htmlspecialchars($_POST["status"]);
		$unit=htmlspecialchars($_POST["unit"]);
		$foto=htmlspecialchars($_POST["foto"]);

		$newusr="INSERT INTO user VALUES ('$noreg', '$nama', '$tgl', '$tptlhr', '', '$stat', '$unit', '$foto', '$nohp', '$rumah', '$pasw')";
		mysqli_query($con,$newusr);

		echo "<script> alert('Silahkan Sign In'); document.location.href = 'index.html' </script>";
	
	}

	if (isset($_POST["masuk"])) {
		$email=htmlspecialchars($_POST["regg"]);
	 	$pasw=htmlspecialchars($_POST["pass"]);

	 	$login="SELECT user.Password as password FROM user WHERE user.email = '$email'";
	 	$result=mysqli_query($con,$login);
	 	$passfromdb=mysqli_fetch_object($result);

	 	if ($pasw == $passfromdb->password) {
	 		echo "<script> document.location.href = 'index2.html' </script>";
	 	}
		
		else {
			echo "<script> alert('Email atau Password Anda SALAH'); document.location.href = 'signin.html' </script>";
		}
		
	}

	function queri($queri) {
		global $con;
		$result = mysqli_query($con, $queri);
		$wadah = [];
		while ($isi = mysqli_fetch_assoc($result)) {
			$wadah[] = $isi;
		}
		return $wadah;
	}
	
?>
