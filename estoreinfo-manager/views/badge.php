<div class="wrap">
    <h2><?php echo $this->plugin->displayName; ?> &raquo; <?php _e( 'Insert Badges', $this->plugin->name ); ?></h2>

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
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	                <div class="postbox">
	                    <h3 class="hndle"><?php _e( 'Insert Badges', $this->plugin->name ); ?></h3>

	                    <div class="inside">
		                    <form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">		                    	
		                    	<p>
		                    		<!--<label for="estbadge_insert_footer"><strong><?php //_e( 'Paste eStoreInfo Badges Script here', $this->plugin->name ); ?></strong></label>-->
		                    		<textarea name="estbadge_insert_footer" id="estbadge_insert_footer" class="widefat" rows="8" style="font-family:Courier New;" placeholder="=== Paste eStoreInfo Badges Scripts here ==="><?php echo $this->settings['estbadge_insert_footer']; ?></textarea>
		                    		<?php _e( 'These scripts will be printed above the <code>&lt;/body&gt;</code> tag.', $this->plugin->name ); ?>
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