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
	<?=link_tag ('assets/last_design/index.css');?>

	<style type="text/css">
		#Layer1
		{
		   background-color: transparent;
		   background-image: url(<?=base_url('assets/last_design/images');?>/home.jpg);
		   background-repeat: no-repeat;
		   background-position: center center;
		   background-size: cover;
		   border: 1px #CCCCCC none;
		}
	</style>

	<title>taskwiser.com</title>
</head>
<body ng-app="app" style="overflow-x:hidden;">

	<div id="Layer1" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:100%;float:left;display:block;z-index:48;">
		<div id="Layer1_Container" style="width:1278px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
			<div id="wb_Shape3" style="position:absolute;left:579px;top:55px;width:167px;height:38px;z-index:0;">
				<a href="<?=base_url('auth/login');?>">
					<img src="<?=base_url('assets/last_design/images');?>/img0042.png" id="Shape3" alt="" style="width:167px;height:38px;">
				</a>
			</div>
			<div id="wb_Shape2" style="position:absolute;left:748px;top:55px;width:167px;height:38px;z-index:1;">
				<a href="#Layer5">
					<img src="<?=base_url('assets/last_design/images/');?>/img0005.png" id="Shape2" alt="" style="width:167px;height:38px;">
				</a>
			</div>
			<select name="date and year" size="1" id="Combobox1" style="position:absolute;left:405px;top:56px;width:171px;height:35px;z-index:2;">
				<option>select a location</option>
				<option>lagos</option>
				<option>abuja</option>
				<option>portharcourt</option>
				<option>Enugu</option>
			</select>
			<div id="wb_Text23" style="position:absolute;left:637px;top:64px;width:59px;height:18px;z-index:3;text-align:left;">
				<a href="<?=base_url('auth/login');?>" style="color:#FFFFFF;font-family:Arial;font-size:16px;"> Sign in</a>
			</div>
			<div id="wb_Text24" style="position:absolute;left:793px;top:64px;width:80px;height:18px;z-index:4;text-align:left;">
				<a href="#Layer4" style="color:#FFFFFF;font-family:Arial;font-size:16px;"> Book Now</a>
			</div>
			<div id="wb_Shape5" style="position:absolute;left:656px;top:581px;width:37px;height:22px;z-index:5;">
				<img src="<?=base_url('assets/last_design/images/');?>/img0043.png" id="Shape5" alt="" style="width:37px;height:22px;">
			</div>
		</div>
	</div>

	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:100%;float:left;display:block;z-index:49;">
		<div id="Layer2_Container" style="width:1280px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
		</div>
	</div>

	<div id="Layer3" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:704px;float:left;clear:left;display:block;z-index:50;">
		<div id="Layer3_Container" style="width:1278px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
			<div id="wb_Image4" style="position:absolute;left:975px;top:380px;width:62px;height:62px;z-index:6;">
				<img src="<?=base_url('assets/last_design/images/');?>/reliable.png" id="Image4" alt="">
			</div>
			<div id="wb_Image5" style="position:absolute;left:655px;top:365px;width:56px;height:64px;z-index:7;">
				<img src="<?=base_url('assets/last_design/images/');?>/trusted.png" id="Image5" alt="">
			</div>
			<div id="wb_Image3" style="position:absolute;left:655px;top:86px;width:77px;height:74px;z-index:8;">
				<img src="<?=base_url('assets/last_design/images/');?>/guaranteed.png" id="Image3" alt="">
			</div>
			<div id="wb_Image2" style="position:absolute;left:975px;top:104px;width:62px;height:56px;z-index:9;">
				<img src="<?=base_url('assets/last_design/images/');?>/convenient.png" id="Image2" alt="">
			</div>
			<div id="wb_Text2" style="position:absolute;left:655px;top:180px;width:245px;height:139px;z-index:10;text-align:left;">
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
					<span style="color:#696969;font-family:Arial;font-size:15px;">not satisfied? We will send you </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">another tasker at no extra cost. We </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">also appreciate your feedback, as </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">this helps us improve our services. </span>
				</div>
				<div>
					<span style="color:#696969;font-family:Arial;font-size:15px;">So please rate our taskers</span>
				</div>
			</div>
			<div id="wb_Text3" style="position:absolute;left:979px;top:180px;width:211px;height:123px;z-index:11;text-align:left;">
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
			<div id="wb_Text4" style="position:absolute;left:655px;top:458px;width:235px;height:139px;z-index:12;text-align:left;">
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
			<div id="wb_Text5" style="position:absolute;left:979px;top:458px;width:184px;height:123px;z-index:13;text-align:left;">
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
			<div id="wb_Line1" style="position:absolute;left:547px;top:58px;width:4px;height:558px;z-index:14;">
				<img src="<?=base_url('assets/last_design/images/');?>/img0001.png" id="Line1" alt="">
			</div>
			<div id="wb_Text1" style="position:absolute;left:91px;top:179px;width:337px;height:201px;z-index:15;text-align:left;">
				<span style="color:#A9A9A9;font-family:'Segoe UI Light';font-size:48px;">About</span>
				<span style="color:#696969;font-family:'Segoe UI Black';font-size:48px;"> </span>
				<span style="color:#00BFFF;font-family:'Segoe UI Black';font-size:48px;">US</span>
				<span style="color:#000000;font-family:Arial;font-size:48px;">
					<br>
				</span>
				<span style="color:#696969;font-family:Arial;font-size:15px;">taskwiser is a service platform that helps in recruiting and connecting dedicated professionals to individuals and businesses, allowing them to complete everyday tasks efficiently and seamlessly. Our aim is to provide comprehensive help and support to customers and enable them live easier lives, while providing jobs for a ready workforce.</span>
			</div>
		</div>
	</div>

	<div id="Layer4" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:548px;float:left;clear:left;display:block;z-index:51;">
		<div id="Layer4_Container" style="width:1278px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
			<div id="wb_Image17" style="position:absolute;left:107px;top:201px;width:47px;height:64px;z-index:16;">
				<a href="<?=base_url('place_order/laundry');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/washing.png" id="Image17" alt="">
				</a>
			</div>
			<div id="wb_Image16" style="position:absolute;left:515px;top:198px;width:65px;height:71px;z-index:17;">
				<a href="<?=base_url('place_order/moving');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/moving.png" id="Image16" alt="">
				</a>
			</div>
			<div id="wb_Image15" style="position:absolute;left:304px;top:202px;width:68px;height:63px;z-index:18;">
				<a href="<?=base_url('place_order/handy_man');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/handy%20man.png" id="Image15" alt="">
				</a>
			</div>
			<div id="wb_Image14" style="position:absolute;left:905px;top:206px;width:63px;height:58px;z-index:19;">
				<a href="<?=base_url('place_order/events');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/events.png" id="Image14" alt="">
				</a>
			</div>
			<div id="wb_Image13" style="position:absolute;left:516px;top:358px;width:59px;height:67px;z-index:20;">
				<a href="<?=base_url('place_order/driver');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/driver.png" id="Image13" alt="">
				</a>
			</div>
			<div id="wb_Image11" style="position:absolute;left:713px;top:354px;width:66px;height:72px;z-index:21;">
				<a href="<?=base_url('place_order/diesel');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/deisel.png" id="Image11" alt="">
				</a>
			</div>
			<div id="wb_Image10" style="position:absolute;left:910px;top:361px;width:51px;height:58px;z-index:22;">
				<a href="<?=base_url('place_order/custom');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/custom.png" id="Image10" alt="">
				</a>
			</div>
			<div id="wb_Image9" style="position:absolute;left:711px;top:199px;width:62px;height:69px;z-index:23;">
				<a href="<?=base_url('place_order/cooking');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/cooking.png" id="Image9" alt="">
				</a>
			</div>
			<div id="wb_Image8" style="position:absolute;left:1105px;top:189px;width:69px;height:74px;z-index:24;">
				<a href="<?=base_url('place_order/cleaning');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/cleaner.png" id="Image8" alt="">
				</a>
			</div>
			<div id="wb_Image7" style="position:absolute;left:103px;top:345px;width:78px;height:77px;z-index:25;">
				<a href="<?=base_url('place_order/beauty');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/beauty.png" id="Image7" alt="">
				</a>
			</div>
			<div id="wb_Image1" style="position:absolute;left:315px;top:356px;width:65px;height:65px;z-index:38;">
				<a href="<?=base_url('place_order/delivery');?>">
					<img src="<?=base_url('assets/last_design/images/');?>/grocery.png" id="Image1" alt="">
				</a>
			</div>



			<div id="wb_Text6" style="position:absolute;left:516px;top:62px;width:250px;height:47px;z-index:26;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI Semibold';font-size:35px;">Available Tasks</span>
			</div>
			<div id="wb_Text7" style="position:absolute;left:107px;top:269px;width:97px;height:17px;z-index:27;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;">Laundry</span>
			</div>
			<div id="wb_Text8" style="position:absolute;left:299px;top:269px;width:97px;height:17px;z-index:28;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Handy Man</span>
			</div>
			<div id="wb_Text9" style="position:absolute;left:525px;top:269px;width:97px;height:17px;z-index:29;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Moving</span>
			</div>
			<div id="wb_Text10" style="position:absolute;left:715px;top:269px;width:97px;height:17px;z-index:30;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Cooking</span>
			</div>
			<div id="wb_Text11" style="position:absolute;left:910px;top:269px;width:97px;height:17px;z-index:31;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;">&nbsp; Events</span>
			</div>
			<div id="wb_Text12" style="position:absolute;left:890px;top:426px;width:97px;height:17px;z-index:32;text-align:center;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Custom Task</span>
			</div>
			<div id="wb_Text14" style="position:absolute;left:717px;top:426px;width:97px;height:17px;z-index:33;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Diesel</span>
			</div>
			<div id="wb_Text15" style="position:absolute;left:522px;top:427px;width:47px;height:17px;z-index:34;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Driver</span>
			</div>
			<div id="wb_Text16" style="position:absolute;left:322px;top:427px;width:97px;height:17px;z-index:35;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Deliveries</span>
			</div>
			<div id="wb_Text17" style="position:absolute;left:105px;top:427px;width:97px;height:17px;z-index:36;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Beauty</span>
			</div>
			<div id="wb_Text13" style="position:absolute;left:1099px;top:269px;width:97px;height:17px;z-index:37;text-align:left;">
				<span style="color:#FFFFFF;font-family:'Segoe UI';font-size:13px;"> Cleaning</span>
			</div>
		</div>
	</div>
	<div id="Layer5" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:55px;float:left;clear:left;display:block;z-index:52;">
		<div id="Layer5_Container" style="width:1278px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
			<div id="wb_Text20" style="position:absolute;left:428px;top:17px;width:182px;height:17px;z-index:39;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">
					<a href="./_terms_and_conditions.html" class="style1"> Terms and Conditions</a>
				</span>
			</div>
			<div id="wb_Text21" style="position:absolute;left:663px;top:16px;width:161px;height:17px;z-index:40;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"> info@taskwiser.com</span>
			</div>
			<div id="wb_Text22" style="position:absolute;left:845px;top:17px;width:123px;height:16px;z-index:41;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"> +234 9020000737</span>
			</div>
			<div id="wb_Shape1" style="position:absolute;left:59px;top:8px;width:183px;height:35px;z-index:42;">
				<a href="#Layer4">
					<img src="<?=base_url('assets/last_design/images/');?>/img0004.png" id="Shape1" alt="" style="width:183px;height:35px;">
				</a>
			</div>
			<div id="wb_Text19" style="position:absolute;left:98px;top:17px;width:144px;height:17px;z-index:43;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"> book a task now</span>
			</div>
			<div id="wb_Image18" style="position:absolute;left:629px;top:16px;width:26px;height:20px;z-index:44;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/envelope.png" id="Image18" alt="">
				</a>
			</div>
			<div id="wb_Image19" style="position:absolute;left:1134px;top:15px;width:29px;height:25px;z-index:45;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/twitter.png" id="Image19" alt="">
				</a>
			</div>
			<div id="wb_Image20" style="position:absolute;left:1091px;top:13px;width:14px;height:26px;z-index:46;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/fb.png" id="Image20" alt="">
				</a>
			</div>
			<div id="wb_Image21" style="position:absolute;left:1185px;top:15px;width:25px;height:25px;z-index:47;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/instagram.png" id="Image21" alt="">
				</a>
			</div>
		</div>
	</div>

</body>
</html>
