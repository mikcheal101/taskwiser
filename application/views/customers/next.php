<section id="" class="" style="margin-top:50px;padding-top: 10px;" ng-controller="cntrl">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				
			</div>

			
			<div class="col-md-3">
				<div class="panel panel-default m-t-3">
					<div class="panel-body">
						<h4 class="m-t-1 m-b-1 text-center">Get a price</h4>
						
						<?php if ($location === 0) { ?>			
							<div class="input input-select">
								<select class="" name="" id="">
									<?php foreach ($categories as $cat) { ?>
										<?php if (count($cat['_children']) < 1) { ?>
											<optgroup label="<?=$cat['_name'];?>"></optgroup>
											<option class="text-lowercase" > 
												<?=$cat['_name'];?>
											</option>
										<?php } else { ?>
											<optgroup label="<?=$cat['_name'];?>"></optgroup>
											<?php foreach ($cat['_children'] as $children) { ?>
												<option class="text-lowercase" value="<?=$children['_id'];?>">- <?=$children['_name'];?></option>
											<?php } ?>
										<?php } ?>
									<?php } ?>	
								</select>
							</div>
							<br>						
						<?php } ?>

						<div class="input-text input">
							<input type="text" name="" class="" placeholder="enter email address" />	
						</div>

						
						<h6 class="p-t-1 p-b-1 text-center">Tell us about the job</h6>
						
						<div class="input-number input" input-number="Sample">
							<i class="glyphicon glyphicon-minus left minus"ng-click="minus();"></i>
							<div>
								<span id="number" >{{number}}</span> &nbsp;
								<span>{{text}}</span>
								<input type="hidden" name="sample" ng-model="number" value="{{number}}" />
							</div>	
							<i class="glyphicon glyphicon-plus right plus" ng-click="plus();"></i>
						</div>
						<br>

						<div class="input-number input" input-number="Example">
							<i class="glyphicon glyphicon-minus left minus"ng-click="minus();"></i>
							<div>
								<span id="number" >{{number}}</span> &nbsp;
								<span>{{text}}</span>
								<input type="hidden" name="example" ng-model="number" value="{{number}}" />
							</div>	
							<i class="glyphicon glyphicon-plus right plus" ng-click="plus();"></i>
						</div>
						<br>

						<div class="input input-select">
							<select class="" name="" id="">
								<option>select something</option>
							</select>
						</div>
						<br>

						<div class="input input-textarea">
							<textarea class="" name="" id="" rows="5" placeholder="please describe the job in detail."></textarea>
						</div>

						<hr>
						<span class="btn btn-block btn-success">button</span>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	