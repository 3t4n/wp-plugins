<?php /** @var \TDWTFPlugin\Article $article */ ?>

<section class="tdwtf-plugin-wrapper">
	<h3 class="tdwtf-plugin-header">
		<a href="<?php echo $article->url; ?>" class="tdwtf-plugin-title"><?php echo $article->title; ?></a>
		<a href="<?php echo $article->comment_url ?>" class="tdwtf-plugin-comment-link">
			<span class="dashicons dashicons-admin-comments"></span> <?php echo $article->comment_count; ?>
		</a>
	</h3>
	<div class="tdwtf-plugin-summary-wrapper">
		<div class="tdwtf-plugin-summary">
			<?php echo $article->summary_html; ?>
		</div>
		<div class="tdwtf-plugin-summary-footer">
			<a id="tdwtf-plugin-previous-article"
				<?php if($article->previous_article_id != NULL){ ?>
					data-id="<?php echo $article->previous_article_id; ?>"
				<?php }else{ ?>
					style="display: none;"
				<?php } ?>>
				<span class="dashicons dashicons-arrow-left-alt2"></span>
			</a>

			<a href="<?php echo $article->url; ?>" target="_blank" class="tdwtf-plugin-article-link">Read More</a>

			<a id="tdwtf-plugin-next-article"
				<?php if($article->next_article_id != NULL){ ?>
					data-id="<?php echo $article->next_article_id; ?>"
				<?php }else{ ?>
					style="display: none;"
				<?php } ?>>
				<span class="dashicons dashicons-arrow-right-alt2"></span>
			</a>
		</div>
	</div>
	<div class="tdwtf-plugin-footer">
		<span class="tdwtf-plugin-author-wrapper">
			by <span class="tdwtf-plugin-author"><?php echo $article->author->name; ?></span>
		</span>
		<span class="tdwtf-plugin-article-date">
			<?php echo $article->display_date; ?>
		</span>
	</div>
</section>
