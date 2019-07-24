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
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<!-- <img src="<?=base_url()?>assets/dist/img/library-icon.png" style="margin-top:-75px;width:175px;height:175px;" class="img-rounded" alt="library">
			<br> -->
			<b>Resto</b>Poi
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Silahkan login terlebih dahulu</p>
			<form action="#" id="frmlogin" method="POST" onsubmit="return login();">
				<div class="form-group has-feedback">
					<input name="username" type="text" class="form-control" placeholder="Username" oninput="counter()" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<div id="al1" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Panjang username minimal 5</p>
					</div>
				</div>
				<div class="form-group has-feedback">
					<input name="password" type="password" class="form-control" placeholder="Password" oninput="counter()" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<div id="al2" class="alert alert-danger alert-dismissible hidden" style="margin-top: 5px;">
						<p><i class="icon fa fa-ban"></i>Panjang password minimal 5</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8 pull-left">
						<!-- <a href="registrasi.html" class="text-center">Belum punya akun? Daftar disini!</a> -->
					</div>
					<div class="col-xs-4 pull-right">
						<button type="submit" class="btn btn-primary btn-block btn-flat" id="btn_login" disabled>Login</button>
					</div>
				</div>
			</form>
			<br>
		</div>
	</div>
	<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		function counter() {
			var a = $('input[name="username"]').val().length;
			if(a<5 && a != ""){
				$('#al1').removeClass('hidden');
			}
			else{
				$('#al1').addClass('hidden');
			}

			var b = $('input[name="password"]').val().length;
			if(b<5 && b != ""){
				$('#al2').removeClass('hidden');
			}
			else{
				$('#al2').addClass('hidden');
			}

			if(a>=5&&b>=5){
				$('#btn_login').prop('disabled', false);
			}
			else{
				$('#btn_login').prop('disabled', true);
			}
		}

		function login() {
			$('#btn_login').html("Proses");
			$('#btn_login').prop('disabled', true);
			$.ajax({
				type : "POST",
				url : "<?=base_url()?>lv/",
				data: $("#frmlogin").serialize(),
				dataType: "json",
				success: function (resp) {
					if (resp == "1") {
						window.location.href = '<?=base_url()?>pengguna.html/';
					} 
					else if(resp == "2"){
						window.location.href = '<?=base_url()?>login/nomor_meja/';
					}
					else {
						swal({
							title: 'Gagal',
							text: 'Username Dan Password Salah',
							icon: 'warning',
						});
						$('#btn_login').html("Login");
						$('#btn_login').prop('disabled', false);
					}
				},
				error: function (resp) {
					alert('error')
					$('#btn_login').prop('disabled', false);
					$('#btn_login').html("Login");
				}
			})
			return false;
		}
	</script>

</body>
</html>
