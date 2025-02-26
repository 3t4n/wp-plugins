<?php
/**
 * Settings Api Options variables
 */

namespace atlScrollTop;


class OptionsVariables {

	private $atlSTpositionTB;
	private $atlSTpositionTBpx;
	private $atlSTpositionLR;
	private $atlSTpositionLRpx;
	private $atlSTIconColor;
	private $atlSTIconHoverColor;
	private $atlSTshapes;
	private $atlSTborderPx;
	private $atlSTborderColor;
	private $atlSTborderHoverColor;
	private $atlSTBgColor;
	private $atlSTBgHoverColor;
	private $atlSTIconSelect;
	private $atlSTIconSelectText;
	private $atlSTCustomCss;
	private $atlSTShowPages;
	private $atlSTShowPosts;

	public function __construct() {

		/**
		 * Position Top-Bottom && offset
		 */
		$this->setAtlSTpositionTB((array) get_option('atl_pl_scrolltop_position_top_bottom'));
		$this->setAtlSTpositionTBpx(esc_attr(get_option('atl_pl_scrolltop_position_top_bottom_px')));

		/* Default settings top && bottom */
		$atlSTpositionTB['top-bottoms'] = (empty($this->getAtlSTpositionTB()['top-bottoms'])) ? 'bottom' : $this->getAtlSTpositionTB()['top-bottoms'];
		$this->setAtlSTpositionTB($atlSTpositionTB['top-bottoms']);

		/* Default settings offset top && bottom */
		$atlSTpositionTBpx = (empty($this->getAtlSTpositionTBpx())) ? '20' : $this->getAtlSTpositionTBpx();
		$this->setAtlSTpositionTBpx($atlSTpositionTBpx);


		/**
		 * Position Left-Right && offset
		 */
		$this->setAtlSTpositionLR((array) get_option('atl_pl_scrolltop_position_left_right'));
		$this->setAtlSTpositionLRpx(esc_attr(get_option('atl_pl_scrolltop_position_left_right_px')));

		/* Default settings left && right */
		$atlSTpositionLR['left-right'] = (empty($this->getAtlSTpositionLR()['left-right'])) ? 'right' : $this->getAtlSTpositionLR()['left-right'];
		$this->setAtlSTpositionLR($atlSTpositionLR['left-right']);

		/* Default settings offset left && right */
		$atlSTpositionLRpx = (empty($this->getAtlSTpositionLRpx())) ? '20' : $this->getAtlSTpositionLRpx();
		$this->setAtlSTpositionLRpx($atlSTpositionLRpx);


		/**
		 * Icon color && hover color
		 */
		$this->setAtlSTIconColor(esc_attr(get_option('atl_pl_scrolltop_color_icon')));
		$this->setAtlSTIconHoverColor(esc_attr(get_option('atl_pl_scrolltop_color_hover_icon')));

		/* Default setting icon color */
		$atlSTIconColor = (empty($this->getAtlSTIconColor())) ? '#ffffff' : $this->getAtlSTIconColor();
		$this->setAtlSTIconColor($atlSTIconColor);

		/* Default setting icon hover color */
		$atlSTIconHoverColor = (empty($this->getAtlSTIconHoverColor())) ? '#eeeeee' : $this->getAtlSTIconHoverColor();
		$this->setAtlSTIconHoverColor($atlSTIconHoverColor);

		/* Shapes */
		$this->setAtlSTshapes((array) get_option('atl_pl_scrolltop_style_rect_circ'));

		/**
		 *  Default settings shape
		 */
		$atlSTshapes['shape'] = (empty($this->getAtlSTshapes()['shape'])) ? 'circle' : $this->getAtlSTshapes()['shape'];
		$this->setAtlSTshapes($atlSTshapes['shape']);

		/* Border size && color */
		$this->setAtlSTborderPx(esc_attr(get_option('atl_pl_scrolltop_border_size')));
		$this->setAtlSTborderColor(esc_attr(get_option('atl_pl_scrolltop_border_color')));
		$this->setAtlSTborderHoverColor(esc_attr(get_option('atl_pl_scrolltop_border_hover_color')));

		/* Default setting border size */
		$atlSTborderPx = (empty($this->getAtlSTborderPx())) ? '2' : $this->getAtlSTborderPx();
		$this->setAtlSTborderPx($atlSTborderPx);

		/* Default setting border color */
		$atlSTborderColor = (empty($this->getAtlSTborderColor())) ? '#ffffff' : $this->getAtlSTborderColor();
		$this->setAtlSTborderColor($atlSTborderColor);

		/* Default setting border hover color */
		$atlSTborderHoverColor = (empty($this->getAtlSTborderHoverColor())) ? '#555555' : $this->getAtlSTborderHoverColor();
		$this->setAtlSTborderHoverColor($atlSTborderHoverColor);


		/**
		 * Background color && background hover color
		 */
		$this->setAtlSTBgColor(esc_attr(get_option('atl_pl_scrolltop_bg_color')));
		$this->setAtlSTBgHoverColor(esc_attr(get_option('atl_pl_scrolltop_bg_hover_color')));

		/* Default setting background color */
		$atlSTBgColor = (empty($this->getAtlSTBgColor())) ? '#493c5c' : $this->getAtlSTBgColor();
		$this->setAtlSTBgColor($atlSTBgColor);

		/* Default setting background hover color */
		$atlSTBgHoverColor = (empty($this->getAtlSTBgHoverColor())) ? '#95678F' : $this->getAtlSTBgHoverColor();
		$this->setAtlSTBgHoverColor($atlSTBgHoverColor);

		/**
		 * Icon select && text
		 */
		$this->setAtlSTIconSelect((array) get_option('atl_pl_scrolltop_icon_select'));
		$this->setAtlSTIconSelectText(esc_attr(get_option('atl_pl_scrolltop_icon_select_text')));

		/* Default settings icons */
		$atlSTIconSelect['icons'] = (empty($this->getAtlSTIconSelect()['icons'])) ? '05' : $this->getAtlSTIconSelect()['icons'];
		$this->setAtlSTIconSelect($atlSTIconSelect['icons']);

		/**
		 *  Show pages && show posts
		 */
		$this->setAtlSTShowPages((array)get_option('atl_st_pages_enabled_api_id'));
		$this->setAtlSTShowPosts((array)get_option('atl_st_posts_enabled_api_id'));

		/* Custom Css */
		$this->setAtlSTCustomCss(esc_attr(get_option('atl_pl_scrolltop_custom_css')));


	}

