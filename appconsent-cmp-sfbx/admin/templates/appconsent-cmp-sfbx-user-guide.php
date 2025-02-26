<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to show the User Guide tab content.
 *
 * @link       https://sfbx.io/
 * @since      1.0.0
 *
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/admin/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div class="sfbx-content">
	<p><?php printf( '%s <a target="_blank" href="https://app.appconsent.io/#/register">%s</a>', esc_html__( "First you need to create an account here:","appconsent-cmp-sfbx" ), esc_html__( "https://app.appconsent.io/#/register","appconsent-cmp-sfbx" )  ); ?><br>
		<?php printf( '%s <a target="_blank" href="https://docs.sfbx.io/configuration/create-a-notice/">%s</a>', esc_html__( "Once you are logged into your account, you will need to create a source and a 'notice'. You can follow the instructions here:","appconsent-cmp-sfbx" ), esc_html__( 'https://docs.sfbx.io/configuration/create-a-notice/',"appconsent-cmp-sfbx" )  ); ?>
	</p>
	<p><?php esc_html_e( "Once your notice is created, get the appKey and go to the &ldquo;Plugin Settings&rdquo; tab of this plugin.", "appconsent-cmp-sfbx" ); ?><br>
		<?php esc_html_e( "Paste your appKey in the field &ldquo;AppKey&rdquo;.", "appconsent-cmp-sfbx" ); ?><br>
		<?php esc_html_e( "You can leave the default options or adapt them to your needs:", "appconsent-cmp-sfbx" ); ?>
	</p>
	<p>
		<?php printf( '<strong>%s</strong> %s<br>%s', esc_html__( "Target Countries:","appconsent-cmp-sfbx" ), esc_html__( 'Leave blank to let the CMP display only for countries applying GDPR.',"appconsent-cmp-sfbx" ), esc_html__( 'You can also specify the countries where you want the CMP to be displayed. In this case, use ( we use short two letter country codes : EN, SP, FR ... )',"appconsent-cmp-sfbx" )  ); ?>
	</p>
	<p>
		<?php printf( '<strong>%s</strong> %s', esc_html__( "Force GDPR:","appconsent-cmp-sfbx" ), esc_html__( 'If this option is checked, the CMP will be displayed regardless of the country of your visitor.',"appconsent-cmp-sfbx" ) ); ?>
	</p>
	<p>
		<?php printf( '<strong>%s</strong> %s', esc_html__( "Enable Privacy Widget:","appconsent-cmp-sfbx" ), esc_html__( 'The GDPR requires the user to be able to change his choices easily. If you check this option, we will display a floating widget that you can control with the following options: Privacy Widget Position, Privacy Widget Color and Privacy Widget Label.',"appconsent-cmp-sfbx" ) ); ?>
	</p>
	<p>
		<?php printf( '<strong>%s</strong> %s<br>%s<br>%s', esc_html__( "CMP Template UX:","appconsent-cmp-sfbx" ), esc_html__( 'We have two types of templates: Classic and Clear. You can choose the one that best fits your site, but we recommend using the Clear template. It gives better results in terms of consent rate and has been designed to meet the need of user experience.',"appconsent-cmp-sfbx" ), esc_html__( "It also implements most of the WCAG 2.X standards.","appconsent-cmp-sfbx" ), esc_html__( "( You can check on mobile, they are really nice and clean )","appconsent-cmp-sfbx" ) ); ?>
	</p>
	<p>
		<?php printf( '<strong>%s</strong> %s', esc_html__( "Debug mode:","appconsent-cmp-sfbx" ), esc_html__( 'If you are an advanced user, you can activate this mode. Information will be sent to the console of your browser. Sometimes, in case of support ticket, our team can ask you to activate it. ',"appconsent-cmp-sfbx" ) ); ?>
	</p>
</div>