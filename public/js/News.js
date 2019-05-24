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

$(function(){

    var oldVal, newVal, id, name_column;
    edit=$('.edit');
    edit.keypress(function(e){
        if(e.which == 13){
            return false;
        }
    });

    edit.focus(function(){
        oldVal = $(this).text();
        id = $(this).data('id');
        name_column = $(this).attr('id');
    }).blur(function(){
        newVal = $(this).text();
        if(newVal != oldVal){
            $.ajax({
                url:'/admin/updateNews',
                type: 'POST',
                data: {new_val: newVal, id: id, name: name_column},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res){
                    console.log(res);
                },
                error: function(){
                   /* $(this).innerText=oldVal;*/
                    alert('Error!');
                }
            });
        }
    });

});

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
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['title_ru']+'</div></td>'+
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['title_en']+'</div></td>'+
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['body_ru']+'</div></td>'+
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['body_en']+'</div></td>'+
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['date']+'</div></td>'+
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['image']+'</div></td>'+
                    '<td><button id=' + data['id'] + ' onclick="deleteNews(' + data['id'] + ')"><i class="fas fa-trash-alt"></i></button></td></tr>';
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
