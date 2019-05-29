function Minus(quantity){
    var countProduct=$("#countProduct");
    var quant = countProduct.html();
   if(quant>0){
       $('#plus').disabled = false;
       quant--;
       countProduct.html(" "+quant+" ");
   }
   else{
       $('#minus').disabled = true;
   }
}
function Plus(quantity){
    var countProduct=$("#countProduct");
    var quant = countProduct.html();
    if(quant<quantity){
        $('#minus').disabled = false;
        quant++;
        countProduct.html(" "+quant+" ");
    }
    else{
        $('#plus').disabled = true;
    }
}

function AddInCart(id_product,id_user){
    var countProduct=$("#countProduct");
    var span=$("#allRight");
    var quant = countProduct.html();
    $.ajax({
        url: '/product_in_cart/store',
        type: "POST",
        data: {id_product: id_product, id_user: id_user,quantity: quant},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            span.html('Добавлено в корзину');
        },
        error: function (msg) {
            alert('Ошибка');
        }
    });
}