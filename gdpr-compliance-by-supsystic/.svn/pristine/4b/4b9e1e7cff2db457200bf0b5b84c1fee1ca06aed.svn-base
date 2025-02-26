<?php
class mailControllerGdprsup extends controllerGdprsup {
	public function testEmail() {
		$res = new responseGdprsup();
		$email = reqGdprsup::getVar('test_email', 'post');
		if($this->getModel()->testEmail($email)) {
			$res->addMessage(__('Now check your email inbox / spam folders for test mail.'));
		} else 
			$res->pushError ($this->getModel()->getErrors());
		$res->ajaxExec();
	}
	public function saveMailTestRes() {
		$res = new responseGdprsup();
		$result = (int) reqGdprsup::getVar('result', 'post');
		frameGdprsup::_()->getModule('options')->getModel()->save('mail_function_work', $result);
		$res->ajaxExec();
	}
	public function saveOptions() {
		$res = new responseGdprsup();
		$optsModel = frameGdprsup::_()->getModule('options')->getModel();
		$submitData = reqGdprsup::get('post');
		if($optsModel->saveGroup($submitData)) {
			$res->addMessage(__('Done', GDPRSUP_LANG_CODE));
		} else
			$res->pushError ($optsModel->getErrors());
		$res->ajaxExec();
	}
	public function getPermissions() {
		return array(
			GDPRSUP_USERLEVELS => array(
				GDPRSUP_ADMIN => array('testEmail', 'saveMailTestRes', 'saveOptions')
			),
		);
	}
}
