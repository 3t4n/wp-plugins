<?php
$field_data = isset($field->field_data) ? $field->field_data : Null;
if($field_data == Null){
    return;
}


/* Unescape All Field Data First */
foreach ($field_data as $key=>$value){
    $field_data->$key = $this->base_client->utils->forminix_unesc_string($value);
}

/* Help Message */
$help_msg_position = isset($help_msg_position) ? $help_msg_position : "beside_label";
$help_msg_html_tooltip = "";
$help_msg_html = "";
if($help_msg_position == "beside_label"){
    $help_msg_allowed = array(
        'div' => array('class' => array()),
        'span' => array('class' => array())
    );
    if(isset($field_data->help_msg)){
        if(strlen(trim($field_data->help_msg))>0){
            $help_msg_html_tooltip = "<div class=\"forminix_help_msg_tooltip\">
                                <span class=\"forminix_help_msg_tooltiptext\">".esc_attr($field_data->help_msg)."</span>
                             </div>";
        }
    }
}else{
    $help_msg_allowed = array(
        'p' => array('class' => array())
    );
    if(isset($field_data->help_msg)){
        if(strlen(trim($field_data->help_msg))>0){
            $help_msg_html = "<p class=\"forminix_help_msg\">".esc_attr($field_data->help_msg)."</p>";
        }
    }
}


/* Asterisk Position on Required Field */
$asterisk_position = isset($asterisk_position) ? $asterisk_position : "none";
if($asterisk_position != "none"){
    if(isset($field_data->label) && isset($field_data->required)){
        if($field_data->required == "1"){
            if($asterisk_position == "label_left"){
                $field_data->label = "* ".$field_data->label;
            }else if($asterisk_position == "label_right"){
                $field_data->label = $field_data->label." *";
            }
        }
    }
}



/* Label Alignment CSS Prefix - Remove this condition on Version 2.0 */
if(isset($field_data->label_position)){
    if(strlen($field_data->label_position) > 0){
        if (strpos($field_data->label_position, 'label_') === false) {
            $field_data->label_position = "label_".$field_data->label_position;
        }
    }
}


/* Conditional Logic */
$conditional_logic_class = "";
$forminix_form_logics = isset($forminix_form_logics) ? $forminix_form_logics : array();
foreach ($forminix_form_logics as $logic_item){
    if($field_data->field_id == $logic_item->target_field){
        $conditional_logic_class = "forminix_hidden_by_logic";
    }
}
?>
<?php if($field_data->slug == "simple_text"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="text" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_value); ?>" minlength="<?php echo esc_attr($field_data->min_length); ?>" maxlength="<?php echo esc_attr($field_data->max_length); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "full_name"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="text" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_value); ?>" minlength="<?php echo esc_attr($field_data->min_length); ?>" maxlength="<?php echo esc_attr($field_data->max_length); ?>" pattern="[<?php echo esc_attr($this->base_client->utils->generateAllowedCharToPattern($field_data->allowed_chars)); ?>]+" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "email_address"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="email" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_value); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "number"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="number" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_number_value); ?>" min="<?php echo esc_attr($field_data->min_value); ?>" max="<?php echo esc_attr($field_data->max_value); ?>" pattern="[<?php echo ($field_data->allow_decimal == "1") ? ".0-9" : "0-9"; ?>]+" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "password"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="password" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_value); ?>" minlength="<?php echo esc_attr($field_data->min_length); ?>" maxlength="<?php echo esc_attr($field_data->max_length); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "phone"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="tel" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_value); ?>" minlength="<?php echo esc_attr($field_data->min_length); ?>" maxlength="<?php echo esc_attr($field_data->max_length); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <?php if($field_data->country_flag_phone == "1"){ ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script>
            jQuery(document).ready(function($){
                'use strict';
                var phoneInputField = document.querySelector("#forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>");
                window.intlTelInput(phoneInputField, {});
            });
        </script>
        <style>.iti{display: block !important;}</style>
    <?php } ?>
