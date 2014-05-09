$(document).ready(function(){
	$(window).resize(function(e) {
		var wi =$(window).width();
    });

	$(".header").before().append("<button id='menu' type='button'> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>"); 	
		
	$("#menu").click(function() {
		//alert("hello");
    	$(".menu").slideToggle();
		$("#menu").toggleClass("active");    
    });
		
});	