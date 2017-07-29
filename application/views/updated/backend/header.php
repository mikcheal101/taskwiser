<!DOCTYPE html>
<html >
<head>
	<?=meta ('viewport', 'width=device-width, initial-scale=1');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>

	<?=link_tag ("assets/imgs/logo.png", "icon", "image/png");?>

	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<?=link_tag ('assets/last_design/final.css');?>
	<?php header("Cache-Control: public, max-age=60, s-maxage=60");?>

	<title><?=$title;?></title>

</head>
<body ng-app="app">
	<div id="Layer1" style="position:relative;text-align:left;margin:0px 0px 0px 0px;width:100%;height:68px;float:left;clear:left;display:block;z-index:50;">
		<div id="wb_Image1" style="position:absolute;left:86px;top:7px;width:151px;height:54px;z-index:0;">
			<a href="<?=base_url('/');?>"><img src="<?=base_url('assets/last_design/images/');?>logo.png" id="Image1" alt=""></a>
		</div>
	</div>

	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:798px;float:left;clear:left;display:block;z-index:29;">
		<div id="Layer2_Container" style="width:1278px;height:798px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
