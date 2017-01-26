<main>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5 class="text-center">
                                Welcome to <b class="default">taskwiser.com</b><br>
                                <small>We are here to make your life easier.</small>
                                <?php if ($this->session->flashdata('authenticate_error')) { ?>
                                    <br>
                                    <small class="text-red font-12 bold">
                                        <?=$this->session->flashdata('authenticate_error');?>
                                    </small>
                                <?php } ?>
                            </h5>

                            <div class="row">
    					        <div class="input-field col-xs-12 col-md-6">
    					        	<input placeholder="enter email" value="<?=set_value ('email');?>" name="email" id="email" 
                                        type="email" class="validate">
    					        	<label for="email">
                                        Email: 
                                        <?=form_error('email', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>

                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="enter tel" name="tel" value="<?=set_value ('tel');?>" 
                                        id="tel" type="tel" class="validate">
                                    <label for="tel">
                                        Tel:
                                        <?=form_error('tel', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="enter password" name="pwd" value="<?=set_value ('pwd');?>" 
                                        id="pwd" type="password" class="validate" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="enter a password with a combination of uppercase alphabets, lowercase alphabets and numbers">
                                    <label for="pwd">
                                        Password:
                                        <?=form_error('pwd', "<span class='text-danger'><small>", "</small></span>");?>   
                                    </label>
                                </div>
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="confirm password" name="re_password" value="<?=set_value ('re_password');?>" 
                                        id="re_password" type="password" class="validate" >
                                    <label for="re_password">
                                        Confirm Password:
                                        <?=form_error('re_password', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="input-field col-xs-12">
                                    <input placeholder="fullname" name="fullname" value="<?=set_value ('fullname');?>" 
                                        id="fullname" type="text" class="validate">
                                    <label for="fullname">
                                        Fullname:
                                        <?=form_error('fullname', "<span class='text-danger'><small>", "</small></span>");?>
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