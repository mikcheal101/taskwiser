<!DOCTYPE html>
<html >
<head>
	<?=meta ('viewport', 'width=device-width, initial-scale=1.0');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>

	<?=link_tag ("assets/imgs/logo.png", "icon", "image/png");?>

	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<?=link_tag ('assets/last_design/final.css');?>


	<title>taskwiser.com</title>

</head>
<body ng-app="app" >
	
	<div id="Layer1">
		<div id="Layer1_Container">
			<div id="wb_Image25">
				<img src="<?=base_url('assets/last_design/images/');?>tools.png" id="Image25" alt="">
			</div>

			<div id="wb_Shape3">
				<a href="<?=base_url('/auth/login');?>">
					<img src="<?=base_url('assets/last_design/images/');?>img0042.png" id="Shape3" alt="">
				</a>
			</div>

			<div id="wb_Shape5">
				<img src="<?=base_url('assets/last_design/images/');?>img0043.png" id="Shape5" alt="">
			</div>

			<div id="wb_Text23">
				<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">
					<a href="<?=base_url('auth/login');?>"> Sign in</a>
				</span>
			</div>
			<div id="wb_Shape2">
				<a href="<?=base_url('/#Layer4');?>">
					<img src="<?=base_url('assets/last_design/images/img0005.png');?>" id="Shape2" alt="">
				</a>
			</div>
			<select name="location" ng-model="location" size="1" id="Combobox1">
				<option>select a location</option>
				<option>lagos</option>
				<option>abuja</option>
				<option>portharcourt</option>
				<option>Enugu</option>
			</select>
			<div id="wb_Text18">
				<a href="<?=base_url('/#Layer4');?>" style="color:#FFFFFF;font-family:Arial;font-size:15px;">
					Book a task now
				</a>
			</div>
		</div>
	</div>
