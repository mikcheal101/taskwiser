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
            				New Worker's Profile
            				<br>
            				<?php if (validation_errors ()) { ?>
            					<small class="font-12 text-center text-red"><?=validation_errors ();?></small>
            				<?php } if ($this->session->flashdata('save_success')) { ?>
                                <br><small class="text-green font-12 bold"><?=$this->session->flashdata('save_success');?></small>
                            <?php } if ($this->session->flashdata('save_error')) { ?>
                                <br><small class="text-red font-12 bold"><?=$this->session->flashdata('save_error');?></small>
                            <?php } ?>
            			</h5>
            			<hr>

            			<!--Avatar-->
			            <div class="col-xs-12 col-sm-2 text-center">
			                <img style="width: 100%;" src="<?=base_url ('assets/imgs/profile-blank.png');?>" id="passport_placeholder" 
			                	class="img-fluid rounded-circle z-depth-2" />
			                <br>
			                <input type="file" name="passport" id="passport" style="visibility: hidden;" accept="image/*" />
			                <span class="btn btn-info blue btn-sm m-x-0" onclick="openPassport ();">Set profile image</span>

			                <br>
			                <div class="row">
						    	<div class="input-field col-md-12">
						        	<select class="form-control" name="activity" required>
						        		<optgroup label="Moving">
						        			<option value="1">Moving (All)</option>
						        			<option value="11">House Move</option>
						        			<option value="12">Office Move</option>
						        		</optgroup>
						        		<optgroup label="Diesel">
						        			<option value="2">Diesel</option>
						        		</optgroup>
						        		<optgroup label="Cleaner">
						        			<option value="3">Cleaning (All)</option>
						        			<option value="13">House clean</option>
						        			<option value="14">Office Clean</option>
						        		</optgroup>
						        		<optgroup label="Handyman">
						        			<option value="4">Handyman (All)</option>
						        			<option value="17">Electrician</option>
						        			<option value="18">Plumber</option>
						        			<option value="19">Carpenter</option>
						        			<option value="20">Air Condition Repairs</option>
						        			<option value="21">Generator Repairs</option>
						        			<option value="22">Tailor</option>
						        		</optgroup>
						        		<optgroup label="Laundry">
						        			<option value="5">Laundry (All)</option>
						        			<option value="23">Washerman</option>
						        			<option value="24">Dry Cleaning</option>
						        		</optgroup>
						        		<optgroup label="Cooking">
						        			<option value="6">Cook</option>
						        		</optgroup>
						        		<optgroup label="Delivery">
						        			<option value="7">Delivery (All)</option>
						        			<option value="25">Food Delivery</option>
						        			<option value="27">Package Delivery</option>
						        		</optgroup>
						        		<optgroup label="Mechanic">
						        			<option value="8">Mechanic</option>
						        		</optgroup>
						        		<optgroup label="Driver">
						        			<option value="28">Driver For the Day</option>
						        		</optgroup>
						        		<optgroup label="Events">
						        			<option value="10">Events (All)</option>
						        			<option value="29">Cake</option>
						        			<option value="30">Live Band</option>
						        			<option value="31">Drinks (Cocktail)</option>
						        			<option value="32">Photographer</option>
						        		</optgroup>
						        	</select>
						        </div>
						    </div>
			            </div>

			            <!-- profile details -->
			            <div class="col-xs-12 col-sm-10">

			            	<div class="row">
						    	<div class="input-field col-md-4">
						        	<input placeholder="enter firstname" id="first_name" name="first_name" value="<?=set_value ('first_name');?>" type="text" class="validate">
						        	<label for="first_name">First Name:</label>
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter middlename" id="middle_name" name="middle_name" value="<?=set_value ('middle_name');?>" type="text" class="validate">
						        	<label for="middle_name">Middle Name:</label>
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter lastname" id="last_name" name="last_name" value="<?=set_value ('last_name');?>" type="text" class="validate">
						        	<label for="last_name">Last Name:</label>
						        </div>
						    </div>
							
							<div class="row">
						    	<div class="input-field col-md-4">
						        	<input placeholder="enter username" id="username" value="<?=set_value ('username');?>"  name="username" type="text" class="validate">
						        	<label for="username">Username:</label>
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter password" id="password" name="password" type="password" value="<?=set_value ('password');?>" class="validate">
						        	<label for="password">Password:</label>
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter email address" id="email" name="email" type="email" value="<?=set_value ('email');?>" class="validate">
						        	<label for="email">Email address:</label>
						        </div>
						    </div>

						    <hr>
						    <div class="row">
						    	<div class="input-field col-md-6">
						        	<textarea placeholder="enter address" name="address" class="materialize-textarea validate" ><?=set_value('address');?></textarea>
						        	<label for="address">Address:</label>
						        </div>

						    	<div class="input-field col-md-6">
						        	<textarea placeholder="enter extra notes" name="extra" class="materialize-textarea validate"><?=set_value('extra');?></textarea>
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
        	<button class="btn btn-success pull-right" >save worker</button>
        </div>
        <!--/.Second row-->
        <?=form_close ();?>
    </div>
    <!--/.Main layout-->

</main>

