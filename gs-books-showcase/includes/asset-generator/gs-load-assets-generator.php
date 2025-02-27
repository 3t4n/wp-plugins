<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/gs-asset-generator-base.php';
require_once __DIR__ . '/gs-books-asset-generator.php';

// Needed for pro compatibility
do_action( 'gs_book_assets_generator_loaded' );