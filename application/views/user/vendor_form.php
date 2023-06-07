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
            <div class="col-sm-7">
                <div class="text-muted small">DATA</div>
                <div class="row small">
                    <div class="col-sm-6">
                        <img alt="" src="<?php echo $v_img; ?>" width="100%" />
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted">NAME</div>
                        <div><?php echo $v_name; ?></div><br/>

                        <div class="text-muted">PHONE</div>
                        <div><?php echo $v_phone; ?></div><br/>

                        <div class="text-muted">EMAIL</div>
                        <div><?php echo $v_email; ?></div><br/>

                        <div class="text-muted">STATUS</div>
                        <div><?php echo $v_status; ?></div><br/>
                    </div>

                    <div class="col-sm-12"><br/></div>

                    <div class="col-sm-12">
                        <div class="text-muted">ADDRESS</div>
                        <div><?php echo $v_address; ?></div><br/>
                    </div>

                    <div class="col-sm-6">
                        <div class="text-muted">STATE</div>
                        <div><?php echo $v_state; ?></div><br/>
                    </div>

                    <div class="col-sm-6">
                        <div class="text-muted">COUNTRY</div>
                        <div><?php echo $v_country; ?></div><br/>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-sm-5">
                <div class="text-muted small">AVAILABILITY</div>
                <?php $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'); ?>
                <div class="table-responsive">
                    <table class="table table-small table-striped">
                        <?php foreach($days as $k=>$v){ ?>
                            <tr>
                                <td class="small"><?php echo $v; ?></td>
                                <td class="text-center small" width="50px">
                                    <?php if(!empty($v_availability)){ echo $v_availability[$k][0]; } else { echo '-:-'; } ?>
                                </td>
                                <td class="text-center small" width="50px">
                                    <?php if(!empty($v_availability)){ echo $v_availability[$k][1]; } else { echo '-:-'; } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <br/>
            </div>

            <div class="col-sm-12">
                <div class="text-muted small">PRODUCT PRICINGS/STOCK</div>
                <div class="row">
                    <?php 
                        if(!empty($v_pricing)) {
                            foreach($v_pricing as $vp) {
                                $pdt_name = $this->Crud->read_field('id', $vp->product_id, 'product', 'name');
                                $variation = '';
                                if(!empty($vp->variation_id)) { $variation = '- '.$this->Crud->read_field('id', $vp->variation_id, 'product_variation', 'name'); }

                                echo '
                                    <div class="col-sm-6">
                                        <table class="table table-small table-bordered">
                                            <tr>
                                                <td class="small">'.number_format($vp->stock).' of '.$pdt_name.' '.$variation.'</td>
                                                <td width="80px" class="text-right small">&#8358;'.number_format($vp->amount).'</td>
                                            </tr>
                                        </table>
                                    </div>
                                ';
                            }
                        }
                    ?>
                </div>
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
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="activate">Activate Account</label>
                    <div class="checkbox">
                        <input id="activate" name="activate" type="checkbox" <?php if(!empty($e_activate)) {echo 'checked';} ?>>
                        <label for="activate">Activate</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="approve">Approve Role</label>
                    <div class="checkbox">
                        <input id="approve" name="approve" type="checkbox" <?php if(!empty($e_approve)) {echo 'checked';} ?>>
                        <label for="approve">Approved</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="markup">Markup (%)</label>
                    <input id="markup" name="markup" class="form-control" value="<?php if(!empty($e_markup)) {echo $e_markup;} ?>" placeholder="12.5" />
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="pay">Pay Referral</label>
                    <div class="checkbox">
                        <input id="pay" name="pay" type="checkbox" checked>
                        <label for="pay">Pay</label>
                    </div>
                </div>
            </div>
            

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="password">Reset Password</label>
                    <input class="form-control" type="text" id="password" name="password">
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select id="role_id" name="role_id" class="selects2" onchange="get_parent();">
                        <option value=""></option>
                        <?php echo $roles; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <b>LINKED SALES AGENT</b>
                <div class="form-group">
                    <select id="agent_id" name="agent_id" class="selects2">
                        <option value="">None</option>
                        <?php
                            if(!empty($agents)) {
                                foreach($agents as $a) {
                                    $a_sel = '';
                                    if(!empty($e_agent_id)) { if($e_agent_id == $a->id) $a_sel = 'selected'; }
                                    echo '<option value="'.$a->id.'" '.$a_sel.'>'.$a->fullname.' | '.$a->email.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <b>LINKED FEATURE VENDOR</b>
                <div class="form-group">
                    <select id="feature_id" name="feature_id" class="selects2">
                        <option value="">None</option>
                        <?php
                            if(!empty($featured)) {
                                foreach($featured as $f) {
                                    $f_sel = '';
                                    if(!empty($e_feature_id)) { if($e_feature_id == $f->id) $f_sel = 'selected'; }
                                    echo '<option value="'.$f->id.'" '.$f_sel.'>'.$f->name.'</option>';
                                }
                            }
                        ?>
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