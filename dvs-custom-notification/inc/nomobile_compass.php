<?php /* This script is to prevent widget from showing on mobile browser since they don't support CSS fixed position*/
{
?>
<script type="text/javascript">if (screen.width <= 800) {
document.write ("<style type='text/css' media='screen'>#DVS_cnote_2,#cnote_open_2{visibility:hidden;display:none}</style>");}</script>
<noscript><div style="text-align:center;font-weight:bold">Please Activate Your JavaScript!</div></noscript>
<?php }?>