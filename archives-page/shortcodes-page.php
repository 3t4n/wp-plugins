<?php

	function WPTime_archives_page_shortocodes() {
		add_plugins_page( 'Archives Page Shortcodes', 'Archives Page', 'update_core', 'WPTime_archives_page_shortocodes', 'WPTime_archives_page_shortocodes_page' );
	}
	add_action( 'admin_menu', 'WPTime_archives_page_shortocodes' );
		
	function WPTime_archives_page_shortocodes_page(){ // shortcodes page function
		?>
			<div class="wrap">
				<h2>Archives Page Shortcodes</h2>
            	<form>
                	<table class="form-table">
                		<tbody>
 
                    		<tr>
                        		<th scope="row"><label for="wptime-shortcodes-page">Shortcodes</label></th>
                            	<td>
                                    <textarea id="wptime-shortcodes-page" rows="5" cols="30" style="width:839px; height:1097px; white-space:nowrap;">
### Shortcodes:

1. [daily__archive] shortcode to display daily archive.

2. [monthly__archive] shortcode to display monthly archive.

3. [yearly__archive] shortcode to display yearly archive.

4. [latest__posts] shortcode to display latest posts.

5. [get__cats] shortcode to display categories.

6. [get__tags] shortcode to display tags.

7. [get__pages] shortcode to display pages list.

8. [get__authors] shortcode to display authors list.



### Shortcodes Attributes:

1. number="" (number of list, example: number="3" will be display 3 latest posts or 3 tags .. etc, see default number in default usage section).

2. heading="" (heading of title, example: heading="h1" default is h3).

3. list="" (list type, example: list="ol" default is ul).

4. title="" (title of list, example: title="Recent Posts" enter title using your language).


### Default Usage

[daily__archive] // default number is no limited.
[monthly__archive] // default number is no limited.
[yearly__archive] // default number is no limited.
[latest__posts] // default number is 10 posts.
[get__cats] // default number is no limited.
[get__tags] // default number is 10 tags.
[get__pages] // default number is no limited.
[get__authors] // default number is no limited.


### Custom Usage
[daily__archive number="7" heading="h5" list="ol" title="Archive By Day"]
[monthly__archive number="12" heading="h5" list="ol" title="Archive By Month"]
[yearly__archive number="10" heading="h5" list="ol" title="Archive By Year"]
[latest__posts number="5" heading="h5" list="ol" title="Recent Posts"]
[get__cats number="6" heading="h5" list="ol" title="Our Categories"]
[get__tags number="8" heading="h5" list="ol" title="Tags List"]
[get__pages number="9" heading="h5" list="ol" title="Our Pages"]
[get__authors number="15" heading="h5" list="ol" title="Our Authors"]
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
							<li><a href="http://j.mp/GL_WPTime" target="_blank">Must Have Awesome Plugins.</a></li>
							<li><a href="http://j.mp/CM_WPTime" target="_blank">Premium WordPress themes on CreativeMarket.</a></li>
							<li><a href="http://j.mp/TF_WPTime" target="_blank">Premium WordPress themes on Themeforest.</a></li>
							<li><a href="http://j.mp/CC_WPTime" target="_blank">Premium WordPress plugins on Codecanyon.</a></li>
							<li><a href="http://j.mp/BH_WPTime" target="_blank">Unlimited web hosting for $3.95 only.</a></li>
						</ul>
					<p><a href="http://j.mp/GL_WPTime" target="_blank"><img src="<?php echo plugins_url( '/banner/global-aff-img.png', __FILE__ ); ?>" width="728" height="90"></a></p>
					<p><a href="http://j.mp/ET_WPTime_ref_pl" target="_blank"><img src="<?php echo plugins_url( '/banner/570x100.jpg', __FILE__ ); ?>"></a></p>
				</div>
            </div>
        <?php
	} // shortcodes page function
	
?>