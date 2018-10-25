$(function () {
    // 文章点赞功能
    $('.article-list-group .click-num').on('click', function () {
        var article_id = $(this).attr('data-id');
        $.ajax({
            url: '/operation/article_click/',
            method: 'post',
            data: {
                id: article_id,
            },
            success: function (data) {
                console.log(data)
                if (data.code == 0) {
                    layer.msg('点赞成功');
                    window.location.href = window.location.href;
                } else if (data.code == 1) { // 为登录
                    layer.confirm('你还未登录不能点赞', {
                        btn: ['前往登录', '取消'] //按钮
                    }, function () {
                        window.location.href = '/users/login/';
                    }, function () {
                    });
                } else if (data.code == 2) { // 已经点赞
                    layer.msg('取消成功');
                    window.location.href = window.location.href;
                }
            }
        })
    })
    // 删除文章

    $('.article-list-group .del-btn').on('click', function () {
        var article_id = $(this).attr('data-id');
        layer.confirm('确定要删除该文章吗？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.ajax({
                url: '/article/delete_article/',
                method: 'post',
                data: {
                    id: article_id,
                },
                success: function (data) {
                    if (data.code == 0) {
                        layer.msg(data.message);
                        window.location.href = window.location.href;
                    } else {
                        layer.msg(data.message);
                    }
                }
            })
        }, function () {
        });
    })
})