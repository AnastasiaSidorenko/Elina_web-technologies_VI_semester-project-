function deleteProduct(entry_id){
    $.ajax({
        type: 'GET',
        url: '/admin/destroy_products/'+entry_id,
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
        var name_ru = $('#name_ru').val();
        var name_en = $('#name_en').val();
        var description_ru = $('#description_ru').val();
        var description_en = $('#description_en').val();
        var ingredients = $('#ingredients').val();
        var suggested_use_ru = $('#suggested_use_ru').val();
        var suggested_use_en = $('#suggested_use_en').val();
        var price = $('#price').val();
        var expiration_date = $('#expiration_date').val();
        var quantity = $('#quantity').val();
        var categories = $("#categories :selected").val();
        var manufacturers =  $("#manufacturer :selected").val();
        var image1 = $('#image1')[0].files[0].name;
        var image2 = $('#image2')[0].files[0].name;
        $.ajax({
            url: '/admin/products/store',
            type: "POST",
            data: {name_ru: name_ru,name_en: name_en,description_ru:description_ru,description_en:description_en,
                ingredients:ingredients,suggested_use_ru:suggested_use_ru,suggested_use_en:suggested_use_en,
                price:price,expiration_date:expiration_date,quantity:quantity,category:categories,
                manufacturer:manufacturers,image1:image1,image2:image2
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('#addArticle').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                var str = '<tr id="TR'+data['id']+'"><td>' + data['id'] +
                    '<td id="TdEdit"><div class="name_ru" data-id="'+data['id']+'" contenteditable>'+data['name_ru']+'</div></td>'+
                    '<td id="TdEdit"><div class="name_en" data-id="'+data['id']+'" contenteditable>'+data['name_en']+'</div></td>'+
                    '<td id="TdEdit"><div class="description_ru" data-id="'+data['id']+'" contenteditable>'+data['description_ru']+'</div></td>'+
                    '<td id="TdEdit"><div class="description_en" data-id="'+data['id']+'" contenteditable>'+data['description_en']+'</div></td>'+
                    '<td id="TdEdit"><div class="ingredients" data-id="'+data['id']+'" contenteditable>'+data['ingredients']+'</div></td>'+
                    '<td id="TdEdit"><div class="suggested_use_ru" data-id="'+data['id']+'" contenteditable>'+data['suggested_use_ru']+'</div></td>'+
                    '<td id="TdEdit"><div class="suggested_use_en" data-id="'+data['id']+'" contenteditable>'+data['suggested_use_en']+'</div></td>'+
                    '<td>'+data['price']+'</td>'+
                    '<td id="TdEdit"><div class="expiration_date" data-id="'+data['id']+'" contenteditable>'+data['expiration_date']+'</div></td>'+
                    '<td id="TdEdit"><div class="quantity" data-id="'+data['id']+'" contenteditable>'+data['quantity']+'</div></td>'+
                    '<td>'+data['image1']+'</td>'+
                    '<td>'+data['image2']+'</td>'+
                    '<td>'+data['categories']+'</td>'+
                    '<td>'+data['manufacturers']+'</td>'+
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

function editProducts(id){
    var name_ru = $("#TR"+id+"TD1").html();
    var name_en =$("#TR"+id+"TD2").html();
    var description_ru = $("#TR"+id+"TD3").html();
    var description_en = $("#TR"+id+"TD4").html();
    var ingredients = $("#TR"+id+"TD5").html();
    var suggested_use_ru =$("#TR"+id+"TD6").html();
    var suggested_use_en = $("#TR"+id+"TD7").html();
    var price = $("#TR"+id+"TD8").html();
    var expiration_date = $("#TR"+id+"TD9").html();
    var quantity = $("#TR"+id+"TD10").html();
    $('#name_ru_edit').val(name_ru);
    $('#name_en_edit').val(name_en);
    $('#description_ru_edit').val(description_ru);
    $('#description_en_edit').val(description_en);
    $('#ingredients_edit').val(ingredients);
    $('#suggested_use_ru_edit').val(suggested_use_ru);
    $('#suggested_use_en_edit').val(suggested_use_en);
    $('#price_edit').val(price);
    $('#expiration_date_edit').val(expiration_date);
    $('#quantity_edit').val(quantity);
    $('#id_edit').val(id);
    $('#edit').modal('show');
    $('#articles-wrap').removeClass('show').addClass('hidden');
    $('.alert').removeClass('hidden').addClass('show');
}

$(function() {
    $('#save_edit').on('click', function () {
        var name_ru = $('#name_ru_edit').val();
        var name_en =$('#name_en_edit').val();
        var description_ru = $('#description_ru_edit').val();
        var description_en = $('#description_en_edit').val();
        var ingredients = $('#ingredients_edit').val();
        var suggested_use_ru =$('#suggested_use_ru_edit').val();
        var suggested_use_en = $('#suggested_use_en_edit').val();
        var price = $('#price_edit').val();
        var expiration_date = $('#expiration_date_edit').val();
        var quantity = $('#quantity_edit').val();
        var id = $('#id_edit').val();
        $.ajax({
            url: '/admin/updateProducts',
            type: "POST",
            data: {id: id, name_ru:name_ru, name_en: name_en, description_ru: description_ru, description_en: description_en,
                ingredients: ingredients,suggested_use_ru:suggested_use_ru, suggested_use_en:suggested_use_en,
                price:price, expiration_date:expiration_date, quantity:quantity,
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                $('#edit').modal('hide');
                $('#articles-wrap').removeClass('hidden').addClass('show');
                $('.alert').removeClass('show').addClass('hidden');
                $("#TR"+id+"TD1").html(name_ru);
                $("#TR"+id+"TD2").html(name_en);
                $("#TR"+id+"TD3").html(description_ru);
                $("#TR"+id+"TD4").html(description_en);
                $("#TR"+id+"TD5").html(ingredients);
                $("#TR"+id+"TD6").html(suggested_use_ru);
                $("#TR"+id+"TD7").html(suggested_use_en);
                $("#TR"+id+"TD8").html(price);
                $("#TR"+id+"TD9").html(expiration_date);
                $("#TR"+id+"TD10").html(quantity);
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});