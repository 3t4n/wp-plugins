			<form method="POST" id="custom-simple-rss-form" >
			<?php wp_nonce_field( 'csrp_update_options_nonce_action', 'csrp_update_options_nonce' ); ?>
            <input type="hidden" name="action" value="custom_simple_rss_form_submit">
				<h2>Set Defaults</h2>
				<hr>
				<h3>
				What ever you set here will effect all rss feeds defaults, UNLESS you choose otherwise by url query Parameters.(see Examples and Parameters tab for more info)
				</h3>
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">Default tpost type:</div>
					<input type="text" name="csrp_post_type" value="<?php echo $csrp_post_type ?>">                    
				</div>

				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">Default post_status:</div>
					<input type="text" name="csrp_post_status" value="<?php echo $csrp_post_status ?>">
					<br>
					<div class=""><b>WordPress Core Statuses:</b></div>
					<em>publish</em> - Viewable by everyone. (publish)
					<br> <em>future</em> - Scheduled to be published in a future date. (future) 
					<br> <em>draft</em> - Incomplete post viewable by anyone with proper user role. (draft)
					<br> <em>pending</em> -  Awaiting a user with the publish_posts capability (typically a user assigned the Editor role) to publish. (pending)    
					<br> <em>private</em> - Viewable only to WordPress users at Administrator level. (private) 
					<br> <em>trash</em> - Posts in the Trash are assigned the trash status. (trash)				                   
				</div>
		 
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">posts_per_page:</div>
					<input type="text" name="csrp_posts_per_page" value="<?php echo $csrp_posts_per_page ?>">
				</div>
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">show post_meta in feed:</div>
					
                    <select name="csrp_show_meta">
                        <option value="1" <?php if($csrp_show_meta=="1") echo 'selected' ?> >Yes</option>
                        <option value="0" <?php if($csrp_show_meta=="0") echo 'selected' ?> >No</option>
                    </select>
				</div>
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">show post thumbnail in feed:</div>
                    <select name="csrp_show_thumbnail">
                        <option value="1" <?php if($csrp_show_thumbnail=="1") echo 'selected' ?> >Yes</option>
                        <option value="0" <?php if($csrp_show_thumbnail=="0") echo 'selected' ?> >No</option>
                    </select>                    
				</div>
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">show post content in feed:</div>
					<select name="csrp_show_content">
					<?php 
					foreach($show_content_arr as $key => $value) :
					$selected = '';
					if($key==$csrp_show_content) $selected = 'selected';
					?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
					<?php endforeach;?>
					</select>
					<br>
				</div>
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">show post description in feed:</div>
					* <b>show description:</b> if excerpt is empty - show short contnet in description field (using get_the_excerpt function) <br>
                    * <b>show excerpt:</b> will show the post excerpt(if any). if excerpt is empty - will remain empty <br>
					* <b>hide always:</b> always empty.<br><br>
					<select name="csrp_show_description">
						<?php 
						foreach($show_description_arr as $key => $value) :
						$selected = '';
						if($key==$csrp_show_description) $selected = 'selected';
						?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
						<?php endforeach;?>
					</select>
					<br>
				</div>				
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">allowed html tags:</div>
					* works only for "show clean html" - if chosen above
					<br>
					* one long line - NO spaces: <code>&lt;br&gt;&lt;div&gt;&lt;li&gt;</code> etc...
					<br><br>
					<?php
					if($csrp_allowed_tags==''){
						$csrp_allowed_tags = CUSTOM_SIMPLE_RSS_PLUGIN_ALLOWED_TAGS;
					}					
					?>
					<textarea name="csrp_allowed_tags" ><?php echo $csrp_allowed_tags ?></textarea>
				</div>
				<div class="custom-simple-rss-admin-row">					
					<div class="custom-simple-rss-admin-label">build output xml with:</div>
                    * string: build xml feed with simple xml string<br>
                    * DOM: build xml with DOMDocument for better validation (! be carefull can break some feeds)
                    <br><br>
					<select name="csrp_xml_type">
					<?php 
					foreach($csrp_xml_type_arr as $key => $value) :
					$selected = '';
					if($key==$csrp_xml_type) $selected = 'selected';
					?>
						<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
					<?php endforeach;?>
					</select>
					<br>                    
				</div>
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">pubDate date format:</div>
                     * Post RFC Local Date & Time: date time in RFC local format - for example "wo, 14 okt 2020 16:16:26 +0200"<br>
                     * Post RFC Universal Date & Time: - for example: <?php echo date( 'D, d M Y H:i:s +0000' ) ?><br>
                     * Post Date: the date format of your web site - for example <?php echo date( get_option( 'date_format' ) ); ?><br>
                     * Post Date & Time: the date and time format of your web site - for example <?php echo date( get_option( 'date_format' ).' '.get_option('time_format') ); ?><br>
                     <br>
					 <select name="csrp_pubdate_date_format">
						 <option value="rfc" <?php if($csrp_pubdate_date_format=="rfc") echo 'selected' ?> >Local RFC Post Date</option>
						 <option value="universal_rfc" <?php if($csrp_pubdate_date_format=="universal_rfc") echo 'selected' ?> >Universal RFC Post Date</option>
						 <option value="blog_date" <?php if($csrp_pubdate_date_format=="blog_date") echo 'selected' ?> >Blog Date Format</option>
						 <option value="blog_date_time" <?php if($csrp_pubdate_date_format=="blog_date_time") echo 'selected' ?> >Blog Date & Time Format</option>
						 
					 </select>                    
				</div>              
				<div class="custom-simple-rss-admin-row">
					<div class="custom-simple-rss-admin-label">protect my feeds with a key:</div>
					<input type="text" name="csrp_secret_key" value="<?php echo $csrp_secret_key ?>">
				</div>				
				<input type="hidden" name="page" value="custom-simple-rss-admin-options">
				<input type="submit" value="Save Changes">
			</form>
            
            