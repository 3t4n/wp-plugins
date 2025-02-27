<?php
include_once(plugin_dir_path(__FILE__)."init_file.php");
class sngmbhSerialcodesValidator_QR {
    private $MAIN;

    private $size_width;
    private $size_height;

    private $filepath = "";

    public static function Instance() {
		static $inst = null;
        if ($inst === null) {
            $inst = new sngmbhSerialcodesValidator_QR();
        }
        return $inst;
	}

    public function __construct() {
		global $sngmbhSerialcodesValidator;
		$this->MAIN = $sngmbhSerialcodesValidator;
    }

    public function setWidth($width) {
        $this->size_width = intval($width);
    }
    public function setHeight($height) {
        $this->size_height = intval($height);
    }
    public function setFilepath($filepath) {
        $this->filepath = trim($filepath);
    }
    private function checkFilePath() {
		if (empty($this->filepath)) $this->filepath = get_temp_dir();
	}

    public function renderPNG($code, $filemode="I") {
        $this->checkFilePath();
        //$width = $this->size_width > 0 ? $this->size_width : 80;
        //$height = $this->size_height > 0 ? $this->size_height : 80;
        require_once("vendors/phpqrcode/qrlib.php");
        $PNG_TEMP_DIR = $this->filepath;
        $filename = $PNG_TEMP_DIR."serialqr_".$code.".jpg";
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 10;

        $qrcode_content = $code;

        if (!file_exists($filename)) {
            QRcode1::png($qrcode_content, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        }
        return $filename;
    }
}
?>