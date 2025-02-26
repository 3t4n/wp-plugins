<?php
namespace WSDesk\Tickets\Filters;

interface FilterContract {

	public function filter( $query, array $filters);
}
