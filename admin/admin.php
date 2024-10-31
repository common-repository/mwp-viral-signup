<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
function wow_free_viral_signup_admin_menu() {
	add_menu_page('Wow Viral Signups', __( "Wow <br/>Viral Signups", "wow-marketings"), 'manage_options', 'wow-signup-free', 'wow_free_signup_free', 'dashicons-groups', null); 
	add_action('admin_print_styles', 'wow_script_style');	
}
add_action('admin_menu', 'wow_free_viral_signup_admin_menu');
function wow_free_signup_free() {
	global $wow_plugin;	
	$wow_plugin = true;
	include_once( 'partials/signup.php' );	
	wp_enqueue_script( 'wow-free-signup', plugin_dir_url(__FILE__) . 'js/signup.js', array( 'jquery' ));		 	
	wp_enqueue_style( 'wow-data', plugin_dir_url(__FILE__) .'css/data_style.css');
	wp_enqueue_script( 'wow-data', plugin_dir_url(__FILE__) . 'js/dataTables.js', array( 'jquery' ));
}

if ( ! function_exists ( 'wow_script_style' ) ) {
function wow_script_style() {
	wp_enqueue_style('wow-style', plugin_dir_url(__FILE__) . 'css/style.css'); 	
	
}
}

if ( ! function_exists ( 'wow_nonce_chek' ) ) {
function wow_nonce_chek() 
{
	if ( !empty($_POST) && wp_verify_nonce($_POST['wow_nonce_field'],'wow_action') && current_user_can('manage_options'))
	{
		wow_run_wowwpclass();
	}	
}
add_action( 'plugins_loaded', 'wow_nonce_chek' );

function wow_run_wowwpclass(){
$objItem = new WOWWPClass();
$addwow = (isset($_REQUEST["addwow"])) ? sanitize_text_field($_REQUEST["addwow"]) : '';
$table_name = sanitize_text_field($_REQUEST["wowtable"]);
$wowpage = sanitize_text_field($_REQUEST["wowpage"]);
$id = sanitize_text_field($_POST['id']);
/*  Save and update Record on button submission */
if (isset($_POST["submit"])) {
    if (sanitize_text_field($_POST["addwow"]) == "1") {
        $objItem->addNewItem($table_name, $_POST);			
        header("Location:admin.php?page=".$wowpage."&info=saved");
		exit;		
    } else if (sanitize_text_field($_POST["addwow"]) == "2") {
        $objItem->updItem($table_name, $_POST);				
        header("Location:admin.php?page=".$wowpage."&wow=add&act=update&id=".$id."&info=update");		
       exit;
    }
}
}
}

if ( ! function_exists ( 'wow_plugins_admin_footer_text' ) ) {
function wow_plugins_admin_footer_text( $footer_text ) {
	global $wow_plugin;
	if ( $wow_plugin == true ) {
		$rate_text = sprintf( '<span id="footer-thankyou">Developed by <a href="http://wow-company.com/" target="_blank">Wow-Company</a> | <a href="https://wow-estore.com/support/" target="_blank">Support </a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a></span>'
		);
		return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
	}
	else {
		return $footer_text;
	}	
}
add_filter( 'admin_footer_text', 'wow_plugins_admin_footer_text' );
}