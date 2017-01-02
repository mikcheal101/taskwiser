<<<<<<< HEAD
<main>
    <div class="container">
        <a href="<?=base_url ('admin/createWorker');?>" class="btn-floating btn-large waves-effect waves-light green addBtn">
            <i class="glyphicon glyphicon-plus"></i>
        </a>

        <?php 
            for($i=0; $i<count($workers); $i++) { 
                $worker = $workers[$i];

                if($i===0 or $i%3 === 0)
                    echo ('<div class="row">');
        ?>      
            <div class="col-md-3 m-b-2">
                <div class="card hoverable">
                    <div class="card-image">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <div style="
                                background-image: url('<?=base_url($worker->profile_image);?>');
                                background-size: cover; height: 200px!important; background-position: center;
                                background-repeat: no-repeat;">
                                
                            </div>
                            <a href="#">
                                <div class="mask waves-effect"></div>
                            </a>
                        </div>
                    </div>

                    <div class="card-content">
                        <h6>
                            <?=($worker->first_name) ." ". (strlen($worker->middle_name) > 0 ? $worker->middle_name ." " : "") ."". ($worker->last_name);?>
                        </h6>
                        <p><?=$worker->notes;?></p>
                    </div>
                    <!--Buttons-->
                    <div class="card-btn text-center">
                        <a href="<?=base_url ('admin/worker/');?><?=$worker->_id;?>" class="btn btn-primary btn-md waves-effect waves-light">Vew Details</a>
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
</main>
=======
<main>
	<div class="container">
		
        <a href="<?=base_url ('admin/createWorker');?>" class="btn-floating btn-large waves-effect waves-light green addBtn"><i class="glyphicon glyphicon-plus"></i></a>

		<?php 
            $x = count ($workers) / 4;
            $x+= count ($workers) % 4;

            for ($a=0, $j=0; $a<$x; $a++) {
        ?>		
		<div class="row">

			<?php 
                for($i=0; $i<4 && array_key_exists ($j, $workers); $i++,$j++) { 
                    $worker = $workers[$j];
                    $worker->profile_image = strlen($worker->profile_image) > 0 ? "uploads/{$worker->profile_image}" : 'assets/imgs/profile-blank.png';
            ?>
			<div class="col-md-3 m-b-2">
				<div class="card hoverable">
                    <div class="card-image">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <div style="
                                background-image: url('<?=base_url ('');?><?=$worker->profile_image;?>');
                                background-size: cover; height: 200px!important; background-position: center;
                                background-repeat: no-repeat;">
                                
                            </div>
                            <a href="#">
                                <div class="mask waves-effect"></div>
                            </a>
                        </div>
                    </div>
                    <div class="card-content">
                        <h6><?=($worker->first_name) ." ". (strlen($worker->middle_name) > 0 ? $worker->middle_name ." " : "") ."". ($worker->last_name);?></h6>
                        <p><?=$worker->notes;?></p>
                    </div>
                    <!--Buttons-->
                    <div class="card-btn text-center">
                        <a href="<?=base_url ('admin/worker/');?><?=$worker->__id;?>" class="btn btn-primary btn-md waves-effect waves-light">Read more</a>
                    </div>
                    <!--/.Buttons-->
                </div>
                <!--Image Card-->
				    
            </div>

			<?php } ?>
		</div>
		<?php } ?>

        <!--
        <ul class="pagination pag-circle">
            <li><a href="#!"><i class=""></i></a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>  
        -->
	</div>
</main>
>>>>>>> origin/master
