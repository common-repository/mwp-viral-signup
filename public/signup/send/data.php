<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
if( defined('DOING_AJAX') && DOING_AJAX ){
	add_action( 'wp_ajax_wow_signup_send_free', 'wow_signup_send_free' );
	add_action( 'wp_ajax_nopriv_wow_signup_send_free', 'wow_signup_send_free' );
}
function wow_signup_send_free() {	
	$id = $_POST['idsignup'];
	$email = $_POST['email'];
	$hvost = $_POST['hvost'];		
	$rehvost = substr($hvost, 1);
	global $wpdb;
	$table_wow_signup = $wpdb->prefix . "mwp_signup_free"; 
	$sSQL = "select * from $table_wow_signup WHERE id=$id";
	$arrresult = $wpdb->get_results($sSQL); 
	if (count($arrresult) > 0) {
		foreach ($arrresult as $key => $val) {
		$arr_mails = unserialize($val->mails);
		if (count($arr_mails)>50){
			$response = array(
				"status" => "Limit the number of emails",
				"sharelink" => "",
				);
			wp_send_json( $response );
			return;
		}
		if (is_array($arr_mails)){
		   foreach ($arr_mails as $key => $value){
			if($key == $email){
				$control = 1;
				$response1 = array(
				"status" => "This email is already in the database",
				"sharelink" => "",
				);				
				break;
			}
			else{
				$control = 2;
				if ($rehvost != ""){
					foreach ($arr_mails as $key => $value){
						if(md5($key) == $rehvost){
							$arr_mails[$key] = $value+1;
							break;
						}
					}
				}
				$arr_mails = array_merge( array( $email => 0 ), $arr_mails );
				break;
			}
		}
		}
		else {
			$arr_mails = array( $email => 0 );
		}
		if ($val->share_link == "http://"){
			$share_link = get_site_url();
		}
		else {
			$share_link = $val->share_link;
		}
		$response = array(
		"expect" => $val->block_user,
		"status" => "OK",
		"sharelink" => md5($email),
		"link" => $share_link,
		"facebook_des" => $val->facebook_share_text,
		"twitter_des" => $val->twitter_text,
		"facebook_id" => $val->fb_app_id,
		"custom_fb" => $val->custom_share_text,
		"anchor" => $val->specify_anchor		
		);
		$limit = $val->number_taken+1;
		$mails = serialize( $arr_mails );		
		if ($control == 1){
			wp_send_json( $response1 );
		}
		else {
			$wpdb->update( $table_wow_signup ,array( 'number_taken' => $limit, 'mails' => $mails),array( 'id' => $id ));
			wp_send_json( $response );
		}
	}
	}
	exit();
	}
?>