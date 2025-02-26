<?php
/*
 Plugin Name: Super PAC
 Plugin URI: http://www.martinhurford.com/super-pac.html
 Description: Shotcode to add link to http://www.colbertsuperpac.com/ along with Stephens description of Super PAC 
 Version: 1.0
 Author: Martin Hurford
 Author URI: http://www.martinhurford.com/about.html
 License: WTFPL 2.0
 License URI: http://sam.zoy.org/wtfpl/COPYING
*/
/*
 This program is free software. It comes without any warranty, to the extent
 permitted by applicable law. You can redistribute it and/or modify it under
 the terms of the Do What The Fuck You Want To Public License, Version 2,
 as published by Sam Hocevar.
 See http://sam.zoy.org/wtfpl/COPYING for more details.
*/
/**
* An object creating a definition list and with definition title as an anchor
*/
class SUPERPAC
{
	/**
	 * Constructor declaring the SUPERPAC shortcode
	 */
	public function __construct()
	{
		add_shortcode('superpac',array(&$this,'superpac_definition_list'));
	}

	/**
	 * Produce HTML output for [SUPERPAC] shotcode
	 */
	public function superpac_definition_list()
	{
		return   '<dl>'
				.'	<dt>'
				.'		<a href="http://www.colbertsuperpac.com/" title="Super PAC: A frothy mix of lube and campaign funding that is sometimes the byproduct of politics" target="_blank">Super PAC</a>'
				.'	</dt>'
				.'	<dd>'
				.'		A frothy mix of lube and campaign funding that is sometimes the byproduct of politics'
				.'	</dd>'
				.'</dl>'
		;
	}
}
$superpac = new SUPERPAC();