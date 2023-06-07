<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Change Password</h4>

                    <hr />

                    <?php echo form_open_multipart('profile/password', array('id'=>'bb_ajax_form', 'class'=>'true')); ?>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>

                                    <div class="col-sm-12">
                                        <label for="old"><span class="rq">*</span> Current Password</label>
                                        <input class="form-control" type="password" id="old" name="old"  required>
                                        <br />
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="new"><span class="rq">*</span> New Password</label>
                                        <input class="form-control" type="password" id="new" name="new"  required>
                                        <br />
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="confirm"><span class="rq">*</span> Confirm Password</label>
                                        <input class="form-control" type="password" id="confirm" name="confirm"  required>
                                        <br />
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <hr />
                                        <button class="btn btn-danger bb_form_btn" type="submit">
                                            <i class="anticon anticon-save"></i> Save Record
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div> 

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>