<?php
add_action( 'wp_head', 'hey_init_js', 10 ); // insert javascript

function hey_init_js() {

  $hey_cdp_options = get_option( 'hey_cdp_option_name' ); // Array of All Options
  $hey_key = $hey_cdp_options['hey_key_0']; // hey_key
  $version = $hey_cdp_options['version_1']; // Versión

  ?>
    <script>
      !function(){var a=window.heySDK={};a.included?window.console&&console.error&&console.error("SDK included twice."):(a.tracers={identify:{},track:[]},a.included=!0,a.identify=function(b){a.tracers.identify=b},a.track=function(b,c){a.tracers.track.push([b,c])},a.page=function(){},a.load=function(b,c){a.key=b,a.version=c||"1.0.1";var d=document.createElement("script");d.type="text/javascript",d.async=!0,d.src="https://sdk-js.hey.net.co/heysdk.min.v1.0.1"+(a.version&&"1.0.1"!==a.version?".v"+a.version:"")+".js";var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(d,e)})}();
        heySDK.load('<?php echo esc_js($hey_key) ?>', '<?php echo esc_js($version) ?>');
    </script>
  <?php
}