<?php
/*
  Plugin Name: Youngwhan's Simple Latex
  Plugin URI: https://blog.breadncup.com/yw-latex-wp-plugin/
  Description: Latex Rendering Helper. Usage: [math] LATEX CONTEXT [/math].
  Version: 2.0.1
  Author: Youngwhan Song
  Author URI: https://blog.breadncup.com/

  Copyright: Youngwhan Song
  License: GPL2+
*/
/*  Copyright 2009-2023 Youngwhan Song  (email : breadncup@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( !defined('ABSPATH') ) exit;

class YW_LATEX {
  function yw_init() {
    add_action('wp_head', array(&$this, 'yw_mathjax'));
  }

  public function yw_mathjax() {
	echo '<script type="text/x-mathjax-config">';
	echo "MathJax.Hub.Config({";
	echo "  tex2jax: {inlineMath: [['[math]','[/math]']]}";
	echo "});";
	echo "</script>";
	echo "<script>";
	echo "  (function () {";
	echo '    var script = document.createElement("script");';
	echo '    script.type = "text/javascript";';
	echo '    script.src  = "https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML";';
	echo '    document.getElementsByTagName("head")[0].appendChild(script);';
	echo "  })();";
	echo "</script>";
  }
}

/* Main */
if (is_admin()) {
  require(dirname( __FILE__ ).'/yw-latex-admin.php');
  $yw_latex = new YW_LATEX_ADMIN;
  add_action( 'init', array(&$yw_latex,'yw_admin_init'));
  add_filter("plugin_action_links_".plugin_basename(__FILE__), array(&$yw_latex,'yw_latex_addActionLink'));
} else {
  $yw_latex = new YW_LATEX;
  add_action( 'init', array(&$yw_latex,'yw_init'));
}
