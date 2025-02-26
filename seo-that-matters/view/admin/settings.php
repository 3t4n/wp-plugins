<?php

namespace SeoThatMatters;
use SeoThatMatters\PluginMessages;

if (!defined('WPINC')) { die; }

$views = array(
        "meta-schema" => __('Metas & Schemas'),
        "sitemap-robots" => __('Sitemap & Robots'),
        "misc" => __('Miscellaneous'),
    );

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-plugin-wrapper">

    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-header">
        <h1 class="<?php echo esc_attr(SEOTM_PREFIX); ?>-page_title"><?php echo esc_html(SEOTM_NAME); ?><span> v. <?php echo esc_html(SEOTM_VERSION); ?></span></h1>
        <p class="<?php echo esc_attr(SEOTM_PREFIX); ?>-page_description"><?php echo esc_html(SEOTM_DESC); ?></p>
    </div>
    
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-wrapper">
        <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-messages">
            <?php do_action("PluginMessages"); ?>
            <span></span>
        </div>
        
        <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-navigation navigation flex">
            
            <ul class="nav">
                <?php
                foreach($views as $slug => $view):
                ?>
                <li class="<?php echo esc_attr(SEOTM_PREFIX); ?>-tab-<?php echo esc_html($slug) ?>">
                    <a href="#tab-<?php echo esc_html($slug) ?>" data-tab="tab-<?php echo esc_html($slug) ?>" id="<?php echo esc_attr(SEOTM_PREFIX); ?>-tab-<?php echo esc_html($slug) ?>"<?php echo esc_html($slug) == 'floating' ? ' class="current"' : ''?>><?php _e($view, SEOTM_PREFIX); ?></a>
                </li>
                <?php
                endforeach;
                ?>
                <?php do_action("plugin_after_menu_tab"); ?>
            </ul>
            
            <ul class="mt-auto small-padding">
                <li><a href="#tab-import" data-tab="tab-import" id="tab-import"><?php _e('Import Settings')?></a></li>
                <li><a href="<?php echo esc_url(admin_url('/tools.php?page="'. SEOTM_PREFIX .'&'. SEOTM_PREFIX .'-action=export')) ?>" class="<?php echo esc_attr(SEOTM_PREFIX); ?>-ignore"><?php _e('Export Settings', SEOTM_PREFIX) ?></a></li>
                <li><a href="<?php echo esc_url(admin_url('/tools.php?page="'. SEOTM_PREFIX .'&'. SEOTM_PREFIX .'-action=reset')) ?>" class="<?php echo esc_attr(SEOTM_PREFIX); ?>-ignore reset-confirm"><?php _e('Reset Plugin', SEOTM_PREFIX) ?></a></li>
            </ul>
            
        </div>
        
        <form method="post" enctype="multipart/form-data" class="<?php echo esc_attr(SEOTM_PREFIX); ?>-form" action="<?php echo plugin_instance()->admin_url(); ?>" >
            <?php wp_nonce_field(SEOTM_PREFIX . '-settings-action', SEOTM_PREFIX . '_settings_nonce'); ?>
            
            <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-content">
                <?php
                
                do_action("plugin_before_body");
                
                foreach ($views as $slug => $view) :
                    print '<section class="tab-'. esc_html($slug) .'" id="'. esc_html($slug) .'">';
                    plugin_instance()->admin_view( 'parts/' . esc_html($slug));
                    print '</section>';
                endforeach;
                plugin_instance()->admin_view('parts/import'); 
                
                do_action("plugin_after_body");
                ?>
            </div>
            
            <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-save-settings">
                <input type="submit" value="<?php _e('Save Changes', SEOTM_PREFIX) ?>" class="button button-primary button-large" name="<?php echo esc_attr(SEOTM_PREFIX); ?>-settings" />
            </div>
        </form>
        
        <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-sidebar">
            <?php plugin_instance()->admin_view('parts/sidebar'); ?>
        </div>
        
    </div>
</div>

<?php
wp_enqueue_media();