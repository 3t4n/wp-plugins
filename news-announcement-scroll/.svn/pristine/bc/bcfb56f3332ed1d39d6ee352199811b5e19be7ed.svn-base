<?php

if ( preg_match( '#' . basename( __FILE__ ) . '#', $_SERVER['PHP_SELF'] ) ) {
	die( 'You are not allowed to call this page directly.' );
}

global $wpdb;

$Ann = '';

$gNewsAnnouncementtype = get_option( 'gNewsAnnouncementtype' );
$gNewsAnnouncementtype = ! empty( $gNewsAnnouncementtype ) ? esc_sql( $gNewsAnnouncementtype ) : ''; 
$gNewsAnnouncementorder = get_option( 'gNewsAnnouncementorder' );

$sSql = $wpdb->prepare(
		"SELECT * FROM " . WP_G_NEWS_ANNOUNCEMENT . "
		WHERE gNews_status = %s
		AND (`gNews_date` <= NOW() OR `gNews_date` = %s)
		AND (`gNews_expiration` >= NOW() OR `gNews_expiration` = %s)
		" . ($gNewsAnnouncementtype ? "AND `gNews_type` = '{$gNewsAnnouncementtype}'" : '') . "
		ORDER BY " . ('1' == $gNewsAnnouncementorder ? 'RAND()' : 'gNews_order'),
		'Yes',
		'0000-00-00',
		'0000-00-00'
);

$data = $wpdb->get_results( $sSql );
?>
<script language="JavaScript" type="text/javascript">
	v_font='<?php echo get_option( 'gNewsAnnouncementfont' ); ?>';
	v_fontSize='<?php echo get_option( 'gNewsAnnouncementfontsize' ); ?>';
	v_fontSizeNS4='<?php echo get_option( 'gNewsAnnouncementfontsize' ); ?>';
	v_fontWeight='<?php echo get_option( 'gNewsAnnouncementfontweight' ); ?>';
	v_fontColor='<?php echo get_option( 'gNewsAnnouncementfontcolor' ); ?>';
	v_textDecoration='none';
	v_fontColorHover='#FFFFFF';
	v_textDecorationHover='none';
	v_top=0;
	v_left=0;
	v_width=<?php echo get_option( 'gNewsAnnouncementwidth' ); ?>;
	v_height=<?php echo get_option( 'gNewsAnnouncementheight' ); ?>;
	v_paddingTop=0;
	v_paddingLeft=0;
	v_position='relative';
	v_timeout=<?php echo get_option( 'gNewsAnnouncementslidetimeout' ); ?>;
	v_slideSpeed=1;
	v_slideDirection=<?php echo get_option( 'gNewsAnnouncementslidedirection' ); ?>;
	v_pauseOnMouseOver=true;
	v_slideStep=1;
	v_textAlign='<?php echo get_option( 'gNewsAnnouncementtextalign' ); ?>';
	v_textVAlign='<?php echo get_option( 'gNewsAnnouncementtextvalign' ); ?>';
	v_bgColor='transparent';
</script>

<?php

if ( ! empty( $data ) ) {
	foreach ( $data as $data ) {

		if ( ! empty( $data->gnews_redirect_link ) ) {
			$data->gNews_text = '<a href="' . $data->gnews_redirect_link . '" style="color:inherit;text-decoration:underline;font-weight:inherit" target="_blank">' . $data->gNews_text . '</a>';
		}

		$Ann = $Ann . "['','" . $data->gNews_text . "',''],";
	}

	$Ann = substr( $Ann, 0, ( strlen( $Ann ) - 1 ) );
	?>
	<div id="display_news">
		<script language="JavaScript" type="text/javascript">
			v_content=[<?php echo $Ann; ?>]
		</script>
	</div>
	<?php
} else {
	?>
	<div id="display_news">
		<script language="JavaScript" type="text/javascript">
			v_content=[['','<?php echo get_option( 'gNewsAnnouncementnoannouncement' ); ?>',''],['','<?php echo get_option( 'gNewsAnnouncementnoannouncement' ); ?>','']]
		</script>
	</div>
	<?php
}
