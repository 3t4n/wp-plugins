<?php

//MY Function 

function advance_news_ticker_value($var,$def){
	$myvar = get_option($var);
	if($myvar){
		return $myvar;
	}
	else{
		return $def;
	}
}

//Shortcode Function Here
	
function advance_news_ticker_shortcodes($atts,$content){
	
	$advance_tickershortcode_attr = shortcode_atts(
		array(
			'title'=>advance_news_ticker_value('tickers_title','Breaking News:'),
			'per_page_item'=>advance_news_ticker_value('per_page_item','5'),
			'post_type'=>advance_news_ticker_value('post_type','post'),
			'title_color'=>advance_news_ticker_value('title_color','#ffffff'),
			'title_bg_color'=>advance_news_ticker_value('title_bg_color','#ff0000'),
			'items_color'=>advance_news_ticker_value('items_color','#000000'),			
			'items_bg_color'=>advance_news_ticker_value('items_bg_color','#ffffff'),
			'items_hover_color'=>advance_news_ticker_value('items_hover_color','#333333'),
			'effect_type'=>advance_news_ticker_value('effect_type','typography'),
			'controls'=>advance_news_ticker_value('controls','block'),
			
		),$atts
	);
	$id=rand();
	extract($advance_tickershortcode_attr);
	ob_start();
	?>
	
	
	
	<div class="bn-breaking-news ant-title<?php echo $id;?>" id="advance_newsticker<?php echo $id;?>">
		<div class="bn-label"><?php echo $title;?></div>
		<div class="bn-news">
			<ul>
			<?php 
				$ticker_query_args = array(
					'post_type' => $post_type,
					'posts_per_page' => $per_page_item,
				);
				$ticker_posts = new WP_Query($ticker_query_args);
				if($ticker_posts->have_posts()): while($ticker_posts->have_posts()): $ticker_posts->the_post();
				?>
				<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
				<?php endwhile;
				else: 
					?>
					<li><a href="">List Item One</a></li>
					<li><a href="">List Item Two</a></li>
					<li><a href="">List Item Three</a></li>
					<li><a href="">List Item Four</a></li>
					<li><a href="">List Item Five</a></li>
					<?php
				endif;
			
			?>
			</ul>
		</div>
		
		
		<?php if($controls == 'on'): ?>
		<div class="bn-controls">
			<button><span class="bn-arrow bn-prev"></span></button>
			<button><span class="bn-action"></span></button>
			<button><span class="bn-arrow bn-next"></span></button>
		</div>
		<?php else: ?>
		
		<?php endif; ?>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('#advance_newsticker<?php echo $id;?>').breakingNews({
				effect: '<?php echo $effect_type;?>',
			});
			
		});
	</script>
	
	<style type="text/css">
		.bn-breaking-news {
			background-color: <?php echo $items_bg_color;?>;
			border: 1px solid <?php echo $title_bg_color;?>;
		}
		.bn-label {
			background-color: <?php echo $title_bg_color;?>;
			color: <?php echo $title_color;?>;
		}
		.bn-news ul li a {
		  color: <?php echo $items_color;?>;
		  background-color: <?php echo $items_bg_color;?>
		}
		.bn-news ul li a:hover{
			 color: <?php echo $items_hover_color;?> !important;
		}
		.bn-news ul li a:hover{
			color: <?php echo $items_bg_color;?>
		}
	</style>
	
	<?php 
	wp_reset_query();
	return ob_get_clean();
	
	
}
add_shortcode('advance_newsticker_shortcode','advance_news_ticker_shortcodes');

