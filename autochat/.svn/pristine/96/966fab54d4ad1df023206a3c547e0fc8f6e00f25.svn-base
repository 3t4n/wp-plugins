<script>
    document.addEventListener('DOMContentLoaded', function() {
        var hiddenInput = document.getElementById('achat-greetings-hidden');
        var checkbox = document.getElementById('achat-greetings-checkbox');
        var hiddenDefInput = document.getElementById('achat-default-rply-hidden');
        var checkboxDefrply = document.getElementById('achat-default-rply-checkbox');

        // Function to toggle the value of the hidden input based on the checkbox state
        function toggleHiddenInputValue() {
            hiddenInput.value = checkbox.checked ? 'on' : 'off';
            hiddenDefInput.value = checkboxDefrply.checked ? 'on' : 'off';
        }

        // Toggle the value initially
        toggleHiddenInputValue();

        // Add event listener to the checkbox for change event
        checkbox.addEventListener('change', function() {
            toggleHiddenInputValue();
        });
        checkboxDefrply.addEventListener('change', function() {
            toggleHiddenInputValue();
        });

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            //var panel = document.getElementsByClassName("panel");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
        }

    });
    
</script>
<?php


// if (
//     isset($_POST['woodecor_submenu_page_nonce']) &&
//     wp_verify_nonce($_POST['woodecor_submenu_page_nonce'], 'woodecor_submenu_page_action')
// ) {
//     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['achat-greetings'])) {
//         $achat_greetings = isset($_POST['achat-greetings']) && $_POST['achat-greetings'] === 'on' ? 'on' : 'off';

//         // Update option
//         update_option('achat_greetings_option', $achat_greetings);
//     }
//     update_option('ch_greeting_option', sanitize_textarea_field($_POST['ch_greeting_field']));
//     // update_option('ch_field1_option', sanitize_text_field($_POST['ch_field1']));
//     // update_option('ch_field2_option', sanitize_text_field($_POST['ch_field2']));
//     // update_option('ch_field3_option', sanitize_textarea_field($_POST['ch_field3'])); // Use sanitize_textarea_field
//     // update_option('ch_field4_option', sanitize_textarea_field($_POST['ch_field4'])); // Use sanitize_textarea_field
 
    

