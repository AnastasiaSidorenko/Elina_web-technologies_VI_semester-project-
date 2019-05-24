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
                url:'/admin/updateManuf',
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
                    '<td id="TdEdit"><div class="edit" data-id="'+data['id']+'" contenteditable>'+data['name']+'</div></td>'+
                    '<td><button id=' + data['id'] + ' onclick="deleteManuf(' + data['id'] + ')"><i class="fas fa-trash-alt"></i></button></td></tr>';
                $('.table > tbody:last').append(str);
                $('#name').val('');
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});
