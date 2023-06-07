<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Application Settings</h4>

                    <hr />
                    <div id="resp"></div>

                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <td><b>NAME</b></td>
                                <td><b>VALUE</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($settings)) {
                                    foreach($settings as $s) {
                                        if($role != 'developer'){
                                            $permit = array('usd', 'ngn');
                                            if(!in_array(strtolower($s->name), $permit)){
                                                continue;	
                                            }
                                        }
                                        echo '
                                            <tr>
                                                <td>'.ucwords($s->name).'</td>
                                                <td>
                                                    <input id="value'.$s->id.'" type="text" value="'.$s->value.'" class="form-control" oninput="update_app('.$s->id.');" />
                                                </td>
                                            </tr>
                                        ';
                                       
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  

<script>
    function update_app(id) {
        var value = $('#value' + id).val();
        $('#resp').html('<div class="col-sm-12 text-center"><br/><i class="anticon anticon-loading" style="font-size:28px;"></i></div>');
        $.ajax({
            url: '<?php echo base_url('settings/update_app'); ?>',
            type: 'post',
            data: {id: id, value: value},
            success: function(data) {
                $('#resp').html(data);
            }
        });
    }
  </script>