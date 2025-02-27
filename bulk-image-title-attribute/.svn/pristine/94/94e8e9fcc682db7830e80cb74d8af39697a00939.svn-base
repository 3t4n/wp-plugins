<?php
namespace Pagup\Bigta\Controllers;

use Pagup\Bigta\Core\Option;
use Pagup\Bigta\Traits\SettingHelper;

class SettingsController
{
    use SettingHelper;

    public function add_settings()
    {
        add_menu_page(
            'Bulk Image Title Attribute Settings',
            'Bulk Image Title Attribute',
            'manage_options',
            'bigta',
            array(&$this, 'page'),
            'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMjAgMjAiPjxnIGZpbGw9Im5vbmUiPjxwYXRoIGQ9Ik0xMy45OTkgNy41YTEuNSAxLjUgMCAxIDEtMyAwYTEuNSAxLjUgMCAwIDEgMyAwem0tMSAwYS41LjUgMCAxIDAtMSAwYS41LjUgMCAwIDAgMSAwek0zIDZhMyAzIDAgMCAxIDMtM2g3Ljk5OWEzIDMgMCAwIDEgMyAzdjMuMDAyYTIuODcgMi44NyAwIDAgMC0xIC4yMjlWNmEyIDIgMCAwIDAtMi0yaC04YTIgMiAwIDAgMC0yIDJ2Ny45OTljMCAuMzcyLjEwMy43MjEuMjggMS4wMmw0LjY2OS00LjU4OGExLjUgMS41IDAgMCAxIDIuMTAyIDBsMS43NDUgMS43MTVsLS43MDcuNzA3bC0xLjczOC0xLjcwOWEuNS41IDAgMCAwLS43MDEgMGwtNC42NjEgNC41OEExLjk5IDEuOTkgMCAwIDAgNiAxNmgzLjQ3NGMtLjAxNi4wNS0uMDMuMTAzLS4wNDMuMTU1bC0uMjExLjg0NUg2YTMgMyAwIDAgMS0zLTN2LTh6bTcuOTc5IDkuMzc2bDQuODI5LTQuODNhMS44NyAxLjg3IDAgMSAxIDIuNjQ0IDIuNjQ2bC00LjgyOSA0LjgyOGEyLjE5NyAyLjE5NyAwIDAgMS0xLjAyLjU3OGwtMS40OTguMzc1YS44OS44OSAwIDAgMS0xLjA3OC0xLjA3OWwuMzc0LTEuNDk4Yy4wOTctLjM4Ni4yOTYtLjczOS41NzgtMS4wMnoiIGZpbGw9ImN1cnJlbnRDb2xvciI+PC9wYXRoPjwvZz48L3N2Zz4='
        );
    }

    public function page() {

        if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'Sorry, you are not allowed to access this page.', "better-robots-txt" ) );
		}

		// only users with `unfiltered_html` can edit scripts.
		if ( ! current_user_can( 'unfiltered_html' ) ) {
			wp_die( __( 'Sorry, you are not allowed to edit this page. Ask your administrator for assistance.', "better-robots-txt" ) );
		}

        // Get list of post types to display as checkbox options
        $post_types = $this->cpts( ['attachment'] );
        $get_options = new Option;
        $options = $get_options::all();
        $blacklist = $this->blacklist();
        $options['blacklist'] = $blacklist;

        if (isset($options['post_types']) && !empty($options['post_types'])) {
            $options['post_types'] = maybe_unserialize($options['post_types']);
        }

        $post_types = $this->cpts( ['attachment'] );

        $allowed_post_types = Option::check('post_types') ? maybe_unserialize(Option::get('post_types')) : [];
        
        $posts = $this->get_items( get_posts(array(
            'post_type' => $allowed_post_types,
            'orderby'   => 'title',
            'order'   => 'ASC',
            'fields' => 'ids',
            'numberposts' => -1
        )), true);

        wp_localize_script( 'bigta__main', 'data', array(
            'post_types' => $post_types,
            'posts' => $posts,
            'assets' => plugins_url('assets', dirname(__FILE__)),
            'options' => $options,
            'onboarding' => get_option('bigta_tour'),
            'pro' => bigta_fs()->can_use_premium_code__premium_only(),
            'plugins' => $this->installable_plugins(),
            'language' => get_locale(),
            'nonce' => wp_create_nonce( 'bigta__nonce' ),
            'purchase_url' => bigta_fs()->get_upgrade_url(),
            'recommendations' => $this->recommendations_list(),
        ));

        if (BIGTA_PLUGIN_MODE !== "prod") {
            echo $this->devNotification();
        }
        
        echo '<div id="bigta__app"></div>';
    }

    public function save_options() {

        // check the nonce
        if ( check_ajax_referer( 'bigta__nonce', 'nonce', false ) == false ) {
            wp_send_json_error( "Invalid nonce", 401 );
            wp_die();
        }

        if (!current_user_can('manage_options')) {
            wp_send_json_error( "Unauthorized user", 403 );
            wp_die();
        }

        $safe = [
            "title", "image_name", "focus_keyword", "focus_keyword_and_title", "add_site_title", "remove_settings"
        ];
  
        $options = $this->sanitize_options($_POST['options'], $safe);

        $result = update_option('bigta', $options);

        if ($result) {

            wp_send_json_success([
                'options' => $options,
                'message' => "Saved Successfully",
            ]);

        } else {
            wp_send_json_error([
                'options' => $options,
                'message' => "Error Saving Options"
            ]);
        }

        wp_die();
    }

    public function onboarding() {

        // check the nonce
        if ( check_ajax_referer( 'bigta__nonce', 'nonce', false ) == false ) {
            wp_send_json_error( "Invalid nonce", 401 );
            wp_die();
        }

        if (!current_user_can('manage_options')) {
            wp_send_json_error( "Unauthorized user", 403 );
            wp_die();
        }

        $closed = isset($_POST['closed']) ? ($_POST['closed'] === 'true' || $_POST['closed'] === true) : false;

        $result = update_option('bigta_tour', $closed);

        if ($result) {

            wp_send_json_success([
                'bigta_tour' => get_option('bigta_tour'),
                'message' => "Tour closed value saved successfully",
            ]);

        } else {
            wp_send_json_error([
                'bigta_tour' => get_option('bigta_tour'),
                'message' => "Error Saving Tour closed value"
            ]);
        }

    }

}