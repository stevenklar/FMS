
function updateStatus() {
    $.ajax({
        url: '',
        data: '',
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            data.forEach(function(currentValue, index, array) {
                var vehicle = $('.vehicle-' + currentValue.id);
                var status = vehicle.find('.status').eq(0);
                var oldStatus = status.html();

                if (oldStatus != currentValue.status) {
                    if (currentValue.category.indexOf("BMA") > -1) {
                        // bma
                        if (vehicle.find('.status').hasClass('status--0') && currentValue.status != 0) {
                            status.switchClass('status--0', 'status--1');
                        }
                        if (vehicle.find('.status').hasClass('status--1') && currentValue.status != 1) {
                            status.switchClass('status--1', 'status--0');
                        }

                    } else {
                        // vehicle
                        status.html(currentValue.status);
                        status.switchClass('status--'+oldStatus, 'status--'+currentValue.status);
                    }
                }
            });
        }
    });
}

setInterval(updateStatus, 2000);

// hide full department when click on department
$('.department--name').click(function() {
    $(this).parent().parent().hide();
});

// moveable
$(function() {
    $( ".column" ).sortable({
        connectWith: ".column",
        handle: ".portlet-header",
        cancel: ".portlet-toggle",
        placeholder: "portlet-placeholder ui-corner-all",
        dropOnEmpty: true,
        forceHelperSize: true
    });

    $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
});
