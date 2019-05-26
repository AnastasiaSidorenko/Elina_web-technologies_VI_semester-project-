function deleteManuf(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy_manuf/'+entry_id,
        success: function (data) {
            $("#TR"+entry_id).hide();
        },
        error: function() {
            console.log(data);
        }
    });
}

$(function() {
    $('#save').on('click', function () {
        var name = $('#name').val();
        $.ajax({
            url: '/admin/manufacturers/store',
            type: "POST",
            data: {name: name},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('#addArticle').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                var str = '<tr id="TR'+data['id']+'"><td>' + data['id'] +
                    '<td id="TR'+data['id']+'TD1">'+data['name']+'</div></td>'+
                    '<td><button id=' + data['id'] + ' onclick="deleteManuf(' + data['id'] + ')"><i class="fas fa-trash-alt"></i></button></td></tr>'+
                    '<td><button data-toggle="modal" data-target="#edit" onclick="editManuf(' + data['id'] + ')"><i class="fas fa-edit"></i></button></td>';
                $('.table > tbody:last').append(str);
                $('#name').val('');
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


function editManuf(id){
    var name = $("#TR"+id+"TD1").html();
    $('#name_edit').val(name);
    $('#id_edit').val(id);
    $('#edit').modal('show');
    $('#articles-wrap').removeClass('show').addClass('hidden');
    $('.alert').removeClass('hidden').addClass('show');
}

$(function() {
    $('#save_edit').on('click', function () {
        var id = $('#id_edit').val();
        var name = $('#name_edit').val();
        $.ajax({
            url: '/admin/updateManuf',
            type: "POST",
            data: {id: id, name: name},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                $('#edit').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                $("#TR"+id+"TD1").html(name);
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});
