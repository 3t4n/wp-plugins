<?php

add_action( 'wp_ajax_pacepbr_ajax', 'pacepbr_ajax' );
add_action( 'wp_ajax_nopriv_pacepbr_ajax', 'pacepbr_ajax' );
function pacepbr_ajax(){
$endereco = wp_remote_get("https://viacep.com.br/ws/".$_POST['cep']."/json/", array('headers' => array('Content-Type' => 'application/json')));
echo wp_kses_post(wp_remote_retrieve_body($endereco));
die();
}


add_action('wp_footer', 'pacepbr_js',100);
function pacepbr_js(){
echo '
<style type="text/css">
.select2-container {display:none !important;}
</style>
<script type="text/javascript">
jQuery(document).ready(function($) {
if($("#'.esc_html(get_option('pacepbr_class_cep')).'").val()){
$("#'.esc_html(get_option('pacepbr_class_logradouro')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_numero')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_numero')).'").focus();
$("#'.esc_html(get_option('pacepbr_class_complemento')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_bairro')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_cidade')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_estado')).'_field").show();
}else{
$("#'.esc_html(get_option('pacepbr_class_logradouro')).'_field").hide();
$("#'.esc_html(get_option('pacepbr_class_numero')).'_field").hide();
$("#'.esc_html(get_option('pacepbr_class_complemento')).'_field").hide();
$("#'.esc_html(get_option('pacepbr_class_bairro')).'_field").hide();
$("#'.esc_html(get_option('pacepbr_class_cidade')).'_field").hide();
$("#'.esc_html(get_option('pacepbr_class_estado')).'_field").hide();
}

function pacepbr_limpa_formulário_cep() {
$("#'.esc_html(get_option('pacepbr_class_logradouro')).'").val("");
$("#'.esc_html(get_option('pacepbr_class_cidade')).'").val("");
$("#'.esc_html(get_option('pacepbr_class_estado')).'").val("");
}
$("#'.esc_html(get_option('pacepbr_class_cep')).'").on("blur",function(){
var cep = $(this).val().replace(/\D/g, \'\');
if (cep != "") {
var validacep = /^[0-9]{8}$/;
if(validacep.test(cep)) {
$("#'.esc_html(get_option('pacepbr_class_logradouro')).'").val("...");
$("#'.esc_html(get_option('pacepbr_class_bairro')).'").val("...");
$("#'.esc_html(get_option('pacepbr_class_cidade')).'").val("...");
$("#'.esc_html(get_option('pacepbr_class_estado')).'").val("...");

$.ajax({
type: "POST",
url: "'.admin_url( 'admin-ajax.php' ).'",
data: { "action": "pacepbr_ajax", "cep": $(this).val() },
dataType:"text",
success: function(dados) {
var objeto = JSON.parse(dados);
$("#'.esc_html(get_option('pacepbr_class_logradouro')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_numero')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_complemento')).'").focus();
$("#'.esc_html(get_option('pacepbr_class_complemento')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_bairro')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_cidade')).'_field").show();
$("#'.esc_html(get_option('pacepbr_class_estado')).'_field").show();

$("#'.esc_html(get_option('pacepbr_class_logradouro')).'").val(objeto.logradouro);
$("#'.esc_html(get_option('pacepbr_class_bairro')).'").val(objeto.bairro);
$("#'.esc_html(get_option('pacepbr_class_cidade')).'").val(objeto.localidade);
$("#'.esc_html(get_option('pacepbr_class_estado')).'").val(objeto.uf).change();
}
});
}
}else{
pacepbr_limpa_formulário_cep();
}
});
});
</script>
';
}