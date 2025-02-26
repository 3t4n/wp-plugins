<?php
/**
 * Created by PhpStorm.
 * User: sebastien
 * Date: 01/08/17
 * Time: 14:13
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/*
Element Description: VC Info Box
*/

// Element Class
class vcOpenAgenda extends WPBakeryShortCode {


	// Element Init
	function __construct() {
		add_action( 'init', array( $this, 'vc_openagenda_mapping' ) );
		add_shortcode( 'vc_openagenda', array( $this, 'vc_openagenda_html' ) );
	}

	// Element Mapping
	public function vc_openagenda_mapping() {
		vc_map(

			array(
				'name'        => __( 'OpenAgenda', '5p2p-vc-openagenda' ),
				'base'        => 'vc_openagenda',
				'description' => __( 'Display your openAgenda in WordPress', '5p2p-vc-openagenda' ),
				'category'    => __( '5 pains & 2  Poissons', '5p2p-vc-openagenda' ),
				'icon'        => P2P5_OPENAGENDA_URL . '/assets/img/icon.jpg',
				'params'      => array(

					array(
						'type'        => 'textfield',
						'holder'      => 'h3',
						'class'       => 'title-class',
						'heading'     => __( 'Title', '5p2p-vc-openagenda' ),
						'param_name'  => 'title',
						'value'       => __( 'Title', '5p2p-vc-openagenda' ),
						'description' => __( 'Add a word between % to add a different style. Only 1 allowed', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'colorpicker',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'Color to Title', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_title_color',
						'value'       => '#000000',
						'description' => __( 'Select the color for the  title part between %', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),


					array(
						'type'        => 'textfield',
						'holder'      => 'h3',
						'class'       => 'title-class',
						'heading'     => __( 'Agenda Slug', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_slug',
						'value'       => __( 'my-agenda-slug', '5p2p-vc-openagenda' ),
						'description' => __( 'The Slug of your agenda in openagenda. For example, if your Openagenda URL is https://openagenda.com/my-great-calendar, then the slug is my-great-calendar', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'textfield',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'tag Filter', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_tag',
						'value'       => __( '', '5p2p-vc-openagenda' ),
						'description' => __( 'Tag Filter', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'textfield',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'Cat Filter', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_cat',
						'value'       => __( '', '5p2p-vc-openagenda' ),
						'description' => __( 'Cat Filter', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'textfield',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'search', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_search',
						'value'       => __( '', '5p2p-vc-openagenda' ),
						'description' => __( 'search Filter', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),


					array(
						'type'        => 'textfield',
						'holder'      => 'a',
						'class'       => 'url-class',
						'heading'     => __( 'URL to Agenda', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_url',
						'value'       => esc_url( site_url() ),
						'description' => __( 'URL to Agenda. You must create a page integrating OpenAgenda', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'textfield',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'Link Text', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_text',
						'value'       => __( 'Link Text', '5p2p-vc-openagenda' ),
						'description' => __( 'Text for the link', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'colorpicker',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'Background color', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_date_color',
						'value'       => '#00bfff',
						'description' => __( 'Date Box background color', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'colorpicker',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'text color', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_date_text_color',
						'value'       => '#000000',
						'description' => __( 'Date Box text color', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

					array(
						'type'        => 'checkbox',
						'holder'      => 'p',
						'class'       => 'title-class',
						'heading'     => __( 'Display venue', '5p2p-vc-openagenda' ),
						'param_name'  => 'agenda_lieu',
						'value'       => __( '', '5p2p-vc-openagenda' ),
						'description' => __( 'Display Venue', '5p2p-vc-openagenda' ),
						'admin_label' => false,
						'weight'      => 0,
						'group'       => 'Agenda',
					),

				)
			)
		);

	}


	// Element HTML
	public function vc_openagenda_html( $atts ) {

		$atts = shortcode_atts( array(
			'agenda_slug'            => '',
			'title'                  => '',
			'agenda_url'             => '',
			'agenda_text'            => '',
			'agenda_title_color'     => '',
			'agenda_date_color'      => '',
			'agenda_date_text_color' => '',
			'agenda_tag'             => '',
			'agenda_cat'             => '',
			'agenda_search'          => '',
			'agenda_lieu'          => '',
		),
			$atts

		);

		$agenda_slug            = $atts['agenda_slug'];
		$title                  = $atts['title'];
		$agenda_url             = $atts['agenda_url'];
		$agenda_text            = $atts['agenda_text'];
		$agenda_title_color     = $atts['agenda_title_color'];
		$agenda_date_color      = $atts['agenda_date_color'];
		$agenda_date_text_color = $atts['agenda_date_text_color'];
		$agenda_tag             = $atts['agenda_tag'];
		$agenda_cat             = $atts['agenda_cat'];
		$agenda_lieu             = $atts['agenda_lieu'];
		$agenda_search          = str_replace( ' ', '%20', $atts['agenda_search'] );

		/**
		 * Get the openAgenda uid
		 */


		$agenda_transient = get_transient( 'openagenda_slug_' . $agenda_slug );

		if ( $agenda_transient ) {

			if ( $agenda_slug != $agenda_transient ) {

				/**
				 * L'agenda a été modifié
				 * Update Transient
				 *
				 */
				set_transient( 'openagenda_slug_' . $agenda_slug, $agenda_slug, 86400 );

				$key = get_option( 'openagenda_api' );

				$uid = get_transient( 'openagenda_uid_' . $agenda_slug );

				/**
				 * L'uid n'existe donc pas
				 */

				if ( ! $uid ) {
					if ( ! empty( $key ) ) {
						$url = file_get_contents( 'https://api.openagenda.com/v1/agendas/uid/' . $agenda_slug . '?key=' . $key );
						$url = json_decode( $url, true );
						$uid = $url['data']['uid'];
					}

					set_transient( 'openagenda_uid_' . $agenda_slug, $uid, 86400 );
				}


				if ( $uid ) {
					if ( empty( $agenda_tag ) ) {
						$events = file_get_contents( 'https://openagenda.com/agendas/' . $uid . '/events.json' );
					} else {
						$events = file_get_contents( 'https://openagenda.com/agendas/' . $uid . '/events.json?oaq%5Btags%5D%5B0%5D=' . $agenda_tag );
					}

					$events = json_decode( $events, true );
				}

				if ( ! empty( $events ) ) {

					$html = '<div class="vc-infobox-wrap"><h2 class="vc-infobox-title">' . $agenda_slug . '</h2></div>';

				} else {
					$html = '<div class="vc-infobox-wrap><p>' . __( 'No Events scheduled', '5p2p-vc-openagenda' ) . '</p></div>';
				}

				return $html;
			} else {

				/**
				 * l'agenda n'a pas été modifié
				 */

				return $this->p2p5_openagenda_view( $agenda_lieu, $agenda_search, $agenda_cat, $agenda_tag, $agenda_slug, $title, $agenda_url, $agenda_text, $agenda_title_color, $agenda_date_color, $agenda_date_text_color );

			}


		} else {

			set_transient( 'openagenda_slug_' . $agenda_slug, $agenda_slug, 86400 );

			return $this->p2p5_openagenda_view($agenda_lieu, $agenda_search, $agenda_cat, $agenda_tag, $agenda_slug, $title, $agenda_url, $agenda_text, $agenda_title_color, $agenda_date_color, $agenda_date_text_color );
		}
	}

	//return $html;


	public function p2p5_openagenda_view( $agenda_lieu, $agenda_search, $agenda_cat, $agenda_tag, $agenda_slug, $title, $agenda_url, $agenda_url_text, $agenda_title_color, $agenda_date_color, $agenda_date_text_color ) {
		$car_exist = strpos( $title, '%' );

		if ( $car_exist ) {
			$title = explode( '%', $title );
			$title = $title[0] . '<span class="openagenda-title" style="color:' . $agenda_title_color . '">' . $title[1] . '</span> ' . $title[2];
		}


		$key = get_option( 'openagenda_api' );

		$uid = get_transient( 'openagenda_uid_' . $agenda_slug );

		if ( ! $uid ) {
			if ( ! empty( $key ) ) {
				$url = file_get_contents( 'https://api.openagenda.com/v1/agendas/uid/' . $agenda_slug . '?key=' . $key );
				$url = json_decode( $url, true );
				$uid = $url['data']['uid'];
			}

			set_transient( 'openagenda_uid_' . $agenda_slug, $uid, 86400 );
		}


		if ( $uid ) {

			$filters = array(
				'oaq%5Btags%5D%5B0%5D' => $agenda_tag,
				'oaq%5Bcategory%5D'    => $agenda_cat,
				'oaq%5Bwhat%5D'        => $agenda_search
			);

			$url = 'https://openagenda.com/agendas/' . $uid . '/events.json';

			foreach ( $filters as $key => $filter ) {
				if ( ! empty( $filter ) ) {
					$url = add_query_arg( array( $key => $filter ), $url );
				}
			}
			$events = file_get_contents( $url );


			$events = json_decode( $events, true );
			//var_dump($events);
			$html = '<aside class="vc-infobox-wrap"><h3 class="vc-infobox-title openagenda">' . $title . '</h3>';

			if ( $events['total'] == 0 ) {

				$html .= '<p>' . __( 'Sorry, no events found', '5p2p-vc-openagenda' ) . '</p>';
			} else {

				$html .= '<div class="slick-js"><ul class="slides-slick">';

				foreach ( $events as $event ) {
					foreach ( $event as $ev ) {
//var_dump($ev['range']['fr']);
						$event_id   = $ev["uid"];
						$url        = $agenda_url . '?oaq%5Buid%5D=' . $event_id;
						$start_test = strtotime( date( 'd-F-Y', strtotime( $ev['timings'][0]['start'] ) ) );
						$end_test   = strtotime( date( 'd-F-Y', strtotime( $ev['timings'][0]['end'] ) ) );
						$start      = date_i18n( 'd F', strtotime( $ev['timings'][0]['start'] ) );
						$end        = date_i18n( 'd F Y', strtotime( $ev['timings'][0]['end'] ) );
						$today      = date( 'U' );

						/*						if ( $start_test === $end_test ) {
													$date = '<span>Le ' . $start . '</span>';
												} else {
													$date = '<span>Du ' . $start . ' au ' . $end . '</span>';
												}*/
//https://support.ecclesial.fr/index.php?page=ticket&id=142
						$date = $ev['range']['fr'];

						if ( strlen( $ev['title']['fr'] ) > '59' ) {
							$ev['title']['fr'] = substr( $ev['title']['fr'], 0, 59 ) . '...';
						}

						if ( $start_test >= $today ) {
							$html .= '<li class="slide">';
							$html .= '<a href="' . $url . '" style="color:' . $agenda_date_text_color . '" >';
							$html .= '<div class="slide-pic">';
							$html .= '<img src="' . $ev['image'] . '"  />';
							$html .= '</div>';

							$html .= '<div class="date" style="background: ' . $agenda_date_color . '; color:' . $agenda_date_text_color . '">';
							$html .= '<p> Le ' . $date . '</p>';
							$html .= '<h4>' . $ev['title']['fr'] . '</h4>';

							if ($agenda_lieu == 'true') {
								$html .= '<p class="openagenda-lieu">' . $ev['locationName'] . '</p>';
							}

							$html .= '</a>';
							$html .= '</div>';
							$html .= '</li>';

						}
					}
				}
				$html .= '</ul><div class="arrows-bottom"></div></div><a href="' . $agenda_url . '">' . $agenda_url_text . '</a>';


			}

			$html .= '</aside>';

		}

		return $html;

	}


}


// End Element Class

// Element Class Init
new vcOpenAgenda();