<?php

class DyDo_Enqueues_Style extends DyDo_Abstract_Enqueues
{
    private string $media;

    /**
     * Constructor.
     *
     * @param string $handle
     * @param string $src
     */
    public function __construct( string $handle, string $src )
    {
        parent::__construct( $handle, $src );

        $this->media = 'all';
    }

    /**
     * @param string $media
     *
     * @return self
     */
    public function media( string $media )
    {
        $this->media = $media;

        return $this;
    }

    /**
     * WP Enqueue
     */
    public function enqueue()
    {
        wp_enqueue_style( $this->handle, $this->src_url, $this->deps, $this->version, $this->media );
    }
}
