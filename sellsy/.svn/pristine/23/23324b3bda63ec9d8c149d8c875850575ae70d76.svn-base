<?php
if (!defined('SELLSY_VERSION')) exit('No direct script access allowed');
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div id="framework_wrap" class="wrap">

	<div id="header">
	    <h1><?php esc_html_e('Manual', PLUGIN_NOM_LANG); ?></h1>
	    <h2><a href='https://welcome.sellsy.com?utm_source=wordpress_sellsy&utm_medium=plugin&utm_campaign=plugin' target="_blank">sellsy.com</a></h2>
	    <div class="version">
                <?php esc_html_e('Version', PLUGIN_NOM_LANG); ?> <?php echo SELLSY_VERSION; ?>
	    </div>
	</div>
  
  <div id="content_wrap">
  
    <div id="content">
      <div id="options_tabs" class="docs">

        <ul class="options_tabs">
          <li><a href="#general1"><?php esc_html_e('Ticket', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#general2"><?php esc_html_e('Contact', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#general3"><?php esc_html_e('reCaptcha', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#general4"><?php esc_html_e('Clearbit', PLUGIN_NOM_LANG); ?></a></li>
        </ul>
        
        <hr>
        
        <section id="general1">
          <h2><?php esc_html_e('Ticket', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <pre><code><strong>[ticketSellsy id=1]</strong></code></pre>
            <?php esc_html_e('Add support ticket form on Wordpress, for create a support ticket to Sellsy.', PLUGIN_NOM_LANG); ?>
          </p>
          <h3><?php esc_html_e('Examples', PLUGIN_NOM_LANG); ?> :</h3>
          <p>
            <strong><?php esc_html_e('Display the form', PLUGIN_NOM_LANG); ?></strong>
            <br>[ticketSellsy id=1]
            <br>[ticketSellsy id=2]
            <br>[ticketSellsy id=3]
          </p>
        </section><!-- general1 -->
         
        <hr>

        <section id="general2">
          <h2><?php esc_html_e('Contact', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <pre><code><strong>[contactSellsy id=1]</strong></code></pre>
            <?php esc_html_e('Add contact form on Wordpress, for create a prospect to Sellsy.', PLUGIN_NOM_LANG); ?><br>
            <?php echo esc_html(__('Email sent with', PLUGIN_NOM_LANG)).' '.esc_html(get_option( 'admin_email' )).' '.esc_html(__('(Settings > General)', PLUGIN_NOM_LANG)); ?>
          </p>
          <p>
            <?php
            echo '<u>'.esc_html(__('Default setting', PLUGIN_NOM_LANG)).' : </u><br>
            - '.esc_html(__('Prospect', PLUGIN_NOM_LANG)).'<br>
            - '.esc_html(__('Deadline (days):', PLUGIN_NOM_LANG)).' '.SELLSY_DEADLINE.'<br>
            - '.esc_html(__('Name: website', PLUGIN_NOM_LANG)).'<br>
            - '.esc_html(__('Probability (%):', PLUGIN_NOM_LANG)).' '.SELLSY_PROBABILITY.'<br>
            - '.esc_html(__('Tag: wordpress', PLUGIN_NOM_LANG)).'<br>
            ';
            ?>
          </p>
          <h3><?php esc_html_e('Examples', PLUGIN_NOM_LANG); ?> :</h3>
          <p>
            <strong><?php esc_html_e('Display the form', PLUGIN_NOM_LANG); ?></strong>
            <br>[contactSellsy id=1]
            <br>[contactSellsy id=2]
            <br>[contactSellsy id=3]
          </p>
        </section><!-- general2 -->

        <hr>

        <section id="general3">
          <h2><?php esc_html_e('reCaptcha', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <?php esc_html_e('Create access', PLUGIN_NOM_LANG); ?> :
            <a href="https://www.google.com/recaptcha/admin" target="_blank">https://www.google.com/recaptcha/admin</a>
            <br>

            <?php esc_html_e('Information about captcha', PLUGIN_NOM_LANG); ?> :
            <a href="https://fr.wikipedia.org/wiki/ReCAPTCHA" target="_blank">https://fr.wikipedia.org/wiki/ReCAPTCHA</a>
          </p>
        </section><!-- general3 -->

        <hr>

        <section id="general4">
          <h2><?php esc_html_e('Clearbit', PLUGIN_NOM_LANG); ?></h2>
          <p>
              <?php esc_html_e('Token secret', PLUGIN_NOM_LANG); ?> :
              <a href="https://dashboard.clearbit.com/api" target="_blank">https://dashboard.clearbit.com/api</a><br>
              Ex : sk_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
          </p>
          <small>
              (<?php esc_html_e('Need account type :', PLUGIN_NOM_LANG); ?> <a href="https://dashboard.clearbit.com/plans" target="_blank">Enrichment API</a>)
          </small>
        </section><!-- general4 -->

        <br class="clear" />
      </div><!-- options_tabs -->
    </div><!-- content -->
    <!--<div class="info bottom"></div>-->   
  </div><!-- content_wrap -->

</div><!-- framework_wrap -->
<!-- [END] framework_wrap -->