<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Translations</h4>
                    <p>
                        <!-- <div class="btn-group float-right">
                            <a href="javascript:;" class="float-right btn btn-primary pop" pageTitle="Add Staff" pageName="<?php echo base_url('blog/post/manage'); ?>" pageSize="">
                                <i class="anticon anticon-plus-circle"></i> Add
                            </a>
                        </div> -->
                        Manage all Translations here.
                    </p>

                    <hr />

                    <div class="table-responsive">
                        <table id="dtable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th width="50px">Code</th>
                                    <th width="80px">Status</th>
                                    <th width="150px" class="text-center"><i class="anticon anticon-setting m-r-5"></i>Paid Version</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
    function updat(id) {
        var c = $('#values' + id);
        $('#resp').html('<div class="col-sm-12 text-center"><br/><i class="anticon anticon-loading" style="font-size:28px;"></i></div>');

        if(c.is(':checked')){c = 1;} else {c = 0;}
        
        $.ajax({
            url: '<?php echo base_url('translation/update_app'); ?>',
            type: 'post',
            data: {id: id, value: c},
            success: function(data) {
                $('#resp').html(data);
            }
        });
    }
  </script>
  

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>