<main>

    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
            <div class="col-xs-12 mb-4">

            	<div class="author-box">
            		<?=form_open_multipart ();?>
	            		<div class="row">
	            			<!--Name-->
	            			<h4 class="h4-responsive text-center">
	            				<?=$this->session->user->username;?>'s Profile
	            				<br>
	            				<?php if (validation_errors ()) { ?>
	            					<small class="font-12 text-center text-red"><?=validation_errors ();?></small>
	            				<?php } if ($this->session->flashdata('update_success')) { ?>
                                    <br><small class="text-green font-12 bold"><?=$this->session->flashdata('update_success');?></small>
                                <?php } if ($this->session->flashdata('update_error')) { ?>
                                    <br><small class="text-red font-12 bold"><?=$this->session->flashdata('update_error');?></small>
                                <?php } ?>
	            			</h4>
	            			<hr>

	            			<!--Avatar-->
				            <div class="col-xs-12 col-sm-2 text-center">
				            	<?php if ($this->session->user->profile_image) { ?>
				                	<img style="width: 100%;" src="<?=base_url ('uploads/');?><?=$this->session->user->profile_image;?>" id="passport_placeholder" class="img-fluid rounded-circle z-depth-2" />
				                <?php } else { ?>
				                	<img style="width: 100%;" src="<?=base_url ('assets/imgs/profile-blank.png');?>" id="passport_placeholder" class="img-fluid rounded-circle z-depth-2" />
				                <?php } ?>
				                <br>
				                <input type="file" name="passport" id="passport" style="visibility: hidden;" accept="image/*" />
				                <span class="btn btn-info blue btn-sm m-x-0" onclick="openPassport ();">change profile image</span>
				            </div>

				            <!-- profile details -->
				            <div class="col-xs-12 col-sm-10">
				            	<div class="card-block">
				            		<!-- body -->
				            		<div class="md-form">
				            			<i class="fa fa-user prefix"></i>
				            			<label for="username">Username:</label>
				            			<input type="text" id="username" name="username" class="form-control" value="<?=$profile->username;?>" />
				            			
				            		</div>

				            		<div class="md-form">
				            			<i class="fa fa-lock prefix"></i>
				            			<label for="">Password:</label>
				            			<input type="password" id="password" name="password"  value="<?=$profile->pwd;?>" class="form-control" />
				            		</div>

				            		<div class="md-form">
				            			<i class="fa fa-envelope prefix"></i>
				            			<label for="email">Email Address:</label>
				            			<input type="text" id="" name="email" class="form-control"  value="<?=$profile->email;?>" />
				            		</div>

				            		<div class="text-center text-md-right">
				            			<button class="btn btn-success">submit</button>
				            		</div>
				            	</div>
				            </div>
	            		</div>
            		<?=form_close ();?>
            	</div>
            </div>
        </div>
        <!--/.First row-->

        <!--Second row-->
        <div class="row">
            
        </div>
        <!--/.Second row-->
    </div>
    <!--/.Main layout-->

</main>

