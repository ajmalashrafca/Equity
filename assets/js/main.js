$(document).ready(function(){
	"use strict";
	$('.logout').click(function(){
		$.ajax({
			type:'POST',
			url:'out.php',
			success:function(){
				window.location="/stock";
			}
			});
	});
	
	
	
});