$(document).ready(function() {
    $("form[name=feedback_form] input[name=name]").blur(function() {
        var ser = $("form[name=feedback_form] input[name=name]").val();
        if(ser == '') {
            $("#one").removeClass().addClass('field invalid');
        }
        else {
            var reg = /[^a-zа-яё\s]/gim;
            var search_name = ser.search(reg);
            if(search_name == -1) {
                $("#one").removeClass().addClass('field valid');
            }
            else {
                $("#one").removeClass().addClass('field invalid');
            }
        }
    });
    
    $("form[name=feedback_form] input[name=e-mail]").blur(function() {
        var sera = $("form[name=feedback_form] input[name=e-mail]").val();
        if(sera == '') {
            $("#two").removeClass().addClass('field invalid');
        }
        else {
            var rega = /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/;
            var search_email = sera.search(rega);
            if(search_email == 0) {
                $("#two").removeClass().addClass('field valid');
            }
            else {
                $("#two").removeClass().addClass('field invalid');
            }
        }
    });
});