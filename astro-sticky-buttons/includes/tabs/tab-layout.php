<?php
if( ! is_admin() ) {
	return;
}

// Escape the main ASTRO_SB_PREFIX constant
$astro_sb_prefix = esc_attr(ASTRO_SB_PREFIX);

$tab = 'layout';
$option_group = $astro_sb_prefix . $tab;
?>
<div class="<?php echo $astro_sb_prefix . 'wrapper'; ?>  <?php echo esc_attr( $option_group ); ?>">

    <form method="post" action="options.php">
    <?php
    settings_fields($option_group);
    do_settings_sections($option_group);
    ?>

        <div class="section-wrapper">
            <div class="section-wrapper-inner">

                <h2 id="layout"><?php esc_html_e( 'Layout', 'astro-sticky-buttons' ); ?></h2>

                <h3 id="position"><?php esc_html_e( 'Position', 'astro-sticky-buttons' ); ?></h3>
                <table class="form-table">
					<?php
					$field = array(
						'label' => esc_html__( 'Position', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'position',
						'value' => get_option($astro_sb_prefix.'position'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
								<?php
								if (!($field['value'])) {
									$field['value'] = 'align-right';
								}
								?>
                                <option value="align-right"<?php if ($field['value'] == 'align-right') { echo ' selected="selected"'; } ?>><?php echo esc_attr(__( 'right', 'astro-sticky-buttons' )); ?></option>
                                <option value="align-right-bottom"<?php if ($field['value'] == 'align-right-bottom') { echo ' selected="selected"'; } ?>><?php echo esc_attr(__( 'bottom-right', 'astro-sticky-buttons' )); ?></option>
                                <option value="align-bottom"<?php if ($field['value'] == 'align-bottom') { echo ' selected="selected"'; } ?>><?php echo esc_attr(__( 'bottom', 'astro-sticky-buttons' )); ?></option>
                                <option value="align-left-bottom"<?php if ($field['value'] == 'align-left-bottom') { echo ' selected="selected"'; } ?>><?php echo esc_attr(__( 'bottom-left', 'astro-sticky-buttons' )); ?></option>
                                <option value="align-left"<?php if ($field['value'] == 'align-left') { echo ' selected="selected"'; } ?>><?php echo esc_attr(__( 'left', 'astro-sticky-buttons' )); ?></option>
                            </select>
                        </td>
                    </tr>
                </table>
                
                <hr />

                <h3 id="icons"><?php esc_html_e( 'Icons', 'astro-sticky-buttons' ); ?></h3>
                <table class="form-table">
					<?php
					$field = array(
						'name' => $astro_sb_prefix.'icon-margin',
						'label' => esc_html__( 'Margin', 'astro-sticky-buttons' ),
						'description' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
							<?php
							$subfield = array(
								'name' => $astro_sb_prefix.'icon-margin-top',
								'value' => get_option($astro_sb_prefix.'icon-margin-top'),
							);
							?>
                            <span class="sublabel"><?php esc_html_e('Top', 'astro-sticky-buttons'); ?></span>
                            <select name="<?php echo esc_attr($subfield['name']); ?>" id="<?php echo esc_attr($subfield['name']); ?>">
								<?php
								if ($subfield['value'] == '') {
									$subfield['value'] = 10;
								}
								for ($i = 0; $i <= 50; $i++) {
									$selected = '';
									if ($i == $subfield['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
							<?php
							$subfield = array(
								'name' => $astro_sb_prefix.'icon-margin-right',
								'value' => get_option($astro_sb_prefix.'icon-margin-right'),
							);
							?>
                            <span class="sublabel"><?php esc_html_e('Right', 'astro-sticky-buttons'); ?></span>
                            <select name="<?php echo esc_attr($subfield['name']); ?>" id="<?php echo esc_attr($subfield['name']); ?>">
								<?php
								if ($subfield['value'] == '') {
									$subfield['value'] = 0;
								}
								for ($i = 0; $i <= 50; $i++) {
									$selected = '';
									if ($i == $subfield['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
							<?php
							$subfield = array(
								'name' => $astro_sb_prefix.'icon-margin-bottom',
								'value' => get_option($astro_sb_prefix.'icon-margin-bottom'),
							);
							?>
                            <span class="sublabel"><?php esc_html_e('Bottom', 'astro-sticky-buttons'); ?></span>
                            <select name="<?php echo esc_attr($subfield['name']); ?>" id="<?php echo esc_attr($subfield['name']); ?>">
								<?php
								if ($subfield['value'] == '') {
									$subfield['value'] = 10;
								}
								for ($i = 0; $i <= 50; $i++) {
									$selected = '';
									if ($i == $subfield['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
							<?php
							$subfield = array(
								'name' => $astro_sb_prefix.'icon-margin-left',
								'value' => get_option($astro_sb_prefix.'icon-margin-left'),
							);
							?>
                            <span class="sublabel"><?php esc_html_e('Left', 'astro-sticky-buttons'); ?></span>
                            <select name="<?php echo esc_attr($subfield['name']); ?>" id="<?php echo esc_attr($subfield['name']); ?>">
								<?php
								if ($subfield['value'] == '') {
									$subfield['value'] = 0;
								}
								for ($i = 0; $i <= 50; $i++) {
									$selected = '';
									if ($i == $subfield['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Padding', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-padding',
						'value' => get_option($astro_sb_prefix.'icon-padding'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
								<?php
								if ($field['value'] == '') {
									$field['value'] = 0;
								}
								for ($i = 0; $i <= 30; $i+=5) {
									$selected = '';
									if ($i == $field['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Width/Height', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-width',
						'value' => get_option($astro_sb_prefix.'icon-width'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
								<?php
								if (!($field['value'])) {
									$field['value'] = 50;
								}
								for ($i = 30; $i <= 100; $i+=5) {
									$selected = '';
									if ($i == $field['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Font size', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-font-size',
						'value' => get_option($astro_sb_prefix.'icon-font-size'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
                                <option value=""><?php esc_html_e( 'inherit', 'astro-sticky-buttons' ); ?></option>
								<?php
								if (!($field['value'])) {
									$field['value'] = '';
								}
								for ($i = 6; $i <= 40; $i++) {
									$selected = '';
									if ($i == $field['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Border width', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-border-width',
						'value' => get_option($astro_sb_prefix.'icon-border-width'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
                                <option value=""><?php esc_html_e( 'inherit', 'astro-sticky-buttons' ); ?></option>
								<?php
								if (!($field['value'])) {
									$field['value'] = 0;
								}
								for ($i = 0; $i <= 10; $i++) {
									$selected = '';
									if ($i == $field['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
									<?php
								}
								?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Border style', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-border-style',
						'value' => get_option($astro_sb_prefix.'icon-border-style'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
                            <?php
							if (!($field['value'])) {
								$field['value'] = 'none';
							}
                            $border_styles = array('none', 'dashed', 'dotted', 'double', 'groove', 'hidden', 'inset', 'outset', 'ridge', 'solid');
                            foreach ($border_styles as $border_style) {
								$selected = '';
								if ($border_style == $field['value']) {
									$selected = ' selected="selected"';
								}
                            ?>
                                <option value="<?php echo esc_attr($border_style); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($border_style); ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Border radius', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-border-radius',
						'value' => get_option($astro_sb_prefix.'icon-border-radius'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
                                <option value=""><?php esc_html_e( 'inherit', 'astro-sticky-buttons' ); ?></option>
                                <?php
                                if (!($field['value'])) {
                                    $field['value'] = 100;
                                }
                                for ($i = 0; $i <= 100; $i+=5) {
                                    $selected = '';
                                    if ($i == $field['value']) {
                                        $selected = ' selected="selected"';
                                    }
                                    ?>
                                    <option value="<?php echo esc_attr($i); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($i); ?> <span class="select-option-suffix-px"><?php esc_html_e( 'px', 'astro-sticky-buttons' ); ?></span></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
					<?php
					$field = array(
						'label' => esc_html__( 'Box shadow', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'icon-box-shadow',
						'value' => get_option($astro_sb_prefix.'icon-box-shadow'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr($field['name']); ?>" id="<?php echo esc_attr($field['name']); ?>">
								<?php
								if (!($field['value'])) {
									$field['value'] = 'yes';
								}
								$box_shadows = array('no', 'yes');
								foreach ($box_shadows as $box_shadow) {
									$selected = '';
									if ($box_shadow == $field['value']) {
										$selected = ' selected="selected"';
									}
									?>
                                    <option value="<?php echo esc_attr($box_shadow); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($box_shadow); ?></option>
									<?php
								}
								?>
                            </select>
                        </td>
                    </tr>
                </table>

                <hr />

                <h3 id="advanced"><?php esc_html_e( 'Advanced settings', 'astro-sticky-buttons' ); ?></h3>
                <table class="form-table">
					<?php
					$field = array(
						'label' => esc_html__( 'Custom CSS', 'astro-sticky-buttons' ),
						'description' => false,
						'name' => $astro_sb_prefix.'custom-css',
						'value' => get_option($astro_sb_prefix.'custom-css'),
						'placeholder' => false,
					);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                        <td>
                            <textarea id="<?php echo esc_attr($field['name']); ?>" name="<?php echo esc_attr($field['name']); ?>" class="regular-text" placeholder="<?php echo esc_attr($field['placeholder']); ?>" rows="10"><?php echo esc_html($field['value']); ?></textarea>
							<?php if ($field['description']) { ?><p class="description"><?php echo esc_html($field['description']); ?></p><?php } ?>
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
