<?php


namespace Attrace\Connector\Util;


/**
 * Todo: rename to Utils or so
 *
 *
 * Class Crypto
 * @package Attrace\Connector\Util
 */
class Crypto
{

    /**
     * Returns number based on data, where most significant byte is last (so reversed)
     * @param $data array
     * @return int
     */
    public static function littleEndian(array $data)
    {
        $hexstring = "0x";
        $data      = array_reverse($data);
        foreach ($data as $int) {
            $hexstring .= sprintf('%02X', $int);
        }
        return hexdec($hexstring);

    }
	
	/**
     * Returns a string of the byte array in hex notation.
     * @param $data
     * @return string
     */
    public static function byteArrayToString($data)
    {
        $hexstring = "";
        foreach ($data as $int) {
            $hexstring .= sprintf('%02X', $int);
        }
        return $hexstring;
    }
	
	
	/**
	 * Returns a string of the byte array in hex notation.
	 * TODO: absolutely wrong behavior
	 * @param $string
	 * @return array
	 * @deprecated
	 */
	public static function stringToByteArray($string)
	{
		return array_values(unpack('C*', $string));
	}
	
	
	/**
	 * Returns a string of the byte array in hex notation.
	 * @param $int string
	 * @param bool $littleEndian
	 * @return array $ret
	 */
    public static function intToByteArray($int, $littleEndian = false)
    {
        //basically, write it as hex, and split it by substr 2. Must be better methods in the world :)
        $string = sprintf('%02X', $int);
		$string = (strlen($string) % 2 == 1) ? "0{$string}" : $string;
        $ret    = [];
        //
        foreach (str_split($string, 2) as $item) {
            $ret[] = hexdec($item);
        }
        return $littleEndian ? array_reverse($ret) : $ret;

    }


    /**
     * Base32 decode, and convert to byte array
	 * returns encoded string without trailing "=" (compatible with JS client lib)
     * @param array $data
     * @return string $string
     */
    public static function byteArrayToBase32($data)
    {
        $res = '';
        foreach ($data as $key => $packElement) {
            $res .= chr($packElement);
        }
        return Base32::encode($res);
    }

    /**
     * Base64 decode, and convert to byte array
     * @param array $data
     * @return string $string
     */
    public static function byteArrayToBase64($data)
    {
        $res = '';
        foreach ($data as $key => $packElement) {
            $res .= chr($packElement);
        }
        return base64_encode($res);
    }


    /**
     * Convert byte Array to Binary
     * @param $data
     * @return string
     */
    public static function byteArrayToBinary($data)
    {
        $res = '';
        foreach ($data as $key => $packElement) {
            $res .= chr($packElement);
        }
        return $res;
    }


    /**
     * Returns a  binary string of the int.
     * @param $int string
     * @param bool $littleEndian
     * @return string  $ret
     */
    public static function intToBinary($int, $littleEndian = false)
    {
        //basically, write it as hex, and split it by substr 2. Must be better methods in the world :)
        $string = sprintf('%02X', $int);
		$string = (strlen($string) % 2 == 1) ? "0{$string}" : $string;
        $ret    = [];
        //
        foreach (str_split($string, 2) as $item) {
            $ret[] = hexdec($item);
        }

        if ($littleEndian) {
            $ret = array_reverse($ret);
        }
        $res = '';
        foreach ($ret as $key => $packElement) {
            $res .= chr($packElement);
        }
        return $res;
    }
	
	/**
	 * Binary back to int
	 *
	 * @param $binary
	 * @param bool $littleEndian
	 * @return float|int
	 */
    public static function binaryToInt($binary, $littleEndian = false)
    {
        $data = self::binaryToByteArray($binary);
		$data = $littleEndian ? array_reverse($data) : $data;
		$ret  = '0x';
        foreach ($data as $item) {
            $ret .= dechex($item);
        }
        return hexdec($ret);
    }


    public static function intToLittleEndian64BitBinary($int)
    {
        return self::byteArrayToBinary(self::UInt64ToLittleEndianByteArray($int));
    }


    public static function UInt64ToLittleEndianByteArray($int)
    {
        $arr    = [];
        $arr[0] = Crypto::byte8($int);
        $arr[1] = Crypto::byte8($int >> 8);
        $arr[2] = Crypto::byte8($int >> 16);
        $arr[3] = Crypto::byte8($int >> 24);
        $arr[4] = Crypto::byte8($int >> 32);
        $arr[5] = Crypto::byte8($int >> 40);
        $arr[6] = Crypto::byte8($int >> 48);
        $arr[7] = Crypto::byte8($int >> 56);
        return $arr;
    }




    /**
     * Convert binary to byte array
     *
     * @param $string
     * @return array
     */
    public static function binaryToByteArray($string)
    {
        return array_values(unpack('C*', $string));
    }


    /**
     * Base32 decode, and convert to byte array
     * @param $string
     * @return array|false
     */
    public static function base32ToByteArray($string)
    {
        $base32 = Base32::decode(trim($string));

        //we work with ByteArrays.
        //use array_values to make this 0 based
        /** @var array $byteArr */
        return array_values(unpack('C*', $base32));
    }


    /**
     * Ensure every int in this array is byte8
     * @param array $data
     * @return array byte data
     */
    public static function arrayToByteArray(array $data)
	{
        $res = [];
        foreach ($data as $el) {
            $res[] = self::byte8($el);
        }
        return $res;
    }


    /**
     * Scale down to uint16. Print in hex format, take last 4 digits and exec new hexdec
     * @param $int
     * @return bool|string
     */
    public static function byte16($int)
	{
        $str = sprintf('0x%04X', $int);
        return hexdec('0x' . substr($str, -4));
    }

    /**
     * scale down to byte.  Print in hex format, take last 2 digits and exec new hexdec
     * @param $int
     * @return bool|string
     */
    public static function byte8($int)
	{
        $str = sprintf('0x%02X', $int);
        return hexdec('0x' . substr($str, -2));
    }

    /**
     * Takes private key of 64 chars as
     * @param $binaryString
     * @return string
     */
    public static function safeTypeKeyPair($binaryString)
    {
        $data  = self::binaryToByteArray($binaryString);
        $ret   = [];
        $ret[] = 65;
        $crc = Checksum::UInt16ToLittleEndianByteArray(Checksum::checksumCCITT($data));
        return self::byteArrayToBinary(array_merge($ret, $data, $crc));
    }

}