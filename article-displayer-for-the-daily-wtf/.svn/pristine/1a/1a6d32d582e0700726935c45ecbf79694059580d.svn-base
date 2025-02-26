<?php


namespace TDWTFPlugin;


class Article {

	static $base_url = 'http://thedailywtf.com/api';

	public $id;
	public $author;
	public $summary_html;
	public $body_html;
	public $title;
	public $display_date;
	public $series;
	public $url;
	public $previous_article_id;
	public $next_article_id;
	public $comment_count;
	public $comment_url;

	public function __construct($request_content)
	{
		$this->id = $request_content['Id'];
		$this->author = new Author($request_content['Author']);
		$this->summary_html = $request_content['SummaryHtml'];
		$this->body_html = $request_content['BodyHtml'];
		$this->title = $request_content['Title'];
		$this->display_date = $request_content['DisplayDate'];
		$this->series = $request_content['Series'];
		$this->url = $request_content['Url'];
		$this->previous_article_id = $request_content['PreviousArticleId'];
		$this->next_article_id = $request_content['NextArticleId'];
		$this->comment_count = $request_content['CachedCommentCount'];
		$this->comment_url = $request_content['CommentsUrl'];
	}

	public static function getRandomArticle()
	{
		$result = wp_remote_post( self::$base_url . '/articles/random/' );

		if($result['response']['code'] == 200)
		{
			return new Article(json_decode($result['body'], true));
		}

		return null;
	}

	public static function getMostRecentArticle()
	{
		$result = wp_remote_get( self::$base_url . '/articles/recent/1' );

		if($result['response']['code'] == 200)
		{
			return new Article(json_decode($result['body'], true)[0]);
		}

		return null;
	}

	public static function getArticleById( $id )
	{
		if( is_numeric($id) && $id > 0 )
		{
			$result = wp_remote_get( self::$base_url . '/articles/id/' . $id );

			if($result['response']['code'] == 200)
			{
				return new Article(json_decode($result['body'], true));
			}
		}

		return null;
	}
}