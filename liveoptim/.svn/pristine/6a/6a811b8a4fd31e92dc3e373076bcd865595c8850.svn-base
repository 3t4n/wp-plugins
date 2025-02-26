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
	<div style='width: 100%; background-color: #787878; text-align: center; padding:5px 0 5px 0;'>
		<p style='color: #FFFFFF;'><?php echo $langue['COM_LIVEOPTIM_LICENCE_FREE']."<br />". $langue['COM_LIVEOPTIM_BOUTON_PRENIUM'];?></p>
	</div>
<br />



<h2>
	<?php echo $langue['listerMotCle_titre']; ?>
	
	<img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetreLiveoptimOuvrir();" onmouseout="fenetreLiveoptimFermer();" />
		
	
	<img class="picto_actif" src="../wp-content/plugins/liveoptim/img/actif.png" title="<?php echo $langue['accueil_copte_cbisoust_actif']; ?>" alt="<?php echo $langue['accueil_copte_cbisoust_actif']; ?>"/>			


	<div id="fenetreLiveoptim">
		<?php echo $langue['hintMotCle']; ?>
	</div>	

</h2>
	
<!-- Notification (compte expire, test, inactif)-->
<?php echo $langue['listerMotCle_text'];  ?>

<div style='  text-align: center; padding:0px 0 0px 0; '>
<img src="../wp-content/plugins/liveoptim/img/fleche_verte.png" style="margin-left: 72px;" />
<img style="margin-left: 72px;" src="../wp-content/plugins/liveoptim/img/fleche_verte.png" />
<img style="margin-left: 72px;" src="../wp-content/plugins/liveoptim/img/fleche_verte.png" />


	

</div>	

<div id="fenetreInfoPrenuim">
	<?php echo $langue['hintPrenium']; ?>
</div>

<table class="wp-list-table widefat fixed posts" cellspacing="0">
	<thead>
		<tr>
			<?php $nb=count($this->listeMotCle);?>
			
			<th class="requete"><?php echo $langue['listerMotCle_table_requete'];  ?><img style ='margin-left: 10px;' class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre1LiveoptimOuvrir();" onmouseout="fenetre1LiveoptimFermer();" />
				<div id="fenetre1Liveoptim">
					<?php echo $langue['hintRequete']; ?>
				</div>	
			</th>
			<th class="destination"><?php echo $langue['listerMotCle_table_destination']; ?><img style ='margin-left: 10px;' class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre2LiveoptimOuvrir();" onmouseout="fenetre2LiveoptimFermer();" />
				<div id="fenetre2Liveoptim">
					<?php echo $langue['hinturl']; ?>
				</div>	
			</th>
			<th class="position"><?php echo $langue['listerMotCle_table_position']; ?><img style ='margin-left: 10px;' class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre3LiveoptimOuvrir();" onmouseout="fenetre3LiveoptimFermer();" />
				<div id="fenetre3Liveoptim">
					<?php echo $langue['hintposition']; ?>
				</div>
			</th>
			<th class="action"><?php echo $langue['listerMotCle_table_action']; ?></th>
		</tr>
	</thead>
	

	<tbody>
		<tr>			
			
			<form action="<?php print admin_url('admin.php?page=liveoptim&#38;action=mot-cle-creer&#38;noheader=true') ?>" method="post" onSubmit="<?php if ( $nb<10 ) { ?>return verifRequetteMotCle('<?php echo $langue['listerMotCle_msg_alert']; ?>')<?php }else{ echo "return displayRestriction('".$langue['COM_LIVEOPTIM_MSG_MOT_CLE']."')"; } ?>">
			<?php wp_nonce_field( 'mot-cle-creer' );?>
				<td class="requete"><input name="requete" type="text" /></td>
				<td class="destination"><input name="destination" type="text" /></td>
				<td class="position"><input name="position" type="text" /></td>
			<?php if ( $nb<10 ) { ?>
				<td class="action"><input class="ajouter" value="<?php  echo $langue['listerMotCle_ajouter']; ?>" type="submit" /></td>
				<?php  } else { ?>
				
				<td ><a  style ="background-color: #B9B5B5;width: 120px;
height: 35px;" target="__blank" href="http://www.liveoptim.com/fr/contenu/plugin-wordpress-premium.html"  ><?php echo $langue['COM_LIVEOPTIM_BOUTON_PRENIUM_PLUS'] ?>  </a></td>
				<?php } ?>
			</form>
		</tr>
	

	
	
		<?php 
			$i=0;
			foreach ( $this->listeMotCle as $lMotCle ) { 
				if($i>10){ break;}?>
			
			<?php if ( !is_null( $this->idModifier ) && $this->idModifier == $lMotCle['id'] ) { ?>
			
				<form action="<?php print admin_url('admin.php?page=liveoptim&#38;action=mot-cle-modifier&#38;noheader=true') ?>" method="post">
				<?php wp_nonce_field( 'mot-cle-modifier'.$lMotCle['id'] );?>
					<input name="idModifier" value="<?php echo esc_attr($lMotCle['id']); ?>" type="hidden" />
			
					<tr>
						<td class="requete"><input name="requete" value="<?php echo esc_html($lMotCle['requete']); ?>" type="text" /></td>
						<td class="destination"><input name="destination" value="<?php echo esc_url($lMotCle['destination']); ?>" type="text" /></td>
						<td class="position"><input name="position" value="<?php echo esc_attr($lMotCle['position']); ?>" type="text" /></td>
						<td class="action">
							<input class="modifier" value="<?php echo $langue['listerMotCle_modifier']; ?>" type="submit" />
							<a href="<?php print esc_url(wp_nonce_url(admin_url('admin.php?page=liveoptim&action=mot-cle-enlever&id='.$lMotCle['id'].'&noheader=true'),'mot-cle-enlever'.$lMotCle['id']));?>" onclick="return confirm('<?php echo $langue['listerMotCle_confirmation_suppression']; ?>');"><img src="../wp-content/plugins/liveoptim/img/supprimer.gif" alt="<?php echo $langue['listerMotCle_supprimer']; ?>" /></a>
						</td>
					</tr>
				</form>
				
			<?php } else { ?>
				<tr>
					<td class="requete"><?php echo esc_html($lMotCle['requete']); ?></td>
					<td class="destination"><?php echo esc_url($lMotCle['destination']); ?></td>
					<td class="position">
					<a href= "<?php print esc_url(wp_nonce_url(admin_url('admin.php?page=liveoptim&action=mot-cle-deplacer&id='.$lMotCle['id'].'&position='.($lMotCle['position'] - 1 ).'&noheader=true'),'mot-cle-deplacer'.$lMotCle['id']));?>" ><img src="../wp-content/plugins/liveoptim/img/fleche-haut.gif" alt="<?php echo $langue['listerMotCle_monter']; ?>" /></a>
						<span><?php echo absint($lMotCle['position']); ?></span>
						<a href= "<?php print esc_url(wp_nonce_url(admin_url('admin.php?page=liveoptim&action=mot-cle-deplacer&id='.$lMotCle['id'].'&position='.($lMotCle['position'] + 1 ).'&noheader=true'),'mot-cle-deplacer'.$lMotCle['id']));?>" ><img src="../wp-content/plugins/liveoptim/img/fleche-bas.gif" alt="<?php echo $langue['listerMotCle_descendre']; ?>" /></a>
					</td>
					<td class="action">
						<a href="<?php print esc_url(wp_nonce_url(admin_url('admin.php?page=liveoptim&action=mot-cle-lister&idModifier='.$lMotCle['id']),'mot-cle-lister'.$lMotCle['id']));?>" >
						<img src="../wp-content/plugins/liveoptim/img/modifier.gif" alt="<?php echo $langue['listerMotCle_modifier']; ?>" /></a>
						<a href="<?php print esc_url(wp_nonce_url(admin_url('admin.php?page=liveoptim&action=mot-cle-enlever&id='.$lMotCle['id'].'&noheader=true'),'mot-cle-enlever'.$lMotCle['id']));?>"  onclick="return confirm('<?php echo $langue['listerMotCle_confirmation_suppression']; ?>');">
						<img src="../wp-content/plugins/liveoptim/img/supprimer.gif" alt="<?php echo $langue['listerMotCle_supprimer']; ?>" /></a>
					</td>
				</tr>
				
		<?php 
				}
				$i++;
			} 
		?>
			
		
	</tbody>
