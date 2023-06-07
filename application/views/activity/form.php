<?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'class'=>'')); ?>
    <?php if($param1 == 'fund') { ?>
        <div class="row">
            <div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
        </div>
        
        <input type="hidden" id="user_id" name="user_id" value="">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="email">Account Email</label>
                    <input class="form-control" type="text" id="email" name="email" oninput="check_account();" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="fullname" class="text-center"></div>
            </div>
            
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="email">Amount</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="amount-addon">&#8358;</span>
                        </div>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="20000" aria-label="20000" aria-describedby="amount-addon" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <input class="form-control" type="text" id="remark" name="remark">
                </div>
            </div>
        

            <div class="col-sm-12 text-center">
                <hr />
                <button id="btn" class="btn btn-primary bb_form_btn" type="submit" disabled>
                    <i class="anticon anticon-wallet"></i> Add Fund
                </button>
            </div>
        </div>
    <?php } ?>
    
    <?php if($param1 == 'statement') { ?>
        <div class="row">
            <div id="statement" class="col-sm-12"> </div>
        </div>
    <?php } ?>
<?php echo form_close(); ?>

<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script>
    var sid = '<?php if(!empty($statement_id)) { echo $statement_id; } ?>';
    
    $(document).ready(function(){
        if(sid != '') { statement(); }
    });
    
    function check_account() {
        $('#fullname').html('Verifying...');
        var email = $('#email').val();
        
        $.ajax({
            url: '<?php echo base_url('wallets/check_account'); ?>',
            type: 'post',
            data: {email: email},
            success: function(data) {
                var dt = JSON.parse(data);
                $('#user_id').val(dt.id);
                $('#fullname').html(dt.fullname);
                
                if(dt.status == true) {
                    $('#btn').prop('disabled', false);;
                } else {
                    $('#btn').prop('disabled', true);;
                }
            }
      });
    }
    
    function statement() {
        // $('#fullname').html('Verifying...');
        
        $.ajax({
            url: '<?php echo base_url('wallets/account'); ?>/' + sid,
            success: function(data) {
                $('#statement').html(data);
            }
      });
    }
</script>