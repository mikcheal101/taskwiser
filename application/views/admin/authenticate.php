<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--Image Card-->
                <?=form_open('/auth/login', ['autocomplete'=>'off']);?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>
                                Login Panel
                                <?php 
                                    if(!is_null($this->session->flashdata('authenticate_error'))) {
                                        $error_ = $this->session->flashdata('authenticate_error');
                                        # display the error
                                        echo ("<small class='text-danger'>{$error_}</small>");
                                    }
                                ?>

                            </h5>

                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="enter username" name="username" value="<?=set_value ('username');?>" 
                                        id="username" type="email" class="validate" autocomplete="off">
    					        	<label for="username">
                                        Username:
                                        <?=form_error('username', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
    					        <div class="input-field col-xs-12">
    					        	<input placeholder="enter password" value="<?=set_value ('pwd');?>" name="pwd" id="pwd" type="password" class="validate">
    					        	<label for="pwd">
                                        Password:
                                        <?=form_error('pwd', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
                            </div>
                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center m-b-3 p-b-3">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">login</button>
                            <br>
                            <br>
                            <?=anchor('/admin/forgot_password', 'forgot password', ['class' => 'text-center']);?>
                        </div>
                        
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
</main>