<?php
/**
 * Created by PhpStorm.
 * User: amitmatat
 * Date: 21/04/2017
 * Time: 17:42
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
 * Pojo Form TextMe fields
 *
 * Add pojo fields to TextME settings page.
 *
 * @param $textme_option
 *
 * @since 1.4
 */
function pojo_sms_fields($textme_option)
{
    $plugin_name = 'pojo-forms/pojo-forms.php';
    $active_plugins = apply_filters('active_plugins', get_option('active_plugins'));

    if (in_array($plugin_name, $active_plugins)) { ?>
        <div class="postbox">

            <h2 class="hndle">
                <?php esc_html_e('Pojo forms integration', 'textme-sms-integration'); ?>
            </h2>

            <div class="inside">

                <fieldset>
                    <label for="textme_pojo_admin">
                        <input type="checkbox" id="textme_pojo_admin" name="textme_pojo_admin"
                               value="1" <?php if ($textme_option['textme_pojo_admin'] == "1") {
                            echo 'checked';
                        } ?>/>
                        <span><?php esc_html_e('Send SMS to site admin when pojo form form submitted', 'textme-sms-integration'); ?></span>
                    </label>
                </fieldset>


                <fieldset>
                    <label for="textme_pojo_user">
                        <input type="checkbox" id="textme_pojo_user" name="textme_pojo_user"
                               value="1" <?php if ($textme_option['textme_pojo_user'] == "1") {
                            echo 'checked';
                        } ?>/>
                        <span><?php esc_html_e('Send SMS to user when pojo form form submitted', 'textme-sms-integration'); ?></span>
                    </label>
                    <div class="send_pojo_user_sms <?php if ($textme_option['textme_pojo_user'] != "1") {
                        echo 'hidden';
                    } ?>">
                        <table>
                            <tr>
                                <td>
                                    <span><?php esc_html_e('pojo form phone field title (ex phone)', 'textme-sms-integration'); ?></span>
                                </td>
                                <td>
                                    <input type="text" id="textme_pojo_phone_field" name="textme_pojo_phone_field"
                                           value="<?php if ($textme_option['textme_pojo_phone_field']) {
                                               echo $textme_option['textme_pojo_phone_field'];
                                           } ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><?php esc_html_e('Content sent to user', 'textme-sms-integration'); ?></span>
                                </td>
                                <td>
                                 <textarea id="textme_pojo_user_content"
                                           name="textme_pojo_user_content" cols="80"
                                           rows="3"
                                           class="all-options"><?php if ($textme_option['textme_pojo_user_content']) {
                                         echo $textme_option['textme_pojo_user_content'];
                                     } ?>
                    </textarea>

                                </td>
                            </tr>
                        </table>
                    </div>

                </fieldset>


            </div>

        </div>
    <?php }
}

add_action('textme_sms_form_fields', 'pojo_sms_fields', 10, 1);

/**
 * pojo forms mail sent
 *
 * TextME SMS on successful pojo forms mail submission.
 *
 * @param $contact_form
 *
 * @since 1.0
 */

function textme_sms_pojo_forms_mail_sent($form_id, $field_values)
{

    $account = get_option('textme_sms_account');
    $option = get_option('textme_sms_option');

    if (1 == $option['textme_pojo_admin']) {
        $msg = "";
        foreach ($field_values as $field) {
            $msg .= $field['title'] . ' : ' . $field['value'];
            $msg .= "\n";
        }
        $sms_geteway = new \textme\sms_geteway();
        $sms_geteway->send_sms($msg, $account['sms_phone']);
    }

    if(1 == $option['textme_pojo_user']){
        $phone = '';
        foreach ($field_values as $field) {
            if($field['title']==$option['textme_pojo_phone_field']){
                $phone =  $field['value'];
            }
        }
        $sms_geteway = new \textme\sms_geteway();
        $sms_geteway->send_sms($option['textme_pojo_user_content'], $phone);
    }

}

add_action('pojo_forms_mail_sent', 'textme_sms_pojo_forms_mail_sent', 20, 3);

