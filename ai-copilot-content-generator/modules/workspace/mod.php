<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WaicWorkspace extends WaicModule {
	
	public function init() {
		WaicDispatcher::addFilter('mainAdminTabs', array($this, 'addAdminTab'));
		add_action('waic_run_generation_task', array($this, 'doGenerationTask'), 10, 1);
		add_action('waic_run_delayed_actions', array($this, 'doDelayedActions'), 10, 1);
		add_action('waic_run_scheduled_task', array($this, 'doScheduledTasks'), 10, 1);
		add_filter('cron_schedules', array($this, 'addCronInterval'));
				
		if ( is_admin() ) {
			add_action('admin_notices', array($this, 'showAdminInfo'));
		}
		$this->runPreparedTask();
		$this->runSchedulededTask();
	}
	
	function addCronInterval( $schedules ) {
		$schedules['waic_interval'] = array(
			'interval' => 60 * 15,
			'display'  => 'Every 15 minutes'
		);
		return $schedules;
	}
	
	public function showAdminInfo() {
		return $this->getView()->showAdminInfo();
	}
	
	public function addAdminTab( $tabs ) {
		$icon = WaicFrame::_()->isPro() ? '' : ' wbw-show-pro';
		$code = $this->getCode();
		$tabs[ $code ] = array(
			'label' => esc_html__('Workspace', 'ai-copilot-content-generator'), 'callback' => array($this, 'showWorkspace'), 'fa_icon' => 'fa-list', 'sort_order' => 10, 'add_bread' => $this->getCode(),
		);
		$tabs[ 'history' ] = array(
			'label' => esc_html__('Scenarios', 'ai-copilot-content-generator'), 'callback' => array($this, 'showHistory'), 'fa_icon' => 'fa-list', 'sort_order' => 20, 'add_bread' => $this->getCode(),
		);
		return $tabs;
	}
	
	public function showWorkspace() {
		return $this->getView()->showWorkspace();
	}
	public function showHistory() {
		return $this->getView()->showHistory();
	}
	
	public function getWorkspaceFeatures() {
		$features = array(
			'posts' => array(
				'title' => __('Wordpress posts', 'ai-copilot-content-generator'),
				'blocks' => array(
					'create' => array(
						'title' => __('Create single or bulk posts', 'ai-copilot-content-generator'),
						'desc' => __('Generate individual or multiple posts simultaneously to efficiently populate your site with content.', 'ai-copilot-content-generator'),
						'active' => true,
						'add' => ''
					),
					'fields' => array(
						'title' => __('Bulk Field Generation for Existing Posts', 'ai-copilot-content-generator'),
						'desc' => __('Efficiently edit and update multiple article details across your site in one action, reducing manual work.', 'ai-copilot-content-generator'),
						'active' => true,
						'add' => ''
					),
					'rss' => array(
						'title' => __('RSS-Based Blog & Social Media Automation', 'ai-copilot-content-generator'),
						'desc' => __('Fully automated article generation in your blog based on the latest industry news, plus social media posts about your new articles.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'pro'
					),
					'links' => array(
						'title' => __('Smart Content Crosslinking', 'ai-copilot-content-generator'),
						'desc' => __('Bulk-insert internal and external links into your existing content. AI analyzes each article to create additional paragraphs with the necessary links.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'pro'
					),
					'clusters' => array(
						'title' => __('Generate SEO Content Clusters', 'ai-copilot-content-generator'),
						'desc' => __('Quickly generate entire networks of crosslinked articles based on relevant keywords, leveraging best SEO practices.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
					/*'seo' => array(
						'title' => __('Rephrase and SEO improve posts', 'ai-copilot-content-generator'),
						'desc' => __('Enhance your posts readability and SEO performance through intelligent rephrasing and optimization techniques.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
					'url' => array(
						'title' => __('Create posts based on competitors (URL)', 'ai-copilot-content-generator'),
						'desc' => __('Analyze competitor content via URL to generate new, unique posts inspired by their strategies.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
					'langs' => array(
						'title' => __('Translate posts and fields', 'ai-copilot-content-generator'),
						'desc' => __('Automatically translate your posts and their metadata fields into multiple languages.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),*/
				),
			),
			/*'products' => array(
				'title' => __('Woocommerce products', 'ai-copilot-content-generator'),
				'blocks' => array(
					'create' => array(
						'title' => __('Create single or bulk products', 'ai-copilot-content-generator'),
						'desc' => __('Quickly generate detailed product listings one at a time or in bulk, saving time and effort.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
					'seo' => array(
						'title' => __('Rephrase and SEO improve products', 'ai-copilot-content-generator'),
						'desc' => __('Optimize product fields for SEO and readability, making them more appealing to customers and search engines.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
					'langs' => array(
						'title' => __('Translate products and fields', 'ai-copilot-content-generator'),
						'desc' => __('Expand your market by translating product details and fields into various languages, catering to a global customer base.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
				),
			),*/
			'' => array(
				'title' => __('Others', 'ai-copilot-content-generator'),
				'blocks' => array(
					'products-fields' => array(
						'title' => __('WooCommerce Product Fields Generator', 'ai-copilot-content-generator'),
						'desc' => __('Bulk auto-generate product descriptions, categories, tags, images, and reviews for WooCommerce products using AI.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
					'chatbot' => array(
						'title' => __('Create AI Chatbot', 'ai-copilot-content-generator'),
						'desc' => __('Engage your audience with customizable AI chatbots. Personalize design, track interactions, and boost user experience effortlessly.', 'ai-copilot-content-generator'),
						'active' => false,
						'add' => 'soon'
					),
				),
			),
		);
		
		return WaicDispatcher::applyFilters('getWorkspaceFeatures', $features);
	}
	public function getFeaturesList() {
		$blocks = $this->getWorkspaceFeatures();
		$features = array();
		foreach ($blocks as $block => $sub) {
			foreach ($sub['blocks'] as $key => $data) {
				$features[$block . $key] = $data['title'];
			}
		}
		return $features;
	}
		
	public function getFeatureUrl( $feature = '' ) {
		static $mainUrl;
		if (empty($mainUrl)) {
			$mainUrl = WaicFrame::_()->getModule('adminmenu')->getMainLink();
		}
		return empty($feature) ? $mainUrl : $mainUrl . '&tab=' . $feature;
	}
	public function getTaskUrl( $taskId, $feature = '' ) {
		static $mainUrl;
		if (empty($mainUrl)) {
			$mainUrl = WaicFrame::_()->getModule('adminmenu')->getMainLink();
		}
		if (empty($feature)) {
			$feature = $this->getModel('tasks')->getTaskFeature($taskId);
			/*if ($task) {
				$feature = $task['feature'];
				$module = WaicFrame::_()->getModule($feature);
				if ($module) {
					return $module->showTaskTabContent($task);
				}
			}*/
		}
		return $mainUrl . '&tab=' . ( empty($feature) ? $this->getCode() : $feature ) . ( empty($taskId) ? '' : '&task_id=' . $taskId );
	}
	/*public function getStopTaskUrl( $taskId ) {
		static $mainUrl;
		if (empty($mainUrl)) {
			$mainUrl = WaicFrame::_()->getModule('adminmenu')->getMainLink();
		}
		return $mainUrl . '&tab=' . $this->getCode() . '&task_id=' . $taskId;
	}*/

	public function getTaxonomyHierarchy( $taxonomy, $argsIn, $parent = true, $r = 0 ) {
		$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
		$args = array(
			'taxonomy' => $taxonomy,
			'hide_empty' => $argsIn['hide_empty'],
		);
		if (isset($argsIn['order'])) {
			$args['orderby'] = !empty($argsIn['orderby']) ? $argsIn['orderby'] : 'name';
			$args['order']   = $argsIn['order'];
		}

		if ( !empty($argsIn['parent']) && 0 !== $argsIn['parent'] ) {
			$args['parent'] = $argsIn['parent'];
		} else {
			$args['parent'] = 0;
		}

		if ('' === $taxonomy) {
			return false;
		}

		if ( 'product_cat' === $taxonomy && $parent ) {
			$args['parent'] = 0;
		}
		$terms = get_terms( $args );
		$children = array();
		if (!is_wp_error($terms)) {
			foreach ( $terms as $term ) {
				if (empty($argsIn['only_parent'])) {
					if (!empty($term->term_id)) {
						$args = array(
							'hide_empty' => $argsIn['hide_empty'],
							'parent' => $term->term_id,
						);
						if (isset($argsIn['order'])) {
							$args['order']   = $argsIn['order'];
							$args['orderby'] = !empty($argsIn['orderby']) ? $argsIn['orderby'] : 'name';
						}
						$term->children = $this->getTaxonomyHierarchy( $taxonomy, $args, false, $r + 1 );
					}
				}
				//$children[ $term->term_id ] = $term;
				$children[ $term->term_id ] = str_repeat('—', $r) . $term->name;
				foreach ($term->children as $k => $t) {
					$children[ $k ] = str_repeat('—', $r) . $t;
				}
			}
		}
		return $children;
	}
	public function getUsersList() {
		$list = array();
		$users = get_users();
		if ($users) {
			foreach ($users as $user) {
				$list[$user->ID] = $user->display_name;
			}
		}
		return $list;
	}
	public function getTaxonomiesList($type = 'post') {
		$exclude = array('category', 'post_tag', 'post_format');
		
		$taxs = array();
		foreach ( get_object_taxonomies($type, 'objects') as $slug => $tax ) {
			if ( ! in_array( $slug, $exclude ) ) {
				$taxs[$slug] = $tax->label;
			}
		}
		return $taxs;
	}
	public function runPreparedTask() {
		if (!wp_next_scheduled('waic_run_generation_task') && !$this->getModel()->isRunningFlag()) {
			$need = false;
			if (!empty($this->getModel()->getRunningTask())) {
				$need = true;
			} else {
				$prepared = $this->getModel('tasks')->getPreparedTask();
				if (!empty($prepared)) {
					$this->getModel()->setRunningTask($prepared);
					$need = true;
				}
			}
			if ($need) {
				if (!wp_next_scheduled('waic_run_generation_task')) {
					wp_schedule_single_event(time(), 'waic_run_generation_task');
				}
			}
		}
		//wp_clear_scheduled_hook('waic_run_delayed_actions');
		if (!wp_next_scheduled('waic_run_delayed_actions')) {
			wp_schedule_event(time(), 'hourly', 'waic_run_delayed_actions');
		}
	}
	public function runSchedulededTask( $force = false ) {
		$minCycle = $this->getModel('tasks')->getMinCycle();
		if (wp_next_scheduled('waic_run_scheduled_task')) {
			if (empty($minCycle)) {
				$timestamp = wp_next_scheduled('waic_run_scheduled_task');
				wp_unschedule_event( $timestamp, 'waic_run_scheduled_task');
			}
		} else if (!empty($minCycle)) {
			wp_reschedule_event( time(), 'waic_interval', 'waic_run_scheduled_task' );
		}
		if ($force && wp_next_scheduled('waic_run_scheduled_task')) {
			do_action('waic_run_scheduled_task');
		}
	}
	
	public function doScheduledTasks() {
		$model = $this->getModel();
		$result = $model->doScheduledTasks();
		if (!$result) {
			$model->setStoppingTaskGeneration();
			$model->resetRunningFlag();
			WaicFrame::_()->saveDebugLogging();
		}
	}
	
	public function runGenerationTask( $force = false ) {
		if (!wp_next_scheduled('waic_run_generation_task') && !$this->getModel()->isRunningFlag()) {
			wp_schedule_single_event(time(), 'waic_run_generation_task');
		}
		if ($force) {
			do_action('waic_run_generation_task');
		}
	}
	public function doGenerationTask() {
		$model = $this->getModel();
		$result = $model->doGenerationTasks();
		if (!$result) {
			$model->setStoppingTaskGeneration();
			$model->resetRunningFlag();
			WaicFrame::_()->saveDebugLogging();
		}
	}
	public function doDelayedActions() {
		$result = $this->getModel()->doDelayedActions();
		if (!$result) {
			WaicFrame::_()->saveDebugLogging();
		}
	}
	
}
