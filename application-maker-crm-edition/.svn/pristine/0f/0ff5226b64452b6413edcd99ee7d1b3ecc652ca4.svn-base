<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div style = 'margin: 0 auto;'>
<?php
       // var_dump($resual_post);
foreach($resual_post as $post){
?>
<div>
    <h5 >
        <?php echo $post['title'] ?>
    </h5>
	<div class="jcarroussel_slider">
		<ul>
	<?php
		foreach($post['diagrams_upload'] as $tmp){
			echo "<li><div ><img src='$tmp'  height='$img_height' /></div></li>";//$img_width
		}
	?>
		</ul>
	</div>
	<div class="tips_description" >
		<?php

                echo wpautop($post['tips_description']) ?>
	</div>
</div>
<?php
}
?>
<style>
.jcarroussel_slider{
	float:left;
       /* background:red;
	width: 350px !important;*/
}
.jcarroussel_slider li img{
	background-color: #fff;
        width:auto;
	/*width: <?php echo $img_width ?>px;*/
	height: <?php echo $img_height ?>px;
	margin: 10px;
}
.tips_description{
	display: inline-table;
}
</style>
<script type="text/javascript">
	$(".jcarroussel_slider").css('width',($(".jcarroussel_slider").parent().width()-10));
        $(".jcarroussel_slider li div").css('width',($(".jcarroussel_slider").parent().width()-10)/2);
	$(".jcarroussel_slider").jCarouselLite({
		auto: 800,
		visible: 2,
		speed: 1000
	});
</script>
</div>
