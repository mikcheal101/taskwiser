<!DOCTYPE html>
<html >
<head>
	<?=meta ('viewport', 'width=device-width, initial-scale=1');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>
	
	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<style type="text/css">
		@media screen and (min-width: 480px) {
			.md-left {
				text-align: left;
			}
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
	
	<section id="top">
		
	</section>

	<section id="trust" class="container p-b-3 p-r-3 p-l-3 m-l-3 m-r-3">
		<div class="row">
			<div class="col-sm-12 text-center p-t-1 p-b-3">
				<h2 class=""> A Community Built on Trust</h2>
			</div>
		</div>
		<div class="row p-l-3 p-r-3 p-b-3">
			<div class="col-sm-3 text-center">
				<div class="icon-image">
					<img src="<?=base_url('assets/icons/thumb-up.png');?>" />
				</div>
				<div>
					<h4 class="bold m-b-2 ">Convenient</h4>
					<p class="text-ash tahoma">
						We offer a stress free service at your own time. We have various professionals to cover your need. We offer a complimentary pre task inspection ( only chargable with non completed tasks)
					</p>
				</div>
			</div>
			
			<div class="col-sm-3 text-center">
				<div class="icon-image">
					<img src="<?=base_url('assets/icons/handshake.png');?>" />
				</div>
				<div>
					<h4 class="bold m-b-2 ">Reliable</h4>
					<p class="text-ash tahoma">
						We are efficient and our job is to make you happy. You can count on us to be there on time to help. We will only be done when you are satisfied with our service.
					</p>
				</div>
			</div>
			<div class="col-sm-3 text-center">
				<div class="icon-image">
					<img src="<?=base_url('assets/icons/locked.png');?>" />
				</div>
				<div>
					<h4 class="bold m-b-2 ">Trusted Services</h4>
					<p class="text-ash tahoma">
						We undergo very rigourous vetting of our taskers. We offer fast and easy form of payment. We will confirm your appointments and take care of your payments electronically and securely.
					</p>
				</div>
			</div>
			<div class="col-sm-3 text-center">
				<div class="icon-image">
					<img src="<?=base_url('assets/icons/five-stars-outlines.png');?>" />
				</div>
				<div>
					<h4 class="bold m-b-2 text-capitalize">Quality Assurance</h4>
					<p class="text-ash tahoma">
						We also like reading your feedback to help us improve our service to meet your demands.so pleae rate our taskers.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section id="what_it_offers" class="p-b-0 m-t-0 p-t-2 gradient text-white" style="min-height:400px;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="text-lowercase text-center p-t-3 p-b-3 m-t-0 m-b-3">taskwiser has various tasks available</h3>		
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 p-b-3">
					
					<div class="col-sm-6 col-sm-offset-3">
						<div class="p-b-3 col-sm-3 col-sm-offset-3 text-center p-l-0" data-toggle="modal" data-target="#moving">
							<?=img ('assets/icons/moving_icon.png', false, array ('alt'=>'Moving Icon'));?>
							<p class="text-center text-lowercase lighter">moving</p>
						</div>

						<div class="p-b-3 col-sm-3 text-center p-r-0" data-toggle="modal" data-target="#diesel">
							<?=img ('assets/icons/diesel_icon.png', false, array ('alt'=>'Diesel Icon'));?>
							<p class="text-center text-lowercase lighter">diesel</p>
						</div>
					</div>
					
					
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#cleaner">
								<?=img ('assets/icons/cleaning_icon.png', false, array ('alt'=>'Cleaner Icon'));?>
								<p class="text-center text-lowercase lighter">cleaner</p>
							</div>
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#handyman">
								<?=img ('assets/icons/hammer_icon.png', false, array ('alt'=>'Handy Man Icon'));?>
								<p class="text-center text-lowercase lighter">handyman</p>
							</div>
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#laundry">
								<?=img ('assets/icons/laundry_icon.png', false, array ('alt'=>'Laundry Icon'));?>
								<p class="text-center text-lowercase lighter">laundry</p>
							</div>
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#cooking">
								<?=img ('assets/icons/chef_icon.png', false, array ('alt'=>'Cooking Icon'));?>
								<p class="text-center text-lowercase lighter">cooking</p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#delivery">
								<?=img ('assets/icons/delivery_icon.png', false, array ('alt'=>'Delivery Icon'));?>
								<p class="text-center text-lowercase lighter">delivery</p>
							</div>
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#mechanic">
								<?=img ('assets/icons/mechanic_icon.png', false, array ('alt'=>'Mechanic Icon'));?>
								<p class="text-center text-lowercase lighter">mechanic</p>
							</div>
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#driver">
								<?=img ('assets/icons/driver_icon.png', false, array ('alt'=>'Driver Icon'));?>
								<p class="text-center text-lowercase lighter">driver</p>
							</div>
							<div class="col-sm-3 text-center p-b-3" data-toggle="modal" data-target="#events">
								<?=img ('assets/icons/events_icon.png', false, array ('alt'=>'Events Icon', 'style'=>'width:50px'));?>
								<p class="text-center text-lowercase lighter">events</p>
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
					<a href="#" style="padding-right: 15px; color:#8c8c8c;">contact us</a>
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

	<!-- Modals -->
	<div id="moving" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Moving</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">house move</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">office move</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="diesel" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Diesel</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">DIESEL DELIVERY</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="cleaner" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Cleaner</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">House Clean</a>
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Office Clean</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="handyman" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Handyman</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">Electrician</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Plumber</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Carpenter</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Air Conditon Repairs</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Generator Repairs</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Tailor</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="laundry" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Laundry</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">Washerman</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Dry Cleaning</a>
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="cooking" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Cooking</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">Cook</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="delivery" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Delivery</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">Package Delivery</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Food Delivery</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="mechanic" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Mechanic</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">sample item</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="driver" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Driver</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">Driver for the Day</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<div id="events" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Events</h4>
	      		</div>
	      		<div class="modal-body">
	        		<ul class="list-group">
					  	<li class="list-group-item">
					  		<a href="#">Cake</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Live Band</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Drinks(cocktail)</a> 
					  	</li>
					  	<li class="list-group-item">
					  		<a href="#">Photographer</a> 
					  	</li>
					</ul>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
		</div>
	</div>

	<script type="text/javascript" src="<?=base_url ('assets/js/jquery.js') ;?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/tether.min.js') ;?>"></script>
	<script type="text/javascript" src="<?=base_url ('assets/js/bootstrap.min.js') ;?>"></script>
</body>