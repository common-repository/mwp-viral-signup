<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wow-signup">
<div id="signup-<?php echo $val->id; ?>" class="arr-signup">
<?php if ($val->type_signup == 1 || $val->type_signup == 2) {; ?>
	<p><span><?php echo ( $val->number_invites - $val->number_taken ); ?> <?php echo ( $val->first_text ); ?></span> <?php echo ( $val->second_text ); ?> <?php echo ( $val->number_invites ); ?></p>
<?php }; ?>	
		<input type="email" class="signmail" onblur="if (this.value == '') this.value = 'Type your email..';" onfocus="if (this.value == 'Type your email..') this.value = '';" value="Type your email..">		
		<button onclick="mpwsignupfree(<?php echo $val->id; ?>);" id="button-singnup-<?php echo $val->id; ?>"><?php echo ( $val->button_text ); ?></button>
	<p><div class="err" id="err-<?php echo $val->id; ?>"></div></p>
	<input type="hidden" id="toform-<?php echo $val->id; ?>" value="<?php echo ( $val->directly ); ?>">
	</div>
	<div class="success show-<?php echo $val->id; ?>">
	<?php if ($val->type_signup == 1 || $val->type_signup == 2) {; ?>
	<div class="limitedtext">
	<p><span><?php echo ( $val->number_invites - $val->number_taken - 1 ); ?> <?php echo ( $val->first_text ); ?></span> <?php echo ( $val->second_text ); ?> <?php echo ( $val->number_invites ); ?></p>	
	</div>
	<?php }; ?>	
		<p><?php echo ( $val->confirmation_text ); ?><p>
		<?php if ($val->type_signup == 1 || $val->type_signup == 3) {; ?>
		<p><?php echo ( $val->share_text ); ?></p>		
		<a onclick="Share.facebook('URL','TITLE','IMG_PATH','DESC')" class="shareBtn fb">Share</a>
		<a onclick="Share.twitter('URL','TITLE')" class="shareBtn tw">Tweet</a>
		<p>Your link:<br/>
		<span id="yourlink-<?php echo $val->id; ?>"></span>
		</p>
		<?php }; ?>
	</div>
</div>