<?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'')); ?>

    <!-- delete view -->
    <?php if($param2 == 'delete') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <h3><b>Are you sure?</b></h3>
                <input type="hidden" name="d_staff_id" value="<?php if(!empty($d_id)){echo $d_id;} ?>" />
            </div>
            
            <div class="col-sm-12 text-center">
                <button class="btn btn-danger text-uppercase" type="submit">
                    <i class="anticon anticon-delete"></i> Yes - Delete
                </button>
            </div>
        </div>
    <?php } ?>

    <!-- insert/edit view -->
    <?php if($param2 == 'edit' || $param2 == '') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>

        <div class="row">
            <input type="hidden" name="staff_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
            <input type="hidden" name="account_id" value="<?php if(!empty($e_account_id)){echo $e_account_id;} ?>" />

            <div class="col-sm-12">
                <br/>
                <label for="name"><span class="rq">*</span> Staff</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required>
            </div>

            <div class="col-sm-6">
                <br/>
                <label for="phone"><span class="rq">*</span> Phone</label>
                <input class="form-control" type="text" id="phone" name="phone" value="<?php if(!empty($e_phone)){echo $e_phone;} ?>" required>
            </div>

            <div class="col-sm-6">
                <br/>
                <label for="email"><span class="rq">*</span> Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?php if(!empty($e_email)){echo $e_email;} ?>" required oninput="validate('email');">
                <div id="email_msg"></div>
            </div>

            <div class="col-sm-12">
                <hr/>
                <h4>Login Access</h4>
            </div>

            <div class="col-sm-6">
                <br/>
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" value="<?php if(!empty($e_username)){echo $e_username;} ?>" oninput="validate('username');">
                <div id="username_msg"></div>
            </div>

            <div class="col-sm-6">
                <br/>
                <label for="password">Password</label>
                <input class="form-control" type="text" id="password" name="password" value="<?php if(empty($e_id)) { echo substr(md5(rand()), 0, 6); } ?>">
            </div>
            
            <div class="col-sm-12 text-center">
                <br />
                <button class="btn btn-primary bb_form_btn" type="submit">
                    <i class="anticon anticon-save"></i> Save Record
                </button>
            </div>
        </div>
    <?php } ?>

<?php echo form_close(); ?>

<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script>
    function validate(type) {
        var info = $('#' + type + '_msg').html('<i class="anticon anticon-loading"></i> validating...');
        var val = $('#' + type).val();

        $.ajax({
            url: '<?php echo base_url('company/validate'); ?>/' + type + '/?value=' + val,
            success: function(data) {
                var info = $('#' + type + '_msg').html(data);
            }
        });
    }
</script>