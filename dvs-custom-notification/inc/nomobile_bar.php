<?php /* This script is to prevent widget from showing on mobile browser since they don't support CSS fixed position*/
{
?>
<script type="text/javascript">if (screen.width <= 800) {
document.write ("<style type='text/css' media='screen'>#DVS_cnote_env,#cnote_open{visibility:hidden;display:none}</style>");}</script>
<noscript><style type="text/css"media="screen">#DVS_cnote_env,#cnote_open{visibility:hidden;display:none}</style><div style="text-align:center;">Our notification can not show properly, JavaScript is disabled.</div></noscript>
<?php
}
?>