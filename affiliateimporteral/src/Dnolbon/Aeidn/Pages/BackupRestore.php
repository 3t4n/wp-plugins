<?php
namespace Dnolbon\Aeidn\Pages;

use Dnolbon\Wordpress\WordpressDb;

class BackupRestore
{
  public function render()
  {
    $this->loadFile();

    $activePage = 'backup';

    include AEIDN_ROOT_PATH . '/layout/toolbar.php';

    include AEIDN_ROOT_PATH . '/layout/backup_restore.php';
  }

  /**
   * Restore settings or products, depending on the form submitted.
   */
  public function loadFile()
  {
    if (isset($_FILES['settings'])) {

		$upload_dir = wp_upload_dir();

		$upload_basedir = $upload_dir['basedir'];
		$upload_basedir = $upload_basedir . '/files';
		if (! is_dir($upload_basedir)) {
		   mkdir( $upload_basedir, 0700 );
		}

		$newfile = $upload_basedir.'/sttings.csv';
		if(copy($_FILES['settings']['tmp_name'], $newfile)){
		  $csv = file ($upload_dir['baseurl'].'/files/sttings.csv');

			$row = 1;
			$handle = fopen($newfile, "r");
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				update_option($data[0], $data[1]);
			}
			fclose($handle);
/*
		  while ($csv) {
			  print_R($csv);
			  echo '<br /><br />';
			//update_option($csv[0], $csv[1]);
			//$csv = str_getcsv($newfile);
			}
*/
		}
		echo 'Settings were updated successfully.';
		die();
    }
    if (isset($_FILES['products'])) {
      $db = WordpressDb::getInstance()->getDb();
      $file = fopen($_FILES['products']['tmp_name'], 'r');
      while (($line = fgets($file)) !== false) {
        $line = str_replace('\n', PHP_EOL, $line);
        $csv = str_getcsv($line);
        $dbtable = $csv[count($csv) - 1];
        if ($dbtable === 'archive') {
          $dbtable = 'aeidn_goods_archive';
          unset($csv[count($csv) - 1]);
        } elseif ($dbtable === 'active') {
          $dbtable = 'aeidn_goods';
          unset($csv[count($csv) - 1]);
        } else {
          $dbtable = 'aeidn_goods';
        }
        $args = '%s';
        for ($i = 1; $i < count($csv); $i++) {
          $args .= ', %s';
        }
        $query = 'INSERT IGNORE INTO '.$db->prefix.$dbtable.' VALUES ('.$args.')';
        $query = $db->prepare( $query, $csv );
		die('one ok');
      }
      fclose($file);
	  die('ok');
    }
  }
}
