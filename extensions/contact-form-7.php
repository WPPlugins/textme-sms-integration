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
 * Contact Form 7 TextMe fields
 *
 * Add CF7 fields to TextME settings page.
 *
 * @param $textme_option
 *
 * @since 1.4
 */
function textme_sms_cf7_fields($textme_option)
{


    $plugin_name = 'contact-form-7/wp-contact-form-7.php';
    $active_plugins = apply_filters('active_plugins', get_option('active_plugins'));

    if (in_array($plugin_name, $active_plugins)) {
        ?>
        <div class="postbox">

            <h2 class="hndle">
                <?php esc_html_e('Contact Form 7 Events', 'textme-sms-integration'); ?>
            </h2>

            <div class="inside">

                <fieldset>
                    <label for="textme_cf7">
                        <input type="checkbox" id="textme_cf7" name="textme_cf7"
                               value="1" <?php if ($textme_option['textme_cf7'] == "1") {
                            echo 'checked';
                        } ?>/>
                        <span><?php esc_html_e('Send SMS to site admin when CF7 form submitted', 'textme-sms-integration'); ?></span>
                    </label>
                </fieldset>


                <fieldset>
                    <label for="textme_cf7_user">
                        <input type="checkbox" id="textme_cf7_user" name="textme_cf7_user"
                               value="1" <?php if ($textme_option['textme_cf7_user'] == "1") {
                            echo 'checked';
                        } ?>/>
                        <span><?php esc_html_e('Send SMS to user when CF7 form submitted', 'textme-sms-integration'); ?></span>
                    </label>
                    <div class="send_user_sms <?php if ($textme_option['textme_cf7_user'] != "1") { echo 'hidden'; } ?>">
                        <table>
                            <tr>
                                <td>
                                    <span><?php esc_html_e('Contact form 7 phone field name (ex your-phone)', 'textme-sms-integration'); ?></span>
                                </td>
                                <td>
                                    <input type="text" id="textme_cf7_phone_field" name="textme_cf7_phone_field"
                                           value="<?php if ($textme_option['textme_cf7_phone_field']) {
                                               echo $textme_option['textme_cf7_phone_field'];
                                           } ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><?php esc_html_e('Content sent to user', 'textme-sms-integration'); ?></span>
                                </td>
                                <td>
                                 <textarea id="textme_cf7_user_content"
                                           name="textme_cf7_user_content" cols="80"
                                           rows="3"
                                           class="all-options"><?php if ($textme_option['textme_cf7_user_content']) {
                                         echo $textme_option['textme_cf7_user_content'];
                                     } ?>
                    </textarea>

                                </td>
                            </tr>
                        </table>
                    </div>

                </fieldset>


            </div>

        </div>
        <?php
    }

}

add_action('textme_sms_form_fields', 'textme_sms_cf7_fields', 10, 1);


/**
 * Contact Form 7 mail sent
 *
 * TextME SMS on successful Contact Form 7 mail submission.
 *
 * @param $contact_form
 *
 * @since 1.0
 */
function textme_sms_cf7_mail_sent($contact_form)
{

    $sms_geteway = new \textme\sms_geteway();
    $account = get_option('textme_sms_account');
    $option = get_option('textme_sms_option');
    $submission = WPCF7_Submission::get_instance()->get_posted_data();


    if (1 == $option['textme_cf7']) {

        unset($submission['_wpcf7']);
        unset($submission['_wpcf7_version']);
        unset($submission['_wpcf7_locale']);
        unset($submission['_wpcf7_unit_tag']);
        unset($submission['_wpcf7_is_ajax_call']);
        unset($submission['mc4wp_checkbox']);


        $sms = '';
        foreach ($submission as $key => $row) {
            $sms .= $key . ': ' . $row . ' | ';
        }

        $sms_geteway->send_sms($sms, $account['sms_phone']);
    }

    if (1 == $option['textme_cf7_user']) {

        $sms_geteway->send_sms($option['textme_cf7_user_content'], $submission[$option['textme_cf7_phone_field']]);
    }

}

add_action('wpcf7_mail_sent', 'textme_sms_cf7_mail_sent');
