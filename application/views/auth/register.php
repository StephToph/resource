<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
        <link href="<?php echo base_url(); ?>assets/css/app.min.css?v=<?php echo rand(); ?>" rel="stylesheet">

    </head>

    <body>
        <div class="app">
            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 full-height">
                    <?php include(APPPATH.'views/auth/left.php'); ?>

                    <div class="col-lg-6 bg-white">
                        <div class="container h-100">
                            <div class="row no-gutters h-100 align-items-center">
                                <div class="col-sm-10 col-lg-8 mx-auto">
                                    <h2 class="text-center">Sign Up</h2>
                                    <p class="m-b-30 text-center">Create your account to get access</p>
                                    
                                    <?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'form-horizontal', 'clear'=>false)); ?>
                                        <div id="bb_ajax_msg"></div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="fullname">Personal/Business Name:</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Personal/Business Name">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label class="font-weight-semibold" for="username">Username:</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                            </div>

                                            <div class="form-group col-6">
                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label class="font-weight-semibold" for="password">Password:</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirm" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="font-weight-semibold">Account Type:</label>
                                                <br/>
                                            </div>
                                            <?php
                                                $types = $this->Crud->read_order('account_type', 'id', 'asc');
                                                if(!empty($types)) {
                                                    $ct = 0;
                                                    foreach($types as $type) {
                                                        $ck = '';
                                                        if($ct == 0) {$ck = 'checked';}
                                                        echo '
                                                            <div class="col-6">
                                                                <div class="radio">
                                                                    <input id="radio'.$ct.'" name="account_type" type="radio" value="'.$type->id.'" '.$ck.'>
                                                                    <label for="radio'.$ct.'">'.$type->display.'</label>
                                                                </div>
                                                            </div>
                                                        ';
                                                        $ct += 1;
                                                    }
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-15">
                                                <div class="checkbox">
                                                    <input id="checkbox" name="agree" type="checkbox" checked>
                                                    <label for="checkbox"><span>I have read the <a href="javascript:;">agreement</a></span></label>
                                                </div>

                                                <button type="submit" class="btn btn-primary bb_form_btn"><i class="anticon anticon-user-add"></i> Sign Up</button>
                                            </div>
                                            
                                            <hr/>
                                            <a class="small" href="<?php echo base_url('login'); ?>"><i class="anticon anticon-login"></i> Sign In</a>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/vendors.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>

    </body>
</html>