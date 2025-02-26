<?php
class optionsControllerGdprsup extends controllerGdprsup {
	public function saveGroup() {
		$res = new responseGdprsup();
		if($this->getModel()->saveGroup(reqGdprsup::get('post'))) {
			$res->addMessage(__('Done', GDPRSUP_LANG_CODE));
		} else
			$res->pushError ($this->getModel('options')->getErrors());
		return $res->ajaxExec();
	}
	public function getPermissions() {
		return array(
			GDPRSUP_USERLEVELS => array(
				GDPRSUP_ADMIN => array('saveGroup')
			),
		);
	}
}

