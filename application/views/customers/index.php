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
	<?=link_tag ('assets/last_design/tskwsr.css');?>
	<?=link_tag ('assets/last_design/index.css');?>


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
			<select name="location" size="1" id="Combobox1">
				<option ng-selected>select a location</option>
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
			<div id="wb_Image24">
                <img src="<?=base_url('assets/last_design/images');?>/task%20on%20demand.png" id="Image24" alt="">
			</div>
		</div>
	</div>

	<div id="Layer2">
		<div id="Layer2_Container">
			<div id="wb_Image12">
				<img src="<?=base_url('assets/last_design/images/');?>step%202.png" id="Image12" alt="">
			</div>
			<div id="wb_Image22">
				<img src="<?=base_url('assets/last_design/images/');?>step%203.png" id="Image22" alt="">
			</div>
			<div id="wb_Image23">
				<img src="<?=base_url('assets/last_design/images/');?>step%204.png" id="Image23" alt="">
			</div>
			<div id="wb_Image6">
				<img src="<?=base_url('assets/last_design/images/');?>step%201.png" id="Image6" alt="">
			</div>
		</div>
	</div>

	<div id="Layer3">
		<div id="Layer3_Container">
			<div id="wb_Image4">
				<img src="<?=base_url('assets/last_design/images/');?>reliable.png" id="Image4" alt="">
			</div>
			<div id="wb_Image5">
				<img src="<?=base_url('assets/last_design/images/');?>trusted.png" id="Image5" alt="">
			</div>
			<div id="wb_Image3">
				<img src="<?=base_url('assets/last_design/images/');?>guaranteed.png" id="Image3" alt="">
			</div>
			<div id="wb_Image2">
				<img src="<?=base_url('assets/last_design/images/');?>convenient.png" id="Image2" alt="">
			</div>
			<div id="wb_Text2">
				<div>
					<span style="color:#696969;font-family:Arial;font-size:19px;">
						<strong>Guaranteed</strong>
					</span>
				</div>
				<div>
					<span style="color:#000000;font-family:Arial;font-size:13px;">
						<br>
					</span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">not satisfied? We will </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">send you another tasker </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">at no extra cost. We also </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">appreciate your feedback, </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">as this helps us improve </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">our services. So please </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">rate our taskers</span>
				</div>
			</div>
			<div id="wb_Text4">
				<span style="color:#696969;font-family:Arial;font-size:19px;">
					<strong>Trusted Services</strong>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:20px;">
					<br>
				</span>
				<span style="color:#000000;font-family:Arial;font-size:13px;">
					<br>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:15px;">Our taskers undergo a rigorous vetting process. We offer fast, easy and secure forms of payment. We will confirm your appointments swiftly.</span>
				<span style="color:#000000;font-family:Arial;font-size:13px;">
					<br>
				</span>
			</div>
			<div id="wb_Text1">
				<span style="color:#A9A9A9;font-family:'Segoe UI Light';font-size:48px;">About</span>
				<span style="color:#696969;font-family:'Segoe UI Black';font-size:48px;"> </span>
				<span style="color:#00BFFF;font-family:'Segoe UI Black';font-size:48px;">US</span>
				<span style="color:#000000;font-family:Arial;font-size:48px;">
					<br>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:15px;">taskwiser is a service platform that helps in recruiting and connecting dedicated professionals to individuals and businesses, allowing them to complete everyday tasks efficiently and seamlessly. Our aim is to provide comprehensive help and support to customers and enable them live easier lives, while providing jobs for a ready workforce.</span>
			</div>
			<div id="wb_Text3">
				<span style="color:#696969;font-family:Arial;font-size:19px;">
					<strong>Convenient</strong>
				</span>
				<span style="color:#00BFFF;font-family:'Microsoft YaHei';font-size:20px;">
					<br>
				</span>
				<span style="color:#000000;font-family:'Segoe UI Semilight';font-size:13px;">
					<br>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:15px;">We offer convenient, stress free services. we have a wide range of qualified professionals to handle your tasks.</span>
				<span style="color:#000000;font-family:'Segoe UI Semilight';font-size:13px;">
					<br>
				</span>
			</div>
			<div id="wb_Text5">
				<span style="color:#696969;font-family:Arial;font-size:19px;">
					<strong>Reliable</strong>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:15px;">
					<br>
				</span>
				<span style="color:#000000;font-family:Arial;font-size:15px;">
					<br>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:15px;">We are efficient and your satisfaction is our priority. You can count on us to be there on time to help</span>
				<span style="color:#000000;font-family:Arial;font-size:15px;">.<br>
				</span>
			</div>
		</div>
	</div>

	<div id="Layer4">
		<div id="Layer4_Container">
			<div id="wb_Image17">
				<a href="<?=base_url('place_order/laundry');?>">
					<img src="<?=base_url('assets/last_design/images/');?>washing.png" id="Image17" alt="">
				</a>
			</div>

			<div id="wb_Image16">
				<a href="<?=base_url('place_order/moving');?>">
					<img src="<?=base_url('assets/last_design/images/');?>moving.png" id="Image16" alt="">
				</a>
			</div>
			<div id="wb_Image15">
				<a href="<?=base_url('place_order/handy_man');?>">
					<img src="<?=base_url('assets/last_design/images/');?>handy%20man.png" id="Image15" alt="">
				</a>
			</div>
			<div id="wb_Image14">
				<a href="<?=base_url('place_order/events');?>">
					<img src="<?=base_url('assets/last_design/images/');?>events.png" id="Image14" alt="">
				</a>
			</div>
			<div id="wb_Image1">
				<a href="<?=base_url('place_order/driver');?>">
					<img src="<?=base_url('assets/last_design/images/');?>driver.png" id="Image13" alt="">
				</a>
			</div>
			<div id="wb_Image13">
				<a href="<?=base_url('place_order/diesel');?>">
					<img src="<?=base_url('assets/last_design/images/');?>deisel.png" id="Image11" alt="">
				</a>
			</div>
			<div id="wb_Image9">
				<a href="<?=base_url('place_order/cooking');?>">
					<img src="<?=base_url('assets/last_design/images/');?>cooking.png" id="Image9" alt="">
				</a>
			</div>
			<div id="wb_Image8">
				<a href="<?=base_url('place_order/cleaning');?>">
					<img src="<?=base_url('assets/last_design/images/');?>cleaner.png" id="Image8" alt="">
				</a>
			</div>
			<div id="wb_Image7">
				<a href="<?=base_url('place_order/beauty');?>">
					<img src="<?=base_url('assets/last_design/images/');?>beauty.png" id="Image7" alt="">
				</a>
			</div>

			<div id="wb_Text6">
				<span style="color:#FFFFFF;font-family:'Segoe UI Semibold';font-size:35px;">Available Tasks</span>
			</div>
			<div id="wb_Text7">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;">Laundry</span>
			</div>
			<div id="wb_Text8">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Handy Man</span>
			</div>
			<div id="wb_Text9">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Moving</span>
			</div>
			<div id="wb_Text10">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Cooking</span>
			</div>
			<div id="wb_Text11">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;">&nbsp; Events</span>
			</div>

			<div id="wb_Text15">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Diesel</span>
			</div>

			<div id="wb_Text16">
                <span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Driver</span>
			</div>

			<div id="wb_Text17">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Beauty</span>
			</div>
			<div id="wb_Text13">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Cleaning</span>
			</div>
		</div>
	</div>


	<div id="Layer5">
		<div id="Layer5_Container">
			<div id="wb_Text20">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">
					<a href="<?=base_url('terms_and_conditions');?>" class="style1"> Terms and Conditions</a>
				</span>
			</div>

			<div id="wb_Text21">
                <span style="color:#FFFFFF;font-family:Arial;font-size:15px;"> info@taskwiser.com</span>
			</div>
            <div id="wb_Text22">
                <span style="color:#FFFFFF;font-family:Arial;font-size:13px;"> +234 9020000737</span>
			</div>

			<div id="wb_Shape1">
				<a href="<?=base_url('');?>">
					<img src="<?=base_url('assets/last_design/images/');?>img0004.png" id="Shape1" alt="">
				</a>
			</div>
			<div id="wb_Text19">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"> book a task now</span>
			</div>
			<div id="wb_Image18">
				<a href="<?=base_url('');?>">
					<img src="<?=base_url('assets/last_design/images/');?>envelope.png" id="Image18" alt="">
				</a>
			</div>
			<div id="wb_Image19">
				<a href="<?=base_url('');?>">
					<img src="<?=base_url('assets/last_design/images/');?>twitter.png" id="Image19" alt="">
				</a>
			</div>
			<div id="wb_Image20">
				<a href="<?=base_url('');?>">
					<img src="<?=base_url('assets/last_design/images/');?>fb.png" id="Image20" alt="">
				</a>
			</div>
			<div id="wb_Image21">
				<a href="<?=base_url('');?>">
					<img src="<?=base_url('assets/last_design/images/');?>instagram.png" id="Image21" alt="">
				</a>
			</div>
		</div>
	</div>

</body>
</html>
