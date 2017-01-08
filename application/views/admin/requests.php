<main>
	<div class="container">
		<?php 
			for($i=0; $i<count($requests); $i++) { 
				$request = $requests[$i];

				if($i===0 or $i%4 === 0)
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
                    <?php 
                    	if($request->_status == 1) {
                    		?>
		                    <!--Buttons-->
		                    <div class="card-btn text-center">
		                        <a href="<?=base_url ('admin/request/'.$request->_id);?>" class="btn btn-primary btn-sm waves-effect waves-light">view</a>
		                    </div>
		                    <!--/.Buttons-->
		                    <?php 
		                } else {
		                	?>
		                	<!--Buttons-->
		                    <div class="card-btn text-center">
		                        <a href="<?=base_url ('admin/request/'.$request->_id);?>" class="btn btn-danger btn-sm waves-effect waves-light">update</a>
		                    </div>
		                    <!--/.Buttons-->
		                	<?php
		                }
		            ?>
                </div>
                <!--Image Card-->
				    
            </div>

		<?php 
				if ($i === (count($requests) - 1) or $i%4 === 3)
					echo ('</div>');
			} # end of for loop
		?>
	</div>
</main>