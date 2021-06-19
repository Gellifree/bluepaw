<?php $this->load->view('common/bootstrap'); ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8">
	<title> <?php echo lang('welcome') ?></title>
</head>
<body>

        <div class="container border pt-2 my-3">
            <h5>  <?php echo lang('welcome').' '; echo $user->first_name; echo ' '.$user->last_name ?>! </h5>  
        </div>
    <div id="container" class="container pt-3 my-3">
        
        
        
        <div class="row">
            <div class="col-">
                <div class="card shadow bg-light" style="width: 150px">
                    <img src="/bluepaw/public/img/profile_rect.png" class="card-img-top"/>
                    <div class="card-body ">
                        <h6 class="card-title"><?php echo $user->first_name; echo ' '.$user->last_name ?></h6>
                        <!-- <p class="card-text"></p> -->
                        <!-- <a href="#" class="btn btn-warning">Gomb</a> -->
                    </div>
                </div>
            </div>
            
          
            <div class="col">
                
                <ul class="list-group ">
                    <li class="list-group-item list-group-item-info"> <?php echo lang('login_identity_label').': '.$user->username; ?> </li>
                    <li class="list-group-item list-group-item-primary"> <?php echo lang('index_email_th').': '.$user->email; ?></li>
                    <li class="list-group-item list-group-item-info"> <?php echo lang('create_user_company_label').' '.$user->company; ?></li>
                </ul>

            </div>  
        </div>

    </div>

</body>
</html>