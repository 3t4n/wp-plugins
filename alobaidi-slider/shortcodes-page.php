<?php

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	
	function alobaidi_slider_shortocodes() {
		add_plugins_page( 'Alobaidi Slider Shortcodes', 'Alobaidi Slider', 'update_core', 'alobaidi_slider_shortocodes', 'alobaidi_slider_shortocodes_page');
	}
	add_action( 'admin_menu', 'alobaidi_slider_shortocodes' );
		
	function alobaidi_slider_shortocodes_page(){ // shortcodes page function
		
		?>
			<div class="wrap">
				<h2>Alobaidi Slider Shortcodes</h2>
            	<form>
                	<table class="form-table">
                		<tbody>
 
                    		<tr>
                        		<th scope="row"><label for="alobaidi_slider">Usage</label></th>
                            	<td>
                                    <textarea id="alobaidi_slider" rows="10" cols="50" class="large-text code" style="white-space:nowrap !important; height:977px;">
### Shortcodes

1. Usage:
[alobaidislider_w]
[alobaidislider_c url=""]
[/alobaidislider_w]


### [alobaidislider_w] Attributes

1. auto="" enter "true" to activate auto slider, for example: auto="true" default is false (not required).
2. time="" enter value for auto slider time (seconds) for example for 6 seconds: time="6" default is 3 seconds (not required).
3. move="" enter animation effect for auto slider, Right or Left effect, for example: move="Left" default is Right (not required).
4. width="enter custom width size, numbers only, for example: 400" (not required).
5. height="enter custom height size, numbers only, for example: 400" (not required).
6. margin_bottom="enter custom margin bottom size, numbers only, example: 15" (not required).


### [alobaidislider_c] Attributes

1. url="here add image link, or youtube video, or vimeo video, or keek video, or instagram image" (required).
2. before_img="here add link for your image, for example add your post link or any link" (not required).
3. cap="your text caption" (not required).
4. before_cap="here add link for your caption, for example add your post link or any link" (not required).


### Example for standard slider

[alobaidislider_w]
[alobaidislider_c url="http://your-website.com/my-image-1.jpg" cap="Hello World"]
[alobaidislider_c url="http://www.youtube.com/watch?v=21It5oDzYZw"]
[alobaidislider_c url="http://your-website.com/my-image-2.png"]
[alobaidislider_c url="http://vimeo.com/106835400"]
[alobaidislider_c url="https://instagram.com/p/8VTrdOgBOy/"]
[alobaidislider_c url="https://www.keek.com/keek/ASU8dab"]
[/alobaidislider_w]


### Example for autoplay

[alobaidislider_w auto="true" time="5"]
[alobaidislider_c url="http://your-website.com/my-image-1.jpg" cap="Hello World"]
[alobaidislider_c url="http://www.youtube.com/watch?v=21It5oDzYZw"]
[alobaidislider_c url="http://your-website.com/my-image-2.png"]
[alobaidislider_c url="http://vimeo.com/106835400"]
[alobaidislider_c url="https://instagram.com/p/8VTrdOgBOy/"]
[alobaidislider_c url="https://www.keek.com/keek/ASU8dab"]
[/alobaidislider_w]
									</textarea>
								</td>
                        	</tr>
                            
                    	</tbody>
                    </table>
                </form>
            	<div class="tool-box">
					<h3 class="title">Recommended Links</h3>
					<p>Get collection of 87 WordPress themes for $69 only, a lot of features and free support! <a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Get it now</a>.</p>
					<p>See also:</p>
						<ul>
							<li><a href="http://j.mp/CM_WPTime" target="_blank">Premium WordPress themes on CreativeMarket.</a></li>
							<li><a href="http://j.mp/TF_WPTime" target="_blank">Premium WordPress themes on Themeforest.</a></li>
							<li><a href="http://j.mp/CC_WPTime" target="_blank">Premium WordPress plugins on Codecanyon.</a></li>
						</ul>
					<p><a href="http://j.mp/ET_WPTime_ref_pl" target="_blank"><img src="<?php echo plugins_url( '/banner/570x100.jpg', __FILE__ ); ?>"></a></p>
				</div>
            </div>
        <?php
	} // shortcodes page function
	
?>