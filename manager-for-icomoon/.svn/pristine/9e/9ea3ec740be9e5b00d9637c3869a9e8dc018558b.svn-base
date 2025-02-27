<?php

namespace managerForIcomoon ; 

class Notice {
	
	static public $error = false ;
	static public $info = false ;
    static public $toastError = false ;
	static public $toastInfo = false ;
	
	static public function setInfo($info){
		self::$info = $info;
	}

	static public function setError($error){
		self::$error = $error ;
	}

    static public function setToastInfo($info){
		self::$toastInfo = $info;
	}

	static public function setToastError($error){
		self::$toastError = $error ;
	}

	static public function getHtml(){
        if(self::$error) : ?>
            <div class="notice notice-error managerforicomoon-notice managerforicomoon-notice--error is-dismissible">
                <p><span class="dashicons dashicons-warning"></span><?php echo self::$error; ?></p>
            </div>
        <?php endif; 
        if(self::$info) : ?>
            <div class="notice notice-info managerforicomoon-notice managerforicomoon-notice--info is-dismissible">
                <p><span class="dashicons dashicons-yes-alt"></span><?php echo self::$info; ?></p>
            </div>
        <?php endif;
    }


    static public function getToastHtml(){
        echo '<div class="managerforicomoon-toast--container">';
        if(self::$toastError) : 
            self::addToast(self::$toastError,'error');
        elseif(self::$toastInfo) : 
            self::addToast(self::$toastInfo,'info', false, true);
        endif;
        echo '</div>';
    }


    static function addToast($txt, $type = 'info', $replace = false, $autoHide = false){
        $cssClass = 'managerforicomoon-toast managerforicomoon-toast--'.$type ;
        if($autoHide) {
            $cssClass .= ' managerforicomoon-toast--autohide';
        }
        ?>
        <div class="<?php echo $cssClass ; ?>" style="display:none" data-duration="5000">
            <?php echo $txt ; ?>
            <span class="managerforicomoon-toast--close dashicons dashicons-no-alt" onclick="m4i_close_toast(this);"></span>
        </div>
        <?php
    }
}