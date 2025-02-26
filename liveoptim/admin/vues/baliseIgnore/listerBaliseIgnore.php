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
	<?php echo $langue['listerBaliseIgnore_titre']; ?>
	
	<img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetreLiveoptimOuvrir();" onmouseout="fenetreLiveoptimFermer();" />
		
	<img class="picto_actif" src="../wp-content/plugins/liveoptim/img/actif.png" title="<?php echo $langue['accueil_copte_cbisoust_actif']; ?>" alt="<?php echo $langue['accueil_copte_cbisoust_actif']; ?>"/>			
		
	
	<div id="fenetreLiveoptim">
		<?php echo $langue['hintlisterBaliseIgnore']; ?>
	</div>
</h2>
<!-- Notification (compte expire, test, inactif)-->
<?php echo $langue['listerBaliseIgnore_text']; ?>

<div id="fenetreInfoPrenuim">
	<?php echo $langue['hintPrenium']; ?>
</div>

<table class="wp-list-table widefat fixed posts" cellspacing="0" style="margin-bottom:45px">
	<thead>
		<tr>
			<th class="nom"><?php echo $langue['listerBaliseIgnore_nom']; ?></th>
			<th class="action"><?php echo $langue['listerBaliseIgnore_action']; ?></th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			
				<td class="nom"><input name="nom" type="text" /></td>
				<td class="action"><input class="ajouter" value="<?php echo $langue['listerBaliseIgnore_ajouter']; ?>" type="button" onClick="fenetreInfoPreniumOuvrir()"/></td>
			
		</tr>

		<?php foreach ( $this->listeBaliseIgnore as $lBaliseIgnore ) { ?>
			
			
			
				<tr>
					<td class="nom"><?php echo esc_html($lBaliseIgnore['nom']); ?></td>
					<td class="action">
						<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="../wp-content/plugins/liveoptim/img/modifier.gif" alt="<?php echo $langue['listerBaliseIgnore_modifier']; ?>" /></a>
						<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="../wp-content/plugins/liveoptim/img/supprimer.gif" alt="<?php echo $langue['listerBaliseIgnore_balises_supprimer']; ?>" /></a>
					</td>
				</tr>
				
			<?php } ?>
			
		
	</tbody>
</table>
<p>
	Copyright 2012
</p>
<br />