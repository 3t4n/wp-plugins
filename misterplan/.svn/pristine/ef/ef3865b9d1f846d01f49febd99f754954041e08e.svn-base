<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

abstract class mrplan_TMrPlanPluginAbstract{
    

    protected $path;

    protected $Plantilla;



    protected $dir_plugin;


    protected $mensajes_error   = array();
    protected $mensajes_ok      = array();

    protected $HostServer       = 'https://www.mrplan.es/';

    protected function __construct(){
		$this->path=plugin_dir_path( __FILE__ ) ;
    }



	/**
	 * Cargamos el Twig crgando los valores predefinidos
	 * 
	 * @return array
	 */
    protected function setPlantilla(){

        if(!class_exists('Twig_Loader_Filesystem')){
		    require_once dirname(__FILE__).'/vendor/autoload.php';
        }

        if(!class_exists('mrplan_Twig_MrPlan')){
		    require_once dirname(__FILE__).'/class.mrplan_Twig_MrPlan.php';
        }
        $this->Plantilla    = new mrplan_Twig_MrPlan(false, dirname(__FILE__).'/../');
        $this->Plantilla->assign('dir_plugin', $this->dir_plugin);
        $this->Plantilla->assign('MRPLAN_PLUGIN_VERSION', MRPLAN_PLUGIN_VERSION);
        $this->Plantilla->assign('MRPLAN_WORDPRESS_VERSION', get_bloginfo('version'));
        $this->Plantilla->assign('MRPLAN_WORDPRESS_PERMANLINK', get_permalink(0));

        $this->Plantilla->assign('mensajes_error', $this->mensajes_error);
        $this->Plantilla->assign('mensajes_ok', $this->mensajes_ok);
        $this->Plantilla->assign('HostServer', $this->HostServer);
        $this->Plantilla->assign('idiomas', $this->getIdiomas());

    }



	/**
	 * Devolvemos el listado de idiomas de MisterPlan
	 * 
	 * @return array
	 */
    protected function getIdiomas(){
        $idiomas      = array();

        $idiomas_texto		= array(
            esc_html__('Spanish', 'misterplan'),
            esc_html__('English', 'misterplan'),
            esc_html__('Portuguese', 'misterplan'),
            esc_html__('French', 'misterplan'),
            esc_html__('Italian', 'misterplan'),
            esc_html__('German', 'misterplan'),
            esc_html__('Catalan', 'misterplan'),
            esc_html__('Galician', 'misterplan'),
            esc_html__('Basque', 'misterplan'),
        );

        for($i=0; $i<=8; $i++){
			$idiomas[]					= (object) [
                'id_idioma'				=> $i,
                'nombre_idioma'			=> $idiomas_texto[$i]
            ];

        }
        return $idiomas;
    }



	/**
	 * Devuelve los datos de un motor (si existe, si no devuelve null)
	 * @param INteger identificador del motor
	 * @return stdClass || NULL
	 */
	protected function getMotor($id_motor){
		$id_motor			= (int) $id_motor;
        if(empty($id_motor)){
            return null;
        }
		$motor				= get_post($id_motor);
		if(is_null($motor)){
			return null;
		}
		$motor->datos					= json_decode($motor->post_content);
		$motor->id_motor				= $motor->ID;
		return $motor;
	}




	protected function mostrar_error($texto){
		return '<div id="mrplan-bootstrap" class="alert alert-danger" role="alert">'.$texto.'</div>';
	}

}