<main>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>
                                taskwiser <b>registration</b> Panel
                                <?php if ($this->session->flashdata('authenticate_error')) { ?>
                                    <br>
                                    <small class="text-red font-12 bold">
                                        <?=$this->session->flashdata('authenticate_error');?>
                                    </small>
                                <?php } ?>
                            </h5>

                            <div class="row">
                            	<div class="input-field col-xs-12 col-md-6">
    					        	<input placeholder="enter username" name="username" value="<?=set_value ('username');?>" id="username" type="text" class="validate">
    					        	<label for="username">
                                        Username:
                                        <?=form_error('username', "<span class='text-danger'><small>", "</small></span>");?>   
                                    </label>
    					        </div>
    					        <div class="input-field col-xs-12 col-md-6">
    					        	<input placeholder="enter email" value="<?=set_value ('email');?>" name="email" id="email" 
                                        type="email" class="validate">
    					        	<label for="email">
                                        Email: 
                                        <?=form_error('email', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
                            </div>

                            <div class="row">
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="enter password" name="password" value="<?=set_value ('password');?>" 
                                        id="password" type="text" class="validate">
                                    <label for="password">
                                        Password:
                                        <?=form_error('password', "<span class='text-danger'><small>", "</small></span>");?>   
                                    </label>
                                </div>
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="confirm password" name="re_password" value="<?=set_value ('re_password');?>" 
                                        id="re_password" type="text" class="validate">
                                    <label for="re_password">
                                        Confirm Password:
                                        <?=form_error('re_password', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="enter tel" name="tel" value="<?=set_value ('tel');?>" 
                                        id="tel" type="text" class="validate">
                                    <label for="tel">
                                        Tel:
                                        <?=form_error('tel', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="fullname" name="fullname" value="<?=set_value ('fullname');?>" 
                                        id="fullname" type="text" class="validate">
                                    <label for="fullname">
                                        Fullname:
                                        <?=form_error('fullname', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <select>
                                        <option value="" disabled selected>Choose State</option>
                                        <option value="1">Lagos State</option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <select>
                                        <option value="" disabled selected>Choose City</option>
                                        <option value="1">Ikorodu</option>
                                        <option value="2">Yaba</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="input-field col-xs-12 col-md-12">
                                    <textarea class="materialize-textarea" name="address" placeholder="enter address"></textarea>
                                    <label for="address">
                                        Address:
                                        <?=form_error('address', "<span class='text-danger'><small>", "</small></span>");?></small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">register</button>
                            <br>
                            <br>
                            an account owner? 
                            <?=anchor('admin/login', 'sign in here', ['class' => 'text-center']);?>
                        </div>
                        
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
</main>