<?php
/*
Custom Access Roles Admin Page
Note: This page MUST be included in the users_page_interface method of the CARoles class.
*/

if (!defined('ABSPATH') || get_class() != 'CARoles') { exit; }
?>
<style type="text/css">

.caroles .columns-2 {
	display: table;
	width: 100%;
}

	.caroles .columns-2 .column-1 {
		display: table-cell;
		padding-right: 15px;
		width: calc(100% - 280px);
	}

		.caroles .columns-2 .column-1 > * {
			width: 100%;
		}

	.caroles .columns-2 .column-2 {
		display: table-cell;
		width: 280px;
	}

@media screen and (max-width: 782px) {

	.caroles .columns-2 {
		display: block;
	}

		.caroles .columns-2 .column-1 {
			display: block;
			width: 100%;
		}


		.caroles .columns-2 .column-2 {
			display: block;
			width: 100%;
		}

}

</style>

<div class="wrap caroles">

	<h1><?php echo self::NAME; ?></h1>
	<p>This tool allows you to create custom user roles that are limited to <strong>read</strong> access to most of WordPress admin, but are granted customizable editing permission on specific pieces of content only.</p>

	<div class="metabox-holder columns-2">
	
		<div class="column-1">

			<form method="post" action="">
		
				<?php wp_nonce_field('caroles','caroles-nonce'); ?>

				<div class="postbox">
					<h3 class="hndle"><span>
						<?php
						if (!empty($role_name) && !empty($posted)) {
							echo 'Manage Custom User Role: ' . $role_name;
						}
						else {
							echo 'Manage Custom User Role';
						}
						?>
					</span></h3>
					<div class="inside">
						<?php
						if (empty($role_name)) {
							$included_roles_dropdown = $this->get_included_roles_dropdown();
							?>
							<input type="hidden" name="null[step]" value="select_role" />
							<p>
								<?php
								if ($included_roles_dropdown) {
									?>
									<select name="caroles[role]" id="_caroles_role" onchange="if (this.value != '') { jQuery('#_caroles_new_role').val(''); }">
										<?php echo $this->get_included_roles_dropdown(); ?>
									</select> or create
									<?php
								}
								else { echo 'Create'; }
								?>
								a new role called:
								<input type="text" name="caroles[new_role]" id="_caroles_new_role" value="" onkeyup="if (this.value != '') { jQuery('#_caroles_role').val(''); }" />
								<input type="submit" value="Go" class="button button-primary" />
							</p>
							<?php
						}
						elseif (!empty($role_name) && !empty($posted)) {
							$input_base = esc_attr('caroles[role][' . $role_slug . ']');
							?>
							<input type="hidden" name="null[step]" value="update_role" />
							<input type="hidden" name="<?php echo $input_base; ?>[role_name]" value="<?php echo esc_attr($role_name); ?>" />
							<input type="hidden" name="<?php echo $input_base; ?>[role_slug]" value="<?php echo esc_attr($role_slug); ?>" />
		
							<h2 class="nav-tab-wrapper">
								<a class="nav-tab nav-tab-active" href="#caroles-capabilities">Capabilities</a>
								<a class="nav-tab" href="#caroles-content-access">Content Access</a>
							</h2>

							<div id="caroles-tab-sections">
								<section class="caroles-tab-content" id="caroles-capabilities">
		
									<h2>Capabilities</h2>

									<p>Recommended capabilities for general-purpose editing access are <span style="text-decoration: underline;">underlined</span>.<br />
									<strong>Note that the underlined capabilities will allow users to <em>create</em> &#8212; but not <em>publish</em> &#8212; new Posts and Pages.</strong></p>
		
									<p>Currently assigned capabilities for this role are <span class="highlight">highlighted</span>.</p>
		
									<p>Adjust the capabilities to suit your specific needs using the checkboxes. For instance, if this role is only going to be allowed to <em>edit certain existing Pages</em>, uncheck all capabilities containing the word "posts". Likewise, if this role can only <em>create Posts</em>, uncheck all capabilities containing the word "pages".</p>
		
									<p>Consult the official WordPress documentation on <a href="https://codex.wordpress.org/Roles_and_Capabilities" target="_blank">Roles and Capabilities</a> for additional information.</p>

									<div class="scrolling">
										<?php
										foreach ((array)$this->default_capabilities as $role => $capabilities) {
											?>
											<div><strong style="font-weight: 900;"><?php echo ucwords($role); ?></strong></div>
											<?php
											foreach ((array)$capabilities as $capability => $allowed) {
												?>
												<div<?php if (@$role_capabilities[$capability] == true) { echo ' class="highlight"'; }?>>
													<label for="_caroles_role_capabilities_<?php echo esc_attr($capability); ?>">
														<input type="checkbox" name="null[role_capabilities][]" id="_caroles_role_capabilities_<?php echo esc_attr($capability); ?>" value="<?php echo esc_attr($capability); ?>" data-rel-id="_caroles_role_capabilities"<?php
														if (@$role_capabilities[$capability] == true) { echo ' checked="checked"'; }
														?> />
														<span<?php if ($allowed) { echo ' style="text-decoration: underline;"'; } ?>><?php echo str_replace('_',' ',$capability); ?></span>
													</label>
												</div>
												<?php
											}
											?>
											<br />
											<?php
										}
										?>
									</div>
									<input type="hidden" name="<?php echo $input_base; ?>[role_capabilities]" value="<?php echo esc_attr($this->concat_capabilities($role_capabilities)); ?>" id="_caroles_role_capabilities" /><br />

								</section>
								<section class="caroles-tab-content" id="caroles-content-access">

									<h2>Content Access</h2>

									<p>Currently assigned content access for this role is <span class="highlight">highlighted</span>.</p>

									<p>Users with this role will have the selected capabilities <em>only</em> on the selected content. For all other areas, this role will have <strong>read</strong> access only.</p>

									<?php
									// PAGES
									$pages = get_pages(array(
										'hierarchical' => true,
										'post_status' => 'publish,draft,private',
										'sort_column' => 'menu_order',
									));

									$role_pages = explode(',',@$role_options['role_pages']);

									if (!empty($pages)) {
										?>
										<h3>Pages</h3>
					
										<p><strong>Note:</strong> If this role will <em>only</em> be editing Pages (not Posts), be sure to uncheck all capabilities containing the word "posts" in the <strong>Capabilities</strong> list above.</p>

										<div class="scrolling"<?php echo $this->set_scroll_height(count($pages)); ?>>
											<?php
											foreach ((array)$pages as $page) {
												?>
												<div data-depth="<?php echo intval($this->get_page_depth($page)); ?>"<?php if (in_array($page->ID,$role_pages)) { echo ' class="highlight"'; } ?>>
													<label for="_caroles_page_id_<?php echo $page->ID; ?>">
														<input type="checkbox" name="null[page_id][]" id="_caroles_page_id_<?php echo $page->ID; ?>" value="<?php echo $page->ID; ?>" data-rel-id="_caroles_role_pages"<?php
														if (in_array($page->ID,$role_pages)) { echo ' checked="checked"'; }
														?> />
														<?php echo $page->post_title; ?>
													</label>
												</div>
												<?php
											}
											?>
										</div>
										<input type="hidden" name="<?php echo $input_base; ?>[role_pages]" value="<?php echo esc_attr(@$role_options['role_pages']); ?>" id="_caroles_role_pages" />
										<?php
									}


									// CATEGORIES
									$categories = get_categories(array(
										'hide_empty' => false,
									));
									$categories = $this->parent_sort_terms($categories);

									$role_cat = explode(',',@$role_options['role_cat']);

									if (!empty($categories)) {
										?>
										<h3>Post Categories</h3>

										<p><strong>Note:</strong> If this role will <em>only</em> be editing Posts (not Pages), be sure to uncheck all capabilities containing the word "pages" in the <strong>Capabilities</strong> list above.</p>

										<div class="scrolling"<?php echo $this->set_scroll_height(count($categories)); ?>>
											<?php
											foreach ((array)$categories as $cat) {
												?>
												<div data-depth="<?php echo intval($this->get_term_depth($cat)); ?>"<?php if (in_array($cat->term_id,$role_cat)) { echo ' class="highlight"'; } ?>>
													<label for="_caroles_cat_id_<?php echo $cat->term_id; ?>">
														<input type="checkbox" name="null[cat_id][]" id="_caroles_cat_id_<?php echo $cat->term_id; ?>" value="<?php echo $cat->term_id; ?>" data-rel-id="_caroles_role_cat"<?php
														if (in_array($cat->term_id,$role_cat)) { echo ' checked="checked"'; }
														?> />
														<?php echo $cat->cat_name; ?>
													</label>
												</div>
												<?php
											}
											?>
										</div>
										<input type="hidden" name="<?php echo $input_base; ?>[role_cat]" value="<?php echo esc_attr(@$role_options['role_cat']); ?>" id="_caroles_role_cat" />
										<?php
									}


									// CUSTOM POST TYPES
									$cpts = get_post_types(array(
										'_builtin' => false,
										//'public' => true,
									), 'objects');

									$role_cpt = explode(',',@$role_options['role_cpt']);

									if (!empty($cpts)) {
										?>
										<h3>Custom Post Types</h3>

										<p><strong>Note:</strong> Some Custom Post Types (CPTs) have their own custom capabilities. Please review the capabilities under the "Custom" heading in the <strong>Capabilities</strong> list above.</p>
					
										<p>For CPTs without custom capabilities, built-in capabilities containing the word "posts" are used. Note that these capabilities <em>may</em> grant this role access to create Posts. Adjust category settings above accordingly.</p>

										<div class="scrolling"<?php echo $this->set_scroll_height(count($cpts)); ?>>
											<?php
											foreach ((array)$cpts as $cpt_slug => $cpt) {
												?>
												<div data-depth="0"<?php if (in_array($cpt_slug,$role_cpt)) { echo ' class="highlight"'; } ?>>
													<label for="_caroles_cpt_<?php echo $cpt_slug; ?>">
														<input type="checkbox" name="null[cpt][]" id="_caroles_cpt_<?php echo $cpt_slug; ?>" value="<?php echo $cpt_slug; ?>" data-rel-id="_caroles_role_cpt"<?php
														if (in_array($cpt_slug,$role_cpt)) { echo ' checked="checked"'; }
														?> />
														<?php echo $cpt->labels->menu_name; ?>
													</label>
												</div>
												<?php
											}
											?>
										</div>
										<input type="hidden" name="<?php echo $input_base; ?>[role_cpt]" value="<?php echo esc_attr(@$role_options['role_cpt']); ?>" id="_caroles_role_cpt" />
										<?php
									}
									?>
								</section>
							</div><!-- #caroles-tab-sections -->

							<p>
								<input type="submit" value="Save Changes" class="button button-primary" />
								<input type="submit" value="Cancel" class="button" onclick="if (confirm('Are you sure? Unsaved changes will be lost.')) { location.reload(); } return false;" />
							</p>
							<?php
						}
						?>
					</div>
				</div>
		
			</form>

			<?php
			// Delete role
			if (empty($posted) || empty($role_name)) {
				if ($this->get_deletable_roles()) {
					if ($this->allow_delete_assigned_roles) {
						$confirm_message = 'Are you sure? Any users with this role will immediately lose all access. This cannot be undone.'; 
					}
					else {
						$confirm_message = 'Are you sure? This cannot be undone.'; 
					}
					?>
					<form method="post" action="" onsubmit="if (!confirm('<?php echo esc_attr($confirm_message); ?>')) { return false; }">
						<div class="metabox-holder">
							<?php wp_nonce_field('caroles','caroles-nonce'); ?>

							<div class="postbox">
								<h3 class="hndle"><span>Delete Custom User Role</span></h3>
								<div class="inside">
									<input type="hidden" name="null[step]" value="delete_role" />
									<?php
									if (!$this->allow_delete_assigned_roles) {
										?>
										<p><strong>Note:</strong> Only roles that have no assigned users can be deleted.</p>
										<?php
									}
									?>
									<select name="caroles[delete_role]" id="_caroles_delete_role">
										<?php echo $this->get_deletable_roles_dropdown(); ?>
									</select>
									<input type="submit" value="Delete Role" class="button button-primary" />
								</div>
							</div>
						</div>
					</form>
					<?php
				}
				else {
					?>
					<div class="metabox-holder">
						<div class="postbox">
							<h3 class="hndle"><span>Delete Custom User Role</span></h3>
							<div class="inside">
								<p>
									<?php
									if (!$this->allow_delete_assigned_roles) {
										?>
										Only roles that have no assigned users can be deleted.
										<?php
									}
									?>
									There are currently no deletable roles.
								</p>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>

		</div>
	
		<div class="column-2">

			<div class="postbox">

				<h3 class="hndle"><span>Support</span></h3>
		
				<div class="inside">
	
					<p>For support please email <a href="mailto:support@room34.com">support@room34.com</a> or use the <a href="https://wordpress.org/support/plugin/custom-access-roles" target="_blank">WordPress Support Forums</a>.</p>
		
				</div>

			</div>

			<div class="postbox">

				<h3 class="hndle"><span>Thank You!</span></h3>
		
				<div class="inside">
	
					<a href="https://room34.com/about/payments/?type=WordPress+Plugin&plugin=Custom+Access+Roles&amt=9" target="_blank"><img src="<?php echo plugin_dir_url(__FILE__); ?>room34-logo-on-white.svg" alt="Room 34 Creative Services" style="display: block; height: auto; margin: 0 auto 0.5em auto; width: 200px;" /></a> 
		
					<p>This plugin is free to use. However, if you find it to be of value, we welcome your donation (suggested amount: USD $9), to help fund future development.</p>

					<p><a href="https://room34.com/about/payments/?type=WordPress+Plugin&plugin=Custom+Access+Roles&amt=9" target="_blank" class="button button-primary">Make a Donation</a></p>
		
				</div>
		
			</div>
		
		</div>
	
	</div>

</div>