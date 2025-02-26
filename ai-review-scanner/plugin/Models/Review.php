<?php

namespace AIReviewScanner\Models;

if (!defined('ABSPATH')) {
    exit;
}

use AIReviewScanner\WPBones\Database\Model;

class Review extends Model
{
    protected $table = 'comments';

    public static ?string $postType = 'review';

}
