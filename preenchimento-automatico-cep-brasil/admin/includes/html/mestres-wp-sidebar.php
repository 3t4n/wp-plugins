<div class="mwpbrcolthree">
	<div class="mwpwidtgetartigos">
	<h3>Artigos</h3>
	<?php
	$cwmp_artigos_url = 'https://www.mestresdowp.com.br/checkout/artigos.php';
	$cwmp_artigos_xml = simplexml_load_file($cwmp_artigos_url);
	echo "<ul class='cwmp_artigos'>";
	foreach ($cwmp_artigos_xml->artigo as $cwmp_artigo) {
		echo "<li>
		<h4>".utf8_decode($cwmp_artigo->titulo)."</h4>
		<a href='".$cwmp_artigo->url."' target='blank'>Leia mais</a>
		</li>";
	}
	echo "</ul>";
	?>
	</div>
	<div class="mwpwidtgetbanner">
	<?php
	$cwmp_banners_url = 'https://www.mestresdowp.com.br/checkout/banners.xml';
	$cwmp_banner_xml = simplexml_load_file($cwmp_banners_url);

	foreach ($cwmp_banner_xml->banner as $cwmp_banner) {
		echo "<a href='".$cwmp_banner->url."' target='blank'><img src='".utf8_decode($cwmp_banner->imagem)."' width='100%' /></a>";
	}
	?>
	</div>
</div>