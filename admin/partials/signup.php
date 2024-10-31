<?php if ( ! defined( 'ABSPATH' ) ) exit; 
$wow = (isset($_REQUEST["wow"])) ? sanitize_text_field($_REQUEST["wow"]) : '';
include_once( 'signup/menu.php' );
if ($wow == "add"){
	include_once( 'signup/add.php' );
}
if ($wow == "signed"){
	include_once( 'signup/signed.php' );
}
if ($wow == "goal"){
	include_once( 'signup/goal.php' );
}
if ($wow == "discount"){
	include_once( 'signup/discount.php' );	
}
if ($wow == ""){
	include_once( 'signup/list.php' );
}
if ($wow == "items"){
	include_once( 'signup/items.php' );	
	return;
}
?>
</div>