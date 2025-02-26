<?php
class templatesGdprsup extends moduleGdprsup {
    protected $_styles = array();
	private $_cdnUrl = '';

	public function __construct($d) {
		parent::__construct($d);
		$this->getCdnUrl();	// Init CDN URL
	}
	public function getCdnUrl() {
		if(empty($this->_cdnUrl)) {
			if((int) frameGdprsup::_()->getModule('options')->get('use_local_cdn')) {
				$uploadsDir = wp_upload_dir( null, false );
				$this->_cdnUrl = $uploadsDir['baseurl']. '/'. GDPRSUP_CODE. '/';
				if(uriGdprsup::isHttps()) {
					$this->_cdnUrl = str_replace('http://', 'https://', $this->_cdnUrl);
				}
				dispatcherGdprsup::addFilter('externalCdnUrl', array($this, 'modifyExternalToLocalCdn'));
			} else {
				$this->_cdnUrl = (uriGdprsup::isHttps() ? 'https' : 'http'). '://supsystic-42d7.kxcdn.com/';
			}
		}
		return $this->_cdnUrl;
	}
	public function modifyExternalToLocalCdn( $url ) {
		$url = str_replace(
			array('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css'),
			array($this->_cdnUrl. 'lib/font-awesome'),
			$url);
		return $url;
	}
    public function init() {
        if (is_admin()) {
			if($isAdminPlugOptsPage = frameGdprsup::_()->isAdminPlugOptsPage()) {
				$this->loadCoreJs();
				$this->loadAdminCoreJs();
				$this->loadCoreCss();
				$this->loadChosenSelects();

        frameGdprsup::_()->addStyle('gdprsupAcPromoStyle', GDPRSUP_CSS_PATH. 'acPromoStyle.css');

				frameGdprsup::_()->addScript('adminOptionsGdprsup', GDPRSUP_JS_PATH. 'admin.options.js', array(), false, true);
				add_action('admin_enqueue_scripts', array($this, 'loadMediaScripts'));
				add_action('init', array($this, 'connectAdditionalAdminAssets'));
			}
			// Some common styles - that need to be on all admin pages - be careful with them
			frameGdprsup::_()->addStyle('supsystic-for-all-admin-'. GDPRSUP_CODE, GDPRSUP_CSS_PATH. 'supsystic-for-all-admin.css');
		}
        parent::init();
    }
	public function connectAdditionalAdminAssets() {
		if(is_rtl()) {
			frameGdprsup::_()->addStyle('styleGdprsup-rtl', GDPRSUP_CSS_PATH. 'style-rtl.css');
		}
	}
	public function loadMediaScripts() {
		if(function_exists('wp_enqueue_media')) {
			wp_enqueue_media();
		}
	}
	public function loadAdminCoreJs() {
		frameGdprsup::_()->addScript('jquery-ui-dialog');
		frameGdprsup::_()->addScript('jquery-ui-slider');
		frameGdprsup::_()->addScript('wp-color-picker');
		frameGdprsup::_()->addScript('icheck', GDPRSUP_JS_PATH. 'icheck.min.js');
		$this->loadTooltipster();
	}
	public function loadCoreJs() {
		static $loaded = false;
		if(!$loaded) {
			frameGdprsup::_()->addScript('jquery');
			$suf = GDPRSUP_MINIFY_ASSETS ? '.min' : '';
			frameGdprsup::_()->addScript('commonGdprsup', GDPRSUP_JS_PATH. 'common'. $suf. '.js');
			frameGdprsup::_()->addScript('coreGdprsup', GDPRSUP_JS_PATH. 'core'. $suf. '.js');

			$ajaxurl = admin_url('admin-ajax.php');
			$jsData = array(
				'siteUrl'					=> GDPRSUP_SITE_URL,
				'imgPath'					=> GDPRSUP_IMG_PATH,
				'cssPath'					=> GDPRSUP_CSS_PATH,
				'loader'					=> GDPRSUP_LOADER_IMG,
				'close'						=> GDPRSUP_IMG_PATH. 'cross.gif',
				'ajaxurl'					=> $ajaxurl,
				'options'					=> frameGdprsup::_()->getModule('options')->getAllowedPublicOptions(),
				'GDPRSUP_CODE'					=> GDPRSUP_CODE,
				//'ball_loader'				=> GDPRSUP_IMG_PATH. 'ajax-loader-ball.gif',
				//'ok_icon'					=> GDPRSUP_IMG_PATH. 'ok-icon.png',
				'jsPath'					=> GDPRSUP_JS_PATH,
			);
			/*if(is_admin()) {
				$jsData['isPro'] = frameGdprsup::_()->getModule('supsystic_promo')->isPro();
				$jsData['mainLink'] = frameGdprsup::_()->getModule('supsystic_promo')->getMainLink();
			}*/
			$jsData = dispatcherGdprsup::applyFilters('jsInitVariables', $jsData);
			frameGdprsup::_()->addJSVar('coreGdprsup', 'GDPRSUP_DATA', $jsData);
			$loaded = true;
		}
	}
	public function loadTooltipster() {
		frameGdprsup::_()->addScript('tooltipster', $this->_cdnUrl. 'lib/tooltipster/jquery.tooltipster.min.js');
		frameGdprsup::_()->addStyle('tooltipster', $this->_cdnUrl. 'lib/tooltipster/tooltipster.css');
	}
	public function loadSlimscroll() {
		frameGdprsup::_()->addScript('jquery.slimscroll', $this->_cdnUrl. 'js/jquery.slimscroll.js');
	}
	public function loadCodemirror() {
		frameGdprsup::_()->addStyle('ppsCodemirror', $this->_cdnUrl. 'lib/codemirror/codemirror.css');
		frameGdprsup::_()->addStyle('codemirror-addon-hint', $this->_cdnUrl. 'lib/codemirror/addon/hint/show-hint.css');
		frameGdprsup::_()->addScript('ppsCodemirror', $this->_cdnUrl. 'lib/codemirror/codemirror.js');
		frameGdprsup::_()->addScript('codemirror-addon-show-hint', $this->_cdnUrl. 'lib/codemirror/addon/hint/show-hint.js');
		frameGdprsup::_()->addScript('codemirror-addon-xml-hint', $this->_cdnUrl. 'lib/codemirror/addon/hint/xml-hint.js');
		frameGdprsup::_()->addScript('codemirror-addon-html-hint', $this->_cdnUrl. 'lib/codemirror/addon/hint/html-hint.js');
		frameGdprsup::_()->addScript('codemirror-mode-xml', $this->_cdnUrl. 'lib/codemirror/mode/xml/xml.js');
		frameGdprsup::_()->addScript('codemirror-mode-javascript', $this->_cdnUrl. 'lib/codemirror/mode/javascript/javascript.js');
		frameGdprsup::_()->addScript('codemirror-mode-css', $this->_cdnUrl. 'lib/codemirror/mode/css/css.js');
		frameGdprsup::_()->addScript('codemirror-mode-htmlmixed', $this->_cdnUrl. 'lib/codemirror/mode/htmlmixed/htmlmixed.js');
	}
	public function loadCoreCss() {
		$this->_styles = array(
			'styleGdprsup'			=> array('path' => GDPRSUP_CSS_PATH. 'style.css', 'for' => 'admin'),
			'supsystic-uiGdprsup'	=> array('path' => GDPRSUP_CSS_PATH. 'supsystic-ui.css', 'for' => 'admin'),
			'dashicons'			=> array('for' => 'admin'),
			'bootstrap-alerts'	=> array('path' => GDPRSUP_CSS_PATH. 'bootstrap-alerts.css', 'for' => 'admin'),
			'icheck'			=> array('path' => GDPRSUP_CSS_PATH. 'jquery.icheck.css', 'for' => 'admin'),
			//'uniform'			=> array('path' => GDPRSUP_CSS_PATH. 'uniform.default.css', 'for' => 'admin'),
			'wp-color-picker'	=> array('for' => 'admin'),
		);
		foreach($this->_styles as $s => $sInfo) {
			if(!empty($sInfo['path'])) {
				frameGdprsup::_()->addStyle($s, $sInfo['path']);
			} else {
				frameGdprsup::_()->addStyle($s);
			}
		}
		$this->loadFontAwesome();
	}
	public function loadJqueryUi() {
		static $loaded = false;
		if(!$loaded) {
			frameGdprsup::_()->addStyle('jquery-ui', GDPRSUP_CSS_PATH. 'jquery-ui.min.css');
			frameGdprsup::_()->addStyle('jquery-ui.structure', GDPRSUP_CSS_PATH. 'jquery-ui.structure.min.css');
			frameGdprsup::_()->addStyle('jquery-ui.theme', GDPRSUP_CSS_PATH. 'jquery-ui.theme.min.css');
			frameGdprsup::_()->addStyle('jquery-slider', GDPRSUP_CSS_PATH. 'jquery-slider.css');
			$loaded = true;
		}
	}
	public function loadJqGrid() {
		static $loaded = false;
		if(!$loaded) {
			$this->loadJqueryUi();
			frameGdprsup::_()->addScript('jq-grid', $this->_cdnUrl. 'lib/jqgrid/jquery.jqGrid.min.js');
			frameGdprsup::_()->addStyle('jq-grid', $this->_cdnUrl. 'lib/jqgrid/ui.jqgrid.css');
			$langToLoad = utilsGdprsup::getLangCode2Letter();
			$availableLocales = array('ar','bg','bg1251','cat','cn','cs','da','de','dk','el','en','es','fa','fi','fr','gl','he','hr','hr1250','hu','id','is','it','ja','kr','lt','mne','nl','no','pl','pt','pt','ro','ru','sk','sr','sr','sv','th','tr','tw','ua','vi');
			if(!in_array($langToLoad, $availableLocales)) {
				$langToLoad = 'en';
			}
			frameGdprsup::_()->addScript('jq-grid-lang', $this->_cdnUrl. 'lib/jqgrid/i18n/grid.locale-'. $langToLoad. '.js');
			$loaded = true;
		}
	}
	public function loadFontAwesome() {
		frameGdprsup::_()->addStyle('font-awesomeGdprsup', dispatcherGdprsup::applyFilters('externalCdnUrl', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'));
	}
	public function loadChosenSelects() {
		frameGdprsup::_()->addStyle('jquery.chosen', $this->_cdnUrl. 'lib/chosen/chosen.min.css');
		frameGdprsup::_()->addScript('jquery.chosen', $this->_cdnUrl. 'lib/chosen/chosen.jquery.min.js');
	}
	public function loadDatePicker() {
		frameGdprsup::_()->addScript('jquery-ui-datepicker');
	}
	public function loadJqplot() {
		static $loaded = false;
		if(!$loaded) {
			$jqplotDir = $this->_cdnUrl. 'lib/jqplot/';

			frameGdprsup::_()->addStyle('jquery.jqplot', $jqplotDir. 'jquery.jqplot.min.css');

			frameGdprsup::_()->addScript('jplot', $jqplotDir. 'jquery.jqplot.min.js');
			frameGdprsup::_()->addScript('jqplot.canvasAxisLabelRenderer', $jqplotDir. 'jqplot.canvasAxisLabelRenderer.min.js');
			frameGdprsup::_()->addScript('jqplot.canvasTextRenderer', $jqplotDir. 'jqplot.canvasTextRenderer.min.js');
			frameGdprsup::_()->addScript('jqplot.dateAxisRenderer', $jqplotDir. 'jqplot.dateAxisRenderer.min.js');
			frameGdprsup::_()->addScript('jqplot.canvasAxisTickRenderer', $jqplotDir. 'jqplot.canvasAxisTickRenderer.min.js');
			frameGdprsup::_()->addScript('jqplot.highlighter', $jqplotDir. 'jqplot.highlighter.min.js');
			frameGdprsup::_()->addScript('jqplot.cursor', $jqplotDir. 'jqplot.cursor.min.js');
			frameGdprsup::_()->addScript('jqplot.barRenderer', $jqplotDir. 'jqplot.barRenderer.min.js');
			frameGdprsup::_()->addScript('jqplot.categoryAxisRenderer', $jqplotDir. 'jqplot.categoryAxisRenderer.min.js');
			frameGdprsup::_()->addScript('jqplot.pointLabels', $jqplotDir. 'jqplot.pointLabels.min.js');
			frameGdprsup::_()->addScript('jqplot.pieRenderer', $jqplotDir. 'jqplot.pieRenderer.min.js');
			$loaded = true;
		}
	}
	public function loadSortable() {
		static $loaded = false;
		if(!$loaded) {
			frameGdprsup::_()->addScript('jquery-ui-core');
			frameGdprsup::_()->addScript('jquery-ui-widget');
			frameGdprsup::_()->addScript('jquery-ui-mouse');

			frameGdprsup::_()->addScript('jquery-ui-draggable');
			frameGdprsup::_()->addScript('jquery-ui-sortable');
			$loaded = true;
		}
	}
	public function loadMagicAnims() {
		static $loaded = false;
		if(!$loaded) {
			frameGdprsup::_()->addStyle('magic.anim', $this->_cdnUrl. 'css/magic.min.css');
			$loaded = true;
		}
	}
	public function loadCssAnims() {
		static $loaded = false;
		if(!$loaded) {
			frameGdprsup::_()->addStyle('animate.styles', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css');
			$loaded = true;
		}
	}
	public function loadBootstrapSimple() {
		static $loaded = false;
		if(!$loaded) {
			frameGdprsup::_()->addStyle('bootstrap-simple', GDPRSUP_CSS_PATH. 'bootstrap-simple.css');
			$loaded = true;
		}
	}
	public function loadGoogleFont( $font ) {
		static $loaded = array();
		if(!isset($loaded[ $font ])) {
			frameGdprsup::_()->addStyle('google.font.'. str_replace(array(' '), '-', $font), 'https://fonts.googleapis.com/css?family='. urlencode($font));
			$loaded[ $font ] = 1;
		}
	}
}
