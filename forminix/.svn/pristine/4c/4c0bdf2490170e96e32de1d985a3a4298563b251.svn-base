

<div id="forminix_builder">

    <div class="forminix_builder_header">
        <div class="forminix_close_icon" onclick="forminix_builder_leave(`<?php echo esc_url(FORMINIX_URL); ?>`)">
            <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "forminix_close_icon.svg") ?>"/>
        </div>

        <div class="forminix_details">
            <h2>Form Builder</h2>
            <p>Customize forms for your needs</p>
        </div>

        <div class="forminix_builder_form_header_action">
            <button class="forminix_builder_copy_shortcode" onclick="forminix_builder_copy_shortcode()"></button>
            <button class="forminix_builder_save_form_btn" onclick="forminix_builder_save_form()">Save Form</button>
        </div>

    </div>



    <div class="forminix_builder_body">
        <div class="forminix_builder_sidebar">

            <div class="forminix_builder_sidebar_nav">
                <div class="forminix_builder_sidebar_nav_item active" data-target="nav_fields">Fields</div>
                <div class="forminix_builder_sidebar_nav_item" data-target="nav_customize">Customize</div>
            </div>


            <div class="forminix_builder_sidebar_nav_body" data-id="nav_fields">
                <div class="forminix_builder_sidebar_slider">
                    <div class="forminix_builder_sidebar_slider_item active" data-slider="slider_general">General</div>
                    <div class="forminix_builder_sidebar_slider_item" data-slider="slider_advanced">Advanced</div>
                    <div class="forminix_builder_sidebar_slider_item" data-slider="slider_containers">Containers</div>
                </div>
                <div class="forminix_builder_sidebar_slider_body" data-id="slider_general">
                    <div class="forminix_nav_fields_search">
                        <input type="text" onkeyup="forminix_builder_search_field(this)"/>
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_search_icon.svg") ?>"/>
                    </div>
                    <div class="forminix_builder_sidebar_fields_container">

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("simple_text"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_simple_text.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Simple Text</h3>
                                <p>Single Line Text Input Field.</p>
                            </div>
                        </div>


                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("full_name"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_name.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Name</h3>
                                <p>Single Line Text Input Field for person's name.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("email_address"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_email_address.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Email Address</h3>
                                <p>Single Line Text Input Field for taking email address.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("number"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_number.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Number Field</h3>
                                <p>Field that allows to input only number value.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("password"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_password.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Password</h3>
                                <p>Single line password text input field.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("phone"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_phone.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Phone Number</h3>
                                <p>Field to take phone number input.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("website_url"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_website_url.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Website URL</h3>
                                <p>Single line input field to take valid URL input.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("time"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_time.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Time Field</h3>
                                <p>Input field to take only time input.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("date"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_date.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Date Field</h3>
                                <p>Input field to take only date input.</p>
                            </div>
                        </div>


                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("datetime"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_datetime.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Date and Time</h3>
                                <p>Input field to take both date and time input.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("dropdown"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_dropdown.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Dropdown</h3>
                                <p>Input field to list down various options.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("radio"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_radio.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Radio Field</h3>
                                <p>Allows to choose only one option from multiple items.</p>
                            </div>
                        </div>



                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("checkbox"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_checkbox.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Check Box</h3>
                                <p>Allows to choose only multiple options from list of items.</p>
                            </div>
                        </div>




                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("text_area"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_text_area.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Text Area</h3>
                                <p>Multiple Line Text Input Field.</p>
                            </div>
                        </div>





                    </div>
                </div>
                <div class="forminix_builder_sidebar_slider_body" data-id="slider_advanced">
                    <div class="forminix_nav_fields_search">
                        <input type="text" onkeyup="forminix_builder_search_field(this)"/>
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_search_icon.svg") ?>"/>
                    </div>
                    <div class="forminix_builder_sidebar_fields_container">

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("submit_btn"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_submit_btn.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Submit Button</h3>
                                <p>Custom button to submit the form.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("address"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_address.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Address Fields</h3>
                                <p>Multiple fields for complete address.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("country"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_country.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Country List</h3>
                                <p>Input field to list down countries.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("custom_html"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_custom_html.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Custom HTML</h3>
                                <p>HTML code to be shown as normal content.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("star_rating"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_star_rating.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Star Rating</h3>
                                <p>Radio input based star rating field.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("file"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_file.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>File Upload</h3>
                                <p>Input field to allow upload files.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("grecaptcha"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_grecaptcha.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Google reCAPTCHA</h3>
                                <p>Human check using reCAPTCHA v2.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("rich_text"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_rich_text.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Rich Text Field</h3>
                                <p>Field to allow format-able text.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("color_picker"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_color_picker.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Color Picker</h3>
                                <p>Field to allow choose color.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("shortcode"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_shortcode.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Shortcode</h3>
                                <p>Output shortcode rendered data.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("single_range_slider"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_single_range_slider.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Single Range Slider</h3>
                                <p>Field to allow single range input.</p>
                            </div>
                        </div>

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("dual_range_slider"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_dual_range_slider.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>Dual Range Slider</h3>
                                <p>Field to allow dual range input.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="forminix_builder_sidebar_slider_body" data-id="slider_containers">

                    <div class="forminix_nav_fields_search">
                        <input type="text" onkeyup="forminix_builder_search_field(this)"/>
                        <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_search_icon.svg") ?>"/>
                    </div>

                    <div class="forminix_builder_sidebar_fields_container">

                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("2_column"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_2_column.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>2 Column Container</h3>
                                <p>Container to show fields in multiple columns.</p>
                            </div>
                        </div>
                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("3_column"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_3_column.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>3 Column Container</h3>
                                <p>Container to show fields in multiple columns.</p>
                            </div>
                        </div>
                        <div class="forminix_builder_sidebar_field" <?php echo ($this->utils->generateBuilderFieldDataHTML($this->utils->getDefaultFieldData("4_column"))); ?>>
                            <img class="drag_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_drag_icon.svg") ?>"/>
                            <img class="field_icon" src="<?php echo esc_url(FORMINIX_IMG_DIR . "builder/forminix_field_4_column.svg") ?>"/>
                            <div class="forminix_builder_sidebar_field_details">
                                <h3>4 Column Container</h3>
                                <p>Container to show fields in multiple columns.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>




            <div class="forminix_builder_sidebar_nav_body forminix_builder_field_customizer" data-id="nav_customize">

                <div class="forminix_builder_field_customizer_empty">
                    No Field Selected
                </div>

            </div>

        </div>



        <div class="forminix_builder_editor_container">

            <div class="forminix_builder_editor">
                <div class="forminix_builder_loader_container">
                    <div class="forminix_builder_loading_bar"></div>
                </div>
                <div class="forminix_builder_form">
                    <h2 class="forminix_builder_form_name" contenteditable="true">Untitled Form</h2>
                    <div class="forminix_builder_form_elements">




                    </div>
                    <div class="forminix_builder_form_elements_empty"></div>
                </div>
            </div>

        </div>
    </div>



</div>

