<?php
/*
Plugin Name: Amazon Box
Plugin URI: http://www.GiuseppeFrattura.com
Description: Permette di usare l'affiliazione amazon sui propri articoli
Version: 1.3
Author: Giuseppe Frattura
Author URI: http://www.GiuseppeFrattura.com
 */

$value;

function amazon_box($content)
{
    $sign = '<div class="sign">';
    $sign .= 'Amazon-Box creato da <a href="http://www.giuseppefrattura.com">Giuseppe Frattura</a>';
    $sign .= '</div>';
    $msg = get_option('msg');
    $box = '<div class="amazon-box"> <box-title>';
    $box .= $msg;
    $box .= '</box-title></br>';
   	$box .= get_option('ab_box_1');
   	$box .= get_option('ab_box_2');
   	$box .= get_option('ab_box_3');
   	$box .= get_option('ab_box_4');
   	$box .= get_option('ab_box_5');
   	$box .= get_option('ab_box_6');
   	if (get_option('AS')=='Si')
   	$box .= $sign;
   	$box .= '</div>';
    if (get_option('page')=='Pagine'){
    	if (is_page()){
    		if (get_option('Pos')=='Top')
    			{
    			$return=$box;
    			$return .=$content;
    			}
    		if (get_option('Pos')=='Bottom')
    			{
    			$return =$content;
    			$return .=$box;

    			}
    		if (get_option('Pos')=='TeB')
    			{
    			$return=$box;
    			$return .=$content;
    			$return .=$box;
    			}
    	}
    	else $return .=$content;
    } elseif  (get_option('page')=='Articoli'){
	    if (is_single()){
	    	if (get_option('Pos')=='Top')
	    		{
	    		$return=$box;
	    		$return .=$content;
	    		}
	    	if (get_option('Pos')=='Bottom')
	    		{
	    		$return =$content;
	    		$return .=$box;

	    		}
	    	if (get_option('Pos')=='TeB')
	    		{
	    		$return=$box;
	    		$return .=$content;
	    		$return .=$box;
	    		}
	    }
	    else $return .=$content;
    }else {
		if (get_option('Pos')=='Top')
			{
			$return=$box;
			$return .=$content;
			}
		if (get_option('Pos')=='Bottom')
			{
			$return =$content;
			$return .=$box;

			}
		if (get_option('Pos')=='TeB')
			{
			$return=$box;
			$return .=$content;
			$return .=$box;
			}
	}
    return $return;
}
add_filter('the_content', 'amazon_box');
function ab_update_options_form()
{
    ?>
		<div class="wrap">
		        <div class="icon32" id="icon-options-general"><br /></div>
		        <h2>Configurazione di Amazon Box</h2>
		        <p>&nbsp;</p>
		        <form method="post" action="options.php">
		            <?php settings_fields('ab_options_group'); ?>
		            <table>
		                <tbody>

		                    <tr valign="top">
		                    <th scope="row"><label for="msg">Testo del Box:</label></th>
		                        <td>
		                            <input type="text" id="msg" value="<?php echo get_option('msg'); ?>" name="msg" />
		                            <span class="description"></span>
		                        </td>
		                    </tr>

		                    <tr valign="top">
                        	<th scope="row"><label for="ab_box_1">Script del Box 1:</label></th>
                           		<td>
                                	<textarea id="ab_box_1" name="ab_box_1" style="width:400px; height:150px"><?php echo get_option('ab_box_1'); ?></textarea>
                                	<span class="description"></span>
                            	</td>
                    		</tr>

		                    <tr valign="top">
                        	<th scope="row"><label for="ab_box_2">Script del Box 2:</label></th>
                           		<td>
                                	<textarea id="ab_box_2" name="ab_box_2" style="width:400px; height:150px"><?php echo get_option('ab_box_2'); ?></textarea>
                                	<span class="description"></span>
                            	</td>
                    		</tr>

		                    <tr valign="top">
                        	<th scope="row"><label for="ab_box_3">Script del Box 3:</label></th>
                           		<td>
                                	<textarea id="ab_box_3" name="ab_box_3" style="width:400px; height:150px"><?php echo get_option('ab_box_3'); ?></textarea>
                                	<span class="description"></span>
                            	</td>
                    		</tr>

		                    <tr valign="top">
                        	<th scope="row"><label for="ab_box_4">Script del Box 4:</label></th>
                           		<td>
                                	<textarea id="ab_box_4" name="ab_box_4" style="width:400px; height:150px"><?php echo get_option('ab_box_4'); ?></textarea>
                                	<span class="description"></span>
                            	</td>
                    		</tr>

		                    <tr valign="top">
                        	<th scope="row"><label for="ab_box_5">Script del Box 5:</label></th>
                           		<td>
                                	<textarea id="ab_box_5" name="ab_box_5" style="width:400px; height:150px"><?php echo get_option('ab_box_5'); ?></textarea>
                                	<span class="description"></span>
                            	</td>
                    		</tr>

		                    <tr valign="top">
                        	<th scope="row"><label for="ab_box_6">Script del Box 6:</label></th>
                           		<td>
                                	<textarea id="ab_box_6" name="ab_box_6" style="width:400px; height:150px"><?php echo get_option('ab_box_6'); ?></textarea>
                                	<span class="description"></span>
                            	</td>
                    		</tr>

		                   <tr valign="top">
		                   <th scope="row"><label for="">Mostra nelle pagine o negli articoli?</label></th>
		                       <td>
		                           <select id="Page" name="Page">
		                               <option value="Pagine"   <?php selected(get_option('Page'),   "Pagine"); ?>>Pagine </option>
		                               <option value="Articoli" <?php selected(get_option('Page'), "Articoli"); ?>>Articoli </option>
		                               <option value="Entrambi" <?php selected(get_option('Page'), "Entrambi"); ?>>Entrambi </option>
		                           </select>
		                           <span class="description"></span>
		                       </td>
		                   </tr>


		                    <tr valign="top">
	                        <th scope="row"><label for="">Mostrare la firma dell'autore</label></th>
	                            <td>
	                                <select id="AS" name="AS">
	                                    <option value="Si" <?php selected(get_option('AS'), "Si"); ?>>Si </option>
	                                    <option value="No" <?php selected(get_option('AS'), "No"); ?>>No </option>
	                                </select>
	                                <span class="description"></span>
	                            </td>
	                    	</tr>

							<tr valign="top">
							<th scope="row"><label for="">Dove mostro il box?</label></th>
							    <td>
							        <select id="Pos" name="Pos">
							            <option value="Top" <?php selected(get_option('Pos'), "Top"); ?>>Top </option>
							            <option value="Bottom" <?php selected(get_option('Pos'), "Bottom"); ?>>Bottom </option>
							            <option value="TeB" <?php selected(get_option('Pos'), "TeB"); ?>>Top And Bottom </option>

							        </select>
							        <span class="description"></span>
							    </td>
							</tr>

		                    <tr valign="top">
		                        <th scope="row"></th>
		                            <td>
		                                <p>
		                                    <input type="submit" class="button-primary" id="submit" name="submit" value="<?php _e('Save Changes') ?>" />
		                                </p>
		                            </td>
		                    </tr>
		                </tbody>
		            </table>
		        </form>

		        <h3>Ciao stai usando il plugin che ho creato, spero che funzioni bene e come tu desideri, ti chiedo se puoi un offerta per continuare il suo sviluppo e per manterenrlo gratuito.</br>
		        Grazie, <a href="http://www.giuseppefrattura.com">Giuseppe Frattura</a></h3>
		        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHPwYJKoZIhvcNAQcEoIIHMDCCBywCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYC+/SD0P87FOx9vetpCncMZfAkjCeEUOmFvUQZXl2p7yq5ZuwhPCo1rQdBSEtYmsk52RRHkahnbR0b/sQLxM7FTalBJSBn7BdT86Ji3PjKU/YkrSic1mafGavGuzoZwXoAtbG7ZHJDNFaEyfaUp/J6zY3C+VauadJeSpgEx51zbAzELMAkGBSsOAwIaBQAwgbwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQI+HWYEwYr1G2AgZgXBPGaUieuk82lH8/pgO+DEarTBZehDvz+7qcxR99Q89L9+zgMC/qNCweiafCrsqGjHnOK2CnJa7y7JCGQlRwQdZzZd7uE7HJ3ZhnGWKhWoX+BNRGG0KoQbDpQRlo0U+kPMsltYW4I2tsIznnFEG/2c/vzH899hAp+ELiOy5Z5lKMBtQfai+wj9ZMAOppx/YJE9zofvlYSyqCCA4cwggODMIIC7KADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTAeFw0wNDAyMTMxMDEzMTVaFw0zNTAyMTMxMDEzMTVaMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAwUdO3fxEzEtcnI7ZKZL412XvZPugoni7i7D7prCe0AtaHTc97CYgm7NsAtJyxNLixmhLV8pyIEaiHXWAh8fPKW+R017+EmXrr9EaquPmsVvTywAAE1PMNOKqo2kl4Gxiz9zZqIajOm1fZGWcGS0f5JQ2kBqNbvbg2/Za+GJ/qwUCAwEAAaOB7jCB6zAdBgNVHQ4EFgQUlp98u8ZvF71ZP1LXChvsENZklGswgbsGA1UdIwSBszCBsIAUlp98u8ZvF71ZP1LXChvsENZklGuhgZSkgZEwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAgV86VpqAWuXvX6Oro4qJ1tYVIT5DgWpE692Ag422H7yRIr/9j/iKG4Thia/Oflx4TdL+IFJBAyPK9v6zZNZtBgPBynXb048hsP16l2vi0k5Q2JKiPDsEfBhGI+HnxLXEaUWAcVfCsQFvd2A1sxRr67ip5y2wwBelUecP3AjJ+YcxggGaMIIBlgIBATCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwCQYFKw4DAhoFAKBdMBgGCSqGSIb3DQEJAzELBgkqhkiG9w0BBwEwHAYJKoZIhvcNAQkFMQ8XDTExMTExNjE2MDIxNVowIwYJKoZIhvcNAQkEMRYEFIfUpBzHIqz5Vbtj7kqv0zD9+7hOMA0GCSqGSIb3DQEBAQUABIGAP4oOKoKG2rXJKewrUeJ4aak3htL1I9hJvNSHsIqrPwZSQSXnNTQ1G65U4f+hDLmPRnbtpJiZlJyDn21AqjcoZAALWhdeFdCEmZmyjgckZMGZndXSVYYIJmxqXCy2/rrGP4g0doXuUX/bmDtV2zocN9zgZuLFJW0I2IMvyTHFWXo=-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - Il sistema di pagamento online pi� facile e sicuro!">
<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>

		    </div>

    <?php
}

