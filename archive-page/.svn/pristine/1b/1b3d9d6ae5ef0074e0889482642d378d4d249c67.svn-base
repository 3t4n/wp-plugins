<?php
	
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	
	function alobaidi_archive_page_shortocodes() {
		add_plugins_page( 'Archive Page Shortcodes', 'Archive Page', 'update_core', 'alobaidi_archive_page_shortocodes', 'alobaidi_archive_page_shortocodes_page' );
	}
	add_action( 'admin_menu', 'alobaidi_archive_page_shortocodes' );
		
	function alobaidi_archive_page_shortocodes_page(){ // shortcodes page function
		?>
			<div class="wrap">
				<h2>Archive Page Shortcodes</h2>
            	<form>
                	<table class="form-table">
                		<tbody>
 
                    		<tr>
                        		<th scope="row"><label for="alobaidi_archive_page_shortocodes">Shortcodes</label></th>
                            	<td>
                                    <textarea id="alobaidi_archive_page_shortocodes" rows="5" cols="30" style="width:839px; height:1097px; white-space:nowrap;">
### Shortcodes:

1. [obi_daily_archive] shortcode to display daily archive, default number is no limited.

2. [obi_monthly_archive] shortcode to display monthly archive, default number is no limited.

3. [obi_yearly_archive] shortcode to display yearly archive, default number is no limited.

4. [obi_latest_posts] shortcode to display latest posts, default number is 10 posts.

5. [obi_get_cats] shortcode to display categories, default number is no limited.

6. [obi_get_tags] shortcode to display tags, default number is 10 tags.

7. [obi_get_pages] shortcode to display pages list, default number is no limited.

8. [obi_get_authors] shortcode to display authors list, default number is no limited.



### Shortcodes Attributes:

1. number="" (number of list, example: number="3" will be display 3 latest posts or 3 tags .. etc, see default number in default usage section).

2. heading="" (heading of title, example: heading="h1" default is h3).

3. list="" (list type, example: list="ol" default is ul).

4. title="" (title of list, example: title="Recent Posts" enter title using your language).


### Default Usage

[obi_daily_archive]
[obi_monthly_archive]
[obi_yearly_archive]
[obi_latest_posts]
[obi_get_cats]
[obi_get_tags]
[obi_get_pages]
[obi_get_authors]


### Custom Usage
[obi_daily_archive number="7" heading="h5" list="ol" title="Archive By Day"]
[obi_monthly_archive number="12" heading="h5" list="ol" title="Archive By Month"]
[obi_yearly_archive number="10" heading="h5" list="ol" title="Archive By Year"]
[obi_latest_posts number="5" heading="h5" list="ol" title="Recent Posts"]
[obi_get_cats number="6" heading="h5" list="ol" title="Our Categories"]
[obi_get_tags number="8" heading="h5" list="ol" title="Tags List"]
[obi_get_pages number="9" heading="h5" list="ol" title="Our Pages"]
[obi_get_authors number="15" heading="h5" list="ol" title="Our Authors"]
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