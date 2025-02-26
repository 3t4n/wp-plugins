<?php
    
    namespace PTDC\admin;
    
    use PTDC\ptx\ptxDcPluginFields;
    use PTDC\ptx\ptxDcPluginGlobal;
    
    if (!defined('ABSPATH')) {
        exit();
    }
    
    /**
     * The admin-specific functionality of the plugin.
     *
     * @since      1.0.0
     * @subpackage BiblioDAM/admin
     * @author     Publishers Toolbox <support@afrozaar.com>
     *
     * @package    BiblioDAM
     */
    class ptxDcPluginAdmin {
        
        /**
         * The unique identifier of this plugin.
         *
         * @access protected
         * @since 1.0.0
         * @var string $pluginName The string used to uniquely identify this plugin.
         */
        protected string $pluginName;
        
        /**
         * The current version of the plugin.
         *
         * @access protected
         * @since 1.0.0
         * @var string $pluginVersion The current version of the plugin.
         */
        protected string $pluginVersion;
        
        /**
         * The add-ons of the plugin.
         *
         * @access protected
         * @since 1.0.0
         * @var mixed $pluginVersion The add-ons of the plugin.
         */
        protected $pluginAddOns;
        
        /**
         * Initialize the class and set its properties.
         *
         * @param string $pluginName The name of this plugin.
         * @param string $pluginVersion The version of this plugin.
         * @param mixed $pluginAddOns The add-ons of the plugin.
         *
         * @since 1.0.0
         */
        public function __construct(string $pluginName, string $pluginVersion, $pluginAddOns) {
            $this->pluginName    = $pluginName;
            $this->pluginVersion = $pluginVersion;
            
            /**
             * Load the addons.
             */
            $this->pluginAddOns = $pluginAddOns;
        }
        
        /**
         * Register the scripts and stylesheets for the admin area.
         *
         * @since 1.2.0
         */
        public function enqueueScriptsAndStyles(): void {
            /**
             * Use media element.
             */
            wp_enqueue_media();
            
            /**
             * Enqueue iziToast libraries.
             */
            wp_enqueue_script($this->pluginName . '-iziToast', plugins_url('assets/lib/iziToast.min.js', __FILE__), ['jquery'], $this->pluginVersion, true);
            wp_enqueue_style($this->pluginName . '-iziToast', plugin_dir_url(__FILE__) . 'assets/lib/iziToast.min.css', [], $this->pluginVersion);
            
            /**
             * Enqueue minicolors libraries.
             */
            wp_enqueue_script($this->pluginName . '-minicolors', plugins_url('assets/lib/minicolors.min.js', __FILE__), ['jquery'], $this->pluginVersion, true);
            wp_enqueue_style($this->pluginName . '-minicolors', plugin_dir_url(__FILE__) . 'assets/lib/minicolors.min.css', [], $this->pluginVersion);
            
            /**
             * Enqueue tooltip libraries.
             */
            wp_enqueue_script($this->pluginName . '-tooltip', plugins_url('assets/lib/tooltip.min.js', __FILE__), ['jquery'], $this->pluginVersion, true);
            wp_enqueue_style($this->pluginName . '-tooltip', plugin_dir_url(__FILE__) . 'assets/lib/tooltip.min.css', [], $this->pluginVersion);
            
            /**
             * Enqueue dialog script.
             */
            wp_enqueue_script($this->pluginName . '-dialog', plugins_url('assets/lib/dialog.min.js', __FILE__), ['jquery'], $this->pluginVersion, true);
            
            /**
             * Enqueue admin script.
             */
            wp_enqueue_style($this->pluginName, plugin_dir_url(__FILE__) . 'css/admin.min.css', [], $this->pluginVersion);
            wp_enqueue_script($this->pluginName, plugin_dir_url(__FILE__) . 'js/admin.min.js', [
                'jquery',
                'jquery-ui-slider',
                'wp-plugins',
                'wp-edit-post',
                'wp-element',
                'wp-components',
            ], $this->pluginVersion, false);
            
            /**
             * Ajax Libraries.
             */
            wp_localize_script($this->pluginName, 'dcOptionsObject', [
                'ajax_url' => admin_url('admin-ajax.php'),
                '_nonce'   => wp_create_nonce($this->pluginName),
            ]);
        }
        
        /**
         * Register the JavaScript for the admin dam picker.
         *
         * @since 1.0.0
         */
        public function enqueueDamScript(): void {
            $globalOptions  = (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion));
            $checkDependent = $globalOptions->checkDependentPlugins();
            
            if ($checkDependent['classic']['in_use'] || isset($_GET['classic-editor']) || get_current_screen()->id === 'edit-post') {
                wp_enqueue_script($this->pluginName . '-classic', plugin_dir_url(__FILE__) . 'js/classic.min.js', ['jquery'], $this->pluginVersion, true);
            } elseif (get_current_screen()->id === 'user-edit') {
                wp_enqueue_script($this->pluginName . '-player-media', plugin_dir_url(__FILE__) . 'js/player-media.min.js', ['jquery'], $this->pluginVersion, true);
            } else {
                wp_enqueue_script($this->pluginName . '-block', plugin_dir_url(__FILE__) . 'js/block.min.js', ['jquery'], $this->pluginVersion, true);
            }
            /**
             * Ajax Libraries.
             */
            wp_localize_script($this->pluginName . '-classic', 'dcDamObject', [
                'ajax_url' => admin_url('admin-ajax.php'),
                '_nonce'   => wp_create_nonce($this->pluginName),
            ]);
        }
        
        /**
         * Register the stylesheets for the admin area.
         *
         * @since 1.0.0
         */
        public function enqueueDamStyle(): void {
            wp_enqueue_style($this->pluginName . '-bibliodam-connect', plugin_dir_url(__FILE__) . 'css/dam.min.css', [], $this->pluginVersion);
        }
        
        /**
         * Register the administration menu for this plugin into the WordPress Dashboard menu.
         *
         * @since 1.0.0
         */
        public function dcAddPluginAdminMenu(): void {
            /**
             * Add a settings page for this plugin to the Settings menu.
             *
             * Alternative menu locations are available via WordPress administration menu functions.
             *
             * Administration Menus: http://codex.wordpress.org/Administration_Menus
             */
            $notificationCount = $this->pluginAddOns->getAddOnUpdatesCount();
            
            add_menu_page(
                __('BiblioDAM Connect', $this->pluginName),
                $notificationCount ? sprintf('BiblioDAM <span title="Update Available" class="update-plugins count-1"><span class="update-count">%d</span></span>', $notificationCount) : 'BiblioDAM',
                'manage_options',
                $this->pluginName,
                [$this, 'ptxDisplayPluginSetupPage'],
                plugin_dir_url(__FILE__) . 'img/menu-icon.png');
        }
        
        /**
         * Add settings action link to the plugins page.
         *
         * Documentation: https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
         *
         * @param $links
         *
         * @return array
         *
         * @since 1.0.0
         */
        public function ptxAddActionLinks($links): array {
            $settingsLink[] = $this->getSettingsLink();
            
            return array_merge($settingsLink, $links);
        }
        
        /**
         * Render the settings page for this plugin.
         *
         * @since 1.0.0
         */
        public function ptxDisplayPluginSetupPage(): void {
            /**
             * Get setup options.
             */
            $ptxOptions = (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion))->getPluginOptions();
            
            /**
             * Load the fields object.
             */
            $ptxFields = new ptxDcPluginFields($this->pluginName, $this->pluginVersion);
            
            /**
             * Add-On notifications update count.
             */
            $notificationCount = $this->pluginAddOns->getAddOnUpdatesCount();
            
            /**
             * Include the admin page
             */
            include_once 'partials/dc-admin-display.php';
        }
        
        /**
         * The settings page link for reuse.
         *
         * @return string
         *
         * @since 1.0.0
         */
        public function getSettingsLink(): string {
            return '<a href="' . admin_url('admin.php?page=' . $this->pluginName) . '">' . __('Settings', $this->pluginName) . '</a>';
        }
        
        /**
         * Handles all the ajax requests for the plugin.
         *
         * @since 1.0.0
         */
        public function ptxAjaxAdmin(): void {
            /**
             * Do security check first.
             */
            if (wp_verify_nonce($_REQUEST['security'], $this->pluginName) === false) {
                wp_send_json_error();
                wp_die('Invalid Request!');
            }
            
            /**
             * Parse the ajax string with data.
             */
            switch ($_REQUEST['data']['action']) {
                case 'save':
                    parse_str($_REQUEST['data']['content'], $outputOptions);
                    if ((new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion))->ptxUpdatePluginOptions($outputOptions)) {
                        /**
                         * Set the changed option to true.
                         *
                         * If this is true, you can perform once off tasks like flushing rewrite rules.
                         */
                        update_option($this->pluginName . '-changed', ['changed' => true]);
                        
                        /**
                         * Return json response
                         */
                        wp_send_json_success(['active' => array_key_exists('active', $outputOptions)]);
                    } else {
                        wp_send_json_error();
                    }
                    break;
                case 'create':
                    wp_send_json_success($this->loopDamPost($_REQUEST['data']['postData']));
                    break;
                case 'update':
                    $manageAddOn = $this->pluginAddOns->getAddonUpdate($_REQUEST['data']['package'], $_REQUEST['data']['addon']);
                    if ($manageAddOn['status'] !== 'complete') {
                        wp_send_json_error($manageAddOn);
                    } else {
                        wp_send_json_success($manageAddOn);
                    }
                    break;
                case 'delete':
                    $manageAddOn = $this->pluginAddOns->deletePluginAddOn($_REQUEST['data']['addon']);
                    if ($manageAddOn['status'] !== 'complete') {
                        wp_send_json_error($manageAddOn);
                    } else {
                        wp_send_json_success($manageAddOn);
                    }
                    break;
                
                default:
                    wp_send_json_error();
                    wp_die();
            }
            
            wp_die();
        }
        
        /**
         * Add classic WP editor button.
         *
         * @since 1.0.0
         */
        public function classicLauncherButton(): void {
         echo   '<a id="dam-picker-button" class="button button-primary dam-launcher-button"><span class="dam-launcher-icon wp-media-buttons-icon"></span>BiblioDAM</a>';
        }
        
        /**
         * Adds "Import" button on module list page.
         *
         * @since 1.0.0
         */
        public function addCustomImportButton(): void {
            if (!isset($_GET['post_type']) || $_GET['post_type'] === 'post') { ?>
                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        jQuery(".page-title-action").after("<a id='dam-launcher-button' class='add-new-h2 dam-launcher-button' title='Import BiblioDAM articles.'><span class='dam-launcher-icon wp-media-buttons-icon post'></span>BiblioDam Articles</a>");
                    });
                </script>
                <?php
            }
        }
        
        /**
         * Adds "Import" button on module list page.
         *
         * @since 1.0.0
         */
        public function addDamScript(): void {
            global $pagenow;
            
            $globalOptions  = (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion));
            $pluginOptions  = $globalOptions->getPluginOptions();
            $checkDependent = $globalOptions->checkDependentPlugins();
            $mediaTypes     = ['article', 'image', 'video'];
            
            /**
             * Posts.
             *
             * Load Images and Videos on posts edit and Post New pages.
             *
             * Unset Articles if its post type is post.
             */
            $selectedMediaType = $pluginOptions['post_media'];
            if (($pagenow === 'post-new.php') || ($_GET['post_type'] === 'post.php') || ($pagenow === 'post.php')) {
                unset($mediaTypes[0]);
                
                /**
                 * Use the selected options from the plugin.
                 */
                if (!empty($selectedMediaType)) {
                    $optionTypes = [];
                    foreach ($selectedMediaType as $type => $item) {
                        $optionTypes[] = $type;
                    }
                    $mediaTypes = $optionTypes;
                }
            }
            
            /**
             * Dependents.
             *
             * Check if all the Dependent plugins are installed.
             */
            if (!$checkDependent['imigino']['in_use']) {
                unset($mediaTypes[2]);
            }
            
            /**
             * Articles.
             *
             * Only load on post list page.
             */
            if ($pagenow === 'edit.php' || $pagenow === 'user-edit.php') {
                unset($mediaTypes[1], $mediaTypes[2]);
            }
            
            if ($pagenow === 'edit.php' || $pagenow === 'user-edit.php') { ?>
                <div class="afro-admin-modal hidden">
                    <div class="confirmation-box">
                        <div id="confirmation-wrapper">
                            <div class="load-bar hidden">
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </div>
                            <label id="confirmation"></label>
                            <div id="media-list">
                                <ul></ul>
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="button button-primary button-large az-modal-btn" data-confirm="confirm">
                                Confirm
                            </button>
                            <button class="button button-warning button-large az-modal-btn" data-confirm="cancel">
                                Cancel
                            </button>
                            <button class="button button-warning button-large az-modal-btn close" data-confirm="close" style="display: none;">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <script>
                let damSettings = {
                    domain: '<?php echo $pluginOptions['dam']['dam_domain'] ?? ''; ?>',
                    web: '<?php echo $pluginOptions['dam']['client_url'] ?? ''; ?>',
                    contentBase: '<?php echo $pluginOptions['dam']['client_url'] ?? ''; ?>',
                    username: '<?php echo $pluginOptions['settings']['username'] ?? ''; ?>',
                    password: '<?php echo $pluginOptions['settings']['password'] ?? ''; ?>',
                    tk: '<?php echo $pluginOptions['settings']['tenant_id'] ?? ''; ?>',
                    appId: '<?php echo $pluginOptions['settings']['app_id'] ?? ''; ?>',
                    irsBase: '<?php echo $pluginOptions['media']['service_url'] ? $pluginOptions['media']['service_url'] . '/image' : ''; ?>',
                    vsBase: '<?php echo $pluginOptions['media']['service_url'] ? $pluginOptions['media']['service_url'] . '/video' : ''; ?>',
                    mediaTypes: '<?php echo implode(',', $mediaTypes) ?>',
                    esSearchBaseUrl: '<?php echo $pluginOptions['es']['es_url'] ?? ''; ?>',
                    esApiKey: '<?php echo $pluginOptions['es']['es_api'] ?? ''; ?>',
                    titleKey: '<?php echo $pluginOptions['refine']['titles'] ?? ''; ?>',
                    clientLogo: '<?php echo wp_get_attachment_image_url($pluginOptions['design']['clientLogo'], 'medium') ?? ''; ?>',
                    clientBackground: '<?php echo wp_get_attachment_image_url($pluginOptions['design']['clientBackground'], 'large') ?? ''; ?>',
                    multiSelect: 'true',
                    searchFrag: '#/app',
                    <?php if ($pagenow === 'user-edit.php') { ?>
                    limitedSearch: 'true',
                    limitedSearchTags: <?php echo json_encode(get_user_meta($_GET['user_id'], 'first_name', true) . ' ' . get_user_meta($_GET['user_id'], 'last_name', true)); ?>,
                    
                    <?php } ?>
                };
            </script>
            <?php
        }
        
        /**
         * Handle Multi select of articles.
         *
         * @param $damPostData
         *
         * @return array
         *
         * @since 1.0.0
         */
        public function loopDamPost($damPostData): array {
            $arrayKeys = [];
            foreach ($damPostData as $post) {
                $arrayKeys[] = $this->insertDamPost($post);
            }
            
            return $arrayKeys;
        }
        
        /**
         * Insert the post.
         *
         * @param $damPostData
         *
         * @return array
         *
         * @since 1.0.0
         */
        public function insertDamPost($damPostData): array {
            /**
             * Build video insertion at top of article/post.
             */
            $mediaHtml = '';
            foreach ($damPostData['media'] as $media) {
                if (($media['@type'] === 'Video') && isset($media['url'])) {
                    $mediaHtml .= '<p>[imigino_video url="' . $media['url'] . '" title="' . $damPostData['headline'] . '"]</p>';
                }
            }
            
            /**
             * Create the terms.
             */
            $categories = $this->insertTerm($damPostData['sections']);
            
            /**
             * Setup post data.
             */
            $postData = [
                'post_type'      => ($_GET['post_type'] ?? 'post'),
                'post_status'    => 'draft',
                'post_title'     => $damPostData['headline'],
                'post_content'   => $mediaHtml . $damPostData['articleHTML'],
                'post_excerpt'   => $damPostData['abstractSummary'] !== 'No Summary' ?: '',
                'post_category'  => $categories ?: [],
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            ];
            
            /**
             * Post Exists.
             */
            if ($postId = post_exists($damPostData['headline'])) {
                $postData['ID'] = $postId;
                wp_update_post($postData);
                
                if (isset($damPostData['thumbnail']) && $damPostData['thumbnail']) {
                    $this->insertFeaturedImage($damPostData, $postId);
                }
                
                /**
                 * Create and Insert the tags.
                 */
                $this->insertTags($postId, $damPostData['managedTags']);
                
                return ['status' => 'exists', 'id' => $postId, 'title' => get_the_title($postId)];
            }
            
            /**
             * Insert new post.
             */
            $postId = wp_insert_post($postData);
            
            if (isset($damPostData['thumbnail']) && $damPostData['thumbnail']) {
                $this->insertFeaturedImage($damPostData, $postId);
            }
            
            /**
             * Create and Insert the tags.
             */
            $this->insertTags($postId, $damPostData['managedTags']);
            
            return ['status' => 'imported', 'id' => $postId, 'title' => get_the_title($postId)];
        }
        
        /**
         * Insert the image for the imported post.
         *
         * @param $damPostData
         * @param $postId
         *
         * @since 1.0.0
         */
        public function insertFeaturedImage($damPostData, $postId): void {
            $imageUrl       = $damPostData['thumbnail']; // Define the image URL here
            $imageName      = $damPostData['headline'] . '-featured-image.jpg';
            $uploadDir      = wp_upload_dir(); // Set upload folder
            $imageData      = file_get_contents($imageUrl); // Get image data
            $uniqueFileName = wp_unique_filename($uploadDir['path'], $imageName); // Generate unique name
            $filename       = basename($uniqueFileName); // Create image file name
            
            if (wp_mkdir_p($uploadDir['path'])) {
                $file = $uploadDir['path'] . '/' . $filename;
            } else {
                $file = $uploadDir['basedir'] . '/' . $filename;
            }
            
            file_put_contents($file, $imageData);
            
            $wpFileType = wp_check_filetype($filename);
            
            $attachment = [
                'post_mime_type' => $wpFileType['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit',
            ];
            
            $attachId = wp_insert_attachment($attachment, $file, $postId);
            
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            
            $attachData = wp_generate_attachment_metadata($attachId, $file);
            
            wp_update_attachment_metadata($attachId, $attachData);
            
            set_post_thumbnail($postId, $attachId);
        }
        
        /**
         * Insert the terms attached to the post.
         *
         * @param $damPostData
         *
         * @return array
         *
         * @since 1.0.0
         */
        public function insertTerm($damPostData): array {
            $terms = [];
            foreach ($damPostData as $term) {
                $termId = wp_insert_term($term['label'], 'category', [
                    'slug' => (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion))::slugCreate($term['slug']),
                ]);
                
                if (is_wp_error($termId)) {
                    $termExists = $termId->error_data;
                    $terms[]    = $termExists['term_exists'];
                } else {
                    $terms[] = $termId['term_id'];
                }
            }
            
            return $terms;
        }
        
        /**
         * Insert the tags attached to the post.
         *
         * @param $tags
         * @param $postId
         *
         * @since 1.0.0
         */
        public function insertTags($postId, $tags): void {
            $tagName = [];
            foreach ($tags as $tag) {
                $tagName[] = $tag['label'];
            }
            wp_set_post_tags($postId, $tagName, true);
        }
    }
