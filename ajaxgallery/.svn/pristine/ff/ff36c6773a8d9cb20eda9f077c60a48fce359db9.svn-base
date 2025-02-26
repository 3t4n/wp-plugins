<?php
 /*
File Name: options.php
Plugin Name: ajaxGallery
Plugin URI: http://www.laciudadx.com/trabajos/ajaxgallery
Description: Ajax + Picasa + Thickbox
Author: Sergio Ceron Figueroa
Version: 2.0
Author URI: http://www.laciudadx.com

Copyright (C) 2007 Sergio Ceron F. (http://laciudadx.com)
    
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
if( isset( $_POST[ 'save' ]) ){
	update_option("ajaxgallery_user", isset($_POST['user']) ? $_POST['user'] : "none");
	update_option("ajaxgallery_rows", isset($_POST['user']) ? $_POST['rows'] : "4");
	update_option("ajaxgallery_cols", isset($_POST['user']) ? $_POST['cols'] : "4");
	update_option("ajaxgallery_align", isset($_POST['user']) ? $_POST['align'] : "center");
	echo "<div id='message' class='updated fade'><p><strong>Opciones guardadas</strong></p></div>";
}
?>
<div class="wrap">
  <h2>Personalizar galeria</h2> 
<form method="post" style="padding-left:40px"> 
<h3>Opciones de usuario:</h3>
<p>
<label>
<input name="user" type="text" value="<?php echo get_option("ajaxgallery_user")?>"  /> 
Usuario picasa
   </label>
</p>


<h3>Galeria</h3>

<p>
<label>
<input name="rows" type="text" value="<?php echo get_option("ajaxgallery_rows")?>" /> 
Numero de filas<br>
<code>Sera el maximo de fotografias que se mostraran verticalmente</code>
   </label>
</p>
<p>
<label>
<input name="cols" type="text" value="<?php echo get_option("ajaxgallery_cols")?>" /> 
Numero de columnas<br>
<code>Sera el maximo de fotografias que se mostraran horizontalmente</code>
   </label>
</p>
<p>
<label>
<input name="align" type="text" value="<?php echo get_option("ajaxgallery_align")?>" /> 
Alinear la tabla<br>
<code>Como se alineara la galeria ( posibles valores: [ center, left, right ] )</code>
   </label>
</p>

    <p class="submit"> 
      <input type="submit" name="save" value="Actualizar la galeria &raquo;" /> 
    </p> 
  </form> 
</div>