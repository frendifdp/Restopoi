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
			<p class="login-box-msg">Silahkan masukkan nomor meja</p>
			<form action="<?=base_url()?>login/set_meja/" method="POST">
				<div class="form-group has-feedback">
					<select class="form-control" name="no_meja">
						<option><-- Nomor Meja --></option>
						<?php foreach($baris as $row){?>
						<option value="<?=$row->id_meja?>"><?=$row->no_meja?></option>
						<?php } ?>
					</select>
				</div>
				<div class="row">
					<div class="col-xs-4 pull-right">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Pilih</button>
					</div>
				</div>
			</form>
			<br>
		</div>
	</div>
	<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
