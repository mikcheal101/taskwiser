<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5><?=$title;?></h5>

                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="Transaction Code" name="code" value="<?=set_value ('code', $data->_transaction_code);?>" id="ccnumb" 
                                        type="text" class="validate" title="Transaction Code" readonly />
    					        	<label>
                                        Transaction Code:
                                    </label>
    					        </div>
                            </div>

                            <div class="row">
                                <div class="input-field col-xs-12">
                                    <input placeholder="Email Address" name="email" value="<?=set_value ('email', $data->customer->_email);?>"   id="email" type="text" class="validate" title="Email Address" readonly />
                                    <label>
                                        Email Address:
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col-xs-12">
                                    <input placeholder="Category" name="category" class="validate" title="Category"
                                        value="<?=set_value ('category', $data->category->_name);?>" id="category" type="text" readonly />
                                    <label>
                                        Requested Category:
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                            <form >
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <button class="btn btn-default btn-md waves-effect waves-light" type="button" onclick="payWithPaystack()"> 
                                    Pay <?=NAIRA;?> <?=number_format((int)$data->price, 2);?>
                                </button> 
                            </form>
                             
                            <script>
                                function payWithPaystack(){
                                    var handler = PaystackPop.setup({
                                        key: 'pk_test_a9430b354403cab0d787e94df5edd1b4a5bf586c',
                                        email: '<?=$data->customer->_email;?>',
                                        amount: <?=((int)$data->price * 100);?>,
                                        ref: "<?=$data->_transaction_code;?>",
                                        metadata: {
                                        custom_fields: [{
                                                display_name: "<?=$data->customer->fullname;?>",
                                                variable_name: "mobile_number",
                                                value: "<?=$data->customer->_tel;?>"
                                            }
                                        ]},
                                        callback: function(response){
                                            window.location.href    = "<?=base_url('payment/transaction/');?>" + response.reference;
                                        },
                                        onClose: function(){
                                            alert('Transaction Cancelled!');
                                        }
                                    });
                                    handler.openIframe();
                                }
                            </script>
                        </div>
                        
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
</main>