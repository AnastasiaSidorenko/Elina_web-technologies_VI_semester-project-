function deleteNews(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy_news/'+entry_id,
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
        var title_ru = $('#title_ru').val();
        var title_en = $('#title_en').val();
        var body_ru = $('#body_ru').val();
        var body_en = $('#body_en').val();
        var d = new Date();
        var date = d.getDate() + "/" + (d.getMonth()+1) + "/" +  d.getFullYear();
        var image = $('#image')[0].files[0].name;
        var ext  = image.split('.').pop();
        $.ajax({
            url: '/admin/news/store',
            type: "POST",
            data: {title_ru: title_ru, title_en: title_en, body_ru: body_ru, body_en: body_en, date: date, image: image, ext: ext},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('#addArticle').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                var str = '<tr id="TR'+data['id']+'"><td>' + data['id'] +
                    '<td id="TR'+data['id']+'TD1">'+data['title_ru']+'</td>'+
                    '<td id="TR'+data['id']+'TD2">'+data['title_en']+'</td>'+
                    '<td id="TR'+data['id']+'TD3">'+data['body_ru']+'</td>'+
                    '<td id="TR'+data['id']+'TD4">'+data['body_en']+'</td>'+
                    '<td>'+data['date']+'</td>'+
                    '<td>'+"<img height=40px src='/img/news/"+data['image']+"'>"+'</td>'+
                    '<td><button id=' + data['id'] + ' onclick="deleteNews(' + data['id'] + ')"><i class="fas fa-trash-alt"></i></button></td></tr>'+
                    '<td><button data-toggle="modal" data-target="#edit" onclick="editNews(' + data['id'] + ')"><i class="fas fa-edit"></i></button></td>';
                $('.table > tbody:last').append(str);
                $('#title_ru').val('');
                $('#title_en').val('');
                $('#body_ru').val('');
                $('#body_en').val('');
                $('#image').val('');
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});

function editNews(id){
    var title_ru = $("#TR"+id+"TD1").html();
    var title_en =$("#TR"+id+"TD2").html();
    var body_ru = $("#TR"+id+"TD3").html();
    var body_en = $("#TR"+id+"TD4").html();
    $('#title_ru_edit').val(title_ru);
    $('#title_en_edit').val(title_en);
    $('#body_ru_edit').val(body_ru);
    $('#body_en_edit').val(body_en);
    $('#id_edit').val(id);
    $('#edit').modal('show');
    $('#articles-wrap').removeClass('show').addClass('hidden');
    $('.alert').removeClass('hidden').addClass('show');
}

$(function() {
    $('#save_edit').on('click', function () {
        var id = $('#id_edit').val();
        var title_ru = $('#title_ru_edit').val();
        var title_en =  $('#title_en_edit').val();
        var body_ru = $('#body_ru_edit').val();
        var body_en = $('#body_en_edit').val();
        $.ajax({
            url: '/admin/updateNews',
            type: "POST",
            data: {id:id, title_ru: title_ru, title_en: title_en, body_ru: body_ru, body_en: body_en},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                $('#edit').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                $("#TR"+id+"TD1").html(title_ru);
                $("#TR"+id+"TD2").html(title_en);
                $("#TR"+id+"TD3").html(body_ru);
                $("#TR"+id+"TD4").html(body_en);
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