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

                    <div class="col-lg-4 bg-white">
                        <div class="container h-100">
                            <div class="row no-gutters h-100 align-items-center">
                                <div class="col-sm-10 col-lg-8 mx-auto">
                                    <h2 class="text-center">Reset Password</h2>
                                    <p class="m-b-30 text-center">
                                        Enter New Password and Confirm to Reset
                                    </p>
                                    
                                    <?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'form-horizontal', 'clear'=>false)); ?>
                                        <div id="bb_ajax_msg"></div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">New Password:</label>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="confirm">Confirm Password:</label>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="submit" class="btn btn-primary bb_form_btn"><i class="anticon anticon-login"></i> Reset Password</button>
                                            </div>
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