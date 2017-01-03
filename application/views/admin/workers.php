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
