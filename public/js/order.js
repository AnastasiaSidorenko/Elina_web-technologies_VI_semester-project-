function deleteOrder(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy_order/'+entry_id,
        success: function (data) {
            $("#TR"+entry_id).hide();
        },
        error: function() {
            console.log(data);
        }
    });
}

function editOrder(id){
    var status = $("#TR"+id+"TD1").html();
    $('#status_edit').val(status);
    $('#id_edit').val(id);
    $('#edit').modal('show');
    $('#articles-wrap').removeClass('show').addClass('hidden');
    $('.alert').removeClass('hidden').addClass('show');
}

$(function() {
    $('#save_edit').on('click', function () {
        var id = $('#id_edit').val();
        var status = $('#status_edit').val();
        $.ajax({
            url: '/admin/updateOrder',
            type: "POST",
            data: {id:id, status: status},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                $('#edit').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                $("#TR"+id+"TD1").html(status);
                window.location = "/admin/orders";
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});

$(document).ready(function () {
    $('#dtHorizontalVerticalExample').DataTable({
        "scrollX": true,
        "scrollY": 400,
    });
    $('.dataTables_length').addClass('bs-select');
});
