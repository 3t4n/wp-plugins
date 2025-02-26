<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>
<input type="hidden" name="content" value='<?php echo $this->Owner()->GetShortcode( '', $post->ID ); ?>' />

<!-- this just lets the javascript know it's the optiner -->
<input type="hidden" name="nothing_special" class="optiner_product_image" value="1">
<script type="text/javascript">
var default_container_width = <?php echo $this->Owner()->GetDefaultOptinDimensions( 'width' ); ?>;
var default_container_height = <?php echo $this->Owner()->GetDefaultOptinDimensions( 'height' ); ?>;
</script>

<?php
$fields = array();
$fields['id'] = 'optiner-optin';
$fields['width'] = $custom['frame_width'] + 25;
$fields['height'] = $custom['frame_height'] + 25;
$fields['style'] = 'overflow:hidden; margin: 0px auto;';
$fields['scrolling'] = 'no';
$fields['src'] = $this->Owner()->GetAsset( 'includes', 'optin_iframe', 'url' ).'?f='.$post->ID.'&d=1&junk='.time();

echo '<iframe';

foreach( $fields as $key => $value )
{
	echo ' '.$key.'="'.$value.'"';
}

echo '></iframe>';
?>