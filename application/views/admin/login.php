<<<<<<< HEAD
<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>Login Panel</h5>

                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="enter username" name="username" value="<?=set_value ('username');?>" id="username" type="text" class="validate">
    					        	<label for="username">
                                        Username:
                                        <?=form_error('username', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
    					        <div class="input-field col-xs-12">
    					        	<input placeholder="enter password" value="<?=set_value ('password');?>" name="password" id="pwd" type="password" class="validate">
    					        	<label for="password">
                                        Password:
                                        <?=form_error('password', "<span class='text-danger'><small>", "</small></span>");?>
                                    </label>
    					        </div>
                            </div>
                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">login</button>
                            <br>
                            <br>
                            <?=anchor('admin/signup', 'register a new account', ['class' => 'text-center']);?>
                            <br>
                            <?=anchor('admin/forgot_password', 'forgot password', ['class' => 'text-center']);?>
                        </div>
                        
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
=======
<header>
    <nav class="navbar default-color ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-light" href="<?=base_url ('admin');?>">taskwiser</a>
            </div>

        </div>
    </nav>
</header>
<div class="clearfix"></div>
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<!--Image Card-->
                <?=form_open();?>
                    <div class="card hoverable">
                        <div class="card-content">
                            <h5>
                                Login Panel
                                <?php if ($this->session->flashdata('authenticate_error')) ?>
                                    <br><small class="text-red font-12 bold"><?=$this->session->flashdata('authenticate_error');?></small>
                            </h5>

                            <div class="row">
                            	<div class="input-field col-xs-12">
    					        	<input placeholder="enter username" name="username" value="<?=set_value ('username');?>" id="username" type="text" class="validate">
    					        	<label for="username">Username:</label>
    					        </div>
    					        <div class="input-field col-xs-12">
    					        	<input placeholder="enter password" value="<?=set_value ('password');?>" name="password" id="pwd" type="password" class="validate">
    					        	<label for="password">Password:</label>
    					        </div>
                            </div>
                        </div>
                        <!--Buttons-->
                        <div class="card-btn text-center">
                        	<button class="btn btn-default btn-md waves-effect waves-light" type="submit">login</button>
                        </div>
                        <!--/.Buttons-->
                    </div>
                <?=form_close ();?>
                <!--Image Card-->
			</div>
		</div>
	</div>
>>>>>>> origin/master
</main>