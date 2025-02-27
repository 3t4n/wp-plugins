<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.bozimedia.cz
 * @since      1.0.0
 *
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/admin/partials
 */
?>

<div class="wrap bozimediazalomeniOptionPage">
  <h1 class="wp-heading-inline">
    <?php echo __('Čeština: zalomení řádků', 'bozimediazalomeni'); ?>
  </h1>
  

  
  <h2>
  	<?php echo __('Čeština: typografie - zalomení řádků a nevhodné výrazy na jejich konci.', 'bozimediazalomeni'); ?>
  </h2>
  
  <div class="bozimediazalomeniOptionPage__columns">
    <div class="bozimediazalomeniOptionPage__column">
      
        <form method="post" action="options.php">
        <?php
            settings_fields( 'cestinazalomeni' );
            do_settings_sections( 'cestinazalomeni' );
        ?>
        
          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Předložky', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_prepositions" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_prepositions') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"><?php echo __('Vložit pevnou mezeru za předložky', 'bozimediazalomeni'); ?>:</th>
        			<td><input type="text" name="bozimediazalomeni_prepositions_list" value="<?php echo esc_attr( get_option('bozimediazalomeni_prepositions_list') ); ?>" /><p><?php echo __('(položky oddělte čárkou)', 'bozimediazalomeni'); ?></p></td>
        		</tr>
            </tbody>
          </table>
          
          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Spojky', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_conjunctions" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_conjunctions') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"><?php echo __('Vložit pevnou mezeru za spojky', 'bozimediazalomeni'); ?>:</th>
        			<td><input type="text" name="bozimediazalomeni_conjunctions_list" value="<?php echo esc_attr( get_option('bozimediazalomeni_conjunctions_list') ); ?>" /><p><?php echo __('(položky oddělte čárkou)', 'bozimediazalomeni'); ?></p></td>
        		</tr>            
            </tbody>
          </table>
          
          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Zkratky', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_abbreviations" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_abbreviations') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"><?php echo __('Vložit pevnou mezeru za zkratky', 'bozimediazalomeni'); ?>:</th>
        			<td><input type="text" name="bozimediazalomeni_abbreviations_list" value="<?php echo esc_attr( get_option('bozimediazalomeni_abbreviations_list') ); ?>" /><p><?php echo __('(položky oddělte čárkou)', 'bozimediazalomeni'); ?></p></td>
        		</tr>            
            </tbody>
          </table>    
          
          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Jednotky míry', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_between_number_and_unit" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_between_number_and_unit') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"><?php echo __('Vložit pevnou mezeru mezi číslovku a jednotku míry', 'bozimediazalomeni'); ?>:</th>
        			<td><input type="text" name="bozimediazalomeni_between_number_and_unit_list" value="<?php echo esc_attr( get_option('bozimediazalomeni_between_number_and_unit_list') ); ?>" /><p><?php echo __('(položky oddělte čárkou)', 'bozimediazalomeni'); ?></p></td>
        		</tr>            
            </tbody>
          </table>                 

          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Mezery uprostřed čísel', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_space_between_numbers" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_space_between_numbers') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"></th>
        			<td><p><?php echo __('Vložit pevnou mezeru mezi dvě čísla, která jsou oddělena mezerou, např. telefonní číslo 800 123 456.', 'bozimediazalomeni'); ?></p></td>
        		</tr>            
            </tbody>
          </table> 
          
          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Řadové číslovky', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_space_after_ordered_number" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_space_after_ordered_number') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"></th>
        			<td><p><?php echo __('Zabránit zalomení řádku za řadovou číslovkou, např. 1. ledna a v podobných případech).', 'bozimediazalomeni'); ?></p></td>
        		</tr>            
            </tbody>
          </table>           

          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('Měřítka a poměry', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td><input name="bozimediazalomeni_spaces_in_scales" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_spaces_in_scales') ) ); ?> /></td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"></th>
        			<td><p><?php echo __('Pevné mezery v měřítkách a poměrech (např. 1 : 50 000)', 'bozimediazalomeni'); ?></p></td>
        		</tr>            
            </tbody>
          </table> 
          
          	<br/>
            <h2>
  				<?php echo __('Podpora pluginů', 'bozimediazalomeni'); ?>
  			</h2>
  			<hr>
          <table class="widefat">
            <thead>
              <tr>
                <th colspan="2">
                  <?php echo __('ACF - Advanced Custom Fields', 'bozimediazalomeni'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
             	<tr valign="top">
        			<th scope="row"><?php echo __('Aktivovat', 'bozimediazalomeni'); ?>:</th>
        			<td>
        			<?php 
        		      // If we can't detect ACF
		              if ( ! class_exists( 'acf' )  ):
                      ?>
                      	<p class="color"><?php echo __('plugin nenalezen', 'bozimediazalomeni'); ?></p>
                      <?php
		              else:
		              ?>
        				<input name="bozimediazalomeni_acf" type="checkbox" value="on" <?php checked( 'on', esc_attr( get_option('bozimediazalomeni_acf') ) ); ?> />
        			  <?php endif;?>
        			</td>
        		</tr>            
             	<tr valign="top">
        			<th scope="row"></th>
        			<td>
        				<p>Aktivuje úpravu zalomování češtiny pro plugin <a href="https://www.advancedcustomfields.com" target="_blank" >ACF - Advanced Custom Fields</a></p>
        				<p>Ovlivněné typy polí jsou <strong>text, text area, wisiwig editor</strong></p>
        			</td>
        		</tr>            
            </tbody>
          </table>          
          
          <?php submit_button(); ?>
        </form>
      
    </div>
    <div class="bozimediazalomeniOptionPage__column">
      
      <table class="widefat">
          <thead>
            <tr>
              <th>Jak to funguje?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              	<p>Plugin nahradí u vybraných výrazů mezery pevnými (nedělitelnými) mezerami, a zabrání tak  jejich špatnému zalomení na konci řádku.</p>
                <p>Detailní informace dohledáte na webu <a href="http://prirucka.ujc.cas.cz/?id=880" target="_blank">Ústavu pro jazyk český</a>.</p>
              </td>
            </tr>
          </tbody>
        </table>
        
      <table class="widefat">
          <thead>
            <tr>
              <th>Máte nápad na novou funkci?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              	<p>Pokud máte nějaký nápad nebo připomínku, napište ji prosím do komentářů. Pokusíme se jí přidat.</p>
              </td>
            </tr>
          </tbody>
        </table>

      <table class="widefat">
          <thead>
            <tr>
              <th>Líbí se vám plugin? A už jste ho ohodnotili?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              	<p>Dejte nám prosím vědět, co si myslíte o našem pluginu. Je důležité, abychom tento nástroj mohli rozvíjet. Děkujeme za všechna hodnocení, recenze a příspěvky.</p>
             	<p class="bozimediazalomeniOptionPage__button">
          			<a href="https://wordpress.org/support/plugin/cestina-zalomeni-radku/reviews/#new-post" target="_blank" class="button button-primary">Přidat hodnocení</a>
          		</p>
              </td>
            </tr>
          </tbody>
        </table>   
        
      <table class="widefat">
          <thead>
            <tr>
              <th>Chtěli byste ocenit naši práci?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              	<p>
              		<a href="https://www.paypal.me/bozimedia" target="_blank">
              			<img alt="Darovat" src="<?php echo BOZIMEDIAZALOMENI_PLUGIN_PATH; ?>admin/img/donate-button.png">
              		</a>
              	</p>
              </td>
            </tr>
          </tbody>
        </table>              
        
    </div>
  </div>
</div>