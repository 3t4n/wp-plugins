<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class OverviewControllerAfsw extends ControllerAfsw {
	public function subscribe() {
		$res = new ResponseAfsw();
		if ($this->getModel()->subscribe(ReqAfsw::get('post'))) {
			$res->addMessage(esc_html__('Done', 'advanced-fuzzy-search'));
		} else {
			$res->pushError($this->getModel()->getErrors());
		}
		$res->ajaxExec();
	}
	public function rating() {
		$res = new ResponseAfsw();
		if ($this->getModel()->rating(ReqAfsw::get('post'))) {
			$res->addMessage(esc_html__('Done', 'advanced-fuzzy-search'));
		} else {
			$res->pushError($this->getModel()->getErrors());
		}
		$res->ajaxExec();
	}
	public function dismissNotice() {
		$res = new ResponseAfsw();
		$slug = ReqAfsw::getVar('slug');
		if (!empty($slug) && !is_null($slug)) {
			FrameAfsw::_()->getModule('options')->getModel()->save('dismiss_' . $slug, 1);
		}
		$res->ajaxExec();
	}
}
