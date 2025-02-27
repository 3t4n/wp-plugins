<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class mrplan_TMrPlanPlugin extends mrplan_TMrPlanPluginAbstract{
	
    // Hold the class instance.
    private static $instance = null;
	
    // Singleton
    public static function getInstance(){
		if ( self::$instance == null ){
			self::$instance = new mrplan_TMrPlanPlugin();
		}
		return self::$instance;
    }


	public function __construct(){

		$this->dir_plugin = MRPLAN_PLUGIN_URL;
		$this->wp_init();
		if(true || is_admin()){
			$MrPlanPluginAdmin			= mrplan_TMrPlanPluginAdmin::getInstance();
		}
	}


	/**
	 * Inicializamos el plugin
	 */
	private function wp_init(){

		// Shortcode del motor de reservas
		add_shortcode( 'misterplan_motor', array(&$this, 'mrplan_shortcode_motor') );

		// Shortcode de la confirmación
		add_shortcode( 'misterplan_confirmacion', array(&$this, 'mrplan_shortcode_confirmacion') );

		// Shortcode de la cesta de la compra
		add_shortcode( 'misterplan_cesta_compra', array(&$this, 'mrplan_shortcode_cesta_compra') );

		// Traducción del plugin
		add_action( 'plugins_loaded', array( $this, 'load_plugins_textdomain' ) );

		// Estilos
		add_action( 'wp_enqueue_scripts',  array(&$this, 'mrplan_add_estilos') , 999999999);
	}


	/**
	 * Añadimos los estilos del motor, para evitar conflictos
	 * action wp_enqueue_scripts
	 */
	public function mrplan_add_estilos(){
		wp_enqueue_style('mrplan_estilos_motor', $this->dir_plugin.'assets/css/motor.min.css');
	}

	/**
	 * Función para cargar las paginas de administracion
	 * action admin_menu
	 */
	public function menu(){
		add_menu_page('MisterPlan', 'MisterPlan', 'administrator', 'mrplan_admin', array(&$this, 'pagina_admin'), $this->dir_plugin.'assets/images/mrplan.png');
	}

	/**
	 * Para mostrar en el menu el enlace para editar un motor
	 */
	public function mrplan_menu_admin($wp_admin_bar){
		global $post;
		if(is_null($post) || is_null($post->post_content) || empty($post->post_content)){
			return;
		}
		if(strpos($post->post_content, '[misterplan_motor')!==false){
			preg_match( '/id_motor="([0-9]+)"/', $post->post_content, $output_array);
			if(is_array($output_array) && count($output_array)>1){
				$id_motor	= (int) $output_array;
				$args = array(
					'id'    => 'menu_motor',
					'title' => esc_html__('Edit Booking Engine', 'misterplan'),
					'href'  => admin_url('admin.php?page=mrplan_admin&accion=editar_motor&id_motor='.$id_motor),
				);
				$wp_admin_bar->add_node( $args );

			}
		}
	}

	/**
	 * Cargamos el modulo de idiomas
	 */
	public function load_plugins_textdomain(){
		load_plugin_textdomain( 'misterplan', false,dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * SHORCTODE de la página de confirmacion
	 * 
	 * @return string
	 */
	public function mrplan_shortcode_confirmacion($atts, $content = null ) {

		// Si estamos en el admin, no ejecutamos esto
		global $pagenow;
		if($pagenow=='admin.php'){
			return;
		}
		if( (isset($_GET['action']) && $_GET['action']=='elementor') || isset($_GET['elementor-preview']) ){
			$this->setPlantilla();
			$this->Plantilla->assign('confirmacion', 1);
			$this->Plantilla->assign('texto_title', esc_html__('MisterPlan confirmation script', 'misterplan'));
			$this->Plantilla->assign('texto_disabled', esc_html__('Disabled preview with Elementor Plugin', 'misterplan'));
			return $this->Plantilla->fetch('elementor_preview.html');
		}
		
		wp_enqueue_style('mrplan_estilos_confirmacion', $this->dir_plugin.'assets/css/motor.min.css');
		$this->setPlantilla();
		return $this->Plantilla->fetch('confirmacion.html');
	}

	public function mrplan_shortcode_cesta_compra($atts, $content=null){

		// Si estamos en el admin, no ejecutamos esto
		global $pagenow;
		if($pagenow=='admin.php'){
			return;
		}
		wp_enqueue_style('mrplan_estilos_motor', $this->dir_plugin.'assets/css/motor.min.css');
		global $post;
		// Comprobamos si la pagina tiene un motor, si lo tiene, no se pone la cesta de la compra
		if(!is_null($post) && !is_null($post->post_content) && !empty($post->post_content)){
			if(strpos($post->post_content, '[misterplan_motor')!==false || strpos($post->post_content, '[misterplan_confirmacion')!==false ){
				return;
			}
		}		

		$boton_atts 		= shortcode_atts( array('id_motor' => 0,), $atts );
		$id_motor			= (int) $boton_atts['id_motor'];
		$motor				= $this->getMotor($id_motor);
		if(is_null($motor)){
			return $this->mostrar_error('Motor not found');
		}
		$motor->datos					= json_decode($motor->datos);
		$pagina_confirmacion			= get_option('mrplan_confirmacion_page', 0);
		$confirmacion					= get_permalink($pagina_confirmacion);


		if( (isset($_GET['action']) && $_GET['action']=='elementor') || isset($_GET['elementor-preview']) ){
			$this->setPlantilla();
			$this->Plantilla->assign('texto_title', esc_html__('MisterPlan shopping cart script', 'misterplan'));
			$this->Plantilla->assign('texto_disabled', esc_html__('Disabled preview with Elementor Plugin', 'misterplan'));
			$this->Plantilla->assign('motor', $motor);
			return $this->Plantilla->fetch('elementor_preview.html');
		}

		$this->setPlantilla();
		$this->Plantilla->assign('motor', $motor);
		$this->Plantilla->assign('confirmacion', $confirmacion);
		return $this->Plantilla->fetch('cesta_compra.html');
	}

	/**
	 * SHORCTODE del motor de reservas
	 * 
	 * @return string
	 */
	public function mrplan_shortcode_motor($atts, $content = null ) {

		// Si estamos en el admin, no ejecutamos esto
		global $pagenow;
		if($pagenow=='admin.php'){
			return;
		}
		if($pagenow=='post.php'){
			return 'PLUGIN MISTERPLAN';
		}

		global $post;
		// Comprobamos si la pagina tiene la confirmacion, para no sacar el motor
		if(!is_null($post) && !is_null($post->post_content) && !empty($post->post_content)){
			if(strpos($post->post_content, '[misterplan_confirmacion')!==false ){
				return;
			}
		}

		wp_enqueue_style('mrplan_estilos_motor', $this->dir_plugin.'assets/css/motor.min.css');

		$boton_atts 		= shortcode_atts( array('id_motor' => 0, 'tipo' => '', 'id_idioma' => null, 'id_elemento' => 0), $atts );
		$id_motor			= (int) $boton_atts['id_motor'];
		$tipo				= $boton_atts['tipo'];
		$motor				= $this->getMotor($id_motor);
		if(is_null($motor)){
			return $this->mostrar_error('Motor not found');
		}
		$pagina_confirmacion			= get_option('mrplan_confirmacion_page', 0);
		$confirmacion					= get_permalink($pagina_confirmacion);

		// Comprobamos los dato sque vengan por GET, por si hay que sobreescribir alguno
		if(isset($_GET['id_idioma'])){
			$motor->datos->id_idioma	= (int) $_GET['id_idioma'];
		}else if(!is_null($boton_atts['id_idioma'])){
			$motor->datos->id_idioma	= (int) $boton_atts['id_idioma'];
		}

		if($motor->datos->id_idioma==-1){
			// Idioma automatico
			$motor->datos->id_idioma 		= $this->getLanguageBrowser();
		}

		if(isset($_GET['tipo_carga'])){
			$motor->datos->tipo_carga		= (int) $_GET['tipo_carga'];
		}		

		if(isset($_GET['debug_misterplan']) && !empty($_GET['debug_misterplan'])){
			$motor->datos->debug			= (int) $_GET['debug_misterplan'];
		}

		if(isset($_GET['id_elemento']) && !empty($_GET['id_elemento'])){
			$motor->datos->id_elemento		= (int) $_GET['id_elemento'];
		}else if(!empty($boton_atts['id_elemento'])){
			$motor->datos->id_elemento		= (int) $boton_atts['id_elemento'];
		}


		if(isset($_GET['tipo_elemento']) && !empty($_GET['tipo_elemento']) && $_GET['tipo_elemento']<3){
			$motor->datos->tipo_elemento	= (int) $_GET['tipo_elemento'];
		}

		if(isset($_GET['n_noches']) && !empty($_GET['n_noches'])){
			$motor->datos->n_noches			= (int) $_GET['n_noches'];
		}
		if(isset($_GET['fecha_entrada']) && !empty($_GET['fecha_entrada'])){
			$motor->datos->fecha_entrada	=  date('d/m/Y', strtotime(str_replace('/', '-', urldecode($_GET['fecha_entrada']))));
		}

		if(isset($_GET['autoload']) && $_GET['autoload']==1){
			$motor->datos->autoload			= (int) $_GET['autoload'];
		}

		if(isset($motor->datos->default_date)){
			switch($motor->datos->default_date){
				case 1:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("+1 day"));				break;
				case 2:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("+2 day"));				break;
	
				case 4:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next d"));				break;
				case 5:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next monday"));			break;
				case 6:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next wednesday"));		break;
				case 7:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next thursday"));		break;
				case 8:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next friday"));			break;
				case 9:		$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next saturday"));		break;
				case 10:	$motor->datos->fecha_entrada = date('d/m/Y', strtotime("next sunday"));			break;
	
				case 0:
				default:
			}
		}	


		$this->setPlantilla();
		$this->Plantilla->assign('motor', $motor);
		$this->Plantilla->assign('confirmacion', $confirmacion);
		$tipo_elemento					= (int) $motor->datos->tipo_elemento;

		if($tipo_elemento==3){

			if($tipo=='buscador'){
				$this->Plantilla->assign('resultados', 0);
				$this->Plantilla->assign('buscador', 1);

			}else if($tipo=='resultados'){
				$this->Plantilla->assign('resultados', 1);
				$this->Plantilla->assign('buscador', 0);

			}else{
				$this->Plantilla->assign('resultados', 1);
				$this->Plantilla->assign('buscador', 1);				
			}
		}
		if($motor->datos->tipo_elemento==3 || $motor->datos->tipo_elemento==4 || $motor->datos->tipo_elemento==5){
			if(!empty($motor->datos->pagina_del_motor)){
				$motor->datos->pagina_del_motor_link		= get_the_permalink($motor->datos->pagina_del_motor);
			}
			if(!empty($motor->datos->pagina_de_resultados)){
				$motor->datos->pagina_de_resultados_link	= get_the_permalink($motor->datos->pagina_de_resultados);
			}
		}

		if(isset($motor->datos->barra_idiomas) && $motor->datos->barra_idiomas==1){
			$this->addIdiomas($motor->datos->id_idioma);
		}

		if( (isset($_GET['action']) && $_GET['action']=='elementor') || isset($_GET['elementor-preview']) ){
			$this->setPlantilla();
			$this->Plantilla->assign('texto_title', esc_html__('MisterPlan engine script', 'misterplan'));
			$this->Plantilla->assign('texto_disabled', esc_html__('Disabled preview with Elementor Plugin', 'misterplan'));
			$this->Plantilla->assign('motor', $motor);
			return $this->Plantilla->fetch('elementor_preview.html');
		}

		if($motor->datos->tipo_elemento==5){
			wp_enqueue_script('jquery');
			wp_enqueue_script('misterplan_moment', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js');
			wp_enqueue_script('misterplan_easepick', 'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js');
			wp_enqueue_script('mrplan_script_admin', $this->dir_plugin.'lib/mrplan_simple_search.min.js');
		}
		return $this->Plantilla->fetch('motor/tipo_'.$tipo_elemento.'.html');
	}

	/**
	 * Añadimos el listado de idiomas al twig
	 */
	private function addIdiomas($id_idioma=null){
		$pathInfo 		= wp_parse_url(esc_url_raw($_SERVER['REQUEST_URI']));
		$queryString 	= $pathInfo['query'] ?? '';
		// convert the query parameters to an array
		parse_str($queryString, $queryArray);
		if(isset($_GET['id_idioma'])){
			$this->Plantilla->assign('idioma_marcado', (int) $_GET['id_idioma']);
		}else if(!is_null($id_idioma)){
			$this->Plantilla->assign('idioma_marcado', (int) $id_idioma);
		}

		$idiomas			= $this->getIdiomas();
		foreach($idiomas as &$i){
			$queryArray['id_idioma'] 	= $i->id_idioma;
			$newQueryStr 				= http_build_query($queryArray);
			$i->url						= home_url($pathInfo['path'].'?'.$newQueryStr);
		}
		$this->Plantilla->assign('idiomas', $idiomas);
	}


	/**
	 * Según el idioma configurado en el navegador, devolvemos el identificador para el motor.
	 * Si no encuentra ninguno, devuelve el 1 (iingles)
	 * 
	 * @return integer
	 */
	private function getLanguageBrowser(){
		$languageList	= null;
		if (is_null($languageList)) {
			if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
				return 0;
			}
			$languageList = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		}
		$languages = array();
		$languageRanges = explode(',', trim($languageList));
		foreach ($languageRanges as $languageRange) {
			if (preg_match('/(\*|[a-zA-Z0-9]{1,8}(?:-[a-zA-Z0-9]{1,8})*)(?:\s*;\s*q\s*=\s*(0(?:\.\d{0,3})|1(?:\.0{0,3})))?/', trim($languageRange), $match)) {
				$languages[] = reset(explode('-', strtolower($match[1])));
			}
		}

		if(count($languages)>0){
			foreach($languages as $l){
				switch($l){
					case 'es':		return 0;
					case 'en':		return 1;
					case 'pt':		return 2;
					case 'fr':		return 3;
					case 'it':		return 4;
					case 'de':		return 5;
					case 'ca':		return 6;
					case 'gl':		return 7;
					case 'eu':		return 8;
				}
			}
		}	

		return 1;
	}
}