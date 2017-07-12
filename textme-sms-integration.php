<?php
/*
Plugin Name: TextMe SMS
Plugin URI:  https://wordpress.org/plugins/textme-sms-integration/
Description: Send custom SMS messages from your WordPress site to your customers.
Version:     1.7.2
Author:      Amit Matat
Author URI:  https://www.linkedin.com/in/amitmatatof
Text Domain: textme-sms-integration
*/



/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Include plugin files
 */
include_once ( plugin_dir_path( __FILE__ ) . 'includes/i18n.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/scripts-styles.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );



/**
 * Include external addons and extensions
 */
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/sms-geteway.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/new-user-registration.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/contact-form-7.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/woocommerce.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/pojo-forms.php' );
