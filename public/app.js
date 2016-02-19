
function updateStatus(currentValue, id) {
    var vehicle = $('.vehicle-' + id);
    var status = vehicle.find('.status').eq(0);
    var oldStatus = status.text().replace(/^\s+|\s+$/g, '');

    if (oldStatus != currentValue.status) {
        if (currentValue.name.indexOf("BMA") > -1) {
            // bma
            if (vehicle.find('.status').hasClass('status--0') && currentValue.status != 0) {
                status.removeClass('status--0').addClass('status--1');
            }
            if (vehicle.find('.status').hasClass('status--1') && currentValue.status != 1) {
                status.removeClass('status--1').addClass('status--0');
            }
        } else if (currentValue.name.indexOf("BB") > -1) {
            // krankenhausbelegung
            status.html(currentValue.status);
        } else {
            // vehicle
            status.html(currentValue.status);
            status.removeClass('status--'+oldStatus).addClass('status--'+currentValue.status);

            var statusText = new Array();
            statusText["0"] = "wurde zum Einsatz alarmiert";
            statusText["C"] = "wurde zum Einsatz alarmiert";

            statusText["1"] = "einsatzbereit über Funk";
            statusText["2"] = "einsatzbereit auf Wache";
            statusText["3"] = "hat Einsatz übernommen";
            statusText["4"] = "Wir sind Einsatzstelle an!";
            statusText["5"] = "hat Sprechwunsch";
            statusText["6"] = "ist nicht einsatzbereit";
            statusText["7"] = "hat Patient aufgenommen";
            statusText["8"] = "haben Transportziel erreicht";
            statusText["9"] = "beginnt nun Streifenfahrt";

            var vehicleName = vehicle.find('.call-sign').text().trim();
            $('.object-log').prepend(
                '<div class="status-update status--'+ currentValue.status +'">' +
                vehicleName + ' ' + statusText[currentValue.status] +
                '</div>'
            );
        }
    }
}


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
        tolerance: "pointer",
        forceHelperSize: true
    });

    $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
});
