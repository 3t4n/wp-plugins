<?php


namespace Attrace\Connector\Entity;


use Attrace\Connector\Exceptions\AttraceException;

class Witness
{

    private $address;
    private $host;
    private $port;
    private $time;
    private $signature;

    /**
     * Witness constructor. Create from array that is being returned from manifest
     * @param array $array
     * @throws AttraceException
     */
    public function __construct(array $array)
    {
        foreach (['Address', 'Host', 'Port', 'Time', 'Signature'] as $varnam) {
            $this->setVar($array, $varnam);
        }
    }


    /**
     * @param array $array
     * @param $varname
     * @throws AttraceException
     */
    private function setVar(array $array, $varname)
    {
        if (!isset($array[$varname])) {
            throw new AttraceException(AttraceException::WITNESS_ERROR, 'Error in creating Witness, property does not exist: ' . $varname);
        }
        $this->{strtolower($varname)} = $array[$varname];
    }

    public function getHttpConnectionString()
    {
        return 'https://' . $this->getHost() . ':' . $this->getPort();
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

}