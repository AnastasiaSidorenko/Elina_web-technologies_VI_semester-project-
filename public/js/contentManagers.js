function deleteManagers(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy_manager/'+entry_id,
        success: function (data) {
            $("#TR"+entry_id).hide();
        },
        error: function() {
            console.log(data);
        }
    });
}

function editManagers(id){
    var name = $("#TR"+id+"TD1").html();
    var role =$("#TR"+id+"TD2").html();
    $('#name_edit').val(name);
    $('#role_edit').val(role);
    $('#id_edit').val(id);
    $('#edit').modal('show');
    $('#articles-wrap').removeClass('show').addClass('hidden');
    $('.alert').removeClass('hidden').addClass('show');
}

$(function() {
    $('#save_edit').on('click', function () {
        var id = $('#id_edit').val();
        var name = $('#name_edit').val();
        var role =  $('#role_edit').val();
        $.ajax({
            url: '/admin/updateManager',
            type: "POST",
            data: {id:id, name: name, role: role},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                $('#edit').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                $("#TR"+id+"TD1").html(name);
                $("#TR"+id+"TD2").html(role);
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});
