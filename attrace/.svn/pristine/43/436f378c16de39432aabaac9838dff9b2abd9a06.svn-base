<?php

namespace Attrace\Connector\Test;


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Storage\StaticStorage;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Log;


// php 5.6 polyfill for PHPUnit
if(!class_exists('\\PHPUnit\\Runner\\Version')) {
	require_once dirname(__FILE__) . '/PHPUnit5Polyfill.php';
}

// php 8.0rc polyfill for 'paragonie/sodium_compat'
if(!defined('MB_OVERLOAD_STRING')) {
	define('MB_OVERLOAD_STRING', 0);
}


class MyTestCase extends \PHPUnit\Framework\TestCase
{
    protected $validConfig;
    protected $testAddresses;
    protected $invalidTestAddresses;
    protected $keys;
    protected $invalidKeys;
	
	protected $requestTimeFloat;
	
	protected function myTearDown()
	{
		$_SERVER['REQUEST_TIME_FLOAT'] = $this->requestTimeFloat;
	}

    protected function mySetUp()
    {
		if(isset($_SERVER['REQUEST_TIME_FLOAT'])) {
			$this->requestTimeFloat = $_SERVER['REQUEST_TIME_FLOAT'];
		} else {
			$secArr = explode(' ', microtime());
			$this->requestTimeFloat = ((float)$secArr[0] + (float)$secArr[1]);
		}
		
        Log::println();
        $this->validConfig = [
            Constants::CONFIG_ATTRACE_KEY                => 'IFNO7PFXBLZESPHXGLRU7AID2LIWPAQCAEOQXFBBZ4J7H4J6UCKLCNHSNRM2J5NHB7KICNS7V2NG72FVT7I64T5DK3GRWUABDB7QPNHMTK3A',
            Constants::CONFIG_ATTRACE_NETWORK            => 'testnet'
        ];

        $this->testAddresses = [
            [

                "addr"         => "AAUXIJG35VALLOZJGSVRMFKIDFZMSYUQHWVVJSGG6XVO2HCUTEPBJNGL",
                "expectedType" => Address::TYPE_ACCOUNT,
            ],
            [
                "addr"         => "ACTCRK7U74YEGKP3Z7K5HCKDOTRHW63LVAFHXGOT3QHICZJC7FBWFWYA",
                "expectedType" => Address::TYPE_ACCOUNT,
            ],
            [
                "addr"         => "ACTCRK7U74YEGKP3Z7K5HCKDOTRHW63LVAFHXGOT3QHICZJC7FBWFWYA",
                "expectedType" => Address::TYPE_ACCOUNT,
            ],
            [
                "addr"         => "ATFQVHMJSF7HKBKHCY5HCWUGYJFOYXEALTGCQ55DG56UZ6LR67V7GALO",
                "expectedType" => Address::TYPE_AGREEMENT,
            ],
            [
                "addr"         => "AQ3NHUC5FGOM57O75FBUJXUZYY4WAHZRHHDV4U3GUU6ROZTTJZS5XLJH",
                "expectedType" => Address::TYPE_AGREEMENT,
            ],
            [
                "addr"         => "AQ2L6MVHA36NTHMKX7RHPPR5A5JZ3M3PVEEDRWSZV52XF2VGHUXMTSBP",
                "expectedType" => Address::TYPE_AGREEMENT,
            ],
            [
                "addr"         => "BDUFVS76EXQHX6R23Q524JAEJTK2QL24OZLDED6ZQ7XJEV2OVDURHQ2C",
                "expectedType" => Address::TYPE_ROOT,
            ],
            [
                "addr"         => "BDKKQ6CVNS4MN5I45MU3WDZZX4FULXH6OITJJNMPAFXGVQG5ESE2CBZM",
                "expectedType" => Address::TYPE_ROOT,
            ],
            [
                "addr"         => "BAQJ6PLJGCVHYJFEL4HAEAFUBJ45B47A6X4NTZMQAI6XW4V7TOE6FMKY",
                "expectedType" => Address::TYPE_ROOT,
            ],
        ];

        $this->invalidTestAddresses = [
            [
                "addr"      => "AQJ6PLJGCVHYJFEL4HAEAFUBJ45B47A6X4NTZMQAI6XW4V7TOE6FMKY",
                "exception" => AttraceException::ADDRESS_INVALID_LENGTH,
            ],
            [
                "addr"      => "3AQJ6PLJGCVHYJFEL4HAEAFUBJ45B47A6X4NTZMQAI6XW4V7TOE6FMKY",
                "exception" => AttraceException::ADDRESS_INVALID_TYPE, //"Invalid address type (expected: [agreement, root, account]), received: unknown type",
            ],
            [
                "addr"      => "BAQJ6PLJGCVJYJFEL4HAEAFB4545B47A6X4NTZMQAI6XW4V7TOE6FMKY",
                "exception" => AttraceException::ADDRESS_INVALID_CHECKSUM, // "Invalid checksum"
            ],
//                [
//                    "addr"      => "4HFQVHMJSF7HKBKHCY5HCWUGYJFOYXEALTGCQ55DG56UZ6LR67V7GALO",
//                    "exception" => Address::TYPE_ACCOUNT, // "Invalid algorithm (expected ed25519)"
//                ]
        ];

        $this->keys = [
            [
                "addr" => "AA2PE3CZUT22OD6UQE3F7LU2N7ULLH6R5ZH2GVWNDNIACGD7A62OYAJ3",
                "key"  => "IFNO7PFXBLZESPHXGLRU7AID2LIWPAQCAEOQXFBBZ4J7H4J6UCKLCNHSNRM2J5NHB7KICNS7V2NG72FVT7I64T5DK3GRWUABDB7QPNHMTK3A",
            ],
            [
                "addr" => "AAROPDSD4U3KJGZ7BEDF53TUYUDZIAMYBLDY747O5G6V2DHA3QNIL4GZ",
                "key"  => "IH2Z34XP4TTREK27JVZUDTEK3V2NJMFGXQ4OA7SUFAGC2CTRV4CESIXHRZB6KNVETM7QSBS65Z2MKB4UAGMAVR4P6PXOTPK5BTQNYGUFQUYA",
            ],
        ];

        $this->invalidKeys = [
            "FNO7PFXBLZESPHXGLRU7AID2LIWPAQCAEOQXFBBZ4J7H4J6UCKLCNHSNRM2J5NHB7KICNS7V2NG72FVT7I64T5DK3GRWUABDB7QPNHMTK3A",

            "IFNO7PFXBLZESPHXGLRU7AID2LIWPAQCAEOQXFBBZ4J7H4J6UCKLCNHSNRM2J5NHB7KICNS7V2NG72FVT7I64T5DK3GRWUABDB7QPNHMTK",

            "IFNO7PFXBLZESPHXGLRU7AID2LIWPAQCAEOQXFBBZ4J7H4J6UCKLCNHSNRM2J5NHB7KICNS7V2NG72FVT7I64T5DK3GRWUABDB7QPNHMT",

        ];

        //set storages
        $storage = new StaticStorage();
        ConfigController::getInstance()->setStorage($storage);
        TransactionController::getInstance()->setStorage($storage);
        IntegrationConfigController::getInstance()->setStorage($storage);
    }
    
}

if(class_exists('\\PHPUnit\\Runner\\Version') && version_compare(\PHPUnit\Runner\Version::id(), '8.0.0', '>=')) {
	// PHPUnit 8 polyfill
	require_once dirname(__FILE__).'/PHPUnit8Polyfill.php';
} elseif(class_exists('\\PHPUnit\\Runner\\Version') && version_compare(\PHPUnit\Runner\Version::id(), '7.0.0', '>=')) {
	// PHPUnit 7 polyfill
	require_once dirname(__FILE__).'/PHPUnit7Polyfill.php';
} else {
	// PHPUnit 5 & 6 polyfill
	class TestCase extends MyTestCase
	{
		protected function setUp()
		{
			parent::mySetUp();
		}
		
		protected function tearDown()
		{
			parent::myTearDown();
		}
		
		public static function assertStringContainsString($needle, $haystack, $message = '')
		{
			self::assertContains($needle, $haystack, $message);
		}
		
	}
}
