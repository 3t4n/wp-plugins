<?php

global $wpdb;

if( get_option('gAnnounce_order') == "1")
{
	$data = $wpdb->get_results("SELECT * from ". WP_G_ANNOUNCE_TABLE . " where gAnn_status='Yes' and (`gAnn_expiration` >= NOW() or `gAnn_expiration` = '0000-00-00') ORDER BY rand( )");
}
else
{
	$data = $wpdb->get_results("select * from ". WP_G_ANNOUNCE_TABLE . " where gAnn_status='Yes' and (`gAnn_expiration` >= NOW() or `gAnn_expiration` = '0000-00-00') ORDER BY gAnn_order");
}

?>
<script language="JavaScript" type="text/javascript">
	v_font='<?php echo get_option('gAnnounce_font'); ?>';
	v_fontSize='<?php echo get_option('gAnnounce_fontsize'); ?>';
	v_fontSizeNS4='<?php echo get_option('gAnnounce_fontsize'); ?>';
	v_fontWeight='<?php echo get_option('gAnnounce_fontweight'); ?>';
	v_fontColor='<?php echo get_option('gAnnounce_fontcolor'); ?>';
	v_textDecoration='none';
	v_fontColorHover='#FFFFFF';//		| won't work
	v_textDecorationHover='none';//	| in Netscape4
	v_top=0;//	|
	v_left=0;//	| defining
	v_width=<?php echo get_option('gAnnounce_width'); ?>;//	| the box
	v_height=<?php echo get_option('gAnnounce_height'); ?>;//	|
	v_paddingTop=0;
	v_paddingLeft=0;
	v_position='relative';// absolute/relative
	v_timeout=<?php echo get_option('gAnnounce_slidetimeout'); ?>;//1000 = 1 second
	v_slideSpeed=1;
	v_slideDirection=<?php echo get_option('gAnnounce_slidedirection'); ?>;//0=down-up;1=up-down
	v_pauseOnMouseOver=true;// v2.2+ new below
	v_slideStep=1;//pixels
	v_textAlign='<?php echo get_option('gAnnounce_textalign'); ?>';// left/center/right
	v_textVAlign='<?php echo get_option('gAnnounce_textvalign'); ?>';// top/middle/bottom - won't work in Netscape4
	v_bgColor='transparent';
</script>
<?php

if ( ! empty($data) ) 
{
	foreach ( $data as $data ) 
	{ 
		$Ann = $Ann . "['','".$data->gAnn_text."',''],";
	}
	$Ann=substr($Ann,0,(strlen($Ann)-1));
	?>
	<div>
    <script language="JavaScript" type="text/javascript">
	v_content=[<?php echo $Ann; ?>]
	</script>
	<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-and-vertical-scroll-news/gAnnounce/gAnnounce.js"></script>
	</div>
	<?php 
}
else
{
	?>
	<div>
	<script language="JavaScript" type="text/javascript">
	v_content=[['','<?php echo get_option('gAnnounce_noannouncement'); ?>',''],['','<?php echo get_option('gAnnounce_noannouncement'); ?>','']]
	</script>
	<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-and-vertical-scroll-news/gAnnounce/gAnnounce.js"></script>
	</div>
<?php 
} 
?>
