

<div id="forminix_settings">

    <div class="forminix_settings_header">
        <div class="forminix_close_icon" onclick="forminix_forms_init(`<?php echo esc_url(FORMINIX_URL); ?>`)">
            <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "forminix_close_icon.svg") ?>"/>
        </div>

        <div class="forminix_details">
            <h2>Form Settings</h2>
            <!--<p>Detailed Individual Entry</p>-->
        </div>

        <div class="forminix_settings_header_action">
            <button class="forminix_settings_copy_shortcode" onclick="forminix_settings_copy_shortcode()"></button>
            <button class="forminix_settings_save_btn" onclick="forminix_settings_save_data(`<?php echo esc_url(FORMINIX_URL); ?>`)">Save Settings</button>
        </div>
    </div>



    <div class="forminix_settings_body">
        <div class="forminix_settings_body_container">

            <div class="forminix_settings_loader_container">
                <div class="forminix_settings_loading_bar"></div>
            </div>


            <div class="forminix_settings_main_area">


                <div class="forminix_settings_main_area_header">
                    <div class="forminix_settings_main_area_header_details">
                        <h2>Form Settings</h2>
                        <p>Configure your form updating the settings</p>
                    </div>
                    <button class="forminix_settings_change_to_default" onclick="forminix_settings_restore_defaults(`<?php echo esc_url(FORMINIX_URL); ?>`)">
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "settings/forminix_settings_restore_icon.svg") ?>"/> Restore Defaults
                    </button>
                    <button class="forminix_settings_delete_form" onclick="forminix_settings_delete_form(`<?php echo esc_url(FORMINIX_URL); ?>`)">
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "settings/forminix_settings_delete_icon.svg") ?>"/> Delete Form
                    </button>
                </div>

                <div class="forminix_settings_tab">
                    <div class="forminix_settings_tab_menu">
                        <div class="forminix_settings_tab_menu_item active" data-tab="tab_general">General</div>
                        <div class="forminix_settings_tab_menu_item active" data-tab="tab_email">Email Notification</div>
                        <div class="forminix_settings_tab_menu_item" data-tab="tab_customization">Customization</div>
                        <div class="forminix_settings_tab_menu_item" data-tab="tab_conditional_logic">Conditional Logic</div>
                        <div class="forminix_settings_tab_menu_item" data-tab="tab_integration">Integrations</div>
                    </div>

                    <div class="forminix_settings_tab_body" data-id="tab_general">
                        <div class="forminix_settings_tab_body_container">

                            <h3>Confirmation Setting</h3>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_confirmation_type">Confirmation Type</label>
                                <select id="forminix_settings_field_confirmation_type">
                                    <option value="same_page">Same Page</option>
                                    <option value="custom_url">Custom URL</option>
                                </select>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <div class="forminix_settings_single_form_element_label_action_container">
                                    <label for="forminix_settings_field_confirmation_msg">Confirmation Message</label>
                                    <button class="forminix_settings_open_shortcode_popup_btn" onclick="forminix_settings_confirmation_msg_or_url_shortcode_popup_show(this, `forminix_settings_field_confirmation_msg`)">Add Shortcode</button>
                                </div>
                                <textarea id="forminix_settings_field_confirmation_msg"></textarea>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_confirmation_form_status">After Form Submission</label>
                                <select id="forminix_settings_field_confirmation_form_status">
                                    <option value="hide_form">Hide Form</option>
                                    <option value="reset_form">Reset Form</option>
                                </select>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <div class="forminix_settings_single_form_element_label_action_container">
                                    <label for="forminix_settings_field_confirmation_custom_url">Custom URL</label>
                                    <button class="forminix_settings_open_shortcode_popup_btn" onclick="forminix_settings_confirmation_msg_or_url_shortcode_popup_show(this, ``)">Add Shortcode</button>
                                </div>
                                <input type="url" id="forminix_settings_field_confirmation_custom_url"/>
                            </div>


                            <h3>Form Layout</h3>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_help_message_position">Help Message Position</label>
                                <select id="forminix_settings_field_help_message_position">
                                    <option value="beside_label">Beside Label (Tooltip)</option>
                                    <option value="below_field">Below Input Fields</option>
                                </select>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_asterisk_position">Asterisk Position on Required Field</label>
                                <select id="forminix_settings_field_asterisk_position">
                                    <option value="none">None</option>
                                    <option value="label_left">Left to Label</option>
                                    <option value="label_right">Right to Label</option>
                                </select>
                            </div>


                            <h3>Scheduling & Restrictions</h3>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_enable_form_scheduling">Enable Form Scheduling</label>
                                <select id="forminix_settings_field_enable_form_scheduling">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                            <div class="forminix_settings_single_form_element_sub_section_container">
                                <span class="section_title">Form Scheduling</span>
                                <div class="forminix_settings_single_form_element_column_container">
                                    <div class="forminix_settings_single_form_element_column">
                                        <div class="forminix_settings_single_form_element">
                                            <label for="forminix_settings_field_form_scheduling_start_datetime">Start Datetime</label>
                                            <input type="datetime-local" id="forminix_settings_field_form_scheduling_start_datetime">
                                        </div>
                                    </div>
                                    <div class="forminix_settings_single_form_element_column">
                                        <div class="forminix_settings_single_form_element">
                                            <label for="forminix_settings_field_form_scheduling_end_datetime">End Datetime</label>
                                            <input type="datetime-local" id="forminix_settings_field_form_scheduling_end_datetime">
                                        </div>
                                    </div>
                                </div>

                                <div class="forminix_settings_single_form_element">
                                    <label>Exclude Weekdays</label>
                                    <div class="checkbox_container horizontal left">
                                        <?php $weekdays = ['SAT', 'SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI']; ?>
                                        <?php foreach ($weekdays as $weekday){ ?>
                                            <label class="checkbox_item">
                                                <?php echo esc_attr($weekday); ?>
                                                <input type="checkbox"  class="forminix_settings_field_form_scheduling_exclude_weekday_<?php echo esc_attr(strtolower($weekday)); ?>">
                                                <span class="checkmark"></span>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="forminix_settings_single_form_element">
                                    <label for="forminix_settings_field_form_scheduling_inactive_msg">Form Inactive Message</label>
                                    <textarea id="forminix_settings_field_form_scheduling_inactive_msg" rows="2"></textarea>
                                </div>

                                <div class="forminix_settings_single_form_element">
                                    <label for="forminix_settings_field_form_scheduling_expired_msg">Form Expired Message</label>
                                    <textarea id="forminix_settings_field_form_scheduling_expired_msg" rows="2"></textarea>
                                </div>

                            </div>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_allow_logged_in_only">Allow logged in user only to submit form</label>
                                <select id="forminix_settings_field_allow_logged_in_only">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_require_login_msg">Require Login Message</label>
                                <textarea id="forminix_settings_field_require_login_msg" rows="2"></textarea>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <label for="forminix_settings_field_enable_maximum_entry_limit">Enable Maximum Form Entries Limit</label>
                                <select id="forminix_settings_field_enable_maximum_entry_limit">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                            <div class="forminix_settings_single_form_element_sub_section_container">
                                <span class="section_title">Maximum Form Entries Limitation</span>
                                <div class="forminix_settings_single_form_element_column_container">
                                    <div class="forminix_settings_single_form_element_column">
                                        <div class="forminix_settings_single_form_element">
                                            <label for="forminix_settings_field_maximum_entry_amount">Maximum Entry</label>
                                            <input type="number" id="forminix_settings_field_maximum_entry_amount" value="0">
                                        </div>
                                    </div>
                                    <div class="forminix_settings_single_form_element_column">
                                        <div class="forminix_settings_single_form_element">
                                            <label for="forminix_settings_field_maximum_entry_limitation_type">Limitation On</label>
                                            <select id="forminix_settings_field_maximum_entry_limitation_type">
                                                <option value="total_entries">Total Entries</option>
                                                <option value="per_day">Per Day</option>
                                                <option value="per_week">Per Week</option>
                                                <option value="per_month">Per Month</option>
                                                <option value="per_year">Per Year</option>
                                                <option value="per_user">Per User (Based on IP Address)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element">
                                    <label for="forminix_settings_field_maximum_entry_limitation_msg">Maximum Entry Limit Reached Message</label>
                                    <textarea id="forminix_settings_field_maximum_entry_limitation_msg" rows="2"></textarea>
                                </div>

                            </div>



                            <h3>Export Form (PRO)</h3>
                            <div class="forminix_settings_single_form_element">
                                <label>Export your form including Form Layout, Customization, Settings etc.</label>
                                <div class="checkbox_container horizontal left">
                                    <label class="checkbox_item">Exclude Form Entries<input type="checkbox"  class="forminix_settings_exclude_form_entries_checkbox"><span class="checkmark"></span></label>
                                    <label class="checkbox_item">Exclude Form Settings<input type="checkbox"  class="forminix_settings_exclude_form_settings_checkbox"><span class="checkmark"></span></label>
                                </div>
                            </div>
                            <div class="forminix_settings_single_form_element">
                                <button class="forminix_settings_export_btn" onclick="forminix_settings_export_form(`<?php echo esc_url(FORMINIX_URL); ?>`)">Export</button>
                            </div>

                        </div>
                    </div>


                    <div class="forminix_settings_tab_body" data-id="tab_email">
                        <div class="forminix_settings_tab_body_container" style="max-width: 900px;">


                            <div class="forminix_settings_email_empty">
                                <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "settings/forminix_settings_email_empty.svg") ?>"/>
                                <h2>You haven't created any email notifications yet!</h2>
                                <p>Email Notifications are triggered automatically when a form is submitted.</p>
                                <button onclick="forminix_settings_email_add(``)">Add Notification</button>
                            </div>

                            <div class="forminix_settings_email_main_area">
                                <div class="forminix_settings_email_main_area_header">
                                    <div class="forminix_settings_email_main_area_header_details">
                                        <h2>Email Notifications</h2>
                                        <p>Dynamically send emails when a form is submitted</p>
                                    </div>
                                    <button onclick="forminix_settings_email_add(``)">Add New</button>
                                </div>
                                <div class="forminix_settings_email_container">

                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="forminix_settings_tab_body" data-id="tab_customization">
                        <div class="forminix_settings_tab_body_container">

                            <h3>Form Fields</h3>

                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Background Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_bg_color">
                                            <label for="forminix_settings_field_bg_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Background Color (When Focused)</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_bg_color_focus">
                                            <label for="forminix_settings_field_bg_color_focus">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Border Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_border_color">
                                            <label for="forminix_settings_field_border_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Border Color (When Focused)</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_border_color_focus">
                                            <label for="forminix_settings_field_border_color_focus">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Text Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_text_color">
                                            <label for="forminix_settings_field_text_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Text Color (When Focused)</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_text_color_focus">
                                            <label for="forminix_settings_field_text_color_focus">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Checkbox/Radio Checked Background</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_radio_checked_bg_color">
                                            <label for="forminix_settings_field_radio_checked_bg_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Label Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_label_color">
                                            <label for="forminix_settings_field_label_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Help Message Tooltip Background</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_help_msg_tooltip_bg_color">
                                            <label for="forminix_settings_field_help_msg_tooltip_bg_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Help Message Tooltip Text Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_help_msg_tooltip_text_color">
                                            <label for="forminix_settings_field_help_msg_tooltip_text_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Help Message Text Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_help_msg_text_color">
                                            <label for="forminix_settings_field_help_msg_tooltip_bg_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Help Message Text Size</label>
                                        <div class="size_picker_area">
                                            <input type="number" id="forminix_settings_field_help_msg_text_size">
                                            <label for="forminix_settings_field_help_msg_text_size">px</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Star Rating Default Background Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_star_rating_default_bg_color">
                                            <label for="forminix_settings_field_star_rating_default_bg_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Star Rating Checked Background Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_star_rating_checked_bg_color">
                                            <label for="forminix_settings_field_star_rating_checked_bg_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Range Slider Track Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_range_slider_track_color">
                                            <label for="forminix_settings_field_range_slider_track_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Range Slider Thumb Color</label>
                                        <div class="color_picker_area">
                                            <input type="color" id="forminix_settings_field_range_slider_thumb_color">
                                            <label for="forminix_settings_field_range_slider_thumb_color">Select Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Text Size</label>
                                        <div class="size_picker_area">
                                            <input type="number" id="forminix_settings_field_text_size">
                                            <label for="forminix_settings_field_text_size">px</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Label Text Size</label>
                                        <div class="size_picker_area">
                                            <input type="number" id="forminix_settings_field_label_text_size">
                                            <label for="forminix_settings_field_label_text_size">px</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="forminix_settings_single_form_element_column_container">
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Vertical Padding</label>
                                        <div class="size_picker_area">
                                            <input type="number" id="forminix_settings_field_padding_top_bottom">
                                            <label for="forminix_settings_field_padding_top_bottom">px</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="forminix_settings_single_form_element_column">
                                    <div class="forminix_settings_single_form_element">
                                        <label>Horizontal Padding</label>
                                        <div class="size_picker_area">
                                            <input type="number" id="forminix_settings_field_padding_left_right">
                                            <label for="forminix_settings_field_padding_left_right">px</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="forminix_settings_tab_body" data-id="tab_conditional_logic">
                        <div class="forminix_settings_tab_body_container" style="max-width: 900px;">


                            <div class="forminix_settings_conditional_logic_empty">
                                <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "settings/forminix_settings_logic_empty.svg") ?>"/>
                                <h2>You haven't created any conditions yet!</h2>
                                <p>Condition to dynamically hide field based on values from another field</p>
                                <button onclick="forminix_settings_logic_add(``,``,``,``)">Create First Condition</button>
                            </div>

                            <div class="forminix_settings_conditional_logic_main_area">
                                <div class="forminix_settings_conditional_logic_main_area_header">
                                    <div class="forminix_settings_conditional_logic_main_area_header_details">
                                        <h2>Conditional Fields</h2>
                                        <p>Dynamically display field based on values from another field</p>
                                    </div>
                                    <button onclick="forminix_settings_logic_add(``,``,``,``)">Create New</button>
                                </div>
                                <div class="forminix_settings_conditional_logic_container">



                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="forminix_settings_tab_body" data-id="tab_integration">
                        <div class="forminix_settings_tab_body_container" style="max-width: 900px;">


                            <div class="forminix_settings_integration_empty">
                                <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "settings/forminix_settings_integration_empty.svg") ?>"/>
                                <h2>You haven't added any 3rd party integration yet!</h2>
                                <p>Integration with other tools allows you to dynamically process form data.</p>
                                <button onclick="forminix_settings_integration_popup_show()">Add Integration</button>
                            </div>

                            <div class="forminix_settings_integration_main_area">
                                <div class="forminix_settings_integration_main_area_header">
                                    <div class="forminix_settings_integration_main_area_header_details">
                                        <h2>Integrations</h2>
                                        <p>Integrate with other tools when a form is submitted</p>
                                    </div>
                                    <button onclick="forminix_settings_integration_popup_show()">Add New</button>
                                </div>
                                <div class="forminix_settings_integration_container"></div>
                            </div>


                        </div>
                    </div>


                </div>


            </div>


        </div>
    </div>



