<!DOCTYPE html>
<html lang="en">
<head>
	<title>GEETANJALI DEVELOPERS</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<!--<meta name="description" content="Phoenixcoded">
	<meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">-->

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>material/assets/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url();?>material/assets/images/favicon.ico" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>material/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/icon/icofont/css/icofont.css">

	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/css/bootstrap.min.css">

	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/plugins/waves/css/waves.min.css">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/css/main.css">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/css/responsive.css">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/css/color/color-1.css" id="color"/>

</head>
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
                
					<form class="md-float-material" action="<?php echo base_url();?>user/login" method="post">
                    <input type="hidden" name="mode" value="login">
						<div class="text-center">
							<!--<img src="<?php echo base_url();?>material/assets/images/logo-blue.png">-->
                            <span style="color:#000;font-size: 26px;">GEETANJALI DEVELOPERS</span>
						</div>
						<h3 class="text-center txt-primary">
							Sign In to your account
						</h3>
                        <?php if($this->session->userdata('success_message')) { ?>
                        <span style="color:#090;"><?php echo $this->session->userdata('success_message'); ?></span>
                        <?php } ?>
                        <?php if($this->session->userdata('error_message')) { ?>
                        <span style="color:#F00;"><?php echo $this->session->userdata('error_message'); ?></span>
                        <?php } ?>
						<div class="md-input-wrapper">
							<input type="text" name="username" class="md-form-control" />
							<label>Username</label>
						</div>
						<div class="md-input-wrapper">
							<input type="password" name="password" class="md-form-control" />
							<label>Password</label>
						</div>
						<!--<div class="row">
							<div class="col-sm-6 col-xs-12">
							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
								<label class="input-checkbox checkbox-primary">
									<input type="checkbox" id="checkbox">
									<span class="checkbox"></span>
								</label>
								<div class="captions">Remember Me</div>

							</div>
								</div>
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="forgot-password.html" class="text-right f-w-600"> Forget Password?</a>
								</div>
						</div>-->
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>


<!-- Required Jqurey -->
<script src="<?php echo base_url();?>material/assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>material/assets/js/jquery-ui.min.js"></script>
<!-- tether.js -->
<script src="<?php echo base_url();?>material/assets/js/tether.min.js"></script>
<!-- waves effects.js -->
<!--<script src="<?php echo base_url();?>material/assets/plugins/waves/js/waves.min.js"></script>-->
<!-- Required Framework -->
<script src="<?php echo base_url();?>material/assets/js/bootstrap.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo base_url();?>material/assets/pages/elements.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>material/assets/js/common-pages.js"></script>


</body>
</html>