<?php
/**
 * Banner file.
 *
 */

 $options = get_option( 'banner_options' );

?>

<div id="coronaBanner" class="covid-banner">
	<div class="covid-content">
		<?php
    if ( empty( $options[ 'display'] ) ){
      echo '<p class="covid-text" >For more information on COVID-19 and government regulation: <a class="covid-text-link" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za"> Click here </a></p>';
    }
    if ( !empty( $options[ 'display' ][ 'image' ] ) ){

  		echo '<a class="covid-website-link" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za">';

      	echo '<img class="covid-website-link-img" src="'. plugin_dir_url( __FILE__ ) . ( '../../assets/images/covid-500.jpg' ).'" alt="SAcoronavirus.co.za" height="50" border="0" />';

      echo '</a>';

    };

    if ( !empty( $options[ 'bannertext' ] ) || !empty( $options[ 'display' ][ 'number' ] ) || !empty( $options[ 'display' ][ 'whatsapp' ] )  ){

	    echo '<div class="covid-number">';

        if ( !empty( $options[ 'bannertext' ] ) && !empty( $options[ 'display'] ) ){
          echo '<p class="covid-text">For more information on COVID-19 and government regulation: <a class="covid-text-link" target="_blank" href="https://sacoronavirus.co.za/" rel="noopener nofollow" title="SAcoronavirus.co.za"> Click here </a></p>';
        }

        if ( !empty( $options[ 'display' ][ 'number' ] ) ){
        	echo '<a class="covid-hotline-link" href="tel:+27800029999"> Emergency Hotline: 0800 029 999 </a>';
        }

        if ( !empty( $options[ 'display' ][ 'whatsapp' ] ) ){
          echo '<a class="covid-whatsapp-link" href="https://wa.me/27600123456?text=Hi" rel="noopener nofollow"> WhatsApp Support Line: 0600-123456 </a>';
        }

      echo '</div>';

    }

    ?>
	</div>
</div>
