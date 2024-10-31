<?php
/**
 * Plugin Name:       Wow Viral Signups
 * Plugin URI:        https://wordpress.org/plugins/mwp-viral-signup/
 * Description:       Run viral campaigns with limited spaces availability
 * Version:           2.1
 * Author:            Wow-Company
 * Author URI:        http://wow-company.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wow-marketings
  */
if ( ! defined( 'WPINC' ) ) {die;}
define( 'WOW_SIGNUP_FREE_PLUGIN_BASENAME', dirname(plugin_basename(__FILE__)) );
load_plugin_textdomain('wow-marketings', false, dirname(plugin_basename(__FILE__)) . '/languages/');
function activate_wow_signup_free() {
	require_once plugin_dir_path( __FILE__ ) . 'include/activator.php';	
	}	
register_activation_hook( __FILE__, 'activate_wow_signup_free' );
function deactivate_wow_signup_free() {	
	require_once plugin_dir_path( __FILE__ ) . 'include/deactivator.php';
}
register_deactivation_hook( __FILE__, 'deactivate_wow_signup_free' );

if( !class_exists( 'JavaScriptPacker' )) {
	require_once plugin_dir_path( __FILE__ ) . 'include/class.JavaScriptPacker.php';
}
if( !class_exists( 'WOWWPClass' )) {
	require_once plugin_dir_path( __FILE__ ) . 'include/wowclass.php';
}
require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require_once plugin_dir_path( __FILE__ ) . 'public/public.php';

function wow_signup_free_row_meta( $meta, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $meta;

	$meta[] = '<a href="https://wow-estore.com/support/" target="_blank">Support </a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a>';
	return $meta;
}
add_filter( 'plugin_row_meta', 'wow_signup_free_row_meta', 10, 4 );

function wow_signup_free_action_links( $actions, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $actions;

	$settings_link = '<a href="admin.php?page=wow-signup-free' .'">Settings</a>'; 
	array_unshift( $actions, $settings_link ); 
	return $actions; 
}
add_filter( 'plugin_action_links', 'wow_signup_free_action_links', 10, 2 );