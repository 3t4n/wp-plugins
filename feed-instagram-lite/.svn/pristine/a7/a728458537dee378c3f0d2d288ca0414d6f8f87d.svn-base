<?php

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Please do not load this file directly!' );
}

function gifeed_instagram_settings_page()
{

    ob_start();?>

	<div class="wrap about-wrap gifeed-class">
		<h1><?php printf( esc_html__( 'Welcome to %s', 'feed-instagram-lite' ), IFLITE_ITEM_NAME );?></h1>
		<div class="about-text"><?php printf( esc_html__( 'Thank you for installing this plugin. %s is ready to make your Instagram media more stunning and more elegant!', 'feed-instagram-lite' ), IFLITE_ITEM_NAME );?></div>
		<div id="settingpage" class="gifeed-badge">Version <?php echo IFLITE_VERSION; ?></div>
		<hr style="margin-bottom:20px;">

		<p id="toscroll" style="font-style:italic; color:rgb(225, 35, 35); border-bottom: 1px dotted #CCC; margin-top: 45px; padding-bottom: 5px;"><span class="dashicons dashicons-megaphone"></span>&nbsp;&nbsp;<?php _e( 'You need an Access Token from Instagram in order to be able to display Instagram media. MAKE SURE to log in to Instagram first, after that simply click the red button below and hit Authorize button.', 'feed-instagram-lite' );?></p>

		<div id="gifeed_config" class="fil-token-list">
			<div class="fil-token-gen-box">
				<span class="fil-token-gen-box-close">&times;</span>
				<input type="text" class="fil-token-gen-username" placeholder="<?php esc_attr_e( 'Your Instagram Username', 'feed-instagram-lite' );?>">
				<span data-nonce="<?php echo wp_create_nonce( 'fil_instagram_at_nonce' ); ?>" class="fil-generate-now"><?php _e( 'Generate', 'feed-instagram-lite' );?></span>
				</div>
			<span class="gifeed_generate_token_button"><?php _e( 'Generate Access Token', 'feed-instagram-lite' );?></span>
            <hr style="margin-top:20px;">
            <div class="fil-each-token-cont">
            <span class="fil_token_tbl_usr"><?php _e( 'Username', 'feed-instagram-lite' );?></span><span class="fil_token_tbl_token"><?php _e( 'Access Token', 'feed-instagram-lite' );?></span><span class="fil_token_tbl_action"><?php _e( 'Action', 'feed-instagram-lite' );?></span>
            <div class="fil-each-token-list">
			 <?php

    $users = get_option( 'ghozylab_instagram_feed_options' );

    if ( ! empty( $users['users'] ) ) {

        foreach ( $users['users'] as $key => $val ) {

			$pp_img = ( isset( $val['profile_picture'] ) ? $val['profile_picture'] : 'https://assets.ghozylab.com/images/instagram/default-avatar.png' );

            if ( isset( $val['access_token'] ) ) {
                echo '<div data-token-id="'.esc_attr( $key ).'" class="fil_each_token"><div class="fil_token_pp"><img class="fil_pp_img" src="'.esc_attr( $pp_img ).'"><span class="fil_user_img_picker button">Set Image</span></div><div class="fil_token_details"><span class="fil_token_dtl fil_token_usr">'.esc_html( $val['username'] ).'</span><span class="fil_token_dtl fil_token_token">'.esc_html( substr( $val['access_token'], 0, 48 ).'...' ).'</span><span class="fil_token_dtl fil_token_delete dashicons dashicons-trash"></span></div></div>';
            }

        }

    } else {

        if ( ! isset( $users['users'] ) && isset( $users['access_token'] ) ) {

            echo '<div class="gifeed-notify notify-overlay">
						<div class="popup">
							<!--<span class="notity_close dashicons dashicons-dismiss"></span>-->
							<div class="header">
								<h1 class="entry-title">Instagram API Changes</h1>
							</div>
							<div class="gifeed-entry-container">
								<div class="gifeed-entry-content">
									<p>Dear Member, for your information that Instagram announced a depreciation of the Basic Permission for
										its Legacy API Platform and provided
										directions on how this changes impact users and also third-party developers in providing tools (
										<i>plugins</i> ) for generating and displaying Instagram content.</p>
									<p>On the 29th of June 2020, Instagram will stop using the old API ( <i>Basic Permission</i> ). All
										third-party apps using this will no longer be able to display photos from any account if they don’t
										switch to the new API after this date.</p>
									<P><a class="link_me"
											href="https://developers.facebook.com/blog/post/2019/10/15/launch-instagram-basic-display-api/"
											target="_blank">Learn more about this information here</a></P>
									<p>The good news is this plugin supports the new Instagram API but <span class="pay_attention">all
											accounts
											will need to be reconnected</span> from this plugin in order for those feeds to continue
										displaying
										new posts.</p>
									<h3>Here Are a Few Steps to Reconnect Your Accounts</h3>
									<hr />
									<div class="steps_parent">
										<ol>
											<li>Click this link: <a class="link_me" href="'.gifeed_get_oauth_link().'"
													target="_self">Generate Access Token</a> and you will be redirected to
												Instagram</li>
											<li>Log in to the Instagram account that you would like to reconnect. After you are logged in,
												just
												click blue button labeled "Continue"</li>
											<li>Wait a seconds and you will be redirected back to this page and you will find that your
												account
												is
												already connected</li>
											<li>Now you can edit your current feeds <a class="link_me"
													href="'.get_admin_url().'edit.php?post_type=ginstagramfeed" target="_blank">from
													here</a> and re-select an account that you would like to display the
												feeds</li>
											<li>DONE</li>
										</ol>
									</div>
									<h3>Some Features Deprecated if You Use Instagram Personal Accounts</h3>
									<hr />
									<ul class="missing_features">
										<li>Like and comment counts for posts</li>
										<li>Post comments</li>
										<li>Number of followers for an account</li>
									</ul>
									<p class="recommend_you">We recommend you to switch your Instagram account type to business and connect
										to
										Instagram Graph API to be able to use the three features above. You can <a class="link_me"
											href="https://ghozy.link/ea5hk" target="_blank">learn more here</a> to change it.</p>
								</div>
							</div>
						</div>
					</div>';
        }

    }

    ?>
             	<span class="fil_no_token"><?php _e( 'No Access Token', 'feed-instagram-lite' );?></span>
              </div>
			 </div>
		 </div>

		<div class="feature-section fil-sections">
			<h1 id="gfonts_section" style="font-size:26px;margin-bottom:20px;"><span class="dashicons dashicons-admin-generic" style="margin: 7px 10px 0px 0px;"></span><?php _e( 'General Settings', 'feed-instagram-lite' );?><span class="update_notify"></span></h1>
			<p class="faq-question"><span class="dashicons dashicons-admin-tools" style="margin-right: 5px;margin-top: 2px;"></span><?php _e( 'Plugin Auto Update', 'feed-instagram-lite' );?></p>
			<p class="opt-desc"><?php _e( 'We recommend you to enable this option to get the latest features and other important updates of this plugin.', 'feed-instagram-lite' );?></p>
			<div class="gifeed-opt-cont">
			<?php $gifeed_opt_updt = gifeed_opt( 'gif_instagram_opt_autoupdate' );?>
				<input type="radio" data-nonce="<?php echo wp_create_nonce( 'gif_instagram_opt_autoupdate' ); ?>" data-opt="gif_instagram_opt_autoupdate" name="gif_instagram_opt_autoupdate" <?php echo $gifeed_opt_updt == 'active' ? 'checked="checked"' : ''; ?> value="active"><label style="vertical-align: baseline;"><?php _e( 'Enable', 'feed-instagram-lite' );?></label>
				<input type="radio" data-nonce="<?php echo wp_create_nonce( 'gif_instagram_opt_autoupdate' ); ?>" data-opt="gif_instagram_opt_autoupdate" name="gif_instagram_opt_autoupdate" <?php echo $gifeed_opt_updt == 'inactive' ? 'checked="checked"' : ''; ?> style="margin-left: 10px;" value="inactive"><label style="vertical-align: baseline;"><?php _e( 'Disable', 'feed-instagram-lite' );?></label>
				<span class="update_notify"></span>
			</div>
		</div>


	</div>
	<!-- Content End -->
		<?php
	echo ob_get_clean();
	
}