<?php

namespace RmdmBarraBrasil;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RmdmBarraBrasil
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'js'));
		add_action('wp_enqueue_scripts', array($this, 'css'));
		add_action('wp_head', array($this, 'head'));
		add_action('wp_footer', array($this, 'footer'));
		add_action( 'customize_register', array($this, 'customize_register'));
	}
	
	/**
	 * Enqueue JavaScritps files and configs
	 */
	public function js()
	{
		wp_enqueue_script('RmdmBarraBrasil', plugin_dir_url(__FILE__).'/frontend/js/RmdmBarraBrasil.js', array('jquery'), '0.1.0', true);
		wp_enqueue_script('BarraBrasil', '//barra.brasil.gov.br/barra_2.0.js', array('RmdmBarraBrasil'), '0.1.0', true);
		
		$data = array(
			'element_to_prepend' => apply_filters('rmdm-barra-brasil-position-element', get_theme_mod('RmdmBarraBrasilHeaderElement', 'BODY'))
		);
		
		wp_localize_script('RmdmBarraBrasil', 'RmdmBarraBrasil', $data);
	}
	
	/**
	 * Enqueue css files
	 */
	public function css()
	{
		wp_enqueue_style('RmdmBarraBrasil', plugin_dir_url(__FILE__).'/frontend/css/RmdmBarraBrasil.css');
	}
	
	public function footer()
	{
		echo '<div id="footer-brasil" class="'.esc_attr(get_theme_mod('RmdmBarraBrasilFooterColor', 'verde')).'"></div>';
	}
	
	public function head()
	{
		$theme_opt = get_theme_mod('RmdmBarraBrasilServiceNumber', '');
		if(!empty($theme_opt))
		{
			echo '<meta property="creator.productor" content="', esc_url('http://estruturaorganizacional.dados.gov.br/id/unidade-organizacional/'.$theme_opt),'">';
		}
	}
	
	/**
	 * Add Customize Options and settings
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function customize_register( $wp_customize )
	{
		/*
		 * 
		 */
		$wp_customize->add_section( 'RmdmBarraBrasil', array(
			'title'    => __( 'Barra Brasil', 'rmdm-barra-brasil' ),
			'priority' => 30,
		) );
	
		// Element to append html content
		$wp_customize->add_setting( 'RmdmBarraBrasilHeaderElement', array(
			'default'     => 'BODY',
			'capability'    => 'edit_theme_options',
		) );
		
		$wp_customize->add_control( 'RmdmBarraBrasilHeaderElement', array(
			'label'      => __( 'Elemento HTML onde deve ser adicionado o código da barra (para id inicie com "#" e classe CSS com ".")', 'rmdm-barra-brasil'),
			'section'    => 'rmdm-barra-brasil',
		) );
		
		$wp_customize->add_setting('RmdmBarraBrasilFooterColor', array(
			'default'        => 'verde'
		));
		
		$themecolors = array(
			'verde' => __('Verde', 'rmdm-barra-brasil'),
			'amarelo' => __('Amarelo', 'rmdm-barra-brasil'),
			'azul' => __('Azul', 'rmdm-barra-brasil'),
			'branco' => __('Branco', 'rmdm-barra-brasil'),
		);
		
		$wp_customize->add_control( 'RmdmBarraBrasilFooterColor', array(
			'settings' => 'RmdmBarraBrasilFooterColor',
			'label'   => __('Selecione a cor do seu tema para adequar ao padrão do rodapé (footer)', 'rmdm-barra-brasil').':',
			'section'  => 'rmdm-barra-brasil',
			'type'    => 'select',
			'choices' => $themecolors,
		));
		
		$wp_customize->add_setting('RmdmBarraBrasilServiceNumber', array(
			'default'        => ''
		));
		
		$wp_customize->add_control( 'RmdmBarraBrasilServiceNumber', array(
			'label'      => __( 'número correto do órgão no SIORG. Acesse o SIORG e procure pelo seu órgão.', 'rmdm-barra-brasil').' http://siorg.planejamento.gov.br',
			'section'    => 'rmdm-barra-brasil',
		) );
	}
	
}

global $RmdmBarraBrasil;
$RmdmBarraBrasil = new RmdmBarraBrasil();
