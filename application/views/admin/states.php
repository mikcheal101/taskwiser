<main>
    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
            <div class="col-xs-12">
            	<table class="table table-stripped">
            		<thead>
            			<th>State</th>
            			<th>City</th>
            			<th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
            		</thead>
            		<tbody>
            			<?php foreach($states as $state){ ?>
	            			<tr>
	            				<td colspan="2"><?=$state['_name'];?></td>
	            				<td class="text-center">
	            					<?=anchor("admin/city/{$state['_id']}", " edit", 
	            						['class'=>"fa text-default fa-pencil waves-effect waves-light"]);?>
	            					&nbsp;&nbsp;&nbsp;
	            					<?=anchor("admin/drop_city/{$state['_id']}", " delete", 
	            						['class'=>"fa text-danger fa-trash waves-effect waves-light"]);?>
	            				</td>
	            			</tr>
	            			<?php foreach($state['cities'] as $city){ ?>
	            				<tr>
	            					<td></td>
	            					<td><?=$city['_name'];?></td>
	            					<td class="text-center">
		            					<?=anchor("admin/city/{$city['_id']}", " edit", 
		            						['class'=>"fa text-default fa-pencil waves-effect waves-light"]);?>
		            					&nbsp;&nbsp;&nbsp;
		            					<?=anchor("admin/drop_city/{$city['_id']}", " delete", 
		            						['class'=>"fa text-danger fa-trash waves-effect waves-light"]);?>
		            				</td>
	            				</tr>
            				<?php } ?>
            			<?php } ?>
            		</tbody>
            	</table>
            </div>
        </div>
        <!--/.First row-->
        <hr>
        <!--Second row-->
        <div class="row">
        	<h4 class="col-xs-12">state Form</h4>
        	<?=form_open('', ['class'=>'col-xs-12 col-md-12', 'novalidate'=>'novalidate']);?>
        		<div class="row">
        			<div class="input-field col-xs-12 col-md-4 sixer">
        				<input type="text" name="name" class="validate" required="required" id="name" value="<?=set_value('name');?>" />
        				<label for="name">
        					State / City Name: 
        					<?=form_error('name', "<span class='text-danger'><small>", "</small></span>");?>
        				</label>
        			</div>
        		
        			<div class=" col-xs-12 col-md-4 text-center sixer">
        				<input class="with-gap" name="is_state" type="checkbox" id="is_state" value="1" 
        					<?=(isset($checked) && $checked) ? 'checked':'';?> />

    					<label for="is_state">
    						Is it a state? 
        					<?=form_error('is_state', "<span class='text-danger'><small>", "</small></span>");?>
    					</label>
        			</div>
        		
        			<div class="input-field col-xs-12 col-md-4 city">
                        <label class="active">
        					Select State:
        					<?=form_error('_main_cat', "<span class='text-danger'><small>", "</small></span>");?>
        				</label>
        				<select name="_main_cat">
                            <option value="" disabled selected>Choose State</option>
                            <?php foreach($states as $state){ ?>
                            <option value="<?=$state['_id'];?>"><?=$state['_name'];?></option>
                            <?php } ?>
                        </select>
        			</div>
        		</div>

        		<hr>

        		<div class="row">
        			<div class="col-xs-12 ">
        				<button type="submit" class="pull-right btn btn-default waves-effect waves-light">save</button>
        			</div>
        		</div>
        	</form>
        </div>
        <!--/.Second row-->

    </div>
    <!--/.Main layout-->

</main>

