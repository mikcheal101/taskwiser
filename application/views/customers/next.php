<?php
	$email_address 		= $this->session->user->_email ?? '';
	$mobile_number		= $this->session->user->_tel ?? '';
	$name				= $this->session->user->fullname ?? '';
	$email_readonly		= (strlen($email_address) > 0) ? 'readonly' : '';
	$email_readonly		= (strlen($email_address) > 0) ? 'readonly' : '';
	$name_readonly		= (strlen($name) > 0) ? 'readonly' : '';
?>

<section id="" class="" style="margin-top:50px; padding-top: 10px; background-color: #3db3e4!important; " ng-controller="cntrl">
	<div class="container">
		<div class="row">
			<div class="col-md-9 pull-left" style="color:#ffffff!important;">
				<?php 
					$x = $category['questions']; 
					
					function array_in($_needle, $_array) {
						foreach($_array as $key=>$value){
							if ((int)$_needle === (int)$value->_question){
								return true;
							}
						}
						return false;
					}					
				?>

				<?php 
					
					if(is_null($category['parent'])) {
						$img = base_url($category['_img']);
						echo ("<h1><img src='{$img}' class='img img-responsive' style='width:60px; padding-bottom: 20px!important;'/> {$category['_name']}</h1>");
					} else {
						$img = base_url($category['parent']['_img']);
						echo ("<h1><img src='{$img}' class='img img-responsive' style='width:60px; padding-bottom: 20px!important;'/>{$category['parent']['_name']} <small style='color:#FFFFFF!important;'>({$category['_name']})</small></h1>"); 
					}
				?>
				<h2>welcome to taskwiser. </h2>
				<h4>we are here to make your life easier...</h4>
			</div>

			<div class="col-md-3">
				<form action="" name="form" method="POST" novalidate>
					<?=validation_errors();?>
					<div class="panel panel-default m-t-3">
						<div class="panel-body">
							<h4 class="m-t-1 m-b-1 text-center">
								Get a price
							</h4>
							
							<div class="input-text input">
								<input type="text" name="name" class="" placeholder="enter full name eg John Doe" required="required" 
									value="<?=set_value('name', $name);?>" <?=$name_readonly;?> />	
							</div>

							<div class="input-text input">
								<input type="email" name="email" class="" placeholder="enter email address" required="required" 
									value="<?=set_value('email', $email_address);?>" <?=$email_readonly;?> />	
							</div>

							<div class="input-text input p-t-1">
								<input type="text" name="tel" class="" placeholder="enter mobile number" required="required" 
									value="<?=set_value('tel', $mobile_number);?>" <?=$mobile_readonly;?> />	
							</div>

							
							<h6 class="p-t-1 p-b-1 text-center" ng-show="<?=count($x) > 0;?>">
								<!--
									Tell us about the job
								-->
							</h6>
							
							<!-- # of rooms -->
							<input-number text="Rooms" name="rooms" ng-show="<?=array_in('1', $x);?>"></input-number>

							<?php if(array_in('6', $x)) { ?>
								<input-number text="Liters" size="500" name="liters" ng-show="<?=array_in('6', $x);?>"></input-number>
							<?php } ?>

							<input-number text="Boxes" name="boxes" ng-show="<?=array_in('7', $x);?>"></input-number>

							<!-- clothes -->
							<div ng-show="<?=array_in('10', $x);?>">
								<input-number text="shirts" name="shirts" ></input-number>
								<input-number text="troussers" name="troussers" ></input-number>
								<input-number text="suits" name="suits" ></input-number>
								<input-number text="gowns" name="gowns" ></input-number>
								<input-number text="others" name="others" ></input-number>
							</div>
							<!-- ./clothes -->

							<!-- date and time -->
							<div class="input-text input" style="margin-bottom: 10px;">
								<input type="text" name="date" ng-show="<?=array_in('3', $x);?>" 
									placeholder="date: DD.MM.YY" 
									pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{2}">
							</div>

							<div class="input-text input" style="margin-bottom: 10px;">
								<input type="text" name="time" ng-show="<?=array_in('4', $x);?>" 
									placeholder="HH : MM Am or Pm"
									pattern="(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9]){1}( (a|A)(M|m)| (p|P)(M|m))">
							</div>
							<!-- date and time -->

							<!-- duration required -->
							<div ng-show="<?=array_in('9', $x);?>">
								<div class="input input-select">
									<select class="" name="" id="" ng-model="duration" ng-change="change();">
										<option selected="selected" value="0">Select Duration...</option>
										<option value="1">One Day</option>
										<option value="2">One Week</option>
										<option value="3">One Month</option>
										<option value="4">Less than a day</option>
									</select>
								</div>
								<br>
								<input-number text="hours" name="hours" ng-show="duration == 4"></input-number>
							</div>
							<!-- duration required -->

							<div ng-show="<?=array_in('2', $x);?>">
								<div class="input input-textarea">
									<textarea class="" name="address" id="" rows="5" placeholder="Address."></textarea>
								</div>
								<br>
							</div>

							<div ng-show="<?=array_in('11', $x);?>">
								<div class="input input-textarea">
									<textarea class="" name="delivery address" id="" rows="5" placeholder="Delivery Address."></textarea>
								</div>
								<br>
							</div>

							<div ng-show="<?=array_in('8', $x);?>">
								<div class="input input-select">
									<select class="" name="" id="">
										<option>I need help...</option>
										<option value="1">I need help Moving</option>
										<option value="2">I need help moving just boxes</option>
									</select>
								</div>
								<br>
							</div>

							<div ng-show="<?=array_in('5', $x);?>">
								<div class="input input-textarea">
									<textarea class="" name="extra" id="" rows="5" 
										placeholder="please describe the job in detail."></textarea>
								</div>
							</div>

							<div ng-show="<?=count($x) > 0;?>">
								<hr>
								<button type="submit" class="btn btn-block btn-success">Get Quote</button>
								<br>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

	