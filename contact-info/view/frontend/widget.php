<div class="contact-info-widget">
<?php
if(is_array( $contact_info_data )){
	foreach( $contact_info_data as $key => $value ){
		if(!empty($instance[$key])){
			echo '<div class="contact-info-data '.$key.'">'.self::contact_icon($key) . ' ' . html_entity_decode(esc_html($instance[$key])).'</div>';
		}
	}
}
?>
</div>