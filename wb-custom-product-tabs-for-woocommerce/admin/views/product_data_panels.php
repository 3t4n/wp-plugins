<?php
if (!defined('ABSPATH')) {
	exit;
}
?>
<div class="wb_tab_popup_overlay"></div>
<div class="wb_tab_popup wb_cptb_tab_edit_popup">
	<div class="wb_tab_popup_hd">		
		<span class="wb_tab_popup_hd_txt">
			<span class="dashicons dashicons-edit"></span>
			<?php esc_html_e('Edit', 'wb-custom-product-tabs-for-woocommerce');?>
		</span>
		<span class="wb_tab_popup_close" title="<?php esc_attr_e('Close', 'wb-custom-product-tabs-for-woocommerce');?>">
			<span class="dashicons dashicons-dismiss"></span>
		</span>
	</div>
	<div class="wb_tab_popup_content">
		<div class="wb_tab_panel_frmgrp" style="width:50%;">
			<label><?php esc_html_e('Tab title', 'wb-custom-product-tabs-for-woocommerce');?><span class="woocommerce-help-tip" data-tip="<?php esc_attr_e('Title for tab', 'wb-custom-product-tabs-for-woocommerce'); ?>"></span></label>
			<input type="text" name="wb_tab_title" class="wb_tabpanel_txt wb_tab_title_input" placeholder="<?php esc_attr_e('Title for tab', 'wb-custom-product-tabs-for-woocommerce'); ?>" value="">
			<div class="wb_tab_er"></div>
		</div>
		<div class="wb_tab_panel_frmgrp" style="width:50%;">
			<label><?php esc_html_e('Tab position', 'wb-custom-product-tabs-for-woocommerce');?><span class="woocommerce-help-tip" data-tip="<?php esc_attr_e('Tab position', 'wb-custom-product-tabs-for-woocommerce'); ?>"></span></label>
			<input type="number" min="0" step="1" name="wb_tab_position" class="wb_tabpanel_txt wb_tab_position_input" placeholder="<?php esc_attr_e('Tab position', 'wb-custom-product-tabs-for-woocommerce'); ?>" value="" style="float:left; width:100px;">			
			<div class="wb_tabpanel_hlp" style="margin-top:10px; margin-left:15px;">
				<a href="https://webbuilder143.com/how-to-arrange-woocommerce-custom-product-tabs/?utm_source=plugin&utm_medium=product-edit&utm_campaign=tab-position&utm_content=positioning" target="_blank"><?php esc_html_e('Know more', 'wb-custom-product-tabs-for-woocommerce'); ?> <span class="dashicons dashicons-external" style="text-decoration:none;"></span></a>
			</div>
			<div class="wb_tab_er"></div>
		</div>
		<div class="wb_tab_panel_frmgrp">
			<label><?php esc_html_e('Tab content', 'wb-custom-product-tabs-for-woocommerce');?><span class="woocommerce-help-tip" data-tip="<?php esc_attr_e('Content for tab', 'wb-custom-product-tabs-for-woocommerce'); ?>"></span></label>
			<?php wp_editor('','wb_tab_editor',array(
					'editor_class'=>'wb_tab_rte',
					'editor_height'=>220,
					'textarea_rows'=>7,
					'tinymce' => array(
				        'height' =>220,
				    )
				) 
			); 
			?>
		</div>
		<div class="wb_tab_panel_frmgrp">
			<label><?php esc_html_e('Tab nickname', 'wb-custom-product-tabs-for-woocommerce');?><span class="woocommerce-help-tip" data-tip="<?php esc_attr_e('A unique nickname will be useful for identifying the tab', 'wb-custom-product-tabs-for-woocommerce'); ?>"></span></label>
			<div style="float:left; width:50%;">
				<input type="text" name="wb_tab_nickname" class="wb_tabpanel_txt wb_tab_nickname_input" placeholder="<?php esc_attr_e('Tab nickname', 'wb-custom-product-tabs-for-woocommerce'); ?>" value="" style="float:left;">
				<div class="wb_tab_er"></div>
			</div>

			<button class="button button-primary wb_tab_done_btn wb_cptb_tab_save_btn" type="button"><?php esc_html_e('Done', 'wb-custom-product-tabs-for-woocommerce');?></button>
			<button class="button button-secondary wb_tab_cancel_btn" type="button"><?php esc_html_e('Cancel', 'wb-custom-product-tabs-for-woocommerce');?></button>
		</div>
	</div>
