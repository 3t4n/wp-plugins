<?php
/**
 * Active Campaign settings for Contact Form 7
 * 
 */

if (!defined('ABSPATH'))
    exit;

if(!class_exists('CWW_Connector_Lite_Active_Campaign_Settings')){
	class CWW_Connector_Lite_Active_Campaign_Settings{

		public function __construct(){

	        add_filter( 'wpcf7_editor_panels', array($this, 'cww_tab'),10,1);
	        add_action('save_post_wpcf7_contact_form', array($this, 'save_contact_form_seven_ac_settings'));
			add_action( 'wpcf7_admin_footer',array($this,'cww_pro_features') );
		}

		public function cww_tab($panels){
			$panels['activecampaign-panel'] = array( 
	            'title'     => __( 'Active Campaign', 'cww-connector-lite' ),
	            'callback'  => array($this, 'cww_tab_callback')
	        );
	        return $panels;
		}

		public function save_contact_form_seven_ac_settings($post_id){
			if( isset($_POST['cww_fields'])){
				update_post_meta( $post_id,'cww_fields', trim(sanitize_text_field($_POST['cww_fields'])) ) ;
			}else{
				return;
			}
			
			
			if(isset($_POST['cww_enable'])){
				update_post_meta($post_id,'cww_enable','yes');
			}else{
				update_post_meta($post_id,'cww_enable','no');
			}
			
			$ac['url']          = isset($_POST['cww_url']) ? trim(sanitize_text_field($_POST['cww_url'])) : '';
			$ac['api_key']      = isset($_POST['cww_api_key']) ? trim(sanitize_text_field($_POST['cww_api_key'])) : '';
			$ac['list_id']     	= isset($_POST['cww_list_id']) ? trim(absint($_POST['cww_list_id'])) : '';
			
			update_post_meta($post_id,'cww_credentials',$ac);
		}

       

		public function cww_pro_features(){ ?>

			<div class="cww-pro postbox">
				<h3><?php esc_html_e('Premium Features','cww-connector-lite'); ?></h3>
				<ul>
					<li><?php esc_html_e('GDPR Compliance.','cww-connector-lite');?></li>
					<li><?php esc_html_e('Add Contacts to multiple lists.','cww-connector-lite');?></li>
					<li><?php esc_html_e('Unlimited custom fields.','cww-connector-lite');?></li>
					<li><?php esc_html_e('Option to add tags.','cww-connector-lite');?></li>
					<li><?php esc_html_e('Supports Contact Form 7 Special Mail Tags.','cww-connector-lite');?></li>
				</ul>
				<div class="upgrade-btn-wrapper">
					<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" class="cww-upgrade" target="_blank"><?php esc_html_e('Buy Now - $19 only','cww-connector-lite')?></a>
				</div>
			</div>
	<?php }

		public function cww_tab_callback(){

			global $post;
			
            $post_id    = isset($_GET['post']) ? trim(sanitize_text_field($_GET['post'])) : '';
	        $cf7        = WPCF7_ContactForm::get_instance($post_id);
	        $tags       = '';

	        if(!empty($cf7)){
	        	$tags = $cf7->collect_mail_tags();
	        }
	        
	        $enable = get_post_meta($post_id,'cww_enable',true);
			
	        ?>
			

	        <div id="cww-connector-settings" class="cww-connector-settings">
	        	<h2><?php echo esc_html__("Active Campaign Setttings","cww-connector-lite"); ?></h2>

				<h3>
					<input type="checkbox" name="cww_enable" id="connector_enable" value="yes" <?php echo (($enable=='yes')?'checked':''); ?> >
					<label for="connector_enable">
						<?php echo esc_html__("Connect This Form To ActiveCampaign.","cww-connector-lite"); ?>
					</label>
				</h3><hr>

				<div class="cww-connector-settings-tab clearfix">
					<ul class="tab-wrap clearfix">
						<li class="tab active" data-id="general">
							<?php echo esc_html__('General Settings','cww-connector-lite'); ?>
						</li>
						<li class="tab" data-id="form-fields">
							<?php echo esc_html__('Form Fields','cww-connector-lite'); ?>
						</li>
					</ul>
				</div>

	        <div id="cww_enable">

            <div class="cww-main-settings tab-pane general general-settings-section">
		        <h1><?php echo __("Active Campaign Settings","cww-connector-lite"); ?></h1>
		        <?php
		        $ac = get_post_meta($post_id,'cww_credentials',true);
		        ?>
		        <div class="setting-wrapp">
		        	<label for="cww_url"><?php echo __("Active Campaign API URL","cww-connector-lite"); ?></label>
		        	<input type="text" name="cww_url" class="widefat" id="cww_url" value="<?php echo (isset($ac['url']) ?  esc_url($ac['url']) : '' ); ?>">
				</div>

		        <div class="setting-wrapp">
					<label for="cww_api_key"><?php echo __("Active Campaign API KEY","cww-connector-lite"); ?></label>
					<div class="input-wrapper">
						<input type="password" name="cww_api_key" class="widefat" id="cww_api_key" value="<?php echo (isset($ac['api_key']) ?  esc_attr($ac['api_key']) : '' ); ?>">
						<a href="javascript:void(0)" class="activecampaign-key-show button">
							<span class="show"><?php esc_html_e('Show Key','cww-connector-lite'); ?></span>
							<span class="hide" style="display:none"><?php esc_html_e('Hide Key','cww-connector-lite'); ?></span>
						</a>
					</div>
				</div>

				<div class="setting-wrapp">
	            	<label for="cww_list_id"><?php echo __("ActiveCampaign Email List ID","cww-connector-lite"); ?></label>
					<em><?php echo sprintf(esc_html__( 'Follow the tutorial to get list ID %s.', 'cww-connector-lite' ),'<a href="http://support.exitbee.com/email-marketing-crm-integrations/how-to-find-your-activecampaign-list-id" target="_blank">this</a>');?></em>
            		<input type="number" name="cww_list_id" class="widefat" id="cww_list_id" value="<?php echo (isset($ac['list_id']) ?  esc_attr($ac['list_id']) : '' ); ?>">
				</div>

				<div class="pro-feature-wrapp">
					<p class="pro-desc-text"><?php echo __("Unlimited list option is available in premium version.","cww-connector-lite"); ?>
						<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" target="_blank"><?php esc_html_e('Upgrade Now - $19 only','cww-connector-lite');?></a>
					</p>
					<div class="pro-feature-inner">
						<label for="cww_list_id"><?php echo __("Active Campaign Email List IDs","cww-connector-lite"); ?></label>
						<em style="padding:0"><?php echo __("You Must Add List Id to add contacts in your Active Campiagn Lists.","cww-connector-lite"); ?></em>

						<div class="contacts-meta-section-wrapper">
						
						<span class="add-button table-contacts">
							<a href="javascript:void(0)" class="activecampaign-list-id-show button"><?php esc_html_e('View Lists ID','cww-connector-lite'); ?></a>
						</span>
							
						<span class="add-button table-contacts"><a href="javascript:void(0)" class="docopy-table-list button button-primary"><?php esc_html_e('Add More List','cww-connector-lite'); ?></a></span>
					</div>
				</div>
			</div>

            </div><!-- General Settings End -->

	        <div class="cww-main-settings tab-pane form-fields clearfix" style="display:none">
	            
			<?php if(!empty($tags)){ ?>

		        	<h1><?php echo __("Select form fields","cww-connector-lite"); ?></h1>
		            
					<?php $fields = get_post_meta($post_id,'cww_fields',true); ?>

		            <div class="form-fields cww-flex">
						<div class="label-wrapp">
							<label for="cww_email" class="fleft"><?php echo __("Email Field* : ","cww-connector-lite"); ?></label>
							<p><?php echo __("Email field is required.","cww-connector-lite"); ?></p>
						</div>
						
			            <select name="cww_fields[cww_email]" id="cww_email" class="fleft">
							<option value=""><?php echo __("Select field name for email","cww-connector-lite"); ?></option>
							<?php
							foreach ($tags as $key => $tag) {
								$selected='';
								if( isset($fields['cww_email']) && $fields['cww_email'] == $tag )
									$selected = 'selected';

								echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_html($tag).'</option>';
							}
							?>
			            </select>
		            </div>

                    <div class="form-fields cww-flex">
						<div class="label-wrapp">
		            		<label for="cww_first_name" class="fleft"><?php echo __("First Name Field : ","cww-connector-lite"); ?></label>
						</div>
			            <select name="cww_fields[cww_first_name]" id="cww_first_name" class="fleft">
			            <option value=""><?php echo __("Select field name for first name","cww-connector-lite"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected='';
			                if(isset($fields['cww_first_name']) && $fields['cww_first_name']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_html($tag).'</option>';
			            }
			            ?>
			            </select>
                    </div>

                    <div class="form-fields cww-flex">
						<div class="label-wrapp">
			            	<label for="cww_last_name" class="fleft"><?php echo __("Last Name Field : ","cww-connector-lite"); ?></label>
						</div>
			            <select name="cww_fields[cww_last_name]" id="cww_last_name" class="fleft">
			            <option value=""><?php echo __("Select field name for last name","cww-connector-lite"); ?></option>
			            <?php
			            foreach ( $tags as $key => $tag ) {
			                $selected = '';
			                if( isset($fields['cww_last_name']) && $fields['cww_last_name'] == $tag )
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_html($tag).'</option>';
			            }
			            ?>
			           </select>
                   </div>
				   
                   <div class="form-fields cww-flex">
				   		<div class="label-wrapp">
			            	<label for="cww_phone" class="fleft"><?php echo __("Phone Number Field: ","cww-connector-lite"); ?></label>
						</div>
			            <select name="cww_fields[cww_phone]" id="cww_phone" class="fleft">
			            <option value=""><?php echo __("Select field name for Phone","cww-connector-lite"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected='';
			                if(isset($fields['cww_phone']) && $fields['cww_phone']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_html($tag).'</option>';
			            }
			            ?>
			            </select>
		            </div>

		            <div class="form-fields cww-flex">
						<div class="label-wrapp">
			            	<label for="cww_organization" class="fleft"><?php echo __("Organization Field : ","cww-connector-lite"); ?></label>
						</div>
			            <select name="cww_fields[cww_organization]" id="cww_organization" class="fleft">
			            <option value=""><?php echo __("Select field name for organization","cww-connector-lite"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected = '';
			                if( isset($fields['cww_organization']) && $fields['cww_organization'] == $tag )
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_html($tag).'</option>';
			            }
			            ?>
			            </select>
		            </div>

		            <div class="form-fields cww-flex">
						<div class="label-wrapp">
			            	<label for="cww_tags" class="fleft"><?php echo __("Tags : ","cww-connector-lite"); ?></label>
							<p class="pro-desc-text"><?php echo __("Available in premium version.","cww-connector-lite"); ?>
								<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" target="_blank"><?php esc_html_e('Upgrade Now - $19 only','cww-connector-lite');?></a>
							</p>
						</div>
                        <input type="text" id="cww_tags" placeholder="tag1,tag2,your-name" disabled/>
		            </div>

		            <div class="form-fields cww-flex">
						<div class="label-wrapp">
							<label for="cww_notes" class="fleft"><?php echo __("Notes: ","cww-connector-lite"); ?></label>
							<p class="pro-desc-text"><?php echo __("Available in premium version.","cww-connector-lite"); ?>
								<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" target="_blank"><?php esc_html_e('Upgrade Now - $19 only','cww-connector-lite');?></a>
							</p>
						</div>
						<textarea id="cww_notes" cols="30" rows="10" placeholder="your notes here..." disabled></textarea>
                        
		            </div>
		            
		            <div class="form-fields cww-flex">
						<div class="label-wrapp">
							<label for="cww_gdpr" class="fleft"><?php echo __("Acceptance Field for GDPR compliance: ","cww-connector-lite"); ?></label>
							<p class="pro-desc-text"><?php echo __("Available in premium version.","cww-connector-lite"); ?>
								<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" target="_blank"><?php esc_html_e('Upgrade Now - $19 only','cww-connector-lite');?></a>
							</p>
						</div>
			            <select id="cww_gdpr" class="fleft" disabled>
				            <option value="" ><?php echo __("Choose Field","cww-connector-lite"); ?></option>
			            </select>
						
					</div>
					
                    <label><?php echo __("Add Extra Fields.","cww-connector-lite"); ?></label>
                    <div class="form-fields">
						<div class="contacts-meta-section-wrapper">
						<p class="pro-desc-text"><?php echo __("Available in premium version.","cww-connector-lite"); ?>
								<a href="https://codeworkweb.com/wordpress-plugins/cww-connector/" target="_blank"><?php esc_html_e('Upgrade Now - $19 only','cww-connector-lite');?></a>
							</p>
							<span class="add-button table-contacts"><a href="javascript:void(0)" class="docopy-table-contact button"><?php esc_html_e('Add Field','cww-connector-lite'); ?></a></span>
						</div>
				    </div>
		           <?php
		        }
		        else{
		            echo __('Please Add Contact Form Tags First!', 'cww-connector-lite');
		        }
		        ?>
		   
            </div><!--Form Fields -->
	      
	        </div>
	        </div>
	        <?php

		}
	}
	new CWW_Connector_Lite_Active_Campaign_Settings();
}