jQuery(document).ready(function() {
	jQuery(".success").css('display', 'none');
	var arrsignup = new Array();
    jQuery(".arr-signup").each(function (i) {		
        arrsignup.push(this.id);
    });
	arrsignup.forEach(function(item) {
		var idcontrol = item.split("-")[1];		
		if (jQuery.cookie("wow-signup-"+idcontrol)){		
		jQuery("#button-singnup-"+idcontrol).attr("disabled", "disabled");
		}	
		var toform = jQuery("#toform-"+idcontrol).val();
		var hvostlink = window.location.search.toString();
		if(hvostlink != '') {
			if(toform == 1){
				jQuery('body,html').animate({scrollTop: jQuery('#signup-'+idcontrol).offset().top - 100}, 500);
			}
			hvost = hvostlink;
			jQuery.cookie("ref-wow-signup", hvost, {expires: 365});
		}
		else {
			if (jQuery.cookie("ref-wow-signup")){
				hvost = jQuery.cookie('ref-wow-signup');
			}
			else{
				hvost = '';
			}
		}
	});		
})
function mpwsignupfree(idsignup) {
	var id = 'signup-'+idsignup;
	var email = jQuery("#" + id +" .signmail").val();
	if ( email == ''){
		jQuery("#" + id +" .signmail").attr("placeholder", "Enter e-mail");
        jQuery("#" + id +" .signmail").css({"border-color": "red", "border-width":"1px", "border-style":"solid"});
        jQuery("#" + id +" .signmail").focus();
		return false;
	} 
	if ( email != ''){
		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		if(pattern.test(email)){
			jQuery("#" + id +" .signmail").removeAttr('style');
		} 
		else {
			jQuery("#" + id +" .signmail").css({"border-color": 'red', "border-width":"1px", "border-style":"solid"});
			jQuery("#" + id +" .signmail").focus();
			return false;
            }
	}	
		var data = {
			'action': 'wow_signup_send_free',
			email:email,
			hvost:hvost,
			idsignup:idsignup
		};
		jQuery.post(wow_signup_send_free.ajaxurl, data, function(msg) {
			var result = msg.status;
			var expect = msg.expect;
			var ccs = 'expires:'+expect;			
			var sharelink = msg.sharelink;
			var link = msg.link;
			var facebook_des = msg.facebook_des;
			var twitter_des = msg.twitter_des;
			var facebook_id = msg.facebook_id;
			var custom_fb = msg.custom_fb;
			var anchor = msg.anchor;					
			if (anchor != ''){
				var twitanchor = '#'+anchor;
				var faceanchor = '%23'+anchor;
			}
			else {
				var twitanchor = '';
				var faceanchor = '';
			}
			if (result == 'OK'){
			Share = {
				facebook: function(purl, ptitle, pimg, text) {
					if (custom_fb == 1){
						url  = 'https://www.facebook.com/dialog/feed?';
						url += '&app_id='+facebook_id;
						url += '&description='+facebook_des;
						url += '&caption='+link;
						url += '&link='+link+'?'+sharelink+faceanchor;	
					}
					else{
						url  = 'http://www.facebook.com/sharer.php?s=100';
						url += '&p[title]='     + encodeURIComponent(ptitle);
						url += '&p[summary]='   + encodeURIComponent(facebook_des);
						url += '&p[url]='       + encodeURIComponent(link+'?'+sharelink+twitanchor);
						url += '&p[images][0]=' + encodeURIComponent(pimg);
					}							
					Share.popup(url);
					},
				twitter: function(purl, ptitle) {
					url  = 'http://twitter.com/share?';
					url += 'text='      + encodeURIComponent(twitter_des);
					url += '&url='      + encodeURIComponent(link+'?'+sharelink+twitanchor);
					url += '&counturl=' + encodeURIComponent(link+'?'+sharelink+twitanchor);
					Share.popup(url);
					},
				popup: function(url) {
					window.open(url,'','toolbar=0,status=0,width=626,height=436');
					}
				};			
				jQuery('#'+id).css('display', 'none');				
				jQuery(".show-"+idsignup).css('display', '');
				jQuery('#err-'+idsignup).html('');
				jQuery('#yourlink-'+idsignup).html(link+'?'+sharelink+twitanchor);
				jQuery.cookie('wow-signup-'+idsignup, 'send', {ccs});
			}
			else{
				jQuery('#err-'+idsignup).html(result);
				}
		});
}