	/**
	 * get position Top or Bottom
	 */
	public function getAtlSTpositionTB() {
		return $this->atlSTpositionTB;
	}

	/**
	 * setter position top or bottom
	 *
	 * @param $atlSTpositionTB
	 */
	public function setAtlSTpositionTB( $atlSTpositionTB ) {
		$this->atlSTpositionTB = $atlSTpositionTB;
	}

	/**
	 * get position offset
	 */
	public function getAtlSTpositionTBpx() {
		return $this->atlSTpositionTBpx;
	}

	/**
	 * setter offset position top or bottom in pixels
	 *
	 * @param $atlSTpositionTBpx
	 */
	public function setAtlSTpositionTBpx( $atlSTpositionTBpx ) {
		$this->atlSTpositionTBpx = $atlSTpositionTBpx;
	}

	/**
	 * get position Left or Right
	 */
	public function getAtlSTpositionLR() {
		return $this->atlSTpositionLR;
	}

	/**
	 * setter position top or bottom
	 *
	 * @param $atlSTpositionLR
	 */
	public function setAtlSTpositionLR( $atlSTpositionLR ) {
		$this->atlSTpositionLR = $atlSTpositionLR;
	}

	/**
	 * get position offset
	 */
	public function getAtlSTpositionLRpx() {
		return $this->atlSTpositionLRpx;
	}

	/**
	 * setter offset position top or bottom in pixels
	 *
	 * @param $atlSTpositionLRpx
	 */
	public function setAtlSTpositionLRpx( $atlSTpositionLRpx ) {
		$this->atlSTpositionLRpx = $atlSTpositionLRpx;
	}

	/**
	 * get color icon
	 */
	public function getAtlSTIconColor() {
		return $this->atlSTIconColor;
	}

	/**
	 * setter color icon
	 *
	 * @param $atlSTIconColor
	 */
	public function setAtlSTIconColor( $atlSTIconColor ) {
		$this->atlSTIconColor = $atlSTIconColor;
	}

	/**
	 * get color hover icon
	 */
	public function getAtlSTIconHoverColor() {
		return $this->atlSTIconHoverColor;
	}

