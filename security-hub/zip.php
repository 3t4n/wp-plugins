<?php
ob_start();
require_once 'apiEmail.php';

function zip_dir($source, $target) {
    $upload = wp_upload_dir();
    if(!is_writeable ($upload)){
        echo 'non si scrive';
    }

    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source, \FilesystemIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST);

    $zip = new \ZipArchive();
    if($zip->open($target, \ZipArchive::CREATE) !== true) {
        exit('cannot create zip');
    } 

    //Invioo email
    $table_prefix = TABLE_PREFIX;
    $db = new WPSH_Database();
    $conn = $db->connect();

    $prefixEmail = $table_prefix."users";
    $resultEmail = mysqli_query($conn, "SELECT user_email FROM $prefixEmail WHERE id=1");
    
    $str = "abcdefghijklmnopqrstuvwxyz0123456789";
    $frodo = substr( str_shuffle( $str ), 0, 8 );

    $messageBackup = "Ciao ecco la tua password per il backup: <br> ". $frodo;

    while ($row = mysqli_fetch_assoc($resultEmail)){
        apiEmail($messageBackup, $row['user_email']);
    }

    foreach($iterator as $file){
      if (!file_exists($file)) { die($file.' does not exist'); }
      if (!is_readable($file)) { die($file.' not readable'); }
      if (file_exists($file) && is_file($file)){
        $zip->addFile($file, $file);
        $zip->setEncryptionName($file, ZipArchive::EM_AES_256, $frodo);
      }
      
    }

    $closed = $zip->close();
    $file=$target;
    if (headers_sent()) {
        echo 'HTTP header already sent';
    } else {
        if (!is_file($file)) {
            header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
            echo 'File not found';
        } else if (!is_readable($file)) {
            header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
            echo 'File not readable';
        } else {
            header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Length: ".filesize($file));
            header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
            while(ob_get_level()){
                ob_end_clean();
            }
            readfile($file);
            exit;
        }
    }


    if($closed == TRUE) {
        return $target;

    } else {
        return false;
    }
}


?>