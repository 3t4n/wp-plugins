<?php
class class_export {
  /*
  function generate_Meta_Tags(){
  // alt, wird demnächst entfernt
    global $post;
    $save = array();
    // dynamisch ersetzt!
    $myposts = get_posts('numberposts=20');
    foreach($myposts as $post) {
      $custom_field_keys = get_post_custom_keys($post->ID);
      if ($custom_field_keys != null){
	      foreach ( $custom_field_keys as $key => $value ) {
	        $valuet = trim($value);
	        $save[] = $value;
	      }
      }
    }
    
    
    $save = array_merge(array_unique($save));
		// Filter, sollte man vielleicht auslagern. Nee! :D DB gestützt ...
   	for ($i = 0; $i < count($save); $i ++){
   		if (ereg("_edit_lock", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   		if (ereg("_edit_last", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   		if (ereg("_rc_cwp_write_panel_id", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   		if (ereg("typ", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   	}
    return $save;
  }
  */
  function add_Meta_Box(){
    $this->load_js_selector();
    //alte Meta-Methoden entfernt
    //$array = $this->generate_Meta_Tags();
    $array = $this->Meta_filter();
    $out = '<label for="checkall">markieren: <input type="radio" name="checkall" id="checkall" onclick="checkedall(true)" /> alle <input type="radio" name="checkall" onclick="checkedall(false)" /> keine</label>';
    for ($i = 0; $i < 46; $i ++){
      if ($i == 0){ 
        $out .= '<fieldset><legend>Person</legend>';}
      if ($i == 8){
        $out .= '</fieldset>
                <fieldset><legend>Kontaktdaten 1</legend>';}
      if ($i == 24){
        $out .= '</fieldset>
                 <fieldset><legend>Kontaktdaten 2</legend>'; }
      if ($i == 39){
        $out .= '</fieldset>
                 <fieldset><legend>Bankverbindung</legend>';}
      if ($i == 44){
        $out .= '</fieldset>
                 <fieldset><legend>Mitgliedschaft</legend>';}
      if ($i == 51){
        $out .= '</fieldset>
                 <fieldset><legend>Informationen</legend>';}
      $out .= '<label class="checkbox"><input type="checkbox" name="'.$i.'" value="'.utf8_encode($array[1][$i]).'" /> '.utf8_encode($array[0][$i]).'</label><br />';
      if ($i == 52){
        $out .= '</fieldset>';}
    }
    echo $out;
  }
  
	function load_js_selector(){
		echo '<script type="text/javascript">
		<!--
		function checkedall(checked)
		{
			for (var i = 2; i < document.forms[0].elements.length; i++) {
			  document.forms[0].elements[i].checked = checked;
			}
		}
		//-->
	</script>';
	}
	
	function filter($meta_box){
	$checked = array();
	unset($meta_box['checkall']);
		for ($i = 0; $i < count($meta_box); $i++){
			for ($j = 0; $j < $_POST['checked_num']; $j ++){
				if ($meta_box[$i] == 'checked'.$j){
					$checked[] = $meta_box[$i];
					unset($meta_box[$i]);
				}
			}
		}
		$meta_box = array_merge(array_unique($meta_box));
		return $meta_box;
  }
  
  function export_via_posts($postID, $meta){
    $dir = dirname (__FILE__) . '/down/';
    $fp = fopen($dir.'export.csv', 'w');
    
    $content = '';
    for ($i = 0; $i < count($meta); $i ++){
      if ($meta[$i] == 'email'){
        $content .= '"e-mail"';
      }else { 
        $content .= '"'.$meta[$i].'"';
      }
      if ($i == count($meta)-1){
        $content .= "\r\n";
      } else {
        $content.= ",";
      }
    }
    
    
    for ($i = 0; $i < count($postID); $i ++){
      for ($k = 0; $k < count($meta); $k ++){
        $content .= '"'.get_post_meta($postID[$i], $meta[$k], true).'"';
        if ($k == count($meta)-1){
          $content .= "\r\n";
        } else {
          $content.= ",";
        }         
      } 
    }
    //echo '<pre>'.$content.'</pre>';

    fwrite($fp, utf8_decode($content));    
    fclose($fp);
    
    echo '<a href="'.get_option('siteurl').'/wp-content/themes/wp-contact-manager/down/export.csv" class="exportbutton">Datei herunterladen</a>';
  }
  // Zeiger
  function Meta_filter(){
    // nicht DB gestützt! Schneller ... einfacher zu verarbeiten
      $filter = array();
      // Person
      $filter[0][0] = 'Anrede Teil 1';
      $filter[0][1] = 'Geschelchtsbezogene Anrede';
      $filter[0][2] = 'Namenszusatz vor dem Nachnamen';
      $filter[0][3] = 'Nachname (inkl. Namenszusätze nach dem Namen)';
      $filter[0][4] = 'Vorname/n';
      $filter[0][5] = '(Amts-)Bezeichnung (vor dem Namen)';
      $filter[0][6] = 'Titel (vor dem Namen)';
      $filter[0][7] = 'Geb.-Datum';
      
      // Kontaktdaten 1
      $filter[0][8] = 'Name der Einrichtung';
      $filter[0][9] = 'Funktion/Position';
      $filter[0][10] = 'Untergliederung/en der Einrichtung';
      $filter[0][11] = 'Straße und Hausnummer oder Postfach';
      $filter[0][12] = 'PLZ';
      $filter[0][13] = 'Ort';
      $filter[0][14] = 'Staat';
      $filter[0][15] = 'Zweistelliges Länderkürzel des Staates';
      $filter[0][16] = 'E-Mail';
      $filter[0][17] = 'Telefon/Festnetz';
      $filter[0][18] = 'Fax';
      $filter[0][19] = 'Mobiltelefon';
      $filter[0][20] = 'Skype';
      $filter[0][21] = 'MSN';
      $filter[0][22] = 'ICQ';
      $filter[0][23] = 'Website';
      
      // Kontaktdaten 2
      $filter[0][24] = 'Name der Einrichtung';
      $filter[0][25] = 'Funktion/Position';
      $filter[0][26] = 'Untergliederung/en der Einrichtung';
      $filter[0][27] = 'Straße und Hausnummer oder Postfach';
      $filter[0][28] = 'PLZ';
      $filter[0][29] = 'Ort';
      $filter[0][30] = 'Staat';
      $filter[0][31] = 'Zweistelliges Länderkürzel des Staates';
      $filter[0][32] = 'E-Mail';
      $filter[0][33] = 'Telefon/Festnetz';
      $filter[0][34] = 'Fax';
      $filter[0][35] = 'Mobiltelefon';
      $filter[0][36] = 'Skype';
      $filter[0][37] = 'MSN';
      $filter[0][38] = 'ICQ';
      
      // Bank
      $filter[0][39] = 'Bank';
      $filter[0][40] = 'BLZ';
      $filter[0][41] = 'Bankkontonr.';
      $filter[0][42] = 'IBAN';
      $filter[0][43] = 'SWIFT/BIC';   
      
      // Extra
      $filter[0][44] = 'Extra Informationen';
      $filter[0][45] = 'Kommentar';
      
      // Auflösung
      // Person
      $filter[1][0] = 'anrede1';
      $filter[1][1] = 'anrede2';
      $filter[1][2] = 'namenszusatz';
      $filter[1][3] = 'nachname';
      $filter[1][4] = 'vorname';
      $filter[1][5] = 'bezeichnung';
      $filter[1][6] = 'titel';
      $filter[1][7] = 'geb-date';
      
      // Kontaktdaten 1
      $filter[1][8] = 'name_der_einrichtung';
      $filter[1][9] = 'funktion-position';
      $filter[1][10] = 'untergliederung/en_der_einrichtung';
      $filter[1][11] = 'strasse_und_hausnummer-postfach';
      $filter[1][12] = 'plz';
      $filter[1][13] = 'ort';
      $filter[1][14] = 'staat';
      $filter[1][15] = 'laenderkuerzel';
      $filter[1][16] = 'email';
      $filter[1][17] = 'telefon';
      $filter[1][18] = 'fax';
      $filter[1][19] = 'mobiltel';
      $filter[1][20] = 'skype';
      $filter[1][21] = 'msn';
      $filter[1][22] = 'icq';
      $filter[1][23] = 'website';
      
      // Kontaktdaten 2
      $filter[1][24] = 'name_der_einrichtung2';
      $filter[1][25] = 'funktion-position2';
      $filter[1][26] = 'untergliederung/en_der_einrichtung2';
      $filter[1][27] = 'strasse_und_hausnummer-postfach2';
      $filter[1][28] = 'plz2';
      $filter[1][29] = 'ort2';
      $filter[1][30] = 'staat2';
      $filter[1][31] = 'laenderkuerzel2';
      $filter[1][32] = 'email2';
      $filter[1][33] = 'telefon2';
      $filter[1][34] = 'fax2';
      $filter[1][35] = 'mobiltel2';
      $filter[1][36] = 'skype2';
      $filter[1][37] = 'msn2';
      $filter[1][38] = 'icq2';
      
      // Bank
      $filter[1][39] = 'bank';
      $filter[1][40] = 'blz';
      $filter[1][41] = 'bankkontonr';
      $filter[1][42] = 'iban';
      $filter[1][43] = 'swift/bic';
      
      // Extra
      $filter[1][44] = 'extra';
      $filter[1][45] = 'kommentar';
      
      
      return $filter;
  }
  
   function export_all($meta){
   // experimentell
    global $wpdb;
    $sql_meta = '';
    $IDs = array();
    
    for ($i = 0; $i < count($meta); $i++){
      if ($i != 0)
        $sql_meta .= " OR ";  
      $sql_meta .= "meta_key ='" . $meta[$i] . "'";
    }
    
    $array = $wpdb->get_results("SELECT post_id, meta_key, meta_value 
                        FROM $wpdb->postmeta
                        WHERE $sql_meta");
                        
    for ($i = 0; $i < count($array); $i++){ 
      $IDs[$i] = $array[$i]->post_id;
    }     
    
    $IDs = array_values(array_unique($IDs));                    
    echo '<pre>';                    
    print_r($sql_meta);
    print_r($IDs);                     
    //print_r($array);
    echo '</pre>';
    //$postID = array();
    //$lastposts = get_posts('numberposts=-1');
    //$i = 0;
    //foreach($lastposts as $post) :
    //  setup_postdata($post);
    //  $postID[$i] = the_ID();
    //  $i ++;
    //endforeach;
   
   
   
    $dir = dirname (__FILE__) . '/down/';
    $fp = fopen($dir.'export.csv', 'w');
    
    $content = '';
    for ($i = 0; $i < count($meta); $i ++){
      $content .= '"'.$meta[$i].'"';
      if ($i == count($meta)-1){
        $content .= "\r\n";
      } else {
        $content.= ",";
      }
    }
    
    
    for ($i = 0; $i < count($postID); $i ++){
      for ($k = 0; $k < count($meta); $k ++){
        $content .= '"'.get_post_meta($postID[$i], $meta[$k], true).'"';
        if ($k == count($meta)-1){
          $content .= "\r\n";
        } else {
          $content.= ",";
        }         
      } 
    }
    //echo '<pre>'.$content.'</pre>';

    fwrite($fp, utf8_decode($content));    
    fclose($fp);
    
    echo '<a href="'.get_option('siteurl').'/wp-content/themes/wp-contact-manager/down/export.csv" class="exportbutton">Datei herunterladen</a>';
  }
  
  function export_one($postID, $meta){
    $dir = dirname (__FILE__) . '/down/';
    $fp = fopen($dir.'export.csv', 'w');

    $content = '';
    for ($i = 0; $i < count($meta); $i ++){
      $content .= '"'.$meta[$i].'"';
      if ($i == count($meta)-1){
        $content .= "\r\n";
      } else {
        $content.= ",";
      }
    }
    
    for ($k = 0; $k < count($meta); $k ++){
      $content .= '"'.get_post_meta($postID, $meta[$k], true).'"';
      if ($k == count($meta)-1){
        $content .= "\r\n";
      } else {
        $content.= ",";
      }         
    }
    //echo '<pre>'.$content.'</pre>';

    fwrite($fp, utf8_decode($content));    
    fclose($fp);
    
    echo '<a href="'.get_option('siteurl').'/wp-content/themes/wp-contact-manager/down/export.csv" class="exportbutton">Datei herunterladen</a>';
  }
}
?>