<?php

class Add_Meta_Tag_For_Wordpress_General_Setting {

    
    public static function init() {        
        add_action('metadata_general_setting_save_field', array(__CLASS__, 'metadata_general_setting_save_field'));
        add_action('metadata_general_setting', array(__CLASS__, 'metadata_general_setting'));
    }

    public static function metadata_general_setting_save_field() {
        $metadata = self::metadata_general_setting_fields();
        $Html_output = new Add_Meta_Tag_For_Wordpress_Html_output();
        $Html_output->save_fields($metadata);
    }

    public static function metadata_general_setting() {
        $metadata = self::metadata_general_setting_fields();
        $Html_output = new Add_Meta_Tag_For_Wordpress_Html_output();
        ?>
        <form id="mailchimp_form" enctype="multipart/form-data" action="" method="post">
            <?php $Html_output->init($metadata); ?>
            <p class="submit">
                <input type="submit" name="metadata" class="button-primary" value="<?php esc_attr_e('Save changes', 'Option'); ?>" />
            </p>
        </form>
        <?php
    }

    public static function metadata_general_setting_fields() {

        $fields[] = array('title' => __('Meta Tag', 'add-meta-tag-for-wordpress'), 'type' => 'title', 'desc' => '', 'id' => 'general_options');
        $fields[] = array(
            'title' => __('Enable Meta Tag', 'add-meta-tag-for-wordpress'),
            'type' => 'checkbox',
            'desc' => '',
            'id' => 'enable_tag',
            'default' => 'yes'
        );
        $fields[] = array(
            'title' => __('Display in Page', 'add-meta-tag-for-wordpress'),
            'type' => 'checkbox',
            'desc' => '',
            'id' => 'enable_page_tag',
            'default' => 'yes'
        );
        $fields[] = array(
            'title' => __('Display in Post', 'add-meta-tag-for-wordpress'),
            'type' => 'checkbox',
            'desc' => '',
            'id' => 'enable_post_tag',
            'default' => 'yes'
        );
        
        $fields[] = array(
            'title' => __('Display Schema Org', 'add-meta-tag-for-wordpress'),
            'type' => 'checkbox',
            'desc' => '',
            'id' => 'enable_og',
            'default' => 'no'
        );
              
        $fields[] = array('type' => 'sectionend', 'id' => 'general_options');
        return $fields;
    }
}
Add_Meta_Tag_For_Wordpress_General_Setting::init();