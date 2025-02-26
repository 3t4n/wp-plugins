<?php


namespace Attrace\Connector\Entity;

use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\Base32;
use Attrace\Connector\Util\Checksum;
use Attrace\Connector\Util\Crypto;
use Attrace\Connector\Util\Perf;
use Attrace\Connector\Util\Util;
use Exception;
use ParagonIE\Sodium\Core\Ed25519;
use SodiumException;


class Account
{

    const KEY_SIZE = 67;


    /**
     * The first 32 bytes of private key is the key, the last 32 is public key.
     */
    private $privateKey;
    private $publicKey;
    private $crc;


    /** @var Address $address */
    private $address;

    /**
     * Account constructor.
     * @param $privateKeyBinary
     * @throws AttraceException
     */
    private function __construct($privateKeyBinary)
    {
        $this->privateKey = substr($privateKeyBinary, 1, 32);
        $this->publicKey = substr($privateKeyBinary, 33, 32);
        $this->crc = substr($privateKeyBinary, 65);
        $this->address = Address::fromPublicKeyBase32(Base32::encode($this->publicKey));
    }

    /**
     * @param $privateKey
     * @param bool $checkKey double check the private key. As the Sodium lib is slow we by default tur this off.
     * @return Account
     * @throws AttraceException
     */
    public static function fromPrivateKeyBase32($privateKey, $checkKey = false)
    {
        return self::fromPrivateKeyBinary(Base32::decode($privateKey), $checkKey);
    }


    /**
     * Static method to creat Account from private key
     *
     * @param $privateKeyBinary
     * @param bool $checkKey double check the private key. As the Sodium lib is slow we by default tur this off.
     * @return Account
     * @throws AttraceException
     */
    public static function fromPrivateKeyBinary($privateKeyBinary, $checkKey = false)
    {
        if (strlen($privateKeyBinary) != self::KEY_SIZE) {
            throw new AttraceException(AttraceException::PRIVATE_KEY_INVALID_SIZE, 'Invalid key size: ' . strlen($privateKeyBinary));
        }

        $keyPair = substr($privateKeyBinary, 1, 64);
        $publicKey = substr($keyPair, 32, 32);
        $crc = substr($privateKeyBinary, 65);

        /**
         * Check the CRC!
         */
        if (Checksum::checksumCCITT(Crypto::binaryToByteArray($keyPair)) != Crypto::littleEndian(Crypto::binaryToByteArray($crc))) {

            throw new AttraceException(AttraceException::PRIVATE_KEY_INVALID_CHECKSUM, 'Invalid checksum private key');
        }

        /**
         * Check if public key fits with private key. We do this with a flag for peformance reasons.
         */

        if ($checkKey) {
            try {
                if (Ed25519::publickey_from_secretkey(substr($keyPair, 0, 32)) != $publicKey) {
                    throw new AttraceException(AttraceException::PRIVATE_KEY_DOES_NOT_MATCH_PUBLIC_KEY, 'Public key does not match private key');
                }
            } catch (SodiumException $e) {
                throw new AttraceException(AttraceException::ENCRYPTION_EXCEPTION, 'Encryption exception: ' . $e->getMessage());
            }
        }
        return new Account($privateKeyBinary);
    }

    /**
     *
     * @throws AttraceException
     */
    public static function generateNewAccount()
    {
        try {
            $privateKey = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(32) : random_bytes(32);
            $publicKey = Ed25519::publickey_from_secretkey($privateKey);
            $result = Crypto::safeTypeKeypair($privateKey . $publicKey);
            return self::fromPrivateKeyBinary($result);
        } catch (SodiumException $e) {
            throw new AttraceException(AttraceException::ENCRYPTION_EXCEPTION, 'Encryption exception: ' . $e->getMessage());
        } catch (Exception $e) {
            throw new AttraceException(AttraceException::ENCRYPTION_EXCEPTION, 'Byte generation exception: ' . $e->getMessage());
        }
    }

    /**
     * Sign the data with the private key fo this account
     *
     * @param array $data byte array
     * @return array signed data
     * @throws AttraceException
     */
    public function sign(array $data)
    {
        try {
            $keyPair = $this->privateKey . $this->publicKey;

            $message = Crypto::byteArrayToBinary($data);
            Perf::start('sign_detached', 'Ed25519::sign_detached');
            $sign_detached = Ed25519::sign_detached($message, $keyPair);
            Perf::stop('sign_detached');
            return Crypto::binaryToByteArray($sign_detached);
        } catch (SodiumException $e) {
            throw new AttraceException(AttraceException::ENCRYPTION_EXCEPTION, 'Encryption exception: ' . $e->getMessage());
        }
    }


    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function getPublicKeyAsString()
    {
        return Crypto::byteArrayToString(Crypto::binaryToByteArray($this->getPublicKey()));
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * get signed timestamp
     * use full for setting header
     * @param null $timestamp
     * @param bool $base64encoded
     * @return array|string
     * @throws AttraceException
     */
    public function getSignedTimestamp($timestamp = null, $base64encoded = true)
    {
        if (!$timestamp) {
            $timestamp = Util::getCurrentTimeMs();
        }
        $timestampBinary = Crypto::intToLittleEndian64BitBinary($timestamp);
        $byteArray = Crypto::binaryToByteArray($timestampBinary);
        $signature = $this->sign($byteArray);
        return $base64encoded ? Crypto::byteArrayToBase64($signature) : $signature;
    }


}