<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$root = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
?><!DOCTYPE html>
<html class="no-js" lang="en">

	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <link rel="shortcut icon" href="<?php echo $root; ?>assets/images/favicon.png">
	  <title>404 Page Not Found</title>
	  
	  <link href="<?php echo $root; ?>assets/css/app.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="app">
			<div class="container-fluid">
				<div class="d-flex full-height p-v-20 flex-column justify-content-between">
					<div class="d-none d-md-flex p-h-40">
						<img src="<?php echo $root; ?>assets/images/logo/logo.png" alt="">
					</div>
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="p-v-30">
									<h1 class="font-weight-semibold display-1 text-primary lh-1-2">404</h1>
									<h2 class="font-weight-light font-size-30">Whoops! Looks like you got lost</h2>
									<p class="lead m-b-30">We couldnt find what you were looking for.</p>
									<a href="<?php echo $root; ?>dashboard" class="btn btn-primary btn-tone">Go Back</a>
								</div>
							</div>
							<div class="col-md-6 m-l-auto">
								<img class="img-fluid" src="<?php echo $root; ?>assets/images/others/error-1.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?php echo $root; ?>assets/js/vendors.min.js"></script>
		<script src="<?php echo $root; ?>assets/js/app.min.js"></script>
	</body>
</html>