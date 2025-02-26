<?php
/**
 * Plugin Name: Corsi
 * Plugin URI: http://www.matteotestoni.it
 * Description: Corsi, Courses per wordpress
 * Version: 1.2.0
 * Author: RSW Studio
 * Author URI: http://www.matteotestoni.it
 * License: GPL2
 */
 
  defined('ABSPATH') or die("No script kiddies please!");
	define( 'corsi_Version', '1.2.0' );
	define( 'corsi_Directory', dirname( plugin_basename( __FILE__ ) ) );
	define( 'corsi_Path', plugin_dir_path( __FILE__ ) );
	define( 'corsi_URL', plugin_dir_url( __FILE__ ) );

  include 'corsi_metabox.php';
  include 'corsi_pluginaggiuntivi.php';
  //include 'corsi_opzioni.php';
  include 'corsi_tassonomie.php';
  include 'corsi_widget.php';
  include 'corsi_shortcode.php';
  
  load_plugin_textdomain('corsi', false, basename( dirname( __FILE__ ) ) . '/lang' );

	function corsi_print(){
		//echo rwmb_meta('corsi_arredato');
	}
	
	function corsi_init() {
	  $labels = array(
	    'name' => 'Corsi',
	    'singular_name' => 'Corsi',
	    'add_new' => 'Aggiungi Ccorso',
	    'add_new_item' => 'Aggiungi corso',
	    'edit_item' => 'Modifica',
	    'new_item' => 'Nuovo corso',
	    'all_items' => 'Tutti i corsi',
	    'view_item' => 'Vedi la pagina',
	    'search_items' => 'Cerca',
	    'not_found' =>  'Nessun corso trovato',
	    'not_found_in_trash' => 'Nessun corso trovato nel cestino', 
	    'parent_item_colon' => '',
	    'menu_name' => 'Corsi'
	  );
	
	  $args = array(
	    'labels' => $labels,
	    'public' => true, //se è visibile nel pannello admin
	    'publicly_queryable' => true,
	    'show_ui' => true, //should we display an admin panel for this custom post type
	    'show_in_menu' => true, 
	    'query_var' => true,
			'menu_icon' => 'dashicons-awards', //parte dalla cartella dove si trova function
			'rewrite' => array( 'slug' => 'corsi' ), //modifica il permalink con il nome della sezione (es: servizi) //'rewrite' => true,  // 
	    'capability_type' => 'post', //wordpress deve sapere come comportarsi per leggere, editare e cancellare il post - a livello di permessi
	    'has_archive' => true, 
	    'hierarchical' => false, //gerarchico come le pagine
	    'menu_position' => null, //oppure un numero
	    'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail','page-attributes','custom-fields' ) // quali item sono supportati ed inseriti nella pagina add/edit del pannello wp-admin - 'editor', 'author', 'comments' 
	  ); 
	  register_post_type( 'corsi', $args );
	}
	
	function corsi_updated_messages( $messages ) {
		$post             = get_post();
		$post_type        = get_post_type( $post );
		$post_type_object = get_post_type_object( $post_type );
		$messages['corsi'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Corso aggiornato.', 'corsi' ),
			2  => __( 'Custom field updated.', 'corsi' ),
			3  => __( 'Custom field deleted.', 'corsi' ),
			4  => __( 'Corso aggiornato.', 'corsi' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Corso ripristinato alla revisione %s', 'corsi' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Corso pubblicato.', 'corsi' ),
			7  => __( 'Corso salvato.', 'corsi' ),
			8  => __( 'Corso inviato.', 'corsi' ),
			9  => sprintf(
				__( 'Corso schedulato per: <strong>%1$s</strong>.', 'corsi' ),
				date_i18n( __( 'M j, Y @ G:i', 'corsi' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Bozza corso aggiornata.', 'corsi' )
		);
	
		if ( $post_type_object->publicly_queryable ) {
			$permalink = get_permalink( $post->ID );
			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'Visualizza corso', 'corsi' ) );
			$messages[ $post_type ][1] .= $view_link;
			$messages[ $post_type ][6] .= $view_link;
			$messages[ $post_type ][9] .= $view_link;
	
			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Anteprima corso', 'corsi' ) );
			$messages[ $post_type ][8]  .= $preview_link;
			$messages[ $post_type ][10] .= $preview_link;
		}
		return $messages;
	}
	
	function corsi_add_help_text( $contextual_help, $screen_id, $screen ) {
	  if ( 'corsi' == $screen->id ) {
	    $contextual_help =
	      '<p>' . __('Cose da ricordare in modifica di un corso:', 'corsi') . '</p>' .
	      '<ul>' .
	      '<li>' . __('Specifica dettagliatamente in che categorie può essere inserito.', 'corsi') . '</li>' .
	      '<li>' . __('Speicifica nel titolo la tipologia.', 'corsi') . '</li>' .
	      '</ul>' .
	      '<p>' . __('Se vuoi schedulare che un annuncio sia pubblicato nel futuro:', 'corsi') . '</p>' .
	      '<ul>' .
	      '<li>' . __('Sotto il modulo di Pubblica, fare clic sul link Modifica accanto a Pubblica.', 'corsi') . '</li>' .
	      '<li>' . __('Modificare la data di pubblicazione con una data nel futuro, quindi fare clic su Ok.', 'corsi') . '</li>' .
	      '</ul>' .
	      '<p><strong>' . __('Per maggiori informazioni:', 'corsi') . '</strong></p>' .
	      '<p>' . __('http://www.gestionalesoftware.com/prodotti/worpress/plugin-case-history-per-wordpress/', 'corsi') . '</p>';
	  } elseif ( 'edit-casehistory' == $screen->id ) {
	    $contextual_help =
	      '<p>' . __('Elenco corsi inseriti con dettaglio di categoria e visualizzazioni.', 'corsi') . '</p>' ;
	  }
	  return $contextual_help;
	}
	
	function corsi_aggiungiattributialcontenuto($content){
    
		$corso_listagalleria=rwmb_meta('corsi_galleria', 'type=image' );
		if (count($corso_listagalleria)>1){
			$corso_galleria="<ul class=\"clearing-thumbs\" data-clearing>";
			foreach ( $corso_listagalleria as $image ){
				$corso_galleria.="<li><a href='{$image['full_url']}' title='{$image['title']}'><img src='{$image['url']}' class=\"th\" data-caption='{$image['title']}' alt='{$image['title']}' /></a></li>\n";
			}
			$corso_galleria.="</ul>";
		}else{
			$corso_galleria="";
		}

		$corso_listaallegati=rwmb_meta('corsi_allegati','type=file');
		if (count($corso_listaallegati)>1){
	    $corso_allegati="<ul class=\"inline-list\">";
			foreach ( $corso_listaallegati as $allegato ){
			  $corso_allegati.="<li><a href='{$allegato['url']}' title='{$allegato['title']}' role='button' target='_blank'><i class=\"fa fa-file-pdf-o fa-lg fa-fw\" style=\"color:#CF1312\"></i>{$allegato['title']}</a><li>";
			}
			$corso_allegati.="</ul>";
		}else{
			$corso_allegati="";
		}

		$corso_tabellacaratteristiche="<table cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">";
		$corso_tabellacaratteristiche.="</table>";
		
		$content.=" ".$corso_galleria.$corso_allegati.$corso_tabellacaratteristiche;
		return $content;
	}

	add_action('init', 'corsi_init' );
	add_action('contextual_help', 'corsi_add_help_text', 10, 3 );		
	add_filter('post_updated_messages', 'corsi_updated_messages' );
 	
	//add_filter('the_content', 'corsi_aggiungiattributialcontenuto');
