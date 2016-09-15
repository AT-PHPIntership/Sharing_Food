
$(document).on('click','#sendcmt',function(e){
    var comment = $('#comment-text').val();
    var token = $("[name='_token']").val();
    var user_id = $("[name='users_id']").val();
    var foods_id = $("[name='foods_id']").val();
    var rating_id = $("[name='rating_id']").val();

    e.preventDefault(e);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        method: "POST",
        url: comment_path,
        data: {
            users_id: user_id,
            ratings_id: rating_id,
            foods_id: foods_id,
            body: comment,
        },
        dataType: 'json',
        success: function(data){
            var newRow=$('#comment').clone(true).attr({'id': data.id,'style': 'display: '}).appendTo('#comment1');        
            newRow.find('div .media').attr('id',data.id);
            newRow.find('.media-heading a').html(data.name);
            newRow.find('.media-body p').html(data.body);
            newRow.find("input[name='comment_id']").attr('value',data.id);
        },
        error: function(data){
            var errors = JSON.parse(data.responseText).content;
            alert(errors);
        }
    });
});
$(document).on('click','#deletecmt',function(evt){
    evt.preventDefault(evt);
    var token = $("[name='_token']").val();
    var comment_id = $(this).next("[name='comment_id']").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        type: 'POST',
        url: comment_path,
        data: {
            _method: 'DELETE',
            commentId: comment_id,
        },
        dataType: 'json',
        success: function(data){
            $('#'+data.commentID).remove();
            descreaseCmt(data.commentID);           
        },
        error: function(data){
            var errors = JSON.parse(data.responseText).content;
            alert(errors);
        }
    });
});
