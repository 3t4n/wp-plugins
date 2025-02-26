<?php
	// get datas
	extract( $args );
	$title = apply_filters( 'widget_title', $instance['title'] );
	$cid = isset( $instance['cid'] ) ? $instance['cid'] : 0;
	$orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : 'date';
	$order= isset( $instance['order'] ) ? $instance['order'] : 'DESC';
	$number = isset( $instance['number'] ) ? $instance['number'] : 8;
	$style = isset( $instance['style'] ) ? $instance['style'] : 'default';
	$pic_width = isset( $instance['pic_width'] ) ? $instance['pic_width'] : '100';
	$pic_height = isset( $instance['pic_height'] ) ? $instance['pic_height'] : '100';
	$word_num = isset( $instance['word_num'] ) ? $instance['word_num'] : 0;
	$flash_width = isset( $instance['flash_width'] ) ? $instance['flash_width'] : '100';
	$flash_height = isset( $instance['flash_height'] ) ? $instance['flash_height'] : '100';
	$num = ( 'pic' == $style || 'flash' == $style ) ? -1 : $number;
	
	$r = new WP_Query( array( 'cat' => $cid, 'orderby' => $orderby, 'order' => $order, 'posts_per_page' => $num, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) );
	
	if ( $r->have_posts() ) :
?>
<?php echo $before_widget; ?>
<?php 
if ( $title ) 
	echo $before_title . $title . $after_title; 
if( $style != 'flash' )
	echo '<ul>';

	$n = 1;
	while ($r->have_posts()){ 
		$r->the_post();
		switch( $style ){
			
			// picture template
			case 'pic':
				if( $n > $number ) break;
				$image = $this->tmb();
				if( empty( $image ) ) continue;
				$image = preg_replace( '/width="\d*"/', '', $image );
				$image = preg_replace( '/height="\d*"/', '', $image );
				$image = str_replace( '<img ', '<img style="width:'.$pic_width.';height:'.$pic_height.';max-width:none; max-height:none;" ', $image );
?>    
<li style="float:left; margin:0 10px 10px 0; list-style-type:none; background:none;padding:0;">
<?php if( !empty($image) ): ?><a style="display:block" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php echo $image; ?></a><?php endif; ?>
<?php if( $word_num != 0 ): ?>
<a style="display:block" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) $pic_title = get_the_title(); else $pic_title = get_the_ID(); echo mb_strimwidth( $pic_title, 0, $word_num ); ?></a>
<?php endif; ?>
</li> 
<?php 		$n++; break;
			
			// flash template
			case 'flash':
				if( $n > $number ) break;
				$image = $this->tmb();				
				if( empty( $image ) ) continue;	
				$links[] = get_permalink();
				preg_match( '/src="(.*?)"/', $image, $match );
				$srcs[] = $match[1];
				$titles[] = get_the_title();
				$n++;
			break;
			
			// default template
			default : 
?>
<li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>     
<?php
			break;
		}
	} 
?>
	<?php if( $style == 'pic' ): ?><li style="clear:both; display:block; width:0; height:0; margin:0; padding:0; "></li><?php endif; ?>
    
<?php if(  $style != 'flash'): ?></ul><?php endif; ?>
	
    <?php if( $style == 'flash' ): ?>
    <div class="dx-advanced-widgets-flash">  
		<script language='javascript'> 
			linkarr = new Array();
			picarr = new Array();
			textarr = new Array();
			var swf_width=<?php echo $flash_width; ?>;
			var swf_height=<?php echo $flash_height; ?>;
			//文字颜色|文字位置|文字背景颜色|文字背景透明度|按键文字颜色|按键默认颜色|按键当前颜色|自动播放时间|图片过渡效果|是否显示按钮|打开方式
			var configtg='0xffffff|0|0x3FA61F|5|0xffffff|0xC5DDBC|0x000033|2|3|1|_blank';
			var files = "";
			var links = "";
			var texts = "";
			//这里设置调用标记
			<?php for( $f = 1; $f < $n; $f++ ): ?>
				linkarr[<?php echo $f ?>] = "<?php echo $links[ $f-1 ]; ?>";
				picarr[<?php echo $f; ?>]  = "<?php echo $srcs[ $f-1 ]; ?>";
				textarr[<?php echo $f; ?>] = "<?php echo esc_attr( $titles[ $f-1 ] ); ?>";
			<?php endfor; ?>
			
			 
			for(i=1;i<picarr.length;i++){
				if(files=="") files = picarr[i];
				else files += "|"+picarr[i];
			}
			for(i=1;i<linkarr.length;i++){
				if(links=="") links = linkarr[i];
				else links += "|"+linkarr[i];
			}
			for(i=1;i<textarr.length;i++){
				if(texts=="") texts = textarr[i];
				else texts += "|"+textarr[i];
			}
			document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
			document.write('<param name="movie" value="<?php echo plugins_url( 'flash.swf', __FILE__ ); ?>"><param name="quality" value="high">');
			document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
			document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
			document.write('<embed src="<?php echo plugins_url( 'flash.swf', __FILE__ ); ?>" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
        </script> 
    </div>
	<?php 
		unset( $links );
		unset( $images );
		unset( $titles );
		endif;
		
echo $after_widget;

wp_reset_postdata();
endif;