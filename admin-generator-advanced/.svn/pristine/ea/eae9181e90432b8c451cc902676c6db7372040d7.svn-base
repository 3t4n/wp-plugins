<?php

require_once('fields.php');
//include the custom made REST API routes , for the plugin
require_once('routes.php');

class agaMetaClass
{

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $metaBoxesArr;
    private $options;

    /**
     * Start up
     */
    public function __construct($metaboxesArr)
    {
        if (isset($metaboxesArr)) {
            $metaboxesArr = $this->processArray($metaboxesArr);
            $this->gametaboxesArr = $metaboxesArr;
        }


        if (isset($metaboxesArr)) {
            //generate all the metaboxes
            add_action('add_meta_boxes', array($this, 'add_meta_box'));
            //save the metabox data
            add_action('save_post', array($this, 'save_metaBox_fields'), 10, 2);
        }
    }


    private function processArray($data)
    {
        $newArr = array();
        foreach ($data->menus as $key => $value) {
            foreach ($value->optArr->panels as $key2 => $value2) {


                switch ($value->type) {
                    case 1:
                        $type = 'post';
                        break;
                    case 2:
                        $type = 'page';
                        break;
                }
                $tempFields = array();
                foreach ($value2->fields as $tFKey => $tFValue) {
                    $tFValue = (array)$tFValue;
                    $tempFields[] = $tFValue;
                }
                $context = '';
                $priority = '';
                if (isset($value2->context)) {
                    $context = $value2->context;
                }
                if (isset($value2->priority)) {
                    $priority = $value2->priority;
                }

                $newArr[] = array(
                    'name' => $value2->name,
                    'label' => $value2->label,
                    'applyTo' => $type,
                    'callbackArgs' => array('fields'),
                    'fields' => $tempFields,
                    'context' => $context,
                    'priority' => $priority,
                );
            }
        }
        return $newArr;
    }


    public function add_meta_box()
    {
        $metaArr = $this->gametaboxesArr;

        $id = 'aga_';
        $title = 'Default Title';
        $callback = array($this, 'meta_callback_function');
        $applyTo = 'applyTo';
        $context = 'advanced';
        $priority = 'default';
        $callback_args = null;
        if (!empty($metaArr)) {

            foreach ($metaArr as $count => $box) {
                $context = $box['context'] ? $box['context'] : $context;
                $priority = $box['priority'] ? $box['priority'] : $priority;


                $id .= $count;
                if (isset($box['label'])) {
                    $title = $box['label'] ? $box['label'] : $title;
                }
                if (isset($box['applyTo'])) {
                    $applyTo = $box['applyTo'] ? $box['applyTo'] : 'post';
                }
                if (isset($box['priority'])) {
                    $priority = $box['priority'] ? $box['priority'] : 'default';
                }

                $callback_args = $box['callbackArgs'] ? array('name' => $box['name'], 'fields' => $box['fields']) : null;
                add_meta_box($id, $title, array($this, 'meta_callback_function'), $applyTo, $context, $priority, $callback_args);
            }
        }
    }

    public function save_metaBox_fields($post_id, $post)
    {
        $metaArr = $this->gametaboxesArr;
        foreach ($metaArr as $mboxKey => $mboxValue) {
            // $this->showArr($mboxValue);
            /* Verify the nonce before proceeding. */
            if (!isset($_POST['aga_nounce_' . $mboxValue['name']]) || !wp_verify_nonce($_POST['aga_nounce_' . $mboxValue['name']], basename(__FILE__))) {
                return $post_id;
            }
            /* Get the post type object. */
            $post_type = get_post_type_object($post->post_type);
            /* Check if the current user has permission to edit the post. */
            if (!current_user_can($post_type->cap->edit_post, $post_id)) {
                return $post_id;
            }
            foreach ($mboxValue['fields'] as $key => $field) {
                //field name
                $fieldName = 'agaMb_' . $mboxValue['name'] . $field['name'];
                // set the new value to a variable
                $new_meta_value = (isset($_POST[$fieldName]) ? $_POST[$fieldName] : '');
                // $this->showArr($value);
                # code...
                /* Get the meta key. */
                $meta_key = $fieldName;


                /* Get the meta value of the custom field key. */
                $meta_value = get_post_meta($post_id, $meta_key, true);

                /* If a new meta value was added and there was no previous value, add it. */
                if ($new_meta_value && '' == $meta_value) {
                    add_post_meta($post_id, $meta_key, $new_meta_value, true);
                } /* If the new meta value does not match the old value, update it. */
                elseif ($new_meta_value && $new_meta_value != $meta_value) {
                    update_post_meta($post_id, $meta_key, $new_meta_value);
                } /* If there is no new meta value but an old value exists, delete it. */
                elseif ('' == $new_meta_value && $meta_value) {
                    delete_post_meta($post_id, $meta_key, $meta_value);
                }
            }

        }

    }

