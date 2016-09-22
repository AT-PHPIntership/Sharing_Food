$(document).on('click','#accept_food',function(e){
    var token = $("[name='_token']").val();
    var foods_id = $("#food_accept_id").val();
    var accept = $("#accept").val();

    e.preventDefault(e);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        method: "POST",
        url: pathaccept,
        data: {
            foods_id: foods_id,
            accept: accept,
        },
        dataType: 'json',
        success: function(data){
            $('#'+data.food+'').remove()
            alert(data.mes);
        },
        error: function(data){
            var errors = JSON.parse(data.responseText).content;
            alert(errors);
        }
    });
});