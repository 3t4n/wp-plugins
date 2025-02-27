<?php
namespace forge12\floating_menu\component {

    use forge12\floating_menu\Component;
    use forge12\floating_menu\component\floatingmenu\Backend;
    use forge12\floating_menu\component\floatingmenu\Frontend;
    use forge12\floating_menu\component\floatingmenu\PostTypeFloatingMenu;

    if(!defined('ABSPATH')){
        exit;
    }

    require_once('PostTypeFloatingMenu.class.php');
    require_once('FloatingMenu.class.php');
    require_once('Backend.class.php');
    require_once('Frontend.class.php');
    require_once('FloatingMenuManager.class.php');
    require_once('Extend_Customizer.class.php');

    class ControllerFloatingMenu extends Component {
        public function getName(): string
        {
            return 'FloatingMenu';
        }

        protected function onInit(): void
        {
            $FloatingMenuPostType = new PostTypeFloatingMenu();
            $Backend = new Backend();
            $Frontend = new Frontend();
        }
    }
}