/**
 * Created by Yusuf on 2/7/2016.
 */

$(document).ready(function(){
    $('body').on('change','select.query', function(event){
        // Prevent default behaviour
        event.preventDefault();
        // Get some values from elements on the page:
        var url = '/query';
        var type = $(this).attr('name');
        if(type.toLowerCase() === 'zones'.toLowerCase()) {
            return;
        }
        if(type.toLowerCase() === 'state'.toLowerCase()) {
            $('#zones, #cities').remove();
        }
        var value = $(this).val();

        $.ajax({
            type: 'post',
            url: url,
            data: {name: type, select: value},
            beforeSend: function(data) {
                $('#loading_ajax').removeClass('hidden');
            },
            success: function(data){
                var name = data.result.name;

                if ($('#' + name).length) {
                    $('#' + name).remove();
                }

                var uppercase_value = name.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                    return letter.toUpperCase();
                });
                $('#insertbefore').before('<div class="form-group" id="' +
                name + '">  <label class="col-md-4 control-label">' +
                uppercase_value + '</label><div class="col-md-6" > <select class="form-control query" name="' + name
                + '"> </select> </div></div>');

                $.each(data.result.value, function(key, value){
                    $('select[name = '+ name +']').append($('<option></option>')
                        .attr('value',value.id)
                        .text(value.name));
                });
            },
            error: function(data) {
                var err_title = (type.toLowerCase() === 'state'.toLowerCase()) ? 'Loading cities failed. ' : 'Loading zones failed. ';
                $('#' + type).addClass('has-error');
                $('#' + type).find('.help-block').remove();
                $('#' + type).find('.col-md-6').append('<span class="help-block"> <strong>'+ err_title + data.status +': '+ data.statusText +'</strong></span>');
            },
            complete: function(data) {
                $('#loading_ajax').addClass('hidden');
            }
        });
    });
});