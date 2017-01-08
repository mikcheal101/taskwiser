<!-- lower part of email -->
<tr>
    <td class="innerpadding borderbottom">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="h2" style="text-align: center; font-size: 12px!important; font-weight: bold!important; line-height: 20px!important; padding: 0px!important;">
                    Dear <?=$email;?>,
                </td>
            </tr>
            <tr>
                <td class="bodycopy" style="text-align: center; font-size: 12px!important">
                    <p style="padding: 0 5px!important; margin: 0px!important">
                    	<p>
                            Your order 
                            <b style="text-transform: uppercase;"><?=$quote->_transaction_code;?></b>
                        </p>
                        <p>dated: <?=date('dS M, y h:i', strtotime($quote->_ts));?>, has been processed.</p>
                    </p>
                    <p>
                    	<b>Order:</b>
                    </p>
                    <p>
                    	<code>
	                    	<?php
	                    		if(!is_null($quote->parent))
	                    			echo $quote->parent->_name;
	                    		if(!is_null($quote->sub_category))
	                    			echo " - [{$quote->sub_category->_name}]";
	                    	?>
	                    </code>
                    </p>
                    <b>tasker:</b>	
                    <p>
                    	<?php
                    		$name = $quote->staff->last_name; 
                    		$name.= strlen($quote->staff->middle_name) > 0 ? " {$quote->staff->middle_name}": "";
                    		$name.= " {$quote->staff->first_name}";

                    		$img = base_url("{$quote->staff->profile_image}");
                    		if(!is_null($quote->staff)) {
                    			echo ("<img src='{$img}' class='staff_img' />");
                        		echo ("<p>{$name}</p>");
                    		}
                    	?>
                    </p>
                    
                    <hr class="hr" />
                    <p>
                    	<b>Price:</b>
                    </p>
                    <p style="font-size: 30px!important;">
                    	<?php
                    		$amount = number_format(30000, 2);
                    		echo NAIRA." {$amount}";
                    	?>
                    </p>
                    <p>
                    	<?php
                    		$location = base_url($pay_url);
                    	?>
                    	<a href="<?=$location;?>" class="payBtn">pay now</a>
                    </p>
                    <br style="padding-bottom: 10px;">
                    <span style="font-size: 12px!important; color: #153643;">
                        click <a href="<?=base_url().$login_url;?>">here</a> to login to your taskwiser account
                    </span>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!-- end of lower email part -->
