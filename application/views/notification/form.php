<div id="mailcontent" class="mail-content d-">
    <div class="d-lg-flex align-items-center justify-content-between">
        <div class="media align-items-center m-b-10">
            <?php 
                $img_id = $this->Crud->read_field('id', $e_from_id, 'user', 'img_id');
                $names = $this->Crud->read_field('id', $e_from_id, 'user', 'fullname');
                
                    $wors = $this->Crud->image_name($names);
                    $img = '<span>'.$wors.'</span>';
                
            ?>
            <div class="avatar avatar-image bg-info">
                <?=$img?>
            </div>
            <input type="hidden" id="v_id" value="<?=$e_id; ?>">
            <div class="m-l-10">
                <h6 class="m-b-0"><?=ucwords($this->Crud->read_field('id', $e_from_id, 'user', 'fullname')); ?></h6>
                <span class="text-muted font-size-13">To: <?=$this->Crud->read_field('id', $e_to_id, 'user', 'email'); ?></span>
            </div>
        </div>
        <div class="d-flex align-items-center m-b-15 p-l-30">
            <span class="text-gray m-r-15"><?=date('M d, Y H:ia', strtotime($e_reg_date)); ?></span>
        </div>
    </div>
    <div class="m-t-20 p-h-10">
        <h4>New <?=ucwords(str_replace('_', ' ', $e_item)); ?> Notification</h4>
        <div class="m-t-20">
            <?=ucwords($e_content); ?>
            
        </div><br><br><div id="accept_resp"></div><br>
        <?php if($role == 'delivery agent') {
            if($e_to_id == $log_id){
                if($this->Crud->check('id', $e_item_id, 'order') > 0){
                    if($this->Crud->check2('id', $e_item_id, 'delivery_id >', 0, 'order') > 0 ){
                        if($this->Crud->read_field('id', $e_item_id, 'order', 'delivery_id') == $log_id){
                            echo $this->Crud->msg('info', 'Order is already Accepted by You');
                        } else echo $this->Crud->msg('info', 'Order is already Assigned to a Delivery Agent');
                    } else {
        ?>
            <div class="row m-t-20">
                <div class="col text-right">
                    <a href="javascript:;" class="btn btn-primary  p-15" align="right" onclick="accept();">Accept Order</a>
                </div>
            </div>
            <input type="hidden" id="order_id" value="<?=$e_item_id; ?>">
            <input type="hidden" id="notification" value="<?=$e_content; ?>">
        <?php } } } }?>
        <!-- <div class="row">
            <div class="col text-right">
            <a href="<?=base_url('notification/list/manage/view/'.$e_id)?>" class="btn btn-primary  p-15 pop" align="right" pageTitle="Notification" pageName="" >Read</a>
            </div>
        </div> -->
    </div>
</div>
       

<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsmodal.js"></script>
<script>
    $(document).ready(function(){
         statement(); 
    });
    
    function statement() {
        // $('#fullname').html('Verifying...');
        var v_id = $('#v_id').val();
        
        $.ajax({
            url: '<?php echo base_url('notification/read'); ?>/' + v_id,
            success: function(data) {
                $('#statement').html(data);
            }
      });
    }

    function accept(id) {
        $('#accept_resp').html('<div class="col-sm-12 text-center"><br/><br/><br/><br/><i class="anticon anticon-loading" style="font-size:48px;"></i></div>');
        var order_id = $('#order_id').val();
        
        $.ajax({
            url: '<?=base_url('notification/accept')?>/' + order_id,
            success: function(data) {
                $('#accept_resp').html(data);
            }
      });
    }
</script>