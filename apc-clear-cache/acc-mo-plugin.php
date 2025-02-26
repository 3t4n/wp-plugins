<?php
/*
Copyright (C) 2020 Md Obydullah

APC Clear Cache is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
APC Clear Cache is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

// add menu under tools menu
function mo_php_apc_tools_menu() {
    add_submenu_page('tools.php', 'APC Clear Cache', 'APC Clear Cache', 'manage_options', 'apc-clear-cache', 'theme_options_page');
}

// options page
function theme_options_page() { ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1>APCu/APC Clear Cache</h1>

        <?php
            //we check if the page is visited by click on the tabs or on the menu button.
            //then we get the active tab.
            $active_tab = "apc_settings_tab";
            if(isset($_GET["tab"]))
            {
                if($_GET["tab"] == "apc_settings_tab")
                {
                    $active_tab = "apc_settings_tab";
                }
            }
        ?>
        
        <!-- wordpress provides the styling for tabs. -->
        <h2 class="nav-tab-wrapper">
            <!-- when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active -->
            <a href="?page=apc-clear-cache&tab=apc_settings_tab" class="nav-tab <?php if($active_tab == 'apc_settings_tab'){echo 'nav-tab-active';} ?> "><?php _e('Settings', 'sandbox'); ?></a>
        </h2>

        <form method="post" action="options.php">
            <?php
                settings_fields("header_section");
                do_settings_sections("apc-clear-cache");
            ?>
        </form>
    </div>
<?php
}

// add action
add_action("admin_menu", "mo_php_apc_tools_menu");

// display function
function display_options() {
    add_settings_section("header_section", "", "display_header_options_content", "apc-clear-cache");

    //here we display the sections and options in the settings page based on the active tab
    if(isset($_GET["tab"])) {
        if($_GET["tab"] == "apc_settings_tab") {
            add_settings_field("apc_settings", "Clear Cache?", "display_logo_form_element", "apc-clear-cache", "header_section");
            register_setting("header_section", "apc_settings");


        }
        if($_GET["tab"] == "apc_donate_tab") {
            add_settings_field("donate_code", "Buy me a cup of coffee", "display_donate_element", "apc-clear-cache", "header_section");
            register_setting("header_section", "donate_code");
        }
    }
    else {
        add_settings_field("apc_settings", "Clear Cache?", "display_logo_form_element", "apc-clear-cache", "header_section");
        register_setting("header_section", "apc_settings");
    }
    
}

function display_header_options_content() { }

// setting tab
function display_logo_form_element() { 
    ?>

    <a class="button button-primary" href="<?=get_admin_url().'admin.php?page=apc-clear-cache&action=clear'; ?>">Yes</a>

    <?php
    // clear cache
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'clear') {
            mo_php_apc_options();
        }
    }

}

add_action("admin_init", "display_options");