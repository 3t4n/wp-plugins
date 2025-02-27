<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
* Trait: Common Functions
*/
trait Hmls_Common
{
    protected $data;

    protected function hmls_admin_sidebar() {
        ?>
		<div class="hmls-admin-sidebar" style="width: 20%; float: left;">
			<div class="postbox pro-features">
				<h3 class="hndle"><span>Pro Features</span></h3>
				<div class="inside centered">
					<ul>
						<li>&#10003; Slider Height Option</li>
						<li>&#10003; Slider Logo Gap Option</li>
						<li>&#10003; Slider Logo Height Option</li>
						<li>&#10003; Slider Background Color Option</li>
						<li>&#10003; Slider Border Radius Option</li>
						<li>&#10003; Slider Display Tooltip Option</li>
						<li>&#10003; Slider Arrow Color Change</li>
						<li>&#10003; Slider Dots Color Change</li>
						<li>&#10003; Display tooltip for Grid Layout</li>
						<li>&#10003; Logo gap in Grid layout</li>
						<li>&#10003; Zoom in on hover option (Grid)</li>
						<li>&#10003; Grid template: Zoom In</li>
						<li>&#10003; Grid template: Image over link/url</li>
						<li>&#10003; Grid template: Display only logo</li>
						<li>&#10003; Grid template: Display only Grayscale</li>
						<li>&#10003; Grid template: Gray to Color</li>
						<li>&#10003; Grid template: Color to Gray</li>
						<li>&#10003; Grid template: With Category</li>
						<li>&#10003; Grid template: With Title</li>
						<li>&#10003; Grid template: With Title & Description</li>
						<li>&#10003; Grid container border radius option</li>
						<li>&#10003; Grid logo border width, color, radius option</li>
						<li>&#10003; Grid logo background color option</li>
						<li>&#10003; Logo external image url option</li>
						<li>&#10003; Display Grid Template WIth Shortcode</li>
					</ul>
					<?php 
        ?>
						<p style="margin-bottom: 1px! important;"><a href="https://coolauthorbox.hmplugin.com/" target="_blank" class="button button-primary hmls-button" style="background: #F5653E;">Upgrade Now!</a></p>
						<?php 
        ?>
				</div>
			</div>
			<div class="postbox">
				<h3 class="hndle"><span>Support / Bug / Customization</span></h3>
				<div class="inside centered">
					<p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
					<p style="margin-bottom: 1px! important;"><a href="https://logo.hmplugin.com/" target="_blank" class="button button-primary hmls-button">Get Support</a></p>
				</div>
			</div>
			<div class="postbox">
				<h3 class="hndle"><span>Live Chat / More Info</span></h3>
				<div class="inside centered">
					<p>For more info, professional version and live chat, knock us directly via our live chat channel.</p>
					<p style="margin-bottom: 1px! important;"><a href="https://logo.hmplugin.com/" target="_blank" class="button button-primary hmls-button">Get Support</a></p>
				</div>
			</div>
			<?php 
        ?>
				<div class="postbox">
					<h3 class="hndle"><span>Buy us a coffee</span></h3>
					<div class="inside centered">
						<p>If you like the plugin, would you like to support the advancement of this plugin?</p>
						<p style="margin-bottom: 1px! important;"><a href='https://www.paypal.me/mhmrajib' class="button button-primary hmls-button" target="_blank">Donate</a></p>
					</div>
				</div>
				<?php 
        ?>
			<div class="postbox">
				<h3 class="hndle"><span>Join HM Plugin</span></h3>
                <div class="inside centered">
                    <p style="margin-bottom: 1px! important;">
						<a href='https://wwww.facebook.com/hmplugin' class="button button-info" target="_blank">Join facebook<span class="dashicons dashicons-facebook" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
					</p>	
					<p style="margin-bottom: 1px! important;">	
						<a href="https://twitter.com/hmplugin" target="_blank" class="button button-secondary">Follow @hmplugin<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
					</p>
				</div>
			</div>
		</div> 
		<?php 
    }

    protected function build_set_settings_options( $fields, $post ) {
        $this->data = [];
        $i = 0;
        foreach ( $fields as $field => $value ) {
            if ( 'string' === $fields[$i]['type'] ) {
                $this->data[$fields[$i]['name']] = ( isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_STRING ) ? $post[$fields[$i]['name']] : $fields[$i]['default'] );
            }
            if ( 'number' === $fields[$i]['type'] ) {
                $this->data[$fields[$i]['name']] = ( isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_NUMBER_INT ) ? $post[$fields[$i]['name']] : $fields[$i]['default'] );
            }
            if ( 'boolean' === $fields[$i]['type'] ) {
                $this->data[$fields[$i]['name']] = ( isset( $post[$fields[$i]['name']] ) ? $post[$fields[$i]['name']] : $fields[$i]['default'] );
            }
            if ( 'text' === $this->fields[$i]['type'] ) {
                $this->data[$this->fields[$i]['name']] = ( isset( $post[$this->fields[$i]['name']] ) ? sanitize_text_field( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'] );
            }
            $i++;
        }
        return $this->data;
    }

    protected function build_get_settings_options( $fields, $settings ) {
        $this->data = [];
        $i = 0;
        foreach ( $fields as $option => $value ) {
            $this->data[$fields[$i]['name']] = ( isset( $settings[$fields[$i]['name']] ) ? $settings[$fields[$i]['name']] : $fields[$i]['default'] );
            $i++;
        }
        return $this->data;
    }

}