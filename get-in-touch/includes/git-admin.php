<?php
namespace git;

class GITAdmin
{
    protected static $instance = null;

    public static function get_instance()
    {
        // create an object
        NULL === self::$instance and self::$instance = new self;

        return self::$instance;
     }

    public function init()
    {
        $this->vendorInlcudes();

        $this->fileInlcudes();

        add_action('admin_menu', array($this, 'menuItems'));

        add_action( 'init', array($this, 'userFiles'));
    }

    public function fileInlcudes()
    {
        require_once GIT_PLUGIN_DIR .'/includes/git-helper.php';
        require_once GIT_PLUGIN_DIR .'/includes/git-shortcode.php';
        require_once GIT_PLUGIN_DIR .'/includes/git-postdata.php';

        require_once GIT_PLUGIN_DIR .'/includes/input_data_post.php';
        require_once GIT_PLUGIN_DIR .'/includes/input_data_get.php';

        require_once GIT_PLUGIN_DIR .'/views/view-form.php';
        require_once GIT_PLUGIN_DIR .'/views/view-map.php';

        require_once GIT_PLUGIN_DIR .'/includes/send_contact_form_data.php';
    }

    public function vendorInlcudes()
    {
        if(!class_exists('PHPMailer'))
        {
            require_once GIT_PLUGIN_DIR .'/redlof/vendor/phpmailer/class.phpmailer.php';
            require_once GIT_PLUGIN_DIR .'/redlof/vendor/phpmailer/phpmailerautoload.php';
        }

        require_once GIT_PLUGIN_DIR .'/redlof/vendor/recaptcha/recaptchalib.php';
    }

    public function menuItems()
    {
        add_menu_page('Get In Touch', 'Get In Touch', 'manage_options', 'get-in-touch', array($this, 'pageDashboard'), plugins_url( 'get-in-touch/public/img/git.png' ));

        $PageA = add_submenu_page( 'get-in-touch', 'Dashboard', 'Dashboard', 'manage_options', 'get-in-touch', array($this, 'pageDashboard'));
        $PageB = add_submenu_page( 'get-in-touch', 'Create Form', 'Create Form', 'manage_options', 'git-create-form', array($this, 'pageAddForm') );
        $PageC = add_submenu_page( null, 'Update Form', 'Update Form', 'manage_options', 'git-edit-form', array($this, 'pageUpdateForm') );
        $PageD = add_submenu_page( 'get-in-touch', 'Contact Requests', 'Contact Requests', 'manage_options', 'git-contact-requests', array($this, 'pageViewConactRequests') );

        add_action('admin_print_scripts-' . $PageA, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageB, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageC, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageD, array($this, 'adminScriptStyles'));
    }

    public function adminScriptStyles()
    {
        if(is_admin())
        {
            wp_enqueue_media();
            wp_enqueue_script( 'git-ajax-request', plugins_url( 'get-in-touch/public/js/git-admin.js' ), array( 'jquery', 'wp-color-picker'  ), false, true );
            wp_localize_script( 'git-ajax-request', 'GITAjax', array( 'ajaxurl' => plugins_url( 'admin-ajax.php' ) ) );

            wp_enqueue_style( 'git-css', plugins_url( 'get-in-touch/public/css/git-admin.css' ), array('thickbox'), GIT_VERSION, 'all' );
            wp_enqueue_style( 'wp-color-picker' );
        }
    }

    public function userFiles()
    {
        if (!is_admin())
        {
            wp_enqueue_style( 'git-user-css', plugins_url( 'get-in-touch/public/css/git-user.css' ), array(), GIT_VERSION, 'all' );

            wp_enqueue_script( 'git-ajax-request', plugins_url( 'get-in-touch/public/js/git-user.js' ), array( 'jquery' ), false, true );
            wp_localize_script( 'git-ajax-request', 'GITUserAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        }
    }

    public function pageDashboard()
    {
        require_once GIT_PLUGIN_DIR .'/pages/admin-dashboard.php';
    }

    public function pageAddForm()
    {
        require_once GIT_PLUGIN_DIR .'/pages/admin-create-form.php';
    }

    public function pageUpdateForm()
    {
        require_once GIT_PLUGIN_DIR .'/pages/admin-update-form.php';
    }

    public function pageViewConactRequests()
    {
        require_once GIT_PLUGIN_DIR .'/pages/admin-view-contactrequests.php';
    }

}
