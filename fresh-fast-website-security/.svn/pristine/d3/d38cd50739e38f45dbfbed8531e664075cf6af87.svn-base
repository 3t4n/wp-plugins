<div class="wrap ffwsecurity">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	
	<form action="<?php echo $action?>" method="post" name="options">

	<?php echo wp_nonce_field('update-options') ?>
	
	
	
	

	<table class="form-table">
	    <tbody>

	    	<tr>
			    <th scope="row">
					  <label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_PASSWORD_RESET?>">Disable password reset</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_PASSWORD_RESET?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_PASSWORD_RESET?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_PASSWORD_RESET] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
		</tbody>
	</table>
		
	<h3>Header Tags and Links</h3>
	
	<table class="form-table">
	    <tbody>
	
	        <tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_GENERATOR_META_TAG?>">Remove <br/>Generator Meta Tag</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_GENERATOR_META_TAG?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_GENERATOR_META_TAG?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_GENERATOR_META_TAG] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_RSD_LINK?>">Remove RSD link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_RSD_LINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_RSD_LINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_RSD_LINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_FEED_LINKS?>">Remove Feed Links</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_FEED_LINKS?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_FEED_LINKS?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_FEED_LINKS] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_WLWMANIFEST_LINK?>">Remove WLWmanifest Link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_WLWMANIFEST_LINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_WLWMANIFEST_LINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_WLWMANIFEST_LINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_INDEX_REL_LINK?>">Remove Index Rel Link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_INDEX_REL_LINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_INDEX_REL_LINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_INDEX_REL_LINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_START_POST_REL_LINK?>">Remove Start Post Rel Link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_START_POST_REL_LINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_START_POST_REL_LINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_START_POST_REL_LINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_PARENT_POST_REL_LINK?>">Remove Parent Post Rel Link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_PARENT_POST_REL_LINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_PARENT_POST_REL_LINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_PARENT_POST_REL_LINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK?>">Remove Adjanced Post Rel Link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_WP_SHORTLINK?>">Remove WP Short Link</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_WP_SHORTLINK?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_REMOVE_WP_SHORTLINK?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_REMOVE_WP_SHORTLINK] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
						
	    </tbody>
	</table>

	<h3>RSS Feeds</h3>
	
	<table class="form-table">
	    <tbody>
	    	<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_ATOM?>">Disable ATOM Feed</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_ATOM?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_ATOM?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_ATOM] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RSS2?>">Disable RSS 2 Feed</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RSS2?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RSS2?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_RSS2] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>			
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RSS?>">Disable RSS Feed</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RSS?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RSS?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_RSS] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
					<label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RDF?>">Disable RDF Feed</label>
			    </th>
			    <td>
					<input type="checkbox" 
						id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RDF?>"
						name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_RDF?>" 
						<?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_RDF] == true) { ?>
						checked="checked"
						<?php } ?>
						/>
			    </td>
			</tr>
			     			
	    </tbody>
	</table>	
 
    <h3>Admin Dashboard</h3>
    <table class="form-table">
        <tbody>
    	    <tr>
     	        <th scope="row">
                    <label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPBLOG?>">Remove WordPress.com Blog from Dashboard</label>
                </th>
                <td>
                    <input type="checkbox" 
                      id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPBLOG?>"
                      name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPBLOG?>" 
                      <?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPBLOG] == true) { ?>
                      checked="checked"
                      <?php } ?>
                      />
                </td>
            </tr>
            <tr>
              <th scope="row">
                    <label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPNEWS?>">Remove other WordPress News from Dashboard</label>
                </th>
                <td>
                    <input type="checkbox" 
                      id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPNEWS?>"
                      name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPNEWS?>" 
                      <?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPNEWS] == true) { ?>
                      checked="checked"
                      <?php } ?>
                      />
                </td>
            </tr>           
        </tbody>
    </table>
     
    <h3>Other</h3>
    <table class="form-table">
        <tbody>
         <tr>
              <th scope="row">
                    <label for="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS?>">Disable HTML comments</label>
                </th>
                <td>
                    <input type="checkbox" 
                      id="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS?>"
                      name="<?php echo FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS?>" 
                      <?php if ($options[FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS] == true) { ?>
                      checked="checked"
                      <?php } ?>
                      />
                </td>
            </tr>
        </tbody>
    </table>
         
	<p>
		<?php echo get_submit_button('Save changes', 'primary', 'submit', false) ?>
	</p>
		
	</form>
	
	
</div>
