<!-- 

5840 4061 8755 3286
09/18
116
1111
-->
<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>Taskwiser Payment <small>[Credit Card Details]</small></h5>
                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="Card Number" name="ccnumb" value="<?=set_value ('ccnumb');?>" id="ccnumb" type="text" class="validate" pattern="(([0-9]{4}( )?){3})+[0-9]{1,4}( )?([0-9]{1,3})?" title="enter a valid credit card number" />
    					        	<label for="ccnumb">
                                        CARD NUMBER
                                        <?=form_error('ccnumb', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
                            </div>

                            <div class="row">
                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="MM / YY" name="expiry" value="<?=set_value ('expiry');?>" id="expiry" 
                                        type="text" class="validate" max-length="4" title="enter a valid date eg: 12/17" 
                                        pattern="([0][0-9]|[1][0-2])\/[1-9][0-9]">
                                    <label for="expiry">
                                        MM/ YY
                                        <?=form_error('expiry', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>

                                <div class="input-field col-xs-12 col-md-6">
                                    <input placeholder="CVV" value="<?=set_value('cvv');?>" name="cvv" id="cvv" type="text" class="validate" max-length="4" title="enter a valid cvv" pattern="[0-9]{3,4}">
                                    <label for="cvv">
                                        CVV
                                        <?=form_error('cvv', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col-xs-12">
                                    <input placeholder="PIN" value="<?=set_value ('pin');?>" name="pin" id="pin" type="password" class="validate" title="enter a valid pin" pattern="[0-9]{4,6}">
                                    <label for="pin">
                                        PIN
                                        <?=form_error('pin', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">
                                PAY <?=NAIRA;?> <?=number_format($amount, 2);?>  
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