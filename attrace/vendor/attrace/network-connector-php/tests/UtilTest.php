<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Util\Crypto;
use Attrace\Connector\Util\NetUtil;

class UtilTest extends TestCase
{
	
	public function testCrypto()
	{
		$intArray = range(0, 512);
		
		$byteArray = Crypto::arrayToByteArray($intArray);
		self::assertEquals(array_merge(range(0, 255), range(0, 255), [0]), $byteArray);
		
		$string = Crypto::byteArrayToString($byteArray);
		self::assertEquals('000102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F202122232425262728292A2B2C2D2E2F303132333435363738393A3B3C3D3E3F404142434445464748494A4B4C4D4E4F505152535455565758595A5B5C5D5E5F606162636465666768696A6B6C6D6E6F707172737475767778797A7B7C7D7E7F808182838485868788898A8B8C8D8E8F909192939495969798999A9B9C9D9E9FA0A1A2A3A4A5A6A7A8A9AAABACADAEAFB0B1B2B3B4B5B6B7B8B9BABBBCBDBEBFC0C1C2C3C4C5C6C7C8C9CACBCCCDCECFD0D1D2D3D4D5D6D7D8D9DADBDCDDDEDFE0E1E2E3E4E5E6E7E8E9EAEBECEDEEEFF0F1F2F3F4F5F6F7F8F9FAFBFCFDFEFF000102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F202122232425262728292A2B2C2D2E2F303132333435363738393A3B3C3D3E3F404142434445464748494A4B4C4D4E4F505152535455565758595A5B5C5D5E5F606162636465666768696A6B6C6D6E6F707172737475767778797A7B7C7D7E7F808182838485868788898A8B8C8D8E8F909192939495969798999A9B9C9D9E9FA0A1A2A3A4A5A6A7A8A9AAABACADAEAFB0B1B2B3B4B5B6B7B8B9BABBBCBDBEBFC0C1C2C3C4C5C6C7C8C9CACBCCCDCECFD0D1D2D3D4D5D6D7D8D9DADBDCDDDEDFE0E1E2E3E4E5E6E7E8E9EAEBECEDEEEFF0F1F2F3F4F5F6F7F8F9FAFBFCFDFEFF00', $string);
		
		//$byteArray2 = Crypto::stringToByteArray($string);
		//self::assertEquals($byteArray, $byteArray2);
		
		$base32 = Crypto::byteArrayToBase32([0x49, 0x7C, 0x20, 0x7A]); // 'I| z'
		self::assertEquals('JF6CA6Q', $base32); // returns "JF6CA6Q=", without trailing "=" // should be 8-bytes long
		$byteArray3 = Crypto::base32ToByteArray($base32);
		self::assertEquals([0x49, 0x7C, 0x20, 0x7A], $byteArray3);
		
		$base64 = Crypto::byteArrayToBase64([0x49, 0x7C, 0x20, 0x7A]); // 'I| z'
		self::assertEquals('SXwgeg==', $base64); // returns "SXwgeg==", with trailing "=" // should be 4-bytes long
		
		$binaryStr = Crypto::byteArrayToBinary([0x49, 0x7C, 0x20, 0x7A]); // 'I| z'
		self::assertEquals('I| z', $binaryStr);
		
		$binaryIntLittleEndian = Crypto::intToBinary(0x497C207A, true);
		$intLittleEndian = Crypto::binaryToInt($binaryIntLittleEndian, true);
		self::assertEquals('z |I', $binaryIntLittleEndian);
		self::assertEquals(0x497C207A, $intLittleEndian);
		
		$binaryIntBigEndian = Crypto::intToBinary(0x497C207A, false);
		$intBigEndian = Crypto::binaryToInt($binaryIntBigEndian, false);
		self::assertEquals('I| z', $binaryIntBigEndian);
		self::assertEquals(0x497C207A, $intBigEndian);
		
		$binaryInt = Crypto::intToBinary(0x1FFFF);
		self::assertEquals("\x1\xFF\xFF", $binaryInt);
		
		$intLittleEndian = Crypto::littleEndian([0x04, 0x01, 0, 0]);
		self::assertEquals(0x0104, $intLittleEndian);
		
		$byteArray = Crypto::intToByteArray(0xF0, true);
		self::assertEquals([0xF0], $byteArray);
		$byteArray = Crypto::intToByteArray(0xFF, true);
		self::assertEquals([0xFF], $byteArray);
		$byteArray = Crypto::intToByteArray(0x100, true);
		self::assertEquals([0, 1], $byteArray); // didn't work before
		$byteArray = Crypto::intToByteArray(0x1000, true);
		self::assertEquals([0, 0x10], $byteArray);
		$byteArray = Crypto::intToByteArray(0xFFFF, true);
		self::assertEquals([255, 255], $byteArray);
		$byteArray = Crypto::intToByteArray(0x10000, true); // doesn't use in code now, but "int" can be at least 4-bytes long
		self::assertEquals([0, 0, 1], $byteArray); // didn't work before
		$byteArray = Crypto::intToByteArray(0x100000, true);
		self::assertEquals([0, 0, 0x10], $byteArray);
		
		$byteArray = Crypto::intToByteArray(0xF0, false);
		self::assertEquals([0xF0], $byteArray);
		$byteArray = Crypto::intToByteArray(0xFF, false);
		self::assertEquals([0xFF], $byteArray);
		$byteArray = Crypto::intToByteArray(0x100, false);
		self::assertEquals([1, 0], $byteArray); // didn't work before
		$byteArray = Crypto::intToByteArray(0x1000, false);
		self::assertEquals([0x10, 0], $byteArray);
		
		$binaryStr = Crypto::intToLittleEndian64BitBinary(0x20);
		self::assertEquals(" \x0\x0\x0\x0\x0\x0\x0", $binaryStr);
		$binaryStr = Crypto::intToLittleEndian64BitBinary(0x7C20202020202020);
		self::assertEquals("       |", $binaryStr);
		
		$byteArray = Crypto::UInt64ToLittleEndianByteArray(1605621063000);
		self::assertEquals([88, 29, 121, 214, 117, 1, 0, 0], $byteArray);
		
		$byteArray = Crypto::binaryToByteArray('I| ');
		self::assertEquals([0x49, 0x7C, 0x20], $byteArray);
		
		$int8 = Crypto::byte8(0);
		self::assertEquals(0, $int8);
		$int8 = Crypto::byte8(0xF1);
		self::assertEquals(0xF1, $int8);
		$int8 = Crypto::byte8(0xFFF1);
		self::assertEquals(0xF1, $int8);
		$int8 = Crypto::byte8(0x1FFF1);
		self::assertEquals(0xF1, $int8);
		
		$int16 = Crypto::byte16(0);
		self::assertEquals(0, $int16);
		$int16 = Crypto::byte16(0xF1);
		self::assertEquals(0xF1, $int16);
		$int16 = Crypto::byte16(0xFFF1);
		self::assertEquals(0xFFF1, $int16);
		$int16 = Crypto::byte16(0x1FFF1);
		self::assertEquals(0xFFF1, $int16);
		$int16 = Crypto::byte16(0xFAFFF1);
		self::assertEquals(0xFFF1, $int16);
	}
	
