<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Twig\Extensions\TextExtension;
//use Twig\Extra\String\StringExtension;
/**
 * Clase para la gestion de plantillas sobre Twig
 * Es una clase intermedia para poder rehusar los metodos
 * ya implementados para Smarty, sin más esfuerzo.
 *
 * @author Arturo Diaz
 * @copyright RuralGest S.L.
 * @version 1.0.0.0
 * @since 09/07/2018
 *
 */
class mrplan_Twig_MrPlan
{
	// ====== Propiedades Publicas =====
	public $ver_proceso=true;
	
	
	// ===== Propiedades Privadas ======
	
	/**
	 * Listado de variables para Twig
	 *
	 * @var Array
	 */
	private $Variables=Array();
	
	/**
	 * Controladores de Twig
	 * 
	 * @var Twig_Loader_Filesystem
	 */
	private $loader = null;
	
	
	/**
	 * Controladores de Twig
	 *
	 * @var Twig_Environment
	 */
	private $twig = null;
	
	private $DirectorioTemplates;
	
	
	// ===== Metodos Publicos ======
	
	/**
	 * Constructor parametrizado de la clase
	 *
	 */
	public function __construct($ActivarDebug=false, $DirectorioTemplates=null)
	{
		// ---- Iniciamos los controladores reales de Twig
		$DirectorioTemplates=(empty($DirectorioTemplates) ? dirname(__FILE__)."/../../../templates/mod_b_00" : $DirectorioTemplates);
		$this->loader = new \Twig\Loader\FilesystemLoader($DirectorioTemplates);		
		$this->twig = new Twig\Environment($this->loader,Array(
			'charset' => 'ISO-8859-1',
			'cache' => false,
			'auto_reload' => true,						// IMPORTANTE!!! => Recompila la plantilla en la cache cuando se modifique
			'debug' => $ActivarDebug
		));		
		//$this->twig->addExtension(new StringExtension());
		
        $function = new \Twig\TwigFunction('__', '__');

        $this->twig->addFunction($function);
        $function = new \Twig\TwigFunction('admin_url', 'admin_url');
        $this->twig->addFunction($function);

        $function = new \Twig\TwigFunction('wp_nonce_field', 'wp_nonce_field');
        $this->twig->addFunction($function);


        $function = new \Twig\TwigFunction('print_r', 'print_r');
        $this->twig->addFunction($function);

		$this->DirectorioTemplates		= $DirectorioTemplates;

		

		if($ActivarDebug){
			$this->twig->addExtension(new Twig\Extension\Debug());
		}

	}
	
	public function __destruct()
	{
		
	}
	
	/**
	 * Conversion de la asignacion de Samrty a Twig
	 * 
	 * @param string $nombre_var
	 * @param mixed $valor_var
	 */
	public function assign($nombre_var,$valor_var)
	{
		$this->Variables[$nombre_var]=$valor_var;
	}
	
	/**
	 * Obtenemos la plantilla
	 * 
	 * @param string $ruta_plantilla => Ruta a partir de ./templates/mod_b_00
	 */
	public function fetch($ruta_plantilla)
	{
		return $this->twig->render('templates/'.$ruta_plantilla, $this->Variables);
	}
	
	/**
	 * Obtenemos la plantilla
	 * 
	 * @param string $ruta_plantilla => Ruta a partir de ./templates/mod_b_00
	 */
	public function fetch_php($ruta_plantilla)
	{
		extract($this->Variables);
		include $this->DirectorioTemplates.'/templates_php/'.$ruta_plantilla;
		//return $this->twig->render($ruta_plantilla, $this->Variables);
	}
	
	/**
	 * Comprueba si existe una plantilla
	 * 
	 * @param string $ruta_plantilla
	 * @return boolean (true si existe, false si no existe)
	 */
	public function exist($ruta_plantilla){
		return $this->twig->getLoader()->exists($ruta_plantilla);
	}

	public function registerPlugin($tipo, $nombre_funcion, $funcion) {
		$filter = new \Twig\TwigFilter($nombre_funcion, $funcion);
		$this->twig->addFilter($filter);
	}
	
}// /Twig_MrPlan