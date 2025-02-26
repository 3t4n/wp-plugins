<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) exit;
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Partials_Ar_Ad_Manager_Css_Generator
 */
class Partials_Ar_Ad_Manager_Css_Generator
{
    public function __construct()
    {
        add_action('save_post', [$this, "ar_ad_manager_generate_and_minify_css"]);
        add_action( 'admin_notices', [$this, 'error_notice'] );
    }

    /**
     * @param int $post_id
     * @return mixed
     */
    public function ar_ad_manager_generate_and_minify_css($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return false;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return false;
        }

        if (!isset($_POST[\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX])) {
            return $post_id;
        }

        if (
            isset($_POST['post_type']) &&
            in_array(sanitize_text_field($_POST['post_type']), [\Ar_Ad_Manager_Admin::AR_AD_MANAGER_PREFIX . 'adzones'])
        ) {
            try {
                $this->regenerateCss();
            } catch (\Exception $e) {
                // Add your query var if the coordinates are not retrieve correctly.
                add_filter('redirect_post_location', [$this, 'add_notice_query_var'], 99);

                return $post_id;
            }
        }

        return $post_id;
    }

    /**
     * @return void
     */
    public function error_notice()
    {
        if ( ! isset( $_GET['QUERY_VAR_NOTICE'] ) ) {
            return;
        }

        $class = 'notice notice-error';
        $message = __( 'Unfortunately, it was not possible to write the CSS file, check the write permissions and try again', 'ar-ad-manager' );

        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
    }

    /**
     * @param $location
     * @return mixed
     */
    public function add_notice_query_var( $location ) {
        remove_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

        return add_query_arg( array( 'QUERY_VAR_NOTICE' => 'ID' ), $location );
    }

    /**
     * @return void
     * @throws Exception
     */
    private function regenerateCss()
    {
        $cssContent = $this->prepareStyles();
        $minifiedCss = $this->minimizeCss($cssContent);

        $uploadDir = plugin_dir_path(dirname(__FILE__, 2)) . 'public/css/';

        if (!is_writable($uploadDir)) {
            throw new \Exception('CSS file is not writable, change permissions and try again');
        }

        $result = file_put_contents($uploadDir . 'ar-ad-manager-style.min.css', $minifiedCss);

        if (!$result) {
            throw new \Exception('Unfortunately, it was not possible to write the CSS file, check the write permissions and try again');
        }

        update_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . '_css_ver', time());
    }

    /**
     * @return string
     */
    private function prepareStyles()
    {
        $args = [
            'posts_per_page' => -1,
            'post_type' => \Ar_Ad_Manager_Admin::AR_AD_MANAGER_PREFIX . 'adzones',
            'post_status' => 'publish'
        ];

        $query = new WP_Query($args);
        $adzones = $query->get_posts();
        $styles = [];

        // global styles
        $styles[] = '.ar-wp-happy-block-ajax {display: flex; align-items: center;}';
        $styles[] = '.ar-wp-happy-zone .ar-wp-happy-text {position: absolute;}';
        $styles[] = '.ar-wp-transparent .ar-wp-happy-zone .ar-wp-happy-text {display: none; }';
        $styles[] = '.ar-wp-transparent .ar-wp-happy-zone {background-color:transparent!important;border-color:transparent!important;}';
        $styles[] = '.ar-wp-happy-zone {position: relative; background-size: cover; background-repeat: no-repeat; border: 1px solid;}';

        /** @var Partials_Ar_Ad_Manager_Public_Adzones $publicAdzonesClass */
        global $publicAdzonesClass;

        foreach ($adzones as $adzone) {
            $adzone = $publicAdzonesClass->prepareAdzoneData($adzone);
            $adzoneAlignStyles = '';
            $mediaStyles = [];

            // Main styles
            if ($alignAdzoneValue = $adzone['adzone_align']) {
                $adzoneAlignStyles = 'display: flex;align-items: center;justify-content: '. $alignAdzoneValue .';';

                switch ($alignAdzoneValue) {
                    case 'start':
                        $adzoneAlignStyles .= 'text-align: left';
                        break;
                    case 'end':
                        $adzoneAlignStyles .= 'text-align: right';
                        break;
                    case 'center':
                        $adzoneAlignStyles .= 'text-align: center';
                        break;
                    default:
                        // Do nothing
                }
            }

            $adzoneMargin = $adzone['adzone_margin'] ? 'margin:' . $adzone['adzone_margin'] . 'px' : '';
            $adzoneBgc = $adzone['adzone_background_color'] ? 'background-color:' . $adzone['adzone_background_color'] : '';
            $adzoneBorderColor = $adzone['adzone_border_color'] ? 'border-color:' . $adzone['adzone_border_color'] : '';

            if ($adzone['is_adzone_transparent']) {
                $adzoneBgc = 'background-color: transparent';
            }

            if ($adzone['adzone_border_transparent']) {
                $adzoneBorderColor = 'border-color: transparent';
            }

            $adzoneBgi = '';

            if ($adzoneBgiUrl = $adzone['adzone_default_image']) {
                $adzoneBgi = 'background-image: url(' . $adzoneBgiUrl . ')';
            }

            $globalAdzoneStyles = [
                $adzoneMargin,
                $adzoneAlignStyles,
                $adzoneBgc,
                $adzoneBorderColor,
                $adzoneBgi
            ];

            $adzoneStyles = array_filter($globalAdzoneStyles);

            // Main happy block
            $adzoneInitStyles = [];

            if ($alignAdzoneValue = $adzone['adzone_align']) {
                $adzoneInitStyles[] = 'justify-content: ' . $alignAdzoneValue;
            }

            $adzoneInitStyles = array_filter($adzoneInitStyles);

            // Media queries
            foreach ($adzone['adzone_sizes'] as $adzoneSizeDevice => $adzoneSizeData) {
                $mediaStyle = '';
                $adzoneSize = $adzoneSizeData['size'] ?? 'custom';
                $showOnInit = $adzoneSizeData['show_adzone_on_init'] ?? false;
                $isHide = $adzoneSizeData['is_adzone_hide'] ?? false;

                if ($adzoneSize === 'custom') {
                    $adzoneWidth = $adzoneSizeData['custom_width'] ?? 'auto';
                    $adzoneHeight = $adzoneSizeData['custom_height'] ?? 'auto';
                } else if (str_contains($adzoneSize, 'x')) {
                    $adzoneSize = explode('x', $adzoneSize);
                    $adzoneWidth = $adzoneSize[0] . 'px';
                    $adzoneHeight = $adzoneSize[1] . 'px';
                } else {
                    $adzoneWidth = 'auto';
                    $adzoneHeight = 'auto';
                }

                $noMedia = false;

                switch ($adzoneSizeDevice) {
                    case 'tablet':
                        $mediaStyle = '@media (min-width: 768px) and (max-width: 968px) {';

                        break;
                    case 'mobile':
                        $mediaStyle = '@media (max-width: 768px) {';

                        break;
                    default:
                        $mediaStyle = '@media (min-width: 968px) {';

                        break;
                }

                if (!$isHide) {
                    $mediaStyle .= '.ar-wp-happy-block-ajax-' . $adzone['id'] . '.ar-wp-ready .ar-wp-happy-zone { display: flex; }';
                }

                $mediaStyle .= '.ar-wp-happy-zone-' . $adzone['id'] . ' {';
                $mediaStyle .= 'width:' . $adzoneWidth . ';';
                $mediaStyle .= 'height:' . $adzoneHeight . ';';

                if (!$showOnInit) {
                    $mediaStyle .= 'display: none;';
                }

                if ($isHide) {
                    $mediaStyle .= 'display: none!important;';
                }

                $mediaStyle .= '}';

                if (!$noMedia) {
                    $mediaStyle .= '}';
                }

                $mediaStyles[] = $mediaStyle;
            }

            $styles[] = '.ar-wp-happy-block-ajax-' . $adzone['id'] . ' {' . implode(';', $adzoneInitStyles) . '}';
            $styles[] = '.ar-wp-happy-zone-' . $adzone['id'] . ' {' . implode(';', $adzoneStyles) . '}';
            $styles[] = '.ar-wp-happy-zone-' . $adzone['id'] . ' .ar-wp-happy-text { color:'. $adzone['adzone_text_color'] .' }';
            $styles[] = implode('', $mediaStyles);
        }

        return implode(' ', $styles);
    }

    /**
     * @param string $css
     * @return string
     */
    private function minimizeCss($css)
    {
        if (trim($css) === "") {
            return $css;
        }

        return preg_replace(
            array(
                // Remove comment(s)
                '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
                // Remove unused white-space(s)
                '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~]|\s(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
                // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
                '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
                // Replace `:0 0 0 0` with `:0`
                '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
                // Replace `background-position:0` with `background-position:0 0`
                '#(background-position):0(?=[;\}])#si',
                // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
                '#(?<=[\s:,\-])0+\.(\d+)#s',
                // Minify string value
                '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
                '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
                // Minify HEX color code
                '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
                // Replace `(border|outline):none` with `(border|outline):0`
                '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
                // Remove empty selector(s)
                '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
            ),
            array(
                '$1',
                '$1$2$3$4$5$6$7',
                '$1',
                ':0',
                '$1:0 0',
                '.$1',
                '$1$3',
                '$1$2$4$5',
                '$1$2$3',
                '$1:0',
                '$1$2'
            ),
            $css);
    }
}

new Partials_Ar_Ad_Manager_Css_Generator();
