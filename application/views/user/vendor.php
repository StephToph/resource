<div class="main-content">
    <div class="page-header">
        <h2 class="header-title" style="width:100%;">
            Vendors
        </h2>
    </div>
    
    <!-- Search -->
    <div class="row">
        <div class="col-4 col-sm-7">
            <div class="search-tool">
                <i class="anticon anticon-search search-icon p-r-10 font-size-18"></i>
                <input id="search" placeholder="Search..." oninput="load('', '')" />
            </div>
        </div>
        <?php if($role == 'administrator' || $role == 'developer' || $role == 'bdm' || $role == 'dmo' || $role == 'head admin & finance') { ?>
        <div class="col-4 col-sm-2">
            <?php $country_id = 132; ?>
            <?php $states = $this->Crud->read_single_order('country_id', $country_id, 'state', 'name', 'asc'); ?>
            <select id="state_id" class="select2" onchange="load('', '');">
                <option value="0" selected>All State...</option>
                <?php 
                    foreach($states as $s) {
                        echo '<option value="'.$s->id.'">'.$s->name.'</option>';
                    }
                ?>
            </select>
        </div>
        <?php } ?>
        <div class="col-4 col-sm-3">
            <?php $status = array('Unverified', 'Verified'); ?>
            <select id="status" class="select2" onchange="load('', '');">
                <option value="all" selected>All Status...</option>
                <?php 
                    foreach($status as $key=>$val) {
                        echo '<option value="'.strtolower($val).'">'.$val.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>

    <!-- List -->
    <div class="row m-t-10 m-b-10">
        <div class="col-sm-12">
            <ul class="list-group">
                <div id="load_data"></div>
            </ul>

            <div id="loadmore"></div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>var base_url = '<?php echo base_url(); ?>';</script>
<script>
    $(function() {
        load('', '');
    });

    function load(x, y) {
        var more = 'no';
        var methods = '';
        if (parseInt(x) > 0 && parseInt(y) > 0) {
            more = 'yes';
            methods = x + '/' + y + '/';
        }

        if (more == 'no') {
            $('#load_data').html('<div class="col-sm-12 text-center"><br/><br/><br/><br/><i class="anticon anticon-loading" style="font-size:48px;"></i></div>');
        } else {
            $('#loadmore').html('<div class="col-sm-12 text-center"><i class="anticon anticon-loading"></i></div>');
        }

        var state_id = $('#state_id').val();
        var status = $('#status').val();
        var search = $('#search').val();

        $.ajax({
            url: base_url + 'users/vendor/load/' + methods,
            type: 'post',
            data: { state_id: state_id, status: status, search: search },
            success: function (data) {
                var dt = JSON.parse(data);
                if (more == 'no') {
                    $('#load_data').html(dt.item);
                } else {
                    $('#load_data').append(dt.item);
                }

                if (dt.offset > 0) {
                    $('#loadmore').html('<a href="javascript:;" class="btn btn-default btn-block p-30" onclick="load(' + dt.limit + ', ' + dt.offset + ');"><i class="anticon anticon-reload"></i> Load ' + dt.left + ' More</a>');
                } else {
                    $('#loadmore').html('');
                }
            },
            complete: function () {
                $.getScript(base_url + 'assets/js/jsmodal.js');
            }
        });
    }
</script>   