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
                url:'/admin/updateManager',
                type: 'POST',
                data: {new_val: newVal, id: id, name: name_column},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res){
                    console.log(res);
                },
                error: function(){
                    /*$(this).innerText=oldVal;*/
                    alert('Error!');
                }
            });
        }
    });

});