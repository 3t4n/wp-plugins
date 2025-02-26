<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );

$data = $this->Owner()->GetThemes();
?>

<?php $nextItem = 'optin_theme'; ?>
<?php
if( $data['a'] )
{
	foreach( $data['a'] as $key => $value )
	{
		if( $custom[ $nextItem ] == $key )
			$checked = 'checked="checked"';
		else
			$checked = ''; ?>
<div style="float:left;" class="theme_container">
	<label>
		<img class="imgfade" src="<?php echo $value; ?>" /><br />
		<input style="display:none;" <?php echo $checked; ?> type="radio"  onclick="SwitchOptinTheme('<?php echo $key; ?>');" name="field_<?php echo $nextItem; ?>" value="<?php echo $key; ?>" />
		<div style="font-size:10px; text-align:center;"><?php echo $key; ?></div>
	</label>
	
	<div style="clear:both;"></div>
</div>
	<?php
	}
} ?>
			
<div style="clear:both;"></div>

<input style="display:none;" type="radio" id="empty_theme" name="field_<?php echo $nextItem; ?>" value="" />