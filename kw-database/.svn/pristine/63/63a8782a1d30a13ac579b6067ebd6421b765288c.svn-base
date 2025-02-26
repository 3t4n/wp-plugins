

<?php 

require_once(dirname(__FILE__).'/admin.php');

function mysql_structure() {
	
require_once(dirname(__FILE__).'/config.php');
  
  mysql_connect($host, $user, $pass);
  mysql_select_db($base);
  $tables = mysql_query("SHOW TABLES FROM $base");
  
  while ($donnees = mysql_fetch_array($tables))
    {
    $table = $donnees[0];
    $res = mysql_query("SHOW CREATE TABLE $table");
    if ($res)
      {
      $insertions = "";
      $tableau = mysql_fetch_array($res);
      $tableau[1] .= ";";
      $dumpsql[] = str_replace("\n", "", $tableau[1]);
      $req_table = mysql_query("SELECT * FROM $table");
      $nbr_champs = mysql_num_fields($req_table);
      while ($ligne = mysql_fetch_array($req_table))
        {
        $insertions .= "INSERT INTO $table VALUES(";
        for ($i=0; $i<=$nbr_champs-1; $i++)
          {
          $insertions .= "'" . mysql_real_escape_string($ligne[$i]) . "', ";
          }
        $insertions = substr($insertions, 0, -2);
        $insertions .= ");\n";
        }
      if ($insertions != "")
        {
        $dumpsql[] = $insertions;
        }
      }
    }
  return implode("\r", $dumpsql);
  }

echo "<ul class=\"alerte\"><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\">";
echo _e("Taille du fichier", "kw-data" );
echo " : " . file_put_contents("".dirname(__FILE__)."/compressed/sqldump-".date("d-m-Y-His").".sql.gz", mysql_structure());
echo "&nbsp;octets</li><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\">";
echo _e("Nom du fichier", "kw-data" );
echo " : sqldump-".date("d-m-Y-His").".sql.gz</li>";
echo "</li><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\">";
echo _e("Cr&eacute;&eacute; le", "kw-data" );
echo " : ".date("d-m-Y\ H:i:s")." (server time)</li>";
echo "</li><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\">";
echo _e("T&eacute;l&eacute;charger", "kw-data" );
echo " !</li><br />";
echo "<li><a class=\"button\" href=\"".WP_PLUGIN_URL."/kw-database/compressed/sqldump-".date("d-m-Y-His").".sql.gz\">sqldump-".date("d-m-Y-His").'.sql.gz</a></li></ul><br />';
echo '<div id="message" class="updated fade"><p><strong>';
echo _e("Succ&egrave;s de l'op&eacute;ration compresser et t&eacute;l&eacute;charger", "kw-data" );
echo '</strong></p></div>';

?>