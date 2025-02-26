<?php


namespace Attrace\Connector\API\Controller;


use Attrace\Connector\API\Storage\AbstractStorage;
use Attrace\Connector\Exceptions\AttraceException;

abstract class AbstractController
{
    /** @var AbstractStorage $storage */
    private $storage;

    /**
     * @return AbstractStorage
     * @throws AttraceException
     */
    public function getStorage()
    {
        if (!$this->storage) {
            throw new AttraceException(AttraceException::STORAGE_EXCEPTION, "No storage configured");
        }
        return $this->storage;
    }


    /**
     * @param AbstractStorage $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param $key
     * @param null $defaultValue
     * @return mixed|null
     * @throws AttraceException
     */
    public function get($key, $defaultValue = null)
    {
        $value = $this->getStorage()->get($key, $this->getModel());
        if ($value !== null) {
            return $value;
        }
        return $defaultValue;
    }

    /**
     * @param $key
     * @throws AttraceException
     */
    public function delete($key)
    {
        $this->getStorage()->delete($key, $this->getModel());
    }

    /**
     * @throws AttraceException
     */
    public function init()
    {
        $this->getStorage()->init($this->getModel());
    }

    /**
     * @throws AttraceException
     */
    public function destroy()
    {
        $this->getStorage()->destroy($this->getModel());
    }

    /**
     * @return mixed
     * @throws AttraceException
     */
    public function getAll()
    {
        return $this->getStorage()->getAll($this->getModel());
    }

    /**
     * @param $key
     * @param $blob
     * @throws AttraceException
     */
    public function set($key, $blob)
    {
        $this->getStorage()->set($key, $blob, $this->getModel());
    }

    /**
     * @return string|string[]
     */
    public function getModel()
    {
        $path           = explode('\\', get_class($this));
        $controllerName = array_pop($path);
        return str_replace("Controller", "", $controllerName);
    }

} 
