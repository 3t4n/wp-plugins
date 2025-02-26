<?php 

require_once(dirname(__FILE__).'/admin.php'); 
	
$dir_nom = ''.dirname(__FILE__).'/compressed'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die(_e('Erreur de listage : le r&eacute;pertoire n\'existe pas')); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

//On récupère la bonne adresse du répertoire
$security1 = ''.dirname(__FILE__).'/compressed/index.html';
$security2 = ''.dirname(__FILE__).'/compressed/index.php';
$secure1 = 'index.html';
$secure2 = 'index.php';

while($element = readdir($dir)) {
	if($element != '.' && $element != '..' && $element != 'index.html' && $element != 'index.php') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

	echo "<h4>";
	echo _e("Analyse de s&eacute;curit&eacute; des fichiers index disponibles dans", "kw-data" );
	echo " &laquo; compressed &raquo; </h4> \n\n";
	echo "\t\t<ul class=\"alerte\">\n";
	
if (is_writable($security1)) {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure1 \">$secure1</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier dans le répertoire", "kw-data" );
				echo " &laquo; $dir_nom &raquo;&nbsp;";
				echo _e("est accessible en &eacute;criture<br /><b>vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo " &laquo; compressed &raquo;&nbsp;";
				echo _e("courent un risque", "kw-data" );
				echo "</b></li>\n";} 
else {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure1 \">$secure1</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier n'est pas accessible en &eacute;criture, les sauvegardes du dossier", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;&nbsp;";
				echo _e("sont prot&eacute;g&eacute;es", "kw-data" );
				echo "</li>\n";}
				
if (is_writable($security2)) {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure2 \">$secure2</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier dans le répertoire", "kw-data" );
				echo "&nbsp;&laquo; $dir_nom &raquo;&nbsp;";
				echo _e("est accessible en &eacute;criture<br /><b>vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;&nbsp;";
				echo _e("courent un risque", "kw-data" );
				echo "</b></li>\n";} 
else {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure2 \">$secure2</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier n'est pas accessible en &eacute;criture, les sauvegardes du dossier", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;&nbsp;";
				echo _e("sont prot&eacute;g&eacute;es", "kw-data" );
				echo "</li>\n";} ?>
            <br />
            <?php
if (file_exists($security1)){
				echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png)\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure1 \">$secure1</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier index existe pour prot&eacute;ger vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;</li>\n";}
else {
				echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png)\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure1 \">$secure1</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier d'index n'existe pas dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; $dir_nom &raquo;<br/><b>";
				echo _e("vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;&nbsp;";
				echo _e("courent un risque", "kw-data" );
				echo "</b></li>\n";}
				
if (file_exists($security2)){
				echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png)\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure2 \">$secure2</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier index existe pour prot&eacute;ger vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;</li>\n";}
else {
				echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png)\"><a href=\"".WP_PLUGIN_URL."/kw-database/compressed/$secure2 \">$secure2</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier d'index n'existe pas dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; $dir_nom &raquo;<br /><b>";
				echo _e("vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; compressed &raquo;&nbsp;";
				echo _e("courent un risque", "kw-data" );
				echo "</b></li>\n";}			

 	echo "\t\t</ul>\n";

if(!empty($fichier)){
	rsort($fichier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "<h4>";
	echo _e("Liste des sauvegardes disponibles dans", "kw-data" );
	echo "&nbsp;&laquo; compressed &raquo;&nbsp;(";
	echo _e("du plus r&eacute;cent au plus ancien", "kw-data" );
	echo ")</h4> \n\n";
	echo "\t\t<ol>\n";
	//echo '<form method="post" name="clearDir2" target="_self">';
	//echo '<input name="submited" type="hidden" value="yes" /><input type="submit" name="Submit" value="Delete the older file &raquo;" /></p>';
	//echo "</form>";
	foreach($fichier as $lien) {
echo "\t\t\t<li><img src=\"".WP_PLUGIN_URL."/kw-database/img/file.gif\" />&nbsp;&nbsp;$lien&nbsp;&nbsp;<input type=\"button\" value=\"";
echo _e("T&eacute;l&eacute;charger", "kw-data" );
echo "&nbsp;!\" onclick=\"window.location.href='".WP_PLUGIN_URL."/kw-database/compressed/$lien'\" /></li>";
		}

	echo "\t\t</ol>";
	echo '<div id="message" class="updated fade"><p><strong>';
	echo _e("Succ&egrave;s du listing du dossier", "kw-data" );
	echo '</strong></p></div>';
 }
 else {
	 echo "<h4>";
	 echo _e("Aucune sauvegardes disponibles dans", "kw-data" );
	 echo "&nbsp;&laquo; compressed &raquo;</h4> \n\n";
	 echo '<div id="message" class="updated fade"><p><strong>';
	 echo _e("Aucune sauvegardes disponibles dans", "kw-data" );
	 echo '&nbsp;&laquo; compressed &raquo;</strong></p></div>';
	 }
?>