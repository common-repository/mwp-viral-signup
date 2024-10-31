<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
require_once plugin_dir_path( __FILE__ ) . 'send/data.php';

function show_wow_signup_free($atts) {
    extract(shortcode_atts(array('id' => ""), $atts));		
    global $wpdb;
	$table_wow_signup = $wpdb->prefix . "mwp_signup_free";    
    $sSQL = $wpdb->prepare("select * from $table_wow_signup WHERE id = %d", $id);
    $arrresult = $wpdb->get_results($sSQL); 
    if (count($arrresult) > 0) {
        foreach ($arrresult as $key => $val) {
			ob_start();
			include( 'partials/public.php' );
			$output_wow_signup=ob_get_contents();
			ob_end_clean();					
        }
    } else {		
		$output_wow_signup = "<p><strong>No Records</strong></p>";      
    }	
	wp_enqueue_style ( 'wow-signup-free-style', plugins_url( 'css/style.css', __FILE__ ));
	wp_enqueue_script( 'wow-signup-free-cookie', plugins_url( 'js/jquery.cookie.js', __FILE__ ));
	wp_enqueue_script( 'wow-signup-free-js', plugins_url( 'js/script.js', __FILE__ ));
	wp_localize_script( 'wow-signup-free-js', 'wow_signup_send_free', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );	
	return $output_wow_signup;
}
add_shortcode('Wow-Viral-Signups', 'show_wow_signup_free');
add_shortcode('mwpSignupFree', 'show_wow_signup_free');