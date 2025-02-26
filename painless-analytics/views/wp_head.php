<?php
/*
* wp_head content
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<!-- Painless Analytics Start -->
<script>(function(u,t){
var w=window,d=document,s='script',sc=d.createElement(s),fs=d.getElementsByTagName(s)[0];
w[t]=w[t]||function(){(w[t].q=w[t].q||[]).push(arguments)};
w[t]('t',new Date().getTime());
sc.async=true;sc.src=u;sc.dataset.po=t;
fs.parentNode.insertBefore(sc,fs);
})('<?php echo esc_url($args['api_url']); ?>/t.js','pat');</script>
<!-- End Painless Analytics -->
