<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RestoPoi</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.css">
</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<img src="<?=base_url()?>assets/dist/img/register-icon.png" style="margin-top:-75px;width:175px;height:175px;" class="img-rounded" alt="library">
			<br>
			<a href="#"><b>Resto</b>Poi</a>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">Registrasi member baru</p>

			<form action="#" id="frmregistrasi" method="POST" onsubmit="return registrasi()">
				<div class="form-group has-feedback">
					<select class="form-control" name="level" id="level" onchange="counter()" required>
						<option value="0"><-- Pilih Level --></option>
						<?php 
							foreach ($baris as $row) {
								if($row->nama_level == "Administrator" || $row->nama_level == "Pelanggan"){
									continue;
								}
								echo "<option value='$row->id_level'>$row->nama_level</option>";
							}
						?>
					</select>
					<div id="al4" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Pilih level dahulu</p>
					</div>
				</div>
				<div class="form-group has-feedback">
					<input name="nama_user" type="text" class="form-control" placeholder="Nama" oninput="counter()">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<div id="al5" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Panjang Nama minimal 5</p>
					</div>
				</div>
				<div class="form-group has-feedback">
					<input name="username" type="text" class="form-control" placeholder="Username" oninput="counter()">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<div id="al1" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Panjang username minimal 5</p>
					</div>
				</div>
				<div class="form-group has-feedback">
					<input name="password" type="password" class="form-control" placeholder="Password" oninput="counter()">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<div id="al2" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Panjang password minimal 5</p>
					</div>
				</div>
				<div class="form-group has-feedback">
					<input name="repassword" type="password" class="form-control" placeholder="Ulangi Password" oninput="veriv()">
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
					<div id="al3" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Password tidak sama</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<a href="<?=base_url()?>login.html" class="text-center">Sudah punya akun</a>
					</div>
					<div class="col-xs-4">
						<button id="btn_regis" type="submit" class="btn btn-success btn-block btn-flat" disabled>Registrasi</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		var cek = 0;
		function counter() {
			var a = $('input[name="username"]').val().length;
			var u = $('input[name="nama_user"]').val().length;
			if(a<5 && a != ""){
				$('#al1').removeClass('hidden');
			}
			else{
				$('#al1').addClass('hidden');
			}

			if(u<5 && u != ""){
				$('#al5').removeClass('hidden');
			}
			else{
				$('#al5').addClass('hidden');
			}

			var b = $('input[name="password"]').val().length;
			var c = $('input[name="repassword"]').val();
			var d = $('input[name="password"]').val();
			if(c==d){
				$('#al3').addClass('hidden');
			}
			else{
				if(c!=""){
					$('#al3').removeClass('hidden');
				}
			}
			if(b<5 && b != ""){
				$('#al2').removeClass('hidden');
			}
			else{
				$('#al2').addClass('hidden');
			}
			var s = $("#level").val();
			if(s==0){
				$('#al4').removeClass('hidden');
			}
			else{
				$('#al4').addClass('hidden');
			}

			if(a>=5&&b>=5&&cek==1&&d==c&&s!=0){
				$('#btn_regis').prop('disabled', false);
			}
			else{
				$('#btn_regis').prop('disabled', true);
			}
		}

		function veriv() {
			var c = $('input[name="repassword"]').val();
			var d = $('input[name="password"]').val();
			if(c==d){
				cek = 1;
				$('#al3').addClass('hidden');
			}
			else{
				cek = 0;
				$('#al3').removeClass('hidden');
			}

			var a = $('input[name="username"]').val().length;
			if(a>=5&&cek==1){
				$('#btn_regis').prop('disabled', false);
			}
			else{
				$('#btn_regis').prop('disabled', true);
			}
		}
		function registrasi() {
			$('#btn_login').html("Proses");
			$('#btn_login').prop('disabled', true);
			$.ajax({
				type : "POST",
				url : "<?=base_url()?>av/",
				data: $("#frmregistrasi").serialize(),
				dataType: "json",
				success: function (resp) {
					if (resp == "duplicate") {
						swal({
							title: 'Gagal',
							text: 'Username Sudah Dipakai!',
							icon: 'warning',
						})
					} else {
						window.location.href = '<?=base_url()?>login.html';
					}
				},
				error: function (resp) {
					alert('error')
				}
			})
			return false;
		}
	</script>
</body>
</html>
