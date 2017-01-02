<main>
	<div class="container">
		<div class="row">

			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="">
					<?=form_open('', ['class'=>'card card-panel'])?>
						<div class="card-content" style="padding:0px!important;">
							<div class="card-title" style="color: #333!important; padding:0 10px!important;">
								Profile Details
							</div>

							<div class="input-field col-xs-12" style="margin-top:3rem!important;">
					        	<input placeholder="enter email address" name="email" value='<?=set_value ("email", "{$profile->_email}");?>' type="email" class="validate" autocomplete="off" readonly>
					        	<label for="email">
	                                Email Address:
	                                <?=form_error('email', "<span class='text-danger'><small>", "</small></span>");?>
	                            </label>
					        </div>

					        <div class="input-field col-xs-12">
					        	<input placeholder="enter your fullname" name="fullname" autocomplete="off"
					        		value='<?=set_value ("fullname", "{$profile->fullname}");?>' type="text" class="validate" >
					        	<label for="email">
	                                Fullname:
	                                <?=form_error('fullname', "<span class='text-danger'><small>", "</small></span>");?>
	                            </label>
					        </div>

					        <div class="input-field col-xs-12">
					        	<input placeholder="enter password" name="pwd" value="<?=set_value ('pwd');?>" type="password" class="validate" autocomplete="off">
					        	<label for="pwd">
	                                Password:
	                                <?=form_error('pwd', "<span class='text-danger'><small>", "</small></span>");?>
	                            </label>
					        </div>

					        <div class="input-field col-xs-12">
					        	<input placeholder="enter tel number" name="tel" type="tel" class="validate"
					        		value='<?=set_value ("tel", "{$profile->_tel}");?>' autocomplete="off">
					        	<label for="tel">
	                                Tel:
	                                <?=form_error('tel', "<span class='text-danger'><small>", "</small></span>");?>
	                            </label>
					        </div>

					        
					        <div class="col-xs-12">
	                            <select name="state" class="">
	                            	<option value="">Select State</option>
	                            	<?php foreach($locations->states as $state): ?>
	                            	<optgroup label="-- <?=$state->_name;?>">
	                            		<?php foreach($state->cities as $city){ ?>
	                            		<option value="<?=$city->_id;?>" 
	                            			<?=set_select('state', $city->_id, ($city->_id === $profile->_city));?> 
	                            			><?=$city->_name;?></option>
	                            		<?php } ?>
	                            	</optgroup>
	                            <?php endforeach; ?>
	                            </select>
					        </div>

					        <div class="col-xs-12">
					        	<label for="address">
	                                Address:
	                                <?=form_error('address', "<span class='text-danger'><small>", "</small></span>");?>
	                            </label>
					        	<textarea class="materialize-textarea" name="address" 
					        		value='<?=set_value ("address", "{$profile->address}");?>' 
					        		placeholder="enter address"><?=$profile->address;?></textarea>
					        </div>
						</div>

						<div style="padding-right: 5px!important;">
							<button class="btn btn-sm btn-success pull-right" type="submit">update profile</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>