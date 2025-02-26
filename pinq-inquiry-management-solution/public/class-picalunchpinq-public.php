<?php
 
/**
 * The public-facing functionality of the plugin.
 *
 * @link       piclaunch.com/pinq
 * @since      1.0.0
 *
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/public
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Picalunchpinq_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->picalunchpinq_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Picalunchpinq_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Picalunchpinq_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/picalunchpinq-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Picalunchpinq_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Picalunchpinq_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/picalunchpinq-public.js', array( 'jquery' ), $this->version, false );

	}


	//pinq

// Method for code to show pop out widget
	 function pinq_code_snippet() {
 		 
 		   //Grab all options
        $options = get_option($this->plugin_name);

        // Cleanup
        $pinqID = $options['pinqID'];
        $pinqIDFrame = $options['pinqIDFrame'];
        $pageup = $options['pageup'];
      ?>

 		<script type="text/javascript" id="myscript" 
 		src="http://piclaunch.com/i/i2/embed.js" sid="<?php echo $this->picalunchpinq_options['pinqID']; ?>"> 
 		</script>

 		<script type="text/javascript"> function my<?php echo $this->plugin_name; ?>cpf() {    
   					var b1 = document.getElementById("cpf");
   					if (b1.className == "wrap-embed-contact-form"){
   					b1.className = b1.className.replace("wrap-embed-contact-form","").trim();   
   					b1.className = b1.className.replace("","wrap-embed-contact-form show-widget").trim();} 
   					else {
   						b1.className = "wrap-embed-contact-form";
   						}
					}
		</script>

 		<?php
			if(!empty($pageup ))
		{ 
			
			if (is_page($this->picalunchpinq_options['pinqIDFrame']))
			{
		     //echo 'I am on Contact US PAGE';
		     //echo  $this->picalunchpinq_options['pinqIDFrame'];
		 	}
		}
 		
	}

// Method for code to contact us form for Conatct us page
	 function pinq_code_snippet_frame($content) {
	 	
	 	$appendcontent = "";
	 	$precontent ="";
	 	$postcontent ="";
	 	$newcontent = "";
	 	$formJs ="";
	 	$formJs = '<script type="text/javascript"> function my' . $this->plugin_name .'cpf() {    
   					var b1 = document.getElementById("cpf");
   					if (b1.className == "wrap-embed-contact-form"){
   					b1.className = b1.className.replace("wrap-embed-contact-form","").trim();   
   					b1.className = b1.className.replace("","wrap-embed-contact-form show-widget").trim();} 
   					else {
   						b1.className = "wrap-embed-contact-form";
   						}
					}
					</script>';




	 	//Check if Flag show on PGAE is on
	 	if( !empty($this->picalunchpinq_options['pageup']) )
		{ 
			 
			 //Check if you are on the right page		
			if (is_page($this->picalunchpinq_options['pinqIDFrame']))
			{
		     $appendcontent.= '<iframe height="'.$this->picalunchpinq_options['pinqheight'].'" frameborder="0" src="http://piclaunch.com/i/i2/f.php?sid='.$this->picalunchpinq_options['pinqID'].'" width="'.$this->picalunchpinq_options['pinqwidth'].'" style="'.$this->picalunchpinq_options['pinqframeCSS'].'"></iframe>'; 

			//Content before from displayed 
				 if( !empty($this->picalunchpinq_options['precontent']) ){
				 	$precontent = $this->picalunchpinq_options['precontent'];

				 }
			//Content After from displayed 
				  if( !empty($this->picalunchpinq_options['postcontent']) ){
				  	$postcontent = $this->picalunchpinq_options['postcontent'];
				 }

				 $newcontent = '<div class="'.$this->picalunchpinq_options['pinqframeDivclassPre'].'">'.$precontent.'</div>'.
				 			   '<div class="'.$this->picalunchpinq_options['pinqframeDivclass'].'">'.$appendcontent.'</div>'.
				 			   '<div class="'.$this->picalunchpinq_options['pinqframeDivclassPost'].'">'.$postcontent .'</div>';


			//Retrun the value as set by user
				if( !empty($this->picalunchpinq_options['pageupbefore']) ){
				  return $newcontent.$content.$formJs;
				}else{
					return $content.$newcontent.$formJs ;
				}
		 	}		 	
		 	
		}

		return $content.$formJs ;		

	 }

 //End Method for page contact us


	 //Start method for shortcode


		 function  pilaunchpinq_register_shortcodes (){
		 	//Shortcode added for PINQ
			add_shortcode( 'contactPINQ',  array( $this, 'pinq_code_snippet_frame_shortcode_fn' ));

		 }

	 	 function  pinq_code_snippet_frame_shortcode_fn( $atts ) {	 	
	 	 	$appendcontent = "";
		 	$precontent ="";
		 	$postcontent ="";
		 	$newcontent = "";


	 	 $appendcontent.= '<iframe height="'.$this->picalunchpinq_options['pinqheight'].'" frameborder="0" src="http://piclaunch.com/i/i2/f.php?sid='.$this->picalunchpinq_options['pinqID'].'" width="'.$this->picalunchpinq_options['pinqwidth'].'" style="'.$this->picalunchpinq_options['pinqframeCSS'].'"></iframe>';  
	 	 			//Content before from displayed 
				 if( !empty($this->picalunchpinq_options['precontent']) ){
				 	$precontent = $this->picalunchpinq_options['precontent'];

				 }
			//Content After from displayed 
				  if( !empty($this->picalunchpinq_options['postcontent']) ){
				  	$postcontent = $this->picalunchpinq_options['postcontent'];
				 }
				 $newcontent = '<div class="'.$this->picalunchpinq_options['pinqframeDivclassPre'].'">'.$precontent.'</div>'.
				 			   '<div class="'.$this->picalunchpinq_options['pinqframeDivclass'].'">'.$appendcontent.'</div>'.
				 			   '<div class="'.$this->picalunchpinq_options['pinqframeDivclassPost'].'">'.$postcontent .'</div>';


			return $newcontent ;



	 	 }



	//pinq

}
