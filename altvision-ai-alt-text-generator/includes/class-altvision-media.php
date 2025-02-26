<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('AltVision_Media')):

    class AltVision_Media {
        public function __construct() {
            add_filter('attachment_fields_to_edit', array($this, 'add_alt_text_button'), 10, 2);
            add_action('admin_enqueue_scripts', array($this, 'enqueue_media_scripts'));
        }
    
        public function enqueue_media_scripts($hook) {
            
            $script_path = plugins_url('assets/js/media-integration.js', dirname(__FILE__));
            $physical_path = dirname(dirname(__FILE__)) . '/assets/js/media-integration.js';
            
            if ('post.php' === $hook || 'upload.php' === $hook || 'media-upload.php' === $hook) {
                $version = defined('ALTVISION_VERSION') ? ALTVISION_VERSION : '1.0.0';
                $version .= '.' . time();
                
                wp_enqueue_script(
                    'altvision-media',
                    $script_path,
                    array('media-editor'),
                    $version,
                    true
                );
        
                $script_data = array(
                    'apiUrl' => rest_url('image-processor/v1/process'),
                    'nonce' => wp_create_nonce('wp_rest'),
                    'adminUrl' => admin_url('options-general.php?page=altvision')
                );
        
                wp_localize_script('altvision-media', 'altVisionMedia', $script_data);
            }
        }
    
        public function add_alt_text_button($form_fields, $post) {
            
            $file_path = get_attached_file($post->ID);
            
            if (strpos($post->post_mime_type, 'image') === false) {
                return $form_fields;
            }
    
            $form_fields['altvision_alt_generator'] = array(
                'label' => __('AltVision', 'altvision-ai-alt-text-generator'),
                'input' => 'html',
                'html' => sprintf(
                    '<button type="button" class="button button-secondary altvision-generate-alt" data-image-id="%d" data-image-url="%s">%s</button>',
                    $post->ID,
                    wp_get_attachment_url($post->ID),
                    __('Generate Alt Text', 'altvision-ai-alt-text-generator')
                ),
                'helps' => __('Generate alt text using AI', 'altvision-ai-alt-text-generator')
            );
    
            return $form_fields;
        }
    }

endif;