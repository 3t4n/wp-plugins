<?php
namespace UmpPayFast;

class Settings
{
    /**
     * Modify this array with your custom values
     * @var array
     */
    private $data = [

    										'lang_domain'				=> 'ultimate-membership-pro-payfast',
    										'slug'							=> 'ump_payfast',
    										'name'						  => 'PayFast',
    										'description'				=> 'Extend Ultimate Membership Pro systems with extra features and functionality',
                        'ump_min_version'		=> '10.10',
    ];
    /**
     * Initialized automaticly. don't edit this array
     * @var array
     */
    private $paths = [
                      'dir_path'					=> '',
                      'dir_url'						=> '',
                      'plugin_base_name'	=> '',
    ];

    /**
     * @param none
     * @return none
     */
    public function __construct()
    {
        $this->setPaths();
        add_filter( 'ihc_default_options_group_filter', [ $this, 'options' ], 1, 2 );
    }



  /**
    * @param array
    * @param string
    * @return array
    */
    public function options( $options=[], $type='' )
    {
        if ( $this->data['slug']== $type ){
                return [
                    'ump_payfast-enabled'         		    => 0,
                    'ump_payfast-merchant_id'        	    => 0,
                    'ump_payfast-merchant_key'     		    => 0,
                    'ump_payfast-sandbox'          		    => 1,
                    'ump_payfast-return_page'             => 0,
                    'ump_payfast-cancel_page'             => 0,
                    'ihc_ump_payfast_label'               => 'PayFast',
                    'ihc_ump_payfast_select_order'        => 10,
                    'ihc_ump_payfast_short_description'   => '',
                ];
        }
        return $options;
    }

    /**
     * @param none
     * @return none
     */
    public function setPaths()
    {
        $this->paths['dir_path'] = plugin_dir_path( __FILE__ );
        $this->paths['dir_path'] = str_replace( 'classes/', '', $this->paths['dir_path'] );

        $this->paths['dir_url'] = plugin_dir_url( __FILE__ );
        $this->paths['dir_url'] = str_replace( 'classes/', '', $this->paths['dir_url'] );

        $this->paths['plugin_base_name'] = dirname(plugin_basename( __FILE__ ));
        $this->paths['plugin_base_name'] = str_replace( 'classes', '', $this->paths['plugin_base_name'] );
    }

    /**
     * @param string
     * @return object
     */
    public function get()
    {
        return $this->data + $this->paths;
    }

    /**
     * @param none
     * @return string
     */
    public function getPluginSlug()
    {
        return $this->data['slug'];
    }
}
