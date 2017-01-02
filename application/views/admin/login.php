<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>Login Panel</h5>

                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="enter username" name="username" value="<?=set_value ('username');?>" id="username" type="text" class="validate">
    					        	<label for="username">
                                        Username:
                                        <?=form_error('username', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
    					        <div class="input-field col-xs-12">
    					        	<input placeholder="enter password" value="<?=set_value ('password');?>" name="password" id="pwd" type="password" class="validate">
    					        	<label for="password">
                                        Password:
                                        <?=form_error('password', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
                            </div>
                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">login</button>
                            <br>
                            <br>
                            <?=anchor('admin/signup', 'register a new account', ['class' => 'text-center']);?>
                            <br>
                            <?=anchor('admin/forgot_password', 'forgot password', ['class' => 'text-center']);?>
                        </div>
                        
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
</main>