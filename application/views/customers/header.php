<!DOCTYPE html>
<html >
<head>

	<?=meta ('viewport', 'width=device-width, initial-scale=1');?>
	<?=meta ('author', 'Hirekaan Micheal Hemen');?>
	<?=meta ('description', '');?>
	<?=meta ('keywords', '');?>
	<?=meta ('Content-Type', 'text/html; charset=UTF-8');?>
	<?=link_tag ("assets/imgs/logo.png", "icon", "image/png");?>
	<title><?=$title;?></title>
	
	<?=link_tag ('assets/css/bootstrap.min.css');?>
	<?=link_tag ('assets/css/font-awesome.css');?>

	<style type="text/css">
		@media screen and (min-width: 480px) {
			.md-left {
				text-align: left;
			}
		}

		.nav-50, .nav-50 li {
			height:50px!important;
		}

		.nav-50 li {
			border-left: 1px solid #dedede;
			border-right: 1px solid #dedede;
			padding-right: 2em;
			margin-left: 2em;
		}

		.nav-50 li label {
			display: flex;
			margin-left: 2em;
			color: #999;
			font-size: 0.9em;
			padding-top: 5px;
			margin-bottom: 0px;
		}

		.nav-50 li select {
			border:none;
			width: 30em;
			outline: none;
			margin-left: 2em;
			padding: 0em;
			font-size: 12px;
			color: #666;
			height: 28px!important;
			background-color: rgba(255, 255, 255, 0);
		}

		.input input, .input select, .input-textarea textarea {
			outline: none;
			padding: 10px;
			border: 1px solid #dedede;
			font-size: 13px;
			color: #666;
		}

		.input-number div {
			display: inline-table;
			width: 70%;
			text-align: center;
			border-top: 1px solid #dedede;
			border-bottom: 1px solid #dedede;
			padding: 11px 0px 10px 0px;
			font-size: 12px;
			color: #999;
			margin-left: -5px;
		} 

		.input-textarea textarea {
			width:100%!important;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-o-border-radius:5px;
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
			color:#25aae1!important;
		}
		.font-12 {
			font-size: 12px!important;
		}
		.bold {
			font-weight: bold!important;
		}
		.navbar-brand {
			background-image: url('<?=site_url ('assets/imgs/logo.png');?>');
			height: 50px;
			background-position: center 57%;
			background-size: 70%;
			background-repeat: no-repeat;
			padding: 0px;
			margin:0px;
			width: 150px;
		}

		section#top { 
			background-image: url('<?=site_url ('assets/imgs/top.jpg');?>');
			background-position: center;
			background-repeat: no-repeat;
			background-color: #78ccce;	
			background-size: contain;
			height: 400px;
		}

		@media screen and (min-width: 480px) {
			section#top {
				height: 680px;
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
			/*background-color:#b13a15;*/
			background-color: #1c4920;
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
		.transbg {
			background-color: rgba(255, 255, 255, 0.9)!important;
		}
		.xtransbg {
			background-color: rgba(255, 255, 255, 0.9)!important;
		}
		.t-icons {
			opacity:0.7;
			cursor: pointer;
		}
		.t-icons:hover {
			opacity: 1;
		}

	</style>

	<style type="text/css">
		.about {
			margin: 50px -1.5em 0em -1.5em;
			padding: 2.0em;
			border-top: 0.1em solid #efe;
			list-style: none!important;
			background-color: rgba(255, 255, 255, 0.9);
			font-size: 1.2em!important;
			color: #666;
			text-align: center;
			border-bottom: 0.1em solid #efe;
		}
		.white {
			background-color: rgba(255, 255, 255, 0)!important;
		}
	</style>
</head>
<body ng-app="app">

	<nav id="navbar" class="navbar navbar-fixed-top white" style="border-top: 0px!important; border-bottom: 0px!important; background-color: rgba(255, 255, 255, 0.6);">
		<div class="container-fluid" style="padding-right: 15px;">
			<!-- Brand and toggle get grouped for better mobile display -->

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
					data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bg-white"></span>
					<span class="icon-bar bg-white"></span>
					<span class="icon-bar bg-white"></span>
				</button>
				<a href="<?=base_url ('/');?>" class="navbar-brand" style=""></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse no-overflow no-scroll" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left nav-50">
					<li>
						<label>
							Select Location: 
						</label>
						<select class="cities_dropdown" >
							<option value="0">select your location</option>
							<?php foreach($states as $state){ ?>
								<option value="<?=$state['_id'];?>"><?=$state['_name'];?></option>
							<?php } ?>
						</select>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="navbar-link text-lowercase font-13 bold about-tag">about us</a></li>
					<li><a href="#" class="navbar-link text-lowercase font-13 bold">how it works</a></li>
					<?php if (!isset($this->session->user)) { ?>
						<li><a href="<?=base_url ('auth/register');?>" class="navbar-link text-lowercase font-13 bold">sign up</a></li>
						<li><a href="<?=base_url ('auth/login');?>" class="navbar-link text-lowercase font-13 bold">sign in</a></li>
					<?php } else { ?>
						<li><a href="<?=base_url ('auth/signout');?>" class="navbar-link text-lowercase font-13 bold">sign out</a></li>
					<?php } ?>
					<li><a href="#what_it_offers" class="navbar-link text-uppercase font-13 bold" style="background-color: green!important; color: #fff!important;">BOOK NOW</a></li>
				</ul>

				<ul class="about" >
				    <li>
				    	taskwiser is an on-demand service provider that helps in recruiting and connecting dedicated professionals to individuals and businesses, allowing them to complete everyday tasks efficiently and with ease. 
				    	<br>
				    	Our aim is to provide comprehensive help and support to customers and enable them live easier lives, while providing jobs for a ready workforce
				    </li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>