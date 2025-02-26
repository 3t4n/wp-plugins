<?php
/**
 * Class AdhubPlatform_Frontend
 * 
 * Gestisce l'inserimento degli annunci pubblicitari nel frontend del sito
 * 
 * @package AdhubPlatform
 * @version 1.0.0
 */
class AdhubPlatform_Frontend {
    private $options;
    private $inserted_positions = array();
    private $content_processed = false;
    private $is_mobile;

    public function __construct($options) {
        $this->options = $options;
        $this->is_mobile = $this->check_if_mobile();
    }

    private function check_if_mobile() {
        if (function_exists('wp_is_mobile')) {
            return wp_is_mobile();
        }
        
        // Fallback nel caso wp_is_mobile non sia disponibile
        $useragent = sanitize_text_field(wp_unslash($_SERVER['HTTP_USER_AGENT'] ?? ''));
        return preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) 
            || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4));
    }

    public function init() {
        if (!$this->options->should_display_ads()) {
            return;
        }

        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        
        if ($this->options->has_inmobi_cmp()) {
            add_action('wp_head', array($this, 'insert_cmp_script'), 1);
            add_action('wp_footer', [$this, 'enqueue_frontend_scripts']);
        }
        
        $this->setup_ad_hooks();
    }

    public function enqueue_frontend_scripts() {
        wp_enqueue_script(
            'adhub-consent-handler',
            plugin_dir_url(__FILE__) . '../assets/js/consent-handler.js',
            array(),
            ADHUB_PLATFORM_VERSION,
            true // Carica lo script nel footer
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_style(
            'adhub-platform-frontend',
            ADHUB_PLATFORM_URL . 'assets/css/frontend.css',
            array(),
            ADHUB_PLATFORM_VERSION
        );
    }

    public function insert_cmp_script() {
        $cmp_script = $this->options->get_cmp_script();
        if (!empty($cmp_script)) {
            echo wp_kses($cmp_script, array(
                'script' => array(
                    'type' => array(),
                    'src' => array(),
                    'async' => array(),
                    'defer' => array()
                )
            ));
        }
    }

    private function setup_ad_hooks() {
        add_action('wp_body_open', array($this, 'insert_sticky_video'), 2);
        
        add_action('wp', function() {
            if (is_single()) {
                if (!$this->is_mobile) {
                    add_filter('the_content', array($this, 'insert_native_single'), 99);
                }
                add_filter('the_content', array($this, 'insert_native_esteso'), 100);              
            }
        });

        if ($this->is_mobile) {
            add_action('wp_body_open', array($this, 'insert_mobile_sticky'), 1);
            add_action('wp_footer', array($this, 'insert_mobile_banner'), 20);
            add_filter('the_content', array($this, 'insert_mobile_content_ads'), 99);
            add_action('dynamic_sidebar_before', array($this, 'insert_300x250_2'), 1);
        } else {
            add_action('wp_body_open', array($this, 'insert_970x250'), 1);
            add_action('wp_footer', array($this, 'insert_728x90'), 20);
            add_action('dynamic_sidebar_before', array($this, 'insert_300x600'), 1);
            add_action('dynamic_sidebar_after', array($this, 'insert_300x250'), 99);
            add_action('wp_body_open', array($this, 'insert_skin'), 1);
        }
    }

    private function insert_ad($position, $wrapper_class = '') {
        if (isset($this->inserted_positions[$position])) {
            return;
        }

        $this->inserted_positions[$position] = true;
        $tag = $this->options->get_ad_tag($position);
        
        if (empty($tag)) {
            return;
        }

         // Consenti i tag <script> e altro HTML necessario
         $allowed_html = array_merge(wp_kses_allowed_html('post'), array(
            'script' => array(
                'type' => true,
                'src' => true,
                'async' => true,
                'defer' => true,
            ),
        ));
    

        
      
        if ($wrapper_class) {
            printf(
                '<div class="%s">%s</div>', 
                esc_attr($wrapper_class),
                wp_kses($tag, $allowed_html) // Usa wp_kses con whitelist personalizzata
            );
        } else {
            echo wp_kses_post($tag);
        }
    }

    // Desktop ad positions
    public function insert_970x250() {
        $this->insert_ad('desktop_970x250', 'adhub-970x250-container');
    }

    public function insert_300x600() {
        $this->insert_ad('desktop_300x600', 'adhub-300x600-container');
    }

    public function insert_300x250() {
        $this->insert_ad('desktop_300x250', 'adhub-300x250-container');
    }

    public function insert_300x250_2() {
        $this->insert_ad('desktop_300x250_2', 'adhub-300x250-2-container');
    }

    public function insert_sticky_video() {
        $this->insert_ad('desktop_sticky_video', 'adhub-sticky-video-container');
    }

    public function insert_728x90() {
        $this->insert_ad('desktop_728x90', 'adhub-728x90-container');
    }

    public function insert_skin() {
        $this->insert_ad('desktop_skin', 'adhub-skin-container');
    }

    // Mobile ad positions
    public function insert_mobile_sticky() {
        $this->insert_ad('mobile_320x100', 'adhub-mobile-sticky-container');
    }

    public function insert_mobile_banner() {
        $this->insert_ad('mobile_320x50', 'adhub-mobile-banner-container');
    }

    public function insert_mobile_content_ads($content) {
        if (!is_string($content) || !is_main_query() || !in_the_loop() || 
            empty($content) || $this->content_processed) {
            return $content;
        }
        
        $this->content_processed = true;
        $paragraphs = preg_split('/<\/p>/i', $content, -1, PREG_SPLIT_NO_EMPTY);
        
        if (!is_array($paragraphs) || count($paragraphs) < 3) {
            return $content;
        }
    
        $ad_positions = [
            'desktop_300x600' => 'adhub-mobile-content-top',
            'desktop_native_single' => 'adhub-mobile-native-single',
            'desktop_300x250' => 'adhub-mobile-content-bottom'
        ];
    
        $active_ads = [];
        foreach ($ad_positions as $position => $class) {
            $tag = $this->options->get_ad_tag($position);
            if (!empty($tag) && $this->options->should_display_ad($position)) {
                $active_ads[] = sprintf(
                    '<div class="%s">%s</div>', 
                    esc_attr($class), 
                    wp_kses_post($tag)
                );
            }
        }
    
        if (empty($active_ads)) {
            return $content;
        }
    
        $insert_positions = [
            1,          // dopo il primo paragrafo
            ceil(count($paragraphs) / 2),  // metà contenuto
            -1          // prima dell'ultimo paragrafo
        ];
    
        foreach ($active_ads as $index => $ad) {
            if (isset($insert_positions[$index])) {
                $position = $insert_positions[$index];
                array_splice($paragraphs, $position, 0, $ad);
                
                if ($position > 0) {
                    foreach ($insert_positions as &$pos) {
                        if ($pos > $position) {
                            $pos++;
                        }
                    }
                }
            }
        }
    
        return implode('</p>', $paragraphs) . '</p>';
    }

    public function insert_native_single($content) {
        if (!is_string($content) || $this->content_processed || 
            !is_main_query() || !in_the_loop() || 
            empty($content) || strpos($content, '</p>') === false) {
            return $content;
        }

        $this->content_processed = true;

        $native_single_tag = $this->options->get_ad_tag('desktop_native_single');
        if (!empty($native_single_tag)) {
            $paragraphs = preg_split('/<\/p>/i', $content, -1, PREG_SPLIT_NO_EMPTY);
            if (is_array($paragraphs) && count($paragraphs) >= 2) {
                $middle_position = ceil(count($paragraphs) / 2);
                $ad_wrapper = sprintf(
                    '<div class="adhub-native-single">%s</div>', 
                    wp_kses_post($native_single_tag)
                );
                array_splice($paragraphs, $middle_position, 0, $ad_wrapper);
                $content = implode('</p>', $paragraphs) . '</p>';
            }
        }

        return $content;
    }

    public function insert_native_esteso($content) {
        if (!is_single() || !is_main_query() || !in_the_loop()) {
            return $content;
        }

        if (isset($this->inserted_positions['native_esteso'])) {
            return $content;
        }

        $this->inserted_positions['native_esteso'] = true;
        $native_extended_tag = $this->options->get_ad_tag('desktop_native_extended');
        
        if (empty($native_extended_tag)) {
            return $content;
        }

        return $content . sprintf(
            '<div class="adhub-native-extended" data-position="end">%s</div>',
            wp_kses_post($native_extended_tag)
        );
    }


   
   
  

    private function get_ad_html($position, $additional_class = '') {
        if (!$this->options->should_display_ads() || !$this->options->should_display_ad($position)) {
            return '';
        }

        $tag = $this->options->get_ad_tag($position);
        if (empty($tag)) {
            return '';
        }

        $classes = array('adhub-ad', 'adhub-' . $position);
        if (!empty($additional_class)) {
            $classes[] = $additional_class;
        }

        if (!$this->options->has_inmobi_cmp()) {
            return sprintf(
                '<div class="%s">%s</div>',
                esc_attr(implode(' ', $classes)),
                wp_kses_post($tag)
            );
        }

        $encoded_tag = esc_attr(urlencode($tag));
        return sprintf(
            '<div class="%s" data-ad-tag="%s"></div>',
            esc_attr(implode(' ', $classes)),
            $encoded_tag
        );
    }
}