<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=link_tag ("assets/imgs/logo.png", "icon", "image/png");?>
	<title><?="Taskwiser - {$title}";?></title>

    <!-- Font Awesome -->
	<?=link_tag ('assets/admin/css/font-awesome.min.css');?>
	<?=link_tag ('assets/admin/css/bootstrap.min.css');?>
	<?=link_tag ('assets/admin/css/mdb.min.css');?>
	<?=link_tag ('assets/admin/css/style.css');?>

	<style type="text/css">
		.m-b-2 {
			margin-bottom: 2rem;
		}
		.m-x-0 {
			margin-right: 0px!important;
			margin-left: 0px!important;
		}
		.sixer{
            -webkit-transition: all 1s;
		    -moz-transition: all 1s;
		    -o-transition: all 1s; 
		    transition: all 1s;
		}
		.hidden{
			visibility: hidden;
		}
	</style>
	
</head>

<body ng-app="app">
	
	<div ng-controller="adminController">
		<div>

