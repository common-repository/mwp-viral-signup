<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
global $wpdb;
$wpdb->mwp_signup_free = $wpdb->prefix . 'mwp_signup_free';
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
$sql = "CREATE TABLE " . $wpdb->mwp_signup_free . " (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  title VARCHAR(200) NOT NULL,
  type_signup TEXT,
  number_invites TEXT,
  number_taken TEXT,
  first_text TEXT,
  second_text TEXT,
  confirmation_text TEXT,
  button_text TEXT,
  share_text TEXT,
  twitter_text TEXT,
  share_link TEXT,
  specify_anchor TEXT,
  referrals TEXT,
  block_user TEXT,
  directly TEXT,
  custom_share_text TEXT,
  facebook_share_text TEXT,
  fb_app_id TEXT, 
  mails TEXT,
  UNIQUE KEY id (id)
) DEFAULT CHARSET=utf8;";
dbDelta($sql);
?>