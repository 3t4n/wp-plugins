<!DOCTYPE html>

<!-- cMaintenanceMode by Krzysztof 'cys_ek' Mehl -->

<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="robots" content="noindex, nofollow"><?php $name = get_bloginfo( 'name' ); $description = get_bloginfo( 'description' ); if( $name || $description ){ ?>

	<meta name="description" content="<?php if( $name ){ echo $name; }if( $name && $description ){ echo ' | '; }if( $description ){ echo $description; } ?>"><?php } ?>

	<title><?php if( $name ){ echo get_bloginfo( 'name' ); }else{ echo 'cMaintenanceMode'; } ?></title>
</head>
<body><?php if( $name || $description ){ ?>
<?php if( $name ){ ?>

	<p style="font-size: 300%; font-weight: bold; text-align: center;"><?php echo get_bloginfo( 'name' ); ?></p><?php } ?>
<?php if( $description ){ ?>

	<p style="text-align: center;"><?php echo get_bloginfo( 'description' ); ?></p><?php } } ?>

	<p style="font-size: 200%; font-weight: bold; text-align: center;"><?php _e( 'Page in Maintenance Mode', 'cMaintenanceMode' ); ?></p>

</body>
</html>