	/**
	 * setter color hover icon
	 *
	 * @param $atlSTIconHoverColor
	 */
	public function setAtlSTIconHoverColor( $atlSTIconHoverColor ) {
		$this->atlSTIconHoverColor = $atlSTIconHoverColor;
	}

	/**
	 * get shape
	 */
	public function getAtlSTshapes() {
		return $this->atlSTshapes;
	}

	/**
	 * setter shape
	 *
	 * @param $atlSTshapes
	 */
	public function setAtlSTshapes( $atlSTshapes ) {
		$this->atlSTshapes = $atlSTshapes;
	}

	/**
	 * get border size
	 */
	public function getAtlSTborderPx() {
		return $this->atlSTborderPx;
	}

	/**
	 * setter border size
	 *
	 * @param $atlSTborderPx
	 */
	public function setAtlSTborderPx( $atlSTborderPx ) {
		$this->atlSTborderPx = $atlSTborderPx;
	}

	/**
	 * get color border
	 */
	public function getAtlSTborderColor() {
		return $this->atlSTborderColor;
	}

	/**
	 * setter color border
	 *
	 * @param $atlSTborderColor
	 */
	public function setAtlSTborderColor( $atlSTborderColor ) {
		$this->atlSTborderColor = $atlSTborderColor;
	}

	/**
	 * get hover color border
	 */
	public function getAtlSTborderHoverColor() {
		return $this->atlSTborderHoverColor;
	}

	/**
	 * setter hover color border
	 *
	 * @param $atlSTborderHoverColor
	 */
	public function setAtlSTborderHoverColor( $atlSTborderHoverColor ) {
		$this->atlSTborderHoverColor = $atlSTborderHoverColor;
	}

	/**
	 * get background color
	 */
	public function getAtlSTBgColor() {
		return $this->atlSTBgColor;
	}

	/**
	 * setter background color
	 *
	 * @param $atlSTBgColor
	 */
	public function setAtlSTBgColor( $atlSTBgColor ) {
		$this->atlSTBgColor = $atlSTBgColor;
	}

	/**
	 * get background hover color
	 */
	public function getAtlSTBgHoverColor() {
		return $this->atlSTBgHoverColor;
	}

	/**
	 * setter background hover color
	 *
	 * @param $atlSTBgHoverColor
	 */
	public function setAtlSTBgHoverColor( $atlSTBgHoverColor ) {
		$this->atlSTBgHoverColor = $atlSTBgHoverColor;
	}

	/**
	 * get select icon
	 */
	public function getAtlSTIconSelect() {
		return $this->atlSTIconSelect;
	}

	/**
	 * setter icon select
	 *
	 * @param $atlSTIconSelect
	 */
	public function setAtlSTIconSelect( $atlSTIconSelect ) {
		$this->atlSTIconSelect = $atlSTIconSelect;
	}

	/**
	 * get text icon
	 */
	public function getAtlSTIconSelectText() {
		return $this->atlSTIconSelectText;
	}

	/**
	 * setter text icon
	 *
	 * @param $atlSTIconSelectText
	 */
	public function setAtlSTIconSelectText( $atlSTIconSelectText ) {
		$this->atlSTIconSelectText = $atlSTIconSelectText;
	}

	/**
	 * get Custom Css
	 */
	public function getAtlSTCustomCss() {
		return $this->atlSTCustomCss;
	}

	/**
	 * setter Custom Css
	 *
	 * @param $atlSTCustomCss
	 */
	public function setAtlSTCustomCss( $atlSTCustomCss ) {
		$this->atlSTCustomCss = $atlSTCustomCss;
	}

	/**
	 * get show page
	 */
	public function getAtlSTShowPages() {
		return $this->atlSTShowPages;
	}

	/**
	 * setter show pages
	 *
	 * @param mixed $atlSTShowPages
	 */
	public function setAtlSTShowPages( $atlSTShowPages ) {
		$this->atlSTShowPages = $atlSTShowPages;
	}

	/**
	 * getter show posts
	 */
	public function getAtlSTShowPosts() {
		return $this->atlSTShowPosts;
	}

	/**
	 * setter show posts
	 *
	 * @param mixed $atlSTShowPosts
	 */
	public function setAtlSTShowPosts( $atlSTShowPosts ) {
		$this->atlSTShowPosts = $atlSTShowPosts;
	}


}