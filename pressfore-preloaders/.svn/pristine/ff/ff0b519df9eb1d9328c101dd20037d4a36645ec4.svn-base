<?php

/**
 * Preloaders Class
 *
 * @author Pressfore
 */
class PF_Preloaders_Collection
{

	public function __construct(){ }

	function get_preloader($type)
	{
		$prelaoder = $this->$type();

		return $prelaoder;
	}

	/**
	 * Cubes Preloader Style
	 *
	 * @return string
	 */
	function cube()
	{
		$html = '<div class="cssload-thecube">
					<div class="cssload-cube cssload-c1"></div>
					<div class="cssload-cube cssload-c2"></div>
					<div class="cssload-cube cssload-c4"></div>
					<div class="cssload-cube cssload-c3"></div>
				</div>';

		return $html;
	}

	/**
	 * Squares Preloader Style
	 *
	 * @return string
	 */
	function squares()
	{
		$html = '<div id="spinningSquaresG">
					<div id="spinningSquaresG_1" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_2" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_3" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_4" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_5" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_6" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_7" class="spinningSquaresG"></div>
					<div id="spinningSquaresG_8" class="spinningSquaresG"></div>
				</div>';

		return $html;
	}

	/**
	 * Eequalizers Preloader Style
	 *
	 * @return string
	 */
	function equalizers()
	{
		$html = '<div id="cssload-loader">
					<ul>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>';

		return $html;
	}

	/**
	 * Eequalizers Preloader Style
	 *
	 * @return string
	 */
	function loading()
	{
		$html = '<div id="fountainTextG"><div id="fountainTextG_1" class="fountainTextG">L</div><div id="fountainTextG_2" class="fountainTextG">o</div><div id="fountainTextG_3" class="fountainTextG">a</div><div id="fountainTextG_4" class="fountainTextG">d</div><div id="fountainTextG_5" class="fountainTextG">i</div><div id="fountainTextG_6" class="fountainTextG">n</div><div id="fountainTextG_7" class="fountainTextG">g</div></div>';

		return $html;
	}

	/**
	 * Default Preloader Style
	 *
	 * @return string
	 */
	function default_preloader()
	{
		return '';
	}
}