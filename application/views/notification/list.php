<div class="main-content">
    <div class="page-header">
        <h2 class="header-title" style="width:100%;">
            Notification
        </h2>
    </div>
    
    <!-- Search -->
    <div class="row">
        <div class="col-12 col-sm-7">
            <div class="search-tool">
                <i class="anticon anticon-search search-icon p-r-10 font-size-18"></i>
                <input id="search" placeholder="Search..." oninput="load('', '')" />
            </div>
        </div>
        <div class="col-12 mb-4 col-sm-5">
            <div class="row">
                <div class="col-6 col-sm-6">
                    <input type="date" class="form-control" name="start_date" id="start_date" oninput="loads()" style="border:1px solid #ddd;">
                    <label for="name" class="small text-muted">START DATE</label>
                    
                </div>
                <div class="col-6 col-sm-6">
                     <input type="date" class="form-control" name="end_date" id="end_date" oninput="loads()" style="border:1px solid #ddd;">
                     <label for="name" class="small text-muted">END DATE</label>
                    </div>
                <div class="col-md-12" style="color: transparent;"><span id="date_resul"></span></div>
            </div>
        </div>
        <!-- <div class="col-4 col-sm-2">
            <select id="type" class="select2" onchange="load('', '');">
                <option value="">All Type...</option>
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
            </select>
        </div> -->
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

    function loads() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if(!start_date || !end_date){
            $('#date_resul').css('color', 'Red');
            $('#date_resul').html('Enter Start and End Date!!');
        } else if(start_date > end_date){
            $('#date_resul').css('color', 'Red');
            $('#date_resul').html('Start Date cannot be greater!');
        } else {
            load('', '');
        }
    }
    
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

        var type = $('#type').val();
        var search = $('#search').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        $.ajax({
            url: base_url + 'notification/list/load/' + methods,
            type: 'post',
            data: { type: type, search: search, start_date: start_date, end_date: end_date },
            success: function (data) {
                var dt = JSON.parse(data);
                if (more == 'no') {
                    $('#load_data').html(dt.item);
                } else {
                    $('#load_data').append(dt.item);
                }

                if (dt.offset > 0) {
                    $('#loadmore').html('<a href="javascript:;" class="btn btn-default btn-block p-30" onclick="load(' + dt.limit + ', ' + dt.offset + ');"><i class="anticon anticon-reload"></i>Load ' + dt.left + ' More</a>');
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