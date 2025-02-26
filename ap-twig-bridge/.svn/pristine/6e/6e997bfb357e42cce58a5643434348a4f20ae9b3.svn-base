<?php

class APBridge_Main {

	protected $pages = array(
		'index',
		'404',
		'archive',
		'author',
		'category',
		'tag',
		'taxonomy',
		'date',
		'home',
		'front_page',
		'page',
		'paged',
		'search',
		'single',
		'attachment',
		'comments_popup'
	);

	protected $pageType = array();

	public function init() {
		$this->addFilters();
	}

	public function getPageType() {
		return $this->pageType;
	}

	public function getQueryTemplate($type, $filename) {
		if ('page' == $type) {
			$id = get_queried_object_id();
			$template = get_post_meta($id, '_wp_page_template', true);
			$subType = basename($template, '.php');
			if ($subType != 'page') {
				$this->pageType[] = $subType;
			}
		}

		$this->pageType[] = $type;

		return $filename;
	}

	protected function addFilters() {

		foreach ($this->pages as $page) {
			add_filter($page . '_template', array($this, 'getQueryTemplate' . $page));
		}

	}

	public function __call($name, $args) {
		if (strpos($name, 'getQueryTemplate') === 0) {
			$start = strlen('getQueryTemplate');
			$len = strlen($name) - $start;
			$type = substr($name, $start, $len);
			$filename = array_shift($args);
			return $this->getQueryTemplate($type, $filename);
		}
	}
}
