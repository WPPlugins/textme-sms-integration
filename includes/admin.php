<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * TextMe Options Page
 *
 * Add options page for the plugin.
 *
 * @since 1.0
 */
function textme_options_page() {

	add_options_page(
		__( 'TextMe SMS', 'textme-sms-integration' ),
		__( 'TextMe SMS', 'textme-sms-integration' ),
		'manage_options',
		'textme_sms',
		'textme_options_page_ui'
	);

}
add_action( 'admin_menu', 'textme_options_page' );



/**
 * TextMe Options Page UI
 *
 * The view of the options page.
 *
 * @since 1.0
 */
function textme_options_page_ui() {

	include 'admin-ui.php';

}



function tetxme_update_option_page() {

    $textme_option = array();
    parse_str( $_POST['data'], $textme_option );
    $textme_option_param = array();
    foreach( $textme_option as $key => $input ){
        $textme_option_param[$key] = sanitize_text_field( $input );
    }

    update_option( 'textme_sms_option', $textme_option_param );
    die();

}
add_action( 'wp_ajax_tetxme_update_option_page', 'tetxme_update_option_page' );



function textme_update_account() {

    $textme_account = array();
    parse_str( $_POST['data'], $textme_account );
    $sms_phone = '0' . intval( $textme_account['sms_phone'] );
    $sms_user_name = sanitize_text_field( $textme_account['sms_user_name'] );
    $sms_pass = sanitize_text_field( $textme_account['sms_pass'] );
    $sms_from = sanitize_text_field( $textme_account['sms_from'] );
    $textme_account_param = array(
        'sms_user_name' => $sms_user_name,
        'sms_pass'      => $sms_pass,
        'sms_phone'     => $sms_phone,
        'sms_from'      => $sms_from
    );

    update_option( 'textme_sms_account', $textme_account_param );
    die();

}
add_action( 'wp_ajax_textme_update_account', 'textme_update_account' );
