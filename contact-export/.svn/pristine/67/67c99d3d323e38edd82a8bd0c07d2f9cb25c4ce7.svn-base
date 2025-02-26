<?php
//  Autor: Eberhard Heber
//  Beschreibung: Headerinformationen für den Download
//

  if (isset($_GET['type'])){
    if ($_GET['type'] == 0){
      header("Content-Type: application/comma-separated-values; charset=utf-8");
      header("Content-Disposition: attachment; filename=export.csv");
      Header("Content-Transfer-Encoding: 8bit");
      readfile("export.csv");
    }
  }
?>
