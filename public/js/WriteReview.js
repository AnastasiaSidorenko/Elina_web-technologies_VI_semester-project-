 function post_review(product_id,user_id,lang){
    var review=$("#review-body").value();
     var button=$("#SubmitReview");
     var caption = $('#caption');
    $.ajax({
        url: '/product/{id}/review',
        type: "POST",
        data: {product_id: product_id, user_id: user_id, review: review},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            button.hide();
            if(lang == 'en') {
                caption.html('You review is posted');
            }
            else{
                caption.html('Ваш отзыв добавлен');
            }
        },
        error: function (msg) {
            if(lang == 'en') {
                caption.html('Error. Unable to post your review now');
            }
            else{
                caption.html('Ошибка. Не удалось добавить ваш отзыв');
            }
        }
    });
 }