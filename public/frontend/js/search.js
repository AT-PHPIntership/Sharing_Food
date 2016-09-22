var foodsfoo;
$(document).ready(function(){
  $.getJSON( pathjsonsearch, function( data ) {
    foods = data;
    setAutocomplete();
  });
});

function setAutocomplete(){
  $('#search').autocomplete({
    source: $.map(foods, function (value, index) {
      return {
        label: value.name_food,             
      };
    }),
    messages: {
      noResults: '',
      results: function() {}
    },
    minLength: 0,
  });
}

$(document).keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if (keycode == keypress) {
    event.preventDefault(event);
    var token = $("[name='_token']").val();
    var search = $("[name='search']").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        type: 'POST',
        url: pathresultsearch,
        data: {search: search,},
        dataType: 'json',
        success: function(data){
            $('.firstdata').remove();
            var newRow=$('#food_result').clone(true).attr({'style': 'display: '}).appendTo('#food_search');        
            newRow.find('#food_url ').attr('href',pathfoodresult+'/'+data[0].id);
            newRow.find('#img_food').attr('src',pathfoodresultimg+'/'+data[0].image);
            newRow.find('#food_name').html(data[0].name_food);
            newRow.find('#food_name_url').attr('href',pathfoodresult+'/'+data[0].id);
            // alert('success');          
        },
        error: function(data){
            var errors = JSON.parse(data.responseText).content;
            alert(errors);
        }
    });
  }
  else{
    return false;
  }
});
