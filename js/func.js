function MenuLateral(){
	if($('#menu_lateral').css('height')=='30px'){
		$('#tabla_menu_lateral').css("display","");
		$('#menu_lateral').animate({'height':'300'},800,"swing",
		function(){
			
			}
		);		
	}
	else {
		$('#menu_lateral').animate({'height':'30px'},800,"swing",
		function(){
			$('#tabla_menu_lateral').css("display"," none");
			}
		);
	}
}