<?php echo '<?xml version="1.0"?>';?> 
<Banner 
<?php foreach ($this->_slideshows['attbs'] as $key=>$value):?>
	<?php echo $key?>="<?php echo $value?>"
<?php endforeach?> 
>

<?php foreach ($this->_slideshows['item'] as $item) : ?>	
	<item image="<?php echo $item['image']?>" 
		link="<?php echo str_replace('&', '&amp;', $item['link'])?>"
		target="<?php echo $item['target']?>"
		textBlend="<?php echo $item['textBlend']?>"><![CDATA[<?php echo $item['data']?> 
	]]></item>
<?php endforeach ?>	
</Banner>