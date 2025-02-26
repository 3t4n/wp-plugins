<?php
    /**
     * Settings page file.
     *
     * @package arcaptcha-wp
     */

    // If this file is called directly, abort.
    if (!defined('ABSPATH')) {
        // @codeCoverageIgnoreStart
        exit;
        // @codeCoverageIgnoreEnd
    }

    arcap_display_options_page();

    /**
     * Display options page.
     */
    function arcap_display_options_page()
    {
        $updated = false;

        if (
            isset($_POST['arcaptcha_settings_nonce'], $_POST['submit']) &&
            wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['arcaptcha_settings_nonce'])),
                'arcaptcha_settings'
            )
        ) {
            foreach (arcap_options() as $option_name => $option) {
                $option_value = sanitize_option(
                    $option_name,
                    wp_unslash(isset($_POST[$option_name]) ? esc_html($_POST[$option_name]) : ''),
                );

                if (!$option_value && 'checkbox' === $option['type']) {
                    $option_value = 'off';
                }

                if (array_key_exists('validate', $option) && call_user_func($option['validate'], $option_value)) {
                    update_option($option_name, $option_value);
                }

            }

            $updated = true;
        }

    ?>
	<div class="wrap">
		<?php
            if ($updated) {
                ?>
			<div id="message" class="updated fade">
				<p>
					<?php esc_html_e('Settings Updated', 'arcaptcha-for-forms-and-more');?>
				</p>
			</div>
			<?php
                }
                ?>
		<h3><?php esc_html_e('ARCaptcha Settings', 'arcaptcha-plugin');?></h3>
		<h3>
			<?php
                echo wp_kses_post(
                        __(
                            'In order to use <a href="https://arcaptcha.ir/?r=wp" target="_blank">ARCaptcha</a> please register <a href="https://arcaptcha.ir/auth/?r=wp" target="_blank">here</a> to get your site key and secret key',
                            'arcaptcha-plugin'
                        )
                    );
                ?>
		</h3>
		<form method="post" action="">
			<?php arcap_display_options();?>
			<p>
				<input
						type="submit"
						value="<?php esc_html_e('Save ARCaptcha Settings', 'arcaptcha-plugin');?>"
						class="button button-primary"
						name="submit"/>
			</p>
			<?php
                wp_nonce_field('arcaptcha_settings', 'arcaptcha_settings_nonce');
                ?>
		</form>
	</div>
	<?php
        }

        /**
         * Display plugin options.
         */
        function arcap_display_options()
        {
            $options = arcap_options();

            array_walk(
                $options,
                function ($option, $option_name) {
                    if ('checkbox' !== $option['type']) {
                        arcap_display_option($option_name, $option);
                    }
                }
            );

        ?>
	<!-- <strong><?php esc_html_e('Enable/Disable Features', 'arcaptcha-for-forms-and-more');?></strong> -->
	<!-- <br><br> -->
	<?php

            array_walk(
                $options,
                function ($option, $option_name) {
                    if ('checkbox' === $option['type']) {
                        arcap_display_option($option_name, $option);
                    }
                }
            );
        }

        /**
         * Display an option.
         *
         * @param string $option_name Option name.
         * @param array  $option      Option.
         *
         * @todo add labels to input and select.
         */
        function arcap_display_option($option_name, $option)
        {
            $option_value = get_option($option_name);
            $description = isset($option['description']) ? $option['description'] : '';
            switch ($option['type']) {
                case 'text':
                case 'password':
                case 'number':
                ?>
			<strong>
				<?php echo esc_html($option['label']); ?>
			</strong>
			<br><br>
			<input
					type="<?php echo esc_attr($option['type']); ?>" size="50"
					id="<?php echo esc_attr($option_name); ?>"
					name="<?php echo esc_attr($option_name); ?>"
					value="<?php echo esc_html($option_value); ?>"/>
			<?php
                if ($description) {
                                echo '<br>' . wp_kses_post($description);
                            }
                        ?>
			<br><br>
			<?php
                break;
                        case 'checkbox':
                        ?>
			<input
					type="checkbox"
					id="<?php echo esc_attr($option_name); ?>"
					name="<?php echo esc_attr($option_name); ?>"
				<?php checked('on', $option_value);?>/>
			&nbsp;
			<span><?php echo esc_html($option['label']); ?></span>
			<br><br>
			<?php
                break;
                        case 'select':
                            if (!empty($option['options']) && is_array($option['options'])) {
                            ?>
				<strong><?php echo esc_html($option['label']); ?></strong>
				<br><br>
				<select
						id="<?php echo esc_attr($option_name); ?>"
						name="<?php echo esc_attr($option_name); ?>">
					<?php
                        foreach ($option['options'] as $key => $value) {
                                        ?>
						<option
								value="<?php echo esc_attr($key); ?>"
							<?php selected($key, $option_value);?>>
							<?php echo esc_html($value); ?>
						</option>
						<?php
                            }
                                        ?>
				</select>
				<br><br>
				<?php
                    }
                                break;
                            default:
                                break;
                        }
                    }
