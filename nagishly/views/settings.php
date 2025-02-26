<div class="wrap">
    <h2><?php echo $this->plugin->displayName; ?> &raquo; <?php _e( 'Settings', $this->plugin->name ); ?></h2>

    <?php
    if ( isset( $this->message ) ) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>
        <?php
    }
    if ( isset( $this->errorMessage ) ) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>
        <?php
    }
    ?>

    <div id="poststuff">
    	<div id="post-body" class="metabox-holder columns-2">
    		<!-- Content -->
    		<div id="post-body-content">
                <div id="ngly-about">
                    <img src="<?php echo $this->plugin->url ?>/images/nagishly-logo.png">
                    <p>
                       <?php echo __('Nagishly is the only website accessibility system in the world that uses AI technology in order to provide fully automatic accessibility for any website at the AA standard and with full compliance with the accessibility law.<br>All the above comes with a full client guarantee and at a one-time cost of 930 NIS.','nagishli'); ?>

                    </p>
                </div>
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	                <div class="postbox">
	                    <h3 class="hndle"><?php _e( 'Settings', $this->plugin->name ); ?></h3>

	                    <div class="inside">
		                    <form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
		                    	<p>
		                    		<label for="ngly_insert_footer"><strong><?php _e( 'Please insert the script you got from <a href="https://nagishly.co.il/">www.nagishly.co.il</a> here.', $this->plugin->name ); ?></strong></label>
		                    		<textarea name="ngly_insert_footer" id="ngly_insert_footer" class="widefat" rows="8" style="font-family:Courier New;"><?php echo $this->settings['ngly_insert_footer']; ?></textarea>
		                    		<?php _e( 'The Script will be implemented above the <code>&lt;/body&gt;</code> tag in your website.', $this->plugin->name ); ?>
		                    	</p>
		                    	<?php wp_nonce_field( $this->plugin->name, $this->plugin->name.'_nonce' ); ?>
		                    	<p>
									<input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e( 'Save', $this->plugin->name ); ?>" />
								</p>
						    </form>
	                    </div>
	                </div>
	                <!-- /postbox -->
				</div>
				<!-- /normal-sortables -->
    		</div>
    		<!-- /post-body-content -->

    		<!-- Sidebar -->
    		<div id="postbox-container-1" class="postbox-container">
    			<?php require_once( $this->plugin->folder . '/views/sidebar.php' ); ?>
    		</div>
    		<!-- /postbox-container -->
    	</div>
	</div>
</div>