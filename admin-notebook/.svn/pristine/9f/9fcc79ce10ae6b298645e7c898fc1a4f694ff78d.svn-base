<?php
/*
Plugin Name: Admin Notebook
Description: Admin Notebook is simply allow wordpress site admin to add notes.
Version: 2.1
Author: Maulik Panchal
License: GPLv3
*/

add_action ( 'admin_head', "anwp_AdminNotebook" , "1" );
add_action ( 'wp_head', "anwp_AdminNotebook" , "1" );
add_action( 'wp_enqueue_scripts', 'anwp_NotebookEnqueueScripts' );
add_action( 'admin_init', 'anwp_NotebookEnqueueScripts' );
add_action( 'wp_ajax_notebook_action', 'anwp_NotebookAction' );
add_action( 'wp_ajax_nopriv_notebook_action', 'anwp_NotebookAction' );

function anwp_AdminNotebook(){
	if ( ! is_admin() ) {
		$view_flag = "1";
	}
	else {
	    $view_flag = "1";
	}
	if($view_flag == 1){
		anwpNotebook();
	}
}

function anwp_NotebookEnqueueScripts() {
	wp_enqueue_script( 'notebook_script', plugins_url( 'js/notebook_script.js', __FILE__ ), array('jquery'), '1.0', true );
	wp_enqueue_style( 'notebook_style', plugins_url( 'css/notebook_style.css', __FILE__ ) );
	wp_localize_script( 'notebook_script', 'script_url',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

function anwpNotebook(){
	?>
	<div id="notebook">
	  <div id="notebookheader">Click here to move</div>
	  <textarea name="notebook_entry" id="notebook_entry" class="notebook_entry" onchange="update_notebook();" ><?php echo get_option( 'notebook_entry_'.get_current_user_id(), "Write Something here..."); ?></textarea>
	</div>
	<?php
}

function anwp_NotebookAction(){
	$anwpNotebookEntry = esc_js(sanitize_text_field($_POST["notebook_entry"]));
	update_option( 'notebook_entry_'.get_current_user_id(), $anwpNotebookEntry );
	exit();
}
?>