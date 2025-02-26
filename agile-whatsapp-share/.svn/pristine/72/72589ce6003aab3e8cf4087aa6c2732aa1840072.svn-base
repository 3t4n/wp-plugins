<?php
     /*
       Plugin Name: Agile Whatsapp Share
       Plugin URI: http://www.agilesoftsolution.com/
       Description: Whatsapp Share Button For Desktop and Web
       Version: 1.0
       Text Domain : agile_whatsapp_share
      */

     global $agile_whatsapp_share;
     $agile_whatsapp_share =
       new agile_whatsapp_share();

     class agile_whatsapp_share {

	 function __construct() {
	     add_shortcode('agile_whatsapp_share',
	       array(
		       &$this,
		       'agile_whatsapp_share_function'));
	     add_action('plugins_loaded',
	       array(
		       &$this,
		       'agile_whatsapp_share_load_textdomain'));
	 }

	 function agile_whatsapp_share_function($atts) {
	     $final_url =
	       '';
	     $btn_text =
	       isset($atts['button_text'])
	       ? $atts['button_text']
	       : __('Share On Whatsapp',
		 'agile_whatsapp_share');
	     $class =
	       isset($atts['button_class'])
	       ? $atts['button_class']
	       : 'agile_whatsapp_share';
	     $id =
	       isset($atts['button_id'])
	       ? $atts['button_id']
	       : 'agile_whatsapp_share';

	     $type =
	       isset($atts['message_type'])
	       ? $atts['message_type']
	       : 'direct_message';
	     $number =
	       isset($atts['number'])
	       ? $atts['number']
	       : '';
	     $message =
	       isset($atts['message'])
	       ? $atts['message']
	       : get_the_permalink();

	     if ($type ==
	       'direct_message') {
		 ?>
		 <a href="https://api.whatsapp.com/send?phone=<?php echo $number; ?>&text=<?php echo $message; ?>&l=en" class="<?php echo $class; ?>" id="<?php echo $id ?>"><?php echo $btn_text ?></a>
		 <?php
	     } else if ($type ==
	       'only_message') {
		 ?>    
		 <a href="https://api.whatsapp.com/send?text=<?php echo $message ?>&l=en"  class="<?php echo $class; ?>" id="<?php echo $id ?>"><?php echo $btn_text ?></a>
		 <?php
	     } else if ($type ==
	       'only_number') {
		 ?>
		 <a href="https://api.whatsapp.com/send?phone=<?php echo $number ?>&l=en"  class="<?php echo $class; ?>" id="<?php echo $id ?>"><?php echo $btn_text ?></a>
		 <?php
	     }
	 }

	 function agile_whatsapp_share_load_textdomain() {

	     load_plugin_textdomain('agile_whatsapp_share',
	       false,
	       'agile_whatsapp_share/languages/');
	 }

     }
     