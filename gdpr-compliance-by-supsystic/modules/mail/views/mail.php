<?php
class mailViewGdprsup extends viewGdprsup {
	public function getTabContent() {
		frameGdprsup::_()->getModule('templates')->loadJqueryUi();
		frameGdprsup::_()->addScript('admin.'. $this->getCode(), $this->getModule()->getModPath(). 'js/admin.'. $this->getCode(). '.js');
		
		$this->assign('options', frameGdprsup::_()->getModule('options')->getCatOpts( $this->getCode() ));
		$this->assign('testEmail', frameGdprsup::_()->getModule('options')->get('notify_email'));
		return parent::getContent('mailAdmin');
	}
}
