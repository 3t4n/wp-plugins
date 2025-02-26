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
 * L'objet Conteuneur Pattern
 *
 * @author Erwan MILBEO
 */
class ConteneurConfig {
	
	private static $instance;

	
	/**
	 * Renvoi l'instance
	 */
	public static function getInstance () {
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
	
		return self::$instance;
	}
	
	/**
	 * Constructeur mais on s'en moque
	 */
	private function ConteneurPagesRestreintes() {
	}
	
	
	//fonction pour vérifier que tout fonctionne
	
	public function ecrire_ligne_csv($name,$texte,$a){
		$out=fopen("../LiveOptimTemp/".$name.".csv",$a);
		fputs($out, $texte."\n");
		fclose($out);
	}
	
	public function ecrire($name,$texte,$a){
		$out=fopen("../".$name,$a);
		fputs($out, $texte."\n");
		fclose($out);
	}
	
	public function open_csv($name){
		$out=fopen("../LiveOptimTemp/".$name.".csv",'w');
		fputs($out, '');
		fclose($out);
	}
	
	
	
	public function exporter($tab){
		global $wpdb;	
		try{
			if(!@is_dir('../LiveOptimTemp') && !@mkdir("../LiveOptimTemp")){
				throw new Exception('imposible de créer le dossier');
			}
			
			$tables=array();
			$tables[2]=$wpdb->prefix."liveoptim_mot_cle";
			$res="";
			
			$this->export_csv($tables[2]);
			$res=$tables[2];
				
			
		}catch(Exception $e){
			return $this->sql($tab);
		}
		
		
		return $res;
	}

	
	public function export_csv($table_name){
		global $wpdb;	
		$colonne=array();
		$nbcolonnes=0;
		

		$query = "SELECT COLUMN_NAME AS COL FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$table_name."' AND TABLE_SCHEMA='".DB_NAME."'";
		//echo $query;
		$sql = $wpdb->prepare($query, null);
		$rep = $wpdb->get_results($sql);
		
		foreach($rep as $ligneDB){
			$colonne[$nbcolonnes]=$ligneDB->COL;
			$nbcolonnes++;
		}
		
		$query = "SELECT * FROM ".$table_name."";
		$sql = $wpdb->prepare($query, null);
		$rep = $wpdb->get_results($sql);
		
	
		
		$this->open_csv($table_name);
		foreach($rep as $vals){
			$valeurs="";
			for($j=0;$j<$nbcolonnes;$j++){
				$valeurs.=$vals->$colonne[$j].";";
			//	echo $valeurs."<br />";
			}
			$this->ecrire_ligne_csv($table_name,$valeurs,'a+');
		}
		
	}

	public function sql(){
		$file="";
		
		$file.=$this->export_sql("{prefix}"."liveoptim_mot_cle");
			
		
		//$this->ecrire("export_sql.sql",$file,'w');
		$file = str_replace("_","///",$file);
		$file = str_replace(" ","^^e^^",$file);
		$options = array(
				'http'=>array(
					'method'=>"POST",
					'header'=>
						"Accept-language: fr\r\n"."Accept-language: en\r\n"."Accept-language: es\r\n"."Accept-language: pt\r\n".
						"Content-type: application/x-www-form-urlencoded\r\n",
					'content'=>http_build_query(array('content' => $file,'sql' => '1'))
			));
			
		$context = stream_context_create($options);
			
		
		$reponse = file_get_contents('http://www.liveoptim.com/export.php', false, $context );
		
		return $reponse;
	}

	
	public function export_sql($table_name){
		global $wpdb;
		$table_name2 = str_replace("{prefix}",$wpdb->prefix,$table_name);
		$connexion = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_NAME, $connexion);
		$query = "show create table ".$table_name2."";	
		$creations="";
		$insertions="";
		
		$listeCreationsTables = mysql_query($query, $connexion);
		while($creationTable = mysql_fetch_array($listeCreationsTables))
        {
           $creations .=  str_replace($wpdb->prefix,"{prefix}",$creationTable[1]).";";
		}
		$drop = "DROP TABLE ".$table_name.";\n";
		$query = "SELECT * FROM ".$table_name2."";
		/*$sql = $wpdb->prepare($query, null);
		$donnees = $wpdb->get_results($sql);*/
		
		$donnees = mysql_query($query, $connexion);
		while($nuplet = mysql_fetch_array($donnees)){
		
			$insertions .= "INSERT INTO ".$table_name." VALUES(";
			for($i=0; $i < mysql_num_fields($donnees); $i++)
			{
			  if($i != 0)
				 $insertions .=  ", ";
			  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
				 $insertions .=  "'";
			  $insertions .= addslashes($nuplet[$i]);
			  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
				$insertions .=  "'";
			}
			$insertions .=  ");\n";
		}
		$return =$drop."\n"."\n".$creations."\n"."\n".$insertions."\n"."\n";
		
