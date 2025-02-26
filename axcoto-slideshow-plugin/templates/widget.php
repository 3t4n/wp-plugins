<div class="wtitle">

<?php if (!empty($options['title'])):?>
	<h2><?php print($options['title'])?></h2>
	<div class="hl"></div>
<?php endif?>

<?php 
$rnd = rand(0, time());
$name = 'so_' . $rnd;
$mymovie = 'mymovie_' . $rnd; 
?>	
	
<div id="flashcontent_<?php echo $rnd?>">
	<script type="text/javascript">
			var <?php echo $name?>  = new SWFObject("<?php echo $dir_xml?>/mySlideShowImages/banner.swf", "<?php echo $mymovie?>", "<?php echo $this->_slideshows['attbs']['bannerWidth']?>", "<?php echo $this->_slideshows['attbs']['bannerHeight']?>", "8");
			<?php echo $name?>.addParam("menu", "false");
			<?php echo $name?>.addVariable("xmlPath", "<?php echo $dir_xml?>/galleries/<?php echo $options['galleryFile']?>?<?php echo time()?>");
			<?php echo $name?>.write("flashcontent_<?php echo $rnd?>");
	</script>
</div>

</div>	

