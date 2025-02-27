<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Yeeaddons_EL_Dropbox_API {
    public static function uppload_files($fileTmpPath,$fileName,$accessToken) {
        $fileTmpPath =$fileTmpPath."/".$fileName;
        $accessToken = substr($accessToken, 3, -3);
        $dropboxPath = '/' . $fileName;
        $file = fopen($fileTmpPath, 'rb');
        $fileSize = filesize($fileTmpPath);
        $ch = curl_init('https://content.dropboxapi.com/2/files/upload');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: ' . json_encode([
                "path" => $dropboxPath,
                "mode" => "add",
                "autorename" => true,
                "mute" => false
            ])
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, fread($file, $fileSize));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        fclose($file);
    }
}