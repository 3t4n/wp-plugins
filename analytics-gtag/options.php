<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap">
<h1>Analytics für Wordpress (Einstellungen)</h1>
<script>	
<?php require plugin_dir_path(__FILE__) . 'oberflaeche.js'; ?>
<?php require plugin_dir_path(__FILE__) . 'data.js'; ?>
</script>
<?php 
echo '<link rel="stylesheet" href="' . plugins_url( 'oberflaeche.css', __FILE__ ) . '" > ';
echo '<link rel="stylesheet" href="' . plugins_url( 'Checkbox.css', __FILE__ ) . '" > ';
if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true'):
   echo    '<div id="setting-error-settings_updated" class="updated settings-error"> 
<p><strong>Einstellungen gespeichert.</strong></p></div>';
endif;
?>
<body>
<div class="tab">
  <button id="General" class="tablinks" onclick="openCity(event, 'London')" checked="checked"><font color="#ffffff">General</font></button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"><font color="#ffffff">Tracking</font></button>
  <button class="tablinks" onclick="openCity(event, 'Dublin')"><font color="#ffffff">Banner</font></button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')"><font color="#ffffff">Werbe- Integration</font></button>
</div>
<div id="London" class="tabcontent">
     <form method="post" action="options.php">
       <?php settings_fields( 'AGgaw-settings-group' ); ?>
       <?php do_settings_sections( 'AGgaw-settings-group' ); ?>
       <table class="form-table">
          <tr valign="top">
            <th scope="row"><font color="##ffffff">Tracking Code</font></th>
            <td>
               <input id="gaId" type="text" style="width:50%" name="AGgaw_analytics_id" value="<?php echo get_option('AGgaw_analytics_id', 'UA-XXXXXXXX-1'); ?>" />
               <br/><small>Wenn Sie noch keine Analyticskonto haben <a href="https://analytics.google.com/" target="_blank">click here.</a></small>
            </td>
          </tr>
 <tr valign="top">
             <th scope="row"><font color="##ffffff"/>Opt Out Script implementieren</th>
             <td>
                <select id="AnOptOut" name="AGgaw_opt_out" class="select">
                   <option value="" <?php if( get_option('AGgaw_opt_out') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value="Ja" <?php if( get_option('AGgaw_opt_out') == "Ja" ): echo 'selected'; endif;?> >Ja</option>
               </select>
               <br/><small>Implementiert das Opt Out Script zum deaktivieren von Analytics (Deutschland und Östereich plicht)</small>
            </td>
          </tr>  
		  <tr valign="top">
             <th scope="row"><font color="##ffffff">IP Anonymisieren</font></th>
             <td>
                <select id="AnIpAnno" name="AGgaw_annonymize_ip" class="select">
                   <option value="" <?php if( get_option('AGgaw_annonymize_ip') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value=", { 'anonymize_ip': true }" <?php if( get_option('AGgaw_annonymize_ip') == ", { 'anonymize_ip': true }" ): echo 'selected'; endif;?> >Ja</option>
               </select>
               <br/><small>Anonzmisiert die IP- Adresse (Deutschland und Östereich plicht)</small>
            </td>
          </tr>  
		   		   <tr valign="top">
            <th scope="row"><font color="##ffffff">Facebook ID</font></th>
            <td>
               <input id="fbId" type="text" style="width:50%" name="AGgaw_facebook_id" value="<?php echo get_option('AGgaw_facebook_id', 'Id hier einfügen'); ?>" />
               <br/><small>Wenn Sie noch keine Facebook Pixel haben <a href="https://www.facebook.com/business/help/952192354843755" target="_blank">click here.</a></small>
            </td>
          </tr>
          <tr valign="top">
             <th scope="row"><font color="##ffffff">Analytics, Facebook und Banner aktivieren</font></th>
             <td>
               <select id="Aktivieren" name="AGgaw_disable_track" class="select">
                   <option value="Nein" <?php if( get_option('AGgaw_disable_track') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value="Ja" <?php if( get_option('AGgaw_disable_track') == "Ja" ): echo 'selected'; endif;?> >Nur Analytics</option>
				   <option value="Banner" <?php if( get_option('AGgaw_disable_track') == "Banner" ): echo 'selected'; endif;?> >Analytics und Banner</option>
				   <option value="BannerFacebook" <?php if( get_option('AGgaw_disable_track') == "BannerFacebook" ): echo 'selected'; endif;?> >Analytics Facebook und Banner</option>
				   <option value="FacebookBannerk" <?php if( get_option('AGgaw_disable_track') == "FacebookBanner" ): echo 'selected'; endif;?> >Facebook und Banner</option>
				   <option value="nurFacebook" <?php if( get_option('AGgaw_disable_track') == "nurFacebook" ): echo 'selected'; endif;?> >Nur Facebook</option>
                   <option value="nurBanner" <?php if( get_option('AGgaw_disable_track') == "nurBanner" ): echo 'selected'; endif;?> >Nur Banner</option>
               </select>
               <br/><small>Wählen Sie ob Analytics oder der Banner aktiviert werden soll</small>
            </td>
          </tr>   
       </table>
       <?php submit_button(); ?>

       <p>Für Hilfe <a href="http://www.analytics-sem-tutorials.de/2017/10/22/google-analytics-einrichten-wordpress/" target="_blank">Klicken Sie hier</a></p>
   </form>
</div>

<div id="Paris" class="tabcontent" style="display:none;">
   <form method="post" action="options.php">
       <?php settings_fields( 'AGet-settings-group' ); ?>
       <?php do_settings_sections( 'AGet-settings-group' ); ?>
       <table class="form-table">
       <tr valign="top">
             <th scope="row"><font color="##ffffff">YouTubeTracking</font></th>
             <td>
                <select id="gaYouTube" name="AGet_youtube" class="select">
                   <option value="" <?php if( get_option('AGet_youtube') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value="Ja" <?php if( get_option('AGet_youtube') == "Ja" ): echo 'selected'; endif;?> >Ja</option>
               </select>
               <br/><small>Trackt Play, Pause, Weiterspielen und den % Satz der länge</small>
            </td>
          </tr>  
		<tr valign="top">
             <th scope="row"><font color="##ffffff">Kontaktform 7</font></th>
             <td>
                <select id="gaForm7" name="AGet_form7" class="select">
                   <option value="" <?php if( get_option('AGet_form7') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value="Ja" <?php if( get_option('AGet_form7') == "Ja" ): echo 'selected'; endif;?> >Ja</option>
               </select>
               <br/><small>Trackt das Übermitteln des Kontaktformulars. Kategorie: Kontakt Action: Kontakformular</small>
            </td>
          </tr>  
	  <tr valign="top">
             <th scope="row"><font color="##ffffff">Normales Scrolltracking oder Erweitertes</font></th>
             <td>
                <select id="ScrollT" name="AGet_Scroll" class="select">
                   <option value="" <?php if( get_option('AGet_Scroll') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value="Ja" <?php if( get_option('AGet_Scroll') == "Ja" ): echo 'selected'; endif;?> >Ja</option>
					<option value="AdvSt" <?php if( get_option('AGet_Scroll') == "AdvSt" ): echo 'selected'; endif;?> >Erweitertes (Ermittelt Leser oder Scroller)</option>
               </select>
               <br/><small>Aktiviert das Scrolltracking, "Erweitertes" setzt die Zeit in verhältnis mit der Tiefe</small>
            </td>
          </tr>  
       </table>
       <?php submit_button(); ?>

       <p>Für Hilfe <a href="http://www.analytics-sem-tutorials.de/2017/10/22/google-analytics-einrichten-wordpress/" target="_blank">Klicken Sie hier</a></p>
   </form>
</div>


<div id="Dublin" class="tabcontent" style="display:none;">
 <form method="post" action="options.php">
       <?php settings_fields( 'AGbn-settings-group' ); ?>
       <?php do_settings_sections( 'AGbn-settings-group' ); ?>
       <table class="form-table">
       <tr valign="top">
             <th scope="row"><font color="##ffffff">Banner Design</font></th>
             <td>
                <select name="AGbn_BannerDesign" class="ccselect">
                   <option value="light" <?php if( get_option('AGbn_BannerDesign') == "light" ): echo 'selected'; endif;?> >Hell</option>
                   <option value="dark" <?php if( get_option('AGbn_BannerDesign') == "dark" ): echo 'selected'; endif;?> >Dunkel</option>
					<option value="monochrome" <?php if( get_option('AGbn_BannerDesign') == "monochrome" ): echo 'selected'; endif;?> >Monochrome</option>
               </select>
               <br/><small>Helles oder Dunkles Design des Banners </small>
            </td>
          </tr>  
		<tr valign="top">
             <th scope="row"><font color="##ffffff">Banner Position oder Modalbox</font></th>
             <td>
                <select name="AGbn_Position" class="ccselect">
				   <option value="modals" <?php if( get_option('AGbn_Position') == "modals" ): echo 'selected'; endif;?> >modal</option>
                   <option value="top" <?php if( get_option('AGbn_Position') == "top" ): echo 'selected'; endif;?> >Oben</option>
                   <option value="bottom" <?php if( get_option('AGbn_Position') == "bottom" ): echo 'selected'; endif;?> >Unten</option>
               </select>
               <br/><small>Soll der Banner oben oder unten am Bildschirm sein ode mittig als box</small>
            </td>
          </tr>  
         <tr valign="top">
            <th scope="row"><font color="##ffffff">URL der Datenschutzerklährung</font></th>
            <td>
               <input class="ccText" type="text" style="width:50%" name="AGbn_DatenschutzSeite" value="<?php echo get_option('AGbn_DatenschutzSeite', 'https://IhreDomain.de/Datenschutz.html'); ?>" />
               <br/><small>Beispiel: https://www.IhreDomain.de/Datenschutz.html</small>
            </td>
          </tr>
         <tr valign="top">
            <th scope="row"><font color="##ffffff">Text auf dem Banner</font></th>
            <td>
               <input class="ccText" type="text" style="width:50%" name="AGbn_TextBanner" value="<?php echo get_option('AGbn_TextBanner', 'Um unsere Webseite für Sie optimal zu gestalten und fortlaufend verbessern zu können, verwenden wir Cookies. Durch die weitere Nutzung der Webseite stimmen Sie der Verwendung von Cookies zu. Weitere Informationen zu Cookies erhalten Sie in unserer Datenschutzerklärung.'); ?>" />
               <br/><small>Wenn freigelassen wirs, erscheint der Standardtext</small>
            </td>
          </tr>
        <tr valign="top">
            <th scope="row"><font color="##ffffff">Cookiebeschreibung für funktionelle Cookies</font></th>
            <td>
               <input class="ccText" type="text" style="width:50%" name="AGbn_fCookie" value="<?php echo get_option('AGbn_fCookie', 'Funktionelle Cookies können nicht deaktiviert werden.'); ?>" />
               <br/><small>Wenn freigelassen wirs, erscheint der Standardtext</small>
            </td>
          </tr>
       <tr valign="top">
            <th scope="row"><font color="##ffffff">Cookiebeschreibung für soziale Netzwerke</font></th>
            <td>
               <input class="ccText" type="text" style="width:50%" name="AGbn_sCookie" value="<?php echo get_option('AGbn_sCookie', 'Zu Facebook, Twitter und andere Netzwerke wird ein Seitenaufruf übermittel um geziehlt Werbung schalten zu können.'); ?>" />
               <br/><small>Wenn freigelassen wird, erscheint der Standardtext</small>
            </td>
          </tr>
       <tr valign="top">
            <th scope="row"><font color="##ffffff">Cookiebeschreibung für Analytics</font></th>
            <td>
               <input class="ccText" type="text" style="width:50%" name="AGbn_aCookie" value="<?php echo get_option('AGbn_aCookie', 'Google Analytics ermittelt Seitenaufrufe, Klicks, und die Scrolltiefe um die Nutzererfahrung auf unsererer Seite zu verbessern.'); ?>" />
               <br/><small>Wenn freigelassen wird, erscheint der Standardtext</small>
            </td>
          </tr>
      <tr valign="top">
            <th scope="row"><font color="##ffffff">Cookiebeschreibung für Webenetzwerke (Adwords, Bing, etc.)</font></th>
            <td>
               <input class="ccText" type="text" style="width:50%" name="AGbn_wCookie" value="<?php echo get_option('AGbn_wCookie', 'Für Werbe und Remarketing werden Daten gesammelt wie Klicks bzw. bestimmte Seitenaufrufe und in einem Cookie gespeichert.'); ?>" />
               <br/><small>Wenn freigelassen wird, erscheint der Standardtext</small>
            </td>
          </tr>
       </table>
       <?php submit_button();?>

       <p>Für Hilfe <a href="http://www.analytics-sem-tutorials.de/2017/10/22/google-analytics-einrichten-wordpress/" target="_blank">Klicken Sie hier</a></p>
   </form>
	
</div>
	
	
	
<div id="Tokyo" class="tabcontent" style="display:none;"> 
	<form method="post" action="options.php">
       <?php settings_fields( 'ad-settings-group' ); ?>
       <?php do_settings_sections( 'ad-settings-group' ); ?>
       <table class="form-table">
       <tr valign="top">
		   <!----------
             <th scope="row"><font color="##ffffff">AdSense</font></th>
             <td>
                <select id="AdSense" name="ad_sense" class="select">
                   <option value="" <?php if( get_option('ad_AdSense') == "Nein" ): echo 'selected'; endif;?> >Nein</option>
                   <option value="Ja" <?php if( get_option('ad_AdSense') == "Ja" ): echo 'selected'; endif;?> >Ja</option>
               </select>
               <br/><small>Fügt den Adsense Code Ihrer Webseite hinzu</small>
            </td>
		   <td>
               <input class="ad" type="text" style="width:50%" name="ad_AdSenseCode" value="<?php echo get_option('ad_AdSenseCode'); ?>" />
               <br/><small>Ihr Adsense Code</small>
            </td>
          </tr> 
          -------------->
       </table>
       <?php //submit_button(); ?>

</div>
</body>
</div>
