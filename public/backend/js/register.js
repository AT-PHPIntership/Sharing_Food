$('#register').on('click',function(e){
	e.preventDefault();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
	});
	$.ajax({
	        type: 'POST',
	        url: path_register,
	        data: {email: $('form #emailregister').val(), pass: $('form #passregister').val()},
	        dataType: "json",
	        success: function (data) {			            
	            if(data.allow==true){
	            	alert(data.mes);
	            	$('.login-section').click();			            	
	            }
	            else{
	            	alert(data.mes);
	            }
	        }
	}); 
});