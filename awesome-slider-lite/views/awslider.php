<?php
$rid = rand(11111, 99999);
?>
<script>
    jQuery(document).ready(function() {
        jQuery("#awesomeslider<?php echo $rid; ?>").aweslider('<?php echo $sliderid; ?>', '<?php echo $rid; ?>');
    });
</script>
<div id="awesomeslider<?php echo $rid; ?>" class="awesomeslider">
    <div class="aw_bgcontainer" id="aw_bgcontainer<?php echo $rid; ?>">
        <div class="awelements"></div>
        <div class="awesomebg"></div>
        <div class="awloader"></div>
    </div>
    <div class="awnav awleftarrow aw_hidden"><span>Left</span></div>
    <div class="awnav awrightarrow aw_hidden"><span>Right</span></div>
    <div class="awnav awpaging aw_hidden"></div>
    <div class="awnav awprogressbar aw_hidden"><div class="awprogress"></div></div>
    <div class="awcacheimages" id="awcacheimages<?php echo $rid; ?>"></div>
</div>