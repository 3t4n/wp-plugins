<?php

/**
* View: Floating Links
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="floating_next_prev_wrap <?php 
echo esc_attr( $scroll_class );
echo esc_attr( $float );
?> fl_primary_bar fl_<?php 
echo esc_attr( $position );
?>">
	<div class="floating_links">
		<div id="fl_inner_primary_wrap" class="fl_inner_wrap <?php 
echo esc_attr_e( $minimized );
?>">
            <div class="fl-wrapper">
			<?php 
if ( $sort_order ) {
    $i = 0;
    foreach ( $sort_order as $id ) {
        if ( isset( $settings[$id] ) && 'false' == $settings[$id] || !isset( $settings[$id] ) ) {
            continue;
        }
        $enabled = $settings[$id];
        // if page pagination is disabled, don't show next/prev/random
        if ( isset( $settings['fl_pages_pagination'] ) && 'false' == $settings['fl_pages_pagination'] && !is_single() ) {
            if ( in_array( $id, $this->is_url_dependent() ) ) {
                $i++;
                continue;
            }
        }
        $icon_settings = $this->get_icon_settings( $id, $post_type );
        $disabled = '';
        if ( !isset( $icon_settings['additional_data'] ) || empty( $icon_settings['additional_data'] ) ) {
            if ( in_array( $id, $this->is_url_dependent() ) ) {
                $disabled = 'disabled ';
            }
        }
        ?>
					<a id="<?php 
        echo esc_attr( $id );
        ?>" <?php 
        if ( 'fl_copy_url' === $id ) {
            ?> data-clipboard-text="<?php 
            echo esc_url( $current_page_url );
            ?>" <?php 
        }
        if ( isset( $icon_settings['url'] ) && !empty( $icon_settings['url'] ) ) {
            ?> href="<?php 
            echo esc_url( $icon_settings['url'] );
            ?>"<?php 
        }
        ?>
							class="<?php 
        echo esc_attr( $disabled );
        echo esc_attr( $id );
        ?> fl_icon_holder">
                        <span class="fl-icon-wrapper">
						<?php 
        if ( isset( $icon_settings['icon'] ) && !empty( $icon_settings['icon'] ) ) {
            if ( strpos( $icon_settings['icon'], 'dashicons' ) !== false ) {
                ?>
								<i class="<?php 
                echo esc_attr( $id );
                ?>_icon <?php 
                echo esc_attr( $icon_settings['icon'] );
                ?>"></i>
						<?php 
            } else {
                ?>
								<i class="<?php 
                echo esc_attr( $id );
                ?>_icon fa fa-<?php 
                echo esc_attr( $icon_settings['icon'] );
                ?>"></i>
								<?php 
            }
        }
        ?>
                            </span>
						<?php 
        if ( isset( $settings['fl_post_data'] ) && 'true' == $settings['fl_post_data'] && isset( $icon_settings['additional_data'] ) && !empty( $icon_settings['additional_data'] ) ) {
            $additional_data = $icon_settings['additional_data'];
            $has_feat_img = false;
            ?>
							<div class="fl_post_details <?php 
            echo esc_attr( $has_feat_img );
            ?>">
								<?php 
            ?>
								<div class="fl_post_title">
									<?php 
            if ( isset( $icon_settings['label'] ) && !empty( $icon_settings['label'] ) ) {
                ?>
										<small><?php 
                echo esc_html( $icon_settings['label'] );
                ?></small>
										<?php 
            }
            if ( isset( $settings['fl_post_data_date'] ) && 'true' == $settings['fl_post_data_date'] ) {
                $date = get_the_date( get_option( 'date_format', false ), $additional_data['ID'] );
                if ( $date ) {
                    ?>
											<span class="fl_post_date"><?php 
                    echo esc_html( $date );
                    ?></span>
											<?php 
                }
            }
            ?>
								</div>
								<div class="fl_post_description">
									<?php 
            if ( isset( $additional_data['post_title'] ) && !empty( $additional_data['post_title'] ) ) {
                ?>
										<h6><?php 
                echo esc_html( $additional_data['post_title'] );
                ?></h6>
									<?php 
            }
            ?>
									<?php 
            if ( isset( $additional_data['post_content'] ) && !empty( $additional_data['post_content'] ) ) {
                ?>
										<p><?php 
                echo esc_html( wp_trim_words( $additional_data['post_content'], 20 ) );
                ?></p>
									<?php 
            }
            ?>
								</div>
							</div>
							<?php 
        }
        ?>
					</a>
					<?php 
    }
}
?>
		</div>
        </div>
		<?php 
if ( isset( $settings['fl_minimizer'] ) && 'true' == $settings['fl_minimizer'] ) {
    $icon_setting = $this->get_icon_settings( 'fl_minimizer', $post_type );
    ?>
			<div id="fl_slimer_primary_wrap" class="fl_slimer_Wrap 
			<?php 
    if ( isset( $icon_setting['default_minimized'] ) && 'true' == $icon_setting['default_minimized'] ) {
        ?>
				fl-close <?php 
    }
    ?>" title="<?php 
    esc_html_e( 'open/close Floating bar', 'floating-links' );
    ?>">
				<?php 
    if ( isset( $icon_setting['icon'] ) && !empty( $icon_setting['icon'] ) ) {
        if ( strpos( $icon_setting['icon'], 'dashicons' ) !== false ) {
            ?>
						<i class="fl_slimmer_icon fl_minimizer_icon <?php 
            echo esc_attr( $icon_setting['icon'] );
            ?>"></i>
					<?php 
        } else {
            ?>
						<i class="fl_slimmer_icon fl_minimizer_icon fa fa-<?php 
            echo esc_attr( $icon_setting['icon'] );
            ?>"></i>
						<?php 
        }
    }
    if ( isset( $icon_setting['open_icon'] ) && !empty( $icon_setting['open_icon'] ) ) {
        if ( strpos( $icon_setting['open_icon'], 'dashicons' ) !== false ) {
            ?>
						<i class="fl_slimer_close_icon fl_hide <?php 
            echo esc_attr( $icon_setting['open_icon'] );
            ?>"></i>
					<?php 
        } else {
            ?>
						<i class="fl_slimer_close_icon fl_hide fa fa-<?php 
            echo esc_attr( $icon_setting['open_icon'] );
            ?>"></i>
						<?php 
        }
    }
    ?>
			</div>
		<?php 
}
?>
	</div>
    <?php 
if ( 'true' == $settings['fl_copy_url'] ) {
    ?>
        <div class="fl_copied">
            <span><?php 
    esc_html_e( 'Copied!', 'floating-links' );
    ?></span>
        </div>
    <?php 
}
?>
</div>
