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
</main>