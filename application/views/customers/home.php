<section id="top" style="margin-top: 5rem!important;"></section>

<section id="trust" class="container p-b-3 p-r-3 p-l-3 m-l-3 m-r-3">
	<div class="row">
		<div class="col-sm-12 text-center p-t-1 p-b-3">
			<h2 class="">A WORKFORCE BUILT ON TRUST</h2>
		</div>
	</div>
	<div class="row p-l-3 p-r-3 p-b-3">
		<div class="col-sm-3 text-center">
			<div class="icon-image">
				<img src="<?=site_url('assets/icons/five-stars-outlines.png');?>" />
			</div>
			<div>
				<h4 class="bold m-b-2 text-capitalize">100% GUARANTEED</h4>
				<p class="text-ash tahoma">
					not satisfied? We will send you another tasker at no extra cost. We also appreciate your feedback, as this helps us improve our services. So please rate our taskers
				</p>
			</div>
		</div>
		<div class="col-sm-3 text-center">
			<div class="icon-image">
				<img src="<?=site_url('assets/icons/thumb-up.png');?>" />
			</div>
			<div>
				<h4 class="bold m-b-2 ">Convenient</h4>
				<p class="text-ash tahoma">
					We offer convenient, stress free services. we have a wide range of qualified professionals to handle your tasks.
				</p>
			</div>
		</div>
		
		<div class="col-sm-3 text-center">
			<div class="icon-image">
				<img src="<?=site_url('assets/icons/handshake.png');?>" />
			</div>
			<div>
				<h4 class="bold m-b-2 ">Reliable</h4>
				<p class="text-ash tahoma">
					We are efficient and your satisfaction is our priority. You can count on us to be there on time to help.
				</p>
			</div>
		</div>
		<div class="col-sm-3 text-center">
			<div class="icon-image">
				<img src="<?=site_url('assets/icons/locked.png');?>" />
			</div>
			<div>
				<h4 class="bold m-b-2 ">Trusted Services</h4>
				<p class="text-ash tahoma">
					We undergo very rigourous vetting of our taskers. We offer fast, easy and secure form of payment. We will confirm your appointments an hour after it is made.
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
				
				<?php
					$count = count ($categories) / 4;
					$count+= (count ($categories) % 4) > 0 ? 1:0;
					for ($i=0, $k=0; $i<$count; $i++) { ?>
						<div class="col-sm-12">
						<?php
							for ($j=1; $j<=4; $j++) {
								
								if (intval($k) < intval(count($categories) - 1)) {
									$category = $categories[$k++];
									?>
									<div class="p-b-2 col-sm-3 text-center t-icons" data-toggle="modal" data-target="#<?=$category['_id'];?>" style="padding-bottom:70px!important;" data-id="<?=$category['_id'];?>">
										<?=img ($category['_img'], false, array ('alt'=>$category['_name']));?>
										<p class="text-center text-lowercase lighter p-t-1"><?=$category['_name'];?></p>
									</div>
									<?php
								} 
							}
						?>
						</div>
						<?php
					}
				?>
				
			</div>
		</div>
	</div>
</section>