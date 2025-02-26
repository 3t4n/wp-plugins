<?php

class Social_Parts_Public
{

    private $plugin_name;

    private $version;

    /**
     *
     * Social_Parts_Public constructor.
     *
     * @param $plugin_name
     * @param $version
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/social-parts-public.js', array(), $this->version, false);
    }

    /**
     * Insert domain id for ajax path
     */
    public function insert_script_data()
    {
        ?>
        <script language="javascript" type="text/javascript">
            const social_parts_api_url = '<?php echo SOCIAL_PARTS_API_URL ?>';
            const social_parts_domain_id = '<?php echo Social_Parts::get_domain_id() ?>';
        </script>
        <?php
    }

}