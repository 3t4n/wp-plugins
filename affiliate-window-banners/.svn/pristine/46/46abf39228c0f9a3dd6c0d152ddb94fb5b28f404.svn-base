<?

class cache
{
    var $cache_dir = './tmp/cache/';//This is the directory where the cache files will be stored;
    var $cache_time = 604800;//How much time will keep the cache files in seconds.
    
    var $caching = false;
    var $file = '';

    function cache()
    {
        //Constructor of the class
        $this->file = $this->cache_dir . urlencode( $_SERVER['REQUEST_URI'] );
        if ( file_exists ( $this->file ) && ( fileatime ( $this->file ) + $this->cache_time ) > time() )
        {
            //Grab the cache:
            $handle = fopen( $this->file , "r");
            do {
                $data = fread($handle, 1024);
                if (strlen($data) == 0) {
                    break;
                }
                echo $data;
            } while (true);
            fclose($handle);
            exit();
        }
        else
        {
            //create cache :
            $this->caching = true;
            ob_start();
        }
    }
    
    function close()
    {
        //You should have this at the end of each page
        if ( $this->caching )
        {
            //You were caching the contents so display them, and write the cache file
            $data = ob_get_clean();
            echo $data;
            $fp = fopen( $this->file , 'w' );
            fwrite ( $fp , $data );
            fclose ( $fp );
        }
    }
}
?>