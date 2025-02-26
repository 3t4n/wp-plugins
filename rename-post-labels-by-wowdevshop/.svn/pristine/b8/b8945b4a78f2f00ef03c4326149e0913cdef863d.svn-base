
<?php
/**
* Template for the for on the WordPress Dashboard
*
* @package WordPress
* @subpackage WowDevShop_Rename_Post_Labels
* @author XicoOfficial
* @since 1.0.0
*/

?>

<div class="wrap">
			<h2><?php _e('Rename Post Labels', 'rename-post-labels-by-wowdevshop') ?></h2>
            <h4><?php _e('Customize your icon and change the default Post labels.', 'rename-post-labels-by-wowdevshop') ?></h4>
            <form method="post" action="">
				<?php settings_fields( 'disable-settings-group' ); ?>
            	<?php do_settings_sections( 'disable-settings-group' ); ?>
			<table>
			<tr>
				<td></td>
				<td><label> <h4><?php _e('Change Post Labels', 'rename-post-labels-by-wowdevshop') ?><h4> </label></td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Posts', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="25" name="name" value="<?php echo $name ?>" maxlength="20" /></td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Post', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="25" name="singular_name" value="<?php echo $singular_name ?>" maxlength="20" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Add New', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input id="width" type="text" size="25" name="add_new" value="<?php echo $add_new ?>" maxlength="20" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Add New Post', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input id="title" type="text" size="25" name="add_new_item" value="<?php echo $add_new_item ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Edit Post', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="25" name="edit_item" value="<?php echo $edit_item ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('New Post', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="25" name="new_item" value="<?php echo $new_item ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('View Post', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="25" name="view_item" value="<?php echo $view_item ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Search Posts', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="25" name="search_items" value="<?php echo $search_items ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('No posts found', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="30" name="not_found" value="<?php echo $not_found ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('No posts found in Trash', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="30" name="not_found_in_trash" value="<?php echo $not_found_in_trash ?>" maxlength="50" /> </td>
				<td> </td>
			</tr>
			<tr>
				<td></td>
				<td>			<hr><label> <h4><?php _e('Change Icon', 'rename-post-labels-by-wowdevshop') ?><h4> </label></td>
				<td> </td>
			</tr>
			<tr>
				<td><label> <?php _e('Custom Icon', 'rename-post-labels-by-wowdevshop') ?> </label></td>
				<td><input type="text" size="30" name="menu_icon" value="<?php echo $menu_icon ?>" maxlength="50" /> </td>
				<td> *Check the available dashicons <a target="_blank" href="https://developer.wordpress.org/resource/dashicons">here</a>. </td>
			</tr>
			<table>
                <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>
            </form>
        </div>
