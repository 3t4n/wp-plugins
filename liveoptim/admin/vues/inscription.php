
  <script>
    function ma_fonction() {
      if (document.getElementById('mon_id').checked ) {
         document.getElementById('mail').style.display = "block";
      }
	  else {
	  document.getElementById('mail').style.display = "none";
	  document.getElementById('mail').value="";
	  }
    }
  </script>

<?php

/**
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
*/

?>

  

<br />
<h2>
	<?php echo $langue['inscription_titre']; ?>
	
		
	<img class="picto_actif" src="../wp-content/plugins/liveoptim/img/actif.png" title="<?php echo $langue['accueil_copte_cbisoust_actif']; ?>" alt="<?php echo $langue['accueil_copte_cbisoust_actif']; ?>"/>			
	
	<div id="fenetreLiveoptim">
		<?php echo $langue['hintMotCle']; ?>
	</div>

</h2>

<div style="margin-top:20px">


<br /><br />

	<form action="<?php echo admin_url('admin.php?page=liveoptim&action=inscription') ?>" method="post" style="margin-left:30px; width:460px">
		<?php wp_nonce_field( 'LOInscription' ); ?>
		<?php	if(isset($this->erreur)){ ?>
	<div style="color:red;margin:0 auto;font-weight: bold;text-align: center;"><?php echo $langue[$this->erreur] ?></div><br /><br />
<?php 	} ?>
		<label style="width: 200px; display: inline-block;" for="url"><?php echo $langue['inscription_url']?></label><input type="text" name="url" value="<?php echo $_SERVER['HTTP_HOST']?>" disabled /><input type="hidden" name="url" value="<?php echo $_SERVER['HTTP_HOST']?>"/><br /><br/>
		 <?php echo $langue['inscription_email_info'] ?><br/>
		<label style="width: 200px; display: inline-block;" for="mail"><?php echo $langue['inscription_email']?></label>
         <input id="mail" style ='display: inline-block;' type="email" name="mail" /><br />
		<label style="width: 200px; display: inline-block;" for="pass"><?php echo $langue['inscription_pass']?></label><input type="password" name="pass" /><br />
		<label style="width: 197px; display: inline-block;" for="lang"></label>
		<select name="lang" >
		  <option <?php echo (WPLANG=="en_US" || WPLANG=="en_GB")?'selected="selected"':'' ?>value="us">English</option>
		  <option <?php echo (WPLANG=="fr_FR")?'selected="selected"':'' ?> value="fr">French</option>
		  <option <?php echo (WPLANG=="pt_BR")?'selected="selected"':'' ?>value="pt">Brazilian Portuguese</option>
		  <option <?php echo (WPLANG=="es_ES")?'selected="selected"':'' ?>value="es">Spanish</option>
		</select>
		<br/><br/>
		
		 
		<input type="submit" name="btnInscription" value="<?php echo $langue['inscription_btnInscrip'] ?>" />
		  <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=liveoptim&action=inscriptionurl'),'LOInscriptionSimple')?>"><span style="margin-left: 20px;"><?php echo "  ".$langue['inscription_btnPasse'] ?></span></a><br/>
		<span style="float: right;margin-top:-5px" ><?php echo $langue['inscription_msgPasse'] ?></span><br />
	</form>
</div>