<?php } ?>
<?php if($field_data->slug == "website_url"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="url" placeholder="<?php echo esc_attr($field_data->placeholder); ?>" value="<?php echo esc_attr($field_data->default_value); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "time"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="time" value="<?php echo esc_attr($field_data->default_time_value); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "date"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="date" value="<?php echo esc_attr($field_data->default_date_value); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "datetime"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="datetime-local" value="<?php echo esc_attr($field_data->default_datetime_value); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "dropdown"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <select name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
                <?php if(strlen(trim($field_data->placeholder_dropdown)) > 0){ ?>
                    <option value=""><?php echo esc_attr($field_data->placeholder_dropdown); ?></option>
                <?php } ?>
                <?php foreach (explode ("::forminix_separator::", $field_data->options_dropdown) as $option){ ?>
                    <option value="<?php echo esc_attr($option); ?>"><?php echo esc_attr($option); ?></option>
                <?php } ?>
            </select>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "country"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <select name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
                <?php if(strlen(trim($field_data->placeholder_dropdown)) > 0){ ?>
                    <option value=""><?php echo esc_attr($field_data->placeholder_dropdown); ?></option>
                <?php } ?>
                <?php foreach (explode ("::forminix_separator::", $field_data->options_dropdown) as $option){ ?>
                    <option value="<?php echo esc_attr($option); ?>"><?php echo esc_attr($option); ?></option>
                <?php } ?>
            </select>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "radio"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <div class="radio_container <?php echo ($field_data->orientation == "2") ? "horizontal" : ""; ?> <?php echo esc_attr($field_data->option_alignment); ?>">
                <?php foreach (explode ("::forminix_separator::", $field_data->options_radio) as $option){ ?>
                    <label class="radio_item"><?php echo esc_attr($option); ?><input type="radio" name="<?php echo esc_attr($field_data->name); ?>" class="radio_<?php echo esc_attr($field_data->field_id); ?> <?php echo esc_attr($field_data->field_class); ?>" value="<?php echo esc_attr($option); ?>" onclick="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>><span class="checkmark"></span></label>
                <?php } ?>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('.radio_<?php echo esc_attr($field_data->field_id); ?>').change(function(){
                jQuery('.radio_<?php echo esc_attr($field_data->field_id); ?>').not(this).prop('checked', false);
            });
        });
    </script>
<?php } ?>
<?php if($field_data->slug == "checkbox"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <div class="checkbox_container <?php echo ($field_data->orientation == "2") ? "horizontal" : ""; ?> <?php echo esc_attr($field_data->option_alignment); ?>">
                <?php foreach (explode ("::forminix_separator::", $field_data->options_checkbox) as $option){ ?>
                    <label class="checkbox_item"><?php echo esc_attr($option); ?><input type="checkbox" name="<?php echo esc_attr($field_data->name); ?>" class="checkbox_<?php echo esc_attr($field_data->field_id); ?> <?php echo esc_attr($field_data->field_class); ?>" value="<?php echo esc_attr($option); ?>" onclick="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>><span class="checkmark"></span></label>
                <?php } ?>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <?php if($field_data->required == "1"){ ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                'use strict';
                jQuery('.checkbox_<?php echo esc_attr($field_data->field_id); ?>').change(function(){
                    if(jQuery('.checkbox_<?php echo esc_attr($field_data->field_id); ?>:checked').length>0) {
                        jQuery('.checkbox_<?php echo esc_attr($field_data->field_id); ?>').removeAttr('required');
                    } else {
                        jQuery('.checkbox_<?php echo esc_attr($field_data->field_id); ?>').attr('required', 'required');
                    }
                });
            });
        </script>
    <?php } ?>
<?php } ?>
<?php if($field_data->slug == "star_rating"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <div class="forminix_star_rating_container <?php echo esc_attr($field_data->star_alignment); ?>">
                <div class="forminix_star_rating">
                    <?php for($forminix_star_i = $field_data->star_count; $forminix_star_i >= 1; $forminix_star_i--){ ?>
                        <input type="radio" name="<?php echo esc_attr($field_data->name); ?>" class="star_rating_<?php echo esc_attr($field_data->field_id); ?> <?php echo esc_attr($field_data->field_class); ?>" id="star_rating_<?php echo esc_attr($field_data->field_id); ?>_<?php echo esc_attr($forminix_star_i); ?>" value="<?php echo esc_attr($forminix_star_i); ?>" onclick="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>/>
                        <label for="star_rating_<?php echo esc_attr($field_data->field_id); ?>_<?php echo esc_attr($forminix_star_i); ?>"></label>
                    <?php } ?>
                </div>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('.star_rating_<?php echo esc_attr($field_data->field_id); ?>').change(function(){
                jQuery('.star_rating_<?php echo esc_attr($field_data->field_id); ?>').not(this).prop('checked', false);
            });
        });
    </script>
