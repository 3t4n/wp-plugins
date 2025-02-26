<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Account;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Crypto;

class AccountTest extends TestCase
{
    public function testAccountValidKey()
    {
        $account= Account::fromPrivateKeyBase32($this->validConfig[Constants::CONFIG_ATTRACE_KEY]);
        self::assertEquals($account->getPublicKeyAsString(), '34F26C59A4F5A70FD481365FAE9A6FE8B59FD1EE4FA356CD1B5001187F07B4EC');
    }

    public function testAccountInvalidKey()
    {
        try {
			Account::fromPrivateKeyBase32(substr($this->validConfig[Constants::CONFIG_ATTRACE_KEY], 0, strlen($this->validConfig[Constants::CONFIG_ATTRACE_KEY]) - 1));
		} catch(AttraceException $e) {
        	self::assertTrue($e->getCode() === AttraceException::PRIVATE_KEY_INVALID_SIZE);
		}
    }

    public function testAccountInvalidChecksum()
    {
        try {
			Account::fromPrivateKeyBase32(substr($this->validConfig[Constants::CONFIG_ATTRACE_KEY], 0, strlen($this->validConfig[Constants::CONFIG_ATTRACE_KEY]) - 1) . 'X');
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::PRIVATE_KEY_INVALID_CHECKSUM);
		}
    }

    public function testPublicKey()
    {
        $account = Account::fromPrivateKeyBase32($this->validConfig[Constants::CONFIG_ATTRACE_KEY], true);
        echo '!!!'.$account->getPublicKeyAsString().'!!!';
        self::assertEquals($account->getPublicKeyAsString(), '34F26C59A4F5A70FD481365FAE9A6FE8B59FD1EE4FA356CD1B5001187F07B4EC');
    }

    public function testGenerateAccount() {
    	try {
			$account = Account::generateNewAccount();
			$signArray = $account->sign(Crypto::arrayToByteArray([12, 31, 43, 93]));
		} catch(AttraceException $e) {
			self::fail();
		}
		self::assertTrue(true);
    }

    public function testFailedAccount1()
	{
		try {
			Account::fromPrivateKeyBase32($this->invalidKeys[0], true);
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::PRIVATE_KEY_INVALID_SIZE);
		}
	}

    public function testFailedAccount2()
	{
		try {
			Account::fromPrivateKeyBase32($this->invalidKeys[1], true);
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::PRIVATE_KEY_INVALID_SIZE);
		}
    }

    public function testFailedAccount3()
	{
		try {
			Account::fromPrivateKeyBase32($this->invalidKeys[2], true);
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::PRIVATE_KEY_INVALID_SIZE);
		}
    }

    public function testSignature() {
        $account = Account::fromPrivateKeyBase32($this->keys[0]['key'], true);
        $dataToSign = Crypto::arrayToByteArray([12, 31, 43, 93]);
        $signedData = $account->sign($dataToSign);
        $resultShouldBe = [
            122, 198, 245, 195, 125, 200,  73,  86,  85, 169, 144,
            74,  52, 106,  86, 217,  65,  68,  16, 240, 242,  31,
            107, 238, 170, 154, 127,  89, 155, 206, 169, 244, 195,
            98,  22, 101, 237,  73,  50, 148, 241,  54, 190,  57,
            236,  63, 205,  88, 194, 151,  50, 140,  71, 180,  40,
            88, 188,   8,  59, 229, 117, 206,  34,   5
        ];
        self::assertEquals($signedData,$resultShouldBe);
    }
}
