$(document).ready(function () {
    $("#btnsave").on('click', function () {
        var item_name = $("#item_name").val();
        if (item_name != "") {
            $.ajax({
                url: "includes/saveItem.php",
                type: "POST",
                data: {
                    item_name: item_name
                },
                cache: false,
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.status == 'itemExist') {
                        alert(data.message);
                        return false;
                    } else if (data.status == 'success') {
                        location.reload();
                    } else {
                        alert('Something goes wrong!');
                    }

                }
            });
        } else {
            alert('Please Enter Item !');
        }
    });
});

function updateItemStatus(action) {

    var itemId = '';

    if (action == 'add')
        itemId = $("#selected_item_left").val();
    else if (action == 'remove')
        itemId = $("#selected_item_right").val();

    if (typeof itemId == 'undefined' || itemId == '' || itemId == null) {
        alert('Please select item from the ' + (action == 'add' ? 'left section' : 'right section') + ' list.');
        return false;
    }

    $.ajax({
        url: "includes/updateItem.php",
        type: "POST",
        data: {
            action: action,
            itemId: itemId
        },
        cache: false,
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                alert(data.message);
                location.reload();
            } else {
                alert('Something goes wrong!');
            }
        }
    });

}