<?php
namespace ArtistPress\Administration\Update;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class V122 extends Controller
{
	const SHOW_ARTIST           =   'artistpress_show_artist';
    const SHOW_ARTIST_NAME      =   'artistpress_show_artist_name';
    const SHOW_VENUE            =   'artistpress_show_venue';
    const SHOW_VENUE_NAME       =   'artistpress_show_venue_name';
	
	private $shows;

	public function __construct($name, $version)
    {
		parent::__construct($name, $version);
		$this->setShows();
    }

	private function setShows()
	{
		$args = [
            'post_type' => 'show',
            'numberposts' => -1,
            'post_status' => 'publish',
            'fields' => 'ids',
		];

		$this->shows = \get_posts($args);
	}
	
	private function getArtistId($show)
	{
		return \get_post_meta($show, static::SHOW_ARTIST, true)[0];
	}

	private function getVenueId($show)
	{
		return \get_post_meta($show, static::SHOW_VENUE, true)[0];
	}
	
	private function getArtistName($show)
	{
		$keys = \get_post_custom_keys($show);

		if (\is_array($keys) && \in_array(static::SHOW_ARTIST_NAME, $keys)) {
			return '';
		}

		if (!empty($this->getArtistId($show))) {
			return \get_post_field('post_name', $this->getArtistId($show));
		} else {
			return '';
		}
	}

	private function getVenueName($show)
	{
		$keys = \get_post_custom_keys($show);
		
		if (\is_array($keys) && \in_array(static::SHOW_VENUE_NAME, $keys)) {
			return '';
		}
		
		if (!empty($this->getVenueId($show))) {
			return \get_post_field('post_name', $this->getVenueId($show));
		} else {
			return '';
		}
	}

	private function addArtistName($show, $artist)
	{
		\update_post_meta($show, static::SHOW_ARTIST_NAME, $artist);
	}

	private function addVenueName($show, $venue)
	{
		\update_post_meta($show, static::SHOW_VENUE_NAME, $venue);
	}

	public function run()
    {
		if ($this->existingVersion !== null) {
			return;
		}
		
		foreach($this->shows as $id) {
			if (!empty($this->getArtistName($id))) {
				$this->addArtistName($id, $this->getArtistName($id));
				$this->addVenueName($id, $this->getVenueName($id));
			}
        }

        \update_option('artistpress_version', $this->version);
    }
}
