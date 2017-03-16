<!DOCTYPE html>
<html >
<head>
	<?=meta ('viewport', 'width=device-width, initial-scale=1');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>
	
	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<?=link_tag ('assets/last_design/final.css');?>
	
	
	<title>taskwiser.com</title>
	
</head>
<body ng-app="app">
	<div id="Layer1" style="position:relative;text-align:left;margin:0px 0px 0px 0px;width:100%;height:68px;float:left;clear:left;display:block;z-index:50;">
		<div id="wb_Image1" style="position:absolute;left:86px;top:7px;width:151px;height:54px;z-index:0;">
			<a href="<?=base_url('/');?>"><img src="<?=base_url('assets/last_design/images/');?>logo.png" id="Image1" alt=""></a>
		</div>

		<div id="wb_Shape2" style="position:absolute;left:1071px;top:13px;width:167px;height:38px;z-index:1;">
			<a href="<?=base_url('/#Layer4');?>">
				<img src="<?=base_url('assets/last_design/images/img0005.png');?>" id="Shape2" alt="" 
				style="width:167px;height:38px;">
			</a>
		</div>
		<div id="wb_Text23" style="position:absolute;left:1101px;top:24px;width:114px;height:17px;z-index:2;text-align:left;">
			<a href="<?=base_url('/#Layer4');?>" style="color:#4169E1;font-family:'Microsoft JhengHei';font-size:13px;"> 
				book a task now
			</a>
		</div>
		<div id="wb_Text24" style="position:absolute;left:978px;top:24px;width:60px;height:17px;z-index:3;text-align:left;">
			<span style="color:#000000;font-family:Arial;font-size:15px;">
				<a href="<?=base_url('auth/login');?>"> Sign in</a>
			</span>
		</div>
		<select name=" date and year" size="1" id="Combobox1" style="position:absolute;left:586px;top:20px;width:107px;height:35px;z-index:4;">
			<option>lagos</option>
			<option>abuja</option>
			<option>portharcourt</option>
			<option>Enugu</option>
		</select>
		<div id="wb_Text25" style="position:absolute;left:426px;top:30px;width:143px;height:16px;z-index:5;text-align:left;">
			<span style="color:#1E90FF;font-family:Arial;font-size:13px;"> Select Your Location</span>
		</div>
	</div>