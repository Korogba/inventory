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

        if($(this).val() === '' && type.toLowerCase() === 'state'.toLowerCase()) {
            $('#' + type).removeClass('has-error');
            $('span.help-block').remove();
            $('#zones, #cities').remove();
            return;
        }
        if($(this).val() === '' && type.toLowerCase() === 'cities'.toLowerCase()) {
            $('#' + type).removeClass('has-error');
            $('span.help-block').remove();
            $('#zones').remove();
            return;
        }
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
            beforeSend: function() {
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
                $('#insertbefore').before('<div class="col-md-4" id="' + name + '"><div class="form-group">  <label>' +
                uppercase_value + '</label><select class="form-control query" name="' + name
                + '"> <option value="">Select ' + uppercase_value + '</option> </select> </div></div>');

                $.each(data.result.value, function(key, value){
                    if(name.toLowerCase() === 'cities'.toLowerCase()) {
                        /** @namespace value.city */
                        /** @namespace value.city_id */
                        $('select[name = '+ name +']').append($('<option></option>')
                                                      .attr('value', value.city_id)
                                                      .text(value.city));
                    }
                    if(name.toLowerCase() === 'zones'.toLowerCase()) {
                        /** @namespace value.zone_id */
                        /** @namespace value.zone */
                        $('select[name = '+ name +']').append($('<option></option>')
                                                      .attr('value', value.zone_id)
                                                      .text(value.zone));
                    }
                });
            },
            error: function(data) {
                var err_title = 'Failed: ';
                $('#' + type).addClass('has-error');
                $('#' + type).find('.help-block').remove();
                $('#' + type).find('.form-group').append('<span class="help-block"> <strong>'+ err_title + data.status +', '+ data.statusText +'</strong></span>');
            },
            complete: function() {
                $('#loading_ajax').addClass('hidden');
            }
        });
    });

    $('body').on('change','select.component', function(event){
        // Prevent default behaviour
        event.preventDefault();
        // Get some values from elements on the page:
        var url = '/query';
        var type = $(this).attr('name');

        if($(this).val() === '' && type.toLowerCase() === 'component'.toLowerCase()) {
            $('#' + type).removeClass('has-error');
            $('span.help-block').remove();
            $('#subcomponents').remove();
            return;
        }

        var value = $(this).val();

        $.ajax({
            type: 'post',
            url: url,
            data: {name: type, select: value},
            beforeSend: function() {
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
                $('#insertSubComponent').before('<div class="col-md-6" id="' + name + '"><div class="form-group">  <label>' +
                uppercase_value + '</label><select class="form-control" name="' + name
                + '"> <option value="">Select ' + uppercase_value + '</option> </select> </div></div>');

                $.each(data.result.value, function(key, value){
                    /** @namespace value.subcomponent */
                    /** @namespace value.subcomponent_id */
                    $('select[name = '+ name +']').append($('<option></option>')
                        .attr('value', value.subcomponent_id)
                        .text(value.subcomponent));
                });
            },
            error: function(data) {
                var err_title = 'Failed: ';
                $('#' + type).addClass('has-error');
                $('#' + type).find('.help-block').remove();
                $('#' + type).find('.form-group').append('<span class="help-block"> <strong>'+ err_title + data.status +', '+ data.statusText +'</strong></span>');
            },
            complete: function() {
                $('#loading_ajax').addClass('hidden');
            }
        });
    });
});