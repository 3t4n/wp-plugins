		<div class="mwpsectiontitle">
			<h3>
			<div class="mpwsectiontitleico"><img src="<?php echo $mwp_url_icons; ?>ico-config.png" width="30" /></div>
			<strong>CEP Automático</strong>
			</h3>
			<form method="post" action="options.php" name="mwp-status-plugin" id="mwp-status-plugin" class="mwpbrcolone">
			<?php wp_nonce_field('update-options') ?>
				<?php if(get_option('pacwp_active')){ ?>
				   <input type="hidden" name="pacwp_active" value="" />
				   <input type="image" src="<?php echo PACWP_PLUGIN_ADMIN_URL; ?>assets/images/mwp-ico-on.png" width="40" alt="" />
				<?php }else{ ?>
					<input type="image" src="<?php echo PACWP_PLUGIN_ADMIN_URL; ?>assets/images/mwp-ico-off.png" width="40" alt="" />
					<input type="hidden" name="pacwp_active" value="S" />
				<?php } ?>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="pacwp_active" />
			</form>
		</div>
		<div class="mwpsectioncontent">
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
			<h3>Campo do CEP</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_cep" placeholder="campo_cep" size="45" value="<?php echo esc_html(get_option('pacepbr_class_cep')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input CEP.</strong></p>
			</div>
			<h3>Campo do Logradouro</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_logradouro" placeholder="campo_logradouro" size="45" value="<?php echo esc_html(get_option('pacepbr_class_logradouro')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input Logradouro.</strong></p>
			</div>
			<h3>Campo do Número</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_numero" placeholder="campo_numero" size="45" value="<?php echo esc_html(get_option('pacepbr_class_numero')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input Número.</strong></p>
			</div>
			<h3>Campo do Complemento</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_complemento" placeholder="campo_complemento" size="45" value="<?php echo esc_html(get_option('pacepbr_class_complemento')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input Complemento.</strong></p>
			</div>
			<h3>Campo do Bairro</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_bairro" placeholder="campo_bairro" size="45" value="<?php echo esc_html(get_option('pacepbr_class_bairro')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input Bairro.</strong></p>
			</div>
			<h3>Campo da Cidade</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_cidade" placeholder="campo_cidade" size="45" value="<?php echo esc_html(get_option('pacepbr_class_cidade')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input Cidade.</strong></p>
			</div>
			<h3>Campo do Estado</h3>
			<div class="mwp-box">
            <p class="col col-1-2">
                <input type="text" name="pacepbr_class_estado" placeholder="campo_estado" size="45" value="<?php echo esc_html(get_option('pacepbr_class_estado')); ?>" />
            </p>
			<p class="col col-2-2 texto"><strong>Preencha o campo informando o atributo ID do input Estado.</strong></p>
			</div>
			<input type="submit" name="Submit" class="mwpbuttonupdatesection" value="Atualizar" />
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="pacepbr_class_cep,pacepbr_class_logradouro,pacepbr_class_numero,pacepbr_class_complemento,pacepbr_class_bairro,pacepbr_class_cidade,pacepbr_class_estado" />
        </form>
		<?php include "mestres-wp-copyright.php"; ?>
		</div>