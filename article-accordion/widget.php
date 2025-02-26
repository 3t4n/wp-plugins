<div>
	<?php
		$string = '';
		// Get options
		// title
		$title = get_option('aa_widget_title');
		$title = empty($title)?'Article Accordion':$title;
		// Max articles
		$max_articles = get_option('aa_max_articles');
		$max_articles= empty($max_articles)?10:$max_articles;
		$string .= '<h2>'.$title.'</h2>
<div class="articleAccordionContainer"><div class="articleAccordion">';
		$defaultOptions = array(
			'numberpost' => 5,
			'orderby' => 'date'
		);
		$selectedCategories = get_option('aa_displayed_cat');
		if (is_array($selectedCategories)){
			foreach($selectedCategories as $selectedCategory){
				$posts = get_posts(
					array_merge(
						array(
							'category' => $selectedCategory
						),
						$defaultOptions
					)
				);
				/**
				 *	To display the date and author :
				 *	<small>'.date('d/m/Y', strtotime($post->post_date)).' '.__('by', 'articleaccordion').' '.$user->user_nicename.'</small>
				 */
				if ($posts){
					foreach($posts as $post){
						$user = get_userdata($post->post_author);
						$content = $post->post_content;
						preg_match('!<img[^>]*src="([^"]+)".*/>!', $content, $matches);
						$content = preg_replace('!(<[^>]+>)!', '', $content);
						$content = substr($content, 0, 140).'...';
						if (is_array($matches) && count($matches))
							$content = '<div><img src="'.$matches[1].'" style="display:block;float:left;max-height:50px;max-width:20%;" /><div style="float:left;max-width:75%;margin-left:0.5em;">'.$content.'</div><div style="clear:both;"></div></div>';
						$string .= '<h3><a href="'.$post->guid.'"><strong>'.$post->post_title.'</strong><br/>
</a></h3>
	<div><p>'.$content.'</p>
	<p><a href="'.$post->guid.'">'.__('Read more', 'articleaccordion').'</a></p>
</div>';
						if (--$max_articles <= 0)
							break 2;
					}
				}
			}
		}
		echo $string.'</div></div>';
	?>
</div>