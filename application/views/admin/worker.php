<main>

    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <?=form_open_multipart ();?>
	        <div class="row">
	            <div class="col-xs-12 ">

	            	<div class="author-box">
	            		
	            		<div class="row">
	            			<!--Name-->
	            			<h5 class="h5-responsive text-center">
	            				<?=$worker->username;?>'s Profile
	            				<br>
	            				<?php if (validation_errors ()) { ?>
	            					<small class="font-12 text-center text-red"><?=validation_errors ();?></small>
	            				<?php } if ($this->session->flashdata('update_success')) { ?>
	                                <br><small class="text-green font-12 bold"><?=$this->session->flashdata('update_success');?></small>
	                            <?php } if ($this->session->flashdata('update_error')) { ?>
	                                <br><small class="text-red font-12 bold"><?=$this->session->flashdata('update_error');?></small>
	                            <?php } ?>
	            			</h5>
	            			<hr>

	            			<!--Avatar-->
				            <div class="col-xs-12 col-sm-2 text-center">
				                <?php if ($worker->profile_image) { ?>
				                	<img style="width: 100%;" src="<?=base_url ('uploads/');?><?=$worker->profile_image;?>" id="passport_placeholder" class="img-fluid rounded-circle z-depth-2" />
				                <?php } else { ?>
				                	<img style="width: 100%;" src="<?=base_url ('assets/imgs/profile-blank.png');?>" id="passport_placeholder" class="img-fluid rounded-circle z-depth-2" />
				                <?php } ?>
				                <br>
				                <input type="file" name="passport" id="passport" style="visibility: hidden;" accept="image/*" />
				                <span class="btn btn-info blue btn-sm m-x-0" onclick="openPassport ();">change profile image</span>
				                <br>
				                <div class="row">
							    	<div class="input-field col-md-12">

							        	<select class="form-control" name="activity" required>
							        		<optgroup label="Moving">
							        			<option <?=($worker->task == '1') ? 'selected':'';?> value="1">Moving (All)</option>
							        			<option <?=($worker->task == '11') ? 'selected':'';?> value="11">House Move</option>
							        			<option <?=($worker->task == '12') ? 'selected':'';?> value="12">Office Move</option>
							        		</optgroup>
							        		<optgroup label="Diesel">
							        			<option <?=($worker->task == '2') ? 'selected':'';?> value="2">Diesel</option>
							        		</optgroup>
							        		<optgroup label="Cleaner">
							        			<option <?=($worker->task == '3') ? 'selected':'';?> value="3">Cleaning (All)</option>
							        			<option <?=($worker->task == '13') ? 'selected':'';?> value="13">House clean</option>
							        			<option <?=($worker->task == '14') ? 'selected':'';?> value="14">Office Clean</option>
							        		</optgroup>
							        		<optgroup label="Handyman">
							        			<option <?=($worker->task == '4') ? 'selected':'';?> value="4">Handyman (All)</option>
							        			<option <?=($worker->task == '17') ? 'selected':'';?> value="17">Electrician</option>
							        			<option <?=($worker->task == '18') ? 'selected':'';?> value="18">Plumber</option>
							        			<option <?=($worker->task == '19') ? 'selected':'';?> value="19">Carpenter</option>
							        			<option <?=($worker->task == '20') ? 'selected':'';?> value="20">Air Condition Repairs</option>
							        			<option <?=($worker->task == '21') ? 'selected':'';?> value="21">Generator Repairs</option>
							        			<option <?=($worker->task == '22') ? 'selected':'';?> value="22">Tailor</option>
							        		</optgroup>
							        		<optgroup label="Laundry">
							        			<option <?=($worker->task == '5') ? 'selected':'';?> value="5">Laundry (All)</option>
							        			<option <?=($worker->task == '23') ? 'selected':'';?> value="23">Washerman</option>
							        			<option <?=($worker->task == '24') ? 'selected':'';?> value="24">Dry Cleaning</option>
							        		</optgroup>
							        		<optgroup label="Cooking">
							        			<option <?=($worker->task == '6') ? 'selected':'';?> value="6">Cook</option>
							        		</optgroup>
							        		<optgroup label="Delivery">
							        			<option <?=($worker->task == '7') ? 'selected':'';?> value="7">Delivery (All)</option>
							        			<option <?=($worker->task == '25') ? 'selected':'';?> value="25">Food Delivery</option>
							        			<option <?=($worker->task == '27') ? 'selected':'';?> value="27">Package Delivery</option>
							        		</optgroup>
							        		<optgroup label="Mechanic">
							        			<option <?=($worker->task == '8') ? 'selected':'';?> value="8">Mechanic</option>
							        		</optgroup>
							        		<optgroup label="Driver">
							        			<option <?=($worker->task == '28') ? 'selected':'';?> value="28">Driver For the Day</option>
							        		</optgroup>
							        		<optgroup label="Events">
							        			<option <?=($worker->task == '10') ? 'selected':'';?> value="10">Events (All)</option>
							        			<option <?=($worker->task == '29') ? 'selected':'';?> value="29">Cake</option>
							        			<option <?=($worker->task == '30') ? 'selected':'';?> value="30">Live Band</option>
							        			<option <?=($worker->task == '31') ? 'selected':'';?> value="31">Drinks (Cocktail)</option>
							        			<option <?=($worker->task == '32') ? 'selected':'';?> value="32">Photographer</option>
							        		</optgroup>
							        	</select>
							        </div>
							    </div>
							    <div class="row m-t-1">
							    	<div class="col-md-12">
							    		<p class="text-left"><strong class="">status:</strong> active</p>
							    		<p class="text-left"><strong class="">completed tasks:</strong> 0</p>
							    	</div>
							    </div>
				            </div>

				            <!-- profile details -->
				            <div class="col-xs-12 col-sm-10">

				            	<div class="row">
							    	<div class="input-field col-md-4">
							        	<input placeholder="enter firstname" id="first_name" type="text" name="first_name" required value="<?=set_value ('first_name', $worker->first_name);?>" class="validate">
							        	<label for="first_name">First Name:</label>
							        </div>
							        <div class="input-field col-md-4">
							        	<input placeholder="enter middlename" id="middle_name" type="text" name="middle_name" value="<?=set_value ('middle_name', $worker->middle_name);?>" class="validate">
							        	<label for="middle_name">Middle Name:</label>
							        </div>
							        <div class="input-field col-md-4">
							        	<input placeholder="enter lastname" id="last_name" type="text" class="validate" name="last_name" value="<?=set_value ('last_name', $worker->last_name);?>" required>
							        	<label for="last_name">Last Name:</label>
							        </div>
							    </div>
								
								<div class="row">
							    	<div class="input-field col-md-4">
							        	<input placeholder="enter username" id="username" type="text" name="username" class="validate" value="<?=set_value ('username', $worker->username);?>" required>
							        	<label for="username">Username:</label>
							        </div>
							        <div class="input-field col-md-4">
							        	<input placeholder="enter password" id="password" type="text" name="pwd" class="validate" value="<?=set_value ('pwd', $worker->pwd);?>">
							        	<label for="password">Password:</label>
							        </div>
							        <div class="input-field col-md-4">
							        	<input placeholder="enter email address" id="email" name="email" type="email" class="validate" value="<?=set_value ('email', $worker->email);?>" required>
							        	<label for="email">Email address:</label>
							        </div>
							    </div>

							    <hr>
							    <div class="row">
							    	<div class="input-field col-md-6">
							        	<textarea placeholder="enter address" name="address" class="materialize-textarea validate" required><?=set_value ('address', $worker->address);?></textarea>
							        	<label for="address">Address:</label>
							        </div>

							    	<div class="input-field col-md-6">
							        	<textarea placeholder="enter extra notes" name="notes" class="materialize-textarea validate"><?=set_value ('notes', $worker->notes);?></textarea>
							        	<label for="extra notes">Extra Notes:</label>
							        </div>
							    </div>

				            </div>
	            		</div>
	            	</div>
	            </div>
	        </div>
	        <!--/.First row-->
	        <hr />

	        <!--Second row-->
	        <div class="row">
	        	<button class="btn btn-success pull-right" type="submit">commit changes</button>
	        </div>
	        <!--/.Second row-->
        <?=form_close ();?>
    </div>
    <!--/.Main layout-->

</main>