    public function meta_callback_function($post, $args)
    {
        ?>
        <div class="container-fluid agaMb">
            <?php wp_nonce_field(basename(__FILE__), 'aga_nounce_' . $args['args']['name']);
            foreach ($args['args']['fields'] as $field => $val) {
                $this->generate_field($val, $args['args'], $post);
            }
            ?>
        </div>
        <?php
    }

    private function generate_field($field, $metabox, $post)
    {
        $fieldsC = new fieldsC();
        $args = array($field, $metabox, $post);
        $fieldsC->addMeta_field($args);
    }

    private function add_meta_fields($fieldsArr)
    {

    }


    private function showArr($arr, $exit = true)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        if ($exit) {
            exit;
        }
    }

}

Class GeneralFunctionality
{
    public function __construct()
    {
        // Hook for adding admin menus
        add_action('admin_menu', array($this, 'mt_add_pages'));
    }

    // action function for above hook
    public function mt_add_pages()
    {
        add_menu_page(__('Test Toplevel', 'menu-test'), __('Admin Generator Advanced', 'menu-test'), 'manage_options', 'mt-top-level-handle', array($this, 'mt_toplevel_page'));
    }

    // mt_settings_page() displays the page content for the Test settings submenu
    public function mt_toplevel_page()
    {
        $url = plugins_url();
        require_once(plugin_dir_path(__FILE__) . '../templates/main.php');
    }
}

class agaSettings
{
    private $metaboxesArr = '';
    private $go = false;

    function __construct($metaboxesArr)
    {
        $this->metaboxesArr = $metaboxesArr;


        $data = $metaboxesArr;
        if(!empty($data)){
            $pOT = $data->sTPOption;
            $plugin = $data->pTSelect;
            $path = $data->pTSelect;
            $pTActivated = false; //by default the theme/plugin is deactivated
            if($plugin!='0'){
                switch ($pOT) {
                    case 1:
                        //theme
                        $theme = wp_get_theme();
                        if ($path == $theme->get('TextDomain')) {
                            $pTActivated = true;
                        }
                        break;
                    case 2:
                        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
                        $pTActivated = is_plugin_active($path);
                        break;
                    default:
                        $pTActivated = true;
                        break;
                }
                if (!$pTActivated) {
                    //if theme/plugin is activated or null
                    add_action('admin_notices', array($this, 'aga_admin_notice__error'));
                    // Execute the other code
                }
                $this->go = $pTActivated;
            }else{
                $this->go = true;
            }
        }
    }

    public function greenLight()
    {
        return $this->go;
    }

    public function aga_admin_notice__error()
    {
        $data = $this->metaboxesArr;
        $pOT = $data->sTPOption;
        $plugin = $data->pTSelect;
        $sDescription = $data->sDescription;
        if ($plugin != '0' && !empty($pOT)) {


            $pTVal = '';
            switch ($pOT) {
                case 1:
                    //theme
                    $pTVal = 'theme';

                    $sPTName = $data->sPTArr->Name;
                    $sPTVersion = $data->sPTArr->Version;
                    $sPTLink = $data->sPTArr->ThemeURI;
                    break;
                case 2:
                    $pTVal = 'plugin';
                    //Specific Data
                    $sPTName = $data->sPTArr->Name;
                    $sPTLink = $data->sPTArr->PluginURI;
                    $sPTVersion = $data->sPTArr->Version;
                    break;
            }

            ?>
            <div class="notice notice-error">
                <h3><?php echo $sPTName . " " . $pTVal; ?></b> not activated. Error!!! </h3>
                <?php
                ?>
                <p>
                    <b> The <?php echo $sPTName; ?></b> <?php echo $pTVal; ?> version <?php echo $sPTVersion; ?> needs
                    to be
                    installed and activated in order
                    to access the full functionality available.
                </p>
                <p>
                    You can <b>get the <?php echo $pTVal; ?> from</b>: <a
                        href="<?php echo $sPTLink; ?>"><?php echo $sPTLink; ?></a>
                </p>
                <p>
                    This message will show until the problem is fixed.
                </p>
                <h4>More details about these settings:</h4>
                <p>
                    <?php echo $sDescription; ?>
                </p>
            </div>
            <?php
        }
    }
}

//initialize the class
if (is_admin()) {

    global $metaboxesArr;


    //Manage the Database Class
    class agaLoadDB
    {
        public function loadDB()
        {
            $data = get_option('agaData');
            $data = stripslashes($data);
            $data = json_decode($data);

            return $data;
        }

        public function saveDb($data)
        {

        }
    }

    // Load saved data from database
    $agaLoadDb = new agaLoadDB();
    $dataArr = $agaLoadDb->loadDB();

    //General Functionality
    new GeneralFunctionality();
    // Settings functionality
    $settC = new agaSettings($dataArr);

    //if everything is as it should be
    if ($settC->greenLight()) {
        //generate the metaboxes
        new agaMetaClass($dataArr);
    }


}
