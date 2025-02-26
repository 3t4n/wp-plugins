<?php
/*
 * @link       http://www.girltm.com
 * @since      1.0.0
 * @package    APOYL_CHATGPT
 * @subpackage APOYL_CHATGPT/public/partials
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
$file=apoyl_chatgpt_file("show");
if($file){
	include $file;
}else{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo esc_attr($arr['title']); ?></title>
<meta name="description" content="" />
<link href="<?php echo esc_url(APOYL_CHATGPT_URL.'public/css/public.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="apoyl_chatgpt_header"><?php echo esc_attr($arr['title']); ?></div>
	<div class="apoyl_chatgpt_all">
		<div class="apoyl_chatgpt_words" id="apoyl_chatgpt_words">
			<div class="apoyl_chatgpt_humanaotuman">
				<span><?php _e('human','apoyl-chatgpt'); ?><?php echo esc_attr($arr['answer']); ?></span>
			</div>
			<div class="apoyl_chatgpt_ai">
				<span><?php _e('ainame','apoyl-chatgpt'); ?><?php echo esc_attr($arr['reply']); ?></span>
			</div>
	
		</div>
		<div class="apoyl_chatgpt_input">
			<input type="text" class="apoyl_chatgpt_word" id="apoyl_chatgpt_word"
				name="apoyl_chatgpt_word" placeholder="<?php _e('button_desc','apoyl-chatgpt'); ?>"> <input type="button"
				value="<?php _e('button','apoyl-chatgpt'); ?>" class="apoyl_chatgpt_sub" id="apoyl_chatgpt_sub" onclick="javascript:alert('<?php _e('alertcalldev_desc','apoyl-chatgpt'); ?>')">
		</div>
	</div>
</body>
</html>
<?php 
}
?>