		mysql_close($connexion);
		return $return;
		
			
	}
	
	
	/**
	 * set
	 * @param int $id
	 * @param String $page
	 * @return String null ou le message d'erreur
	 */
	public function TurnOnOff($OnOff) {
		global $wpdb;
		if ($OnOff==1){$action="TRUE";}else{$action="FALSE";}
		$query = '
				UPDATE
					'.$wpdb->prefix.'liveoptim_capping
				SET
					marche = '.mysql_real_escape_string(wp_filter_kses($action));
		$sql = $wpdb->prepare($query, null);
		$rep = $wpdb->get_results($sql);
		
		return null;
	}
	
		
	
	function unzip($file, $effacer_zip=false, $path="../LiveOptimTemp/"){
		/*Méthode qui permet de décompresser un fichier zip $file dans un répertoire de destination $path
		et qui retourne un tableau contenant la liste des fichiers extraits
		Si $effacer_zip est égal à true, on efface le fichier zip d'origine $file*/

		$tab_liste_fichiers = array(); //Initialisation

		$zip = zip_open($file);

		if ($zip) {
		
			while ($zip_entry = zip_read($zip)){ //Pour chaque fichier contenu dans le fichier zip
			
				
					$complete_path = $path.dirname(zip_entry_name($zip_entry));

					/*On supprime les éventuels caractères spéciaux et majuscules*/
					$nom_fichier = zip_entry_name($zip_entry);
					
					//$nom_fichier = strtr($nom_fichier,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
					//$nom_fichier = strtolower($nom_fichier);
					//$nom_fichier = ereg_replace('[^a-zA-Z0-9.]','-',$nom_fichier);

					/*On ajoute le nom du fichier dans le tableau*/
					array_push($tab_liste_fichiers,$nom_fichier);

					$complete_name = $path.$nom_fichier; //Nom et chemin de destination

					if(!file_exists($complete_path)){
						$tmp = '';
						foreach(explode('/',$complete_path) AS $k){
							$tmp .= $k.'/';

							if(!file_exists($tmp)){
								mkdir($tmp, 0755); 
							}
						}
					}

					/*On extrait le fichier*/
					if (zip_entry_open($zip, $zip_entry, "r")){
						$fd = @fopen($complete_name, 'w');

						@fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));

						@fclose($fd);
						zip_entry_close($zip_entry);
					}
			}

			zip_close($zip);

			/*On efface éventuellement le fichier zip d'origine*/
			if ($effacer_zip === true)
			unlink($file);
		}

		return $tab_liste_fichiers;
	}

	public function import($file, $table){
		global $wpdb;
		set_time_limit(0);
		if((int)$table<7){
					
			$erreurs="";
			
			if($table==6){
				$files=$this->unzip($file, true);
				
				$importation=$this->import_table($files[0],$wpdb->prefix."liveoptim_mot_cle");
				if($importation){
					$erreurs.="Le nombre de colonnes de la table ".$wpdb->prefix."liveoptim_mot_cle"." ne correspond pas-";
				}
				
			}
			else{
				$importation=$this->import_table($file,$wpdb->prefix."liveoptim_mot_cle");
				if($importation){
					$erreurs.="Le nombre de colonnes de la table ".$wpdb->prefix."liveoptim_mot_cle"." ne correspond pas-";
				}
			}
		}
		else{

			$contenu = fread(fopen($file, "r"), filesize($file));
			
			$requetes = explode(';', $contenu);
			
			
		/* 	$connexion = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			mysql_select_db(DB_NAME, $connexion); */
			$i=0;
			while($i<count($requetes)-1){
			//var_dump(strpos($requetes[$i],'liveoptim_mot_cle') === false);
			if (strpos($requetes[$i],'liveoptim_mot_cle') === false ){
			continue;}
			
			$query= str_replace("{prefix}",$wpdb->prefix,$requetes[$i]);
			//echo $query."</br>";
			$querys=wp_filter_kses($query);
			$querys= stripslashes($querys);
			$sql = $wpdb->prepare($querys, null);
		    $rep = $wpdb->get_results($sql);
			
				$i++;
			}
			//mysql_close($connexion);
			

		}
		/**/

		return "importation réussie";
	}
	
	public function import_table($file,$table){
		global $wpdb;
		$file="../LiveOptimTemp/".$file;

		//récupération des colonnes de la table

		$query = "SELECT COLUMN_NAME AS COL FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".mysql_real_escape_string(wp_filter_kses($table))."' AND TABLE_SCHEMA='".DB_NAME."'";
		$sql = $wpdb->prepare($query, null);
		$rep = $wpdb->get_results($sql);
		$nbcolonnes=0;
		foreach($rep as $ligneDB){
			$colonne[$nbcolonnes]=$ligneDB->COL;
			$nbcolonnes++;
		}
		
		
		//lecture du fichier à importer :
		if (($handle = fopen($file, "r")) !== FALSE) {
		

			$suite_requete=") VALUES ";
			
			while (($data = fgetcsv($handle,1000,";")) !== FALSE) {
						if (strpos($table,'liveoptim_mot_cle') === false ){
			continue;}
			
				$nbColCsv = count($data)-1;
				if($nbColCsv!=$nbcolonnes){
					return false;
				}
				$requete="INSERT INTO `".mysql_real_escape_string(wp_filter_kses($table))."` (";
				$donnees="(";
				for ($c=0; $c < $nbColCsv; $c++) {
					if($c==$nbColCsv-1){
						$a="";
					}
					else{$a=",";}
					$requete.="`".mysql_real_escape_string(sanitize_text_field($colonne[$c]))."`".$a;
					$donnees.="'".mysql_real_escape_string(sanitize_text_field($data[$c]))."'".$a;
				}
				$donnees.="),";
				$suite_requete.=$donnees;
			}
			
			//var_dump(strpos($table,'liveoptim_mot_cle') === false );
			if(isset($requete) && strpos($table,'liveoptim_mot_cle') == true  ){
			
				$suite_requete = substr($suite_requete,0,strlen($suite_requete)-1);
				$requete.=$suite_requete;
							
				fclose($handle);
			
				
				$query = "DELETE FROM `".mysql_real_escape_string(wp_filter_kses($table))."`";

				$sql = $wpdb->prepare($query, null);
				$rep = $wpdb->get_results($sql);			
				
				
				$sql = $wpdb->prepare($requete, null);
				$rep = $wpdb->get_results($sql);
			}
			
		}
		
		@unlink($file);
		return true;
	}
	

}
?>