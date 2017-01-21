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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right">
                    <li class=" <?= ($location === 1) ? 'active' : '';?>">
                        <a class="waves-effect waves-light" href="<?=base_url ('backend/');?>">
                            home / orders
                            <?php ($location === 1) ? '<span class="sr-only">(current)</span>' : '';?>
                        </a>
                    </li>
                    <li class="<?= ($location === 2) ? 'active' : '';?>">
                        <a class="waves-effect waves-light" href="<?=base_url ('backend/payments');?>">
                            payments
                            <?php ($location === 2) ? '<span class="sr-only">(current)</span>' : '';?>
                        </a>
                    </li>
                    <li class="dropdown <?= ($location === 3) ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" 
                        	aria-expanded="false">
                            <?=$this->session->user->_username;?>
                            <?php ($location === 3) ? '<span class="sr-only">(current)</span>' : '';?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?=base_url ('backend/profile');?>">Profile</a>    
                            </li>
                            <li>
                                <a href="<?=base_url ('backend/signout');?>">logout</a>
                            </li>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="clearfix"></div>