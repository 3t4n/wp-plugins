<?php
if( ! is_admin() ) {
	return;
}

// Escape the main ASTRO_SB_PREFIX constant
$astro_sb_prefix = esc_attr(ASTRO_SB_PREFIX);

$tab = 'settings';
$option_group = $astro_sb_prefix . $tab;
?>
<div class="<?php echo $astro_sb_prefix . 'wrapper'; ?> <?php echo esc_attr( $option_group ); ?>">

    <form method="post" action="options.php" class="<?php echo esc_attr($option_group); ?>_form">
        <?php
        settings_fields($option_group);
        do_settings_sections($option_group);
        ?>

        <div class="section-wrapper">
            <div class="section-wrapper-inner">

                <p><?php echo esc_html('The sticky buttons can be displayed in two different methods:', 'astro-sticky-buttons'); ?>
                <ol>
                    <li><?php echo esc_html('Choose where to display the sticky buttons', 'astro-sticky-buttons'); ?> (<strong><?php echo esc_html('recommended', 'astro-sticky-buttons'); ?></strong>)</li>
                    <li><?php echo esc_html('Using the shortcode [astro-sticky-buttons] in your website content/widget/header/footer', 'astro-sticky-buttons'); ?></li>
                </ol>
                <p><strong><?php echo esc_html('It is recommended to use only one method!', 'astro-sticky-buttons'); ?></strong>

                <hr>

                <h2 id="where-display" class="title"><?php esc_html_e('Choose where to display the Astro Sticky Buttons', 'astro-sticky-buttons' ); ?></h2>
                <table class="form-table astro_sb_enable_disable_post_types">
					<?php
					$field_label = esc_html__( 'Check/Uncheck All', 'astro-sticky-buttons' );
					$field_description = '';
					$field_name = $astro_sb_prefix.'enable_disable_all';
					$field_value = 1;
					?>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <input id="<?php echo esc_attr($field_name); ?>"
                                   name="<?php echo esc_attr($field_name); ?>"
                                   type="checkbox"
                                   class="<?php echo esc_attr($astro_sb_prefix) . 'checkbox_enable'; ?>"

                            ><label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($field_label); ?></label>
                        </td>
                    </tr>

					<?php
					// Posts
					$args = array( 'public' => true );
					$post_types = get_post_types( $args );

					foreach ( $post_types  as $post_type ) {
						$post_type = get_post_type_object($post_type);

						$field_label = sprintf( esc_html__( 'Display in %s', 'astro-sticky-buttons' ), $post_type->labels->name );
						$field_description = '';
						$field_name = $astro_sb_prefix.'enable_'.$post_type->name;
						$field_value = get_option($field_name);
						?>
                        <tr>
                            <th scope="row"><label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($field_label); ?></label></th>
                            <td>
                                <fieldset>
                                    <legend class="screen-reader-text"><span><?php echo esc_html($field_label); ?></span></legend>
                                    <label for="<?php echo esc_attr($field_name); ?>"><input id="<?php echo esc_attr($field_name); ?>"
                                                                                             name="<?php echo esc_attr($field_name); ?>"
                                                                                             type="checkbox"
                                                                                             class="<?php echo esc_attr($astro_sb_prefix) . 'checkbox_enable'; ?>"
                                                                                             value="1" <?php if ($field_value == "1") {
											echo 'checked="checked"';
										} ?>><?php echo esc_html($field_description); ?></label>
                                </fieldset>
                            </td>
                        </tr>
						<?php
					}

                    // Taxonomies
					$args = array( 'public' => true );
					$taxonomies = get_taxonomies( $args );

					foreach ( $taxonomies  as $taxonomy ) {
						$taxonomy = get_taxonomy($taxonomy);

						$field_label = sprintf( esc_html__( 'Display in %s', 'astro-sticky-buttons' ), $taxonomy->labels->name );
						$field_description = '';
						$field_name = $astro_sb_prefix.'enable_'.$taxonomy->name;
						$field_value = get_option($field_name);
						?>
                        <tr>
                            <th scope="row"><label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($field_label); ?></label></th>
                            <td>
                                <fieldset>
                                    <legend class="screen-reader-text"><span><?php echo esc_html($field_label); ?></span></legend>
                                    <label for="<?php echo esc_attr($field_name); ?>"><input id="<?php echo esc_attr($field_name); ?>"
                                                                                             name="<?php echo esc_attr($field_name); ?>"
                                                                                             type="checkbox"
                                                                                             class="<?php echo esc_attr($astro_sb_prefix) . 'checkbox_enable'; ?>"
                                                                                             value="1" <?php if ($field_value == "1") {
											echo 'checked="checked"';
										} ?>><?php echo esc_html($field_description); ?></label>
                                </fieldset>
                            </td>
                        </tr>
						<?php
					}
					?>
                </table>

                <hr>

                <h2 id="buttons-communication" class="title"><?php esc_html_e('Chat/Communication buttons', 'astro-sticky-buttons' ); ?></h2>
                <table class="form-table">
					<?php
					$field = array(
						'label' => esc_html__( 'Email', 'astro-sticky-buttons' ),
						'description' => '',
						'name' => $astro_sb_prefix.'email',
						'value' => get_option($astro_sb_prefix.'email'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Telephone', 'astro-sticky-buttons' ),
						'description' => __('Include the country code. Example: +39000123456', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'telephone',
						'value' => get_option($astro_sb_prefix.'telephone'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
                    <?php
                    $field = array(
                        'label' => esc_html__( 'WhatsApp', 'astro-sticky-buttons' ),
                        'description' => __('Include the country code. Example: +39000123456', 'astro-sticky-buttons' ),
                        'name' => $astro_sb_prefix.'whatsapp',
                        'value' => get_option($astro_sb_prefix.'whatsapp'),
                        'placeholder' => '',
                    );
                    ?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
                            <?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Skype', 'astro-sticky-buttons' ),
						'description' => __('Example: name.surname', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'skype',
						'value' => get_option($astro_sb_prefix.'skype'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Facebook messenger', 'astro-sticky-buttons' ),
						'description' => __('Example: name.surname', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'facebook_messenger',
						'value' => get_option($astro_sb_prefix.'facebook_messenger'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
                </table>

                <hr>

                <h2 id="buttons-communication" class="title"><?php esc_html_e('Social buttons', 'astro-sticky-buttons' ); ?></h2>
                <table class="form-table">

					<?php
					$field = array(
						'label' => esc_html__( 'Facebook', 'astro-sticky-buttons' ),
						'description' => __('Example: your.username', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'facebook',
						'value' => get_option($astro_sb_prefix.'facebook'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Instagram', 'astro-sticky-buttons' ),
						'description' => __('Example: instagramusername', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'instagram',
						'value' => get_option($astro_sb_prefix.'instagram'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Pinterest', 'astro-sticky-buttons' ),
						'description' => __('Example: pinterestusername', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'pinterest',
						'value' => get_option($astro_sb_prefix.'pinterest'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
                    <?php
                    $field = array(
                        'label' => esc_html__( 'YouTube', 'astro-sticky-buttons' ),
                        'description' => __('Example: youryoutubechannel', 'astro-sticky-buttons' ),
                        'name' => $astro_sb_prefix.'youtube',
                        'value' => get_option($astro_sb_prefix.'youtube'),
                        'placeholder' => '',
                    );
                    ?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
                            <?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'TikTok', 'astro-sticky-buttons' ),
						'description' => __('Example: @tiktokname', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'tiktok',
						'value' => get_option($astro_sb_prefix.'tiktok'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Twitter', 'astro-sticky-buttons' ),
						'description' => __('Example: twitterusername', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'twitter',
						'value' => get_option($astro_sb_prefix.'twitter'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Vimeo', 'astro-sticky-buttons' ),
						'description' => __('Example: vimeousername', 'astro-sticky-buttons' ),
						'name' => $astro_sb_prefix.'vimeo',
						'value' => get_option($astro_sb_prefix.'vimeo'),
						'placeholder' => '',
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <input type="text" id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" value="<?php echo esc_attr($field['value']); ?>" placeholder="<?php echo esc_attr($field['placeholder']); ?>">
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php }?>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <?php
        submit_button();
        ?>
    </form>

</div>

