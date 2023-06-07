<?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'')); ?>

    <!-- delete view -->
    <?php if($param2 == 'delete') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <h3><b>Are you sure?</b></h3>
                <input type="hidden" name="d_blog_id" value="<?php if(!empty($d_id)){echo $d_id;} ?>" />
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
            <input type="hidden" name="blog_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />

            <div class="col-sm-12">
                <br/>
                <label for="name"><span class="rq">*</span> Title</label>
                <input class="form-control" type="text" id="title" name="title" value="<?php if(!empty($e_title)){echo $e_title;} ?>" required>
            </div>

            <div class="col-sm-12">
                <br/>
                <label for="phone"><span class="rq">*</span> Details</label>
                <textarea id="details" name="details" class="form-control" rows="8" required><?php if(!empty($e_details)){echo $e_details;} ?></textarea>
            </div>

            <div class="col-sm-12">
                <h5 class="text-muted"><br/><span class="rq">*</span>IMAGE</h5>
                <label for="img-upload" class="pointer text-center" style="width:100%;">
                    <input type="hidden" name="img" value="<?php if(!empty($e_img)){echo $e_img;} ?>" />
                    <img id="img0" src="<?php if(!empty($e_img)){echo base_url($e_img);} ?>" style="max-width:100%;" />
                    <span class="btn btn-danger btn-block no-mrg-btm">Choose Image</span>
                    <input class="d-none" type="file" name="pics" id="img-upload">
                </label>
            </div>
            
            <div class="col-sm-12">
                <h5 class="text-muted"><br/>VIDEO <i class="small">- optional</i></h5>
                <input type="hidden" name="video" value="<?php if(!empty($e_video)){echo $e_video;} ?>" />
                
                <input type="file" name="videoFile">
            </div>
            
            <div class="col-sm-12"><br/></br.><div id="bb_ajax_msg"></div></div>

            
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