<?php
wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false );

// Select which pagehook to use to select which metaboxes to show
$pagehook = $this->m_pages['home']['pagehook'];

$plugin_data = $this->GetPluginData();
?>

<style>
.widefat th {
	line-height: 10px;
	font-size: 12px;
	font-weight: bold;
	text-transform: uppercase;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	text-align:left;
}

.widefat th,
.widefat td {
	padding: 8px 7px 8px 7px;
}
.widefat td a {
	color: #06C;
}
</style>

<div class="wrap">
    
	<!--<div class="icon32">
		<img src="<?php echo $this->GetOverseer()->GetIcon(); ?>">
	</div>-->
	
	<h2><?php echo $plugin_data['Name']; ?>, version <?php echo $plugin_data['Version']; ?></h2>
    
    <?php $this->GetClass('postman')->DisplayMessages(); ?>
    
    <form action="<?php echo $this->m_plugin_url; ?>" method="post" id="">
        <?php //wp_nonce_field($this -> sections -> settings); ?>
    
        <div id="poststuff" class="metabox-holder has-right-sidebar">            
            <div id="side-info-column" class="inner-sidebar">
                
                <img style="width:180px;" class="owl_sidebar" src="<?php echo $this->GetRandomOwlImage( 9 ); ?>" />
                <?php $this->do_meta_boxes( 'side' ); ?>
                
            </div>
            <div id="post-body" class="has-sidebar">
                <div id="post-body-content" class="has-sidebar-content">
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                        
						<p>Need help? <a target="_blank" href="http://plugins.qody.co/wso-getting-started-optiner/">Watch the tutorial videos</a></p>
						
						<?php $this->OutputMetabox( 'overview' ); ?>
						
						<?php $this->do_meta_boxes( 'normal' ); ?>
						<?php $this->do_meta_boxes( 'advanced' ); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready( function($) {
    // close postboxes that should be closed
    $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
    // postboxes setup
    postboxes.add_postbox_toggles('<?php echo $pagehook; ?>');
});
//]]>
</script>