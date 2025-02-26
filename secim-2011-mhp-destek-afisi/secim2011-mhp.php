<?php

/*

Plugin Name: Seçim 2011 MHP Destek Afişi

Plugin URI: http://www.mentalmasturbasyon.com/secim-destek-plugin

Description: MHP'ye 2011 Seçimlerinde Blogunuzdan Destek Olmak için Yan Menünüze Seçim Afişi Asın

Version: 1.0

Author: Meriç 'Megu' Güven

Author URI: http://www.mentalmasturbasyon.com

*/



//Define plugin directories

define( 'WP_2011DESTEK_URL_MHP', WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)) );

define( 'WP_2011DESTEK_DIR_MHP', WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__)) );



function widget_2011destek_mhp($args) {

    extract($args);

?>

        <?php echo $before_widget; ?>

  

		<a href="http://www.mhp.org.tr" target="_blank"><img src="<?php echo WP_2011DESTEK_URL_MHP ?>/img/mhp.jpg" alt="Seçim 2011'de Oyumuz MHP'ye" /></a>

<center><a href="http://www.mentalmasturbasyon.com/secim-destek-plugin"><font size="1px">Seçim 2011 Afişleri</font></a></center>





        <?php echo $after_widget; ?>

<?php

}

register_sidebar_widget('Seçim 2011 MHP Afişi', 'widget_2011destek_mhp');

?>