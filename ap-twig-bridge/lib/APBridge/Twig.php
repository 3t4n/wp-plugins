<?php

class APBridge_Twig {

	protected $twig;
	protected $loop;
	protected $templateDir;

	public function __construct() {
		$this->initTwig();
	}

	protected function initTwig() {
		$this->templateDir = get_stylesheet_directory() . '/Twig';

		$loader = new Twig_Loader_Filesystem($this->templateDir);

		$cachePath = WP_CONTENT_DIR . '/Twig';
		if (!is_dir($cachePath) && ! mkdir(WP_CONTENT_DIR . '/Twig', 755)) {
			$cachePath = false;
		}

		$this->twig = new Twig_Environment($loader, array(
			'cache' => $cachePath,
		));

		/* create iterator for loops */
		$this->loop = new APBridge_WhileIterator(
			function() { return have_posts(); },
			function() { the_post(); return true; }
		);

		$this->getTwig()->addExtension(new APBridge_TwigExtension());
	}

	public function getTwig() {
		return $this->twig;
	}

	public function render(array $pageTypes) {
		while($pageType = array_shift($pageTypes)) {
			$fileName = $this->templateDir . '/' . $pageType . '.html.twig';
			if (file_exists($fileName)) {
				break;
			}
		}

		if (empty($pageType)) {
			$pageType = 'index';
		}

		return $this->getTwig()->render($pageType . '.html.twig', array('loop' => $this->loop));
	}
}