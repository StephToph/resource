<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Profile</h4>

                    <hr />

                    <?php echo form_open_multipart('profile', array('id'=>'bb_ajax_form', 'class'=>'')); ?>
                        <div class="row">
                            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>

                            <div class="col-sm-3">
                                <label for="img-upload" class="pointer text-center" style="width:100%;">
                                    <input type="hidden" name="img_id" value="<?php if(!empty($img_id)){echo $img_id;} ?>" />
                                    <img id="img0" src="<?php if(!empty($img)){echo base_url($img);} ?>" style="max-width:100%;" />
                                    <span class="btn btn-default btn-block no-mrg-btm">Choose Picture</span>
                                    <input class="d-none" type="file" name="pics" id="img-upload">
                                </label>
                            </div>

                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="fullname"><span class="rq">*</span> Username</label>
                                        <input class="form-control" type="text" id="fullname" name="fullname" value="<?php if(!empty($fullname)){echo $fullname;} ?>" required>
                                        <br />
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email"><span class="rq">*</span> Email</label>
                                        <input class="form-control" type="text" id="email" name="email" value="<?php if(!empty($email)){echo $email;} ?>" required readonly>
                                        <br />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <hr />
                                <button class="btn btn-danger bb_form_btn" type="submit">
                                    <i class="anticon anticon-save"></i> Save Record
                                </button>
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
<script>
    function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#' + id).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#img-upload").change(function(){
		readURL(this, 'img0');
	});
</script>