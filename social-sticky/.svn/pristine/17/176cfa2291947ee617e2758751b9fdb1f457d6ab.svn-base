<?php
// Call init value to get correct value for Left or Right
include 'ss-box-init.php' ;
?>

<div class=" <?=$ss_div_effect_class?>" style="width:<?=$ss_svg?>px; height:<?=$ss_svg?>px" >
	<svg width="<?=$ss_svg?>" height="<?=$ss_svg?>">
		<defs>
			<clipPath id="ss-imgTriangle-clipPath">
			  <rect x="<?=$ss_logo_x-$ss_logo_w/2?>" y="<?=$ss_logo_y-$ss_logo_h/2?>" rx="4" ry="4" width="<?=$ss_logo_w?>" height="<?=$ss_logo_h?>"></rect>
			</clipPath>
			<linearGradient id="ss_grad_Triangle" x1="<?=$ss_grad_TriangleCorner_x1?>" y1="<?=$ss_grad_TriangleCorner_y1?>" x2="<?=$ss_grad_TriangleCorner_x2?>" y2="<?=$ss_grad_TriangleCorner_y2?>">
				<stop offset="0%" style="stop-color:<?=$border_color?>;stop-opacity:1"></stop>
				<stop offset="100%" style="stop-color:<?=$center_color?>;stop-opacity:1"></stop>
			</linearGradient>
		</defs>
	
		<path id="<?=$ss_arc_id?>" d="<?=$ss_triangleCorner_path_d?>" style="stroke: #c3c3c3; stroke-width:1;" fill="url(#ss_grad_Triangle)"/>

		<g id=<?=$ss_animation_id?> transform="rotate(<?=-$ss_logo_rotate_value?> <?=$ss_arc_cx?> <?=$ss_arc_cy?>)">
			<image id="<?=$ss_logo_id?>" x="<?=$ss_logo_x-$ss_logo_w/2?>" y="<?=$ss_logo_y-$ss_logo_h/2?>" width="<?=$ss_logo_w?>" height="<?=$ss_logo_h?>" xlink:href="<?=$img_url?>" style="clip-path: url(#ss-imgTriangle-clipPath);" transform="rotate(<?=$ss_logo_rotate_value?> <?=$ss_logo_x?> <?=$ss_logo_y?>)"/>
		</g>
	</svg>
</div>

<script>    
	startEffect( <?=$ss_animation_index?>, "<?=$ss_animation_id?>", <?=$ss_animation_min?>, <?=$ss_animation_max?> );
</script>
