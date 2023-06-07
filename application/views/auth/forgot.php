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
                                    <h2>Forgot Password</h2>
                                    <p class="m-b-30">Reset your password</p>
                                    
                                    <?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'form-horizontal', 'clear'=>false)); ?>
                                        <div id="bb_ajax_msg"></div>

                                        <?php if($type == 'forgot') { ?>
                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="userid">Username / Email:</label>
                                                <div class="input-affix">
                                                    <i class="prefix-icon anticon anticon-user"></i>
                                                    <input type="text" class="form-control" id="userid" name="userid" placeholder="Username / Email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary bb_form_btn">Submit</button>
                                                <a href="<?php echo base_url('login'); ?>" class="small float-right">
                                                    <i class="anticon anticon-login"></i> Sign In
                                                </a>
                                            </div>
                                        <?php } ?>

                                        <?php if($type == 'reset') { ?>
                                            <span class="text-success">Reset Code sent to <b><?php echo strtolower($reset_email); ?></b>. Please provide Code and Reset Password.</span>

                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="code">Reset Code:</label>
                                                <div class="input-affix">
                                                    <i class="prefix-icon anticon anticon-barcode"></i>
                                                    <input type="text" class="form-control" id="code" name="code" placeholder="Reset Code">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="new">New Password:</label>
                                                <div class="input-affix">
                                                    <i class="prefix-icon anticon anticon-lock"></i>
                                                    <input type="password" class="form-control" id="new" name="new" placeholder="New Password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="confirm">Confirm New Password:</label>
                                                <div class="input-affix">
                                                    <i class="prefix-icon anticon anticon-lock"></i>
                                                    <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm New Password">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary bb_form_btn">Reset Password</button>
                                                <a href="<?php echo base_url('login'); ?>" class="small float-right">
                                                    <i class="anticon anticon-login"></i> Sign In
                                                </a>
                                            </div>
                                        <?php } ?>
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