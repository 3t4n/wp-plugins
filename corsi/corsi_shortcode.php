<?php
  add_shortcode('corsi_ultimiinseriti', 'corsi_ultimiinseriti' );
  
  function corsi_ultimiinseriti(){
		$corsi_strReturn="<h2>Ultimi corsi inseriti</h2>";
		$corsi_args = array('posts_per_page' =>10,'post_type' => 'corsi');
		$corsi_ultimiprodottiinseriti = get_posts($corsi_args);
		foreach( $corsi_ultimiprodottiinseriti as $corso ){
			$corsi_strReturn.="<p>".get_the_date('j F Y',$corso["ID"])."</p>";
			$corsi_strReturn.="<a href=\"".get_permalink($corso["ID"])."\">".$corso["post_title"]."</a><hr>";
		}
	
		return $strReturn;
	}
