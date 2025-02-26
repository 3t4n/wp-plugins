<?php
require_once 'connect.php';
require_once 'apiEmail.php';

if(isset($_POST['user'])){
    userControll();
}

function userControll(){
    $table_prefix = TABLE_PREFIX;
    $db = new WPSH_Database();
    $conn = $db->connect();
    $prefixEmail = $table_prefix."users";
    $emailDB = mysqli_query($conn, "SELECT user_email FROM $prefixEmail");
    $arrayEmail = []; 

    while ($row = $emailDB->fetch_assoc()) {
        $to = $row["user_email"];
        array_push($arrayEmail, $to);
    }

    //indirizzo sito
    $prefixSiteURL = $table_prefix."options";
    $siteURL = mysqli_query($conn, "SELECT option_value FROM $prefixSiteURL WHERE option_id=1");
    $row = mysqli_fetch_array($siteURL);
    $target = $row['option_value'];

    foreach($arrayEmail as $email){
        // echo $email.'<br>';
        $message = "Ciao ti interessa ancora l'iscrizione al sito: $target <br>" . 
        "Si, mi interessa ancora         <br>" ."<br>". "    <a href='$target/unsubscribeprofile'>No, non mi interessa</a>";

        apiEmail($message, $email);
    }
    echo esc_html( __( 'Azione Eseguita', 'text_domain' ) );


}

?>