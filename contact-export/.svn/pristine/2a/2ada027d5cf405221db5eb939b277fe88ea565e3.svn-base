<?php

//print_r($_POST);
//print_r($_FILES);
if (isset($_POST['enter']) && $_FILES['userfile']['type'] == 'application/vnd.ms-excel'){
  require_once('class_import.php');
	$import = new class_import();
	$destination = dirname(__FILE__). '/import_data';
	
  $datei = $import->filetocsv($_FILES['userfile']['tmp_name']);
  
  
  ?>
  <b>Bitte ordnen Sie die die Informationen zu:</b><br />
  (Alle zuordnungen mit "--" werden ausser acht gelassen)
  <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=4'; ?>" method="post"> 
  <table>
  <?php
  $import->load_meta();
  for ($k = 0; $k < (count($datei,1)/count($datei,0))-1; $k ++){
  echo '<tr>';
    for ($j = 0; $j < 1; $j ++){
    echo '<td>'.$datei[$j][$k].'</td><td><input type="text" name="'.$k.'" /></td>';
    if ($k == 0){
      echo '<td rowspan="100" valign="top">'.$import->generate_Meta_Box().'</td>';
    }
    }
  echo '</tr>';
  }
  $_SESSION['mega-array'] = $datei;
  ?>
  <table>
  <input type="hidden" name="anzahl" value="<?php echo $k; ?>" />
  <input type="hidden" name="file" value="<?php echo $_FILES['userfile']['tmp_name']; ?>" />
	<input type="submit" class="button-primary" value="weiter" name="next" />
  </form>
  <br /><br /><br /><br /><br /><br />
  <pre>
  <?php
  print_r($datei);
  echo '</pre>';
} else if (isset($_POST['next'])){
  echo 'Bitte abwarten!';
  $filter = array();
  $filter = $_POST;
  unset($filter['anzahl']);
  unset($filter['file']);
  unset($filter['next']);

  //print_r($filter);
  require_once('class_import.php');
	$import = new class_import();  
  $import->insert_Data($_SESSION['mega-array'], $filter);
} else {
?>
Es sind nur .csv Dateien erlaubt.
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=4'; ?>" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
  <input name="userfile" class="button" type="file"><br />
  <input type="submit" class="button-primary" value="Import" name="enter">
</form>
<?php
}
?>