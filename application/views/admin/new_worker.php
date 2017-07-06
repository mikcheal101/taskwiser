<main>

    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <form name="form">
        <div class="row">
            <div class="col-xs-12 ">

            	<div class="author-box">
            		<div class="row">
            			<!--Name-->
            			<h5 class="h5-responsive text-center">
            				New Worker's Profile
            
            			</h5>
            			<hr>

            			<!--Avatar-->
			            <div class="col-xs-12 col-sm-2 text-center">
			                <img style="width: 100%;" src="<?=base_url ('assets/imgs/profile-blank.png');?>" id="passport_placeholder" 
			                	class="img-fluid rounded-circle z-depth-2" />
			                <div ngf-thumbnail="worker.passport" ></div>
			                <br />
			                <br />

			                <div class="button btn" ngf-select ng-model="worker.passport" name="file" ngf-pattern="'image/*'"
							    ngf-accept="'image/*'" ngf-max-size="20MB" ngf-min-height="100"
							    ngf-resize="{width: 100, height: 100}">Select</div>
			                <br>
			            </div>

			            <!-- profile details -->
			            <div class="col-xs-12 col-sm-10">

			            	<div class="row">
						    	<div class="input-field col-md-4">
						        	<input ng-model="worker.fname" placeholder="enter firstname" id="first_name" name="first_name" required type="text" class="validate">
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter middlename" id="middle_name" name="middle_name" ng-model="worker.mname" type="text" class="validate">
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter lastname" id="last_name" name="last_name" ng-model="worker.lname" required type="text" class="validate">
						        </div>
						    </div>
							
							<div class="row">
						    	<div class="input-field col-md-4">
						        	<input placeholder="enter username" id="username"  ng-model="worker.uname" required name="username" type="text" class="validate">
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter password" id="password" name="password" type="password"  ng-model="worker.pwd" required class="validate">
						        </div>
						        <div class="input-field col-md-4">
						        	<input placeholder="enter email address" id="email" name="email" type="email"  ng-model="worker.email" required class="validate">
						        </div>
						    </div>

						    <hr>
						    <div class="row">
						    	<div class="input-field col-md-6">
						        	<textarea placeholder="enter address" name="address" class="materialize-textarea validate"  ng-model="worker.address" required></textarea>
						        </div>

						    	<div class="input-field col-md-6">
						        	<textarea placeholder="enter extra notes" name="extra" class="materialize-textarea validate"  ng-model="worker.notes"></textarea>
						        </div>

						    </div>

						    <div class="row">
						    	<div class="col-md-12">
						    		<h5>Tasks</h5>
							    	<?php 
							    		foreach($tasks as $task) {
							    	?>
							    	<div class="card col-sm-12">
							    		<div class="card-content">
							    			<div class="card-title" style="color:#333!important;">
							    				<?php echo ($task->_name);?>
							    			</div>
							    			<?php if(count($task->children) > 0) { ?>
								    			<div class="row">
									    			<?php foreach($task->children as $child) { ?>
									    			<div class="col-sm-3 form-group"">
									    				<input type="checkbox" id="cat_<?=$child->_id;?>" checklist-model="categories_workers" checklist-value="<?=$child->_id;?>" >
	      												<label for="cat_<?=$child->_id;?>"><?php echo($child->_name); ?> - </label>
									    			</div>
									    			<?php } #end children loop ?>
									    		</div>
									    	<?php } else { ?>
									    		<div class="row">
									    			<div class="col-sm-3">
									    				<input type="checkbox" id="subcat_<?=$task->_id;?>" checklist-model="categories_workers" checklist-value="<?=$child->_id;?>" />
	      												<label for="subcat_<?=$task->_id;?>"><?php echo($task->_name); ?></label>
									    			</div>
									    		</div>
									    	<?php }?>
							    		</div>
							    	</div>
							    	<?php
							    		} 
							    	?>
						    	</div>
						    </div>

			            </div>
            		</div>
            	</div>
            </div>
        </div>
        <!--/.First row-->
        <hr />

        <!--Second row-->
        <div class="row">
        	<button class="btn btn-success pull-right" >save worker</button>
        </div>
        <!--/.Second row-->
        <?=form_close ();?>
    </div>
    <!--/.Main layout-->

</main>

