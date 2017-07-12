<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.3
 */
if (!defined('ABSPATH')) {
    exit;
}


/**
 * WooCommerce TextMe fields
 *
 * Add WooCommerce fields to TextME settings page.
 *
 * @param $textme_option
 *
 * @since 1.4
 */
function textme_sms_woocommerce_fields($textme_option)
{

    $plugin_name = 'woocommerce/woocommerce.php';
    $active_plugins = apply_filters('active_plugins', get_option('active_plugins'));

    if (in_array($plugin_name, $active_plugins)) {
        ?>
        <div class="postbox">

            <h2 class="hndle">
                <?php esc_html_e('WooCommerce Events', 'textme-sms-integration'); ?>
            </h2>

            <div class="inside">

                <fieldset>
                    <label for="textme_new_order">
                        <input type="checkbox" id="textme_new_order" name="textme_new_order"
                               value="1" <?php if ($textme_option['textme_new_order'] == "1") {
                            echo 'checked';
                        } ?>/>
                        <span><?php esc_html_e('Send SMS when new order created', 'textme-sms-integration'); ?></span>
                    </label>
                </fieldset>

                <div class="textme_new_order_content <?php if ($textme_option['textme_new_order'] != "1") {
                    echo 'hidden';
                } ?>">
                    <table>
                        <tr>
                            <td>
                                <input name="textme_new_order_customer"
                                       type="checkbox" <?php if ($textme_option['textme_new_order_customer'] == "1") {
                                    echo 'checked';
                                } ?>
                                       id="textme_new_order_customer"
                                       value="1"/>
                                <?php esc_html_e('Send SMS to customer:', 'textme-sms-integration'); ?>
                            </td>
                            <td>
								<textarea id="textme_new_order_customer_content"
                                          name="textme_new_order_customer_content" cols="80" rows="3"
                                          class="all-options"><?php if ($textme_option['textme_new_order_customer_content']) {
                                        echo $textme_option['textme_new_order_customer_content'];
                                    } ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name="textme_new_order_customer_manager"
                                       type="checkbox" <?php if ($textme_option['textme_new_order_customer_manager'] == "1") {
                                    echo 'checked';
                                } ?>
                                       id="textme_new_order_customer_manager"
                                       value="1"/>
                                <?php esc_html_e('Send SMS to site manager:', 'textme-sms-integration'); ?>
                            </td>
                            <td>
								<textarea id="textme_new_order_customer_manager_content"
                                          name="textme_new_order_customer_manager_content" cols="80"
                                          rows="3"
                                          class="all-options"><?php if ($textme_option['textme_new_order_customer_manager_content']) {
                                        echo $textme_option['textme_new_order_customer_manager_content'];
                                    } ?></textarea>
                            </td>
                        </tr>

                    </table>
                </div>

                <hr>

                <fieldset>
                    <label for="textme_order_complete">
                        <input name="textme_order_complete" type="checkbox"
                               id="textme_order_complete" <?php if ($textme_option['textme_order_complete'] == "1") {
                            echo 'checked';
                        } ?>
                               value="1"/>
                        <span><?php esc_html_e('Send SMS when order status is completed', 'textme-sms-integration'); ?></span>
                    </label>
                </fieldset>

                <div class="textme_order_complete_content <?php if ($textme_option['textme_order_complete'] != '1') {
                    echo 'hidden';
                } ?>">
                    <table>
                        <tr>
                            <td><?php esc_html_e('Send SMS to customer:', 'textme-sms-integration'); ?></td>
                            <td><textarea id="textme_order_complete_sms" name="textme_order_complete_sms"
                                          cols="80" rows="3"
                                          class="all-options"><?php if ($textme_option['textme_order_complete_sms']) {
                                        echo $textme_option['textme_order_complete_sms'];
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>

                <hr>

                <fieldset>
                    <label for="textme_order_cancel">
                        <input name="textme_order_cancel" type="checkbox"
                               id="textme_order_cancel" <?php if ($textme_option['textme_order_cancel'] == "1") {
                            echo 'checked';
                        } ?>
                               value="1"/>
                        <span><?php esc_html_e('Send SMS when order status is pending payment order received (unpaid)', 'textme-sms-integration'); ?></span>
                    </label>
                </fieldset>

                <div class="textme_order_cancel_content <?php if ($textme_option['textme_order_cancel'] != '1') {
                    echo 'hidden';
                } ?>">
                    <table>
                        <tr>
                            <td>
                                <input type="checkbox" id="textme_order_cancel_manager"
                                       name="textme_order_cancel_manager" value="1"
                                    <?php if ($textme_option['textme_order_cancel_manager'] == 1) {
                                        echo 'checked';
                                    } ?> >
                                <?php esc_html_e('Send SMS to site manager:', 'textme-sms-integration'); ?></td>
                            <td><textarea id="textme_order_cancel_sms" name="textme_order_cancel_sms"
                                          cols="80" rows="3"
                                          class="all-options"><?php if ($textme_option['textme_order_cancel_sms']) {
                                        echo $textme_option['textme_order_cancel_sms'];
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="textme_order_cancel_content <?php if ($textme_option['textme_order_cancel'] != '1') {
                    echo 'hidden';
                } ?>">
                    <table>
                        <tr>
                            <td>
                                <input type="checkbox" id="textme_order_cancel_customer"
                                       name="textme_order_cancel_customer" value="1"
                                    <?php if ($textme_option['textme_order_cancel_customer'] == 1) {
                                        echo 'checked';
                                    } ?> >

                                <?php esc_html_e('Send SMS to customer:', 'textme-sms-integration'); ?></td>
                            <td><textarea id="textme_order_cancel_sms_customer" name="textme_order_cancel_sms_customer"
                                          cols="80" rows="3"
                                          class="all-options"><?php if ($textme_option['textme_order_cancel_sms_customer']) {
                                        echo $textme_option['textme_order_cancel_sms_customer'];
                                    } ?></textarea>
                            </td>
                        </tr>
                    </table>

                </div>


            </div>

        </div>
        <?php
    }

}

