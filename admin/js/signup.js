jQuery(document).ready(function(){
    wpcalc();
	wptype();    
})
function wptype() {
	var type = jQuery('#singnup').val();
	if (type == 1){		
		jQuery('#limited').css('display','');
		jQuery('#social').css('display','');		
	}
	if (type == 2){		
		jQuery('#limited').css('display','');
		jQuery('#social').css('display','none');		
	}
	if (type == 3){		
		jQuery('#limited').css('display','none');
		jQuery('#social').css('display','');		
	}
	if (type == 4){		
		jQuery('#limited').css('display','none');
		jQuery('#social').css('display','none');		
	}
}
function wpcalc(){   
  if (jQuery('#appid').prop('checked')){
	   jQuery('#app_block').css('display','');
   }
   else{
	   jQuery('#app_block').css('display','none');	   
   }    
}