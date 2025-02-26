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
	<?php echo $langue['listerConfiguration_titre']; ?>
	
	<img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetreLiveoptimOuvrir();" onmouseout="fenetreLiveoptimFermer();" />
		
	<img class="picto_actif" src="../wp-content/plugins/liveoptim/img/actif.png" title="<?php echo $langue['accueil_copte_client_actif']; ?>" alt="<?php echo $langue['accueil_copte_client_actif']; ?>"/>			
	
		
	<div id="fenetreLiveoptim">
		<?php echo $langue['hintMotCle']; ?></div>

</h2>
	<!-- Notification (compte expire, test, inactif)-->
	
	<br /><br />
	
	<div style="width: 50%; float:left">
		<table class="wp-list-table widefat fixed posts" cellspacing="0"><tr>
		<td><strong>LiveOptim <img  style ='margin-left: 10px;' class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre1LiveoptimOuvrir();" onmouseout="fenetre1LiveoptimFermer();" /> :</strong> &nbsp;&nbsp;&nbsp;&nbsp;</td><td style="padding-left: 30px; vertical-align: center">
		<?php if ( $this->isON == false ) { ?>
			<a href="<?php print wp_nonce_url(admin_url('admin.php?page=liveoptim&action=modif-config&on=1&noheader=true'), 'LOOnOff');?>"><img src="../wp-content/plugins/liveoptim/img/off.png" style="width: 45px"></a></td></tr></table><br /><br /><br /><br /><br /><br />
		<?php } else { ?>
			<a href="<?php print wp_nonce_url(admin_url('admin.php?page=liveoptim&action=modif-config&on=2&noheader=true'), 'LOOnOff');?>"><img src="../wp-content/plugins/liveoptim/img/on.png" style="width: 45px"></a></td></tr>
		</table>
		<br/>	

		<div id="fenetreInfoPrenuim">
			<?php echo $langue['hintPrenium']; ?>
		</div>

		
		<table class="wp-list-table widefat fixed posts" cellspacing="0">
			<thead>
				<tr>
					<th class="structure nowrap center"><?php echo $langue['COM_LIVEOPTIM_LIMITE_CAPPING']; ?><img style ='margin-left: 10px;' class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre4LiveoptimOuvrir();" onmouseout="fenetre4LiveoptimFermer();" /></th>
					<th width="100px" class="action nowrap center"><?php echo $langue['listerPatternCible_table_action']; ?></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td class="page"><input name="valcap" type="text" value="<?php echo absint($this->capping) ?>" disabled /></td>
					<td class="action"><input class="ajouter" value="<?php echo $langue['listerPatternCible_modifier']; ?>" type="button"onClick="fenetreInfoPreniumOuvrir()"/></td>
					
				</tr>
			</tbody> 
		</table>
		<br />
		<?php } ?>
		
		<table class="wp-list-table widefat fixed posts" cellspacing="0"><tr><td>
			<form action="admin.php?page=liveoptim&noheader=true&action=modif-config&exp=1" method="post">
				<?php wp_nonce_field( 'LOExportParam'); ?>
				<?php echo $langue['COM_LIVEOPTIM_EXPORT_CSV']; ?><img style ='margin-left: 10px;'  class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre5LiveoptimOuvrir();" onmouseout="fenetre5LiveoptimFermer();" /><br />
				<br />
				<div  id="div_chck">
					<span for="checkbox1"><?php echo $langue['listerBaliseIgnore_balises_ignores']; ?></span><br />
					<span for="checkbox2"><?php echo $langue['COM_LIVEOPTIM_MENU_CONFIGURATION']; ?></span><br />
					<input type="checkbox" name="2" id="checkbox3" checked><label for="checkbox3"><?php echo $langue['listerMotCle_mots_cles']; ?></label><br />
					<span for="checkbox4"><?php echo $langue['COM_LIVEOPTIM_MENU_PAGE_RESTREINTE']; ?></span><br />
					<span for="checkbox5"><?php echo $langue['listerPattern_pattern']; ?></span><br />
					<span for="checkbox5"><?php echo  $langue['listerPatternCible_pattern']; ?></span>
				</div>
				<br />
				<input type="submit" value="<?php echo $langue['COM_LIVEOPTIM_BOUTON_EXPORT']; ?>" name="Export-CSV">
				<?php if(isset($_GET['zip'])){
				
				?>
					<a target="_blank" href="<?php echo esc_url($_GET['zip']) ; ?>"><img src="../wp-content/plugins/liveoptim/img/DL.png" alt="download" style="width: 45px"></a>
				<?php } else if(is_dir("../LiveOptimTemp")){ 					
					$handle=opendir("../LiveOptimTemp");
					while (false !== ($fichier = readdir($handle))) {
						if (($fichier != ".") && ($fichier != "..")) {
						@unlink("../LiveOptimTemp/".$fichier);
						}
					}
					@unlink("../BackupBDD.zip");
				} ?>
				
			</form></td></tr>
		</table>
	</div>
		<div id="fenetre1Liveoptim">
		<?php echo $langue['hintLO']; ?></div>		
		<div id="fenetre4Liveoptim">
		<?php echo $langue['hintLimite']; ?></div>
		<div id="fenetre5Liveoptim">
		<?php echo $langue['hintconfigue']; ?></div>
		
	<div style="float: left; width: 40%;">
	<center>
	<table cellspacing="0" style="margin-left: 40px;margin-bottom: 20px" class="wp-list-table widefat fixed posts">
			
		<tbody>
			<tr>
				<td>
					<?php echo $langue['COM_LIVEOPTIM_CONFIG_EXPORT']; ?>
				</td>
				<td>
					<form method="post" action="admin.php?page=liveoptim&amp;noheader=true&amp;action=modif-config&amp;sql=1">
						<?php wp_nonce_field( 'LOExportParamSQL'); ?>
						<input type="submit" name="Export-SQL" value="SQL">
					</form>
				</td>
				<td>
					<?php
					if(isset($_GET['res'])){
					
					?>
					<a target="_blank" href="<?php echo esc_url($_GET['res']) ?>"><img src="../wp-content/plugins/liveoptim/img/DL.png" alt="download" style="width: 45px"></a>
					<?php
					}
					?>
				</td>
			</tr>
		</tbody>
	</table>
	</center>
	
	<form name="import_import" action="admin.php?page=liveoptim&noheader=true&action=modif-config&imp=1" method="POST" enctype="multipart/form-data" onSubmit="return verifFile('<?php echo $langue['COM_LIVEOPTIM_FICHIER_VIDE']; ?>',' <?php echo $langue['COM_LIVEOPTIM_FICHIER_NCSV']; ?>','<?php echo $langue['COM_LIVEOPTIM_FICHIER_NZIP'];?>',document.getElementsByName('fichier_up')[0].value,document.getElementsByName('quoi')[0].value);">
		<?php wp_nonce_field( 'LOImportParam'); ?>
	<table class="wp-list-table widefat fixed posts" cellspacing="0" style="clear: none; table-layout: auto; margin-left: 40px">
	
	
			<tr><td><?php echo $langue['COM_LIVEOPTIM_IMPORTATION']; ?><img style ='margin-left: 10px;' class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" onmouseover="fenetre6LiveoptimOuvrir();" onmouseout="fenetre6LiveoptimFermer();" /></td><td>
				<SELECT name="quoi">
					
					<OPTION VALUE="2"><?php echo $langue['listerMotCle_mots_cles']; ?>
					<OPTION VALUE="6"><?php echo $langue['COM_LIVEOPTIM_TABLES_ALL']; ?></option>
					<option value="7">SQL</option>
				</SELECT>
			</td></tr>
			<tr><td nowrap><?php echo $langue['COM_LIVEOPTIM_TABLES_FILE']; ?></td>
			<td>
				<input type="file" name="fichier_up" onchange="" />
				<input type="hidden" name="MAX_FILE_SIZE" value="9999999999">
			</td></tr>
			<tr><td></td><td>
			
			<input type="submit" value='<?php echo $langue['COM_LIVEOPTIM_IMPORT_VALIDATION']; ?>'></td></tr>
	</table>
	</form>
	<br />
	
	<table class="wp-list-table widefat fixed posts" cellspacing="0" style="clear: none; table-layout: auto; margin-left: 40px">
		<tr>
			<td colspan="2"><b><?php echo $langue['COM_LIVEOPTIM_CACHE-TITRE']; ?><b></td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $langue['COM_LIVEOPTIM_CACHE-TEXT']; ?><br />
				<input type="button" style="display:block;margin:10px auto" value="<?php echo $langue['COM_LIVEOPTIM_BTN-VIDE-CACHE']; ?>" onClick="fenetreInfoPreniumOuvrir()"/>
			</td>
		</tr>
		
	</table>
	</div>

		<div id="fenetre6Liveoptim">
			<?php echo $langue['hintimport']; ?>
		</div>
<br /><br />

<div style="margin-top:350px">Copyright 2012</div>
