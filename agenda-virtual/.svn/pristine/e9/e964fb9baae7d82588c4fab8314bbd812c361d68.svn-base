<?php
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'agenda_virtual';

$sql = "CREATE TABLE $table_name (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    Features VARCHAR(255) NOT NULL,
    Data VARCHAR(255) NOT NULL,
    PRIMARY KEY (ID)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

if (isset($_POST['submit'])) {
  $cor = sanitize_text_field($_POST['cor']);
  $url = sanitize_text_field($_POST['url']);
  $position = sanitize_text_field($_POST['position']);
  $visible = sanitize_text_field($_POST['visible']);

  $nome_result = $wpdb->get_results("SELECT * FROM $table_name WHERE Features = 'Cor'");
  if (count($nome_result) > 0) {
    $wpdb->update($table_name, array('Data' => esc_html($cor)), array('Features' => 'Cor'));
  } else {
    $wpdb->insert($table_name, array('Features' => 'Cor', 'Data' => esc_html($cor)));
  }

  $url_result = $wpdb->get_results("SELECT * FROM $table_name WHERE Features = 'URL'");
  if (count($url_result) > 0) {
    $wpdb->update($table_name, array('Data' => esc_html($url)), array('Features' => 'URL'));
  } else {
    $wpdb->insert($table_name, array('Features' => 'URL', 'Data' => esc_html($url)));
  }

  $position_result = $wpdb->get_results("SELECT * FROM $table_name WHERE Features = 'position'");
  if (count($position_result) > 0) {
    $wpdb->update($table_name, array('Data' => esc_html($position)), array('Features' => 'position'));
  } else {
    $wpdb->insert($table_name, array('Features' => 'position', 'Data' => esc_html($position)));
  }
  $visible_result = $wpdb->get_results("SELECT * FROM $table_name WHERE Features = 'visible'");
  if (count($visible_result) > 0) {
    $wpdb->update($table_name, array('Data' => esc_html($visible)), array('Features' => 'visible'));
  } else {
    $wpdb->insert($table_name, array('Features' => 'visible', 'Data' => esc_html($visible)));
  }
}

// código para buscar os valores armazenados na tabela e preencher os campos correspondentes, caso existam
$nome_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE Features = %s", 'Cor' ) );
$cor = '';
if ( count( $nome_result ) > 0 ) {
    $cor = esc_attr( $nome_result[0]->Data );
}

$url_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE Features = %s", 'URL' ) );
$url = '';
if ( count( $url_result ) > 0 ) {
    $url = esc_attr( $url_result[0]->Data );
}

$position_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE Features = %s", 'position' ) );
$position = 'inferior_direito'; // definindo "inferior_direito" como padrão
if ( count( $position_result ) > 0 ) {
    $position = esc_attr( $position_result[0]->Data );
}

$visible_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE Features = %s", 'visible' ) );
$visible = '';
if ( count( $visible_result ) > 0 ) {
    $visible = esc_attr( $visible_result[0]->Data );
}
?>

<body id="<?php echo esc_attr('kt_body'); ?>" class="<?php echo esc_attr('page-wraper'); ?>">
  <div class="text-center d-flex flex-center flex-column flex-column-fluid pb-lg-20 bg-gray-100 margin-body">
    <div href="https://agendavirtual.net/app" class="m-5">
      <img src="<?php echo esc_url(plugin_dir_url( __FILE__ )) . 'img/Logo_Agenda_Virtual.png'; ?>" alt="<?php echo esc_attr('Logo Agenda Virtual'); ?>" width="200px" height="auto">
    </div>
    <div class="w-lg-600px">
      <div class="container centralizar">
        <div class="row">
          <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
              <div class="card-body">
                <form method="post">
                  <div class="text-center mb-3">
                    <h1 class="text-dark mb-3">Configurar botão</h1>
                    <div class="text-gray-400 fw-bold fs-4 d-sm-block d-grid">Insira as informações abaixo para exibir o botão da Agenda Virtual em seu site.</div>
                  </div>
                  <div class="row">
                    <!-- Nome de usuário -->				
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="mb-3">
                          <label class="form-label fs-6 fw-bolder text-dark required" for="<?php echo esc_attr('url'); ?>">Nome de usuário</label>
                          <input type="text" name="<?php echo esc_attr('url'); ?>" id="<?php echo esc_attr('url'); ?>" class="form-control" value="<?php echo esc_attr($url); ?>" required />
                        </div>
                      </div>
                    </div>
                    <!-- Cor do botão -->				
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="mb-3">
                          <label class="form-label fs-6 fw-bolder text-dark required" for="<?php echo esc_attr('cor'); ?>">Cor do botão</label>
                          <input type="color" name="<?php echo esc_attr('cor'); ?>" id="<?php echo esc_attr('cor'); ?>" class="form-control" value="<?php echo esc_attr($cor); ?>" required />
                        </div>
                      </div>
                    </div>
						
							<!-- Posição -->				
					<div class="col-md-6">
						<div class="form-group">
							<div class="mb-3">
								<label class="form-label fs-6 fw-bolder text-dark required" for="<?php echo esc_attr('position'); ?>">Posição</label></br>
								<select name="<?php echo esc_attr('position'); ?>" required>
									<option value="inferior_direito" <?php selected( $position, 'inferior_direito' ); ?>>Inferior direito</option>
									<option value="inferior_esquerdo" <?php selected( $position, 'inferior_esquerdo' ); ?>>Inferior esquerdo</option>
									<option value="superior_direito" <?php selected( $position, 'superior_direito' ); ?>>Superior direito</option>
									<option value="superior_esquerdo" <?php selected( $position, 'superior_esquerdo' ); ?>>Superior esquerdo</option>
								</select>
							</div>
						</div>
					</div>
				  </div>
					<input type="hidden" name="visible" value="1">
					<div class="text-center">
						<button type="submit" name="submit" id="kt_sign_in_submit" class="btn bg-gradient-primary mt-3 w-100">
							<span class="indicator-label">Salvar</span>
						</button>
					</div>
					<div class="text-center">
						<span class="form-check-label fw-bold text-gray-700 fs-6">
							<a class="link-primary fs-6 fw-bolder mb-1" target="_blank" href="<?php echo esc_url( 'https://agendavirtual.net/app/login' ); ?>">Acessar minha conta</a>
						</span>
					</div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	   </div>
	</div>
  </div>
</body>