add_action('textme_sms_form_fields', 'textme_sms_woocommerce_fields', 10, 1);


/**
 * WooCommerce new order
 *
 * TextME SMS on WooCommerce new order.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function textme_sms_woocommerce_new_order($order_id)
{

    $account = get_option('textme_sms_account');
    $option = get_option('textme_sms_option');

    $billing_phone = get_post_meta($order_id, '_billing_phone', true);
    $sms_customer = $option['textme_new_order_customer_content'];
    $sms_manager = $option['textme_new_order_customer_manager_content'];
    $sms = new textme\sms_geteway();

    if (1 == $option['textme_new_order']) {

        if (1 == $option['textme_new_order_customer']) {
            $sms_content = $sms->create_sms_content($order_id, $sms_customer);
            $sms->send_sms($sms_content, $billing_phone);
        }

        if (1 == $option['textme_new_order_customer_manager']) {
            $sms_content = $sms->create_sms_content($order_id, $sms_manager);
            $sms->send_sms($sms_content, $account['sms_phone']);
        }

    }

}

add_action('woocommerce_order_status_processing', 'textme_sms_woocommerce_new_order');


/**
 * WooCommerce order pending
 *
 * TextME SMS on WooCommerce order pending.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function textme_sms_woocommerce_order_pending($order_id)
{

    $account = get_option('textme_sms_account');
    $option = get_option('textme_sms_option');

    if (1 == $option['textme_order_cancel']) {

        $sms = new textme\sms_geteway();

        if (1 == $option['textme_order_cancel_manager']) {
            $sms_manager = $option['textme_order_cancel_sms'];
            $sms_content = $sms->create_sms_content($order_id, $sms_manager);
            $sms->send_sms($sms_content, $account['sms_phone']);
        }

        if (1 == $option['textme_order_cancel_customer']) {
            $billing_phone = get_post_meta($order_id, '_billing_phone', true);
            $sms_customer = $option['textme_order_cancel_sms_customer'];
            $sms_content = $sms->create_sms_content($order_id, $sms_customer);
            $sms->send_sms($sms_content, $billing_phone);
        }
    }

}

add_action('woocommerce_order_status_cancelled', 'textme_sms_woocommerce_order_pending');

/**
 * WooCommerce order complete
 *
 * TextME SMS on WooCommerce order completion.
 *
 * @param $order_id
 *
 * @since 1.0
 */
function textme_sms_woocommerce_order_complete($order_id)
{

    $option = get_option('textme_sms_option');

    $billing_phone = get_post_meta($order_id, '_billing_phone', true);

    if (1 == $option['textme_order_complete']) {
        $sms = new textme\sms_geteway();
        $sms_content = $sms->create_sms_content($order_id, $option['textme_order_complete_sms']);
        $sms->send_sms($sms_content, $billing_phone);
    }

}

add_action('woocommerce_order_status_completed', 'textme_sms_woocommerce_order_complete');
