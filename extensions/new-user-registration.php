<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * New User Registration TextMe fields
 *
 * Add New User Registration fields to TextME settings page.
 *
 * @param $textme_option
 *
 * @since 1.4
 */
function textme_sms_wordpress_new_user_registration_fields( $textme_option ) {

	?>
	<div class="postbox">

		<h2 class="hndle">
			<?php esc_html_e( 'New User Registration Events', 'textme-sms-integration' ); ?>
		</h2>

		<div class="inside">

			<fieldset>
				<label for="textme_new_user_registration">
					<input type="checkbox" id="textme_new_user_registration" name="textme_new_user_registration" value="1" <?php if ( $textme_option['textme_new_user_registration'] == "1" ) { echo 'checked'; } ?>/>
					<span><?php esc_html_e( 'Send SMS when new user is registered', 'textme-sms-integration' ); ?></span>
				</label>
			</fieldset>

		</div>

	</div>
	<?php

}
add_action( 'textme_sms_form_fields', 'textme_sms_wordpress_new_user_registration_fields', 10, 1 );



/**
 * WordPress new user registration
 *
 * TextME SMS on new user registration.
 *
 * @param $user_id The user ID.
 *
 * @since 1.4
 */
function textme_sms_wordpress_new_user_registration( $user_id ) {

	$account = get_option( 'textme_sms_account' );
	$option = get_option( 'textme_sms_option' );

	if ( 1 == $option['textme_new_user_registration'] ) {

		$user_data = get_userdata( $user_id );

		$content = sprintf(__( 'A new user "%1$s" was registered to the site (%2$s).', 'textme-sms-integration' ), $user_data->user_login , get_site_url());
		
		$sms_geteway = new \textme\sms_geteway();
		$sms_geteway->send_sms( $content, $account['sms_phone'] );

	}

}
add_action( 'user_register', 'textme_sms_wordpress_new_user_registration' );
