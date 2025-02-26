<?php

/*

-- Informazioni su questo plugin --------------------------------

Plugin Name: ES Custom Fields Interface

Plugin URI: http://cmsus.wordpress.com/es-custom-fields-interface/

Description: Aggiunge box per immissione dati in campi personalizzati nel pannello Aggiungi/Modifica articolo e/o nel pannello Aggiungi/Modifica pagina. Si possono inserire tutti i tipi di input classici: checkbox, radio, select, textarea, textfield e tre input/campi speciali: datefield, filefield e imagefield. Con datefield si sceglie una data tramite un clalendario pop-up, mentre filefield e imagefield permettono di scegliere file/immagini tramite interfaccia visuale. Si possono fare dei gruppi (fieldset) di campi all'interno di box e si possono inserire campi all'interno dei campi di tipo checkbox e/o radio. Nei checkbox, radio e select si possono avere delle liste dinamiche con categories, tags, pages e posts. Testato con WordPress 2.9.x. --- <a href="plugin-editor.php?file=es-custom-fields-interface/config.txt" title="File di configurazione">Configura</a> i campi personalizzati tramite il file config.txt --- <a target="_new" href="../wp-content/plugins/es-custom-fields-interface/leggimi.htm" title="Istruzioni">Istruzioni in italiano</a>.

Version: 3.20

Author: Enzo Sforna

Author URI: http://cmsus.wordpress.com/



/*  Copyright 2009-2010  Enzo Sforna  (email : enzo.sforna@gmail.com)

This program is free software; you can redistribute it and/or modify

it under the terms of the GNU General Public License as published by

the Free Software Foundation; either version 2 of the License, or

(at your option) any later version.



This program is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the

GNU General Public License for more details.



You should have received a copy of the GNU General Public License

along with this program; if not, write to the Free Software

Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

Online: http://www.gnu.org/licenses/gpl.txt





-- Information of plugin customized by Tomohiro Okuwaki  --------------------------------

Plugin Name: Custom Field Gui Utility

Plugin URI: http://www.tinybeans.net/blog/download/wp-plugin/cfg-utility-2.html

Description: WordPress 2.8.x the "Post" and "Page" of the screen, generate a form for entering the field elements, custom plug-in interface that provides easy to use custom fields. "Custom Field GUI" customized version of the plugin. Original plugin's author is <a href="http://rhymedcode.net">Joshua Sigar</a>.

Author: Customized by Tomohiro Okuwaki

Author URI: http://www.tinybeans.net/blog/

Version: 2.1.0

Customize: Tomohiro Okuwaki (http://www.tinybeans.net/blog/)

	

-- Original Plugin's Information --------------------------------

Original Plugin's Name: rc:custom_field_gui

Original Plugin's URI: http://rhymedcode.net/projects/custom-field-gui

Original Plugin's Description: Automatically adds form element(s) in Write Post panel, which act as a Post's custom field(s). Configuration is thru conf.ini. Instruction is on readme.txt.

Original Plugin's Author: Joshua Sigar

Original Plugin's Version: 1.5

Original Plugin's Author URI: http://rhymedcode.net

*/ 

/*

rc:custom_field_gui

Licensed under the MIT License

Copyright (c)  2005 Joshua Sigar

Permission is hereby granted, free of charge, to any person

obtaining a copy of this software and associated

documentation files (the "Software"), to deal in the

Software without restriction, including without limitation

the rights to use, copy, modify, merge, publish,

distribute, sublicense, and/or sell copies of the Software,

and to permit persons to whom the Software is furnished to

do so, subject to the following conditions:

The above copyright notice and this permission notice shall

be included in all copies or substantial portions of the

Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY

KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE

WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR

PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS

OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR

OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR

OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE

SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/



// Add custom fields to specify the name box [start]

$custom_fields_interface = 'ES Custom Fields Interface';



// Add custom fields to specify the name box [end] 

function custom_fields_interface_js ()

	

{

	

$site_url = get_bloginfo('wpurl');
//$plugin_url=WP_PLUGIN_URL .'/es-custom-fields-interface/';

$facebox_css ='<link rel="stylesheet" href="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/facebox/facebox.css?ver=102" type="text/css" media="screen,tv" />' . "\n";

$cfg_css ='<link rel="stylesheet" href="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/es_cfi.css?ver=102" type="text/css" media="screen,tv" />' . "\n";

$datefield_css ='<link rel="stylesheet" href="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/jquery.calendar.css?ver=103" type="text/css" media="screen,tv" />' . "\n";

$facebox_js ='<script type="text/javascript" src="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/facebox/facebox.js?ver=102"></script>' . "\n";

$cookie_js ='<script type="text/javascript" src="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/cookie.js?ver=102"></script>' . "\n";

$language_js='<script type="text/javascript" src="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/language.js?ver=102"></script>' . "\n";	

$imagefield_js = '<script type="text/javascript" src="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/es_cfi.js?ver=102"></script>' . "\n";

$facebox_init= '<script type="text/javascript">jQuery(function(){jQuery("a[rel*=facebox]").facebox();});</script>' . "\n";



$datefield_js='<script type="text/javascript" src="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/jquery.calendar.js?ver=110"></script>' . "\n";$datefield_cfg_js='<script type="text/javascript" src="'. $site_url . '/wp-content/plugins/es-custom-fields-interface/es_date_input.js?ver=110"></script>' . "\n";

$datefield_init='<script type="text/javascript">jQuery(document).ready(function() {jQuery(".date_input").calendar({dateFormat:"%d/%m/%Y"});});</script>' . "\n";





	$out = $facebox_css.$cfg_css.$datefield_css.$facebox_js.$cookie_js.$language_js.$imagefield_js.$facebox_init.$datefield_js.$datefield_init;





	echo $out;



	

}



add_action('admin_head','custom_fields_interface_js');



include_once( 'es_cfi.class.php' );



require_once(ABSPATH . 'wp-admin/includes/template.php');



/*



function image_field_button ()

	

{

	

	$out = '<button id="imagefield_url_copy_upload" class="button">	

	

	Insert the image field case.</button>';

	

	echo $out;

	

}



add_action('post-upload-ui','image_field_button');



*/







// post and page



add_action( 'simple_edit_form', array( 'es_custom_fields_interface', 'insert_gui' ) );



/* simple_edit_form: Advanced section does not contain a "simple mode" post to run late in the posting form. */







// post and page



add_meta_box('custom_fields_interface', $custom_fields_interface, array('es_custom_fields_interface', 'insert_gui'), 'post', 'normal', 'high');



add_meta_box('custom_fields_interface', $custom_fields_interface, array('es_custom_fields_interface', 'insert_gui'), 'page', 'normal', 'high');







// post and page



add_action( 'edit_post', array( 'es_custom_fields_interface', 'edit_meta_value' ) );



/* edit_post: Be executed when a page is edited or updated Posts. To do this, add a comment when the update (which updates the number of comments posted or page), including. */







// post and page



add_action( 'save_post', array( 'es_custom_fields_interface', 'edit_meta_value' ) );



/* save_post: Use the import feature, use the edit form page article, XMLRPC posting, and when you run an updated article on how to create a page of posts in one email. */







// post



add_action( 'publish_post', array( 'es_custom_fields_interface', 'edit_meta_value' ) );



/* publish_post: Posts have been published during that run when the information is edited or published articles. */







// page



add_action( 'transition_post_status', array( 'es_custom_fields_interface', 'edit_meta_value' ) );



/* transition_post_status: Version 2.3. When a page article was published, the status or "public" if it is changed to run. */



?>