function ab_add_option_page()
{
    add_options_page('Amazon Box', 'Amazon Box', 'administrator', 'ab-options-page', 'ab_update_options_form');
}

add_action('admin_menu', 'ab_add_option_page');


function ab_activate_set_default_options()
{
	add_option('msg', 'Gli acquisti che consiglio');
    add_option('ab_box_1', '');
    add_option('ab_box_2', '');
    add_option('ab_box_3', '');
    add_option('ab_box_4', '');
    add_option('ab_box_5', '');
    add_option('ab_box_6', '');
    add_option('AS', 'Si');
    add_option('Pos', 'Bottom');
    add_option('Page', 'Entrambi');
}
register_activation_hook( __FILE__, 'ab_activate_set_default_options');

function ab_register_options_group()
{
	register_setting('ab_options_group','msg');
    register_setting('ab_options_group', 'ab_box_1');
    register_setting('ab_options_group', 'ab_box_2');
    register_setting('ab_options_group', 'ab_box_3');
    register_setting('ab_options_group', 'ab_box_3');
    register_setting('ab_options_group', 'ab_box_4');
    register_setting('ab_options_group', 'ab_box_5');
    register_setting('ab_options_group', 'ab_box_6');
    register_setting('ab_options_group', 'Page');
    register_setting('ab_options_group', 'AS');
    register_setting('ab_options_group', 'Pos');

}
add_action ('admin_init', 'ab_register_options_group');


wp_enqueue_style('ab-style', WP_PLUGIN_URL . '/Amazon-Box/style.css');

?>
