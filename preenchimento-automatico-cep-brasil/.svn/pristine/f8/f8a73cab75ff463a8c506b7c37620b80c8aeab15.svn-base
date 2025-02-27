<?php
$mwp_url_icons = "https://www.mestresdowp.com.br/admin/images/";
$mwp_pages_admin = array(
	'config'=>array('name'=>'Configurações','url'=>''),
	'documentacao'=>array('name'=>'Documentação','url'=>'https://www.mestresdowp.com.br/2021/10/20/plugin-preenchimento-automatico-endereco-cep/'),
	'plugins'=>array('name'=>'Plugins','url'=>'https://www.mestresdowp.com.br/desenvolvimento-de-plugins-wordpress/')
);
?>
<div class='notice notice-success'><p>Sua avaliação é muito importante pra gente, <a href="https://wordpress.org/support/plugin/preenchimento-automatico-cep-brasil/reviews/#new-post" target="blank"><strong>clique aqui para avaliar</strong></a></p></div>
<?php if ( ! is_plugin_active( 'checkout-mestres-wp/checkout-mestres-wp.php' ) ) { ?>
<div class='notice notice-error'><p><strong>Checkout Mestres do WP:</strong> Teste já a versão gratuita do Checkout Mestres WP, <a href="update.php?action=install-plugin&plugin=checkout-mestres-wp&_wpnonce=c2bbda7f10"><strong>clique aqui para instalar</strong></a>.</p></div>
<?php } ?>
<div class="wrap">
<h2></h2>
<div class="mwpbody">
	<div class="mwpbrcolone">
		<div class="mwp-title">
			<img src="<?php echo PACWP_PLUGIN_ADMIN_URL; ?>assets/images/mwp-logotipo.png" width="" />
		</div>
		<div class="mwp-sections">
			<ul>
				<?php $i=0; foreach($mwp_pages_admin as $mwp_pages_key => $mwp_pages_value){ ?>
				<li class="<?php if($i==0){ echo 'mpcw-section-active'; } ?> <?php echo $mwp_pages_key; ?> box_menu">
				<?php if($mwp_pages_value['url']){ ?><a href="<?php echo $mwp_pages_value['url']; ?>" target="blank"><?php }else{ ?><a href="#<?php echo $mwp_pages_key; ?>" class="aba"><?php } ?>
					<h4><?php echo $mwp_pages_value['name']; ?></h4>
					<img src="<?php echo $mwp_url_icons; ?>ico-<?php echo $mwp_pages_key; ?>.png" width="30" />
				</a>
				</li>
				<?php $i++; } ?>
			</ul>
		</div>
	</div>
	<div class="mwpbrcoltwo">
	<?php $i=0; foreach($mwp_pages_admin as $mwp_pages_key => $mwp_pages_value){ ?>
	<div class="<?php echo $mwp_pages_key; ?> <?php if($i==0){ echo 'active'; } ?> box_section" id="<?php echo $mwp_pages_key; ?>"><?php include "html/".$mwp_pages_key.".php"; ?></div>
	<?php $i++; } ?>
	</div>
	<?php include "html/mestres-wp-sidebar.php"; ?>
</div>
</div>