<div class="main-content">
    <div class="page-header">
        <h2 class="header-title" style="width:100%;">
            Users
        </h2>
    </div>
    
    <!-- Search -->
    <div class="row">
        <div class="col-6 col-sm-9">
            <div class="search-tool">
                <i class="anticon anticon-search search-icon p-r-10 font-size-18"></i>
                <input id="search" placeholder="Search..." oninput="load('', '')" />
            </div>
        </div>
    </div>

    <!-- List -->
    <div class="row m-t-10 m-b-10">
        <div class="col-md-12">
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

        var search = $('#search').val();

        $.ajax({
            url: base_url + 'users/customer/load/' + methods,
            type: 'post',
            data: {search: search },
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