<?php
class NjtFbMessenger
{
    private static $_instance = null;
    private $settings_page_slug = 'njt-facebook-messenger-settings.php';
    private $dashboard_page_slug = 'njt-facebook-messenger.php';
    private $category_page_slug = 'njt-facebook-messenger-categories.php';

    private $routes = array();

    public $njtFbMessSenderTable;
    public $njtFbMessCategoryTable;

    private $shortcuts = array();

    private $dashboard_hook_suffix = '';
    private $category_hook_suffix = '';
    private $settings_hook_suffix = '';

    public function __construct()
    {
        $this->shortcuts = array(
            '[first_name]' => __('First Name', NJT_FB_MESS_I18N),
            '[last_name]' => __('Last Name', NJT_FB_MESS_I18N),
        );
        $this->setRoutes();

        /*
         * Language
         */
        add_action('plugins_loaded', array($this, 'loadTextDomain'));

        /*
         * Plugin actived
         */
        register_activation_hook(NJT_FB_MESS_FILE, array($this, 'pluginActived'));
        register_deactivation_hook(NJT_FB_MESS_FILE, array($this, 'pluginDeactived'));

        /*
         * Register Admin Enqueue
         */
        add_action('admin_enqueue_scripts', array($this, 'registerAdminEnqueue'));

        add_action('admin_menu', array($this, 'registerMenu'));

        /*
         * Register Settings
         */
        add_action('admin_init', array($this, 'registerSettings'));

        /*
         * Add custom rewrite
         */
        add_action('init', array($this, 'customRewriteRule'));
        add_action('init', array($this, 'customRewriteTag'), 10, 0);

        add_action('init', array($this, 'checkCredit'));
        /*
         * Proccess with custom rewrite
         */
        add_action('template_redirect', array($this, 'templateRedirect'));

        add_action('init', array($this, 'startSession'), 1);

        add_filter('set-screen-option', array($this, 'setScreenOption'), 10, 3);

        add_action('admin_head', array($this, 'adminHeader'));

        /*
         * Register admin ajax
         */
        add_action('wp_ajax_njt_fb_mess_get_senders', array($this, 'ajaxGetSenders'));
        add_action('wp_ajax_njt_fb_mess_send_message', array($this, 'ajaxSendMessage'));
        add_action('wp_ajax_njt_fb_mess_subscribe_page', array($this, 'ajaxSubscribePage'));
        add_action('wp_ajax_njt_fb_mess_unsubscribe_page', array($this, 'ajaxUnsubscribePage'));

        add_action('wp_ajax_njt_fb_mess_cat_action', array($this, 'ajaxCatAction'));

        /*
         * Use my hook ^^
         */
        add_action('njt_fb_mess_after_list_pages', array($this, 'addNoteToAfterListPages'));
    }
    public function adminHeader()
    {
        $page = (isset($_GET['page'])) ? esc_attr($_GET['page']) : false;
        if ('njt-facebook-messenger.php' != $page) {
            return;
        }
        echo '<style type="text/css">';
        echo '.wp-list-table .column-id { width: 5%; }';
        echo '</style>';
    }
    public function registerMenu()
    {
        $page_title = __('BulkSender', NJT_FB_MESS_I18N);
        $menu_title = __('BulkSender', NJT_FB_MESS_I18N);

        /*
         * Dashboard
         */
        $this->dashboard_hook_suffix = add_menu_page($page_title, $menu_title, 'manage_options', $this->dashboard_page_slug, array($this, 'njtFBMessMenuCallBack'), NJT_FB_MESS_URL . '/assets/img/bulksender-icon.svg');
        add_action("load-" . $this->dashboard_hook_suffix, array($this, 'dashboardPageLoaded'));

        /*
         * Categories
         */
        $page_title = __('Categories', NJT_FB_MESS_I18N);
        $menu_title = __('Categories', NJT_FB_MESS_I18N);

        $this->category_hook_suffix = add_submenu_page($this->dashboard_page_slug, $page_title, $menu_title, 'manage_options', $this->category_page_slug, array($this, 'njtFBMessCategoriesMenuCallBack'));
        add_action("load-" . $this->category_hook_suffix, array($this, 'categoryPageLoaded'));

        //add_submenu_page('social-reviews-dashboard.php', 'Social Reviews Dashboard', 'Dashboard', 'manage_options', 'social-reviews-dashboard.php', array($this, 'socialReviewsDashboardMenuCallBack'));

        /*
         * Settings
         */
        $page_title = __('Facebook Messenger Sender Settings', NJT_FB_MESS_I18N);
        $menu_title = __('Settings', NJT_FB_MESS_I18N);
        $this->settings_hook_suffix = add_submenu_page($this->dashboard_page_slug, $page_title, $menu_title, 'manage_options', $this->settings_page_slug, array($this, 'njtFBMessSettingsMenuCallBack'));
    }
    public function dashboardPageLoaded()
    {
        global $wpdb;
        $fb_page_id = ((isset($_REQUEST['page_id'])) ? $_REQUEST['page_id'] : 0);
        if ($fb_page_id > 0) {
            require_once NJT_FB_MESS_DIR . '/src/senderTable.php';
            $option = 'per_page';
            $args = array(
                        'label' => __('Sender', NJT_FB_MESS_I18N),
                        'default' => 20,
                        'option' => 'njt_fb_mess_senders_per_page'
                    );
            add_screen_option($option, $args);
            $this->njtFbMessSenderTable = new NjtFbMessSenderTable();

            $action = $this->njtFbMessSenderTable->current_action();
            if ($action !== false) {
                $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
                switch ($action) {
                    case 'update_to_not_send':
                        $wpdb->query("UPDATE ".$wpdb->prefix."njt_fb_mess_senders SET `in_send_list` = 0 WHERE `id` IN (".implode(',', $ids).")");
                        break;
                    case 'update_to_send':
                        $wpdb->query("UPDATE ".$wpdb->prefix."njt_fb_mess_senders SET `in_send_list` = 1 WHERE `id` IN (".implode(',', $ids).")");
                        break;
                    case 'delete':
                        $wpdb->query("DELETE FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE `id` IN (".implode(',', $ids).")");
                        break;
                }
                wp_safe_redirect(add_query_arg('page_id', $fb_page_id, $this->getDashboardPageUrl()));
            } else {
                $current_url = parse_url(wp_unslash($_SERVER['REQUEST_URI']));
                parse_str($current_url['query'], $output);
                if (isset($output['_wpnonce']) || isset($output['_wp_http_referer'])) {
                    unset($output['_wpnonce']);
                    unset($output['_wp_http_referer']);
                    wp_safe_redirect(add_query_arg($output, admin_url('admin.php')));
                    exit();
                }
            }
        }
    }
    public function categoryPageLoaded()
    {
        global $wpdb;
        require_once NJT_FB_MESS_DIR . '/src/categoryTable.php';
        $option = 'per_page';
        $args = array(
                    'label' => __('Categories', NJT_FB_MESS_I18N),
                    'default' => 20,
                    'option' => 'njt_fb_mess_category_per_page'
                );
        add_screen_option($option, $args);
        $this->njtFbMessCategoryTable = new NjtFbMessSenderTable();
        $this->njtFbMessCategoryTable->info['cate_page_slug'] = $this->category_page_slug;

        $action = $this->njtFbMessCategoryTable->current_action();

        $redirect = '';

        if ($action !== false) {
            switch ($action) {
                case 'delete':
                    $ids = $_REQUEST['id'];
                    foreach ($ids as $k => $id) {
                        $cat_be_deleted = $wpdb->get_results("SELECT `id`, `parent_id` FROM ".$wpdb->prefix."njt_fb_mess_categories WHERE `id` = '".$id."'");
                        if (count($cat_be_deleted) > 0) {
                            $update = array('parent_id' => $cat_be_deleted[0]->parent_id);
                            $where = array('parent_id' => $cat_be_deleted[0]->id);
                            $wpdb->update($wpdb->prefix."njt_fb_mess_categories", $update, $where);

                            $wpdb->query("DELETE FROM ".$wpdb->prefix."njt_fb_mess_categories WHERE `id` = '".$id."'");
                            $wpdb->query("DELETE FROM ".$wpdb->prefix."njt_fb_mess_category_sender WHERE `category_id` = '".$id."'");
                            $redirect = add_query_arg('page', $this->category_page_slug, admin_url('admin.php'));
                        }
                    }
                    break;
                case 'create':
                    $name = wp_unslash($_POST['name']);
                    $parent = intval($_POST['parent_id']);
                    $description = wp_unslash($_POST['description']);

                    $wpdb->insert($wpdb->prefix."njt_fb_mess_categories", array('name' => $name, 'parent_id' => $parent, 'description' => $description));
                    
                    $redirect = add_query_arg('page', $this->category_page_slug, admin_url('admin.php'));
                    break;
                case 'update':
                    $name = ((isset($_POST['name'])) ? wp_unslash($_POST['name']) : '');
                    $parent = ((isset($_POST['parent_id'])) ? intval($_POST['parent_id']) : 0);
                    $description = ((isset($_POST['description'])) ? wp_unslash($_POST['description']) : '');
                   
                    $id = ((isset($_POST['id'])) ? intval($_POST['id']) : '');

                    if (!empty($name) && !empty($id)) {
                        $update = array('parent_id' => $parent, 'name' => $name, 'description' => $description);
                        $where = array('id' => $id);
                        $wpdb->update($wpdb->prefix."njt_fb_mess_categories", $update, $where);
                    }

                    $redirect = add_query_arg(array('page' => $this->category_page_slug, 'action' => 'edit', 'id' => $id), admin_url('admin.php'));
                    break;
            }
            if (!empty($redirect)) {
                wp_safe_redirect($redirect);
            }
        }

    }
    public function njtFBMessMenuCallBack()
    {
        global $njt_fb_mess_api, $wpdb, $wp_rewrite;
        
        wp_enqueue_media();
        /*$users = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}njt_fb_mess_senders WHERE `first_name` is null ");
        foreach ($users as $k => $v) {
            $sender = $v->sender_id;
            $page_token = $this->getPageTokenFromPageId($v->page_id);

            $user_info = $njt_fb_mess_api->getUserInfo($sender, $page_token);

            $data = array(
                'first_name' => ((isset($user_info->first_name)) ? $user_info->first_name : ''),
                'last_name' => ((isset($user_info->last_name)) ? $user_info->last_name : ''),
                'profile_pic' => ((isset($user_info->profile_pic)) ? $user_info->profile_pic : ''),
                'locale' => ((isset($user_info->locale)) ? $user_info->locale : ''),
                'timezone' => ((isset($user_info->timezone)) ? $user_info->timezone : ''),
                'gender' => ((isset($user_info->gender)) ? $user_info->gender : ''),
            );
            $wpdb->update($wpdb->prefix . "njt_fb_mess_senders", $data, array('id' => $v->id));
        }*/
        

        $this->insertVerifyToken();
        $data = array(
            'pluginHasSettings' => $this->pluginHasSettings(),
            'settings_page_url' => $this->getSettingsPageUrl(),
            'njt_fb_mess_api' => $njt_fb_mess_api,
            'login_callback_url' => $this->getLoginCallBackUrl(),
        );
        extract($data);
        if (!$pluginHasSettings) {
            echo sprintf(__('Please go to <a href="%s">settings page</a> to complete required fields.', NJT_FB_MESS_I18N), $settings_page_url);
        } else {
            if (isset($_GET['reload_pages'])) {
                $wpdb->delete($wpdb->prefix."njt_fb_mess_pages", array('app_id' => get_option('njt_fb_mess_fb_app_id', '')));
                update_option('njt_fb_mess_fb_user_token', '');
            }
            $user_token = get_option('njt_fb_mess_fb_user_token', false);
            if (!$user_token || empty($user_token)) {
                $data = array(
                    'login_facebook_url' => $njt_fb_mess_api->generateLoginUrl($login_callback_url),
                );
                echo NjtFbMessView::load('admin.generate-token', $data);
            } else {
                $fb_page_id = ((isset($_GET['page_id'])) ? (int)$_GET['page_id'] : '0');
                if ($fb_page_id != '0') {
                    add_thickbox();
                    
                    $app_id = get_option('njt_fb_mess_fb_app_id', '');
                    $fb_page_info = $wpdb->get_results("SELECT `page_name`, `page_token` FROM ".$wpdb->prefix."njt_fb_mess_pages WHERE `page_id` = '".$fb_page_id."' AND `app_id` = '".$app_id."'");


                    $fb_page_name = ((isset($fb_page_info[0])) ? $fb_page_info[0]->page_name : '');
                    $fb_page_token = ((isset($fb_page_info[0])) ? $fb_page_info[0]->page_token : '');

                    /*
                     * List senders with page id
                     */
                    if (!class_exists('WP_List_Table')) {
                        require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
                    }
                    
                    /*
                     * Get all cats (for filter)
                     */
                    $_cats = $wpdb->get_results("SELECT `id`, `name`, `parent_id` FROM ".$wpdb->prefix."njt_fb_mess_categories ORDER BY `id` DESC");
                    $cats = array();
                    njt_fb_mess_sender_proccess_array_tr($_cats, $cats, '&nbsp;&nbsp;&nbsp;');

                    $this->njtFbMessSenderTable->page_info = array(
                        'fb_page_id' => $fb_page_id,
                        'fb_page_name' => $fb_page_name,
                        'fb_page_token' => $fb_page_token,
                        'cats' => $cats,
                    );

                    echo '<div class="wrap">';
                    echo '<h2><a style="text-decoration: none" href="'.esc_url(add_query_arg(array('page' => $_REQUEST['page'], 'page_id' => $_REQUEST['page_id']), admin_url('admin.php'))).'">'.sprintf(__('%s\'s subscribers', NJT_FB_MESS_I18N), $fb_page_name).'</a></h2>';

                    $credit_left = $this->checkCredit();
                    echo '<div class="updated notice notice-success is-dismissible">
                            <p>
                            '.sprintf(__('There are only <strong class="njt_fb_mess_credit_left">%1$d</strong> subscribers left for your bulk messaging capacity today. Please <a href="%2$s" target="_blank">upgrade</a> to get unlimited capacity.', NJT_FB_MESS_I18N), $credit_left, esc_url('https://goo.gl/FQfY9j')).'
                            </p>
                        </div>';

                    echo '<form method="GET" action="'.admin_url('admin.php').'" class="njt-fb-mess-sender-frm">';
                    echo '<input type="hidden" name="page" value="'.esc_attr($_REQUEST['page']).'" />';
                    echo '<input type="hidden" name="page_id" value="'.esc_attr($_REQUEST['page_id']).'" />';

                    $this->njtFbMessSenderTable->prepare_items();

                    $this->njtFbMessSenderTable->search_box(__('Search Subscribers', NJT_FB_MESS_I18N), 'search_user_id');

                    $this->njtFbMessSenderTable->display();

                    echo '</form>';

                    echo '</div>';

                    /*
                     * For categories
                     */
                    $_all_cat = $wpdb->get_results("SELECT `id`, `name`, `parent_id` FROM ".$wpdb->prefix."njt_fb_mess_categories ORDER BY `id` DESC");
                    $all_cat = array();
                    njt_fb_mess_sender_proccess_array_tr($_all_cat, $all_cat, '-');

                    /*
                     * Get count of all subscribes in send list
                     */
                    $count_in_send_list = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE `in_send_list` = 1 AND `page_id` = '".$fb_page_id."'");
                    ?>
                    <div id="njt_fb_mess_change_cat_popup" style="display:none;">
                        <div id="njt_fb_mess_change_cat">
                            <ul>
                                <?php
                                foreach ($all_cat as $k => $cat) {
                                    echo sprintf('<li><label><input type="checkbox" name="cat_id[]" value="%1$d" />%2$s</label></li>', $cat->id, $cat->name);
                                }
                                ?>
                            </ul>
                            <input type="hidden" name="cat_action" value="" />
                            <a href="javascript:void(0)" class="button button-primary" id="submit_cat_action"><?php _e('Submit', NJT_FB_MESS_I18N) ?></a>
                        </div><!-- /#njt_fb_mess_change_cat -->
                    </div><!-- /#njt_fb_mess_change_cat_popup -->


                    <div id="njt_fb_mess_send_message_popup" style="display:none;">
                        <div id="njt_fb_mess_send_message">
                            <div class="njt-fb-mess-visible-to-send">
                                <p class="njt_fb_mess_sending_tab_content active" id="njt_fb_mess_sending_tab_content_text">
                                    <label for="njt_fb_mess_send_message_content">
                                        <?php _e('Message (*)', NJT_FB_MESS_I18N); ?>
                                    </label>
                                    <textarea name="njt_fb_mess_send_message_content" id="njt_fb_mess_send_message_content"></textarea>
                                    <?php
                                    if (count($this->shortcuts) > 0) {
                                        $shortcut_html = array();
                                        foreach ($this->shortcuts as $k => $v) {
                                            $shortcut_html[] = sprintf('<a href="javascript:njt_fb_mess_shortcut_click(\'%1$s\')">%2$s</a>', $k, $v);
                                        }
                                        echo implode(', ', $shortcut_html);
                                    }
                                    ?>
                                </p>
                                
                                <p>
                                    <label for="njt_fb_mess_send_message_custom_token">
                                        <?php _e('Custom Token (Optional)', NJT_FB_MESS_I18N); ?>
                                        <?php echo sprintf('<i><a href="%1$s" target="_blank">%2$s</a></i>', 'https://www.youtube.com/watch?v=Zb8YWXlXo-k', __('How to get?', NJT_FB_MESS_I18N)); ?>                                    
                                    </label>
                                    <input type="text" name="njt_fb_mess_send_message_custom_token" id="njt_fb_mess_send_message_custom_token" class="regular-text" />
                                    <i style="font-size: 11px;">
                                        <?php _e(sprintf('Please note: Graph Token will be expired in 1 hour. Get new <a href="%1$s" target="_blank">here</a>', 'https://developers.facebook.com/tools/explorer/145634995501895'), NJT_FB_MESS_I18N); ?>
                                    </i>
                                </p>
                                <p>
                                    <label for="njt_fb_mess_send_message_send_to"><?php _e('Send To: ', NJT_FB_MESS_I18N) ?></label>
                                    <select class="njt_fb_mess_select_full_width" name="njt_fb_mess_send_message_send_to" id="njt_fb_mess_send_message_send_to">
                                        <option value="all">
                                            <?php _e(sprintf('All Subscribers In Send List (%1$d)', $count_in_send_list), NJT_FB_MESS_I18N) ?>
                                        </option>
                                        <option value="selected" data-title="<?php _e('Selected Subscribers', NJT_FB_MESS_I18N) ?>">
                                            <?php _e('Selected Subscribers', NJT_FB_MESS_I18N) ?>                                       
                                        </option>
                                        <option value="in_category"><?php _e('In Categories', NJT_FB_MESS_I18N) ?></option>
                                    </select>
                                </p>
                                <p id="njt_fb_mess_send_message_choose_categories_wrap" style="display: none;">
                                    <label for="njt_fb_mess_send_message_choose_categories">
                                        <?php _e('Choose Categories: ', NJT_FB_MESS_I18N) ?>
                                    </label>
                                    <select class="njt_fb_mess_select_full_width" name="njt_fb_mess_send_message_choose_categories[]" id="njt_fb_mess_send_message_choose_categories" multiple="multiple">
                                        <option value="0">
                                            <?php
                                            _e(
                                                sprintf(
                                                    'Uncategorized (%1$d)',
                                                    NjtFbMessCategory::getCountSender(0, $fb_page_id)
                                                ),
                                                NJT_FB_MESS_I18N
                                            );
                                            ?>
                                        </option>
                                        <?php
                                        foreach ($all_cat as $k => $v) {
                                            $count_sender = NjtFbMessCategory::getCountSender($v->id, $fb_page_id);
                                            printf('<option value="%1$d">%2$s (%3$d)</option>', $v->id, $v->name, $count_sender);
                                        }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <a href="#" class="njt_fb_mess_send_message_send_now button button-primary" data-fb_page_id="<?php echo esc_attr($fb_page_id); ?>" data-fb_page_token="<?php echo esc_attr($fb_page_token); ?>">
                                        <?php _e('Send Now', NJT_FB_MESS_I18N); ?>                                    
                                    </a>
                                </p>
                            </div>
                            <div class="njt-fb-mess-rocket" style="display: none;"><?php echo NjtFbMessView::load('admin.rocket_svg'); ?></div>
                            <div class="njt-fb-mess-progress-bar" style="display: none">
                                <div class="njt-fb-mess-meter">
                                    <span style="width: 0%"></span>
                                    <strong>0%</strong>

                                </div>
                            </div>
                            <div class="njt-fb-mess-results" style="display: none;">
                                <div class="njt-fb-mess-results-warning"><?php _e('Please do not close this box (by clicking close button or clicking outside)', NJT_FB_MESS_I18N) ?></div>
                                <h3></h3>
                                <ul>
                                    <li class="njt-fb-mess-result-sent">
                                        <?php _e('Sent:', NJT_FB_MESS_I18N); ?>
                                        <strong>0</strong>
                                    </li>
                                    <li class="njt-fb-mess-result-fail">
                                        <?php _e('Fails:', NJT_FB_MESS_I18N); ?>
                                        <strong>0</strong>
                                        <a href="#" class="njt-fb-mess-view-fail-detail" style="display: none;">
                                        <?php _e('Detail', NJT_FB_MESS_I18N); ?>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="njt-fb-mess-fail-details" style="display: none;"></ul>
                              </div>
                        </div>                        
                    </div>
                    <?php
                } else {
                    /*
                     * List all pages
                     */
                    $app_id = get_option('njt_fb_mess_fb_app_id', '');
                    $pages = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_pages WHERE `app_id` = '".$app_id."'");
                    $load_js_subscribe = false;
                    if (!(count($pages) > 0)) {
                        $pages = $njt_fb_mess_api->getAllPages();
                        //$load_js_subscribe = true;
                        foreach ($pages as $k => $page) {
                            /*
                             * subscribe pages
                             */
                            //$njt_fb_mess_api->subscribeAppToPage($page['access_token']);
                            $data = array(
                                'page_id' => $page['id'],
                                'page_name' => $page['name'],
                                'page_token' => $page['access_token'],
                                'app_id' => $app_id,
                            );
                            $wpdb->insert($wpdb->prefix."njt_fb_mess_pages", $data);
                        }
                        $pages = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_pages WHERE `app_id` = '".$app_id."'");
                    }
                    echo '<div style="margin-top: 20px;">
                    <a onclick="return confirm(\''.__('Are you sure?', NJT_FB_MESS_I18N).'\');" class="button" href="'.esc_url(add_query_arg('reload_pages', 'true', $this->getDashboardPageUrl())).'">
                    '.__('Reload Pages', NJT_FB_MESS_I18N).'
                    </a></div>';
                    echo '<div class="njt-fb-mess-list-pages">';
                    foreach ($pages as $k => $page) {
                        $go_to_page = '#';
                        $link_page = add_query_arg('page_id', $page->page_id, $this->getDashboardPageUrl());
                        /*if ($page->is_subscribed == '1') {
                            $go_to_page = $link_page;
                        }*/
                        $go_to_page = $link_page;
                        echo '<div class="njt-page" data-fb_page_id="'.esc_attr($page->page_id).'">
                            <div class="njt-inner">
                                <h3><a data-link="' . $link_page . '" href="'.esc_url($go_to_page).'">'.$page->page_name.'</a></h3>';
                        echo '<div class="njt-fb-mess-subscribe-wrap" style="display: '.(($page->is_subscribed == '0') ? 'block' : 'none').'"><a href="javascript:void(0)" class="button njt-fb-mess-subscribe-btn">'.__('Subscribe', NJT_FB_MESS_I18N).'</a></div>';

                        echo '<div class="njt-fb-mess-unsubscribe-wrap" style="display: '.(($page->is_subscribed == '0') ? 'none' : 'block').'"><a href="javascript:void(0)" class="button njt-fb-mess-unsubscribe-btn">'.__('Unsubscribe', NJT_FB_MESS_I18N).'</a></div>';

                        echo    '</div>                        
                        </div>';
                    }
                    echo '</div>';
                    if ($load_js_subscribe) {
                        ?>
                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                
                                var njtfbmess_subscribe_app = new NjtFbMess();
                                var njt_fb_pages = [];
                                jQuery.each(jQuery('.njt-fb-mess-list-pages > .njt-page'), function(index, el) {
                                    $(el).find('.njt-fb-mess-subscribe-btn').attr('disabled', 'disabled').addClass('updating-message');
                                    njt_fb_pages.push($(el).data('fb_page_id'));
                                    
                                });
                                njtfbmess_subscribe_app.subscribePages(njt_fb_pages, 0);                              
                            });
                        </script>
                        <?php
                    }
                    do_action('njt_fb_mess_after_list_pages');
                }
            }
        }

        $wp_rewrite->flush_rules(false);

        //echo NjtFbMessView::load('admin.dashboard', $data);
    }
    public function njtFBMessCategoriesMenuCallBack()
    {
        global $wpdb;
        
        if (isset($_GET['action']) && ($_GET['action'] == 'edit')) {
            $id = intval($_GET['id']);
            $cat_info = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_categories WHERE `id` = " . $id);
            if (count($cat_info) > 0) {
                $all_cat = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_categories WHERE `id` != ".$id." ORDER BY `id` DESC");
                $parent = array();
                njt_fb_mess_sender_proccess_array_tr($all_cat, $parent, '&nbsp;&nbsp;&nbsp;');
                $data = array(
                    'cat' => $cat_info[0],
                    'parent' => $parent
                );
                echo NjtFbMessView::load('admin.categories.edit', $data);
                exit();
            } else {
                wp_die(__('Category not found', NJT_FB_MESS_I18N));
            }
        } else {
            $all_categories = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_categories ORDER BY `id` DESC");
            $dropdown = array();
            njt_fb_mess_sender_proccess_array_tr($all_categories, $dropdown, '&nbsp;&nbsp;');
            
            if (!class_exists('WP_List_Table')) {
                require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
            }

            ob_start();
            echo '<form method="GET" action="">';
            echo '<input type="hidden" name="page" value="'.esc_attr($_REQUEST['page']).'" />';

            $this->njtFbMessCategoryTable->prepare_items();

            $this->njtFbMessCategoryTable->search_box(__('Search Category', NJT_FB_MESS_I18N), 'search_category_id');

            $this->njtFbMessCategoryTable->display();

            echo '</form>';
            $table = ob_get_clean();

            $data = array(
                'dropdown' => $dropdown,
                'total' => count($all_categories),
                'table' => $table
            );

            echo NjtFbMessView::load('admin.categories.index', $data);
        }
    }
    
    public function njtFBMessSettingsMenuCallBack()
    {
        $this->insertVerifyToken();

        global $wp_rewrite;
        $wp_rewrite->flush_rules(false);

        $data = array(
            'login_callback_url' => $this->getLoginCallBackUrl(),
            'webhook_callback_url' => $this->getWebHookCallBackUrl(),
        );
        

        echo NjtFbMessView::load('admin.settings', $data);
    }
    public function registerSettings()
    {
        $settings = array(
            'njt_fb_mess_fb_app_id',
            'njt_fb_mess_fb_app_secret',
            'njt_fb_mess_fb_verify_token',
            'njt_fb_mess_fb_user_token',
        );
        foreach ($settings as $k => $v) {
            register_setting('njt_fb_mess', $v);
        }
    }
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function loadTextDomain()
    {
        load_plugin_textdomain(NJT_FB_MESS_I18N, false, plugin_basename(NJT_FB_MESS_DIR) . '/languages/');
    }
    public function startSession()
    {
        if (!session_id()) {
            session_start();
        }
    }
    public function pluginDeactived()
    {
        global $wp_rewrite;
        $wp_rewrite->flush_rules(false);
    }
    public function pluginActived()
    {
        global $wpdb;
        $this->insertVerifyToken();
        
        $charset_collate = $wpdb->get_charset_collate();

        /*
         * Create facebook_pages table
         */
        $table = $wpdb->prefix.'njt_fb_mess_pages';
        if ($wpdb->get_var("show tables like '$table'") != $table) {
            $sql = 'CREATE TABLE '.$table.' (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `page_id` varchar(255) NOT NULL,
            `page_name` varchar(255) NOT NULL,
            `page_token` text,
            `app_id` varchar(255) NOT NULL,
            `is_subscribed` TINYINT(1) NOT NULL DEFAULT 0,';
            $sql .= '`created` timestamp NOT NULL,';
            $sql .= 'UNIQUE KEY `id` (id)
            ) '.$charset_collate.';';

            require_once ABSPATH.'wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }


        /*
         * Create senders table
         */
        $table = $wpdb->prefix.'njt_fb_mess_senders';
        if ($wpdb->get_var("show tables like '$table'") != $table) {
            $sql = 'CREATE TABLE '.$table.' (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `page_id` varchar(255) NOT NULL,
            `sender_id` varchar(255) NOT NULL,
            `first_name` varchar(255) NULL,
            `last_name` varchar(255) NULL,
            `profile_pic` text NULL,
            `locale` varchar(100) NULL,
            `timezone` varchar(10) NULL,
            `gender` varchar(10) NULL,
            `in_send_list` TINYINT(1) NOT NULL DEFAULT 1,
            ';
            $sql .= '`created` timestamp NOT NULL,';
            $sql .= 'UNIQUE KEY `id` (id)
            ) '.$charset_collate.';';

            require_once ABSPATH.'wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }

        /*
         * Create categories table
         */
        $table = $wpdb->prefix.'njt_fb_mess_categories';
        if ($wpdb->get_var("show tables like '$table'") != $table) {
            $sql = 'CREATE TABLE '.$table.' (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `parent_id` int(11) NOT NULL DEFAULT 0,
            `description` text NULL,
            `cat_order` int(11) NOT NULL DEFAULT 0,           
            ';
            $sql .= '`created` timestamp NOT NULL,';
            $sql .= 'UNIQUE KEY `id` (id)
            ) '.$charset_collate.';';

            require_once ABSPATH.'wp-admin/includes/upgrade.php';
            dbDelta($sql);
        } else {
            require_once ABSPATH.'wp-admin/includes/upgrade.php';
            $sql = "ALTER TABLE  `".$table."` ADD  `description` TEXT NULL AFTER  `parent_id`";
            $wpdb->query($sql);
        }

        /*
         * Create category_sender table
         */
        $table = $wpdb->prefix.'njt_fb_mess_category_sender';
        if ($wpdb->get_var("show tables like '$table'") != $table) {
            $sql = 'CREATE TABLE '.$table.' (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `sender_id` int(11) NOT NULL,
            `category_id` int(11) NOT NULL,         
            ';
            $sql .= '`created` timestamp NOT NULL,';
            $sql .= 'UNIQUE KEY `id` (id)
            ) '.$charset_collate.';';

            require_once ABSPATH.'wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }
    }
    private static function generateRandomVerifyToken()
    {
        return rand(100000, 999999);
    }
    private function insertVerifyToken()
    {
        $token = get_option('njt_fb_mess_fb_verify_token', false);
        if (!$token || empty($token)) {
            update_option('njt_fb_mess_fb_verify_token', self::generateRandomVerifyToken());
        }
    }
    private function pluginHasSettings()
    {
        $app_id = get_option('njt_fb_mess_fb_app_id', false);
        $app_secret = get_option('njt_fb_mess_fb_app_secret', false);
        if (!$app_id || empty($app_id) || !$app_secret || empty($app_secret)) {
            return false;
        } else {
            return true;
        }
    }
    public function getSettingsPageUrl()
    {
        return esc_url(add_query_arg(array(
            'page' => $this->settings_page_slug,
        ), admin_url('admin.php')));
    }
    public function getDashboardPageUrl()
    {
        return esc_url(add_query_arg(array(
            'page' => $this->dashboard_page_slug,
        ), admin_url('admin.php')));
    }
    
    public function registerAdminEnqueue($hook_suffix)
    {
        $pages_have_css_js = array(
            $this->dashboard_hook_suffix,
            $this->category_hook_suffix,
            $this->settings_hook_suffix
        );
        if (in_array($hook_suffix, $pages_have_css_js)) {
            wp_register_style('emojionearea', NJT_FB_MESS_URL . '/assets/css/emojionearea.min.css');
            wp_enqueue_style('emojionearea');

            wp_register_style('njt-fb-mess', NJT_FB_MESS_URL . '/assets/css/njt-fb-mess.css');
            wp_enqueue_style('njt-fb-mess');

            wp_register_script('emojionearea', NJT_FB_MESS_URL . '/assets/js/emojionearea.min.js', array('jquery'));
            wp_enqueue_script('emojionearea');

            wp_register_script('njt-fb-mess', NJT_FB_MESS_URL . '/assets/js/njt-fb-mess.js', array('jquery', 'emojionearea'));
            wp_enqueue_script('njt-fb-mess');

            wp_localize_script(
                'njt-fb-mess',
                'njt_fb_mess',
                array(
                    'nonce' => wp_create_nonce("njt_fb_mess"),
                    'error_nonce' => __('Errors found, please refresh and try again.', NJT_FB_MESS_I18N),
                    'send_mess_error_empty_content' => __('Please type your message.', NJT_FB_MESS_I18N),
                    'send_mess_error_empty_content_image' => __('Please choose your image.', NJT_FB_MESS_I18N),
                    'send_mess_error_empty_content_audio' => __('Please choose your audio file.', NJT_FB_MESS_I18N),
                    'send_mess_error_empty_content_video' => __('Please choose your video file.', NJT_FB_MESS_I18N),
                    'send_mess_error_empty_content_file' => __('Please choose your file.', NJT_FB_MESS_I18N),
                    'sending_text' => __('Sending ', NJT_FB_MESS_I18N),
                    'complete_text' => __('Complete ', NJT_FB_MESS_I18N),
                    'could_not_subscribe_text' => __('Could not subscribe the page, error: ', NJT_FB_MESS_I18N),
                    'retry_subscribe_text' => __('Retry', NJT_FB_MESS_I18N),
                    'add_media_text_title' => __('Choose File', NJT_FB_MESS_I18N),
                    'add_media_text_button' => __('Choose File', NJT_FB_MESS_I18N),
                )
            );
        }
    }
    private function setRoutes()
    {
        $this->routes = array(
            'login-callback' => array(
                'url' => 'njt-fbmess-login-callback',
                'var' => 'njt_fb_mess_login_callback',
                'tag_regex' => '[^&]+',
            ),
            'webhook-callback' => array(
                'url' => 'njt-fbmess-webhook-callback',
                'var' => 'njt_fb_mess_webhook_callback',
                'tag_regex' => '[^&]+',
            ),
        );
    }
    private function getRouteUrl($name)
    {
        return ((isset($this->routes[$name])) ? $this->routes[$name]['url'] : '');
    }
    private function getRouteVar($name)
    {
        return ((isset($this->routes[$name])) ? $this->routes[$name]['var'] : '');
    }
    public function setScreenOption($status, $option, $value)
    {
        return $value;
    }
    public function templateRedirect()
    {
        global $wp_query, $wpdb, $njt_fb_mess_api;
        /*
         * Login callback
         */
        if ((isset($wp_query->query_vars[$this->getRouteVar('login-callback')])) && !is_null($wp_query->query_vars[$this->getRouteVar('login-callback')])) {
            $fb = $njt_fb_mess_api->fb_var;

            $helper = $fb->getRedirectLoginHelper();

            if (isset($_GET['state'])) {
                $helper->getPersistentDataHandler()->set('state', $_GET['state']);
            }
            
            try {
                $accessToken = $helper->getAccessToken();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if (!isset($accessToken)) {
                if ($helper->getError()) {
                    header('HTTP/1.0 401 Unauthorized');
                    echo 'Error: '.$helper->getError()."\n";
                    echo 'Error Code: '.$helper->getErrorCode()."\n";
                    echo 'Error Reason: '.$helper->getErrorReason()."\n";
                    echo 'Error Description: '.$helper->getErrorDescription()."\n";
                } else {
                    header('HTTP/1.0 400 Bad Request');
                    echo 'Bad request';
                }
                exit;
            }

            /*
             * Add webhook
             */
            
            $add_web_hook = $njt_fb_mess_api->addPageWebhooks($this->getWebHookCallBackUrl());
            /*
             * End adding webhook
             */
            
            update_option('njt_fb_mess_fb_user_token', $accessToken);
            wp_safe_redirect($this->getDashboardPageUrl());
        }
        /*
         * Webhook callback
         */
        if ((isset($wp_query->query_vars[$this->getRouteVar('webhook-callback')])) && !is_null($wp_query->query_vars[$this->getRouteVar('webhook-callback')])) {
            $hub_mode = ((isset($_REQUEST['hub_mode'])) ? $_REQUEST['hub_mode'] : '');
            $hub_challenge = ((isset($_REQUEST['hub_challenge'])) ? $_REQUEST['hub_challenge'] : '');
            $hub_verify_token = ((isset($_REQUEST['hub_verify_token'])) ? $_REQUEST['hub_verify_token'] : '');
            /*
             * For verifing
             */
            if (($hub_mode == 'subscribe') && (get_option('njt_fb_mess_fb_verify_token') == $hub_verify_token)) {
                echo $hub_challenge;
            }
            /*
             * For doing stuff
             */
            $data = json_decode(file_get_contents("php://input"), true);
            if (!empty($data['entry'][0]['messaging'])) {
                foreach ($data['entry'][0]['messaging'] as $message) {
                    // Skipping delivery messages
                    if (!empty($message['delivery'])) {
                        continue;
                    }
                    $postback = false;
                    // When bot receives message from user
                    if (!empty($message['message'])) {
                        $command = $message['message']['text'];
                    // When bot receive button click from user
                    } else if (!empty($message['postback'])) {
                        $command = $message['postback']['payload'];
                        $postback = true;
                    }
                    if ($command == "") {
                        return true;
                    }
                    $sender = $message['sender']['id'];
                    $recipient = $message['recipient']['id'];

                    $check = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE `sender_id` = '".$sender."' AND `page_id` = '".$recipient."'");
                    if (count($check) == 0) {
                        $page_token = $this->getPageTokenFromPageId($recipient);
                        $user_info = $njt_fb_mess_api->getUserInfo($sender, $page_token);

                        $data = array(
                            'sender_id' => $sender,
                            'page_id' => $recipient,
                            'first_name' => ((isset($user_info->first_name)) ? $user_info->first_name : ''),
                            'last_name' => ((isset($user_info->last_name)) ? $user_info->last_name : ''),
                            'profile_pic' => ((isset($user_info->profile_pic)) ? $user_info->profile_pic : ''),
                            'locale' => ((isset($user_info->locale)) ? $user_info->locale : ''),
                            'timezone' => ((isset($user_info->timezone)) ? $user_info->timezone : ''),
                            'gender' => ((isset($user_info->gender)) ? $user_info->gender : ''),
                        );
                        $wpdb->insert($wpdb->prefix . "njt_fb_mess_senders", $data);
                    }
                }
            }
            exit();
        }
    }
    private function getPageTokenFromPageId($page_id)
    {
        global $wpdb;
        $app_id = get_option('njt_fb_mess_fb_app_id', '');
        $token = $wpdb->get_results("SELECT `page_token` FROM ".$wpdb->prefix."njt_fb_mess_pages WHERE `app_id` = '".$app_id."' AND `page_id` = '".$page_id."'");
        if (isset($token[0])) {
            return $token[0]->page_token;
        }
        return '';
    }
    public function ajaxGetSenders()
    {
        global $wpdb;

        check_ajax_referer('njt_fb_mess', 'nonce');

        $fb_page_id = ((isset($_POST['fb_page_id'])) ? $_POST['fb_page_id'] : '');
        $selected_users = ((isset($_POST['selected_users'])) ? $_POST['selected_users'] : array());
        $send_to = ((isset($_POST['send_to'])) ? $_POST['send_to'] : '');
        if (!in_array($send_to, array('all', 'selected', 'in_category'))) {
            wp_send_json_error(array(
                'mess' => __('Invalid Send To Paramter', NJT_FB_MESS_I18N)
            ));
            exit();
        }

        //$app_id = get_option('njt_fb_mess_fb_app_id', '');

        $users = array();
        $where = array('1 = 1');
        if ($send_to == 'all') {
            if (!empty($fb_page_id)) {
                $where[] = '`page_id` = \''.$fb_page_id.'\'';
                $where[] = '`in_send_list` = 1';
            } else {
                wp_send_json_error(array(
                    'mess' => __('Invalid Facebook Page', NJT_FB_MESS_I18N)
                ));
            }
        } elseif ($send_to == 'selected') {
            $where[] = '`id` IN ('.implode(',', $selected_users).')';
        } elseif ($send_to == 'in_category') {
            $where[] = '`page_id` = \''.$fb_page_id.'\'';
            $where[] = '`in_send_list` = 1';

            $selected_cats = $_POST['selected_cats'];

            $in_ids = array();
            if (in_array('0', $selected_cats)) {
                $_senders_have_cat = $wpdb->get_results("SELECT `sender_id` FROM ".$wpdb->prefix."njt_fb_mess_category_sender");
                $senders_have_cat = array();
                foreach ($_senders_have_cat as $k => $v) {
                    $senders_have_cat[] = $v->sender_id;
                }
                $_in_ids = $wpdb->get_results("SELECT `id` FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE `page_id` = '".$fb_page_id."' AND `in_send_list` = 1 AND`id` NOT IN (".implode(',', $senders_have_cat).")");
                foreach ($_in_ids as $k => $v) {
                    $in_ids[] = $v->id;
                }
                unset($selected_cats[array_search('0', $selected_cats)]);
            }
            $_in_ids = $wpdb->get_results("SELECT `sender_id` FROM ".$wpdb->prefix."njt_fb_mess_category_sender WHERE `category_id` IN (".implode(',', $selected_cats).")");
            
            foreach ($_in_ids as $k => $v) {
                $in_ids[] = $v->sender_id;
            }
            $where[] = '`id` IN ('.implode(',', $in_ids).')';
        }

        $_users = $wpdb->get_results("SELECT `id`, `sender_id`, `first_name`, `last_name` FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE ".implode(' AND ', $where)."");
        foreach ($_users as $k => $v) {
            $users[] = array(
                'id' => $v->id,
                'sender_id' => $v->sender_id,
                'first_name' => $v->first_name,
                'last_name' => $v->last_name,
            );
        }
        
        $credit_left = $this->checkCredit();
        if (count($users) > $credit_left) {
            wp_send_json_error(array('mess' => sprintf(__('You can only send to %1$s subscribers today', NJT_FB_MESS_I18N), $credit_left)));
        } else {
            wp_send_json_success(array('users' => $users));
        }
    }
    public function ajaxSendMessage()
    {
        global $wpdb, $njt_fb_mess_api;

        check_ajax_referer('njt_fb_mess', 'nonce');

        $to = ((isset($_POST['to'])) ? $_POST['to'] : '');
        
        $content = $content_raw = ((isset($_POST['content'])) ? $_POST['content'] : '');

        $page_token = ((isset($_POST['page_token'])) ? $_POST['page_token'] : '');

        $credit_left = $this->checkCredit();
        if ($credit_left <= 0) {
            wp_send_json_error(array(
                'mess' => __('You\'ve reached your free capacity for today, please come back tomorrow.', NJT_FB_MESS_I18N)
            ));
        }
        if (!empty($to) && !empty($content) && !empty($page_token)) {
            $content = apply_filters('njt_fb_mess_content_before_send', $content);

            if (count($this->shortcuts) > 0) {
                /*
                 * Get sender's informations to use in shortcut
                 */
                $sender_info = $wpdb->get_results("SELECT `first_name`, `last_name` FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE `sender_id` = '".$to."' LIMIT 0,1");
                $first_name = ((!empty($sender_info[0]->first_name)) ? $sender_info[0]->first_name : '');
                $last_name = ((!empty($sender_info[0]->last_name)) ? $sender_info[0]->last_name : '');
                $content = str_replace('[first_name]', $first_name, $content);
                $content = str_replace('[last_name]', $last_name, $content);
            }
            $message = array();

            $message = array('text' => wp_unslash($content));
            $send = $njt_fb_mess_api->sendMessenger($to, $message, $page_token);
            
            if ($send == 'sent') {
                $this->minusCredit();
                wp_send_json_success(array('credit_left' => $this->checkCredit()));
            } else {
                wp_send_json_error(array(
                    'mess' => $send,
                ));
            }
        } else {
            wp_send_json_error(array(
                'mess' => __('Errors #11.', NJT_FB_MESS_I18N)
            ));
        }
    }
    public function ajaxSubscribePage()
    {
        global $wpdb, $njt_fb_mess_api;
        check_ajax_referer('njt_fb_mess', 'nonce');
        $page_id = ((isset($_POST['page_id'])) ? $_POST['page_id'] : '');
        $app_id = get_option('njt_fb_mess_fb_app_id', '');
        if (!empty($page_id)) {
            $_page_token = $wpdb->get_results("SELECT `id`, `page_token` FROM ".$wpdb->prefix."njt_fb_mess_pages WHERE `page_id` = '".$page_id."' AND `app_id` = '".$app_id."'");
            if (isset($_page_token[0]) && !empty($_page_token[0]->page_token)) {
                $page_token = $_page_token[0]->page_token;
                $subscribe = $njt_fb_mess_api->subscribeAppToPage($page_token);

                if ($subscribe === true) {
                    $data = array('is_subscribed' => 1);
                    $where = array('id' => $_page_token[0]->id);
                    $wpdb->update($wpdb->prefix."njt_fb_mess_pages", $data, $where);

                    wp_send_json_success();
                } else {
                    wp_send_json_error(array(
                        'mess' => $subscribe,
                    ));
                }
            } else {
                wp_send_json_error(array(
                    'mess' => __('Page not found (#1).', NJT_FB_MESS_I18N)
                ));
            }
        } else {
            wp_send_json_error(array(
                'mess' => __('Page not found (#2).', NJT_FB_MESS_I18N)
            ));
        }
    }
    public function ajaxUnsubscribePage()
    {
        global $wpdb, $njt_fb_mess_api;
        check_ajax_referer('njt_fb_mess', 'nonce');
        $page_id = ((isset($_POST['page_id'])) ? $_POST['page_id'] : '');
        $app_id = get_option('njt_fb_mess_fb_app_id', '');
        if (!empty($page_id)) {
            $_page_token = $wpdb->get_results("SELECT `id`, `page_token` FROM ".$wpdb->prefix."njt_fb_mess_pages WHERE `page_id` = '".$page_id."' AND `app_id` = '".$app_id."'");
            if (isset($_page_token[0]) && !empty($_page_token[0]->page_token)) {
                $page_token = $_page_token[0]->page_token;
                $subscribe = $njt_fb_mess_api->deleteSubscribe($page_id, $page_token);

                $data = array('is_subscribed' => '0');
                $where = array('id' => $_page_token[0]->id);
                $wpdb->update($wpdb->prefix."njt_fb_mess_pages", $data, $where);

                wp_send_json_success();
            } else {
                wp_send_json_error(array(
                    'mess' => __('Page not found (#1).', NJT_FB_MESS_I18N)
                ));
            }
        } else {
            wp_send_json_error(array(
                'mess' => __('Page not found (#2).', NJT_FB_MESS_I18N)
            ));
        }
    }
    public function ajaxCatAction()
    {
        global $wpdb;

        $act = ((isset($_POST['act'])) ? $_POST['act'] : '');
        if (empty($act) || !in_array($act, array('change_cat', 'add_new_cat'))) {
            $mess = __('Wrong action', NJT_FB_MESS_I18N);
            wp_send_json_error(array('mess' => $mess));
            exit();
        }

        $selected_cats = ((isset($_POST['selected_cats'])) ? $_POST['selected_cats'] : array());
        $selected_senders = ((isset($_POST['selected_senders'])) ? $_POST['selected_senders'] : array());

        if ($act == 'change_cat') {
            /*
             * Remove old cats
             */
            $wpdb->query("DELETE FROM " . $wpdb->prefix . "njt_fb_mess_category_sender WHERE `sender_id` IN (".implode(',', $selected_senders).")");
        }

        /*
         * Add new one
         */
        foreach ($selected_senders as $k => $v) {
            foreach ($selected_cats as $k2 => $v2) {
                $check = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix . "njt_fb_mess_category_sender WHERE `category_id` = " . intval($v2) . " AND `sender_id` = " . intval($v));
                if ($check == '0') {
                    $insert = array(
                        'category_id' => $v2,
                        'sender_id' => $v,
                    );
                    $format = array('%d', '%d');
                    $wpdb->insert($wpdb->prefix . "njt_fb_mess_category_sender", $insert, $format);
                }
            }
        }
        wp_send_json_success(array('mess' => __('Update categories success', NJT_FB_MESS_I18N)));
        exit();
    }
    public function addNoteToAfterListPages()
    {
        echo NjtFbMessView::load('admin.subscribe_note');
    }
    public function customRewriteRule()
    {
        foreach ($this->routes as $k => $v) {
            add_rewrite_rule('^' . $v['url'] . '/?', 'index.php?' . $v['var'], 'top');
        }
        /*
        add_rewrite_rule('^' . $this->getRouteUrl('login-callback') . '/?', 'index.php?' . $this->getRouteVar('login-callback'), 'top');
        add_rewrite_rule('^' . $this->getRouteUrl('webhook-callback') . '/?', 'index.php?' . $this->getRouteVar('webhook-callback'), 'top');
        */
    }
    public function customRewriteTag()
    {
        foreach ($this->routes as $k => $v) {
            add_rewrite_tag('%' . $v['var'].'%', '('.$v['tag_regex'].')');
        }
    }
    public function getLoginCallBackUrl()
    {
        return esc_url(home_url('/' . $this->getRouteUrl('login-callback'), 'https')) . '/';
    }
    public function getWebHookCallBackUrl()
    {
        return esc_url(home_url('/' . $this->getRouteUrl('webhook-callback'), 'https')) . '/';
    }
    public function checkCredit()
    {
        $current_day = date('d');
        $current_date_db = get_option('njt_fb_mess_f_current_day', '');
        if ($current_date_db != $current_day) {
            update_option('njt_fb_mess_f_current_day', $current_day);
            update_option('njt_fb_mess_f_credit', '100');
        }
        return get_option('njt_fb_mess_f_credit');
    }
    public function minusCredit()
    {
        $credit = get_option('njt_fb_mess_f_credit', '0');
        if ((int)$credit > 0) {
            update_option('njt_fb_mess_f_credit', ($credit - 1));
        }
    }
}
