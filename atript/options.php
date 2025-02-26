<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
?>
<div class="wrap">
<h2>atript</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('atript_container'); ?>

<p>Fügen Sie Ihren atript-Container-Code unten ein:</p>

<textarea name="atript_code" id="atript_code" rows="3"  cols="65" >
<?php
    
	$atriptCode = get_option('atript_code');
	echo $atriptCode;
?> </textarea>


<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
Fragen? Informationen zur Einrichtung finden Sie hier: <a href="http://atript.org/?utm_source=WordPress&utm_medium=atript-plugin" title="atript.org">atript.org</a>

</div>
