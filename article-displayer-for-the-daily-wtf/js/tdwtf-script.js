(function($){
	$('#tdwtf-plugin-previous-article').on('click', function(){
		var id = $(this).data('id');

		$.ajax({
			url: ajax.url,
			type: 'POST',
			data: {
				action: 'tdwtf_plugin_get_article_by_id',
				id: id
			},
			success: function(article)
			{
				if(article != null)
				{
					reloadArticle(article);
				}
			}
		});
	});

	$('#tdwtf-plugin-next-article').on('click', function(){
		var id = $(this).data('id');

		$.ajax({
			url: ajax.url,
			type: 'POST',
			data: {
				action: 'tdwtf_plugin_get_article_by_id',
				id: id
			},
			success: function(article)
			{
				if(article != null)
				{
					reloadArticle(article);
				}
			}
		});
	});

	function reloadArticle( article ){

		if(article.previous_article_id != null)
		{
			$('#tdwtf-plugin-previous-article').data( 'id', article.previous_article_id).show();
		}
		else
		{
			$('#tdwtf-plugin-previous-article').hide();
		}

		if(article.next_article_id != null)
		{
			$('#tdwtf-plugin-next-article').data( 'id', article.next_article_id).show();
		}
		else
		{
			$('#tdwtf-plugin-next-article').hide();
		}

		$('.tdwtf-plugin-summary').html( article.summary_html );
		$('.tdwtf-plugin-author').html( article.author.name );
		$('.tdwtf-plugin-article-date').html( article.display_date );
		$('.tdwtf-plugin-article-link').attr( 'href', article.url );

		$('.tdwtf-plugin-title')
			.attr( 'href', article.url)
			.html( article.title );

		$('.tdwtf-plugin-comment-link')
			.attr( 'href', article.comment_url )
			.html( '<span class="dashicons dashicons-admin-comments"></span> ' + article.comment_count );
	}

})(jQuery);