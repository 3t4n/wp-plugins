<?php
class pagesViewGdprsup extends viewGdprsup {
    public function displayDeactivatePage() {
        $this->assign('GET', reqGdprsup::get('get'));
        $this->assign('POST', reqGdprsup::get('post'));
        $this->assign('REQUEST_METHOD', strtoupper(reqGdprsup::getVar('REQUEST_METHOD', 'server')));
        $this->assign('REQUEST_URI', basename(reqGdprsup::getVar('REQUEST_URI', 'server')));
        parent::display('deactivatePage');
    }
}

