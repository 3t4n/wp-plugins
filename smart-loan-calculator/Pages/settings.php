<?php include __DIR__.'/refer-add.php'; ?>

<div id="wppluginbox_smart_investment_calc" style="text-align: center;">Loading...</div>
<script src="<?php echo plugins_url('/../APP/LIB-JS/scripts_embed.js',__FILE__); ?>"></script>
<script type="text/javascript">
	var app_url = "<?php echo plugins_url('/../APP/Admin/index.php',__FILE__); ?>" ;
	var embed = '<style>iframe{width: 100%;min-width: 601px;border:none;}@media only screen and (max-width: 600px) {iframe { display: block; width:100%;min-width:280px; }</style><center><iframe id="wpbox-SLC" src="'+app_url+'" scrolling="no" border="no" onload="iFrameResize()"></iframe></center>';
document.getElementById('wppluginbox_smart_investment_calc').innerHTML = embed;
</script>


