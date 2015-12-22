(function($){
    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

    KindEditor.ready(function(K) {
            window.editor = K.create('#editor');
    });

    $(".form_datetime").datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });


    $(".ajax_form").ajaxForm({
        dataType: 'json',
        success: function(data) {
            if (typeof data == 'object') {
                console.log(data);
                
                alert(data.message);
                if (data.method == 'redirect') {
                	window.location.href=data.url; 
                };
            } else {
                alert('error');
            }
        },
        error: function(data){
            console.log("error_message->");
            console.log(data);
        }
    });

    
// notify = humane.create({baseCls: 'humane-bigbox', timeout: 1000});
// notify.error = notify.spawn({addnCls: 'humane-bigbox-error'});
// 	error_message('ddd');
// function error_message (mesage) {
// 	notify.error(mesage);
// }

})(jQuery);