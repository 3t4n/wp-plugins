<?php
/*
Plugin Name: Entradas filtradas por campo personalizado
Plugin URI: 
Description: Permite mostrar las entradas (mediante imagenes destacadas) utilizando como filtro en un campo personalizado.
Author: Daniel Casabona Gomez
Version: 1.0
Author URI: http://casabona.tk/
*/


class ordenentra extends WP_Widget {
 
    /** constructor */
    function ordenentra() {
        parent::WP_Widget(false, $name = 'Entradas filtradas por campo personalizado');
    }
 
    function widget($args, $instance) {
	
        extract( $args );
        global $wpdb;
 	    $entradas = $instance['entradas'];
		$campo= $instance['campo'];
		$lim_i= $instance['lim_i'];
		$lim_s= $instance['lim_s'];
		$titulo= $instance['titulo'];


        
	if($campo=="" || $lim_i=="" || $lim_s==""){
	?>
	<div id="ordena_error">Es necesario configurar el plugin. Accede a la sección Widgets y completa los campos.</div>
	<?php
	return false;
	}	
	else {	
	  echo $args['before_widget'];
	echo '
	<div id="ordena_fotos">'; ?>
	
	<?php if($titulo!=""){
	echo ('<div id="ordena_titulo"><h2>'.$titulo.'</h2></div>');
	}
	else{}
			echo '<ul class="ordena_lista_ul">';?>
 
						 <?php 
						 
						 $argu = array(
							'posts_per_page' => $entradas,
							'order' => 'DESC',
							'meta_query' => array(
								array(
									'key' => $campo,
									'value' => array( $lim_i,  $lim_s ),
									'type' => 'numeric',
									'compare' => 'BETWEEN'
								)
							)
						);?>
						<?php  $the_query = new WP_Query( $argu ); ?>
						
						<?php if( $the_query->have_posts() ): ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li class="ordena_lista_li">
									<a  href=" <?php the_permalink(); ?>" title="<?php the_title(); ?> "> <?php the_post_thumbnail( '', array('class' => 'ordena_elemento')); ?></a>
								</li>
							<?php endwhile; ?>

						<?php endif; ?>
						 
						<?php wp_reset_query(); ?>
			
			<?php
			echo '<div class="clear"></div>
			
			</ul>
	</div>';
   echo $args['after_widget'];
   }
    }
 
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['entradas'] = strip_tags($new_instance['entradas']);
		$instance['campo'] = strip_tags($new_instance['campo']);
		$instance['lim_i'] = strip_tags($new_instance['lim_i']);
		$instance['lim_s'] = strip_tags($new_instance['lim_s']);
		$instance['titulo'] = strip_tags($new_instance['titulo']);
        return $instance;
    }
 
    function form($instance) {
 
        $entradas = esc_attr($instance['entradas']);
		$campo= esc_attr($instance['campo']);
		$lim_i= esc_attr($instance['lim_i']);
		$lim_s= esc_attr($instance['lim_s']);
		$titulo= esc_attr($instance['titulo']);
        ?>
        
		
		<p>
          <label for="<?php echo $this->get_field_id('titulo'); ?>"><?php _e('Título:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('titulo'); ?>" name="<?php echo $this->get_field_name('titulo'); ?>" type="text" value="<?php echo $titulo; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('campo'); ?>"><?php _e('Nombre del campo personalizado:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('campo'); ?>" name="<?php echo $this->get_field_name('campo'); ?>" type="text" value="<?php echo $campo; ?>" />
        </p>

		<p>
          <label for="<?php echo $this->get_field_id('entradas'); ?>"><?php _e('Max. número de entradas:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('entradas'); ?>" name="<?php echo $this->get_field_name('entradas'); ?>" type="text" value="<?php echo $entradas; ?>" />
        </p>
				
		<p>
          <label for="<?php echo $this->get_field_id('lim_i'); ?>"><?php _e('Límite inferior:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('lim_i'); ?>" name="<?php echo $this->get_field_name('lim_i'); ?>" type="text" value="<?php echo $lim_i; ?>" />
        </p>
		
		<p>
          <label for="<?php echo $this->get_field_id('lim_s'); ?>"><?php _e('Límite superior:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('lim_s'); ?>" name="<?php echo $this->get_field_name('lim_s'); ?>" type="text" value="<?php echo $lim_s; ?>" />
        </p>
		
        <?php
    }
 
}

function mi_estilo() {
    wp_register_style( 'prefix-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

add_action('widgets_init', create_function('', 'return register_widget("ordenentra");'));
add_action( 'wp_enqueue_scripts', 'mi_estilo' ); 
?>