<?php } ?>
<?php if($field_data->slug == "text_area"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <textarea name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" rows="<?php echo esc_attr($field_data->textarea_rows); ?>" minlength="<?php echo esc_attr($field_data->min_length); ?>" maxlength="<?php echo esc_attr($field_data->max_length); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>><?php echo esc_attr($field_data->default_textarea_value); ?></textarea>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "custom_html"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>">
        <?php echo wp_kses_post($this->base_client->utils->forminix_codify_string($field_data->html)); ?>
    </div>
<?php } ?>
<?php if($field_data->slug == "grecaptcha"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>">
        <script type="text/javascript">
            var verifyCallback_<?php echo esc_attr($field_data->field_id); ?> = function(response) {
                document.getElementById("forminix_google_recaptcha_<?php echo esc_attr($field_data->field_id); ?>").dataset.response = response
                if (response.length !== 0) {
                    document.getElementById("forminix_google_recaptcha_<?php echo esc_attr($field_data->field_id); ?>").closest("div.forminix_single_form_element").classList.remove("forminix_field_error_occurred")
                }
            };
            var onloadCallback_<?php echo esc_attr($field_data->field_id); ?> = function() {
                grecaptcha.render('forminix_google_recaptcha_<?php echo esc_attr($field_data->field_id); ?>', {
                    'sitekey' : '<?php echo esc_attr($field_data->grecaptcha_site_key); ?>',
                    'theme' : '<?php echo esc_attr($field_data->grecaptcha_theme); ?>',
                    'callback' : verifyCallback_<?php echo esc_attr($field_data->field_id); ?>
                });
            };
        </script>
        <div class="forminix_grecaptcha_container <?php echo esc_attr($field_data->grecaptcha_alignment); ?>">
            <div class="forminix_grecaptcha" data-response="" id="forminix_google_recaptcha_<?php echo esc_attr($field_data->field_id); ?>"></div>
        </div>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback_<?php echo esc_attr($field_data->field_id); ?>&render=explicit"
                async defer>
        </script>
    </div>
<?php } ?>
<?php if($field_data->slug == "rich_text"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <textarea name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" onkeyup="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>><?php echo esc_attr($field_data->default_rich_text_value); ?></textarea>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';

            var tinymce_plugins = 'textcolor,image,lists,link'
            if(tinymce.PluginManager.lookup.link === undefined){
                tinymce_plugins = 'textcolor,image,lists'
            }
            wp.editor.remove("forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>");
            wp.editor.initialize("forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>", {
                tinymce: {
                    wpautop: true,
                    plugins: tinymce_plugins,
                    external_plugins: {
                        'code': forminix_default_js_var.tinymce_code_plugin,
                    },
                    toolbar1: '<?php echo esc_attr(join(",", explode ("::forminix_separator::", $field_data->allowed_rich_text_plugins))); ?>',
                    height : "200"
                }
            });
            tinymce.get("forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>").on('Paste Change input Undo Redo', function () {
                jQuery("#forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>").val(tinymce.get("forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>").getContent()).trigger("change")
            });
        });
    </script>
<?php } ?>
<?php if($field_data->slug == "color_picker"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <div class="color_picker_area">
                <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="hidden" value="<?php echo esc_attr($field_data->default_color_value); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
                <input id="forminix_field_id_tmp_<?php echo esc_attr($field_data->field_id); ?>" type="color" value="<?php echo esc_attr($field_data->default_color_value); ?>">
                <label for="forminix_field_id_tmp_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->default_color_value); ?></label>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('#forminix_field_id_tmp_<?php echo esc_attr($field_data->field_id); ?>').change(function(){
                jQuery('#forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>').val(jQuery(this).val()).trigger("change");
                jQuery(this).parent().find("label").text(jQuery(this).val());
            });
        });
    </script>
<?php } ?>
<?php if($field_data->slug == "shortcode"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>">
        <?php echo do_shortcode($this->base_client->utils->forminix_codify_string($field_data->shortcode)); ?>
    </div>
<?php } ?>
<?php if($field_data->slug == "single_range_slider"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="hidden" value="<?php echo esc_attr($field_data->default_single_range_value); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <div class="forminix_range_slide" id="forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?>">
                <div class="slider_element">
                    <span class="tooltip_1 tooltip">0</span>
                    <div class="slider-track"></div>
                    <input type="range" min="<?php echo esc_attr($field_data->min_range_value); ?>" max="<?php echo esc_attr($field_data->max_range_value); ?>" value="<?php echo esc_attr($field_data->default_single_range_value); ?>" class="slider_1">
                </div>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <script src="<?php echo esc_url(FORMINIX_JS_DIR . 'forminix_range_slider.js'); ?>"></script>
    <script>
        jQuery(document).ready(function($){
            'use strict';
            jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input').change(function(){
                jQuery('#forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>').val(jQuery(this).val()).trigger("change");
            });
            forminix_init_single_range_slider("#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?>");
        });
    </script>
