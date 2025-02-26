<?php
function opaigpt_plugin_help_tabs() {
    global $opaigpt_options_page;
    $screen = get_current_screen();
    if($screen->id != $opaigpt_options_page)
        return;

    $screen->add_help_tab(array(
        'id' => 'opaigpt-overview',
        'title' => __('Overview', 'ai-chatgpt-content-and-image-generator'),
        'content' => opaigpt_help_tab_content('opaigpt-overview')
    ));
    $screen->add_help_tab(array(
        'id' => 'opaigpt-setup',
        'title' => __('New ChatGPT', 'ai-chatgpt-content-and-image-generator'),
        'content' => opaigpt_help_tab_content('opaigpt-setup')
    ));
 
}

function opaigpt_help_tab_content($tab = 'opaigpt-overview') {

    if($tab == 'opaigpt-overview') {
        ob_start(); ?>
        
<?php
return ob_get_clean();
}

elseif ($tab == 'opaigpt-setup') {
    ob_start(); ?>
    
    <?php
    return ob_get_clean();
}
}