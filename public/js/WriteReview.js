 function post_review(product_id,user_id,lang){
    var review=$("#review-body").val();
     var button=$("#SubmitReview");
     var caption = $('#caption');
    $.ajax({
        url: '/user/product/{id}/review',
        type: "POST",
        data: {product_id: product_id, user_id: user_id, review: review},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            button.hide();
            if(lang == 'en') {
                caption.html('<h4>You review is posted</h4>');
            }
            else{
                caption.html('<h4>Ваш отзыв добавлен</h4>');
            }
        },
        error: function (msg) {
            if(lang == 'en') {
                caption.html('<h4>Error. Unable to post your review now</h4>');
            }
            else{
                caption.html('<h4>Ошибка. Не удалось добавить ваш отзыв</h4>');
            }
        }
    });
 }