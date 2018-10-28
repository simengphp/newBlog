$(function () {
    $("p img").addClass('img-responsive');
    $('.collect').click(function () {
        var url = '/base/collect';
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        $.post(url,{'_token':token,'article_id':id},function (data) {
            if (data == -1) {
                location.href="/blog/manager/login";
            }
        })
        if ($(this).hasClass('glyphicon-heart') ) {
            $(this).removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
        } else {
            $(this).removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
        }

    })
})