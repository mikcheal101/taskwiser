	<section id="footer" class="footer" style="background-color: rgb(35, 48, 57); color: #8c8c8c;">
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

				<p class="col-md-3 m-b-0" style="margin-top:-5px!important; padding-top: 0px!important; text-align: center; padding-bottom: 5px;">
					<a class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important; " href="#">
						<i class="fa fa-facebook fa-2x"></i>
					</a>
					<a class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important;" href="#">
						<i class="fa fa-instagram fa-2x"></i>
					</a>
					<a class="btn m-b-0 m-t-0 font-12" style="color: #8c8c8c!important;" href="#">
						<i class="fa fa-twitter fa-2x"></i>
					</a>
				</p>
				<div class="col-md-2" style="padding-bottom: 5px; text-align: center;">
					<button class="btn btn-success font-13 btn-lg" style="margin-top:-5px; background-color: #008000!important; border-color: #008000!important;">book a task with now</button>
				</div>
			</div>
		</div>
	</section>

	<!-- Modals -->
	<?php foreach ($categories as $category) { ?>
		<div id="<?=$category['_id'];?>" class="modal fade" role="dialog" tabindex="-1" 
		aria-labelledby="myModalLabel" aria-hidden data-backdrop="true">
			<div class="modal-dialog modal-sm" role="document">
		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
		        		<h4 class="modal-title" id="myModalLabel"><?=$category['_name'];?></h4>
		      		</div>
		      		<div class="modal-body">
		        		<ul class="list-group">
	        				<?php if (count($category['_children']) < 1) { ?>
					  		<li class="list-group-item">
					  			<?=anchor("order/{$category['_id']}", $category['_name']);?>
					  		</li>
					  		<?php } else { ?>	
					  			<?php foreach ($category['_children'] as $children) { ?>
					  			<li class="list-group-item">
						  			<?=anchor("order/{$children['_id']}", $children['_name']);?>
						  		</li>
						  		<?php } ?>
					  		<?php } ?>
						</ul>

		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
			</div>
		</div>
	<?php } ?>
	
	<script type="text/javascript" src="<?=site_url ('assets/js/jquery.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/tether.min.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/bootstrap.min.js') ;?>"></script>

	<script type="text/javascript" src="<?=site_url ('assets/js/angular.min.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/dirPagination.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/ng-file-upload-all.min.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/ng-file-upload-shim.min.js') ;?>"></script>

	<script type="text/javascript" src="<?=site_url ('assets/js/main.angular.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/services.angular.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/controllers.angular.js') ;?>"></script>
	<script type="text/javascript" src="<?=site_url ('assets/js/directives.angular.js') ;?>"></script>


	<script type="text/javascript">
		$(window).scroll((evt) => {
			var x = getNavLocation ();
			var y = getTustLocation ();
			if (x >= y) {
				$('nav.navbar').removeClass ('white');
				$('nav.navbar').addClass ('xtransbg');
			} else {
				$('nav.navbar').removeClass ('xtransbg');
				$('nav.navbar').addClass ('white');
			}
		});

		function getNavLocation () {
			var nav = $('#navbar').position ();
			return nav.top + 50;
		};

		function getTustLocation () {
			var trust = $('#trust').position ();			
			return trust === null ? 50 : trust.top + 50;
		}

		var about = $('.about-tag');
		$('.about').hide ();
		about.click ((event) => {
			event.preventDefault();
			$('.about').fadeIn (500).delay(1000).fadeOut ();
		});

	</script>

</body>