<<<<<<< HEAD
<main>
	<div class="container">
		<?php 
			for($i=0; $i<count($requests); $i++) { 
				$request = $requests[$i];
				if($i===0 or $i%3 === 0)
					echo ('<div class="row">');
		?>		
			<div class="col-md-3 m-b-2">
				<div class="card hoverable">
                    <div class="card-content">
                        <h6>
                        	<?="{$request->category->parent->_name} ".($request->category->child ? "({$request->category->child->_name})" : "");?> 
                        </h6>
                        <small class=""><?="{$request->_ts}";?></small>
                        <hr />
                        
                        <p><?="{$request->extra}";?></p>
                    </div>
                    <!--Buttons-->
                    <div class="card-btn text-center">
                        <a href="<?=base_url ('admin/request/'.$request->_id);?>" class="btn btn-primary btn-md waves-effect waves-light">Read more</a>
                    </div>
                    <!--/.Buttons-->
                </div>
                <!--Image Card-->
				    
            </div>

		<?php 
				if ($i===3 or $i%3===2)
					echo ('</div>');
			} # end of for loop
		?>
	</div>
=======
<main>
	<div class="container">
		
		<?php for($k=0; $k<4; $k++) { ?>		
		<div class="row">

			<?php for($i=0; $i<4; $i++) { ?>
			<div class="col-md-3 m-b-2">
				<div class="card hoverable">
                    <div class="card-content">
                        <h6>Task Type might <small class="pull-right">12:00 13/01/2016</small></h6>
                        <p>This is a brief description of the task not mre than 200 characters ...</p>
                    </div>
                    <!--Buttons-->
                    <div class="card-btn text-center">
                        <a href="<?=base_url ('admin/request/1');?>" class="btn btn-primary btn-md waves-effect waves-light">Read more</a>
                    </div>
                    <!--/.Buttons-->
                </div>
                <!--Image Card-->
				    
            </div>

			<?php } ?>
		</div>
		<?php } ?>
	</div>
>>>>>>> origin/master
</main>