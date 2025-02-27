<?php

// form based on https://gist.github.com/DavidWells/4653358

// TEXTBOX - Name: plugin_options[text_cssclass]
function cuexlinks_setting_string_manual()
{
    $options = get_option('plugin_options');
    // Überprüfe ob $options ein Array ist und der Wert existiert
    $value = '';
    if (is_array($options) && isset($options['text_manual'])) {
        $value = esc_attr($options['text_manual']);
    }
    
    echo "<input id='plugin_text_manual' name='plugin_options[text_manual]' size='40' type='text' value='" . $value . "' />";
}
// TEXTBOX - Name: plugin_options[text_cssclass]

function cuexlinks_setting_string_fn()
{
    $options = get_option('plugin_options');
    // Überprüfe ob $options ein Array ist und der Wert existiert
    $value = '';
    if (is_array($options) && isset($options['text_cssclass'])) {
        $value = esc_attr($options['text_cssclass']);
    }
    
    echo "<input id='plugin_text_cssclass' name='plugin_options[text_cssclass]' size='40' type='text' value='" . $value . "' />";
}

// TEXTAREA - Name: plugin_options[text_area_exclude]
function cuexlinks_setting_plugin_textarea_exclude_fn()
{
    $options = get_option('plugin_options');
    echo __("<em>Domain name <strong>must be</strong> comma(,) separated. <code>http://</code> or <code>https://</code><br /><code>rel=\"nofollow\"</code> will not added to \"Exclude Domains\"</em>", 'customize-external-links') .
        "<br /><textarea id='plugin_textarea_exclude' name='plugin_options[text_area_exclude]' rows='7' cols='50' type='textarea'>{$options['text_area_exclude']}</textarea>";
}

// CHECKBOX - Name: plugin_options[chkIconSize]
function cuexlinks_setting_chksize_fn()
{
    $checked = "";

    $options = get_option('plugin_options');
    if (isset($options['chkIconSize'])) {
        $checked = ' checked="checked" ';
    }
    ?>

<input <?=$checked?>
		id='plugin_chksize'
		name='plugin_options[chkIconSize]'
		type='checkbox' />
		<?php
}

// CHECKBOX - Name: plugin_options[chkNoFollow]
function cuexlinks_setting_plugin_chknofollow_fn()
{
    $checked = "";

    $options = get_option('plugin_options');
    if (isset($options['chkNoFollow'])) {
        $checked = ' checked="checked" ';
    }
    ?>

<input <?=$checked?>
		id='plugin_chknofollow'
		name='plugin_options[chkNoFollow]'
		type='checkbox' />
		<?php
}

// CHECKBOX - Name: plugin_options[chkNoOpener]
function cuexlinks_setting_plugin_chknoopener_fn()
{
    $checked = "";
    $options = get_option('plugin_options');
    if (isset($options['chkNoOpener'])) {
        $checked = ' checked="checked" ';
    }
    ?>

<input <?=$checked?>
        id='plugin_chknoopener'
        name='plugin_options[chkNoOpener]'
        type='checkbox' />
        <?php
}


// CHECKBOX - Name: plugin_options[chkNewWindow]
function cuexlinks_setting_plugin_chknewwindow_fn()
{
    $checked = "";
    $options = get_option('plugin_options');
    if (is_array($options) && isset($options['chkNewWindow']) && $options['chkNewWindow']) {
        $checked = ' checked="checked" ';
    }
    ?>
    <input <?=$checked?>
        id='plugin_chknewwindow'
        name='plugin_options[chkNewWindow]'
        type='checkbox' />
    <?php
}


// CHECKBOX - Name: plugin_options[chkNoReferrer]
function cuexlinks_setting_plugin_chknoreferrer_fn()
{
    $checked = "";
    $options = get_option('plugin_options');
    if (isset($options['chkNoReferrer'])) {
        $checked = ' checked="checked" ';
    }
    ?>

<input <?=$checked?>
		id='plugin_chknoreferrer'
		name='plugin_options[chkNoReferrer]'
		type='checkbox' />
		<?php
}

// CHECKBOX - Name: plugin_options[chkToMenu]
function cuexlinks_setting_plugin_chkmenu_fn()
{
    $checked = "";

    $options = get_option('plugin_options');
    if (isset($options['chkToMenu'])) {
        $checked = ' checked="checked" ';
    }
    ?>

<input <?=$checked?>
		id='plugin_chkmenu'
		name='plugin_options[chkToMenu]'
		type='checkbox' />
		<?php
}

// RADIO-BUTTON - Name: plugin_options[option_iconType]
function cuexlinks_setting_radio_fn()
{
    $options = get_option('plugin_options');
    // Überprüfe ob $options ein Array ist und setze Standardwerte falls nicht
    if (!is_array($options)) {
        $options = array(
            'option_iconType' => 'None' // Standardwert
        );
    }

    $items = array("None", "fa-external-link-square-alt", "fa-external-link-alt", "ascii-8599", "ascii-8625", "ascii-8663", "manual");
    $item_tag = array(
        "None", 
        "<i class=\"fas fa-external-link-square-alt\"></i> Icon by Fontawesome", 
        "<i class=\"fas fa-external-link-alt\"></i> Icon by Fontawesome", 
        "&#8599; " . __("(recommened)"), 
        "&#8625;", 
        "&#8663;", 
        "manual"
    );

    // Zusätzliche Sicherheitsüberprüfung für option_iconType
    $current_value = isset($options['option_iconType']) ? $options['option_iconType'] : 'None';

    for ($i = 0; $i < count($items); $i++) {
        $checked = ($current_value == $items[$i]) ? ' checked="checked" ' : '';
        echo "<label><input " . $checked . " value='" . esc_attr($items[$i]) . "' name='plugin_options[option_iconType]' type='radio' /> " . $item_tag[$i] . "</label><br />";
    }
}


cuexlinks_options_page_fn();
