<?php

namespace AdBlockGuard;



class Notices {

    private $notices = [];

    public function __construct() {
        add_action('admin_notices', [$this, 'display_notices']);
        add_action('admin_init', [$this, 'handle_action_click']);
    }

    
    /**
     * Add a notice to be displayed in the admin area.
     *
     * @param string $id Unique ID for the notice.
     * @param string $message Message to display.
     * @param string $type Type of notice ('info', 'warning', 'error', etc.).
     * @param bool $persistent Whether the notice should persist across requests.
     * @param bool $dismissible Whether the notice can be dismissed.
     * @param array|null $action Optional action button with ['label' => '', 'url' => '', 'type' => 'button'|'link'].
     */

	public function add_notice($id, $message, $type = 'info', $persistent = false, $dismissible = true, $action = null) {
	    $this->notices[$id] = [
	        'message'     => $message,
	        'type'        => $type,
	        'persistent'  => $persistent,
	        'dismissible' => $dismissible,
	        'action'      => $action,
	    ];

	    if ($persistent) {
	        $stored_notices = get_option('wuadblockguard_notices', []);
	        $stored_notices[$id] = $this->notices[$id];
	        update_option('wuadblockguard_notices', $stored_notices, false);
	    }
	}






    /**
     * Display notices in the admin area.
     */
    public function display_notices() {
        // Get stored notices
        $stored_notices = get_option('wuadblockguard_notices', []);

        // Merge stored notices with current notices
        foreach ($this->notices as $id => $notice) {
            if (!isset($stored_notices[$id])) {
                $stored_notices[$id] = $notice; // Add new notices to stored ones
            }
        }

        // Render each notice
        foreach ($stored_notices as $id => $notice) {
            $this->render_notice($id, $notice);
        }

        // Update only persistent notices back to the database
        $persistent_notices = array_filter(
            $stored_notices,
            function ($notice) {
                return !empty($notice['persistent']);
            }
        );

        update_option('wuadblockguard_notices', $persistent_notices, false);
    }

    /**
     * Render a single notice.
     *
     * @param string $id Unique ID for the notice.
     * @param array $notice The notice details.
     */
    private function render_notice($id, $notice) {
        $classes = 'notice notice-' . esc_attr($notice['type']);
        if ($notice['dismissible']) {
            $classes .= ' is-dismissible';
        }

        $data_attr = '';
        if ($notice['persistent'] && $notice['dismissible']) {
            $data_attr = ' data-dismissible="adblockguard_notice_' . esc_attr($id) . '-forever"';
        }

        echo '<div id="notice-' . esc_attr($id) . '" class="' . esc_attr($classes) . '"' . $data_attr . '>';
        echo '<p>' . $notice['message'] . '</p>';

        if (!empty($notice['action'])) {
            // Append the notice ID as a query parameter to the action URL
            $action_url = add_query_arg('adblockguard_notice_action', $id, $notice['action']['url']);

            if (!empty($notice['action']['type']) && $notice['action']['type'] == 'link') {
                // Render as a simple link
                echo '<p><a href="' . esc_url($action_url) . '">' . esc_html($notice['action']['label']) . '</a></p>';
            } elseif (empty($notice['action']['type']) || $notice['action']['type'] == 'button') {
                // Render as a button by default
                echo '<p><a href="' . esc_url($action_url) . '" class="button button-primary">' . esc_html($notice['action']['label']) . '</a></p>';
            }
        }

        echo '</div>';
    }

    /**
     * Handle the action link click to remove the persistent notice.
     */
    public function handle_action_click() {
        if (isset($_GET['adblockguard_notice_action'])) {
            $notice_id = sanitize_text_field($_GET['adblockguard_notice_action']);

            // Clear the specific notice
            $this->clear_notice($notice_id);

            // Proceed with the action (e.g., redirect to the intended page)
            if (isset($_GET['page'])) {
                $redirect_url = admin_url('admin.php?page=' . sanitize_text_field($_GET['page']));
                wp_redirect($redirect_url);
                exit;
            }
        }
    }

    /**
     * Clear a specific stored notice.
     *
     * @param string $id Unique ID of the notice to clear.
     */
    public function clear_notice($id) {
        $stored_notices = get_option('wuadblockguard_notices', []);
        if (isset($stored_notices[$id])) {
            unset($stored_notices[$id]);
            update_option('wuadblockguard_notices', $stored_notices, false);
        }
    }
}
