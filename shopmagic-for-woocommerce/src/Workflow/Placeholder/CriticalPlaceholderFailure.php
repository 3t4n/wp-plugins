<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Workflow\Placeholder;

use WPDesk\ShopMagic\Exception\ShopMagicException;

/**
 * Thrown when placeholder processing fails critically, and should prevent the workflow from continuing.
 *
 * @since 4.3.0
 */
class CriticalPlaceholderFailure extends \RuntimeException implements ShopMagicException {
}