</div>

<div id='wb_custom_tabs' class='panel woocommerce_options_panel'>
	<div class="options_group">
		<div class="wb_tab_main_hd">
			<span class="wb_tab_main_hd_inner"><?php esc_html_e('Custom tabs', 'wb-custom-product-tabs-for-woocommerce'); ?></span>
			<p class="wb_tab_addnew_btn_container">
				<a class="button button-secondary" target="_blank" href="<?php echo esc_url( admin_url('options-general.php?page=wb-product-tab-settings&wb_cptb_tab=general')); ?>"> 
					<span class="dashicons dashicons-admin-generic" style="margin-top:7px; font-size:14px;"></span> 
					<?php esc_html_e('Tab settings', 'wb-custom-product-tabs-for-woocommerce'); ?>
				</a>
				<a class="button button-secondary" target="_blank" href="<?php echo esc_url( admin_url('options-general.php?page=wb-product-tab-settings&wb_cptb_tab=help')); ?>">
					<span class="dashicons dashicons-sos" style="margin-top:7px; font-size:14px;"></span>  
					<?php esc_html_e('Help & FAQ', 'wb-custom-product-tabs-for-woocommerce'); ?>
				</a>
				<button class="button button-primary wb_tab_addnew_btn" type="button"><span class="dashicons dashicons-plus-alt" style="margin-top:7px; font-size:14px;"></span> <?php esc_html_e('Add new tab', 'wb-custom-product-tabs-for-woocommerce');?></button></p>
		</div>
		<div class="wb_tab_main_inner">
			<?php
			$local_tabs_total=0;
			if($tabs)
			{
				foreach($tabs as $key=>$tab)
				{
					$tab_title=$tab['title'];
					$tab_nickname=(isset($tab['nickname']) ? $tab['nickname'] :'');
					$tab_content=$tab['content'];
					$tab_type=$tab['tab_type'];
					$position=$tab['position'];
					$tab_id=isset($tab['tab_id']) ? $tab['tab_id'] : 0;
					$is_hidden_global_tab = ('local' !== $tab_type && 'publish' !== get_post_status($tab_id));
					$tab_edit_url = (0 < $tab_id ? get_edit_post_link($tab_id) : ''); //applicable for global tabs

					if($tab_type=='local')
					{
						$local_tabs_total++;
					}
					include "_tab_single.php";
				}
			}else
			{
				?>
				<div class="wb_no_tabs">
					<div class="wb_no_tabs_inner">
						<span class="wb_no_tabs_icon">!</span> <br />
						<?php esc_html_e('No tabs', 'wb-custom-product-tabs-for-woocommerce');?>
					</div>
				</div>
				<?php
			}
			if($local_tabs_total==0)
			{
				?>
				<div class="wb_tab_default">
					<?php
					$tab_title='';
					$tab_nickname='';
					$tab_content='';
					$tab_type='local';
					$position=20;
					$tab_id=0;
					$key=0;
					$is_hidden_global_tab = false;
					$tab_edit_url = '';

					include "_tab_single.php";
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	
	<?php
	if(!empty($tabs))
	{
	?>
		<div class="options_group">
			<div style="display:inline-block; width:95%; box-shadow:2px 1px 2px 0px #e2d5d5; margin-left: 2.5%;padding: 10px;box-sizing: border-box;margin-bottom: 15px; border-left: solid 4px blueviolet; background:#e1eef6;">
				<?php 
					/* translators: 1: opening anchor tag, 2: closing anchor tag, 3: star rating, 4: opening bold tag, 5: closing bold tag */
					echo wp_kses_post( sprintf( __('Click %1$s here %2$s to rate us %3$s, If you like the %4$s Custom product tabs %5$s plugin', 'wb-custom-product-tabs-for-woocommerce'),
					    '<a href="https://wordpress.org/support/plugin/wb-custom-product-tabs-for-woocommerce/reviews/?rate=5#new-post" target="_blank" style="text-decoration:none; font-weight:bold;">',
					    '</a>',
					    '⭐️⭐️⭐️⭐️⭐️',
					    '<b>',
					    '</b>'
					) ); 
				?>
			</div>		
		</div>
	<?php  
	}
	?>

</div>