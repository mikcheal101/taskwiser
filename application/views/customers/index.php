<!DOCTYPE html>
<html >
	<head>
		<?=meta ('viewport', 'width=device-width, initial-scale=1');?>
		<?=meta ('author', 'Hirekaan Micheal Hemen');?>
		<?=meta ('description', '');?>
		<?=meta ('keywords', '');?>
		<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>
		
		<?=link_tag ('vendor/twbs/bootstrap/dist/css/bootstrap.min.css');?>
		<title>taskwiser.com</title>
		<style >
			.arrow-down {
				height: 0;
				width : 0;
				border-right: 20px solid transparent;
				border-left	: 20px solid transparent;
				border-top 	: 20px solid #31708f;
			}
			
			.blue-bg {
				background-color: #31708f;
			}

			.bg-white {background-color: #FFF;}
			
			.text-white, .text-white:hover, .text-white:active, .text-white:focus {
				color: #fff!important;
			}
			
			.text-circle {
				border: 1px solid #c9c9c9;
				display : inline-block;
				overflow: hidden;
				width: 38px;
				height: 38px;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				border-radius: 50%;
				text-align: center;
				padding-top: 0.3rem;
				vertical-align: middle;
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

			.lighter {
				font-weight : 100;
			}
			
			.jumbotron-bg-image {
				background-image :url('<?=base_url ('assets/imgs/1.jpg');?>');
				background-position: 90% 10%;
				min-height: 70vh;
				background-repeat: no-repeat;
				background-color: #FFF;
				background-size: contain;
			}
			.transparent { background-color:transparent;}
			.m-t-55 {margin-top: 55px;}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-full navbar-light bg-faded bg-white navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="navbar-brand m-b-0">taskwiser</h3>
						<ul class="nav navbar-nav pull-xs-right">
							<li class="nav-item">
								<a class="nav-link" href="#">sample link</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">sample link</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-sm btn-info text-white" href="#">sample link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		
		<div class="jumbotron m-b-0 jumbotron-bg-image m-t-55">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-xs-center text-sm-left">
						<h1 class="m-b-1">Hire workers</h1>
						<h3 class="m-b-1">On Demand</h3>
						<h5 class="m-b-1">Satisfaction Guaranteed</h5>
						<div class="m-b-1 col-sm-5">
							<div class="form-group row">
								<div class="p-l-0 col-sm-8">
									<input class="form-control form-control-lg" type="email" placeholder="enter email address" />
								</div>
								<span class="btn btn-lg btn-success col-sm-4 text-capitalize">get started</span>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<section class="how_it_works p-b-2" id="how_it_works">
			<h3 class="text-xs-center p-y-2 blue-bg m-b-0 text-white"> How Taskwiser Works </h3>
			<div class="triangle">
				<div class="arrow-down m-x-auto"> </div>
			</div>
			<h4 class="text-xs-center m-y-3">The smart and reliable way to get tasks done</h4>
			<div class="container">
				<div class="row">
					<div class="hidden-xs-down col-sm-6">
						
					</div>
					<div class="col-xs-12 col-sm-6">
						<p class="lead m-b-2">Replacement for free if you do not like the job done</p>
						<div class="row p-l-1 p-b-2">
							<span class="col-xs-1 text-circle">1</span>
							<strong class="col-xs-10 offset-xs-1 text-uppercase">Choose a task and get a quote</strong>
						</div>
						<div class="row p-l-1 p-b-2">
							<span class="col-xs-1 text-circle">2</span>
							<strong class="col-xs-10 offset-xs-1 text-uppercase">book a time, date & location and get a quote</strong>
						</div>
						<div class="row p-l-1 p-b-2">
							<span class="col-xs-1 text-circle">3</span>
							<strong class="col-xs-10 offset-xs-1 text-uppercase">get matched</strong>
						</div>
						<div class="row p-l-1 p-b-2">
							<span class="col-xs-1 text-circle">4</span>
							<strong class="col-xs-10 offset-xs-1 text-uppercase">get it done</strong>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section id="what_it_offers" class="p-b-2 m-t-2 gradient text-white" style="min-height:450px;">
			<h3 class="text-lowercase text-xs-center p-t-3 p-b-3 m-b-3">taskwiser has various tasks available</h3>
			
			<div class="col-xs-12 p-b-3">
				
				<div class="col-sm-6 offset-sm-3 p-b-3">
					<div class="col-sm-3 offset-sm-3 text-xs-center p-l-0">
						<?=img ('assets/icons/moving_icon.png', false, array ('alt'=>'Moving Icon'));?>
						<p class="text-xs-center text-lowercase lighter">moving</p>
					</div>
					<div class="col-sm-3 text-xs-center p-r-0">
						<?=img ('assets/icons/diesel_icon.png', false, array ('alt'=>'Diesel Icon'));?>
						<p class="text-xs-center text-lowercase lighter">diesel</p>
					</div>
				</div>
				
				
				<div class="col-sm-12">
					<div class="col-sm-6">
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/cleaning_icon.png', false, array ('alt'=>'Cleaner Icon'));?>
							<p class="text-xs-center text-lowercase lighter">cleaner</p>
						</div>
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/hammer_icon.png', false, array ('alt'=>'Handy Man Icon'));?>
							<p class="text-xs-center text-lowercase lighter">handyman</p>
						</div>
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/laundry_icon.png', false, array ('alt'=>'Laundry Icon'));?>
							<p class="text-xs-center text-lowercase lighter">laundry</p>
						</div>
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/chef_icon.png', false, array ('alt'=>'Cooking Icon'));?>
							<p class="text-xs-center text-lowercase lighter">cooking</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/delivery_icon.png', false, array ('alt'=>'Delivery Icon'));?>
							<p class="text-xs-center text-lowercase lighter">delivery</p>
						</div>
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/mechanic_icon.png', false, array ('alt'=>'Mechanic Icon'));?>
							<p class="text-xs-center text-lowercase lighter">mechanic</p>
						</div>
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/driver_icon.png', false, array ('alt'=>'Driver Icon'));?>
							<p class="text-xs-center text-lowercase lighter">driver</p>
						</div>
						<div class="col-sm-3 text-xs-center">
							<?=img ('assets/icons/beauty_icon.png', false, array ('alt'=>'Beauty Icon'));?>
							<p class="text-xs-center text-lowercase lighter">beauty</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		
		<script src="<?=base_url ('vendor/components/jquery/jquery.min.js');?>"></script>
		<script src="<?=base_url ('assets/js/tether.min.js');?>"></script>
		<script src="<?=base_url ('vendor/twbs/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<script src="<?=base_url ('assets/js/angular.min.js');?>"></script>
	</body>
</html>