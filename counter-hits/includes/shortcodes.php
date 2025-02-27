<?php
/*
 * WPGear. Counter-Hits
 * shortcodes.php
 */
 
	// ShortCod [Get_Counter_Hits]
	add_shortcode('Get_Counter_Hits', 'CntrH_get_Counter_Hits');
	function CntrH_get_Counter_Hits( $atts, $shortcode_content = null ) {
		$Counter_Base = isset($atts['base']) ? intval($atts['base']) : 0;
		
		$Counter_Hits = get_Counter_Hits ( $Counter_Base );
		
		ob_start();
		
			?>	
			<span class='wpgear_counter_hits'>
				<?php echo esc_html ( $Counter_Hits ); ?>
			</span>
			<?php	
			
		$content = ob_get_clean();
						
		return $content;
	}