<!DOCTYPE html>
<html >
<head>

	<?=meta ('viewport', 'width=device-width, initial-scale=1');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>
	<title>taskwiser.com</title>
	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<style type="text/css">
		@media screen and (min-width: 480px) {
			.md-left {
				text-align: left;
			}
		}

		.input input, .input select {
			outline: none;
			padding: 10px;
			border: 1px solid #dedede;
			font-size: 13px;
			color: #666;
		}

		.input-number input {
			border-left: 0px;
			border-right: 0px;
			margin-left: -5px;
			width: 70%;
		} 

		.input-textarea textarea {
			widt
		}

		.input-select select {
			width: 100%;
			border-radius: 5px;
			-moz-border-radius:5px;
			color: #666;
			background-image:
			    linear-gradient(45deg, transparent 50%, gray 50%),
			    linear-gradient(135deg, gray 50%, transparent 50%),
			    linear-gradient(to right, #ccc, #ccc);
			  background-position:
			    calc(100% - 20px) calc(1em + 5px),
			    calc(100% - 15px) calc(1em + 5px),
			    calc(100% - 2.5em) 0.8em;
			  background-size:
			    5px 5px,
			    5px 5px,
			    1px 1.5em;
			  background-repeat: no-repeat;
			  appearance:none;
			  -webkit-appearance:none;
			  -moz-appearance:none;
		}

		.input-text input {
			width: 100%;
			border-radius: 5px;
			-moz-border-radius: 5px;
		}

		.input .right {
			border:1px solid #dedede;
			padding: 12px 5px 10px 5px;
			height: 40px;
			width: 15%;
			margin-left: -5px;
			text-align: center;
			font-size: 12px;
			border-bottom-right-radius: 5px;
			border-top-right-radius: 5px;
			-moz-border-bottom-right-radius: 5px;
			-moz-border-top-right-radius: 5px;
		}

		.input .left {
			border:1px solid #dedede;
			padding: 12px 5px 10px 5px;
			height: 40px;
			text-align: center;
			width: 15%;
			font-size: 12px;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			-moz-border-bottom-left-radius: 5px;
			-moz-border-top-left-radius: 5px;
		}

		.sm-center {
			text-align: center;
		}

		ul.nav li a.navbar-link {
			color:green;
		}
		.font-12 {
			font-size: 12px!important;
		}
		.bold {
			font-weight: bold!important;
		}
		.navbar-brand {
			background-image: url('<?=base_url ('assets/imgs/logo.png');?>');
			height: 50px;
			background-position: center 60%;
			background-size: 85%;
			background-repeat: no-repeat;
			padding: 0px;
			margin:0px;
			width: 150px;
		}

		section#top { 
			background-image: url('<?=base_url ('assets/imgs/top.jpg');?>');
			background-position: center;
			background-repeat: no-repeat;
			background-color: #78ccce;	
			background-size: contain;
			height: 400px;
		}

		@media screen and (min-width: 480px) {
			section#top {
				height: 580px;
				background-size: 70%;
			}
		}

		.navbar { 
			margin-bottom: 0px!important; 
			background-color:white!important; 
			border-bottom: 1px solid #dedede;
		}
		.container-fluid {
			border: none;
		}

		.gradient-green {
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#31708f+0,2d823f+51 */
			background: #31708f; /* Old browsers */
			background: -moz-linear-gradient(-45deg,  #31708f 0%, #2d823f 51%); /* FF3.6-15 */
			background: -webkit-linear-gradient(-45deg,  #31708f 0%,#2d823f 51%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(135deg,  #31708f 0%,#2d823f 51%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#31708f', endColorstr='#2d823f',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

		}

		.gradient {
			background-color:#b13a15;
			background-image:
				radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 40px),
				radial-gradient(white, rgba(255,255,255,.05) 1px, transparent 30px),
				radial-gradient(rgba(255,255,255,.4), rgba(255,255,255,.05) 2px, transparent 30px);
			background-size: 550px 550px, 350px 350px, 250px 250px, 150px 150px; 
			background-position: 0 0, 40px 60px, 130px 270px, 70px 100px;

			-webkit-animation: AnimationName 50s ease infinite;
			-moz-animation: AnimationName 50s ease infinite;
			-o-animation: AnimationName 50s ease infinite;
			animation: AnimationName 50s ease infinite;

		}

		@-webkit-keyframes AnimationName {
			0%{background-position: 0 0, 40px 60px, 130px 270px, 170px 100px}
			50%{background-position: 10 0, 140px 60px, 230px 270px, 70px 300px}
			100%{background-position: 30 10, 40px 160px, 130px 570px, 70px 0px}
		}

		
		@-moz-keyframes AnimationName {
			0%{background-position: 0 0, 40px 60px, 130px 270px, 170px 100px}
			50%{background-position: 10 0, 140px 60px, 230px 270px, 70px 300px}
			100%{background-position: 30 10, 40px 160px, 130px 570px, 70px 0px}
		}
		@-o-keyframes AnimationName {
			0%{background-position: 0 0, 40px 60px, 130px 270px, 170px 100px}
			50%{background-position: 10 0, 140px 60px, 230px 270px, 70px 300px}
			100%{background-position: 30 10, 40px 160px, 130px 570px, 70px 0px}
		}
		@keyframes AnimationName {
			0%{background-position: 0 0, 40px 60px, 130px 270px, 170px 100px}
			50%{background-position: 10 0, 140px 60px, 230px 270px, 70px 300px}
			100%{background-position: 30 10, 40px 160px, 130px 570px, 70px 0px}
		}
		.text-white, .text-white:hover, .text-white:active, .text-white:focus {
			color: #fff!important;
		}
		
		.p-t-0 { padding-top: 0rem!important; } 
		.p-t-1 { padding-top: 1rem!important; } 
		.p-t-2 { padding-top: 2rem!important; } 
		.p-t-3 { padding-top: 3rem!important; } 

		.p-l-0 { padding-left: 0rem!important; } 
		.p-l-1 { padding-left: 1rem!important; } 
		.p-l-2 { padding-left: 2rem!important; } 
		.p-l-3 { padding-left: 3rem!important; } 

		.p-r-0 { padding-right: 0rem!important; } 
		.p-r-1 { padding-right: 1rem!important; } 
		.p-r-2 { padding-right: 2rem!important; } 
		.p-r-3 { padding-right: 3rem!important; } 

		.p-b-0 { padding-bottom: 0rem!important; }
		.p-b-1 { padding-bottom: 1rem!important; }
		.p-b-2 { padding-bottom: 2rem!important; }
		.p-b-3 { padding-bottom: 3rem!important; }

		.m-t-0 { margin-top: 0rem!important; } 
		.m-t-1 { margin-top: 1rem!important; } 
		.m-t-2 { margin-top: 2rem!important; } 
		.m-t-3 { margin-top: 3rem!important; } 

		.m-b-0 { margin-bottom: 0rem!important; } 
		.m-b-1 { margin-bottom: 1rem!important; } 
		.m-b-2 { margin-bottom: 2rem!important; } 
		.m-b-3 { margin-bottom: 3rem!important; } 

		.text-ash {
			color : rbg(92, 92, 92)!important;
			font-size: 13px;
		}

		.tahoma {
			font-family: "Tahoma";
		}

		.icon-image {
			height: 120px;

		}

		.icon-image img {
			height: 80px;
			padding-bottom: 10px!important;
		}
		.font-13 {
			font-size: 13px!important;
		}
		.no-overflow {
			overflow: hidden!important;
		}
		.icon-bar {
			background-color: #78ccce!important;
		}
		.navbar-link {
			color: #78ccce!important;
		}
		html {
			height: 100vh!important;
		}
	</style>
</head>
<body>
	<nav class="navbar" style="">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
					data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bg-white"></span>
					<span class="icon-bar bg-white"></span>
					<span class="icon-bar bg-white"></span>
				</button>
				<div class="navbar-brand" style=""></div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse no-overflow no-scroll" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin/login" class="navbar-link text-lowercase font-13 bold">sign in</a></li>
					<li><a href="#" class="navbar-link text-lowercase font-13 bold">about us</a></li>
					<li><a href="#" class="navbar-link text-lowercase font-13 bold">how it works</a></li>
					<li><a href="#" class="navbar-link text-lowercase font-13 bold">BOOK NOW</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<section id="" class="" style="">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					
				</div>
				<div class="col-md-3">
					<div class="panel panel-default m-t-3">
						<div class="panel-body">
							<h4 class="m-t-1 m-b-1 text-center">Get a price</h4>
							
							<div class="input-text input">
								<input type="text" name="" class="" placeholder="enter email address" />	
							</div>
							
							<h6 class="p-t-1 p-b-1 text-center">Tell us about the job</h6>
							<div class="input-number input">
								<i class="glyphicon glyphicon-minus left"></i>
								<input type="text" name="" class="" placeholder="enter email address" />	
								<i class="glyphicon glyphicon-plus right"></i>
							</div>
							<br>

							<div class="input input-select">
								<select class="" name="" id="">
									<option>select something</option>
								</select>
							</div>
							<br>

							<div class="input input-textarea">
								<textarea class="" name="" id=""></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="footer" class="footer" style="background-color: #333; color: #8c8c8c;">
		<div class="container-fluid">
			<div class="row p-t-3 p-b-3 font-12 md-left sm-center">
				<h3 class="col-md-2 m-t-0 m-b-0" style="padding-top: 0px!important;">Need Help ?</h3>
				<p class="col-md-2 m-t-0 m-b-0" style="padding-top: 7px!important; text-align: center; padding-bottom: 5px;">
					<a href="#" style="padding-right: 20px; color:#8c8c8c;">contact us</a>
					<a href="#" style="color:#8c8c8c;">terms and conditions</a>
				</p>
				
				<p class="col-md-3 text-center m-t-0 m-b-0" style="padding-top: 0px!important; text-align: center; padding-bottom: 5px; padding-left: 0px; padding-right:0px;">
					<a href="mailto:#" class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important; border: 1px solid #8c8c8c;">
						<i class="glyphicon glyphicon-envelope"></i> &nbsp;&nbsp;
						info@taskwiser.com
					</a>
					<a href="tel:+2349020000737" class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important; border: 1px solid #8c8c8c;">
						<i class="glyphicon glyphicon-phone"></i> &nbsp;&nbsp;
						+234 9020000737
					</a>
				</p>

				<p class="col-md-3 m-t-0 m-b-0" style="padding-top: 0px!important; text-align: center; padding-bottom: 5px;">
					<a class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important; border: 1px solid #8c8c8c;" href="#">instagram</a>
					<a class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important; border: 1px solid #8c8c8c;" href="#">facebook</a>
					<a class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important; border: 1px solid #8c8c8c;" href="#">twitter</a>
				</p>
				<div class="col-md-2" style="padding-bottom: 5px; text-align: center;">
					<button class="btn btn-success font-12">book a task with now</button>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="<?=base_url ('assets/js/jquery.js') ;?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/tether.min.js') ;?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/bootstrap.min.js') ;?>"></script>
</body>