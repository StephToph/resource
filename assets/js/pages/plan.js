$(document).ready(function(){
    
});

function get_currency(x) {
    if(x == 'NGN') {
        $('#usd-btn').removeClass('active');
        $('#ngn-btn').addClass('active');
    } else {
        $('#ngn-btn').removeClass('active');
        $('#usd-btn').addClass('active');
    }

    $('#currency').val(x);

    // get pricing
    get_pricing();
}

function get_type(x) {
    if(x == 'monthly') {
        $('#yearly-btn').removeClass('active');
        $('#monthly-btn').addClass('active');
    } else {
        $('#monthly-btn').removeClass('active');
        $('#yearly-btn').addClass('active');
    }

    $('#type').val(x);

    // get pricing
    get_pricing();
}

function get_pricing() {
    var currency = $('#currency').val();
    var type = $('#type').val();

    $.ajax({
        url: base_url + 'subscription/pricing',
        type: 'post',
        data: { currency: currency, type: type },
        success: function(data) {
            var dt = JSON.parse(data);
            $('.basic-type').html(dt.basic_type);
            $('#basic-amount').html(dt.basic_amount);
            $('#standard-amount').html(dt.standard_amount);
            $('#advance-amount').html(dt.advance_amount);
        }
    });
}

function to_pay(x) {
    var currency = $('#currency').val();
    var type = $('#type').val();

    $.ajax({
        url: base_url + 'subscription/to_pay',
        type: 'post',
        data: { currency: currency, type: type, plan: x },
        success: function(data) {
            window.location.replace(base_url + "subscription/pay");
        }
    });
}