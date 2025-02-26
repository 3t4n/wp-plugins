<?php

class DyDo_Enqueues_Script extends DyDo_Abstract_Enqueues
{
	private bool $in_footer;

	/**
	 * Constructor.
	 *
	 * @param string $handle
	 * @param string $src
	 */
	public function __construct( string $handle, string $src )
	{
		parent::__construct( $handle, $src );

		$this->in_footer = true;
	}

	/**
	 * @param bool $in_footer
	 *
	 * @return self
	 */
	public function in_footer( bool $in_footer )
	{
		$this->in_footer = $in_footer;

		return $this;
	}

	/**
	 * WP Enqueue
	 */
	public function enqueue()
	{
		wp_enqueue_script( $this->handle, $this->src_url, $this->deps, $this->version, $this->in_footer );
	}
}
