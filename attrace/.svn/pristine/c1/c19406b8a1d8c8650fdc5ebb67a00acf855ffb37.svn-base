<?php


namespace Attrace\Connector\Entity;


use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Base32;
use Attrace\Connector\Util\Checksum;
use Attrace\Connector\Util\Crypto;
use Attrace\Connector\Util\Hash;
use ParagonIE\Sodium\Core\Ed25519;
use SodiumException;

class Address
{
    const TYPE_ACCOUNT   = 0x0;
    const TYPE_AGREEMENT = 0x1;
    const TYPE_ROOT      = 0x2;


    const ADDRESS_ALGO_ED25519_BYTE = 0x0;

    /** @var string $type */
    private $type;


    /** @var string $bytesString */
    private $bytesString;

    /** @var string $publicKey */
    private $publicKey;


    /**
     * @return array
     */
    public function getBytes()
    {
        return Crypto::binaryToByteArray($this->bytesString);
    }


    /**
     * Address constructor, private cause never called directly
     * @param $binary string
     * @throws AttraceException
     */
    private function __construct($binary)
    {
        $this->bytesString = $binary;
        $this->publicKey   = substr($binary, 1, 32);
        // Get the first byte
        $firstByte = Crypto::byte8($this->getBytes()[0]);

        // From that byte, slice out the algo
        $addresType = ($firstByte << 27) >> 29;
        if (!in_array($addresType, [Address::TYPE_ACCOUNT, Address::TYPE_AGREEMENT, Address::TYPE_ROOT])) {
            throw new AttraceException(AttraceException::ADDRESS_INVALID_TYPE, "Invalid address type " . $addresType);
        }
        $this->setType($addresType);
    }

    /**
     *
     * Create address from base32 encoded string
     *
     * @param $string
     * @param bool $checkKey
     * @return Address
     * @throws AttraceException
     */
    public static function fromBase32($string, $checkKey = false)
    {
        return self::fromBinary(Base32::decode($string), $checkKey);
    }


    /**
     * @param $byteString
     * @param bool $checkKey
     * @return Address
     * @throws AttraceException
     */
    public static function fromBinary($byteString, $checkKey = false)
    {
        if (strlen($byteString) != 35) {
            throw new AttraceException(AttraceException::ADDRESS_INVALID_LENGTH, "Invalid address length (expected 35), received: " . strlen($byteString));
        }

        if (!$checkKey) {
            return new Address($byteString);
        }

        $publicKeyBytesString = substr($byteString, 1, 32);
        $crcBytesString       = substr($byteString, 33, 2);

        if (Checksum::checksumCCITT(Crypto::binaryToByteArray($publicKeyBytesString)) != Crypto::littleEndian(Crypto::binaryToByteArray($crcBytesString))) {
            throw new AttraceException(AttraceException::ADDRESS_INVALID_CHECKSUM, "Invalid checksum ");
        }

        return new Address($byteString);
    }

    /**
     * Static method to create Address from public key byte array
     *
     * @param string $base32
     * @return Address
     * @throws AttraceException
     */
    public static function fromPublicKeyBase32($base32)
    {


        $byteArray = Crypto::base32ToByteArray($base32);
        $bytes     = $byteArray;

        //using hex notation for sanity's sake
        //TODO add flag functionality for generated addresses
        array_unshift($bytes, hexdec('0x00'));
        $crc = Checksum::checksumCCITT($byteArray);


        $bytes   = array_merge($bytes, Checksum::UInt16ToLittleEndianByteArray($crc));
        //Log::int8array($bytes, 'AddressBytes');
        return new Address(Crypto::byteArrayToBinary($bytes));
    }


    /**
     * Static method to create Address from public key byte array
     *
     * @param $base32
     * @return Address
     * @throws AttraceException
     */
    public static function forRootBase32($base32)
    {
        $hashbytes = Crypto::base32ToByteArray($base32);
        $props     = [];
        $props[]   = self::propsToAddressFlag(self::TYPE_ROOT);
        $crc       = Crypto::intToByteArray(Checksum::checksumCCITT($hashbytes), true);
        $bytes     = array_merge($props, $hashbytes, $crc);
        return new Address(Crypto::byteArrayToBinary($bytes));
    }


    /**
     * Static method to create Address from tx and contract code
     *
     * @param String $createTxBinary binary
     * @param String $contractIDHashBytes needs to be in BINARY FORMAT, so use hash('sha256', $contractCode, true)
     * @return Address
     * @throws AttraceException
     */
    public static function forAgreement($createTxBinary, $contractIDHashBytes)
    {
        $hashbytes = Hash::sha256multi([$createTxBinary, $contractIDHashBytes]);
        $props     = [];
        $props[]   = self::propsToAddressFlag(self::TYPE_AGREEMENT);
        $crc       = Crypto::intToByteArray(Checksum::checksumCCITT($hashbytes), true);
        $bytes     = array_merge($props, $hashbytes, $crc);
        return new Address(Crypto::byteArrayToBinary($bytes));
    }


    public function encodeBase32()
    {
        return Base32::encode($this->bytesString);
    }

    public function encodeBinary()
    {
        return $this->bytesString;
    }

    /**
     * Verify data by public key
     *
     * @param $data
     * @param $signature
     * @param bool $base64encoded
     * @return bool
     * @throws AttraceException
     */
    public function verify($data, $signature, $base64encoded = true)
    {
        if ($base64encoded) {
            $signature = base64_decode($signature);
        }
        try {
            return Ed25519::verify_detached($signature, $data, $this->publicKey);
        } catch (SodiumException $e) {
            throw new AttraceException(AttraceException::ENCRYPTION_EXCEPTION, 'Encryption exception: ' . $e->getMessage());
        }
    }

    /**
     * @param $timestamp
     * @param $signature
     * @param bool $base64encoded
     * @return bool
     * @throws AttraceException
     */
    public function verifyTimestamp($timestamp, $signature, $base64encoded = true)
    {
        $data = Crypto::intToLittleEndian64BitBinary($timestamp);
        return $this->verify($data, $signature, $base64encoded);
    }


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public static function propsToAddressFlag($addressType)
    {
        $addressType = $addressType << 2;
        return $addressType | self::ADDRESS_ALGO_ED25519_BYTE;
    }


}