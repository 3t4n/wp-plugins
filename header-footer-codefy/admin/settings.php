<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

?>
<div class="container-fluid">

    <div id="poststuff">    	
    	<div id="post-body" class="columns-2">
    		<?php
		    if ( isset( $this->message ) ) {
		        ?>
		        <div id="hfc_message" class="updated notice is-dismissible">
		        	<p><?php echo $this->message; ?></p>
		        </div>
		        <?php
		    }
		    if ( isset( $this->errorMessage ) ) {
		        ?>
		         <div id="hfc_message" class="error notice is-dismissible">
		        	<p><?php echo $this->errorMessage; ?></p>
		        </div>
		        <?php
		    }
		    ?>
    	
    		<div class="row no">
				<div class="col-md-10 col-sm-8 col-xs-8">
				    <h1><?php echo $this->plugin->displayName; ?><small> Free</small></h1>
				    <p class="lead"><small><?php _e('Add a specific script, text or any kind of code in header and footer to every page on your Wordpress blog.', $this->plugin->name) ?></small></p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-0 no">
				    <a href="https://www.rwstudio.com.br/header-footer-codefy" target="_blank"><img class="pull-right" src="<?php echo ($this->plugin->url .'/admin/img/logoplugin.png' );?>"></a>
				</div>
			</div>

    		<div id="post-body-content">
	                
                <div class="row no">
                    <h2><?php echo __( 'Settings' ); ?></h2>
                </div>
                 
                <div class="row no">
	                <form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo $this->plugin->url.'/admin/img/icontop.png' ;?>">
							
								<label for="<?php echo $this->plugin->prefix ?>head">
									<h4><?php _e( 'Scripts in Head', $this->plugin->name ); ?></h4>
									<p><?php _e( 'These scripts will be printed inside <code>&lt;head&gt;</code> tag.', $this->plugin->name ); ?></p>
								</label>
							</div>
							<div class="col-md-8">
								<textarea name="<?php echo $this->plugin->prefix ?>head" id="<?php echo $this->plugin->prefix ?>head" class="widefat" rows="6"><?php echo $this->admin_get_option('head'); ?></textarea>
							</div>
						</div>

						<div class="row no">
							<div class="col-md-4">
								<img src="<?php echo $this->plugin->url.'/admin/img/iconbottom.png' ;?>">
							
								<label for="<?php echo $this->plugin->prefix ?>footer">
									<h4><?php _e( 'Scripts in Footer', $this->plugin->name ); ?></h4>
									<p><?php _e( 'These scripts will be printed near to <code>&lt;/body&gt;</code> tag.', $this->plugin->name ); ?></p>
								</label>
							</div>
							<div class="col-md-8">
								<textarea name="<?php echo $this->plugin->prefix ?>footer" id="<?php echo $this->plugin->prefix ?>footer" class="widefat" rows="6"><?php echo $this->admin_get_option('footer'); ?></textarea>
							</div>
						</div>
						
						<div class="row">
							<div class="btn-group pull-right" role="group">
		                    	<?php wp_nonce_field( $this->plugin->name, $this->plugin->name.'_nonce' ); ?>
								<input name="submit" type="submit" class="btn btn-primary" value="<?php _e( 'Save', $this->plugin->name ); ?>" />

								<button type="reset" class="btn btn-secondary" onclick="return confirm('<?php _e( 'Do you really want to reset?', $this->plugin->name ); ?>')"><?php _e( 'Reset', $this->plugin->name ); ?></button>
							</div>
						</div>
					</form>
		                    
	            </div>

    		</div>

    		<!-- Sidebar -->
    		<div id="postbox-container-1" class="postbox-container">
    			<?php require_once( $this->plugin->folder . '/admin/sidebar.php' ); ?>
    		</div>
    	</div>
	</div>
</div>