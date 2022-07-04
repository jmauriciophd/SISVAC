<html>
<head>
	<title>💧 Sistema de Vacinas💧</title>
	<!--Custom styles-->
	<!--Bootsrap 4 CDN-->
	<head>
		<title>💧 Sistema de Vacinas do STJ 💧</title>
		<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
		<link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.css">
		<script src="<?= BASE_URL ?>/js/scripts.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!--Fontawesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
<body style="background-image: url('<?= BASE_URL ?>/css/bg.jpeg')">
	<div class="">
		<div class="d-flex justify-content-center h-10 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="logo-bg">
						<img src="<?= BASE_URL ?>/css/sivac_logo.png" alt="Logo do sistema">
					</div>
					<span>
						<?php if (!empty($msg)) { ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $msg; ?>
							</div>
						<?php } ?>
					</span>
					<form method="post" action="">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control " id="valorCampologin" name="NICK" placeholder="NICK">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" name="PASSWORD" placeholder="SENHA">
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn btn-primary float-right login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>