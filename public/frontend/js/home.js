$(document).ready(function() {
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
	$("span.menu").click(function(){
		$(".top-nav ul").slideToggle(500, function(){
		});
	});
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
	//  script-for sticky-nav 
	 var navoffeset=$(".navgation").offset().top;
	 $(window).scroll(function(){
		var scrollpos=$(window).scrollTop(); 
		if(scrollpos >=navoffeset){
			$(".navgation").addClass("fixed");
		}else{
			$(".navgation").removeClass("fixed");
		}
	 });	 
});
