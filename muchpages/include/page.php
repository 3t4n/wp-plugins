<?php if( get_post_meta( get_the_ID(), 'muchpages-access-id', true) ) { ?>
<?php $get_muchpages_id = get_post_meta( get_the_ID(), 'muchpages-access-id', true ); ?>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="theme-color" content="#000000">
<?php wp_head(); ?>
</head>
<body>
<?php if( get_post_meta( get_the_ID(), 'muchpages-access-id', true) ) { ?>
<iframe src='https://canvas.muchpages.com/web/<?php echo $get_muchpages_id; ?>?published' style='border:0;position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%'>
<?php } else { ?>
<iframe src='https://canvas.muchpages.com/plugin-error' style='border:0;position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%'>
<?php } ?>
</body>
</html>