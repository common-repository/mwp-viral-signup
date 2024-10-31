<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php include ('include/data.php'); ?>
<h2><?php esc_attr_e("Viral Signup", "wow-marketing") ?> <?php esc_attr_e("Shortcode", "wow-marketings") ?>: <?php echo "[Wow-Viral-Signups id=$id]"; ?></span></h2>
<form action="admin.php?page=wow-signup-free" method="post">
<div class="wowbox">
<h3><?php esc_attr_e("Name", "wow-marketings") ?></h3>
<div class="inside wow-admin" style="display: block;">	
<div class="wow-admin-col">
<div class="wow-admin-col-12">
<input  placeholder="Name is used only for admin purposes" type='text' name='title' value="<?php echo $title; ?>" class="input-12"/>
</div>
</div>
</div>
</div>
<div class="wowbox">
<h3><?php esc_attr_e("Type", "wow-marketings") ?></h3>
<div class="inside wow-admin" style="display: block;">	
<div class="wow-admin-col">
<div class="wow-admin-col-3">
<select name="type_signup" onclick="wptype();" id="singnup">
<option value="1" <?php if($type_signup=='1') { echo 'selected="selected"'; } ?>><?php esc_attr_e("limited signup + viral sharing", "wow-marketings") ?></option>
<option value="2" <?php if($type_signup=='2') { echo 'selected="selected"'; } ?>><?php esc_attr_e("limited signup", "wow-marketings") ?></option>
<option value="3" <?php if($type_signup=='3') { echo 'selected="selected"'; } ?>><?php esc_attr_e("simple signup + viral sharing", "wow-marketings") ?></option>
<option value="4" <?php if($type_signup=='4') { echo 'selected="selected"'; } ?>><?php esc_attr_e("simple signup", "wow-marketings") ?></option>
</select>
</div>
<div class="wow-admin-col-9"></div>
</div>
</div>
</div>
<div class="wowbox">
<h3><?php esc_attr_e("Signup", "wow-marketings") ?></h3>
<div class="inside wow-admin" style="display: block;">	
<div class="wow-admin-col" id="limited">
<div class="wow-admin-col-3"><?php esc_attr_e("Number of invites", "wow-marketings") ?>:<br/>
<input type="text" name="number_invites" value="<?php echo ( $number_invites ); ?>" />
</div>
<div class="wow-admin-col-3"><?php esc_attr_e("Invites taken", "wow-marketings") ?>:<br/>
<input type="text" name="number_taken" value="<?php echo ( $number_taken ); ?>" /><br/>
<div style="width:80%"><?php esc_attr_e("You can specify the slots that have already been 'taken', to demonstrate social proof", "wow-marketings") ?></div>
</div>
<div class="wow-admin-col-3"><?php esc_attr_e("First text", "wow-marketings") ?>:<br/>
<input type="text" name="first_text" value="<?php echo ( $first_text ); ?>" />
</div>
<div class="wow-admin-col-3"><?php esc_attr_e("Second text", "wow-marketings") ?>:<br/>
<input type="text" name="second_text" value="<?php echo ( $second_text ); ?>" />
</div>
</div>
<div class="wow-admin-col">
<div class="wow-admin-col-6 signup"><?php esc_attr_e("Confirmation text", "wow-marketings") ?>:<br/>
<textarea name="confirmation_text" class="input-6"><?php echo ( $confirmation_text ); ?></textarea>
</div>
<div class="wow-admin-col-3"><?php esc_attr_e("Button text", "wow-marketings") ?>:<br/>
<input type="text" name="button_text" value="<?php echo ( $button_text ); ?>" />
</div>
<div class="wow-admin-col-3"></div>
</div>
</div>
</div>
<div class="wowbox" id="social">
<h3><?php esc_attr_e("Sharing", "wow-marketings") ?></h3>
<div class="inside wow-admin" style="display: block;">
<div class="wow-admin-col">
<div class="wow-admin-col-6 signup"><?php esc_attr_e("Call to share text", "wow-marketings") ?>:<br/>
<textarea name="share_text" class="input-6"><?php echo ( $share_text ); ?></textarea>
</div>	
<div class="wow-admin-col-6 signup"><?php esc_attr_e("Twitter share text", "wow-marketings") ?>:<br/>
<textarea name="twitter_text" class="input-6"><?php echo ( $twitter_text ); ?></textarea>
</div>
</div>
<div class="wow-admin-col">
<div class="wow-admin-col-3"><?php esc_attr_e("Share link", "wow-marketings") ?>:<br/>
<input type="text" name="share_link" value="<?php echo ( $share_link ); ?>" />
</div>
<div class="wow-admin-col-3"><?php esc_attr_e("Specify anchor (Optional)", "wow-marketings") ?>:<br/>
<input type="text" name="specify_anchor" value="<?php echo ( $specify_anchor ); ?>" />
<br/><?php esc_attr_e("Example: #anchor-link", "wow-marketings") ?>
</div>
<div class="wow-admin-col-3"><?php esc_attr_e("Referrals required", "wow-marketings") ?>:<br/>
<input type="text" name="referrals" value="<?php echo ( $referrals ); ?>" />
</div>	
<div class="wow-admin-col-3"><?php esc_attr_e("Block user from singup", "wow-marketings") ?>:<br/>
<input type="text" name="block_user" value="<?php echo ( $block_user ); ?>" /><br/>
<div style="width:80%"><?php esc_attr_e("Specify the amount of days the user will not be allowed to enter additional emails (to eliminate cheating). Minimum 1 day.", "wow-marketings") ?></div>
</div>	
</div>
<div class="wow-admin-col">
<div class="wow-admin-col-3"><?php esc_attr_e("Lead directly to the form", "wow-marketings") ?>: <input name="directly" type="checkbox" id="toform" value="1" <?php if($directly=='1') { echo 'checked="checked"'; } ?>>
</div>
<div class="wow-admin-col-12"><?php esc_attr_e("Facebook sharing", "wow-marketings") ?>:<br/>
<?php esc_attr_e("Facebook uses your site's regular metadata or facebook specific metadata", "wow-marketings") ?><br/>
&#60;meta property="og:locale" content="en_US" /&#62;<br/>
&#60;meta property="og:type" content="website" /&#62;<br/>
&#60;meta property="og:title" content="" /&#62;<br/>
&#60;meta property="og:url" content="" /&#62;<br/>
&#60;meta property="og:site_name" content="" /&#62;<p>
<?php esc_attr_e("If you want to use a custom text, you can enable it, and you will need to setup a FB app with your link and specify the App ID below.", "wow-marketings") ?> <a href="https://www.youtube.com/watch?v=CUdxiFvKm68&index=8&list=PL5MfSKnqm_OcORWmXwY6w0wsadhc0qloH" target="_blank">See instructions</a>
</div>	
<div class="wow-admin-col-12"><?php esc_attr_e("Enable FB custom share text", "wow-marketings") ?>:<input name="custom_share_text" type="checkbox" id="appid" value="1" <?php if($custom_share_text=='1') { echo 'checked="checked"'; } ?> onclick="wpcalc();">
</div>	
</div>
<div class="wow-admin-col" id="app_block">
<div class="wow-admin-col-6"><?php esc_attr_e("Facebook share text", "wow-marketings") ?>:<br/>
<textarea name="facebook_share_text"><?php echo ( $facebook_share_text ); ?></textarea>
</div>	
<div class="wow-admin-col-6"><?php esc_attr_e("Facebook app id", "wow-marketings") ?>:<br/>
<input type="text" name="fb_app_id" value="<?php echo ( $fb_app_id ); ?>" />
</div>	
</div>
</div>
</div>

	<?php submit_button($btn); ?>
    <input type="hidden" name="addwow" value="<?php echo $hidval; ?>" />    
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="wowpage" value="<?php echo $wowpage; ?>" />
	<input type="hidden" name="wowtable" value="<?php echo $table_wow_signup; ?>" />
	<input type="hidden" name="plugdir" value="<?php echo WOW_SIGNUP_FREE_PLUGIN_BASENAME; ?>" />
	<?php wp_nonce_field('wow_action','wow_nonce_field'); ?>
  </form>
