function deleteItem(id,product_id,user_id){
    $.ajax({
        type: "POST",
        url: '/user/delete_cart_item',
        data: {user_id: user_id, product_id: product_id},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#TR"+id).hide();
        },
        error: function() {
            console.log(data);
        }
    });
}


function Minus(quantity,id,product_id,user_id){
    var countProduct = $("#countProduct"+id);
    var total_sum = $("#total_sum"+id);
    var total_val = total_sum.html();
    var price = $("#price"+id);
    var Total = $("#Total");
    var price_val = price.html();
    var quant = countProduct.html();
    if(quant>1){
        $('#plus'+id).disabled = false;
        quant--;
        countProduct.html(" "+quant+" ");
        total_sum.html(quant*price_val);
        $.ajax({
            type: "POST",
            url: '/user/minus_cart_item',
            data: {user_id: user_id, product_id: product_id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (total_sum) {
                Total.html(total_sum);
            },
            error: function() {
                console.log(data);
            }
        });
    }
    else{
        $('#minus'+id).disabled = true;
    }
}
function Plus(quantity,id,product_id,user_id){
    var countProduct = $("#countProduct"+id);
    var total_sum = $("#total_sum"+id);
    var total_val = total_sum.html();
    var price = $("#price"+id);
    var Total = $("#Total");
    var price_val = price.html();
    var quant = countProduct.html();
    if(quant<quantity){
        $('#minus'+id).disabled = false;
        quant++;
        countProduct.html(" "+quant+" ");
        total_sum.html(quant*price_val);
        $.ajax({
            type: "POST",
            url: '/user/plus_cart_item',
            data: {user_id: user_id, product_id: product_id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (total_sum) {
                Total.html(total_sum);
            },
            error: function() {
                console.log(data);
            }
        });
    }
    else{
        $('#plus'+id).disabled = true;
    }
}

function ModalShow(){
    $(function() {
        $('#addCheckout').modal('show');
    });
}

function RemoveAll($user_id){
    $.ajax({
        type: "POST",
        url: '/user/remove_all_products_in_cart',
        data: {user_id: $user_id},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            window.location = "/user/cart/"+$user_id;
        },
        error: function() {
            console.log(data);
        }
    });
}

