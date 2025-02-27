<?php
class revi_connection
{
    public $reviGeneralModel;
    public $REVI_API_URL;
    public function __construct()
    {
        $this->reviGeneralModel = new reviGeneralModel();
        $this->REVI_API_URL = $this->reviGeneralModel->REVI_API_URL;

        if (isset($_REQUEST['checkModuleActive'])) {
            $result = $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'checkModuleConnection', 'GET');
            echo esc_html($result->message);
            exit;
        }

        $to = "google";
        if (isset($_REQUEST['to'])) {
            $to = esc_attr($_REQUEST['to']);
        }

        $connection_result = $this->getConnection($to);

        echo esc_html($connection_result); // Escapar salida
    }

    private function getConnection($to)
    {
        $url = '';
        switch ($to) {
            case 'google':
                $url = 'https://google.es';
                break;
            case 'dinahosting':
                $url = 'https://dinahosting.com';
                break;
            case 'revi':
                $url = 'https://revi.io';
                break;
            case 'whatsmyip':
                $url = 'https://www.whatsmyip.org/';
                break;
            default:
                die(esc_html__('Tipo no válido', 'revi-io-customer-and-product-reviews'));
        }

        $ip_address = esc_html($_SERVER['REMOTE_ADDR']); // Escapar salida
        $ip_server = esc_html(getHostByName(getHostName())); // Escapar salida

        echo esc_html__("RESULTADO CONEXIÓN:", 'revi-io-customer-and-product-reviews') . "<br>";
        echo 'IP PÚBLICA: ' . esc_html($ip_address) . "<br>"; // Escapar salida
        echo 'IP PRIVADA: ' . esc_html($ip_server) . "<br>"; // Escapar salida

        $this->ping($url);
        $this->get_web_page($url);

        $response = file_get_contents($url);

        return esc_html($response); // Escapar salida
    }

    private function ping($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        // Descomenta la siguiente línea si necesitas evitar la verificación de SSL
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if ($response === false) {
            // Imprime el error si la solicitud cURL falla
            echo 'cURL Error: ' . esc_html(curl_error($ch)) . "<br>";
            echo 'Error Number: ' . esc_html(curl_errno($ch)) . "<br>";
        } else {
            // Verifica el código de estado HTTP
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpcode >= 200 && $httpcode < 300) {
                echo "</br>" . "La página responde correctamente." . "</br>";
            } else {
                echo 'La página no está accesible. Código de estado: ' . esc_html($httpcode) . "<br>";
            }
        }

        curl_close($ch);
    }

    function get_web_page($url)
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "spider", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 30,      // timeout on connect
            CURLOPT_TIMEOUT        => 30,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
        );

        $ch      = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err     = curl_errno($ch);
        $errmsg  = curl_error($ch);
        $header  = curl_getinfo($ch);
        curl_close($ch);

        $header['errno']   = esc_html($err); // Escapar salida
        $header['errmsg']  = esc_html($errmsg); // Escapar salida
        $header['content'] = esc_html($content); // Escapar salida

        echo '<pre>';
        print_r($header);
        echo '</pre>';
    }
}
