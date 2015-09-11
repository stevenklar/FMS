
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
                    status.html(currentValue.status);
                    status.switchClass('status--'+oldStatus, 'status--'+currentValue.status)
                }
            });
        }
    });
}

setInterval(updateStatus, 2000);
