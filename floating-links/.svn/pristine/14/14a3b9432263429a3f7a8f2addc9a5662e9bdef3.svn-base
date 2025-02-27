<?php

/**
* Admin View: Page - Floating Links
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div id="floating-links" class="fl">
	<div class="fl-wrapper">
		<div class="fl-header-wrapper">
			<div class="fl-header">
				<img class="fl-logo" src="<?php 
echo FLOATING_LINKS_URL . 'admin/assets/images/plugin-logo.png';
?>" alt="Floating Links logo">
				<div class="fl-header-left">
					<nav class="fl-header-menu">
						<ul>
							<li>
								<a class="active" href="<?php 
echo esc_url( admin_url( 'admin.php?page=floating_links' ) );
?>">
									<?php 
esc_html_e( 'Settings', 'floating-links' );
?>
								</a>
							</li>
							<li>
								<a href="<?php 
echo esc_url( fl_get_customizer_url() );
?>">
									<?php 
esc_html_e( 'Design', 'floating-links' );
?>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="fl-header-right">
					<a href="<?php 
echo esc_url( admin_url( 'admin.php?page=floating-links-social-icons' ) );
?>"><?php 
esc_html_e( 'Social Icons', 'floating-links' );
?></a>
					<?php 
if ( !fl_fs()->is_premium() ) {
    ?>
						<a href="<?php 
    echo esc_url( fl_fs()->get_upgrade_url() );
    ?>" class="button button-black" target="_blank"><?php 
    esc_html_e( 'Go Pro', 'floating-links' );
    ?></a>
					<?php 
}
?>
				</div>
			</div>
		</div>
		<div class="fl-content-wrapper">
			<div class="fl-settings-box">
				<div class="fl-settings-wrapper">
					<h3><?php 
esc_html_e( 'Visibility Control', 'floating-links' );
?></h3>
					<div id="fl-main-bar" class="fl-settings-container <?php 
echo esc_attr( $plan_class );
?>">
						<?php 
if ( $sort_order ) {
    foreach ( $sort_order as $item ) {
        $value = ( isset( $settings[$item] ) ? $settings[$item] : 'false' );
        ?>
								<div class="fl-setting" id="<?php 
        esc_attr_e( $item );
        ?>">
									<div class="fl-setting-label">
										<div class="fl-reorder-icon 
										<?php 
        if ( 'fl-free' == $plan_class ) {
            echo esc_attr( $plan_class );
            echo ' fl-modal-trigger';
        }
        ?>
										" 
								<?php 
        if ( 'fl-free' == $plan_class ) {
            ?>
											 href="#fl-drag-drop-upgrade" <?php 
        }
        ?>>
											<span title="<?php 
        esc_attr_e( 'Drag and drop to reorder', 'floating-links' );
        ?>" class="dashicons dashicons-sort"></span>
										</div>
										<?php 
        if ( $item == 'fl_next' ) {
            ?>
											<span><?php 
            esc_html_e( 'Next icon', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
										<?php 
        if ( $item == 'fl_prev' ) {
            ?>
											<span><?php 
            esc_html_e( 'Previous icon', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
										<?php 
        if ( $item == 'fl_random' ) {
            ?>
											<span><?php 
            esc_html_e( 'Random icon', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
										<?php 
        if ( $item == 'fl_top' ) {
            ?>
											<span><?php 
            esc_html_e( 'To top icon', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
										<?php 
        if ( $item == 'fl_bottom' ) {
            ?>
											<span><?php 
            esc_html_e( 'To bottom icon', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
										<?php 
        if ( $item == 'fl_home' ) {
            ?>
											<span><?php 
            esc_html_e( 'Home icon', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
										<?php 
        if ( $item == 'fl_copy_url' ) {
            ?>
											<span><?php 
            esc_html_e( 'Copy current URL', 'floating-links' );
            ?></span>
										<?php 
        }
        ?>
									</div>
									<div class="fl-setting-checkbox">
										<label class="fl-switch">
											<input type="checkbox" <?php 
        checked( 'true', $value );
        ?> id="<?php 
        echo esc_attr( $item );
        ?>_icon" data-option="<?php 
        echo esc_attr( $item );
        ?>" class="fl_options">
											<span class="fl-slider fl-round"></span>
										</label>
									</div>
								</div>
								<?php 
    }
}
?>
					</div>
				</div>
			</div>
			<div class="fl-settings-box">
				<div class="fl-settings-wrapper">
					<h3><?php 
esc_html_e( 'Advanced Settings', 'floating-links' );
?></h3>
					<div id="fl-main-bar" class="fl-settings-container">
						<div class="fl-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Minimizer', 'floating-links' );
?></span>
								<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
esc_attr_e( 'Enable show and hide feature for social bar', 'floating-links' );
?>."></span>
							</div>
							<div class="fl-setting-checkbox">
								<label class="fl-switch">
									<input type="checkbox" 
									<?php 
if ( isset( $settings['fl_minimizer'] ) ) {
    checked( 'true', $settings['fl_minimizer'] );
}
?>
									 id="fl_minimizer_icon" data-option="fl_minimizer" class="fl_options">
									<span class="fl-slider fl-round"></span>
								</label>
							</div>
						</div>
						<div class="fl-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Pages pagination', 'floating-links' );
?></span>
								<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
esc_attr_e( 'The floating links will display on pages(post type)', 'floating-links' );
?>."></span>
							</div>
							<div class="fl-setting-checkbox">
								<label class="fl-switch">
									<input type="checkbox" 
									<?php 
if ( isset( $settings['fl_pages_pagination'] ) ) {
    checked( 'true', $settings['fl_pages_pagination'] );
}
?>
									 id="fl_pages_pagination" data-option="fl_pages_pagination" class="fl_options">
									<span class="fl-slider fl-round"></span>
								</label>
							</div>
						</div>
						<div class="fl-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Navigate in same category', 'floating-links' );
?></span>
								<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
esc_attr_e( 'The floating links will navigate within the currently viewed post category', 'floating-links' );
?>."></span>
							</div>
							<div class="fl-setting-checkbox">
								<label class="fl-switch">
									<input type="checkbox" 
									<?php 
if ( isset( $settings['fl_cat'] ) ) {
    checked( 'true', $settings['fl_cat'] );
}
?>
									 id="fl_cat" data-option="fl_cat" class="fl_options">
									<span class="fl-slider fl-round"></span>
								</label>
							</div>
						</div>
						<div class="fl-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Hide on load', 'floating-links' );
?></span>
								<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
esc_attr_e( 'The floating links will be minimized on page load', 'floating-links' );
?>."></span>
							</div>
							<div class="fl-setting-checkbox">
								<?php 
if ( 'fl-free' == $plan_class ) {
    ?>
									<label class="fl-switch fl-modal-trigger" href="#fl-hide-default-upgrade">
										<input type="checkbox">
										<span class="fl-slider fl-round"></span>
									</label>
								<?php 
}
?>
							</div>
						</div>
                        <div class="fl-setting">
                            <div class="fl-setting-label">
                                <span><?php 
esc_html_e( 'Float or Fixed', 'floating-links' );
?></span>
                                <span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
esc_attr_e( 'The floating links will float if visitor moves down the page', 'floating-links' );
?>."></span>
                            </div>
                            <div class="fl-setting-checkbox">
								<?php 
if ( 'fl-free' == $plan_class ) {
    ?>
                                    <label class="fl-switch fl-modal-trigger" href="#fl-float-upgrade">
                                        <input type="checkbox">
                                        <span class="fl-slider fl-round"></span>
                                    </label>
								<?php 
}
?>
                            </div>
                        </div>
						<div class="fl-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Post data', 'floating-links' );
?></span>
								<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
esc_attr_e( 'When hovering over the icon, the post/page details, including the title, content, and featured image, will be displayed', 'floating-links' );
?>."></span>
							</div>
							<div class="fl-setting-checkbox">
								<label class="fl-switch">
									<input type="checkbox" 
									<?php 
if ( isset( $settings['fl_post_data'] ) ) {
    checked( 'true', $settings['fl_post_data'] );
}
?>
									 id="fl_post_data" data-option="fl_post_data" class="fl_options">
									<span class="fl-slider fl-round"></span>
								</label>
							</div>
						</div>
						<div 
						<?php 
if ( $settings['fl_post_data'] !== 'true' ) {
    ?>
							 style="display: none" <?php 
}
?> class="fl-setting fl-post-data-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Featured Image', 'floating-links' );
?></span>
							</div>
							<div class="fl-setting-checkbox">
								<?php 
if ( 'fl-free' == $plan_class ) {
    ?>
									<label class="fl-switch fl-modal-trigger" href="#fl-feat-img-upgrade">
										<input type="checkbox">
										<span class="fl-slider fl-round"></span>
									</label>
								<?php 
}
?>
							</div>
						</div>
						<div 
						<?php 
if ( $settings['fl_post_data'] !== 'true' ) {
    ?>
							 style="display: none" <?php 
}
?>  class="fl-setting fl-post-data-setting">
							<div class="fl-setting-label">
								<span><?php 
esc_html_e( 'Date', 'floating-links' );
?></span>
							</div>
							<div class="fl-setting-checkbox">
								<label class="fl-switch">
									<input type="checkbox" 
									<?php 
if ( isset( $settings['fl_post_data_date'] ) ) {
    checked( 'true', $settings['fl_post_data_date'] );
}
?>
									 id="fl_post_data_date" data-option="fl_post_data_date" class="fl_options">
									<span class="fl-slider fl-round"></span>
								</label>
							</div>
						</div>
						<?php 
if ( 'fl-free' == $plan_class ) {
    ?>
							<div class="fl-setting">
								<div class="fl-setting-label">
									<span><?php 
    esc_html_e( 'Display after some scroll', 'floating-links' );
    ?></span>
									<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
    esc_attr_e( 'The floating links bar will display scrolling defined % from top', 'floating-links' );
    ?>."></span>
								</div>
								<div class="fl-setting-checkbox">
									<label class="fl-switch fl-modal-trigger" href="#fl-scroll-upgrade">
										<input type="checkbox">
										<span class="fl-slider fl-round"></span>
									</label>
								</div>
							</div>
							<div class="fl-setting">
								<div class="fl-setting-label">
									<span><?php 
    esc_html_e( 'Display on specific pages', 'floating-links' );
    ?></span>
									<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
    esc_attr_e( 'The floating links bar will display on selected pages only', 'floating-links' );
    ?>."></span>
								</div>
								<div class="fl-setting-checkbox">
									<label class="fl-switch fl-modal-trigger" href="#fl-pages-upgrade">
										<input type="checkbox">
										<span class="fl-slider fl-round"></span>
									</label>
								</div>
							</div>
							<div class="fl-setting">
								<div class="fl-setting-label">
									<span><?php 
    esc_html_e( 'Display on specific posts', 'floating-links' );
    ?></span>
									<span class="dashicons dashicons-info-outline fl-tooltip" title="<?php 
    esc_attr_e( 'The floating links bar will display on selected posts only', 'floating-links' );
    ?>."></span>
								</div>
								<div class="fl-setting-checkbox">
									<label class="fl-switch fl-modal-trigger" href="#fl-posts-upgrade">
										<input type="checkbox">
										<span class="fl-slider fl-round"></span>
									</label>
								</div>
							</div>
						<?php 
}
?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="fl-notification-holder"><?php 
esc_html_e( 'Saved', 'floating-links' );
?></div>

	<?php 
if ( fl_fs()->is_free_plan() ) {
    ?>
        <div id="fl-float-upgrade" class="fl-modal fadeIn">
            <div class="fl-modal-content">
                <div class="fl-modal-wraper">
                    <span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
                    <h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
                    <p>
						<?php 
    esc_html_e( 'Unlock the Full Experience! The float/fixed feature is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
                    </p>
                    <p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
						<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
                            <code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
						<?php 
    }
    ?>
                    </p>
                    <hr/>
                    <a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
						<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
                    </a>
                </div>
            </div>
        </div>
		<div id="fl-drag-drop-upgrade" class="fl-modal fadeIn">
			<div class="fl-modal-content">
				<div class="fl-modal-wraper">
					<span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
					<h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
					<p>
						<?php 
    esc_html_e( 'Unlock the Full Experience! The drag and drop feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
					</p>
					<p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
						<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
							<code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
						<?php 
    }
    ?>
					</p>
					<hr/>
					<a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
						<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
					</a>
				</div>
			</div>
		</div>
		<div id="fl-hide-default-upgrade" class="fl-modal fadeIn">
		<div class="fl-modal-content">
			<div class="fl-modal-wraper">
				<span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
				<h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
				<p>
					<?php 
    esc_html_e( 'Unlock the Full Experience! The hide on load feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
				</p>
				<p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
					<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
						<code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
					<?php 
    }
    ?>
				</p>
				<hr/>
				<a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
					<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
				</a>
			</div>
		</div>
	</div>
		<div id="fl-feat-img-upgrade" class="fl-modal fadeIn">
		<div class="fl-modal-content">
			<div class="fl-modal-wraper">
				<span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
				<h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
				<p>
					<?php 
    esc_html_e( 'Unlock the Full Experience! The featured image feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
				</p>
				<p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
					<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
						<code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
					<?php 
    }
    ?>
				</p>
				<hr/>
				<a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
					<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
				</a>
			</div>
		</div>
	</div>
		<div id="fl-scroll-upgrade" class="fl-modal fadeIn">
			<div class="fl-modal-content">
				<div class="fl-modal-wraper">
					<span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
					<h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
					<p>
						<?php 
    esc_html_e( 'Unlock the Full Experience! The display on scroll feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
					</p>
					<p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
						<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
							<code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
						<?php 
    }
    ?>
					</p>
					<hr/>
					<a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
						<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
					</a>
				</div>
			</div>
		</div>
		<div id="fl-posts-upgrade" class="fl-modal fadeIn">
			<div class="fl-modal-content">
				<div class="fl-modal-wraper">
					<span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
					<h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
					<p>
						<?php 
    esc_html_e( 'Unlock the Full Experience! The display on selected posts feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
					</p>
					<p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
						<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
							<code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
						<?php 
    }
    ?>
					</p>
					<hr/>
					<a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
						<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
					</a>
				</div>
			</div>
		</div>
		<div id="fl-pages-upgrade" class="fl-modal fadeIn">
			<div class="fl-modal-content">
				<div class="fl-modal-wraper">
					<span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
					<h5><?php 
    esc_html_e( 'Premium Feature', 'floating-links' );
    ?></h5>
					<p>
						<?php 
    esc_html_e( 'Unlock the Full Experience! The display on pages feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!', 'floating-links' );
    ?>
					</p>
					<p><?php 
    esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' );
    ?></br>
						<?php 
    if ( $upgrade_info['coupon'] ) {
        ?>
							<code><?php 
        esc_html_e( $upgrade_info['coupon'] );
        ?></code>
						<?php 
    }
    ?>
					</p>
					<hr/>
					<a href="<?php 
    echo esc_url( $upgrade_info['btn_url'] );
    ?>" class="btn">
						<?php 
    esc_html_e( $upgrade_info['btn_text'] );
    ?>
					</a>
				</div>
			</div>
		</div>
	<?php 
}
?>
</div>
