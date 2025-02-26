<link rel="stylesheet" media="all" href="<?php echo plugins_url( 'css/adc_aviso_cookies.css', __FILE__ ); ?>">  
    <div class="wrap">  
        <img src="<?php echo plugins_url( 'images/logotipo-amplifica.png', __FILE__ ); ?>" 
             alt="Logotipo amplifica" 
             width="335" 
             height="87" >
        <h1><?php _e('Configuración plugin Aviso de cookies'); ?></h1> 
        <p><?php _e('Para terminar de instalar este plugin, añada el siguiente código en su tema, justo antes de la etiqueta <code>&lt;body&gt;</code>. Por ejemplo:');?></p>
        <code>
        &lt;footer&gt;<br/>
          &lt;?php if( function_exists('adc_aviso_cookies_action') ) adc_aviso_cookies_action(); ?><br/>
        &lt;/footer&gt;
        </code> 
           <hr class="hr-style"/>
        <form method="POST" action="options.php">
            <?php
                settings_fields( 'adc-aviso-cookies-content-settings-group' );
                do_settings_sections( 'adc-aviso-cookies-content-settings-group' );
            ?>   
            <div class="main-titles">
              <p><?php _e('Contenido'); ?></p>
            </div>
            <!-- Texto del aviso -->
            <div class="titles">
              <p><?php _e('Texto del aviso');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Introduzca aquí el texto que desea que aparezca en el aviso para sus visitantes.');?></p>
            </div> 
            <textarea rows="1" cols="160" 
                      name="adc_aviso_cookies_text_value" 
                      id="adc_aviso_cookies_text_value"><?php echo get_option( 'adc_aviso_cookies_text_value' );?></textarea>
            <br/><br/> 
            <!-- URL del enlace para leer más -->
            <div class="titles">
              <p><?php _e('Url del enlace "Leer más"');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Introduzca la URL que desea para enlazar "Leer más".');?></p>
            </div> 
            <input type="text"
                   id="adc_aviso_cookies_url_readmore_value"
                   name="adc_aviso_cookies_url_readmore_value"
                   value="<?php echo get_option('adc_aviso_cookies_url_readmore_value');?>"  
                   size="80" >
            <br/><br/>
            <!-- Texto del boton para aceptar las cookies -->
            <div class="titles">
              <p><?php _e('Texto del botón');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Introduzca el texto que desea que aparezca en el boton.<br/>Por ejemplo, coloque "Acepto" para que el visitante acepte el aviso de cookies.');?></p>
            </div> 
            <input type="text"
                   id="adc_aviso_cookies_text_button_value"
                   name="adc_aviso_cookies_text_button_value"
                   value="<?php echo get_option('adc_aviso_cookies_text_button_value');?>" 
                   maxlength="10" 
                   size="10" 
                   placeholder="Ejem. Aceptar">
            <br/><br/> 
            <!-- Texto del enlace para leer más -->
            <div class="titles">
              <p><?php _e('Texto del enlace "Leer más"');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Introduzca el texto que desea que aparezca en el enlace de "Leer más".');?></p>
            </div> 
            <input type="text"
                   id="adc_aviso_cookies_text_readmore_value"
                   name="adc_aviso_cookies_text_readmore_value"
                   value="<?php echo get_option('adc_aviso_cookies_text_readmore_value');?>" 
                   maxlength="25" 
                   size="25" 
                   placeholder="Ejem. Leer más">
            <br/><br/>  
            <!-- Tamaño de la fuente -->
            <div class="titles">
              <p><?php _e('Tamaño de la fuente de texto');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Introduzca el tamaño en pixels de la fuente.');?></p>
            </div> 
            <input type="number"
                   id="adc_aviso_cookies_text_size_value"
                   name="adc_aviso_cookies_text_size_value"
                   value="<?php echo get_option('adc_aviso_cookies_text_size_value');?>" 
                   maxlength="10" 
                   size="3" 
                   placeholder="12"
                   style="width:40px;">px
            <br/><br/>  
            <hr class="hr-style"/> 
            <div class="main-titles">
              <p><?php _e('Apariencia');?></p>
            </div>
            <!-- Color de fondo -->
            <div class="titles">
              <p><?php _e('Color de fondo');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Seleccione un color para el color de fondo en el aviso.');?></p>
            </div> 
            <input type="color" 
                   id="adc_aviso_cookies_color_value"
                   name="adc_aviso_cookies_color_value"
                   value="<?php echo get_option('adc_aviso_cookies_color_value');?>"/>    
            <br/><br/> 
            <!-- Color del texto -->
            <div class="titles">
              <p><?php _e('Color de texto');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Seleccione un color para el texto del aviso.');?></p>
            </div> 
            <input type="color" 
                   id="adc_aviso_cookies_color_text_value"
                   name="adc_aviso_cookies_color_text_value"
                   value="<?php echo get_option('adc_aviso_cookies_color_text_value');?>"/>     
            <br/><br/> 
            <!-- Color del texto en el boton -->
            <div class="titles">
              <p><?php _e('Color del texto en el botón');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Seleccione un color del texto en el botón.');?></p>
            </div> 
            <input type="color" 
                   id="adc_aviso_cookies_color_text_button_color_value"
                   name="adc_aviso_cookies_color_text_button_color_value"
                   value="<?php echo get_option('adc_aviso_cookies_color_text_button_color_value');?>"/>     
            <br/><br/> 
            <!-- Color del fondo en el boton -->
            <div class="titles">
              <p><?php _e('Color del fondo en el botón');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Seleccione un color para el fondo del botón.');?></p>
            </div> 
            <input type="color" 
                   id="adc_aviso_cookies_color_background_button_color_value"
                   name="adc_aviso_cookies_color_background_button_color_value"
                   value="<?php echo get_option('adc_aviso_cookies_color_background_button_color_value');?>"/>     
            <br/><br/> 
            <!-- Color del enlace "Leer más" -->
            <div class="titles">
              <p><?php _e('Color del enlace "Leer más"');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Seleccione un color para el color del enlace "Leer más".');?></p>
            </div> 
            <input type="color" 
                   id="adc_aviso_cookies_color_text_readmore_value"
                   name="adc_aviso_cookies_color_text_readmore_value"
                   value="<?php echo get_option('adc_aviso_cookies_color_text_readmore_value');?>"/>     
            <br/><br/> 
            <!-- Altura del borde superior del aviso -->
            <div class="titles">
              <p><?php _e('Borde superior');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Introduzca en pixels un alto para el borde del aviso.');?></p>
            </div>  
            <input type="number"
                   id="adc_aviso_cookies_height_border_value"
                   name="adc_aviso_cookies_height_border_value"
                   maxlength="2" 
                   size="2"
                   value="<?php echo get_option('adc_aviso_cookies_height_border_value');?>" />
            <br/><br/> 
            <!-- Color del borde superior del aviso -->
            <div class="titles">
              <p><?php _e('Color de borde superior');?></p>
            </div> 
            <div class="sub-titles">
              <p><?php _e('Seleccione un color para el borde del aviso.');?></p>
            </div> 
            <input type="color" 
                   id="adc_aviso_cookies_color_border_value"
                   name="adc_aviso_cookies_color_border_value"
                   value="<?php echo get_option('adc_aviso_cookies_color_border_value');?>"/>    
            <?php submit_button(); ?>    
        </form>
    </div>