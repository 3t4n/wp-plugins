<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<style type="text/css">
	html,body {
		height: 100%;
		overflow: hidden;
	}
	* {margin:0;padding:0;} 
	iframe#iframe_content {
		border: 0;
		height: 92%;
		width: 100%;
	}
	</style>
	<?php echo $title_tag // include title from template header ?>
	<?php echo $meta_tags // include meta tags from template header ?>
</head>

<body>
<?php if (get_option('playerbarra_op')['posicao'] == 'top'): ?>
	<iframe id="iframe_bar" name="play" frameborder="0" scrolling="no" width='100%' height="<?php echo get_option('playerbarra_op')['altura'] ?>" src="<?php echo get_option('playerbarra_op')['urlplayer'] ?>"></iframe>
<?php endif; ?>

	<iframe id="iframe_content" name="content" frameborder="0" src="<?php echo $content_url ?>" ></iframe>

<?php if (get_option('playerbarra_op')['posicao'] == 'bottom'): ?>
	<iframe id="iframe_bar" name="play" frameborder="0" scrolling="no" width='100%' height="<?php echo get_option('playerbarra_op')['altura'] ?>" src="<?php echo get_option('playerbarra_op')['urlplayer'] ?>"></iframe>
<?php endif; ?>

<script type="text/javascript">
/**
 * Para não dublicar a barra ao navegar entre as paginas
 */
	var audiobar = {
		param: '<?php echo PBW_PAGEINICIAL ?>',
		wpurl: '<?php echo get_bloginfo('wpurl') ?>',	
		height: <?php echo get_option('playerbarra_op')['altura'] ?>,	
		adapt_content_height: function () {
			var play = document.getElementById('iframe_bar'), content = document.getElementById('iframe_content');
			var height = document.documentElement.clientHeight;
			play.style.height = audiobar.height+'px';
			content.style.height = (height - audiobar.height) + 'px';
		},
	}

  if (window != top) {
    window.location.replace(audiobar.wpurl+'?'+audiobar.param);
  }
  
</script>
</body>	
</html>

