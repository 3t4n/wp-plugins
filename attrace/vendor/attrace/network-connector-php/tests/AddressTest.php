<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Base32;

class AddressTest extends TestCase
{
    function testAddressType()
    {
        foreach ($this->testAddresses as $addArr) {
            try {
                $address = Address::fromBase32($addArr['addr']);
                self::assertEquals($address->getType(), $addArr['expectedType']);
            }
            catch (AttraceException $e) {
                self::assertTrue(false);
            }
        }
    }

    function testInvalidAddress()
    {
        foreach ($this->invalidTestAddresses as $addArr) {
            try {
                 Address::fromBase32($addArr['addr']);
            } catch (AttraceException $e) {
                self::assertEquals($addArr['exception'], $e->getCode());
            }
        }
    }

    function testAddressForAgreement()
    {
        //read file in binary mode
        $filename     = dirname(__FILE__) . '/contracts/contract.wasm';
        $handle       = fopen($filename, "rb"); // read binary
        $contractCode = fread($handle, filesize($filename));
        fclose($handle);

        $createTx       = Base32::decode("WSLRIBIDGFKMO4CL22WQESO5RS6YBOV2HDTOWUIX5DD2URZRQ5VA");

        //hash contract with binary output!
        $hashedContract = hash('sha256', $contractCode, true);

        $address  = Address::forAgreement($createTx, $hashedContract);
        self::assertEquals($address->encodeBase32(), "ARJUFUYN4G625YLWWS6BDHXVWNKKQ6PMJWL6C35EE5SHDKY5VWB7OPE4");
    }
    
    function testAddressForRoot()
    {

        $address  = Address::forRootBase32("ECPT22JQVJ6CJJC7BYBABNAKPHIPHYHV7DM6LEACHV5XFP43RHRA");
        self::assertEquals($address->encodeBase32(), "BAQJ6PLJGCVHYJFEL4HAEAFUBJ45B47A6X4NTZMQAI6XW4V7TOE6FMKY");
    }

    function testEncodeBase32()
    {
        $address = Address::fromBase32("ABK2JS5KSESDR4J7LIUR7YXEXP4T3XPUKOMPKOJ2PU37MXQ5RQUR4KZQ");
        self::assertEquals($address->encodeBase32(), "ABK2JS5KSESDR4J7LIUR7YXEXP4T3XPUKOMPKOJ2PU37MXQ5RQUR4KZQ");
    }
}
