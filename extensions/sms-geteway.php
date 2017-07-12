<?php
namespace textme;



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
 * SMS Gateway
 *
 * ...
 *
 * @since 1.0
 */
class sms_geteway {

    private $shop_manager_phone;

    private function user_access() {
        $account = get_option('textme_sms_account');

        return $xml = '<user>
        <username>' . $account['sms_user_name'] . '</username>
        <password>' . $account['sms_pass'] . '</password>
        </user>';

    }

    private function sms_content( $content, $phone_num ) {
        return $xml = '<destinations>
        <phone id="TextMe">' . $phone_num . '</phone>
        </destinations>
        <message>' . $content . '</message>';
    }

    public function send_sms( $content, $phone_num ) {
        $option = get_option('textme_sms_account');

        $xml = "<?xml version='1.0' encoding='UTF-8'?>
        <sms>" . $this->user_access() . "
        <source>" . $option['sms_from'] . "</source>" . $this->sms_content($content, $phone_num) . "
        </sms>";

        $this->sms_geteway($xml);
    }

    public function get_balance() {
        $xml = "<?xml version='1.0' encoding='UTF-8'?>
        <balance>" . $this->user_access() . "</balance>";

        return $this->sms_geteway($xml);
    }


    function sms_geteway( $xml ) {

        $url = "https://sms.invitee.co.il/api";
        $CR = curl_init();
        curl_setopt($CR, CURLOPT_URL, $url);
        curl_setopt($CR, CURLOPT_POST, 1);
        curl_setopt($CR, CURLOPT_FAILONERROR, true);
        curl_setopt($CR, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($CR, CURLOPT_HTTPHEADER, array("charset=utf-8"));
        curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($CR);
        $error = curl_error($CR);
        if ( !empty( $error ) )
			die( sprintf( __( 'Error: %s', 'textme-sms-integration' ), $error ) );
        return $xml = simplexml_load_string($result);

    }

    public function create_sms_content( $order_id, $sms_customer ) {

        $order = new \ WC_Order( $order_id );

        $billing_first_name = get_post_meta( $order_id, '_billing_first_name', true );
        $billing_last_name  = get_post_meta( $order_id, '_billing_last_name',  true );
        $billing_address    = get_post_meta( $order_id, '_billing_address_1',  true );
        $billing_city       = get_post_meta( $order_id, '_billing_city',       true );
        $billing_email      = get_post_meta( $order_id, '_billing_email',      true );

        $sms_customer = str_replace( "[first name]",   $billing_first_name, $sms_customer );
        $sms_customer = str_replace( "[last name]",    $billing_last_name, $sms_customer  );
        $sms_customer = str_replace( "[order number]", $order_id, $sms_customer           );
        $sms_customer = str_replace( "[address]",      $billing_address, $sms_customer    );
        $sms_customer = str_replace( "[city]",         $billing_city, $sms_customer       );
        $sms_customer = str_replace( "[email]",        $billing_email, $sms_customer      );

        return $sms_customer;

    }

}
