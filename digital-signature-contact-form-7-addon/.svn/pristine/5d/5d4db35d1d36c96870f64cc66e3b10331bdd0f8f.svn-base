<?php if (function_exists("WP_E_Sig")) { ?>
    <div class="contact-form-editor-box-mail" id="wpcf7-mail">

        <h2>E-Signature</h2>
        <fieldset>
            <table class="form-table">
                <tbody>

                    <tr>
                        <th scope="row">

                        </th>
                        <td>
                            <?php $checked = ($settings_enable_esignature) ? "checked" : false; ?>
                            <input name="settings_enable_esignature" type="checkbox" id="settings-enable-esignature" value="1" <?php echo esc_attr($checked); ?>>
                            <label><?php _e('Enable E-Signature for this contract form.', 'esig'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="wpcf7-mail-recipient"><?php _e('Signer Name', 'esig'); ?><font color="red">*</font></label>
                        </th>
                        <td>
                            <input name="settings_signer_name" type="text" id="settings-signer-name" value="<?php echo esc_attr($signer_name); ?>" placeholder="<?php _e('Name or fields', 'esig'); ?>">
                            <span class="howto"> <?php _e('Select the name field from your Contact Form 7. This field is what the signers full name will be on their WP E-Signature contract. You can add first name and last name separated by space.', 'esig'); ?></span>
                            <?php
                            if (ESIG_GET('signer_error') == "error") {
                                echo "<font color=red>Please input correct signer name field</font>";
                            }
                            ?>
                        </td>
                    </tr>
                    <!-- Signer Email Address -->
                    <tr>
                        <th scope="row">
                            <label for="wpcf7-mail-sender"><?php _e('Signer Email Address', 'esig'); ?><font color="red">*</font></label>
                        </th>
                        <td>
                            <select name="settings_signer_email_address" id="settings_signer_email_address">
                                <?php

                                $post = get_post(esigget('post'));

                                $obj =  WPCF7_FormTagsManager::get_instance();

                                $shortcodes = $obj->scan($post->post_content);
                                
                                foreach ($shortcodes as $field) {

                                    if ($field['basetype'] != 'email') {
                                        continue;
                                    }

                                    $selected = ($field['name'] == $signer_email) ? "selected" : null;
                                    echo '<option value="' . $field['name'] . '" ' . $selected . '> ' . $field['name'] . ' </option>';
                                }

                                ?></select>
                            <span class="howto"> <?php _e('Select the email field from your Contact Form 7. This field is what the signers email will be on their WP E-Signature contract.', 'esig'); ?></span>
                            <?php
                            if (ESIG_GET('email_error') == "error") {
                                echo "<font color=red>Please input correct signer e-mail field</font>";
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Signing Logic -->
                    <tr>
                        <th scope="row">
                            <label for="wpcf7-mail-subject"><?php _e('Signing Logic', 'esig'); ?></label>
                        </th>
                        <td>

                            <select name="signing_logic" class="gaddon-setting gaddon-select" id="signing_logic">
                                <option value="redirect" <?php
                                                            if ($signing_logic == "redirect") {
                                                                echo "selected";
                                                            }
                                                            ?>><?php _e('Redirect user to Contract/Agreement after Submission', 'esig'); ?></option>
                                <option value="email" <?php
                                                        if ($signing_logic == "email") {
                                                            echo "selected";
                                                        }
                                                        ?>><?php _e('Send User an Email Requesting their Signature after Submission', 'esig'); ?></option>
                            </select>
                            <span class="howto"><?php _e('Please select your desired signing logic once this form is submitted.', 'esig'); ?></span>
                        </td>
                    </tr>

                    <!-- select sad document -->
                    <tr>
                        <th scope="row">
                            <label for="wpcf7-mail-subject"><?php _e('Select stand alone document', 'esig'); ?><font color="red">*</font></label>
                        </th>
                        <td>
                            <select name="select_sad" id="select_sad">
                                <?php
                                if (class_exists('esig_sad_document')) {

                                    $sad = new esig_sad_document();
                                    $sad_pages = $sad->esig_get_sad_pages();
                                    echo '<option value=""> ' . __('Select an agreement page', 'esig') . ' </option>';
                                    foreach ($sad_pages as $page) {
                                        $selected = ($page->page_id == $select_sad) ? "selected" : null;
                                        if (get_the_title($page->page_id)) {
                                            echo '<option value="' . $page->page_id . '" ' . $selected . '> ' . get_the_title($page->page_id) . ' </option>';
                                        }
                                    }
                                }
                                ?></select>
                            <?php
                            if (ESIG_GET('agreement_error') == "error") {
                                echo "<font color=red>Please select an agreement.</font>";
                            }
                            ?>
                            <span class="howto"><?php _e('If you would like to can <a href="edit.php?post_type=esign&amp;page=esign-add-document&amp;esig_type=sad">create new document', 'esig-nfds'); ?></a></span>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="wpcf7-mail-subject"></label>
                        </th>
                        <td>
                            <select name="underline_data" id="settings-underline_data">
                                <option value="underline" <?php
                                                            if ($underline_data == "underline") {
                                                                echo "selected";
                                                            }
                                                            ?>><?php _e('Underline the data That was submitted from this Contact Form', 'esig'); ?></option>
                                <option value="not_under" <?php
                                                            if ($underline_data == "not_under") {
                                                                echo "selected";
                                                            }
                                                            ?>><?php _e('Do not underline the data that was submitted from the Contact Form', 'esig'); ?></option>
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="signing_reminder_email"><?php _e('Signing Reminder Email', 'esig'); ?></label>
                        </th>
                        <td>
                            <input name="signing_reminder_email" type="hidden" value="0" />
                            <input type="checkbox" name="signing_reminder_email" id="settings-signing_reminder_email" value="1" <?php checked($signing_reminder_email, 1); ?> /><?php _e('Enabling signing reminder email. If/When user has not sign the document', 'esig-cf7'); ?><br><br>

                            <div id="esig-reminder-interval-section" <?php if (empty(checked($signing_reminder_email, 1, false))) {
                                                                            echo ' style="visibility:hidden;" ';
                                                                        } ?>>
                                <?php _e('Send the first reminder to the signer ', 'esig-cf7'); ?><input type="textbox" id="settings-esig-reminder-first-interval" name="reminder_email" min="1" oninput="this.value = (!isNaN(Math.abs(this.value)) && this.value>0)?Math.abs(this.value):null" value="<?php echo esc_attr($reminder_email); ?>" style="width:40px;height:30px;"> <?php _e('days after the initial signing request.', 'esig-cf7'); ?> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                        if (ESIG_GET('reminder_email') == "error") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "<font color=red>Numeric value required</font>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><br><br>
                                <?php _e('Send the second reminder to the signer ', 'esig-cf7'); ?><input type="textbox" id="settings-esig-reminder-second-interval" name="first_reminder_send" min="1" oninput="this.value = (!isNaN(Math.abs(this.value)) && this.value>0)?Math.abs(this.value):null" value="<?php echo esc_attr($first_reminder_send); ?>" style="width:40px;height:30px;"> <?php _e('days after the initial signing request.', 'esig-cf7'); ?> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if (ESIG_GET('first_reminder_send') == "error") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "<font color=red>Numeric value required</font>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?><br>
                                <font id="second-reminder-error" style="display:none" color=red>Second reminder should be Greater than first reminder</font><br>
                                <?php _e('Send the last reminder to the signer  ', 'esig-cf7'); ?><input type="textbox" id="settings-esig-reminder-last-interval" name="expire_reminder" min="1" oninput="this.value = (!isNaN(Math.abs(this.value)) && this.value>0)?Math.abs(this.value):null" value="<?php echo esc_attr($expire_reminder); ?>" style="width:40px;height:30px;"> <?php _e('days after the initial signing request.', 'esig-cf7'); ?> <?php

                                                                                                                                                                                                                                                                                                                                                                                                                                                        if (ESIG_GET('expire_reminder') == "error") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "<font color=red>Numeric value required</font>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><br>
                                <font id="last-reminder-error" style="display:none" color=red>Last reminder should be Greater than Second reminder</font>

                            </div>
                        </td>


                    </tr>


                </tbody>
            </table>
        </fieldset>

    </div>

<?php } else {
    include plugin_dir_path(__FILE__) . 'core-alert.php';
} ?>

<script>
    let esigSettings_signing_reminder_email = document.getElementById("settings-signing_reminder_email");

    esigSettings_signing_reminder_email.addEventListener("click", function(e) {
        if (esigSettings_signing_reminder_email.checked) {
            document.getElementById("esig-reminder-interval-section").style.visibility = "visible";
        } else {
            document.getElementById("esig-reminder-interval-section").style.visibility = "hidden";
        }
    });
</script>