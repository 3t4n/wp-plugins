<?php	
		
	/**	
	 * The admin-specific functionality of the plugin.	
	 *	
	 * @link       https://www.sizeguarantee.com/	
	 * @since      1.0.0	
	 *	
	 * @package    Size_Guarantee	
	 * @subpackage Size_Guarantee/admin	
	 */	
		
	/**	
	 * The admin-specific functionality of the plugin.	
	 *	
	 * Defines the plugin name, version, and two examples hooks for how to	
	 * enqueue the admin-specific stylesheet and JavaScript.	
	 *	
	 * @package    Size_Guarantee	
	 * @subpackage Size_Guarantee/admin	
	 * @author     Size Guarantee <support@sizeguarantee.com>	
	 */	
	class Size_Guarantee_Admin {	
		// prefix for options
		public $size_guarantee_prefix = 'size_guarantee_';
		public $size_guarantee_group = 'size_guarantee';
		/**	
		 * The ID of this plugin.	
		 *	
		 * @since    1.0.0	
		 * @access   private	
		 * @var      string    $plugin_name    The ID of this plugin.	
		 */	
		private $plugin_name;	
		
		/**	
		 * The version of this plugin.	
		 *	
		 * @since    1.0.0	
		 * @access   private	
		 * @var      string    $version    The current version of this plugin.	
		 */	
		private $version;	
		
		/**	
		 * Initialize the class and set its properties.	
		 *	
		 * @since    1.0.0	
		 * @param      string    $plugin_name       The name of this plugin.	
		 * @param      string    $version    The version of this plugin.	
		 */	
		public function __construct( $plugin_name, $version ) {	
		
			$this->plugin_name = $plugin_name;	
			$this->version = $version;	
		
		}	
		
		/**	
		 * Register the stylesheets for the admin area.	
		 *	
		 * @since    1.0.0	
		 */	
		public function enqueue_styles() {	
		
			/**	
			 * This function is provided for demonstration purposes only.	
			 *	
			 * An instance of this class should be passed to the run() function	
			 * defined in Size_Guarantee_Loader as all of the hooks are defined	
			 * in that particular class.	
			 *	
			 * The Size_Guarantee_Loader will then create the relationship	
			 * between the defined hooks and the functions defined in this	
			 * class.	
			 */	
		
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/size-guarantee-admin.css', array(), $this->version, 'all' );	
		
		}	
		
		/**	
		 * Register the JavaScript for the admin area.	
		 *	
		 * @since    1.0.0	
		 */	
		public function enqueue_scripts() {	
		
			/**	
			 * This function is provided for demonstration purposes only.	
			 *	
			 * An instance of this class should be passed to the run() function	
			 * defined in Size_Guarantee_Loader as all of the hooks are defined	
			 * in that particular class.	
			 *	
			 * The Size_Guarantee_Loader will then create the relationship	
			 * between the defined hooks and the functions defined in this	
			 * class.	
			 */	
		
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/size-guarantee-admin.js', array( 'jquery' ), $this->version, false );	
		
		}	
		
		/**
		 * [size_guarantee_PrepareLogo Prints logo  ]
		 * @param  []  
		 * @return [string]          
		 */
		public function size_guarantee_PrepareLogo(){	
			 return 'iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABBVBMVEUAAACysrKxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGysrKxsbG1tbXi4uLz8/P5+fn9/f3+/v6xsbG3t7fr6+v8/PzY2Nj6+vqxsbHl5eX+/v7+/v7////A6+G/6+D+/v7R8Onb8+3U8urq+PXf9e+A2MMju5ee4dEuvpwBsYdOyKve9O+W3s0Is4p41b/9/v5Jx6k0wJ/0+/q+6+DG7eRjz7XL7+YNtIzQ8Oj7/f0cuZMFsonS8emL28jK7uas5dcmvJgvv5xgzrQauJJ51sBezbPT8epy07yj4tOB2MPI7uWR3csBsIbt+fag4dIUtpCw5tk5wqHC7OLD7OL3/MNBAAAAH3RSTlMAAAACBAYKDA4WHiYqLhwsaKfT7/0YLIflVNkgcPf7pmQM4gAAAXtJREFUOMuFU2lDgkAQBReW5VAUFO8G0MpqM7Oyw+77vu3//5TEYJflQ8w3Zh/vzfFGkpKQkaJijRANqwqSpWzISCW6YVrFomUaOlEzkOi5ZJcrjlutuk6lbJdESAHhmldvAItG3athVODvmtFsgRCtpqElCBlp7U4XMtHttLVYBWGjs7RI+kHIEUsdA6MFgVprxv/7vf7yPFZijmZNjSgQ8RJ9fxVgsLbO6vAIighK9STj+yFs0E2mUi/NKRCxWX/+EGBrtM27tecUil5miaAH453dPV5oWVck1aiw70kQ7lN6wAEVQ5Ww6XDAEA4pPeK9OiaWNMvlElM4PqGnY5ZwLU0ixSpnOAvhnI64RLVIRMBFCJf0SgSkJSZTgGt6A4JEpki4pXccEBWZaRPu6UBsUxjUA8AjfRIHlR510Ad4pi/iqNPLiiRe397FZaXXHRX58ckG+bdu0TAAX9/MdLFhUpab/YQwS3bFLJdv2lzb5x9O/unlH+8/5/8LJ7NbUCHpr0wAAAAASUVORK5CYII=';	
		}	
		
		/**
		 * [size_guarantee_settings_page For adding Menu in Wordpress admin dashboard ]
		 * @param  []  
		 * @return []          
		 */
	    public function size_guarantee_settings_page()	
	    {	
		
	        // add new menu in dashboard	
	        add_menu_page(	
	            "Size Guarantee",	
	            "Size Guarantee",	
	            "manage_options",	
	            $this->size_guarantee_group,	
	            array($this, 'size_guarantee_option_page'),	
	            'dashicons-universal-access-alt',	
	            58	
	        );       	
		
	         register_setting(	
	            $this->size_guarantee_prefix.'group', // Option group	
	            $this->size_guarantee_group, // Option name	
	            array( $this, 'sanitize' ) // Sanitize	
	        );	
		
	        add_settings_section(	
	            'setting_section_id', // ID	
	            '', // Title	
	            array( $this, 'print_section_info' ), // Callback	
	            'size-guarantee-setting-admin' // Page	
		
	        );
			add_settings_field(	
			$this->size_guarantee_prefix.'api_key', // Hash	
			'Size Guarantee API Key ', // Title 	
			array( $this, 'size_guarantee_settings_api_key' ), // Callback	
			'size-guarantee-setting-admin', // Page	
			'setting_section_id' // Section           	
			); 	
		
	        $connect = $this->SizeGuaranteeAPIKeyValidation();	
	         if($connect==1){	
		
		
				
	            add_settings_field(	
	                $this->size_guarantee_prefix.'store_status', // Hash	
	               'Size Guarantee Status ', // Title 	
	                array( $this, 'sizeGuaranteeStoreStatusCallback' ), // Callback	
	                'size-guarantee-setting-admin', // Page	
	                'setting_section_id' // Section           	
	            );    	
		
	            add_settings_field(	
	                $this->size_guarantee_prefix.'style', 	
	                'Size button placement', 	
	                array( $this, 'style_callback' ), 	
	                'size-guarantee-setting-admin', 	
	                'setting_section_id'	
	            );  	
		
	            add_settings_field(  	
				    $this->size_guarantee_prefix.'enable',  	
				    'Enable / Disable plugin',  	
				    array( $this, 'Enable_element_callback' ),	
				  'size-guarantee-setting-admin', 	
	                'setting_section_id'	
	            );	
	        }	
		
		
	    }	
		
	   	/**
		 * [size_guarantee_option_page Function to display the options when API key validated]
		 * @param  [] 
		 * @return []          [description]
		 */
	    public function size_guarantee_option_page(){	

	    	$this->options = get_option( $this->size_guarantee_group );		    		    	
	    	$size_cs_key=get_option($this->size_guarantee_prefix.'cs_key','');	
	    	$size_cs_secret=get_option($this->size_guarantee_prefix.'cs_secret','');


		    //Woocommerce status	
	        $WCvalidation=class_exists( 'woocommerce' );    
 			$size_guarantee_getApiKey=$this->size_guarantee_get_api_key();
		       	
	        if($WCvalidation):	
	        		
	        	?>
		
	            <div class="size_guarantee_section">	
	            
	                <br>	
	                <img class="size_guarantee_logo" loading="lazy" src="<?php echo SIZE_GUARANTEE_PLUGIN_PATH.'media/size_guarantee_logo.png'?>" alt='Size Guarantee'>	
		
	                <?php if($size_guarantee_getApiKey): ?>	
	                		<form method="post" action="options.php"> 	

		                    	<?php	
		                    	
		                        // This prints out all hidden setting fields	
		                        settings_fields( $this->size_guarantee_prefix.'group' );	
		                        do_settings_sections( 'size-guarantee-setting-admin' );	
								$connect = $this->SizeGuaranteeAPIKeyValidation();	
							    if($connect==1){?>	
			                        <p class="submit">	
									    <input type="submit" 	
									           name="submit" 	
									           id="submit" 	
									           class="button size_guarantee-store-setting-submit" 	
									           value="Save Setting">	
									</p>	
		
								<?php } ?>	
	                    	</form>                	
	                <?php endif; 
						$class = 'notice notice-info is-dismissible size_guarantee_notice_woocommerce ';
						$message = __( 'Size Guarantee plugin automatically generates woocommerce rest api key secret for integration', 'size-guarantee' );
						printf( '<div class="%1$s"><p><b>Note :</b>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
					?>	
					<!-- <p class="size_guarantee_note"> Note : Size Guarantee plugin automatically generates woocommerce rest api key secret for integration</p> -->
	            </div>	
	        <?php else: ?>	
	            <h3 class="alert alert-danger"> Please install woocommerece and activate</h3>	
	        <?php endif;	
	    }	
		/**
		 * [size_guarantee_get_api_key This function is to return true ]
		 * @param  [] 
		 * @return [boolean]   true       [description]
		 */
		
	    public function size_guarantee_get_api_key(){	
	    	return true;	
	    }	
		/**
		 * [size_guarantee_generate_woo_key_sec Generates API key ]
		 * @param  [] 
		 * @return []          
		 */
		
	    public function size_guarantee_generate_woo_key_sec(){	
		
	    	      $size_cs_key=get_option($this->size_guarantee_prefix.'cs_key');	
	    	      $size_cs_secret=get_option($this->size_guarantee_prefix.'cs_secret');	
		
		
				if(empty($size_cs_key) && empty($size_cs_secret)){	
					global $wpdb;	
		
	    			$apiTable = $wpdb->prefix . 'woocommerce_api_keys';	
	    			$user_id= get_current_user_id();	
		
	    			$querystr = "SELECT * FROM $apiTable WHERE $apiTable.user_id = $user_id AND $apiTable.description LIKE '%size%' AND $apiTable.permissions = 'read'";	
		
	    			$getAllkeys = $wpdb->get_results($querystr, OBJECT);	
		
					$consumer_key    = 'ck_' . wc_rand_hash();	
		
					if($getAllkeys){	 //delete exist key
						$getAllkeys= $getAllkeys[0];	
						$key_id=$getAllkeys->key_id;

						$wpdb->delete( $apiTable, array( 'id' => $key_id ));	
					}	
		
		
						$consumer_secret = 'cs_' . wc_rand_hash();	
						
						$data = array(	
							'user_id'         => $user_id,	
							'description'     => 'For Size guarantee to analyze the products , Only with read permission to give a perfect size for your product',	
							'permissions'     => 'read',	
							'consumer_key'    => wc_api_hash( $consumer_key ),	
							'consumer_secret' => $consumer_secret,	
							'truncated_key'   => substr( $consumer_key, -7 ),	
						);	
		
		
						$wpdb->insert(	
							$wpdb->prefix . 'woocommerce_api_keys',	
							$data,	
							array(	
								'%d',	
								'%s',	
								'%s',	
								'%s',	
								'%s',	
								'%s',	
							)	
						);		
					
		
					update_option($this->size_guarantee_prefix.'cs_key',$consumer_key);	
					update_option($this->size_guarantee_prefix.'cs_secret',$consumer_secret);	
				}  				
		    }	
		
		
			/**
			 * [size_guarantee_validate_api_key Validates API key ]
			 * @param  [] 
			 * @return []          
			 */
		
		public function size_guarantee_validate_api_key()	
		{	
			$apikey = sanitize_text_field(trim($_POST['api_key']));
		    $size_guarantee_generate_woo_key_sec=$this->size_guarantee_generate_woo_key_sec(); 		//generate woo API key
			$shop = site_url();

			$size_cs_key=get_option($this->size_guarantee_prefix.'cs_key');	
	    	$size_cs_secret=get_option($this->size_guarantee_prefix.'cs_secret');

			$body = array('apiKey' => $apikey,'shop'=>$shop,'woo_key'=>$size_cs_key,'woo_sec'=>$size_cs_secret);	
			$body = wp_json_encode( $body );	
			 	
			$options = [	
			    'body'        => $body,	
			    'headers'     => [	
			        'Content-Type' => 'application/json',	
			    ],	
			    'timeout'     => 60,	
			    'redirection' => 5,	
			    'blocking'    => true,	
			    'httpversion' => '1.0',	
			    'sslverify'   => false,	
			    'data_format' => 'body',	
			];	
			$sendPost= wp_remote_post( SIZE_GUARANTEE_API_BASE_URL.'/vaidate/apikey', $options );	
		    $responceData = json_decode(wp_remote_retrieve_body( $sendPost ) );	
		    $success=false;	
		    $message='';	
		    $data='';	
		
		    if($responceData){	
		    	if(!$responceData->success){	    			
		    		update_option($this->size_guarantee_prefix.'connect',0);	
		    		$success=false;	
		    		$message=(isset($responceData->message)) ? $responceData->message : '';	
		    		$data=(isset($responceData->data->api_store_id)) ? $responceData->data->api_store_id : '';	

		
		    	}else{	
		
		    		update_option($this->size_guarantee_prefix.'connect',1);	
		    		update_option($this->size_guarantee_prefix.'api_key',$apikey);	
		
		    		$size_guarantee_options = get_option($this->size_guarantee_group ,'' );  	
	        			
	        		$size_guarantee_options[$this->size_guarantee_prefix.'api_key']=$apikey;

			        update_option($this->size_guarantee_group,$size_guarantee_options);	
		
		    		$success=true;	
		    		$message=(isset($responceData->message)) ? $responceData->message : '';	
		    		$data=(isset($responceData->data->api_store_id)) ? $responceData->data->api_store_id : '';	
		
		    		if($data){	
		    			update_option($this->size_guarantee_prefix.'store_id',$data);	
		    		}	
		    	}	
		    }	
		
			$response = array('success'=>$success,'message'=>$message,'data'=>$data);	
			
			echo json_encode($response);	
			wp_die();	
				
		}	
		/**
		 * [size_guarantee_post_to_console Validates API key ]
		 * @param  [INTEGER] [ARRAY]  
		 * @return [boolean]          
		 */
		
		public function size_guarantee_post_to_console($endpoint, $body){	
			 	
			$body = wp_json_encode( $body );	
			 	
			$options = [	
			    'body'        => $body,	
			    'headers'     => [	
			        'Content-Type' => 'application/json',	
			        //TODO: Client Token 'Client-Type' => 'application/json',	
			    ],	
			    'timeout'     => 60,	
			    'redirection' => 5,	
			    'blocking'    => true,	
			    'httpversion' => '1.0',	
			    'sslverify'   => false,	
			    'data_format' => 'body',	
			];	
			 	
			$sendPost= wp_remote_post( $endpoint, $options );	
		
		    $responceData = json_decode(wp_remote_retrieve_body( $sendPost ) );	
		
		   	
			   if(isset($responceData->success) && $responceData->success==false){	
			    $getResponceData = $responceData->data;	
			    return $getResponceData;	
		
			   }else{	
			     return false;	
			   }	
		}	
		
		
		
		/**	
	     * Sanitize each setting field as needed	
	     *	
	     * @param array $input Contains all settings fields as array keys	
	     */	
	    public function sanitize( $input )	
	    {	
	        $new_input = array();        	
		
	        if( isset( $input[$this->size_guarantee_prefix.'style'] ) )	
	            $new_input[$this->size_guarantee_prefix.'style'] = sanitize_text_field( $input[$this->size_guarantee_prefix.'style'] );	
		
	        if( isset( $input[$this->size_guarantee_prefix.'api_key'] ) )	
	            $new_input[$this->size_guarantee_prefix.'api_key'] = sanitize_text_field( $input[$this->size_guarantee_prefix.'api_key'] );	
		
	        if( isset( $input[$this->size_guarantee_prefix.'enable'] ) )	
	            $new_input[$this->size_guarantee_prefix.'enable'] = sanitize_text_field( $input[$this->size_guarantee_prefix.'enable'] );	
		
		
	        return $new_input;	
	    }	
		
	    /**
		 * [print_section_info Prints info of the sections ]
		 * @param  []  
		 * @return []          
		 */
	    public function print_section_info()	
	    {	

	    }	
		
		/**
		 * [sizeGuaranteeStoreStatusCallback Prints the status of the store connection ]
		 * @param  []  
		 * @return []          
		 */
	    public function sizeGuaranteeStoreStatusCallback()	
	    {	
	         $connect = get_option($this->size_guarantee_prefix.'connect');
			 	
	         if($connect==1){	
	            echo '<a class="button" id="size_gurantee_success_btn" >Store connected</a>';	
	         }else{	
		
	            echo '<a class="button" id="size_gurantee_error_btn">Store Not connected</a>';	
	         }	
	        	
	    }	
		
	    /*** 	
	        * To set the button placement 	
	        	
	        * Hooks are	
		
	            * woocommerce_before_add_to_cart_form	
	            * woocommerce_before_variations_form	
	            * woocommerce_before_add_to_cart_button	
	            * woocommerce_before_add_to_cart_quantity	
	            * woocommerce_after_add_to_cart_quantity	
	            * woocommerce_after_add_to_cart_button	
	            * woocommerce_after_add_to_cart_form	
		
	        refer : https://www.businessbloomer.com/woocommerce-visual-hook-guide-single-product-page/	
	        *	
	        *	
	    ***/
		/**
		 * [style_callback Prints the style of section  ]
		 * @param  []  
		 * @return []          
		 */	
		 public function style_callback() {	
	        $productPageHooks=[	
	            'Before Add to cart form',	
	            'Before variations form',	
	            'Before Add to cart Button',	
	            'Before Add to cart quantity',	
	            'After Add to cart quantity',	
	            'After Add to cart Button',	
	            'After Add to cart form'	
	        ];	
	         // Set class property	
	        $this->options = get_option( $this->size_guarantee_group );	
	        $selected = isset($this->options[$this->size_guarantee_prefix.'style'] ) ? $this->options[$this->size_guarantee_prefix.'style'] : 1 ;  	
	        $i=0; ?>	
	        <select name="size_guarantee[size_guarantee_style]" id="size_guarantee_style">	
	            <?php            	
	            foreach( $productPageHooks as $hook ) { ?>	
	                <option value="<?php echo $i; ?>" <?php echo $selected == $i ? 'selected' : ''  ?> > <?php echo $hook; ?></option>	
	            <?php $i++ ;} ?>           	
		
		
	        </select> 	
		
		
	        <?php	
		}	


		/**
		 * [size_guarantee_settings_api_key Prints info when API key is validating ]
		 * @param  []  
		 * @return []          
		 */
	    public function size_guarantee_settings_api_key(){	
	        $this->options = get_option( $this->size_guarantee_prefix.'api_key' ,'' ); 	
		
	        $apiKey=isset($this->options) ? $this->options : '';	
	         printf('<input type="password" id="size_guarantee_api_key" name="size_guarantee[size_guarantee_api_key]" value="'.$apiKey . '" />');	
		
	         // if($this->SizeGuaranteeAPIKeyValidation )	
	        printf('<a class="button" id="apiValidation" > Validate </a>  	
		
	        	<div class="connectionLoader">	
	                                <p>Please wait entered API key validating with size guarantee</p><div class="size_guarantee_loader"></div> 	
	                            </div>	
		
	                            ');	
	        printf('<div id="validationMsg"></div>	
		
	        	');	
		
	        printf('<br>Enter Your API key to connect Size Gurantee ,<br> Find your API Key Here <a href="console-dev.sizeinterface.com/" target="_blank">Size Gurantee</a>');	
	    }   	
		
		/**
		 * [Enable_element_callback Prints the options for Enabled/Disables Field ]
		 * @param  []  
		 * @return []          
		 */
		public function Enable_element_callback() {	
	     	
	         $productPageHooks=[	
	            'Enabled',	
	            'Disabled'	
	        	
	        ];	
	         // Set class property	
	        $this->options = get_option( $this->size_guarantee_group );	
		
	      	
		
	        $selected = isset($this->options[$this->size_guarantee_prefix.'enable'] ) ? $this->options[$this->size_guarantee_prefix.'enable'] : '' ; ?>	
		
	        <select name="size_guarantee[size_guarantee_enable]" id="size_guarantee_enable">	
	            <option value="1" <?php if ($selected == 1) echo "selected" ?> > Enabled</option> 	
	            <option value="0"  <?php if ($selected == 0 ) echo "selected"  ?>> Disabled</option>	
	        </select>	
		
		
	        <?php	
	    }	
		
	    /**
		 * [title_callback Prints TITLE of the sections ]
		 * @param  []  
		 * @return []          
		 */	
	    public function title_callback()	
	    {	
	        printf(	
	            '<input type="text" id="title" name="size_guarantee[title]" value="%s" />',	
	            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''	
	        );	
	    }	
				
		/**
		 * [SizeGuaranteeAPIKeyValidation SizeGuarantee API Key Validation Daily once	 ]
		 * @param  []  
		 * @return []          
		 */
	    function SizeGuaranteeAPIKeyValidation(){	
	        // TODO store id validations	
	        $connect = get_option( $this->size_guarantee_prefix.'connect',0 );	
	        if($connect==1){	
	            return true;	
	        }else{	
	            return false;	
	        }	
	    } 	

	   
	}	
