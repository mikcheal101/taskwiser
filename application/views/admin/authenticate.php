<?=link_tag ('assets/last_design/_sign_in.css');?>
<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;
    height:798px;float:left;clear:left;display:block;z-index:27;">
    <div id="Layer2_Container" style="width:1278px;height:798px;position:relative;margin-left:auto;margin-right:auto;
        margin-top:auto;margin-bottom:auto;text-align:left;">
        <div id="wb_Form1" style="position:absolute;left:299px;top:362px;width:708px;height:385px;z-index:9;">
            <?=form_open('/auth/login', ['autocomplete'=>'off']);?>
                <input type="text" id="Editbox1" style="position:absolute;left:22px;top:145px;width:655px;height:18px;padding:12px!important;line-height:18px;z-index:4;" name="username" value="" placeholder=" User name">
                <input type="password" id="Editbox2" style="position:absolute;left:22px;top:178px;width:655px;height:18px;padding:12px!important;line-height:18px;z-index:5;" name="pwd" value="" placeholder=" password">
                <input type="submit" id="Button1" name="" value=" Login" style="position:absolute;left:217px;top:235px;width:275px;height:47px;z-index:6;">
                <div id="wb_Text1" style="position:absolute;left:296px;top:296px;width:145px;height:16px;z-index:7;text-align:left;">
                    <span style="color:#696969;font-family:Arial;font-size:13px;">&nbsp; Forgot your password?</span>
                </div>
                <div id="wb_Text4" style="position:absolute;left:83px;top:72px;width:534px;height:32px;text-align:center;z-index:8;">
                    <?php 
                        if(!is_null($this->session->flashdata('authenticate_error'))) :
                            $error_ = $this->session->flashdata('authenticate_error');
                            # display the error
                            echo ("<div style='font-size:13px;text-align:center;color:red;'>{$error_}</div>");
                        else :
                    ?>
                    <span style="color:#696969;font-family:Arial;font-size:13px;"> 
                        Welcome back,lets serve you better, and create more free time for you to dowhat you love to do with your free time while we get your tasks done
                    </span>
                    <?php endif; ?>

                </div>
            </form>
        </div>
        <div id="wb_Text5" style="position:absolute;left:524px;top:295px;width:261px;height:58px;text-align:center;z-index:10;">
            <span style="color:#696969;font-family:Arial;font-size:24px;">
                <strong> Login<br>and book a task</strong>
                
            </span>
        </div>
        <div id="wb_Image3" style="position:absolute;left:544px;top:36px;width:199px;height:263px;z-index:11;">
            <img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
        </div>
    </div>
</div>


        <?php 

/*
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
*/

?>