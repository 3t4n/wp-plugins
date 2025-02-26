<?php
// cosa devo fare in questo file?
// 1- permettere di leggere le credenziali del db nel file wp_config, in modo
// da cambiare automaticaemnte le credenziali
// 2- trovare e cancellare i file superflui
// 3- inserire una variabile nel login per l'autenticazione e il brute force
if(isset($_POST['delate'])){
    $delateFile = new WPSH_ManagementFile();
    $delateFile->delateFile();
}

if(isset($_POST['wpConfig'])){
    $wpFile = new WPSH_ManagementFile();
    $wpFile->createFile();
}

class WPSH_ManagementFile{

    #leggiamo il file
    public function readFile($filename){
    
        $handler = fopen($filename, 'r');
        $content = file_get_contents($filename);

        if (false === $handler) {
            printf('Impossibile aprire il file %s', $filename);
            exit;
        }

        if (false === $content) {
            printf('Impossibile leggere il file %s', $filename);
            exit;
        }

        $size = 1024;
        #verificando ad ogni ciclo che non sia stata la raggiunta la fine del file tramite la funzione feof().
        while (!feof($handler)) {
            $content = fread($handler, $size);
        }
        print_r($filename);
        fclose($handler);
    }

    #scrivere i file 
    public function writeFile($filename){
        
        $searchfor = "define( 'TABLE_PREFIX',  $"."table_prefix);";
        // $text = "define( 'TABLE_PREFIX',  $"."table_prefix);";

        // the following line prevents the browser from parsing this as HTML.
        header('Content-Type: text/plain');

        $contents = file_get_contents($filename);

        $pattern = preg_quote($searchfor, '/');

        $pattern = "/^.*$pattern.*\$/m";
  
        if(preg_match_all($pattern, $contents, $matches)){
         
        }
        else{
            $content = file($filename);

            foreach($content as $lineNumber => &$lineContent) { 
                if($lineNumber == 67) { 
                    $lineContent = nl2br("define( 'TABLE_PREFIX',  $"."table_prefix);").PHP_EOL; 
                }
            }

            $allContent = implode("", $content); 
            file_put_contents($filename, $allContent);
        }

        
    }

    #eliminazione dei file superflui
    #gli passo il nome in un secondo momento, magari quando si attiva la funzione
    public function delateFile(){
        $pathArray = array(ABSPATH."license.txt", ABSPATH."readme.html", ABSPATH."wp-admin/install.php");
        // print $filename;

        foreach ($pathArray as $filename) {
            
            if(file_exists($filename)){
                unlink($filename);
                echo esc_html( __( 'Cancellazione avvenuta con successo', 'text_domain' ) );
            } else {
                echo esc_html( __( 'Azione Eseguita', 'text_domain' ) );
            }
        }

    }

    public function createFile(){
        $file = ABSPATH.'wp-config.php';
        $newFile = 'admin-config.php';
        $text = "<?php include(ABSPATH.'wp-admin/admin-config.php'); ?>";

        if (false === file_exists($newFile)) {
            if(false === copy($file, $newFile)){
                echo esc_html( __( 'Impossibile copiare il file', 'text_domain' ) );
            } 
            
        } else {
            printf('Questa funzione ha gia fatto il suo dovere');
        }

        $filename = ABSPATH.'wp-config.php';
        $handler = fopen($filename, 'w+');

        if (false === $handler) {
            printf('Impossibile aprire il file %s', $filename);
            exit;
        } else {
            fwrite($handler, $text);
        }

        fclose($handler);
    }


}




?>