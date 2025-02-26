<?php
class NjtFbMessSenderTable extends WP_List_Table {

    public $columns = array();
    public $page_info = array();

    public function get_columns()
    {
        return array(
                    'cb' => '<input type="checkbox" />',
                    'id' => __('ID', NJT_FB_MESS_I18N),
                    //'sender_id' => __('Sender ID', NJT_FB_MESS_I18N),
                    'first_name' => __('First Name', NJT_FB_MESS_I18N),
                    'last_name' => __('Last Name', NJT_FB_MESS_I18N),
                    'profile_pic' => __('Profile Pic', NJT_FB_MESS_I18N),
                    'gender' => __('Gender', NJT_FB_MESS_I18N),
                    'locale' => __('Locale', NJT_FB_MESS_I18N),
                    'timezone' => __('Timezone', NJT_FB_MESS_I18N),
                    'in_send_list' => __('In Send List?', NJT_FB_MESS_I18N),
                    'categories' => __('Categories', NJT_FB_MESS_I18N),
                    'created' => __('Subscribed at', NJT_FB_MESS_I18N),
                );
    }
    public function prepare_items()
    {
        global $wpdb;
        $per_page = $per_page = $this->get_items_per_page('njt_fb_mess_senders_per_page', 20);
        $current_page = $this->get_pagenum();

        /*
         * CONDITIONS
         */
        $where = array("`page_id` = '".$this->page_info['fb_page_id']."'");
        if (!empty($_REQUEST['s'])) {
            $s = addslashes($_REQUEST['s']);
            $where[] = "(`first_name` LIKE '%".$s."%' OR `first_name` LIKE '%".$s."%')";
        }

        /*
         * By filter
         */
        if (isset($_REQUEST['cat'])) {
            $filter_by_cat = ((isset($_REQUEST['cat'])) ? $_REQUEST['cat'] : '');

            if ($filter_by_cat !== '') {
                if ($filter_by_cat != '0') {
                    /*$_in_ids = $wpdb->get_results("SELECT `sender_id` FROM ".$wpdb->prefix."njt_fb_mess_category_sender WHERE `category_id` = " . intval($filter_by_cat));
                    $in_ids = array();
                    foreach ($_in_ids as $k => $v) {
                        $in_ids[] = $v->sender_id;
                    }*/
                    $where[] = "`id` IN (SELECT `sender_id` FROM ".$wpdb->prefix."njt_fb_mess_category_sender WHERE `category_id` = " . intval($filter_by_cat) . ")";
                } elseif ($filter_by_cat == '0') {
                    /*$_not_in_ids = $wpdb->get_results("SELECT `sender_id` FROM ".$wpdb->prefix."njt_fb_mess_category_sender");
                    $not_in_ids = array();
                    foreach ($_not_in_ids as $k => $v) {
                        $not_in_ids[] = $v->sender_id;
                    }*/
                    $where[] = "`id` NOT IN (SELECT `sender_id` FROM ".$wpdb->prefix."njt_fb_mess_category_sender)";
                }
            }
        }

        /*
         * Filter by locale
         */
        if (isset($_REQUEST['locale'])) {
            $filter_by_locale = ((isset($_REQUEST['locale'])) ? $_REQUEST['locale'] : '');

            if ($filter_by_locale !== '') {
                $where[] = "`locale` = '".$filter_by_locale."'";
            }
        }

        /*
         * Filter by gender
         */
        if (isset($_REQUEST['gender'])) {
            $filter_by_gender = ((isset($_REQUEST['gender'])) ? $_REQUEST['gender'] : '');

            if ($filter_by_gender !== '') {
                $where[] = "`gender` = '".$filter_by_gender."'";
            }
        }

        /*
         * End conditions
         */
        //exit("SELECT COUNT(*) FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE ".implode(' AND ', $where)."");
        $total_sender = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE ".implode(' AND ', $where)."");

        $this->set_pagination_args(array(
            'total_items' => $total_sender,                  //WE have to calculate the total number of items
            'per_page'    => $per_page                     //WE have to determine how many items to show on a page
        ));

        $order = $this->get_order();
        //exit("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE ".implode(' AND ', $where)." ORDER BY ".$order." LIMIT ".(($current_page - 1) * $per_page).", ".$per_page."");
        $_senders = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."njt_fb_mess_senders WHERE ".implode(' AND ', $where)." ORDER BY ".$order." LIMIT ".(($current_page - 1) * $per_page).", ".$per_page."");
        $senders = array();
        foreach ($_senders as $k => $sender) {
            $_cats = NjtFbMessCategory::getCatsOfSender($sender->id);
            $cats = array();
            foreach ($_cats as $k2 => $v2) {
                $current_url = parse_url(wp_unslash($_SERVER['REQUEST_URI']));
                parse_str($current_url['query'], $output);
                if (isset($output['_wpnonce']) || isset($output['_wp_http_referer'])) {
                    unset($output['_wpnonce']);
                    unset($output['_wp_http_referer']);
                }
                $output['cat'] = $k2;
                $cat_url = add_query_arg($output, admin_url('admin.php'));

                $cat_name = $v2;
                $cats[] = sprintf('<a href="%1$s">%2$s</a>', $cat_url, $cat_name);
            }
            $senders[] = array(
                'sender_id' => $sender->sender_id,
                'id' => $sender->id,
                'first_name' => $sender->first_name,
                'last_name' => $sender->last_name,
                'profile_pic' => $sender->profile_pic,
                'locale' => $sender->locale,
                'timezone' => $sender->timezone,
                'gender' => $sender->gender,
                'in_send_list' => $sender->in_send_list,
                'categories' => implode(', ', $cats),
                'created' => $sender->created
            );
        }

        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = $this->get_column_info();
        $this->items = $senders;
    }
    public function column_default($item, $column_name)
    {
        return ((in_array($column_name, array_keys($this->get_columns()))) ? $item[$column_name] : print_r($item, true));
    }
    public function get_sortable_columns()
    {
        $sortable_columns = array(
            'sender_id'  => array('sender_id', false), //false means ASC, true means DESC or unordered
            'id'  => array('id', false),
            'first_name'  => array('first_name', false),
            'last_name'  => array('last_name', false),
            'locale'  => array('locale', false),
            'gender'  => array('gender', false),
            'in_send_list'  => array('in_send_list', false),
            'created'  => array('created', false),
        );
        return $sortable_columns;
    }
    public function get_order() {
        // If no sort, default to id
        $orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'id';
        // If no order, default to asc
        $order = (!empty($_GET['order'])) ? $_GET['order'] : 'desc';
        
        return $orderby . ' ' . $order;
    }
    public function column_created($item)
    {
        return date(get_option('time_format') . ' ' . get_option('date_format'), strtotime($item['created']));
    }
    public function column_sender_id($item) {
        $actions = array(
            'send_message' => sprintf('<a href="javascript:void(0)" data-sender_id="%s" class="njt_fb_mess_send_message">'.__('Send Message', NJT_FB_MESS_I18N).'</a>', $item['sender_id'])
        );
        return sprintf('%1$s %2$s', $item['sender_id'], $this->row_actions($actions));
    }
    public function column_profile_pic($item) {
        $href = '#';
        preg_match('#\/[0-9]+\_([0-9]+)\_[0-9]+\_#', $item['profile_pic'], $m);
        if (isset($m[1])) {
            $href = 'https://facebook.com/' . $m[1];
        }
        $avatar = ((!empty($item['profile_pic'])) ? sprintf('<a href="%1$s" target="_blank"><img style="width: 40px; height: 40px" src="%2$s" alt="" /></a>', esc_url($href), $item['profile_pic']) : '');
        return $avatar;
        /*
        $actions = array(
            'send_message' => sprintf('<a href="javascript:void(0)" data-sender_id="%s" class="njt_fb_mess_send_message">'.__('Send Message', NJT_FB_MESS_I18N).'</a>', $item['sender_id'])
        );
        return sprintf('%1$s %2$s', $avatar, $this->row_actions($actions));
        */
    }
    public function column_locale($item)
    {
        return ((class_exists('Locale')) ? Locale::getDisplayRegion($item['locale']) : $item['locale']);
    }
    public function column_in_send_list($item)
    {
        $yes = __('Yes', NJT_FB_MESS_I18N);
        $no = __('No', NJT_FB_MESS_I18N);
        $no = sprintf('<span style="color: #ff0000">%s</span>', $no);
        return (($item['in_send_list'] == 1) ? $yes : $no);
    }
    public function get_bulk_actions() {
        $actions = array(
            'delete'    => __('Delete', NJT_FB_MESS_I18N),
            'update_to_not_send' => __('Update to not send list', NJT_FB_MESS_I18N),
            'update_to_send' => __('Update to send list', NJT_FB_MESS_I18N),
            'change_cat' => __('Change Category', NJT_FB_MESS_I18N),
            'add_new_cat' => __('Add New Categories', NJT_FB_MESS_I18N),
        );
        return $actions;
    }
    public function extra_tablenav($which)
    {
        global $wpdb;
        if ($which == 'top') {
            ?>
            <a href="#TB_inline?width=600&height=550&inlineId=njt_fb_mess_send_message_popup" title="<?php echo sprintf(__('Send message to %s\'s subscribers', NJT_FB_MESS_I18N), $this->page_info['fb_page_name']) ?>" class="button button-primary njt-fb-mess-send-all thickbox">
                <?php echo __('Send Message', NJT_FB_MESS_I18N); ?>
            </a>
            
            <?php
            $selected_cat = ((isset($_REQUEST['cat'])) ? $_REQUEST['cat'] : '');
            ?>
            <select name="cat">
                <option value="" <?php selected('', $selected_cat); ?>><?php _e('All Categories', NJT_FB_MESS_I18N); ?></option>
                <option value="0" <?php selected('0', $selected_cat); ?>><?php _e('Uncategorized', NJT_FB_MESS_I18N); ?></option>
                <?php
                
                foreach ($this->page_info['cats'] as $k => $v) {
                    echo sprintf('<option value="%1$s" %3$s>%2$s</option>', $v->id, $v->name, selected($v->id, $selected_cat, false));
                }
                ?>
            </select>

            <?php
            /*
             * Filter by locale
             */
            $selected_locale = ((isset($_GET['locale'])) ? $_GET['locale']: '');
            $locales = $wpdb->get_results("SELECT `locale` FROM ".$wpdb->prefix."njt_fb_mess_senders GROUP BY `locale`");
            ?>
            <select name="locale" id="">
                <option value="" <?php selected('', $selected_locale); ?>>
                    <?php _e('All Locales', NJT_FB_MESS_I18N); ?>                    
                </option>
                <?php
                foreach ($locales as $k => $v) {
                    if (!empty($v->locale)) {
                        echo sprintf('<option value="%1$s" %3$s>%2$s</option>', esc_attr($v->locale), ((class_exists('Locale')) ? Locale::getDisplayRegion($v->locale) : $v->locale), selected($v->locale, $selected_locale, false));
                    }
                }
                ?>
            </select>

            <?php
            /*
             * Filter by gender
             */
            $selected_gender = ((isset($_GET['gender'])) ? $_GET['gender']: '');
            $genders = array('male', 'female');
            ?>
            <select name="gender" id="">
                <option value="" <?php selected('', $selected_locale); ?>>
                    <?php _e('All Genders', NJT_FB_MESS_I18N); ?>                    
                </option>
                <?php
                foreach ($genders as $k => $v) {
                    echo sprintf('<option value="%1$s" %3$s>%2$s</option>', $v, $v, selected($v, $selected_gender, false));
                }
                ?>
            </select>

            <input type="submit" name="filter_action" class="button" value="<?php _e('Filter', NJT_FB_MESS_I18N); ?>">
            <?php
        }
    }
    public function column_cb($item) {
        return sprintf('<input type="checkbox" name="id[]" value="%s" />', $item['id']);
    }
}
