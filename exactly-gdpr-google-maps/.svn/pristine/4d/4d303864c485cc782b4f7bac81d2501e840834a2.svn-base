<?php
// shortcode for load google map on click

require 'exggmap-defaults.php';

add_shortcode( 'exactly-gdpr-map', 'exggmap_google_map_gdpr_code' );
function exggmap_google_map_gdpr_code()
{
  $options = exggmap_get_options();
  $iframe = $options['exggmap_google_iframe'];
  $simpleXML = simplexml_load_string($iframe);
  if($simpleXML == false){
    echo 'Parse Error';
  }
  $iframeAttributes = $simpleXML->attributes();
  $width = $options['exggmap_map_width'];
  $height = $options['exggmap_map_height'];
  $background_color = $options['exggmap_layer_background_color'];
  $button_background_color = $options['exggmap_button_background_color'];
  $font_color = $options['exggmap_layer_font_color'];
  $box_styles = 'style="width:' . $width .'px; height: '. $height .'px;'.'"';
  $embed_powered_by =  $options['exggmap_enable_powered_by'];
  $aspect_ratio = 'aspect-ratio:' .  $width . ' / ' . $height;

	ob_start();
	?>
    <div class="exggmap-wrapper is-style-wide" style="<?php echo $aspect_ratio; ?>">
      <div class="exggmap-mask" style="background-color: <?php echo $background_color; ?>; color:<?php echo $font_color ?>">
        <div class="exggmap-mask-content">
        <p class="exggmap-caption"><?php echo __('GDPR MAP', 'exactly-gdpr-google-maps') ?></p>
            <button style="color: <?php echo $font_color; ?>; background-color: <?php echo $button_background_color; ?>; border-color: <?php echo $font_color; ?>"  id="exggmap-btn"><?php echo $options['exggmap_button_title']; ?> *</button>
        </div>
        <?php if( $embed_powered_by ){ ?>
        <span>
           <?php echo __('powered by', 'exactly-gdpr-google-maps'); ?>
            <a title="Webdesign Agentur" style="color: <?php echo $font_color; ?>" href="https://www.exovia.de">exovia webdesign</a>
        </span>
        <?php } ?>
      </div>
      <iframe
        data-src="<?php echo $iframeAttributes->{'src'}; ?>"
        frameborder="0"
        allowfullscreen=""
        aria-hidden="false"
        tabindex="0">
      </iframe>
    </div>
    <p class="exampp-hints">
    * <?php echo $options['exggmap_layer_text']; ?>
      <a
        target="_blank"
        rel="noopener noreferrer"
        href="<?php echo __("https://policies.google.com/privacy?hl=en", "exactly-gdpr-google-maps"); ?>"><?php echo $options['exggmap_anchor_text']?></a>
    </p>
	<?php
	return $var = ob_get_clean();
}