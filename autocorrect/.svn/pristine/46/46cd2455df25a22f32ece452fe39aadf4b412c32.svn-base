<?php

class AutocorrectSettings {

    protected $option_name = 'Autocorrect-Settings';
    protected $data = 'wordpresss=wordpress';

    public function __construct() {

        add_action('init', array($this, 'init'));



        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_menu', array($this, 'add_page'));

        register_activation_hook(AUTOCORRECTPLUGIN_FILE, array($this, 'activate'));

        register_deactivation_hook(AUTOCORRECTPLUGIN_FILE, array($this, 'deactivate'));
    }

    public function activate() {
        update_option($this->option_name, $this->data);
    }

    public function deactivate() {
        delete_option($this->option_name);
    }

    public function init() {

        $result = get_option('Autocorrect-Settings');
    }

    public function admin_init() {
        register_setting('Autocorrect-Settings', $this->option_name);
    }

    public function add_page() {
        $my_page = add_menu_page('Autocorrect Settings', 'Autorrectsettings', 'manage_options', 'Autocorrect22', array($this, 'options_autocorrect_page'));
        add_action('load-' . $my_page, array($this, 'load_admin_jssc'));
    }

    function load_admin_jssc() {
        // Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_js'));
    }

    function enqueue_admin_js() {
        // Isn't it nice to use dependencies and the already registered core js files?
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-effects-hightlight');
        wp_enqueue_script('jquery');

        wp_enqueue_script('autocorrect-script', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid.js', array('jquery'), '', true);
        wp_enqueue_script('autocorrect-script1', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid_charts.js', array('jquery'), '', true);
        wp_enqueue_script('autocorrect-script2', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid_charts_ofc.js', array('jquery'), '', true);
        wp_enqueue_script('autocorrect-script3', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid_editors.js', array('jquery'), '', true);
        wp_enqueue_script('autocorrect-script4', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid_renderers.js', array('jquery'), '', true);
        wp_enqueue_script('autocorrect-script5', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid_validators.js', array('jquery'), '', true);
        wp_enqueue_script('autocorrect-script6', plugin_dir_url(__FILE__) . '/includes/editablegrid/editablegrid_utils.js', array('jquery'), '', true);

        wp_enqueue_script('autocorrect-script7', plugin_dir_url(__FILE__) . '/js/strt1.js', array('jquery'), '', true);
        wp_enqueue_style('autocorrect-style', plugin_dir_url(__FILE__) . '/css/editablegrid.css');
    }

    public function options_autocorrect_page() {
        $options = get_option($this->option_name);
        ?>

        <div style="text-align:center;background:azure"><h2 style="color:red">Autocorrect Options</h2></div>
        <div id="tablecontent"></div>
        <form  action="options.php" method="post" id="frm" >

        <?php settings_fields($this->option_name); ?>
            <div style="text-align:center">

                <button id="b2" style="background:#CED8F6">Add New</button>
                <div  id="d1">Typed:<input type="text"  onchange="return false;"    id="typedt"  />
                    Replaced:<input type="text"  onchange="return false;"  id="replacedt"  />
                    <Button id="b3" style="background:#CED8F6">Add</button><Button id="cncl"  style="background:#CED8F6">Cancel</button>
                </div>	 
            </div>
            <input type="hidden" onchange="document.getElementById('frm').submit();"  name="<?php echo $this->option_name ?>" value="<?php echo $options; ?>"  style="width:100%"  id="submt" readonly />
            <br>
            <button onclick="document.getElementById('frm').submit();" style="background:#CED8F6">Submit</button> 

        </form>

        <?php
    }

    public function validate($input) {
        // var_dump($input);
        // $valid = array();
        // $valid['pairs'] = $input['pairs'];
        //return true;
    }

}
