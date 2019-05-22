
function deleteManagers(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy/'+entry_id,
        success: function (data) {
            $("#TR"+entry_id).hide();
        },
        error: function() {
            console.log(data);
        }
    });
}


function editManagers(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy/'+entry_id,
        success: function (data) {
            $("#TR"+entry_id).hide();
        },
        error: function() {
            console.log(data);
        }
    });
}