<?php } ?>
<?php if($field_data->slug == "dual_range_slider"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <input name="<?php echo esc_attr($field_data->name); ?>" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="hidden" value="<?php echo esc_attr($field_data->default_dual_range_min_value); ?>-<?php echo esc_attr($field_data->default_dual_range_max_value); ?>" onchange="forminix_field_remove_errors(this)" <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
            <div class="forminix_range_slide" id="forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?>">
                <div class="slider_element">
                    <span class="tooltip_1 tooltip">0</span>
                    <span class="tooltip_2 tooltip">100</span>
                    <div class="slider-track"></div>
                    <input type="range" min="<?php echo esc_attr($field_data->min_range_value); ?>" max="<?php echo esc_attr($field_data->max_range_value); ?>" value="<?php echo esc_attr($field_data->default_dual_range_min_value); ?>" class="slider_1">
                    <input type="range" min="<?php echo esc_attr($field_data->min_range_value); ?>" max="<?php echo esc_attr($field_data->max_range_value); ?>" value="<?php echo esc_attr($field_data->default_dual_range_max_value); ?>" class="slider_2">
                </div>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
    <script src="<?php echo esc_url(FORMINIX_JS_DIR . 'forminix_range_slider.js'); ?>"></script>
    <script>
        jQuery(document).ready(function($){
            'use strict';
            jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input.slider_1').change(function(){
                jQuery('#forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>').val(
                    jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input.slider_1').val()+"-"+jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input.slider_2').val()
                ).trigger("change");
            });
            jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input.slider_2').change(function(){
                jQuery('#forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>').val(
                    jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input.slider_1').val()+"-"+jQuery('#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?> input.slider_2').val()
                ).trigger("change");
            });
            forminix_init_double_range_slider("#forminix_range_slider_<?php echo esc_attr($field_data->field_id); ?>");
        });
    </script>
<?php } ?>
<?php if($field_data->slug == "submit_btn"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>">
        <div class="custom_btn_container <?php echo esc_attr($field_data->btn_alignment); ?>">
            <button class="custom_btn <?php echo esc_attr($field_data->btn_size); ?> <?php echo esc_attr($field_data->field_class); ?>" style="background: <?php echo esc_attr($field_data->btn_bg_color); ?>; color: <?php echo esc_attr($field_data->btn_txt_color); ?>" onclick="forminix_form_submit(`<?php echo esc_attr($unique_id); ?>`)"><?php echo esc_attr($field_data->btn_text); ?></button>
        </div>
    </div>
<?php } ?>
<?php if($field_data->slug == "file"){ ?>
    <div class="forminix_single_form_element <?php echo esc_attr($field_data->container_class); ?> <?php echo esc_attr($field_data->label_position); ?> <?php echo esc_attr($conditional_logic_class); ?>" data-field_id="<?php echo esc_attr($field_data->field_id); ?>" data-field_slug="<?php echo esc_attr($field_data->slug); ?>" data-required_error_msg="<?php echo esc_attr($field_data->required_error_msg); ?>" data-max_filesize="<?php echo esc_attr($field_data->max_filesize); ?>">
        <label class="forminix_element_label" for="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>"><?php echo esc_attr($field_data->label); ?><?php echo wp_kses($help_msg_html_tooltip, $help_msg_allowed); ?></label>
        <div class="forminix_element_field_main">
            <div class="forminix_file_picker">
                <input name="<?php echo esc_attr($field_data->name); ?>" onchange="forminix_populate_filename_on_select(this)" class="<?php echo esc_attr($field_data->field_class); ?>" id="forminix_field_id_<?php echo esc_attr($field_data->field_id); ?>" type="file" accept="<?php echo esc_attr($field_data->allowed_file_ext); ?>" onclick="forminix_field_remove_errors(this)" <?php if(isset($field_data->allow_multiple_file)) { echo esc_attr(($field_data->allow_multiple_file == "1") ? "multiple" : ""); } ?> <?php echo esc_attr(($field_data->required == "1") ? "required" : ""); ?>>
                <label><?php echo esc_attr($field_data->file_placeholder); ?></label>
                <span style="background: <?php echo esc_attr($field_data->file_btn_bg_color); ?>; color: <?php echo esc_attr($field_data->file_btn_txt_color); ?>"><?php echo esc_attr($field_data->file_btn_txt); ?></span>
            </div>
            <?php echo wp_kses($help_msg_html, $help_msg_allowed); ?>
        </div>
    </div>
<?php } ?>


