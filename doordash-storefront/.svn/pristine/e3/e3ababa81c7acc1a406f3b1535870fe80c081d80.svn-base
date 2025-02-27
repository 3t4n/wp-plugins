<?php
/**
 * Adds DoorDash widget.
 */
class DDSOO_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'DDSOO_widget', // Base ID
			esc_html__( 'Storefront by DoorDash', 'ddsoo' ), // Name
			array( 'description' => esc_html__( ' ', 'ddsoo' ), ) // Args
		);		
	}	
	
	public function widget( $args, $instance ) {
		
		echo $args['before_widget'];		
		
		if($instance['display'] == 'yes') {	
			require_once("mod/dd-generate.php");
			$generate=new DDSOO_mod_generate();
			$json=$generate->run();


            echo '<script>
            let obj = '.$json.'
            const colorWhite = "#ffffff"
            const colorBlack= "#000000"
            
            if(obj["buttonBackgroundColor"] === colorWhite) {
                obj["buttonTextColor"] = colorBlack
            } else {
                obj["buttonTextColor"] = colorWhite
            }
            
            if(obj["position"]) {
                let btnCoordinates = obj["position"].split("_")
                obj["position"] = btnCoordinates[0]
                obj["buttonAlignment"] = btnCoordinates[1]
            }
            console.log("obj", obj)

			!function(e,t,r,n){var o,c,s;o=e.document,c=t.children[0],s=o.createElement("script"),e.StorefrontSDKObject="StorefrontSDK",e[e.StorefrontSDKObject]={executeCommand:function(t,r){e[e.StorefrontSDKObject].buffer.push([t,r])},buffer:[]},s.async=1,s.src="https://web-apps.cdn4dd.com/webapps/sdk-storefront/latest/sdk.js",t.insertBefore(s,c)}(window,document.head);StorefrontSDK.executeCommand(\'renderFloatingButton\', obj)</script>';
        }

        echo $args['after_widget'];
    }
	
	public function form( $instance ) {		
		$display = ! empty( $instance['display'] ) ? $instance['display'] : esc_html__( 'yes', 'ddsoo' );		
		?>		
		<div id="_dd_advanced_content" style="">		
			<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'display' ) ); ?>">
			<?php esc_attr_e( 'Display Button:', 'ddsoo' ); ?>
		  </label>

			<select
			class="widefat"
			id="<?php echo esc_attr( $this->get_field_id( 'display' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'display' ) ); ?>">
			<option value="yes" <?php echo ($display == 'yes') ? 'selected' : ''; ?>>Yes</option>
			<option value="no" <?php echo ($display == 'no') ? 'selected' : ''; ?>>No</option>
		  </select>
			</p>		
		</div>
		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();		
		$instance['display'] = ( ! empty( $new_instance['display'] ) ) ? sanitize_text_field( $new_instance['display'] ) : '';
		return $instance;
	}

} 
