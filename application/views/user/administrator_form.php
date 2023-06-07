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

    <!-- insert/edit view -->
    <?php if($param2 == 'edit' || $param2 == '') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>

        <div class="row">
            <input type="hidden" name="user_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">*Full Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="<?php if(!empty($e_fullname)) {echo $e_fullname;} ?>" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">*Email</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?php if(!empty($e_email)) {echo $e_email;} ?>" required>
                </div>
            </div>

            <div class="col-sm-6">
                <?php $roles = $this->Crud->read_single_order('name!=', 'developer', 'access_role', 'name', 'asc'); ?>
                <div class="form-group">
                    <label for="role_id">Set Role</label>
                    <select id="role_id" name="role_id" class="select2" required>
                        <?php 
                            if(!empty($roles)) {
                                foreach($roles as $r) {
                                    if($r->name == 'User')continue;
                                    $r_sel = '';
                                    if(!empty($e_role_id)) {
                                        if($e_role_id == $r->id) { $r_sel = 'selected'; }
                                    }
                                    echo '<option value="'.$r->id.'" '.$r_sel.'>'.$r->name.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password"><?php if(!empty($e_id)) { echo 'Reset Password'; } else { echo '*Password'; } ?></label>
                    <input class="form-control" type="text" id="password" name="password" <?php if(empty($e_id)) { echo 'required'; } ?>>
                </div>
            </div>

            <div class="col-sm-12 text-center">
                <hr />
                <button class="btn btn-primary bb_form_bn" type="submit">
                    <i class="anticon anticon-save"></i> Save Record
                </button>
            </div>
        </div>
    <?php } ?>
<?php echo form_close(); ?>

<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script>
    $(function() {
        $('.select2').select2();
    });
</script>