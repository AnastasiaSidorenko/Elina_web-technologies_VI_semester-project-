function Minus(quantity,id){
    var countProduct = $("#countProduct"+id);
    var total_sum = $("#total_sum"+id);
    var total_val = total_sum.html();
    var price = $("#price"+id);
    var price_val = price.html();
    var quant = countProduct.html();
    if(quant>1){
        $('#plus'+id).disabled = false;
        quant--;
        countProduct.html(" "+quant+" ");
        total_sum.html(quant*price_val);
    }
    else{
        $('#minus'+id).disabled = true;
    }
}
function Plus(quantity,id){
    var countProduct=$("#countProduct"+id);
    var quant = countProduct.html();
    var total_sum = $("#total_sum"+id);
    var total_val = total_sum.html();
    var price = $("#price"+id);
    var price_val = price.html();
    if(quant<quantity){
        $('#minus'+id).disabled = false;
        quant++;
        countProduct.html(" "+quant+" ");
        total_sum.html(quant*price_val);
    }
    else{
        $('#plus'+id).disabled = true;
    }
}