<?php
/*
Plugin Name: Anonima&ccedil;&atilde;o CTDO
Plugin URI: http://anonimacao.ctdo.com.br/manual.php?id=7
Description: Adiciona Sistema de Auto Anonima&ccedil;&atilde;o
Version: 1.2
Author: Dilneiss
Author URI: http://anonimacao.ctdo.com.br
*/
class anonimacaoctdo
{
	var $wp_option_name = 'anonimacaoctdo';
	var $rodape;

	function anonimacaoctdo()
	{
		// Manage form POSTs
		if ($_POST['anonimacaoctdo_update'])
			$this->update_wpdb($_POST);

		if(!get_option($this->wp_option_name))
		{
			add_option($this->wp_option_name, '');
			$this->rodape = '<!-- Inicio :: Auto Anonimacao CTDO -->
<script src="http://anonimacao.ctdo.com.br/js/auto_anonimacao.js" type="text/javascript"></script>

<script type="text/javascript"><!--
links_protegidos = "";

auto_anonimacao();
//--></script>
<!-- Fim :: Auto Anonimacao CTDO -->';
		}
		else
		{
			$this->rodape = stripslashes(get_option($this->wp_option_name));
		}

		$this->add_hooks();
	}

	function update_wpdb($data)
	{
		global $wpdb;

		$str = $data[$this->wp_option_name];

		if (get_option($this->wp_option_name) != $str)
			update_option($this->wp_option_name, $str);
	}

	function add_hooks()
	{
		// Add Admin Menu
		add_action('admin_menu', array(&$this, 'admin_menu'));
		// Adds the rodape
		add_action('get_footer', array(&$this, 'get_rodape'));
	}

	function get_rodape()
	{
		_e($this->rodape);
	}

	// Manage Admin Options
	function admin_menu()
	{
		// Add admin page to the Presentation Tab of the admin section
		add_options_page('Anonima&ccedil;&atilde;o CTDO', 'Anonima&ccedil;&atilde;o CTDO', 8, basename(__FILE__), array(&$this, 'admin_page'));
	}

	// Admin page
	function admin_page()
	{
		if ($_POST['anonimacaoctdo_update'])
			_e('<div id="message" class="updated fade"><p>Auto Anonima&ccedil;&atilde;o atualizado</p></div>');

		//show styles
		_e('
			<style type="text/css">
				.fp_text_area
				{
					width: 700px;
					height: 350px;
				}

				form#anonimacaoctdo_options label
				{
					font-weight: bold;
				}
			</style>
		');

		//show form
		_e('
			<form id="anonimacaoctdo_options" method="post">
				<input type="hidden" name="anonimacaoctdo_update" id="anonimacaoctdo_update" value="anonimacaoctdo_update" />
				<div class="wrap">
					<h2>C&oacute;digo: </h2>Se voc&ecirc; for utilizador, apenas subistitua todo o c&oacute;digo abaixo pelo seu c&oacute;digo personalizado.
					<p>
						<textarea name="anonimacaoctdo" id="anonimacaoctdo" cols="40" rows="5" class="code fp_text_area">'.$this->rodape.'</textarea>
					</p>
					<p><input type="submit" value="Salvar"></p>
				</div>
			</form>
		');
	} // end function admin_page
} // end class

// Instantiate anonimacaoctdo class
$dbd_anon = new anonimacaoctdo();

?>