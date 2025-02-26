<?php
/**
 * rcwdNggauthorsAdmin - Admin Section for NextGEN Gallery Authors
 * 
 * @package NextGEN Gallery Authors
 * @author Roberto Cantarano
 * @copyright 2011
 * @since 0.1
 */
class rcwdNggauthorsAdmin{
	function rcwdNggAuthorsAdmin(){
		global $rcwdNggauthors, $pagenow;
		$this->nggauthors_options = $rcwdNggauthors->nggauthors_options;
		add_action("admin_menu", array(&$this, "admin_menu"));
		add_action('admin_print_styles', array(&$this, 'load_styles') ); 
	}

	function admin_menu(){
		add_menu_page("NextGEN Gallery Authors", "NGG Authors", 'NextGEN Authors change options', 'nggauthors', array($this, "plugin_options"), 'div');
	}	

	function load_styles(){
		wp_enqueue_style( 'nggauthorsmenu', RCWDNGGAUTHORS_URLPATH.'authors/admin/css/style.css', array() );
	}
	
	function plugin_options(){
		switch ($_GET['page']){
			case 'nggauthors':	
				require_once(dirname(__FILE__).'/pages/options/class-options.php');
				$this->class_nggauthors_options = new rcwdNggauthorsAdminOptions();
		}
	}	

	function get_output($template){
		ob_start();
		include_once($template);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
		
	function rshow_message($message){
		echo '<div class="wrap"><div class="updated" id="message"><p>'.$message.'</p></div></div>'."\n";
	}

}
?>