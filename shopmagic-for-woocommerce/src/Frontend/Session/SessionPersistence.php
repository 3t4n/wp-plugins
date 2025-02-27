<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Frontend\Session;

interface SessionPersistence {

	public function get_tracking_data(): array;

	public function save_tracking_data( array $data ): void;
}
