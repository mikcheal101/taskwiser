<!DOCTYPE html>
<html >
<head>
	<?=meta ('viewport', 'width=device-width, initial-scale=1.0');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>

	<?=link_tag ("assets/imgs/logo.png", "icon", "image/png");?>
	<?php header("Cache-Control: public, max-age=60, s-maxage=60");?>

	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<?=link_tag ('assets/last_design/tskwsr.css');?>

	<title>taskwiser.com</title>

</head>
<body ng-app="app" >
	<div id="Layer1">
		<div id="Layer1_Container">
			<div id="wb_Image1">
				<a href="<?=base_url('');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/logo.png" id="Image1" alt="">
				</a>
			</div>
			<div id="wb_Shape2">
				<a href="<?=base_url('/#Layer4');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/img0010.png" id="Shape2" alt="">
				</a>
			</div>
			<div id="wb_Text23">
				<span style="color:#4169E1;font-family:'Microsoft JhengHei';font-size:13px;"> book a task now</span>
			</div>
			<div id="wb_Text24">
				<span style="color:#000000;font-family:Arial;font-size:15px;">
					<a href="<?=base_url('/auth/login');?>"> Sign in</a>
				</span>
			</div>
		</div>
	</div>