	public function testNetUtil()
	{
		$_SERVER = [
			'HTTPS' => 'on',
			'HTTP_HOST' => 'attrace.com',
		];
		$url = NetUtil::getDomainUrl(false);
		self::assertEquals('https://attrace.com', $url);
		$url = NetUtil::getDomainUrl(true);
		self::assertEquals('https://attrace.com/', $url);
		
		$_SERVER = [
			'HTTP_HOST' => 'attrace.com',
		];
		$url = NetUtil::getDomainUrl(false);
		self::assertEquals('http://attrace.com', $url);
		$url = NetUtil::getDomainUrl(true);
		self::assertEquals('http://attrace.com/', $url);
		
		$url = NetUtil::cookie_domain('https://support.attrace.com/about/');
		self::assertEquals('attrace.com', $url);
		$url = NetUtil::cookie_domain('http://www.hello.co.uk');
		self::assertEquals('hello.co.uk', $url);
		$url = NetUtil::cookie_domain('https://www.hello.co.UK/news/876535');
		self::assertEquals('hello.co.UK', $url);
		$url = NetUtil::cookie_domain('https://sub.xn--4ca.xn--tst-qla.de/');
		self::assertEquals('xn--tst-qla.de', $url);
		$url = NetUtil::cookie_domain('https://tä.täst.de/');
		self::assertEquals('täst.de', $url);
	}

}
