
$(document).on('click','#sendcmt',function(e){
    var comment = $('#comment-text').val();
    var token = $("[name='_token']").val();
    var user_id = $("[name='users_id']").val();
    var foods_id = $("[name='foods_id']").val();
    var rating_id = $("[name='rating_id']").val();
    const CREATED = 200;

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
            alert(data);           
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
    var comment_id = $("[name='comment_id']").val();
    const CREATED = 200;

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
            alert(data.commentID);
            descreaseCmt(data.commentID);           
        },
        error: function(data){
            var errors = JSON.parse(data.responseText).content;
            alert(errors);
        }
    });
});
