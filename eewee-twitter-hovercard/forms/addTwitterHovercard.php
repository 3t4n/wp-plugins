<?php
class form_add_twitterHovercard{
	
	function __construct(){}
	
	/**
	 *	Render form
	 */
	function getForm(){
		?>		
		<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			
                    <?php
                            $enabled = get_option( "eewee_twitterhovercard_val_enabled" );
                            $enabledChecked = "";
                            if( $enabled == "on" ){ $enabledChecked = "checked"; }
                            
							$expanded = get_option( "eewee_twitterhovercard_val_expanded" );
                            $expandedChecked = "";
                            if( $expanded == "on" ){ $expandedChecked = "checked"; }
                            
							$linkify = get_option( "eewee_twitterhovercard_val_linkify" );
                            $linkifyChecked = "";
                            if( $linkify == "on" ){ $linkifyChecked = "checked"; }
                            
							$infer = get_option( "eewee_twitterhovercard_val_infer" );
                            $inferChecked = "";
                            if( $infer == "on" ){ $inferChecked = "checked"; }

                            /*
                            $method = get_option( "eewee_twitterhovercard_val_method" );
                            $methodCheckedTW = $methodCheckedTWOG = "";
                            if( $method == "tw" ){
                                    $methodCheckedTW = "checked";
                            }else{
                                    $methodCheckedTWOG = "checked";
                            }
                            */
                    ?>                            

                    <div id="poststuff">
                        <div id="post-body" class="metabox-holder columns-2">

                            <div id="post-body-content">

                                <div id="eeweeTwitterHovercarddiv" class="stuffbox">
                                    <h3><label for="link_name">Twitter Hovercard</label></h3>
                                    <div class="inside">
                                        
                                        <table class="links-table" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                        <th scope="row"><label for='f-enabled'><?php _e('Enabled', 'eeweeTwitterHovercard') ?></label></th>
                                                        <td><input type='checkbox' id='f-enabled' name='f_enabled' <?php echo $enabledChecked; ?> /></td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for="f-apikey"><?php _e('API Key', 'eeweeTwitterHovercard') ?></label></th>
                                                        <td>
                                                            <input type='text' id='f-apikey' name='f_apikey' value='<?php form_option( "eewee_twitterhovercard_val_apikey" ); ?>' />
                                                            <p class="description">(ex: cQXGHvRve9bSrnDeWAX19w)</p>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for="f-version"><?php _e('Version', 'eeweeTwitterHovercard') ?></label></th>
                                                        <td>
                                                            <input type='text' id='f-version' name='f_version' value='<?php form_option( "eewee_twitterhovercard_val_version" ); ?>' /> 
                                                            <p class="description">(ex: 1)</p>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for='f-expanded'><?php _e('Expanded', 'eeweeTwitterHovercard') ?></label></th>
                                                        <td><input type='checkbox' id='f-expanded' name='f_expanded' <?php echo $expandedChecked; ?> /></td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for='f-linkify'><?php _e('Linkify', 'eeweeTwitterHovercard') ?></label></th>
                                                        <td><input type='checkbox' id='f-linkify' name='f_linkify' <?php echo $linkifyChecked; ?> /></td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for='f-infer'><?php _e('Infer', 'eeweeTwitterHovercard') ?></label></th>
                                                        <td><input type='checkbox' id='f-infer' name='f_infer' <?php echo $inferChecked; ?> /></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div><!-- /post-body-content -->


                            <div id="postbox-container-1" class="postbox-container">
                                <div id="side-sortables" class="meta-box-sortables ui-sortable">
                                    <div id="linksubmitdiv" class="postbox ">
                                        <div class="handlediv" title="Cliquer pour inverser."><br></div>
                                        <h3 class="hndle"><span>Enregistrer</span></h3>
                                        <div class="inside">
                                            <div class="submitbox" id="submitlink">

                                                <div id="major-publishing-actions">
                                                    <div id="publishing-action">
                                                        <input type="submit" name="btn_save" id="submit" class="button-primary" value="<?php _e('Update', 'eeweeTwitterHovercard') ?>" />    
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- postbox-container-1 -->

                        </div><!-- post-body -->
                    </div><!-- poststuff -->
                            
		</form>
		<?php
	}
	
}