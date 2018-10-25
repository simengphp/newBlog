function ajaxData(c_url, data) {
    let url = c_url;
    $.post(url,data,function (data) {
        if (data.code == 1) {
            $("#ajax_success").show();
            setInterval(function(){
                location.reload();
            },300)
        } else {
            $("#ajax_error").show();
            setInterval(function(){
                location.reload();
            },300)
        }
    })
}

function selectAll(){
    $(':checkbox').each(
        function() {
            if($(this).attr("checked")){
                $(this).removeAttr("checked");
            } else {
                $(this).attr("checked", true);
            }
        }
    );
}

function getAllCheckBox(table, _token) {
    var spCodesTemp = [],val;
    $('input:checkbox[name=id]:checked').each(function(i){
        spCodesTemp.push($(this).val());
    });
    ;
    if (spCodesTemp.length ==0) {
        $("#ajax_error").show();
        $("#ajax_error_msg").text('请选择删除对象!');
        setInterval(function(){
            location.reload();
        },300)
    } else {
        val = spCodesTemp.join(',',spCodesTemp);
    }
    $.post('/common/delFieldBase',{id:val,table:table,_token:_token},function (data) {
        if (data == 1) {
            $("#ajax_success").show();
            $("#ajax_success_msg").text('删除成功!');
            setInterval(function(){
                location.reload();
            },300)
        } else {
            $("#ajax_error").show();
            $("#ajax_error_msg").text('删除失败!');
            setInterval(function(){
                location.reload();
            },300)
        }
    })
}