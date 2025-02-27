

<title>Panel de control</title>

<div class="wrap">



<div class="icon32" id="icon-edit-pages"></div>



<!-- 

///////////////////////////////////////////////////   

             Panel de control

///////////////////////////////////////////////////   

-->







<h2>Configurador de: </h2>

<h3>Plugin de Navidad - IndianWebs</h3>



<div id="poststuff" class="metabox-holder has-right-sidebar" >



		<div id="post-body" >

        

        	<div style="float:right; width:25%;">

                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'logoindianwebsgrande.png'; ?>"  />

                <p>Con más de 2500 clientes satisfechos en creación y mantenimiento de webs, intranets, y apps en internet. Las páginas web y tiendas virtuales, avalan nuestra trayectoria, a lo largo de 19 años de actividad, desde 1996.</p>

                <p>IndianWebs es un proveedor de soluciones web, ofreciendo desde servicios de páginas web, promoción, mantenimiento, consultoría y programación.</p>

                

                <a href="http://www.indianwebs.com">www.indianwebs.com</a>

                

            </div>



			<div id="post-body-content" class="form-wrap">



                <form name="post_form" method="post" action="" enctype="multipart/form-data">



				<?php wp_nonce_field('nieve_action', 'nieve_nonce' ); ?>

                

                <!-- 

                ///////////////////////////////////////////////////   

                             Activar Nieve

                ///////////////////////////////////////////////////   

                -->





				<div id="titlediv">



					<div class="form-field">



					<h3>Activar copos de nieve?</h3>


						<select name="set_copos" id="set_copos">

							<option value="No" <?php echo ($set_copos=='No')?'selected=selected':'';?>>No</option>

							<option value="Yes" <?php echo ($set_copos=='Yes')?'selected=selected':'';?>>Si</option>

						</select>

					</div>

					
					 <!-- 

                	///////////////////////////////////////////////////   

                             		Valores Nieve

                	///////////////////////////////////////////////////   

                	-->


					<div class="form-field">

					<h3>Personaliza los copos de nieve</h3>
					<h4>Número de copos de nieve: Entre 1 y 100 </h4>
					<input name="set_flakeCount" type="number" min="1" max="100" style="width: 52px;"value="<?php echo $set_flakeCount;?>">
					<h4>Tamaño mínimo de los copos de nieve: Entre 10 y 30 </h4>
						<input name="set_minSize" type="number"  min="10" max="30" style="width: 52px;" value="<?php echo $set_minSize;?>">
					<h4>Tamaño máximo de los copos de nieve: Entre 20 y 50 </h4>
						<input name="set_maxSize" type="number"  min="20" max="50" style="width: 52px;" value="<?php echo $set_maxSize;?>">
					<h4>Velocidad máxima de los copos de nieve: Entre 1 y 10</h4>
						<input name="set_maxSpeed" type="number"  min="1" max="10" style="width: 52px;" value="<?php echo $set_maxSpeed;?>">

					</div>
                    

                    <!-- 

                	///////////////////////////////////////////////////   

                             		Activar Postal

                	///////////////////////////////////////////////////   

                	-->

                    

                    <div class="form-field">

                    

					<h3>Activar postal de navidad?</h3>


						<select name="set_postal" id="set_postal">

							<option value="No" <?php echo ($set_postal=='No')?'selected=selected':'';?>>No</option>

							<option value="Yes" <?php echo ($set_postal=='Yes')?'selected=selected':'';?>>Si</option>

						</select>

					</div>

                    

                    <!-- 

                	///////////////////////////////////////////////////   

                             		Seleccion Postal

                	///////////////////////////////////////////////////   

                	-->

                    

                    <div class="form-field">





					<h3>Selecciona una magen</h3>

						

                        <input type="radio" name="set_msg" id="set_msg" value="feliznavidad1" <?php echo ($set_msg=='feliznavidad1')?'checked=checked':'';?>> <img style="width:200px; margin-top:10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/images/Navidad-1.jpg'; ?>" /> 

                        <input type="radio" name="set_msg" id="set_msg" value="feliznavidad2" <?php echo ($set_msg=='feliznavidad2')?'checked=checked':'';?>> <img style="width:200px; margin-top:10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/images/Navidad-2.jpg'; ?>" /> 

                        <input type="radio" name="set_msg" id="set_msg" value="feliznavidad3" <?php echo ($set_msg=='feliznavidad3')?'checked=checked':'';?>> <img style="width:200px; margin-top:10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/images/Navidad-3.jpg'; ?>" /> <br />

                        

                        

                        <input type="radio" name="set_msg" id="set_msg" value="feliznavidad4" <?php echo ($set_msg=='feliznavidad4')?'checked=checked':'';?>> <img style="width:200px; margin-top:10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/images/Navidad-4.jpg'; ?>" /> 

                        <input type="radio" name="set_msg" id="set_msg" value="feliznavidad5" <?php echo ($set_msg=='feliznavidad5')?'checked=checked':'';?>> <img style="width:200px; margin-top:10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/images/Navidad-5.jpg'; ?>" /> 

                        <input type="radio" name="set_msg" id="set_msg" value="feliznavidad6" <?php echo ($set_msg=='feliznavidad6')?'checked=checked':'';?>> <img style="width:200px; margin-top:10px;" src="<?php echo plugin_dir_url( __FILE__ ) . '/images/Navidad-6.jpg'; ?>" /> 

                        

                        

                        

					</div>

                    

                    <!-- 

                	///////////////////////////////////////////////////   

                             		Seleccionar posición

                	///////////////////////////////////////////////////   

                	-->

                    

                    <div class="form-field">

                    


					<h3>Selecciona una posición</h3>


						<select name="set_posicion" id="set_posicion">

							<option value="derecha" <?php echo ($set_posicion=='derecha')?'selected=selected':'';?>>Derecha</option>

                            <option value="centro" <?php echo ($set_posicion=='centro')?'selected=selected':'';?>>Centro</option>

                            

							<option value="izquierda" <?php echo ($set_posicion=='izquierda')?'selected=selected':'';?>>Izquierda</option>

						</select>

					</div>

                    

                    

                    <!-- 

                	///////////////////////////////////////////////////   

                             		Subir postal

                	///////////////////////////////////////////////////   

                	-->

                    

                    <div class="form-field">

                    

                    <script>

						jQuery(document).ready(function() {

 

						jQuery('#upload_image_button').click(function() {

						 formfield = jQuery('#set_imagen2').attr('name');

						 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

						 return false;

						});

						 

						window.send_to_editor = function(html) {

						 imgurl = jQuery('img',html).attr('src');

						 jQuery('#set_imagen2').val(imgurl);

						 jQuery('input[type="radio"]').prop('checked' , false);

						 jQuery('#datos').append( "<input id='set_imagen' type='text' size='36' name='set_imagen' value='" + imgurl + "'/>" );

						 tb_remove();

						}

						var check = jQuery('#set_msg').is(":checked");

						if(check){

							jQuery('#set_imagen2').val('');

						}

						});

                    </script>

					

                    


						<h3>Subir una postal</h3>
						<h4>Tamaño recomendado: 540px de ancho y  220px de alto </h4>

                        <input id="set_imagen2" type="text" size="36" name="set_imagen2" value="<?php echo esc_url($set_imagen); ?>"/>

                        <div id="datos" hidden="hidden"></div>

						<input id="upload_image_button" type="button" value="Upload Image" />



					</div>

                    

                    



				</div>

                

				

                <!-- 

                ///////////////////////////////////////////////////   

                             Botón guardar

                ///////////////////////////////////////////////////   

                -->

				



                <div style="margin-top:15px;">



                <input type="submit" name="submit" value="Guardar" class="button" />



                <input type="hidden" name="act" value="save" />

                

                



                </form>



			</div>



		</div>



	</div>  



</div>