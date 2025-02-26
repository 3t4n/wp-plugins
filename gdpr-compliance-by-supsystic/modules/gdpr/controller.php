<?php
class gdprControllerGdprsup extends controllerGdprsup {
	public function save() {
		$res = new responseGdprsup();
		if($this->getModel()->save(reqGdprsup::get('post'))) {
			$res->addMessage(__('Done', GDPRSUP_LANG_CODE));
		} else
			$res->pushError ($this->getModel()->getErrors());
		return $res->ajaxExec();
	}
	public function getPermissions() {
		return array(
			GDPRSUP_USERLEVELS => array(
				GDPRSUP_ADMIN => array('save')
			),
		);
	}
}

