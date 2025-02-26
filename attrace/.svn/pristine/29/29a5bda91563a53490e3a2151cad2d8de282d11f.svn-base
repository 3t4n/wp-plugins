<?php


namespace Attrace\Connector\Exceptions;

use Exception;


/**
 * Default Exception
 *
 * Class AttraceException
 * @package Attrace\Connector\Exceptions
 */
class AttraceException extends Exception
{
    const ATTRACE_KEY_MISSING                   = 1010;
    const ATTRACE_NETWORK_MISSING               = 1020;
    const ATTRACE_NETWORK_INVALID               = 1030;
    const ATTRACE_DISCOVERY_MANIFEST_MISSING    = 1040;
    const PRIVATE_KEY_INVALID_SIZE              = 1050;
    const PRIVATE_KEY_INVALID_CHECKSUM          = 1060;
    const PRIVATE_KEY_DOES_NOT_MATCH_PUBLIC_KEY = 1061;
    const CMD_FIELD_NO_ID                       = 1070;
    const CMD_FIELD_NO_COMMAND                  = 1080;
    const CMD_FIELD_INVALID_ARGS                = 1090;
    const CMD_UNKNOWN                           = 1100;
    const NETWORK_ERROR                         = 1110;
    const WITNESS_ERROR                         = 1120;
    const ADDRESS_UNSUPPORTED_DATA_TYPE         = 1200;
    const ADDRESS_INVALID_LENGTH                = 1210;
    const ADDRESS_INVALID_TYPE                  = 1220;
    const ADDRESS_INVALID_CHECKSUM              = 1230;
    const SALT_ERROR                            = 1300;
    const WITNESS_404                           = 1404;
    const WITNESS_400                           = 1400;
    const WITNESS_UNKNOWN                       = 1500;
    const BUG_INTEGER_TO_BIG                    = 1600;
    const ENCRYPTION_EXCEPTION                  = 1700;
    const PROTOBUF_EXCEPTION                    = 1710;
    const MTAG_NO_API_DEFINED                   = 1800;
    const NOT_FOUND                             = 1720;
    const NOT_SUPPORTED                         = 1730;
    const INVALID_JSON                          = 1810;
    const CURL_EXCEPTION                        = 1900;
    const STORAGE_EXCEPTION                     = 1910;

    public function __construct($code, $message = "")
    {
        parent::__construct($message, $code);
    }

    public function toString()
    {
        return "AttraceException Code [" . $this->getCode() . "]: " . $this->getMessage();
    }


}