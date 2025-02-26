<?php


namespace TDWTFPlugin;


class Author {

	public $name;
	public $first_name;
	public $short_description;
	public $description;
	public $slug;
	public $is_admin;
	public $is_active;
	public $image_url;

	public function __construct( $request_content )
	{
		$this->name = $request_content['Name'];
		$this->first_name = $request_content['FirstName'];
		$this->short_description = $request_content['ShortDescription'];
		$this->description = $request_content['DescriptionHtml'];
		$this->slug = $request_content['Slug'];
		$this->is_admin = $request_content['IsAdmin'];
		$this->is_active = $request_content['IsActive'];
		$this->image_url = $request_content['ImageUrl'];
	}
}