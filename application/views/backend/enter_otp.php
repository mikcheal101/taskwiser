<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--Image Card-->
                <?=form_open('payment/enter_otp');?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>Taskwiser Payment <small>[One Time Password Verification]</small></h5>

                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="enter OTP" name="otp" value="<?=set_value ('otp');?>" id="otp" type="text" class="validate" />
    					        	<label for="otp">
                                        One Time Password (code sent via sms)
                                        <?=form_error('otp', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
                            </div>

                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">
                                Confirm Transaction
                            </button>
                        </div>
                        
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
</main>