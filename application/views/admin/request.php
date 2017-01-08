<main>

    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
            <div class="col-xs-12 ">

            	<div class="author-box">
            		<div class="row">
            			<!--Name-->
            			<h5 class="h5-responsive m-b-0 text-center">
            				Request from 
            				<b class="text-info"><?=$request->customer->fullname;?></b>
            			</h5>
            			<p class="text-center">
            				<small class="font-13 text-ash">
            					<?=date('h:i', strtotime($request->_ts));?> 
            					<u><?=date('d M, Y', strtotime($request->_ts));?></u>
            				</small>
            			</p>

			            <!-- profile details -->
			            <?=form_open();?>
			            	<div class="row">
						    	<div class="col-xs-12 text-center">
						    		<table class="table">
						    			<tr>
						    				<td width="50%" class="text-right">
						    					<?=$request->category->parent->_name;?>
						    				</td>
						    				<td class="text-left">
						    					<?=$request->category->child ? $request->category->child->_name : '';?>
						    				</td>
						    			</tr>

						    			<?php if((int)$request->rooms != 0 && isset($request->rooms)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Rooms: </td>
							    				<td class="text-left"><?=$request->rooms;?></td>
							    			</tr>
							    		<?php } ?>
						    			<?php if((int)$request->liters != 0 && isset($request->liters)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Liters: </td>
							    				<td class="text-left"><?=$request->liters;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->boxes != 0 && isset($request->boxes)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Boxes: </td>
							    				<td class="text-left"><?=$request->boxes;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->shirts != 0 && isset($request->shirts)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Shirts: </td>
							    				<td class="text-left"><?=$request->shirts;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->troussers != 0 && isset($request->troussers)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Troussers: </td>
							    				<td class="text-left"><?=$request->troussers;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->suits != 0 && isset($request->suits)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Suits: </td>
							    				<td class="text-left"><?=$request->suits;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->gowns != 0 && isset($request->gowns)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Gowns: </td>
							    				<td class="text-left"><?=$request->gowns;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->others != 0 && isset($request->others)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Others: </td>
							    				<td class="text-left"><?=$request->others;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->extra != 0 && isset($request->extra)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Extra: </td>
							    				<td class="text-left"><?=$request->extra;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->address != 0 && isset($request->address)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Address: </td>
							    				<td class="text-left"><?=$request->address;?></td>
							    			</tr>
							    		<?php } ?>
							    		<?php if((int)$request->delivery_address != 0 && isset($request->delivery_address)) { ?>
							    			<tr>
							    				<td width="50%" class="text-right">Delivery Address: </td>
							    				<td class="text-left"><?=$request->delivery_address;?></td>
							    			</tr>
							    		<?php } ?>
							    		<tr>
						    				<td width="50%" class="text-right">Status: </td>
						    				<td class="text-left"><?=$request->status->_name;?></td>
						    			</tr>
						    			<tr>
						    				<td width="50%" class="text-right">Assigned Worker: </td>
						    				<td class="text-left">
						    					<?php if($request->worker !== NULL) { ?>
						    						<img class="img img-circle" style="width: 85px!important; padding: 5px!important; border: 1px solid #dedede;" 
						    							src="<?=base_url($request->worker->profile_image);?>" />
						    						<p>
								    					<a href="<?=base_url('admin/worker/'.$request->worker->id);?>">
								    					<?=
										    				"{$request->worker->first_name} ".
										    				(strlen($request->worker->middle_name) > 0 ? $request->worker->middle_name." ":" ").
										    				"{$request->worker->last_name}"
										    				;?>
								    					</a>
								    				</p>
							    				<?php } else { ?>
							    					<img class="img img-circle" style="width: 85px!important; padding: 5px!important; border: 1px solid #dedede;" src="<?=base_url('assets/imgs/profile-blank.png');?>" />
							    					<p>None Selected</p>
							    				<?php 
							    					}
							    				?>
						    				</td>
						    			</tr>
						    			<tr>
						    				<td width="50%" class="text-right">Price NGN:</td>
						    				<td>
						    					<div class="input-field col-md-12">
					    					        <input placeholder="enter price" type="number" 
					    					        	name="amount" value="<?=set_value('amount', $request->price);?>" />
										        </div>
						    				</td>
						    			</tr>
						    		</table>
						    	</div>
						    </div>
				    		<hr>
				    
						    <div class="row m-b-1" ng-app="">
						    	<div class="input-field col-md-12">
	    					        <input placeholder="search for worker" type="text" ng-model="search">
    					        	<label for="search">
                                        Assign Worker:
                                    </label>
						        </div>
						        <div class="col-sm-12" ng-repeat='staff in <?=json_encode($workers);?> track by staff._id'>
						        	<h5 class="col-sm-10">
						        		<input type="radio" class="with-gap" id="staff_{{staff._id}}" name="staff" value="{{staff._id}}" {{staff._id == <?=$request->_assigned_staff;?> ? 'checked':''}} />
						        		<label for="staff_{{staff._id}}">
						        			{{staff.last_name}} {{staff.middle_name}} {{staff.first_name}}
						        		</label>
						        	</h5>
						        	<div class="col-sm-2 text-right">
						        		<img class="img img-rounded" style="width: 50px!important;" src="<?=base_url();?>{{staff.profile_image}}" />
						        	</div>
						        </div>
						    </div>

						    <hr>
						    <div class="row m-t-1">
						    	<div class="col-xs-12 pull-right">
						    		<?=anchor("admin/dropRequest/{$request->_id}", "drop request",[
						    			'class' => "pull-right btn btn-sm btn-danger waves-effect waves-ripple"
						    		]);?>
						    		<button class="btn btn-info btn-sm pull-right" type="submit">assign</button>
						    	</div>
						    </div>
						</form>
            		</div>
            	</div>
            </div>
        </div>
        <!--/.First row-->

    </div>
    <!--/.Main layout-->

</main>

