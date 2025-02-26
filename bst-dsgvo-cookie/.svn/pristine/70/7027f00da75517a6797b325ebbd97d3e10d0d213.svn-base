<?php
// Output function that displays the option page content
function bst_options_page() {

	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( 'Zugriff verweigert' );
	}

	$bst_options = get_option('bst_settings');
	$bst_plugin_name = "BST DSGVO Cookie";


	ob_start(); ?>
    
	<div class="wrap theme-options-wrap">
    
		<h2><?php _e($bst_plugin_name . ' - Einstellungen', 'bst-dsgvo-cookie'); ?></h2>
        <p><?php _e('Ein Plugin von ', 'bst-dsgvo-cookie'); ?><a href="https://www.bst-systemtechnik.de" target="_blank" title="BST Systemtechnik - Webdesign aus Gießen">BST Systemtechnik</a> - Ihr Partner für individuelle Web- und Softwareentwicklung.</p>
        <p style="max-width:600px">
        BST DSGVO Cookie ist ein Plugin um Webseitenbesucher über den Einsatz von Cookies zu informieren. 
        Webseitenbetreiber müssen, um Ihre Webseiten DSGVO konform zu publizieren ihre Besucher auf die Verwendung von Cookies hinweisen und darüber informieren, 
        dass bei weiterem Besuch der Webseite von der Einwilligung des Nutzers in die Verwendung von Cookies ausgegangen wird.
        
        </p>
        <p style="font-size:12px;line-height:14px;margin-bottom:5px;color:#808080"><a style="color:#808080" title="Erklärung zum Haftungssauschluss" href="https://www.bst-systemtechnik.de/dsgvo-cookie-hinweis-bst-dsgvo-cookie-wordpress-plugin/#Haftungsausschluss" target="_blank" rel="nofollow">Haftungsauschluss für den Einsatz von BST DSGVO Cookie</a></p>
        <br/>
       
		<form method="post" action="options.php">

        	<?php settings_fields('bst_settings_group'); ?>

            <p class="submit">
            	<input type="submit" class="button-primary" value="<?php _e('Einstellungen speichern', 'bst-dsgvo-cookie'); ?>" />
            </p>
            <br/>
            
            <h3><?php _e('Grundeinstellung', 'bst-dsgvo-cookie'); ?></h3>
            <hr>
           
            <p>
            	<input id="bst_settings[enable]" name="bst_settings[enable]" type="hidden" value="0"  /> 
                <?php $enable = (isset($bst_options['enable'])) ? $bst_options['enable'] : 0; ?>
                <label class="description">
					<input id="bst_settings[enable]" name="bst_settings[enable]" type="checkbox" value="1" <?php checked(1, $enable); ?> /> 
					<?php _e('Cookie Pop-up aktivieren', 'bst-dsgvo-cookie'); ?>
            	</label>
            </p>
            
            <p>
            	<input id="bst_settings[front-only]" name="bst_settings[front-only]" type="hidden" value="0"  /> 
                <?php $frontOnly = (isset($bst_options['front-only'])) ? $bst_options['front-only'] : 0; ?>
                <label class="description">
            	<input id="bst_settings[front-only]" name="bst_settings[front-only]" type="checkbox" value="1" <?php checked(1, $frontOnly); ?> /> 
            	<?php _e('Nur auf der Startseite zeigen', 'bst-dsgvo-cookie'); ?>
            	</label>
            </p>
            
            <p>
            	<input id="bst_settings[fixed-to-bottom]" name="bst_settings[fixed-to-bottom]" type="hidden" value="0"  /> 
                <?php $fixedToBottom = (isset($bst_options['fixed-to-bottom'])) ? $bst_options['fixed-to-bottom'] : 0; ?>
                <label class="description">
            	<input id="bst_settings[fixed-to-bottom]" name="bst_settings[fixed-to-bottom]" type="checkbox" value="1" <?php checked(1, $fixedToBottom); ?> /> 
            	<?php _e('Im Fußbereich der Seite einblenden', 'bst-dsgvo-cookie'); ?>
            	</label>
            </p>
            <br/>
          
            <h3><?php _e('Texte', 'bst-dsgvo-cookie'); ?></h3>
            <hr>

            <h4><?php _e('Pop-up Meldung', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input class="bst-message" id="bst_settings[message]" name="bst_settings[message]" type="text" maxlength="300" value="<?php sanitize_text_field(bst_value('message')); ?>" /> 
            	<label class="description" for="bst_settings[message]"><?php _e('', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>

            <h4><?php _e('Text: Button - Akzeptieren', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[accept]" name="bst_settings[accept]" type="text" maxlength="50" value="<?php sanitize_text_field(bst_value('accept')); ?>" /> 
            	<label class="description" for="bst_settings[accept]"><?php _e(''); ?></label>
            </p><br/>
                        
            <h4><?php _e('Text: Link - Weitere Informationen', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[more-info]" name="bst_settings[more-info]" type="text" maxlength="50" value="<?php sanitize_text_field(bst_value('more-info')); ?>" /> 
            	<label class="description" for="bst_settings[more-info]"><?php _e('', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>
                        
            <h4><?php _e('Link zur Seite mit Cookie Erklärung', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input style="width:350px;" id="bst_settings[policy-url]" name="bst_settings[policy-url]" type="text" maxlength="400" value="<?php sanitize_text_field(bst_value('policy-url')); ?>" /> 
            	<label class="description" for="bst_settings[policy-url]"><?php _e('Typischerweise die Seite Datenschutzerklärung. (Den führenden Slash bitte nicht vergessen!)', 'bst-dsgvo-cookie'); ?></label>
            </p>

            <p>
                <?php if(isset($bst_options['target'])) {


                    if ($bst_options['target']=="_blank")  {

                        $self_selected="";
                        $blank_selected="selected";

                    } else {

                        $self_selected="selected";
                        $blank_selected="";

                    }    


               } else {

                    $bst_options['target']="_self";
                    $self_selected="selected";
                    $blank_selected="";
                }
            
              
               ?>
        
               <label class="description">

                    <select  id="bst_settings[target]" name="bst_settings[target]"  style="width:350px;">
                           <option value="_self" <?php echo $self_selected ?>>Cookie Erklärung im selben Tab / Fenster öffnen</option>
                           <option value="_blank" <?php echo $blank_selected ?>>Cookie Erklärung im neuen Tab / Fenster öffnen</option>
                   </select> 
               </label>

          </p>
                       
            <br/><br/>
                        
            <h3><?php _e('Styling', 'bst-dsgvo-cookie'); ?></h3>
            <hr>

            <h4><?php _e('Schriftart', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[font]" name="bst_settings[font]" type="text" maxlength="100" value="<?php sanitize_text_field(bst_value('font')); ?>" /> 
            	<label class="description" for="bst_settings[font]"><?php _e('Zum Bsp. Century Gothic', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>
                        
            <h4><?php _e('Breite auf mobilen Geräten', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[width]" name="bst_settings[width]" type="number" value="<?php bst_value('width'); ?>" /> 
            	<label class="description" for="bst_settings[width]"><?php _e('%', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>
                        
            <h4><?php _e('Maximale Breite auf dem Desktop', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[max-width]" name="bst_settings[max-width]" type="number" value="<?php bst_value('max-width'); ?>" /> 
            	<label class="description" for="bst_settings[max-width]"><?php _e('px', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>
            
            <h4><?php _e('Pop-up - Padding (Top und Bottom)', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[padding]" name="bst_settings[padding]" type="number" value="<?php bst_value('padding'); ?>" /> 
            	<label class="description" for="bst_settings[padding]"><?php _e('px', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>
                        
            <h4><?php _e('Pop-up - Hintergrundfarbe', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="1" class="color" name="bst_settings[background]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('background')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>
                       
            <h4><?php _e('Pop-up - Rahmenfarbe [Bottom]', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="2" class="color" name="bst_settings[border]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('border')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>
                       
            <h4><?php _e('Pop-up - Rahmengröße [Bottom]', 'bst-dsgvo-cookie'); ?></h4>
            <p>
            	<input id="bst_settings[border-size]" name="bst_settings[border-size]" type="number" value="<?php bst_value('border-size'); ?>" /> 
            	<label class="description" for="bst_settings[border-size]"><?php _e('px', 'bst-dsgvo-cookie'); ?></label>
            </p><br/>            
                       
            <h4><?php _e('Pop-up - Textfarbe', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="3" class="color" name="bst_settings[text-color]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('text-color')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>

            <h4><?php _e('Weiterlesen Link - Text Farbe', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="5" class="color" name="bst_settings[link-color]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('link-color')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>
           
            <h3><?php _e('Akzeptieren Button', 'bst-dsgvo-cookie'); ?></h3>
            <hr>

            <h4><?php _e('Button Typ', 'bst-dsgvo-cookie'); ?></h4>
            <p>
              
               <?php $button_typ = (isset($bst_options['button_typ'])) ? $bst_options['button_typ'] : 0; 
                        if ($button_typ ==1) {
                            $Bootstrap_Button_selected = "selected";
                            $Individueller_Button_selected ="";
                        } else if  ($button_typ ==2) {
                            $Bootstrap_Button_selected = "";
                            $Individueller_Button_selected ="selected";   
                        } else {
                            $Bootstrap_Button_selected = "selected";
                            $Individueller_Button_selected ="";
                        }

                        //show_button_options ($button_typ);    
                ?>
         
                <label class="description">

                     <select  id="bst_settings[button_typ]" name="bst_settings[button_typ]" onchange="show_button_options()">
                            <option value="1" <?php echo $Bootstrap_Button_selected ?>>Bootstrap Button</option>
                            <option value="2" <?php echo $Individueller_Button_selected ?>>Individueller Button</option>
                    </select> 
                </label>

           </p><br/>
        
           <div id="button_options">             
            <h4><?php _e('Akzeptieren Button - Hintergrund Farbe', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="4" class="color" name="bst_settings[button-bg]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('button-bg')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>
            
            <h4><?php _e('Akzeptieren Button - Text Farbe', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="4" class="color" name="bst_settings[button-textcolor]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('button-textcolor')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>

            <h4><?php _e('Akzeptieren Button - Farbe Hover Effekt', 'bst-dsgvo-cookie'); ?></h4>
            <p>
                <div class="color-picker" style="position:relative;">
                    <input data-id="4" class="color" name="bst_settings[button-hovercolor]" type="text" maxlength="7" value="<?php sanitize_text_field(bst_value('button-hovercolor')); ?>" />
                    <div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
                </div>
            </p><br/>
            
            </div>

            <p class="submit">
            	<input type="submit" class="button-primary" value="<?php _e('Einstellungen speichern', 'bst-dsgvo-cookie'); ?>" />
            </p>

        </form>
        
	</div>
  
    <script>


        jQuery(document).ready( function() {
            var e = document.getElementById("bst_settings[button_typ]");
            var index= e.options[e.selectedIndex].value;
        
            if (index==2) {
                jQuery("#button_options").fadeIn();
            } else {
                jQuery("#button_options").fadeOut(200);
            }

        } );


        function show_button_options () {
            var e = document.getElementById("bst_settings[button_typ]");
            var index= e.options[e.selectedIndex].value;
        
            if (index==2) { //Individueller Button
                jQuery("#button_options").fadeIn();
            } else { //Standard Bootstrap Button
                jQuery("#button_options").fadeOut(200);
            }
            
        }


    </script>

    



    <?php
	echo ob_get_clean();
}
?>