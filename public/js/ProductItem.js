function Minus(quantity){
    var countProduct=$("#countProduct");
    var quant = countProduct.html();
   if(quant>1){
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

function AddInCart(id_product,id_user,lang){
    console.log(lang);
    var countProduct=$("#countProduct");
    var span=$("#allRight"+id_product);
    var quant = countProduct.html();
    $.ajax({
        url: '/product_in_cart/store',
        type: "POST",
        data: {id_product: id_product, id_user: id_user,quantity: quant},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            if(lang == 'en') {
                span.html('Added to Cart');
            }
            else{
                span.html('Добавлено в корзину');
            }
        },
        error: function (msg) {
            if(lang == 'en') {
                alert('Error. Unable to add product in Cart')
            }
            else {
                alert('Ошибка. Невозможно добавить товар в Корзину');
            }
        }
    });
}