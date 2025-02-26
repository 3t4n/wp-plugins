<?php

namespace APG\Admin;

use APG\Admin\Addons;

/**
 * Class Page
 * @package APG\Admin
 */
abstract class Page {

    /**
     * @var
     */
    protected $template;

    /**
     * @return mixed
     */
	abstract public function render();

    /**
     * Show the error message
     */
    public function apg_error() {
        echo '<div class="error notice"><p>' . $this->error . '</p></div>';
    }

    /**
     * Show the success message
     *
     * @param $message
     */
    public function apg_success( $message ) {
        echo '<div class="updated notice"><p>' . $message . '</p></div>';
    }

    /**
     * Render a (back-end) view
     *
     * @param $template
     * @param array $sidebar_addons
     */
    protected function render_view( $template, $sidebar_addons = array() ) {
        if( file_exists( APG_PLUGIN_PATH . 'templates/' . $template . '.php' ) ) {
            $this->template['sidebar_addons'] = $sidebar_addons;

            include( APG_PLUGIN_PATH . 'templates/backend/header.php' );
            include( APG_PLUGIN_PATH . 'templates/' . $template . '.php' );
            include( APG_PLUGIN_PATH . 'templates/backend/footer.php' );
        }
        else{
            echo 'Template not found: ' . $template;
            exit;
        }
    }


}