<?php

abstract class DyDo_Abstract_Enqueues
{
    /**
     * @var string
     */
    protected $handle;

    /**
     * @var string
     */
    protected $src;

    /**
     * @var string
     */
    protected $src_url;

    /**
     * @var array
     */
    protected $deps;

    /**
     * @var string
     */
    protected $version;

    /**
     * Constructor.
     *
     * @param string $handle
     * @param string $src
     */
    public function __construct( $handle, $src )
    {
        $this->handle  = $handle;
        $this->src     = $src;
        $this->deps    = [];
        $this->version = DYDO_VERSION;
        $this->src_url = $this->set_src_url();
    }

    /**
     * @param array $deps
     *
     * @return self
     */
    public function deps( $deps )
    {
        $this->deps = $deps;

        return $this;
    }

    /**
     * @param string $version
     *
     * @return self
     */
    public function version( $version )
    {
        $this->version = $version;

        return $this;
    }

    /**
     * WP Enqueue
     */
    abstract function enqueue();

    /**
     * Set static url
     *
     * @return string
     */
    private function set_src_url()
    {
        if ( substr( $this->src, 0, 4 ) !== 'http' ) {
            $this->set_version();

            return DYDO_ASSETS_URI . "/{$this->src}";
        }

        return $this->src;
    }

    /**
     * Set the file version with the modified date
     */
    private function set_version()
    {
        $filename = DYDO_ASSETS_PATH . "/{$this->src}";

        if ( file_exists( $filename ) ) {
            $this->version = DYDO_VERSION . fileatime( $filename );
        }
    }
}