// }
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['achat-default-rply'])) {
//     $achat_default_reply = isset($_POST['achat-default-rply']) && $_POST['achat-default-rply'] === 'on' ? 'on' : 'off';

//     // Update option
//     update_option('achat_default_reply_option', $achat_default_reply);
//     update_option('ch_def_reply_option', sanitize_textarea_field($_POST['ch_def_reply_field']));
// }

    // Use sanitize_textarea_field

?>
<div class="wrap content-area">
    <h5 class="settings-title">Presets</h5>
    <p class="setttings-section">Use pre-written messages to respond to customers quickly and efficiently.</p>


    <form method="post" action="">
        <?php wp_nonce_field('woodecor_submenu_page_action', 'woodecor_submenu_page_nonce'); ?>

        <div class="section-heading">
            <p>Automation</p>
        </div>
        
            <div class="achat-section-bg">
                <div class="achat-section-row">
                    <div class='accordion greeting'>
                            <div class="achat-left-content">
                        
                                <h5>Greetings</h5>
                                <p>The greeting message is a reply sent when a visitor sends their first message, such as "hi" or "hello."</p>
                            </div>
                             <form method="post" action="#">
                            <div class="enable-toggle">
                                    <label class="achat-form-toggle">
                                        <!-- Include a hidden input with a default value -->
                                        <input type="hidden" name="achat-greetings" id="achat-greetings-hidden" value="off">
                                        <!-- Checkbox input with 'on' value only if it's checked -->
                                        <input id="achat-greetings-checkbox" type="checkbox" <?php echo get_option('achat_greetings_option') === 'on' ? 'checked' : ''; ?> class="achat-form-toggle-input">
                                        <span class="achat-form-toggle-control"></span>
                                    </label>
                                </div>

                    </div>
                    
       
                    <div class="panel">
                     
                        <div class="autochat-edit-wrap">
                       
                            <div class="input-field-body">
                                <label for="ch_greeting_field">
                                    <p class="settings-field-title">Message</p>
                                </label>
                                <textarea class="ch-textarea" name="ch_greeting_field" id="ch_greeting_field" cols="50" rows="6" placeholder="Response text"><?php 
                                    if (!get_option('ch_greeting_option')) {
                                        esc_html_e("Hello! Welcome", "autochat");
                                    } 
                                    echo esc_textarea(get_option('ch_greeting_option')); 
                                ?></textarea>
                            </div>
                            <div class="separator"></div>
                            <div class="brn-area">
                                <div class="brn-left">
                                    <div id="modal" class="setting-conf-modal">
                                        <div class="setting-conf-modal-content">
                                            <span class="close-button">&times;</span>
                                            <h2>Reset Message</h2>
                                            <p>This message will be reset to its default message.</p>
                                            <div class="settings-conf-modal-actions">
                                                <button class="modal-cancel-btn" id="cancelButton">Cancel</button>
                                                <button class="modal-reset-btn" id="resetButton">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="openModal" class="reset-btn">Reset Message</span>
                                </div>
                                <div class="btn-right">
                                    <span class="cancel-btn">Cancel</span>
                                    <input type="submit" id="button-save-greeting" class="button-save-inn" value="Save" />
                                    
                                </div>
                            </div>
                        </form>


                        </div>
                    </div>    
                </div>
            </div>
            <form method="post" action="">
            <div class="achat-section-bg">
                <div class="achat-section-row">
                    <div class='accordion greeting' id="def-accordion">
                            <div class="achat-left-content">
                        
                                <h5>Default reply</h5>
                                <p>Default replies will be used when the message does not match any presets.</p>
                            </div>
                            <form method="post" action="">
                            <div class="enable-toggle">
                                    <label class="achat-form-toggle">
                                        <!-- Include a hidden input with a default value -->
                                        <input type="hidden" name="achat-default-rply" id="achat-default-rply-hidden" value="off">
                                        <!-- Checkbox input with 'on' value only if it's checked -->
                                        <input id="achat-default-rply-checkbox" type="checkbox" <?php echo get_option('achat_default_reply_option') === 'on' ? 'checked' : ''; ?> class="achat-form-toggle-input">
                                        <span class="achat-form-toggle-control"></span>
                                    </label>
                                </div>

                    </div>
                    
       
                    <div class="panel" id="def-panel">
                     
                        <div class="autochat-edit-wrap">
                            
                            
                                <div class="input-field-body">
                         
                                    <label for="ch_def_reply_field">
                                        <p class="settings-field-title">Message</p>
                                    </label>
                                    <textarea class="ch-textarea" name="ch_def_reply_field" id="ch_def_reply_field" cols="50" rows="6" placeholder="Response text"><?php if(!get_option('ch_def_reply_option')){
                                        esc_html_e("Thanks for contacting with us","autochat");
                                    } echo esc_textarea(get_option('ch_def_reply_option')); ?></textarea>
                                </div>
                                <div class="separator"></div>
                                <div class="brn-area">
                                    <div class="brn-left">
                                        <div id="modal1" class="setting-conf-modal">
                                            <div class="setting-conf-modal-content">
                                                <span class="close-button">&times;</span>
                                                <h2>Reset Message</h2>
                                                <p>This message will be reset to its default message.</p>
                                                <div class="settings-conf-modal-actions">
                                                    <button class="modal-cancel-btn" id="cancelButtondef">Cancel</button>
                                                    <button class="modal-reset-btn" id="resetButtondef">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="reset-default-reply" id="openModalDefbtn">Reset Message</span>
                                    </div>
                                    <div class="btn-right">
                                        <span class="cancel-btn" id="def-cancel">Cancel</span>
                                        <input type="submit" id="button-save-def" class="button-save-inn" value="Save" />
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
            </form>
        <div class="section-heading">
            <p>Presets</p>
        </div>

        <?php


        if (isset($_POST['setup-update'])) {
            check_admin_referer('far_rules_form');
            $_POST = stripslashes_deep($_POST);

            // If atleast one find has been submitted
            if (isset($_POST['achat-txt']) && is_array($_POST['achat-txt'])) {
                foreach ($_POST['achat-txt'] as $key => $find) {

                    // If empty ones have been submitted we get rid of the extra data submitted if any.
                    if (empty($find)) {
                        unset($_POST['achat-txt'][$key]);
                        unset($_POST['achat-txtarea'][$key]);
                        unset($_POST['achat-txtarea'][$key]);
                        unset($_POST['farposttype'][$key]);
                        unset($_POST['fardescription'][$key]);
                        unset($_POST['enable-dm'][$key]);
                    }

                    // Convert line feeds on non-regex only
                    if (!isset($_POST['farregex'][$key])) {
                        $_POST['achat-txt'][$key] = $find;
                    }
                }
            }
            unset($_POST['setup-update']);
            unset($_POST['submit-import']);

            // Delete the option if there are no settings. Keeps the database clean if they aren't using it and uninstalled.
            if (empty($_POST['achat-txt'])) {
                delete_option('far_plugin_settings');
            } else {
                update_option('far_plugin_settings', $_POST);
            }
            echo '<div id="message" class="updated fade">';
            echo '<p><strong>Options Updated</strong></p>';
            echo '</div>';
        }
        ?>
        <div class="rep-achat-section-bg" style="padding-bottom:5em;">

            <div id="far-items">

                <form method="post" action="<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>">
                    <?php wp_nonce_field('far_rules_form'); ?>
                    <?php $far_settings = get_option('far_plugin_settings'); ?>
                    <ul id="far_itemlist">
                        <?php
                        $i = 0;
                        // If there are any finds already set
                        if (isset($far_settings['achat-txt']) && is_array($far_settings['achat-txt'])) {
                            $i = 1;
                            //var_dump($far_settings['enable-dm']);

                            foreach ($far_settings['achat-txt'] as $key => $find) {

                                if (isset($far_settings['farregex'][$key])) {
                                    $chat_head = $far_settings['farregex'];
                                    $regex_checked = 'CHECKED';
                                } else {
                                    $regex_checked = '';
                                    $chat_head = '';
                                }

                                if (isset($far_settings['achat-txtarea'][$key])) {
                                    $far_replace = $far_settings['achat-txtarea'][$key];
                                } else {
                                    $far_replace = '';
                                }
                                if (isset($far_settings['enable-dm'][$key])) {
                                    $far_check = $far_settings['enable-dm'][$key];
                                } else {
                                    $far_check = '';
                                }

                                echo "<li id='row$i' ";

                                // Provided markup inserted here
                                echo "<div class='achat-section-row'>";
                                echo "<div class='achat-left-content'>";
                               
                                echo "<div class='accordion'>";
                                
                                echo "<label for='achat-txt$i'><h5>".$find ? esc_html($find):'Title'."</h5></label>";
                                echo "<p>" . esc_textarea($far_replace) ."</p>";
                                echo "</div>";
                                echo "<div class='panel'>";
                                echo "<input type='text' class='achat-title-inp' name='achat-txt[$i]' id='achat-txt$i' value='".esc_html($find)."'>";
                                echo "<label for='achat-txtarea$i'><p>Typing the title/keyword in the message field automatically enters the full response</p></label>";
                                echo "<textarea cols='63' rows='3' name='achat-txtarea[$i]' id='achat-txtarea$i'>" . esc_textarea($far_replace) . "</textarea></br>";
                                // Add the new checkbox fid here

                                echo "<input type='checkbox' name='enable-dm[$i]' id='enable-dm$i' value='1' " . ($far_check ? "checked" : "") . " />";
                                echo "<label for='enable-dm$i'>Set as instant message</label>";
                                echo "<p>It will show in a list, and clicking on a question will reveal its predefined answer</p>";
                                
                               echo "<div id='repmodal$i' class='setting-conf-modal repdel'>";
                               echo '<div class="setting-conf-modal-content">';
                                   echo '<span class="close-button">&times;</span>';
                                   echo '<h2>Delete Preset</h2>';
                                   echo '<p>This message will be reset to its default message.</p>';
                                   echo '<div class="settings-conf-modal-actions">';
                                       echo '<button class="modal-cancel-btn" id="cancelButtondef">Cancel</button>';
                                       echo "<button class='modal-del-btn' id='resetButtondef' onClick='removeFormField(\"#row$i\"); return false;'>Delete</button";
                                   echo "</div>";
                                 echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                 echo '<div class="brn-area">';
                                echo '<div class="brn-left">';
                                echo "<div class='del-btn'>";
                                echo "<input style='float:left' type='button' class='button right remove' value='Delete' />";
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="btn-right">';
                
                                echo "<span class='cancel-btn'>Cancel</span>";
                             
                                echo "<input type='submit' class='inner-button-save' value='Save' />";
                                echo  '</div>';
                                echo  '</div>';
                                echo "</div>";
                               

                                

                                // End of provided markup


                             
                                echo "</div>";
                                echo "</li>";
                                unset($regex_checked);
                                $i = $i + 1;
                            }
                        } else {
                            // Do nothing
                        }
                        ?>

                    </ul>
                    <div id="divTxt"></div>
                    <div class="clearpad"></div>
                    <input type="hidden" id="id" value="<?php echo $i; /* used so javascript returns unique ids */ ?>" />
                    <span class="pls-icon"><img src="/wp-content/plugins/autochat/assets/images/plus.png" alt=""></span>
                    <input type="button" class="button left add-btn" value="Add Response" onClick="addFormField(); return false;" />
                    <input type="hidden" name="setup-update" />

            </div>
            <div class="toast">Settings saved successfully!</div>
            <div class="final-submit-btn">
                <input type='submit' class='button-save' value='Save Changes' />
            </div>
        </div>
    
    </form>
</div>

<?php



?>