<main>
    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
        	<h4 class="col-xs-12">state Form</h4>
        	<?=form_open('', ['class'=>'col-xs-12 col-md-12', 'novalidate'=>'novalidate']);?>
        		<div class="row">
        			<div class="input-field col-xs-12 col-md-4 sixer">
        				<input type="text" name="name" class="validate" required="required" id="name" 
        					value="<?=set_value('name', "{$city['_name']}");?>" />
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
                            <option  <?=is_null($city['_main_cat']) ? "selected":"";?> value="">Choose State</option>
                            <?php foreach($states as $state){ ?>
	                            <option <?=$state['_id'] === $city['_main_cat'] ? "selected":"";?> 
	                            	value="<?=(int)$state['_id'];?>"><?=$state['_name'];?></option>
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
        <!--/.First row-->

    </div>
    <!--/.Main layout-->

</main>

