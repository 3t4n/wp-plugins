<?php if ( ! defined( 'ABSPATH' ) ) exit;   $vcode = $this->_config["vcode"];  ?>
 <script type='text/javascript' language='javascript'>
	var default_category_id_<?php echo $vcode; ?> = '<?php echo $this->_config["category_id"]; ?>';
	var request_obj_<?php echo $vcode; ?> = {
			category_id:'<?php echo $this->_config["category_id"]; ?>', 
			hide_post_title:'<?php echo $this->_config["hide_post_title"]; ?>', 
			post_title_color:'<?php echo $this->_config["title_text_color"]; ?>',
			panel_text_color:'<?php echo $this->_config["panel_text_color"]; ?>', 
			panel_background_color:'<?php echo $this->_config["panel_background_color"]; ?>',
			header_text_color:'<?php echo $this->_config["header_text_color"]; ?>', 
			header_background_color:'<?php echo $this->_config["header_background_color"]; ?>',
			display_title_over_image:'<?php echo $this->_config["display_title_over_image"]; ?>', 
			number_of_post_display:'<?php echo $this->_config["number_of_post_display"]; ?>', 
			vcode:'<?php echo $vcode; ?>'
		}
 </script> 
 <?php $_panel_list = $this->getPanelArray();  ?>
 <div id="archivespostaccordion" style="width:<?php echo $this->_config["tp_widget_width"]; ?>"  class="pane_style_4 <?php echo ( ( trim( $this->_config["display_title_over_image"] ) == "yes" ) ? "disp_title_over_img" : "" ); ?>">
	<?php if($this->_config["hide_widget_title"]=="no"){ ?>
		<div class="ik-panel-tab-title-head" style="background-color:<?php echo $this->_config["header_background_color"]; ?>;color:<?php echo $this->_config["header_text_color"]; ?>"  >
			<?php echo $this->_config["widget_title"]; ?>   
		</div>
	<?php } ?> 
	<span class='wp-load-icon'>
		<img width="18px" height="18px" src="<?php echo AVPT_MEDIA.'images/loader.gif'; ?>" />
	</span>
	<div class="wea_content lt-grid">
		<?php 
			if( count( $_panel_list ) > 0 ) {
				foreach( $_panel_list as $__pane_key => $__pane_text ) {
				  ?>
					<div class="item-panel-list">
						<div class="panel-item"  onmouseout="avpt_panel_ms_out( this )" onmouseover="avpt_panel_ms_hover( this )" id="<?php echo $vcode.'-'.intval($__pane_key); ?>" onclick="AVPT_fillPosts( this.id, '<?php echo intval($__pane_key);?>', request_obj_<?php echo $vcode; ?>, 1 )"  style="color:<?php echo $this->_config["panel_text_color"]; ?>;background-color:<?php echo $this->_config["panel_background_color"]; ?>;" >
							<div class="panel-item-text"  onmouseout="avpt_panel_ms_out( this.parentNode )" onmouseover="avpt_panel_ms_hover( this.parentNode )">
								<?php echo $__pane_text; ?>
							</div>
							<div class="ld-panel-item-text"></div>
							<div class="clr"></div>
						</div>						
						<div class="item-posts"></div>
						<div class="clr"></div>
					 </div> 
					 <div class="clr"></div>
				   <?php
				}
			}			
		?>
		<div class="clr"></div>
	</div>
</div>