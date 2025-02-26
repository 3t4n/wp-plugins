<?php

namespace QuadLayers\AICP\Models;

use QuadLayers\AICP\Entities\Assistant;
use QuadLayers\WP_Orm\Builder\CollectionRepositoryBuilder;

/**
 * Models_Assistant Class
 */
class Assistants {

	protected static $instance;
	protected $repository;

	private function __construct() {

		$builder = ( new CollectionRepositoryBuilder() )
		->setTable( 'aicp_assistants' )
		->setEntity( Assistant::class )
		->setAutoIncrement( true );

		$this->repository = $builder->getRepository();
	}

	/**
	 * Get the database table associated with the assistants.
	 *
	 * @return string
	 */
	public function get_table(): string {
		return $this->repository->getTable();
	}

	/**
	 * Get the args associated with the assistants.
	 *
	 * @return array
	 */
	public function get_args(): array {
		$entity   = new Assistant();
		$defaults = $entity->getDefaults();
		return $defaults;
	}

	/**
	 * Get the args associated with the assistants.
	 *
	 * @param int $id
	 * @return Assistant
	 */
	public function get( int $id ): ?Assistant {
		return $this->repository->find( $id );
	}

	/**
	 * Delete assistants entitie from the repository.
	 *
	 * @param int $id
	 * @return bool
	 */
	public function delete( int $id ): bool {
		return $this->repository->delete( $id );
	}

	/**
	 * Update assistant
	 *
	 * @param int   $id
	 * @param array $data
	 * @return ?Assistant
	 */
	public function update( int $id, array $data ): ?Assistant {
		return $this->repository->update( $id, $data );
	}

	/**
	 * Create assistant
	 *
	 * @param array $data
	 * @return Assistant
	 */
	public function create( array $data ): Assistant {
		if ( isset( $data['assistant_id'] ) ) {
			unset( $data['assistant_id'] );
		}
		return $this->repository->create( $data );
	}

	/**
	 * Get all assistant
	 *
	 * @return array
	 */
	public function get_all(): array {
		$entities = $this->repository->findAll();
		if ( ! $entities ) {
			return array();
		}
		return $entities;
	}

	/**
	 * Delete all assistants
	 *
	 * @return bool
	 */
	public function delete_all(): bool {
		return $this->repository->deleteAll();
	}

	public static function instance(): Assistants {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
