<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.0
 */
if (!defined('ABSPATH')) {
    exit;
}


$sms = new \textme\sms_geteway();
$balance = $sms->get_balance();
$balance = isset($balance->balance) ? $balance->balance : '';
$textme_option = get_option('textme_sms_option');
$textme_account = get_option('textme_sms_account');
?>
<div class="wrap textme_wrap">

    <h1><?php esc_html_e('TextMe SMS', 'textme-sms-integration'); ?></h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox">

                        <h2 class="hndle"><span><?php esc_html_e('General Info', 'textme-sms-integration'); ?></span>
                        </h2>

                        <div class="inside">
                            <p><?php esc_html_e('SMS balance:', 'textme-sms-integration'); ?><?php echo $balance; ?></p>
                            <p style="color: red; font-weight: bold"><?php esc_html_e('To use dynamic fields, press @ and get a menu with dynamic fields', 'textme-sms-integration'); ?></p>
                        </div>
                        <!-- .inside -->

                        <h2 class="hndle">
                            <span><?php esc_html_e('Purchase packages:', 'textme-sms-integration'); ?></span>
                        </h2>
                        <div class="inside">
                            <p><a href="https://textme.co.il/#try"
                                  target="_blank"><?php esc_html_e('Open a free trial account', 'textme-sms-integration'); ?></a>
                            </p>
                            <p><a href="https://textme.co.il/#packages"
                                  target="_blank"><?php esc_html_e('Price list and packages purchase', 'textme-sms-integration'); ?></a>
                            </p>
                            <p><a href="https://textme.co.il/"
                                  target="_blank"><?php esc_html_e('TextMe website', 'textme-sms-integration'); ?></a>
                            </p>

                        </div>

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables -->

            </div>

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <form action="" method="post" id="textme_acount_form">

                        <div class="postbox">

                            <div class="notice notice-success is-dismissible hidden">
                                <p><?php esc_html_e('Successfully updated.', 'textme-sms-integration'); ?></p>
                            </div>

                            <h2 class="hndle">
                                <span><?php esc_html_e('Account details', 'textme-sms-integration'); ?></span></h2>

                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <label for="sms_user_name"><?php esc_html_e('Acount username:', 'textme-sms-integration'); ?></label>
                                        </td>
                                        <td>
                                            <input type="text" name="sms_user_name" id="sms_user_name"
                                                   value="<?php if ($textme_account['sms_user_name']) {
                                                       echo $textme_account['sms_user_name'];
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="sms_pass"><?php esc_html_e('Acount password:', 'textme-sms-integration'); ?></label>
                                        </td>
                                        <td>
                                            <input type="password" name="sms_pass" id="sms_pass"
                                                   value="<?php if ($textme_account['sms_pass']) {
                                                       echo $textme_account['sms_pass'];
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="sms_phone"><?php esc_html_e('Site manager phone:', 'textme-sms-integration'); ?></label>
                                        </td>
                                        <td>
                                            <input type="text" name="sms_phone" id="sms_phone" maxlength="10"
                                                   value="<?php if ($textme_account['sms_phone']) {
                                                       echo $textme_account['sms_phone'];
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="sms_from"><?php esc_html_e('SMS name or number:', 'textme-sms-integration'); ?></label>
                                        </td>
                                        <td>
                                            <input type="text" name="sms_from" id="sms_from"
                                                   value="<?php if ($textme_account['sms_from']) {
                                                       echo $textme_account['sms_from'];
                                                   } ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="button-primary" type="submit" id="textme_acount" name="save"
                                                   value="<?php esc_attr_e('Save', 'textme-sms-integration'); ?>">
                                        </td>
                                        <td>
                                            <div class="spinner"
                                                 style="float:none;width:auto;height:auto;padding:10px 0 10px 50px;background-position:20px 0;"></div>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <!-- .inside -->

                        </div>

                    </form>

                    <form id="textme_option_form" action="" method="post">

                        <?php do_action('textme_sms_form_fields', $textme_option); ?>

                        <input class="button-primary" type="submit" id="textme_submit" name="save"
                               value="<?php esc_attr_e('Save', 'textme-sms-integration'); ?>"/>
                        <div class="spinner"
                             style="float:none;width:auto;height:auto;padding:10px 0 10px 50px;background-position:20px 0;"></div>

                    </form>

                </div>
                <!-- post-body-content -->

            </div>
            <!-- #post-body .metabox-holder .columns-2 -->

            <br class="clear">

        </div>
        <!-- #poststuff -->

    </div>
    <!-- .wrap -->
