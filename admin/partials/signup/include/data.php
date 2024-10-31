<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
$wowpage = 'wow-signup-free';
$act = (isset($_REQUEST["act"])) ? sanitize_text_field($_REQUEST["act"]) : '';
if ($act == "update") {  
$recid = sanitize_text_field($_REQUEST["id"]);
$result = $wpdb->get_row("SELECT * FROM $table_wow_signup WHERE id=$recid");  
    if ($result){
        $id = $result->id;
        $title = $result->title;
		$type_signup = $result->type_signup;
		$number_invites = $result->number_invites;
		$number_taken = $result->number_taken;
		$first_text = $result->first_text;
		$second_text = $result->second_text;
		$confirmation_text = $result->confirmation_text;
		$button_text = $result->button_text;
		$share_text = $result->share_text;
		$twitter_text = $result->twitter_text;
		$share_link = $result->share_link;
		$specify_anchor = $result->specify_anchor;
		$referrals = $result->referrals;
		$block_user = $result->block_user;
		$directly = $result->directly;
		$custom_share_text = $result->custom_share_text;
		$facebook_share_text = $result->facebook_share_text;
		$fb_app_id = $result->fb_app_id;
		$btn = __("Update", "wow-marketings");
        $hidval = 2;
    }
}
else if ($act == "duplicate") { 
$recid = sanitize_text_field($_REQUEST["id"]);
$result = $wpdb->get_row("SELECT * FROM $table_wow_signup WHERE id=$recid");
   if ($result){   
        $id = "";
        $title = "";
		$type_signup = $result->type_signup;
		$number_invites = $result->number_invites;
		$number_taken = $result->number_taken;
		$first_text = $result->first_text;
		$second_text = $result->second_text;
		$confirmation_text = $result->confirmation_text;
		$button_text = $result->button_text;
		$share_text = $result->share_text;
		$twitter_text = $result->twitter_text;
		$share_link = $result->share_link;
		$specify_anchor = $result->specify_anchor;
		$referrals = $result->referrals;
		$block_user = $result->block_user;
		$directly = $result->directly;
		$custom_share_text = $result->custom_share_text;
		$facebook_share_text = $result->facebook_share_text;
		$fb_app_id = $result->fb_app_id;
		$btn = __("Save", "wow-marketings");
        $hidval = 1;
    }
}
 else {
    $btn = __("Save", "wow-marketings");
    $id = "";
    $title = "";
	$type_signup = "";
	$number_invites = "1000";
	$number_taken = "300";
	$first_text = "invites available";
	$second_text = "out of";
	$confirmation_text = "Thank you for signing up";
	$button_text = "Submit";
	$share_text = "Guess what? Great news! We will give away a lifetime premium account to those who bring 3 friends to sign up!";
	$twitter_text = "Check out awesome wordpress plugins by Wow-Company at http://wow-company.com/";
	$share_link = "http://";
	$specify_anchor = "";
	$referrals = "3";
	$block_user = "30";
	$directly = "1";
	$custom_share_text = "";
	$facebook_share_text = "Check out awesome wordpress plugins by Wow-Company at http://wow-company.com/";
	$fb_app_id = "";
    $hidval = 1;
}
?>