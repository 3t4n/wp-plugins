<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class OverviewViewAfsw extends ViewAfsw {
	public function getOverviewTabContent() {
		$assets = AssetsAfsw::_();
		$assets->loadCoreJs();
		
		FrameAfsw::_()->addScript('admin.overview', $this->getModule()->getModPath() . 'assets/js/admin.overview.js');
		
		$assets->loadJqueryUi();
		$assets->loadBootstrap();
		FrameAfsw::_()->addScript('notify-js', AFSW_JS_PATH . 'notify.js', array(), false, true);
		FrameAfsw::_()->addStyle('admin.overview.css', $this->getModule()->getModPath() . 'assets/css/admin.overview.css');
		
		$this->assign('isWeek', ( time() - $this->getModel()->getFirstOverview() ) > 608800);
		return parent::getContent('overviewTabContent');
	}
	public function showAdminInfo() {
		$dismiss = (int) FrameAfsw::_()->getModule('options')->get('dismiss_afsw-ads-reward');
		if ($dismiss) {
			return;	// it was already dismissed by user - no need to show it again
		}
		AssetsAfsw::_()->loadCoreJs();
		FrameAfsw::_()->addScript('afsw.admin.notice.dismis', $this->getModule()->getModPath() . 'assets/js/admin.notice.dismis.js');

		$this->assign( 'message',
			'<b>' . esc_html__('New! Reward points and loyalty plugin from WBW', 'advanced-fuzzy-search') . '</b><br/>' .
			esc_html__('Set rewards in the form of bonus points for the purchase of good, signup, writing review and more. Create delayed campaigns with automatic reward points accrual based on triggers/conditions.', 'advanced-fuzzy-search') .
			' <a href="https://woobewoo.com/plugins/reward-points-for-woocoommerce/" target="_blank">' . esc_html__('More Info', 'advanced-fuzzy-search') . '</a>'
		);
		$this->assign('msgSlug', 'afsw-ads-reward');
		HtmlAfsw::echoEscapedHtml($this->getContent('showAdminInfo'));
	}
}