</table><br/><br/>
	<div id="conteneur-tl-free-seo">
		<?php if(WPLANG=='fr_FR'){ 
				$lgTL = 'FR';
				$slogan = "Service 100% GRATUIT - Conseils #SEO pour votre site web, posez votre question !";
				$widgetID = "436842462682681344";
			}elseif(WPLANG=='es_ES'){
				$lgTL = 'ES';
				$slogan = "Servicio 100% GRATUITO - Consejos #SEO para su sitio web, pregunta";
				$widgetID = "436843280542605313";
			}elseif(WPLANG=='pt_PT' || WPLANG=='br_BR' || WPLANG=='pt_BR' ){ 
				$lgTL = 'BR';
				$slogan = "SERVIÇO - GRATUITO 100% advice #SEO para o seu site, faça sua pergunta!";
				$widgetID = "436843847260176384";
				$lgLO='pt';
			}else{	
				$lgTL = 'US';
				$slogan = "100% FREE - SERVICE  #SEO advice for your website, ask your question!";
				$widgetID = "436844629216878592";
			}

			$lgLO = (!isset($lgLO))?$lgTL:$lgLO; 
		?>
					
		<div class="header2"><?php echo $slogan ?></div>
					
		<div id="tweets" class="tl-free-seo" style="float:left">
			<img src="../wp-content/plugins/liveoptim/img/logo-twitter.png" class='lo-logo-twitter'alt='logo twiter'/><br />
			<a class="twitter-timeline" width="268" height="417"  href="https://twitter.com/LiveOptim_<?php echo $lgTL ?>" data-widget-id="<?php echo $widgetID ?>">Tweets  @LiveOptim_<?php echo $lgTL ?></a>
			<script>
				!function(d,s,id)
				{var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}
				(document,"script","twitter-wjs");
				
				window.onload=function(){
					document.getElementById('twitter-widget-0').style.marginTop='-5';
				}
			</script>
		</div>
		<div class=" tl-free-seo" style="float:left;">	
						<img src="../wp-content/plugins/liveoptim/img/facebook-icon.png"  class="lo-icon-fb" alt='icon fb'/>
			<img class="lo-logo-fb" src="../wp-content/plugins/liveoptim/img/facebook.png" alt='logo fb'/>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo WPLANG ?>/all.js#xfbml=1&appId=440894052707426";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
			<div class="fb-comments"  data-href="http://www.liveoptim.com/<?php echo strtolower($lgLO) ?>/contenu/wp-comments.html" data-numposts="2" data-colorscheme="light" data-width="268"></div>
		</div>
		
		<div style="clear:both"></div>
	</div>
	Copyright 2012
</p>
<br />