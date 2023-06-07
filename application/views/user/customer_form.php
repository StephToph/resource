<?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'')); ?>
    <!-- delete view -->
    <?php if($param2 == 'delete') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <h3><b>Are you sure?</b></h3>
                <input type="hidden" name="d_user_id" value="<?php if(!empty($d_id)){echo $d_id;} ?>" />
            </div>
            
            <div class="col-sm-12 text-center">
                <button class="btn btn-danger text-uppercase" type="submit">
                    <i class="anticon anticon-delete"></i> Yes - Delete
                </button>
            </div>
        </div>
    <?php } ?>

    
    <!-- profile view -->
    <?php if($param2 == 'profile') { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-muted small">DATA</div>
                <div class="row small">
                    <div class="col-sm-6">
                        <img alt="" src="<?php echo $v_img; ?>" width="100%" />
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted">NAME</div>
                        <div><?php echo strtoupper($v_name); ?></div><br/>


                        <div class="text-muted">EMAIL</div>
                        <div><?php echo $v_email; ?></div>
                    </div>

                </div>
                <br/>
            </div>
           
        </div>
    <?php } ?>

    <!-- insert/edit view -->
    <?php if($param2 == 'edit' || $param2 == '') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>

        <div class="row">
            <input type="hidden" name="user_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
            

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password">Reset Password</label>
                    <input class="form-control" type="text" id="password" name="password">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select id="role_id" name="role_id" class="selects2">
                        <option value=""></option>
                        <?php echo $roles; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-12 text-center">
                <hr />
                <button class="btn btn-primary bb_form_btn" type="submit">
                    <i class="anticon anticon-save"></i> Save Record
                </button>
            </div>
        </div>
    <?php } ?>
<?php echo form_close(); ?>

<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script>
    $(function() {
        $('.selects2').select2();
    });

</script>