<?php

/**
 * Class Alojapro_Shortcode
 *
 * Shortcode Alojapro Widget block
 */
class Alojapro_Shortcode
{
    private static $instance;

    /**
     * Main Instance
     *
     * @staticvar   array   $instance
     * @return Alojapro_Shortcode one true instance
     */
    public static function instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Start up
     */
    public function __construct()
    {
        add_shortcode('alojapro-widget-block', array($this, 'generateWidgetBlock'));
    }

    function generateWidgetBlock($params) {
        
        $destinations = $this->getDestinations();


        $alojaproWidget = get_option('alojapro_settings');
        $alojaproConfig = get_option('alojapro_config');

        $maxAdultOptions = $alojaproWidget['maxAdult'];
        $maxChildOptions = $alojaproWidget['maxChild'];
        $maxChildAge = $alojaproWidget['maxChildAge'];

        if (!is_numeric($maxAdultOptions) || $maxAdultOptions == 0) {
            $maxAdultOptions = 6;
        }
        
        if (!is_numeric($maxChildOptions) || $maxChildOptions == 0) {
            $maxChildOptions = 4;
        }
        
        if (!is_numeric($maxChildAge) || $maxChildAge == 0) {
            $maxChildAge = 12;
        }
        

        $adlutDropDown = "";
        for ($i = 1; $i <= $maxAdultOptions; $i++) {
            if ($i == 2) {
                $adlutDropDown .= "<option value='$i' selected>$i</option>";
            } else {
                $adlutDropDown .= "<option value='$i'>$i</option>";
            }
        }

        $childDropDown = "";
        $childDropDown .= "<option value='0' selected>0</option>";
        for ($i = 1; $i <= $maxChildOptions; $i++) {
            $childDropDown .= "<option value='$i'>$i</option>";
        }

        $childAgeInputs = "";
        for ($i = 1; $i <= $maxChildOptions; $i++) {
            //$childAgeInputs .= "<div class='col-md-2 col-sm-12'><input type='number' name='child-$i' value='0' min='0' max='$maxChildAge' step='1' class='form-input custom-input childsScript mb-1'></div>";
            $childAgeInputs .="<div class='col-md-2 col-sm-12'>";
            $childAgeInputs .="<select name='age-child-$i' class='form-select form-control childsScript mb-1 '>";
            for ($j = 1; $j <= $maxChildAge; $j++) {
                $childAgeInputs .="<option value='$j'>$j</option>";
                
            }
            $childAgeInputs .="</select></div>";
        }

        if(!$alojaproWidget) return;
        if ($alojaproWidget['widgetType'] == 0 && $alojaproWidget['customLayout'] == 'classic') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form.tpl");
        }else if ($alojaproWidget['widgetType'] == 1 && $alojaproWidget['customLayout'] == 'classic') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-no-discount.tpl");
        }else if ($alojaproWidget['widgetType'] == 2 && $alojaproWidget['customLayout'] == 'classic') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-advanced-filters.tpl");
        }else if ($alojaproWidget['widgetType'] == 3 && $alojaproWidget['customLayout'] == 'classic') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-advanced-filters-no-discount.tpl");
        }else if ($alojaproWidget['widgetType'] == 2 && $alojaproWidget['customLayout'] == 'modern') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-modern.tpl");
        }else if ($alojaproWidget['widgetType'] == 3 && $alojaproWidget['customLayout'] == 'modern') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-modern-no-discount.tpl");
        }else if ($alojaproWidget['widgetType'] == 4 && $alojaproWidget['customLayout'] == 'modern') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-modern-destinations.tpl");
        }else if ($alojaproWidget['widgetType'] == 5 && $alojaproWidget['customLayout'] == 'modern') {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form-modern-destinations-no-discount.tpl");
        }else {
            $template = new Alojapro_TemplateManager(ALOJAPRO_PLUGIN_BASE_PATH . "templates/search-form.tpl");
        }
        if ($alojaproWidget['widgetPropertyType'] == 1) {
            $template->set('rooms_label', __('Apartamentos', 'alojapro-widget'));
            $template->set('room_label', __('Apartamento', 'alojapro-widget'));
        }else{
            $template->set('rooms_label', __('Habitaciones', 'alojapro-widget'));
            $template->set('room_label', __('Habitación', 'alojapro-widget'));
        }
        $template->set('action', $alojaproConfig['action']);
        $template->set('login', $alojaproConfig['login']);
        $template->set('password', $alojaproConfig['password']);
        $template->set('platformId', $alojaproConfig['platformId']);
        if (get_locale() != 'ca_ES' && get_locale() != 'ca' && get_locale() != 'es_ES' && $alojaproConfig['widgetInternationalId'] != 0){
            $template->set('widgetId', $alojaproConfig['widgetInternationalId']);
        }else{
            $template->set('widgetId', $alojaproConfig['widgetId']);
        }
        $template->set('widgetMobileId', $alojaproConfig['widgetMobileId']);
        $template->set('language', $this->getLanguage());
        $template->set('ALOJAPRO_PLUGIN_BASE_URL', ALOJAPRO_PLUGIN_BASE_URL);
        $template->set('info_label', __('Verificar Disponibilidad', 'alojapro-widget'));
        $template->set('button_search_label', __('Buscar', 'alojapro-widget'));
        $template->set('button_destinations_label', __('Destinos', 'alojapro-widget'));
        $template->set('button_discounts_label', __('Descuentos', 'alojapro-widget'));
        $template->set('button_advanced_filter_label', __('Filtros Avanzados', 'alojapro-widget'));
        $template->set('checkin_label', __('Llegada', 'alojapro-widget'));
        $template->set('checkout_label', __('Salida', 'alojapro-widget'));
        $template->set('modal_email', __('¿Tienes tu email registrado?', 'alojapro-widget'));
        $template->set('modal_coupon', __('¿Tienes código de descuento?', 'alojapro-widget'));
        $template->set('info_mail_discount', __('Escribe tu correo electrónico y se activarán los descuentos que tienes asociados', 'alojapro-widget'));
        $template->set('info_code_discount', __('Introduce tu código promocional', 'alojapro-widget'));
        $template->set('modal_accept', __('Aceptar', 'alojapro-widget'));
        $template->set('custom_css', $alojaproWidget['customCss']);
        
        $template->set('adults_label', __('Adultos', 'alojapro-widget'));
        $template->set('children_label', __('Niños', 'alojapro-widget'));
        $template->set('children_ages_label', __('Edades Niños', 'alojapro-widget'));
        $template->set('occupations', __('Ocupación', 'alojapro-widget'));
        $template->set('people_label', __('Personas', 'alojapro-widget'));

        $template->set('adultDropDown', $adlutDropDown);
        $template->set('childDropDown', $childDropDown);
        $template->set('childAgeInputs', $childAgeInputs);
        $template->set('maxAge', $maxChildAge);
        $template->set('destinations', $destinations);
        
        return $template->output();
    }



    function getDestinations() {
        // URL del servicio web
        $url = 'https://admin.alojapro.com/api/ws/getDestinationsWithProperties';

        // Obteniendo los parametros
        $alojaproConfig = get_option('alojapro_config');
    
        // Parámetros requeridos para la llamada al servicio
        $params = array(
            'login' => $alojaproConfig['login'],
            'password' => $alojaproConfig['password'],
            'platformId' => $alojaproConfig['platformId'],
            'widgetId' => $alojaproConfig['widgetId'],
            'language' => $this->getLanguage()
        );
    
        // Inicializar cURL
        $ch = curl_init();
    
        // Configurar las opciones de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    
        // Ejecutar la llamada
        $response = curl_exec($ch);
    
        // Verificar si hubo algún error
        if($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return "Error en la llamada al servicio: $error";
        }
    
        // Cerrar la conexión cURL
        curl_close($ch);
    
        $responseSelect = '';

        // Decodificar el JSON
        $data = json_decode($response, true);

        // Obtener las ciudades
        $cities = $data['response'][$params['language']]['cities'];        

        // Montar la respuesta
        foreach ($cities as $city) {
            $responseSelect .= '<p data-destinationid="'. $city['id'] .'" class="destination select-destination" data-name="'. $city['city'] .'">' . $city['city'] . 
            '<span class="arrow-span position-absolute end-0"><i class="fa fa-arrow-right"></i></span></p>';

            foreach ($city['properties'] as $hotel) {
                // Obtener la categoria
                $category = $hotel['category']['code'];
                $stars = $this->getCategoryStars($category);
                $responseSelect .= '<p data-propertyid="' . $hotel['id'] . '" class="hotel select-destination" data-name="'. $hotel['property'] .'">'. $hotel['property'] . '  '.$stars.'</p>';
            }
        }

        return $responseSelect;
    }

    function getCategoryStars($category){
        $typeCat = substr($category, 0, 1);
        $cat = substr($category, 1, 1);
        $star = '';
        for($c=1; $c<=$cat; $c++) {
            if($c<=4) {
                if($typeCat=='E') {
                    $star .= '<i class="fa fa-star"></i> ';
                }
                else {
                    $star .= '<i class="fa fa-key"></i> ';
                }
            }
        }
    
        if(($cat==5) || ($cat==7)) {
            if($typeCat=='E') {
                $star .= '<i class="fa fa-star"></i> ';
            }
            else {
                $star .= '<i class="fa fa-key"></i> ';
            }
        }
        if($cat==6) $star .="SUP";
        if($cat==7) $star .="GL";

        return $star;
    }


    private function getLanguage(){
        if(!defined('ICL_LANGUAGE_CODE')){
            return 'es';
        }

        switch (ICL_LANGUAGE_CODE){
            case 'pt-pt':
                return 'pt';
            default:
                return ICL_LANGUAGE_CODE;
        }
    }
}

