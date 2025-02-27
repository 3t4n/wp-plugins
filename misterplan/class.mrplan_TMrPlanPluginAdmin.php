<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class mrplan_TMrPlanPluginAdmin extends mrplan_TMrPlanPluginAbstract{

	
    // Hold the class instance.
    private static $instance = null;


    // Singleton
    public static function getInstance(){
		if ( self::$instance == null ){
			self::$instance = new mrplan_TMrPlanPluginAdmin();
		}
		return self::$instance;
    }


	public function __construct(){

		$this->dir_plugin = MRPLAN_PLUGIN_URL;
		$this->wp_init();
	}



	/**
	 * Inicializamos el plugin
	 */
	private function wp_init(){

		// Cargamos el menu de admin del plugin
		add_action('admin_menu', array(&$this, 'mrplan_menu'));

		// Control del admin_bar para editar motores desde una página
		add_action( 'admin_bar_menu', array( $this, 'mrplan_menu_admin' ),  999 );

		//add_action( 'admin_post', array( $this, 'add_patterns' ),  999 );

		//$this->block();
	}

	/**
	 * @deprecated 
	 */
	public function add_patterns(){

		register_block_pattern_category('mrplan', [
            'label' => 'MisterPlan'
        ]);

		$motores					= get_posts( array(
			'numberposts'     		=> 100,
			'post_type'        		=> 'mrplan-motor'
		));
		foreach($motores as $m){

			register_block_pattern('mrplan/motor_'.$m->ID, [
				'title' => $m->post_title,
				'description' => $m->post_title,
				'categories' => ['mrplan'],
				'keywords' => ['motor', 'reservas', 'booking', 'engine', 'misterplan', 'misterplan'],
	
				'content' => '<!-- wp:shortcode -->[misterplan_motor id_motor="'.$m->ID.'"]<!-- /wp:shortcode -->',
			]);

		}

		$a = 1;
		return $a;
	}


	/**
	 * @deprecated 
	 */
	public function block(){

		$resulta = wp_enqueue_script('mplan-block', $this->dir_plugin.'lib/mplan_block.js', array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ));

		register_block_type(
			'mrplan/mplan-block', 
			array(
				'editor_script'   =>  'mplan-block',
				'render_callback' =>  array($this, 'print_this_block_output'),
			)
		);
	}
	

	/**
	 * @deprecated 
	 */
	public function print_this_block_output($atts){

		return wp_json_encode($atts);
		$au = 1;
		return 'algo';
	}

	/**
	 * Función para cargar las paginas de administracion
	 * action admin_menu
	 */
	public function mrplan_menu(){
		add_menu_page('MisterPlan', 'MisterPlan', 'administrator', 'mrplan_admin', array(&$this, 'mrplan_pagina_admin'), $this->dir_plugin.'assets/images/mrplan.png');
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
				$id_motor	= (int) $output_array[1];
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
	  * Mostramos la portada del pluggin
	  */
	  public function mrplan_pagina_admin(){

		if(isset($_GET['accion']) && !empty(isset($_GET['accion']))){
			switch($_GET['accion']){
				case 'editar_motor':
				case 'guardar_motor';
				case 'crear_pagina_motor';
					return $this->pagina_motor();
					break;
				case 'crear_confirmacion':
					$this->crearConfirmacion();
					break;
				case 'delete_motor':
					$this->borrarMotor();
					break;
				case 'delete_confirmation':
					$this->borrarConfirmacion();
					break;

			}
		}


		$this->addLibrariesAdmin();
		$this->setPlantilla();

		$motores_casas				= array();
		$motores_actividades		= array();
		$motores_buscador			= array();
		$motores_paneles			= array();
		$buscador_simple			= array();
		$motores					= get_posts( array(
			'numberposts'     		=> 100,
			'post_type'        		=> 'mrplan-motor'
		));
		foreach($motores as &$m){
			$m->id_motor		= $m->ID;
			$m->datos			= json_decode($m->post_content);
			if(is_null($m->datos) || !isset($m->datos->tipo_elemento)){
				continue;
			}
			switch($m->datos->tipo_elemento){
				case 1:		$motores_casas[]		= clone $m; break;
				case 2:		$motores_actividades[]	= clone $m; break;
				case 3:		$motores_buscador[]		= clone $m; break;
				case 4:		$motores_paneles[]		= clone $m; break;
				case 5:		$buscador_simple[]		= clone $m; break;
			}
		}

  		$this->Plantilla->assign('motores_casas', $motores_casas);
		$this->Plantilla->assign('motores_actividades', $motores_actividades);
		$this->Plantilla->assign('motores_buscador', $motores_buscador);
		$this->Plantilla->assign('buscador_simple', $buscador_simple);
		$this->Plantilla->assign('motores_paneles', $motores_paneles);
		$this->Plantilla->assign('paginas_con_motor', $this->getPaginasConMotor());
		$this->Plantilla->assign('pagina_confirmacion', $this->getPaginaConfirmacion());
		$this->Plantilla->assign('debug_info', $this->getDebugInfo());
		$this->Plantilla->fetch_php('admin/portada.php');
	}


	/**
	 * Mostramos la página para crear o editar un motor
	 */
	public function pagina_motor(){

		$this->addLibrariesAdmin();

		$id_motor						= (int) $_GET['id_motor'] ?? 0;
		if(isset($_GET['accion']) && $_GET['accion']=='guardar_motor'){
			$id_motor					= $this->guardarMotor();
		}

		if(isset($_GET['accion']) && $_GET['accion']=='crear_pagina_motor'){
			$this->crearPaginaMotor();
		}

		$motor							= $this->getMotor($id_motor);
		if(is_null($motor) || is_null($motor->datos)){
			$tipo_elemento				= (int) $_GET['tipo_elemento'];
		}else{
			$tipo_elemento				= (int) $motor->datos->tipo_elemento;
		}
		$this->setPlantilla();
		$this->Plantilla->assign('motor', $motor);
		$this->Plantilla->assign('tipo_elemento', $tipo_elemento);
		$this->Plantilla->assign('paginas_con_motor', $this->getPaginasConMotor());
		$this->Plantilla->assign('pagina_confirmacion', $this->getPaginaConfirmacion());

		if(!empty($id_motor)){
			$paginas_con_este_motor		= $this->getPaginasConMotor($id_motor);
			$this->Plantilla->assign('paginas_con_este_motor', $paginas_con_este_motor);
		}

		$this->Plantilla->fetch_php('admin/motor/tipo_'.$tipo_elemento.'.php');
	}


	/**
	 * Guardamos los datos básicos del motor
	 * 
	 * @return integer
	 */
	private function guardarMotor(){
		if(!current_user_can( 'manage_options') && !current_user_can( 'edit_pages' )){
			return;
		}		
		$datos							= $this->getParamsMotor();
		if(empty($datos->id_motor)){
			$new_page = array(
				'post_title'    => $datos->nombre_motor,
				'post_content'  => wp_json_encode($datos),
				'post_status'   => 'publish',
				'post_type'     => 'mrplan-motor'
			);
			$id_motor = wp_insert_post( $new_page );
			$this->mensajes_ok[]		= esc_html__('Engine successfully created', 'misterplan');
		}else{
			$new_page = array(
				'ID'    		=> $datos->id_motor,
				'post_title'    => $datos->nombre_motor,
				'post_content'  => wp_json_encode($datos),
				'post_status'   => 'publish',
				'post_type'     => 'mrplan-motor'
			);
			wp_update_post( $new_page );
			$this->mensajes_ok[]		= esc_html__('Successfully saved data', 'misterplan');
			$id_motor			= $datos->id_motor;
		}
		return $id_motor;
	}

	/**
	 * Creamos la página de confirmación del motor y la guardamos en las opciones del plugin
	 * @param stdClass parametros post
	 */
	private function crearConfirmacion(){
		if(!current_user_can( 'manage_options' ) && !current_user_can( 'edit_pages' )){
			return;
		}
		check_admin_referer("crear_confirmacion", 'nonce_confirmacion');
		list($version)					= explode('.',get_bloginfo( 'version' ));
		if($version>=6){
			// Version para Worpdress 6.X.X
			$contenido					= '<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
			<!-- wp:shortcode -->[misterplan_confirmacion]<!-- /wp:shortcode -->
			</div>
			<!-- /wp:group -->';
		}else{
			// Version para Wordpress 5.X.X
			$contenido					= '[misterplan_confirmacion]';
		}

		$new_page = array(
			'post_title'    => esc_html__('Booking Confirmation', 'misterplan'),
			'post_content'  => $contenido,
			'post_status'   => 'publish',
			'post_type'     => 'page'
		);
		$post_id = wp_insert_post( $new_page );
		update_option('mrplan_confirmacion_page', $post_id);
		$this->mensajes_ok[]		= esc_html__('Confirmation page successfully created', 'misterplan');
	}

	/**
	 * Eliminamos un motor
	 * @param $oparams datos POST que recibismo
	 */
	private function borrarMotor(){
		if(!current_user_can( 'manage_options' ) && !current_user_can( 'edit_pages' )){
			return;
		}	
		check_admin_referer("delete_motor", 'delete_motor');
		$id_motor			= (int) $_POST['id_motor'];
		if(empty($id_motor)){
			return;
		}		

		$new_page = array(
			'ID'    		=> $id_motor,
			'post_status'   => 'trash',
			'post_type'     => 'mrplan-motor'
		);
		wp_update_post( $new_page );
		$this->mensajes_ok[]		= esc_html__('Engine successfully deleted', 'misterplan');
	}

	private function borrarConfirmacion(){
		if(!current_user_can( 'manage_options' ) && !current_user_can( 'edit_pages' )){
			return;
		}	
		check_admin_referer("delete_confirmation", 'delete_confirmation');

		delete_option('mrplan_confirmacion_page');
		$this->mensajes_ok[]		= esc_html__('Confirmation page reference successfully deleted', 'misterplan');

	}


	/**
	 * Creamos la pagina de u motor, guardando en ella el shortcode
	 * 
	 * @param stdClass datos POST recibidos (id_motor imprescindible)
	 */
	private function crearPaginaMotor(){
		if(!current_user_can( 'manage_options' ) && !current_user_can( 'edit_pages' )){
			return;
		}
		check_admin_referer("crear_pagina_motor", 'crear_pagina_motor');
		$id_motor						= (int) $_POST['id_motor'] ?? 0;
		$motor							= $this->getMotor($id_motor);
		if(is_null($motor)){
			die();
		}
		list($version)					= explode('.',get_bloginfo( 'version' ));
		$full_width						= isset($_POST['full_width']) ? (int) $_POST['full_width'] : 0;

		if($version < 6){
			// Version para Wordpress 5.X.X
			$contenido					= '[misterplan_motor id_motor="'.$motor->id_motor.'"]';
		}else if($full_width==1){
			$contenido 					= '<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
			<div class="wp-block-group alignfull"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
			<div class="wp-block-group alignwide"><!-- wp:shortcode -->
			[misterplan_motor id_motor="'.$motor->id_motor.'"]
			<!-- /wp:shortcode --></div>
			<!-- /wp:group --></div>
			<!-- /wp:group -->';
		}else{
			// Version para Worpdress 6.X.X
			$contenido					= '<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
			<!-- wp:shortcode -->
			[misterplan_motor id_motor="'.$motor->id_motor.'"]
			<!-- /wp:shortcode -->
			</div>
			<!-- /wp:group -->';
		}

		$new_page = array(
			'post_title'    => $motor->datos->nombre_motor,
			'post_content'  => $contenido,
			'post_status'   => 'draft',
			'post_type'     => 'page'
		);
		$post_id 					= wp_insert_post( $new_page );
		return;
	}


	/***
	 * Añadimos las librerias de las páginas de admin
	 */
	private function addLibrariesAdmin(){

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tooltip');
		wp_enqueue_style('mrplan_estilos_motor', $this->dir_plugin.'assets/css/admin.css');
		wp_enqueue_style('mrplan_estilos_bootstrap', $this->dir_plugin.'assets/css/bootstrap-grid.min.css');
		wp_enqueue_script('mrplan_script_admin', $this->dir_plugin.'lib/mrplan_admin.js');
	}


	/**
	 * Obtenemos la página de confirmacion guardada en las opciones del plugin
	 * @return WP_POST
	 */
	private function getPaginaConfirmacion(){

		$pagina_confirmacion			= get_option('mrplan_confirmacion_page', 0);
		if(empty($pagina_confirmacion)){
			return null;
		}
		$pagina_confirmacion			= get_post($pagina_confirmacion);
		if(is_null($pagina_confirmacion) || $pagina_confirmacion->post_status=='trash'){
			return null;
		}
		$pagina_confirmacion->link		= get_permalink($pagina_confirmacion);
		return $pagina_confirmacion;
	}

	/**
	 * Devuelve las páginas que usan un shortcode del motor de misterplan
	 * @param Integer identificador del motor a buscar (opcional)
	 * @return array
	 */
	private function getPaginasConMotor($id_motor=0){

		if(empty($id_motor)){
			$search_text		= '[misterplan_motor';
		}else{
			$search_text		= '[misterplan_motor id_motor="'.$id_motor.'"';
		}

		$query = new WP_Query( array(
			's'              => $search_text,
			'search_columns' => array( 'post_content'),
			'posts_per_page' => '500',
			'orderby'   => array(
				'date' =>'ASC',
				'menu_order'=>'ASC',
			)
		) );
		return $query->posts;
	}

	private function getDebugInfo(){
		$resulta				= new stdClass();

		$apl=get_option('active_plugins');
		$plugins=get_plugins();
		$resulta->activated_plugins=array();
		foreach ($apl as $p){           
			if(isset($plugins[$p])){
				array_push($resulta->activated_plugins, $plugins[$p]);
			}           
		}

		$resulta->template		= get_template();
		$resulta->version		= get_bloginfo('version');
		$resulta->charset		= get_bloginfo('charset');
		$resulta->language		= get_bloginfo('language');
		$resulta->php			= PHP_VERSION;
		return $resulta;
	}



	private function getParamsMotor(){
		check_admin_referer("guardar_motor", 'nonce_motor');		
		
		if(!empty($_POST['id_motor'])){
			$id_motor						= (int) $_POST['id_motor'];
			$motor							= $this->getMotor($id_motor);
			$datos							= $motor->datos;
			$datos->id_motor				= $id_motor;
		}
		if(!isset($datos) || is_null($datos)){
			$datos							= new stdClass();
		}

		if(!empty($_POST['nombre_motor'])){
			$datos->nombre_motor		= sanitize_text_field($_POST['nombre_motor']);
		}

		$datos->id_elemento					= (int) ($_POST['id_elemento'] ?? 0);
		$datos->tipo_elemento				= (int) ($_POST['tipo_elemento'] ?? 0);
		$datos->id_idioma					= (int) ($_POST['id_idioma'] ?? 0);
		$datos->id_punto_venta				= (int) ($_POST['id_punto_venta'] ?? 0);
		$datos->id_destino					= (int) ($_POST['id_destino'] ?? 0);
		$datos->debug						= (int) ($_POST['debug'] ?? 0);
		$datos->tipo_carga					= (int) ($_POST['tipo_carga'] ?? 0);
		$datos->mostrar_pasafotos			= (int) ($_POST['mostrar_pasafotos'] ?? 0);
		$datos->id_habitacion				= (int) ($_POST['id_habitacion'] ?? 0);

		if(!empty($_POST['id_widget'])){
			$datos->id_widget				= (int) $_POST['id_widget'];
		}
		if(isset($_POST['autoload'])){
			$datos->autoload				= (int) $_POST['autoload'];
		}
		if(!empty($_POST['ancho_maximo'])){
			$datos->ancho_maximo			= (int) $_POST['ancho_maximo'];
		}else{
			unset($datos->ancho_maximo);
		}
		if(isset($_POST['barra_idiomas'])){
			$datos->barra_idiomas				= (int) $_POST['barra_idiomas'];
		}else{
			$datos->barra_idiomas				= (int) 0;
		}

		if(!empty($_POST['hash'])){
			$datos->hash					= sanitize_text_field($_POST['hash']);
		}

		if(!empty($_POST['modo_ficha'])){
			$datos->modo_ficha				= sanitize_text_field($_POST['modo_ficha']);
		}else{
			$datos->modo_ficha				= 'simple';
		}

		if(isset($_POST['estilos_extra'])){
			$datos->estilos_extra		= str_replace(array("\r", "\n"), '', trim(sanitize_text_field($_POST['estilos_extra'])));
		}

		if(!empty($_POST['modo_widget'])){
			$datos->modo_widget					= (int) $_POST['modo_widget'];
		}
		if(!empty($_POST['tipo_buscador'])){
			$datos->tipo_buscador					= (int) $_POST['tipo_buscador'];
		}
		if(!empty($_POST['v_results'])){
			$datos->v_results					= (int) $_POST['v_results'];
		}
		if(!empty($_POST['autosearch'])){
			$datos->autosearch					= (int) $_POST['autosearch'];
		}
		if(!empty($_POST['disableUbicacion'])){
			$datos->disableUbicacion					= (int) $_POST['disableUbicacion'];
		}
		if(!empty($_POST['disableCodAgencia'])){
			$datos->disableCodAgencia					= (int) $_POST['disableCodAgencia'];
		}
		if(!empty($_POST['pagina_del_motor'])){
			$datos->pagina_del_motor					= (int) $_POST['pagina_del_motor'];
		}

		if(!empty($_POST['v_form'])){
			$datos->v_form						= sanitize_text_field($_POST['v_form']);
		}
		if(!empty($_POST['pagina_de_resultados'])){
			$datos->pagina_de_resultados		= sanitize_text_field($_POST['pagina_de_resultados']);
		}

		if(!empty($_POST['ancho_maximo_resultados'])){
			$datos->ancho_maximo_resultados					= (int) $_POST['ancho_maximo_resultados'];
		}
		if(!empty($_POST['id_panel'])){
			$datos->id_panel					= (int) $_POST['id_panel'];
		}
		if(!empty($_POST['texto_boton'])){
			$datos->texto_boton					= sanitize_text_field($_POST['texto_boton']);
		}
		if(!empty($_POST['default_date'])){
			$datos->default_date				= (int) $_POST['default_date'];
		}
		if(!empty($_POST['n_noches'])){
			$datos->n_noches					= (int) $_POST['n_noches'];
		}else{
			$datos->n_noches					= 1;
		}

		

		return $datos;
	}
}