</div>



<div class="forminix_settings_shortcode_popup_container">
    <div class="forminix_settings_shortcode_popup_dark_bg"></div>
    <div class="forminix_settings_shortcode_popup">
        <div class="forminix_settings_shortcode_popup_header">
            <h3>Add Shortcode</h3>
            <span class="close_icon" onclick="forminix_settings_shortcode_popup_close()"></span>
        </div>
        <div class="forminix_settings_shortcode_popup_items"></div>
    </div>
</div>



<div class="forminix_settings_integration_popup_container">
    <div class="forminix_settings_integration_popup_dark_bg"></div>
    <div class="forminix_settings_integration_popup">
        <div class="forminix_settings_integration_popup_header">
            <h3>Add New Integration</h3>
            <div class="forminix_settings_integration_popup_header_action">
                <a class="open_module_manager" href="<?php esc_url(menu_page_url("forminix-modules")) ?>">Module Manager</a>
                <span class="close_icon" onclick="forminix_settings_integration_popup_close()"></span>
            </div>

        </div>
        <div class="forminix_settings_integration_popup_items">

            <?php $activated_modules = $this->settings->listAllModules(); ?>
            <?php if(sizeof($activated_modules) == 0){ ?>
                <div class="forminix_settings_integration_popup_item_empty">
                    No Modules Activated.<br>
                    Activate Modules from Module Manager.
                </div>
            <?php } ?>

            <?php foreach ($activated_modules as $module_slug){ ?>
                <?php if($module_slug == "mailchimp"){ ?>
                    <div class="forminix_settings_integration_popup_item" onclick="forminix_integration_mailchimp_add(`<?php echo esc_url(FORMINIX_URL); ?>`, ``)">
                        <span>Mailchimp</span>
                    </div>
                <?php } ?>
                <?php if($module_slug == "slack"){ ?>
                    <div class="forminix_settings_integration_popup_item" onclick="forminix_integration_slack_add(`<?php echo esc_url(FORMINIX_URL); ?>`, ``)">
                        <span>Slack</span>
                    </div>
                <?php } ?>
            <?php } ?>


        </div>
    </div>
</div>
