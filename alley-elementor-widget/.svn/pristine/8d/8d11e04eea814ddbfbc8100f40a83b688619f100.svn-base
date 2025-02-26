
<div class="aew-pt-block-holder">
	<?php if( 'yes' == $settings[ 'show_badge' ] ) : ?>
		<?php if( $settings['badge_position']=='right'){
			$badge_align_class='badge-right';
		} elseif ($settings['badge_position']=='center') {
			$badge_align_class='badge-center';
		} else{
			$badge_align_class='badge-left';
		}?>
		<div class="aew-pt-badge aew-pt-content-block <?php echo $badge_align_class;?>" style="text-align: <?php echo $settings['badge_position'];?> ">
			<span class="badge-style"><?php echo $settings[ 'badge_text' ]; ?></span>
		</div>	
	<?php endif; ?>
	<div class="aew-pt-header-block aew-pt-content-block">
		<?php if( $settings[ 'title_text' ] ) : ?>
			<span class="aew-pt-title aew-pt-content-block"><?php echo $settings[ 'title_text' ]; ?></span>
		<?php endif; ?>
		<?php if( $settings[ 'description_text' ] ) : ?>
			<span class="aew-pt-description aew-pt-content-block"><?php echo $settings[ 'description_text' ]; ?></span>
		<?php endif; ?>
	</div><!-- end of header block -->
	<div class="aew-pt-pricing-block aew-pt-content-block">
		<div class="aew-pt-content-block price-amount-block">
			<div class="price-amount-block-inner">
				<?php if( $settings['currency_align'] =='top' ){
					$currency_align_class='align-top';
				} elseif( $settings['currency_align'] =='bottom' ){
					$currency_align_class='align-bottom';
				} else{
					$currency_align_class='';
				}?>
				<span class="pricing-currency <?php echo $currency_align_class; ?>">	
				<?php
				switch ($settings['select_currency']) {
                    case 'aew_custom':
                            echo esc_html($settings['aew_custom_currency']);
                        break;
                    case 'dollar':
                            echo esc_html('$');
                        break;
                    case 'euro':
                            echo esc_html('€');
                        break;
                    case 'baht':
                            echo esc_html('฿');
                        break;
                    case 'franc':
                            echo esc_html('₣');
                        break;
                    case 'guilder':
                            echo esc_html('ƒ');
                        break;
                    case 'pound':
                            echo esc_html('£');
                        break;
                    case 'real':
                            echo esc_html('R$');
                        break;
                    case 'rupee':
                            echo esc_html('₨');
                        break;
                    case 'indian_rupee':
                            echo esc_html('₹');
                        break;
           
                    case 'yen':
                            echo esc_html('¥');
                        break;
                    default:
                        # default execution...
                        break;
                }

                ?>
				</span>
	<?php if( 'yes' == $settings[ 'show_sale_price' ] ) : ?>
		<span class="aew-pt-price-sale" style="text-decoration: line-through; opacity: 0.55;"><?php echo $settings[ 'price_sale' ]; ?></span>
	<?php endif; 
				
	if( $settings[ 'price_amount' ] ) :
		$get_price = $settings[ 'price_amount' ];
		if( $settings['aew_pt_price_format'] == 'currency_format_1' ){ ?>
			<?php 
			$count_sep = preg_match_all('/\./', $get_price);
			if($count_sep >= 1){
				$main_digit = substr($get_price, 0, strrpos( $get_price, '.'));
				echo '<span class="aew-pt-price-main">' .$main_digit .'</span>';
				if($settings['aew_pt_decimal_postion'] == 'bottom'){
					$decimal_position = 'align-bottom';
				} else {
					$decimal_position = 'align-top';
				}
				$decimal_number= substr($get_price, strrpos($get_price, '.') + 1); ?>
				<span class="decimal-digit <?php echo $decimal_position;?>"><?php echo $decimal_number;?></span>
				<?php }else {
					  echo '<span class="aew-pt-price-main">'. $settings[ 'price_amount' ] .'</span>'; 
			}
		} else { 
		$count_sep = preg_match_all('/\,/', $get_price);
		if($count_sep >= 1){
			$main_digit = substr($get_price, 0, strrpos( $get_price, ','));
			echo '<span class="aew-pt-price-main">' .$main_digit .'</span>';
			if($settings['aew_pt_decimal_postion'] == 'bottom'){
				$decimal_position = 'align-bottom';
			} else {
				$decimal_position = 'align-top';
			}
			$decimal_number= substr($get_price, strrpos($get_price, ',') + 1); ?>
			<span class="decimal-digit <?php echo $decimal_position;?>"><?php echo $decimal_number;?></span>
			<?php } else {
			echo '<span class="aew-pt-price-main">'. $settings[ 'price_amount' ] .'</span>';
			}
		}
	endif;?>
			
	</div>
	</div><!-- end of price amount block-->
	<?php if ( $settings[ 'period_text' ] ) : ?>
		<span class="aew-pt-period aew-pt-content-block"><?php echo $settings[ 'period_text' ]; ?></span>
	<?php endif; ?>
	</div><!-- end of pricing block -->
	<?php if ( $settings[ 'feature_list' ] ) : ?>
		<div class="aew-pt-features-block aew-pt-content-block">
			<?php foreach( $settings[ 'feature_list' ] as $item ) : ?>
				<?php if( 'yes' == $item[ 'disable_feature' ] ) { ?>
					<div class="feature-list"><span style="text-decoration: line-through; opacity: 0.50;">
	    			<?php \Elementor\Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo $item[ 'feature_text' ]; ?>
	    		</span>
	    		</div>
					<?php } else { ?>
	    		<div class="feature-list">
	    			<?php \Elementor\Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo $item[ 'feature_text' ]; ?>
	    		</div>
			<?php } endforeach; ?>
		</div><!-- end of features block -->
	<?php endif; ?>
	<div class="aew-pt-footer-block aew-pt-content-block">
		<?php $settings = $this->get_settings_for_display();
			$target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
			echo '<a class="pricing-button" href="' . $settings['button_link']['url'] . '"' . $target . $nofollow . '>'.$settings[ 'cta_text' ].'</a>';
			if( 'yes' == $settings[ 'show_disclaimer' ] ) : ?>
    		<span class="aew-pt-disclaimer aew-pt-content-block"><?php echo $settings[ 'disclaimer_text' ]; ?></span>
		<?php endif; ?>
	</div><!-- end of footer block -->
</div>