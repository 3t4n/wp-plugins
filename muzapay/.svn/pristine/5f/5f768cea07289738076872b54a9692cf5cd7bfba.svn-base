<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */
declare (strict_types=1);
namespace MuzaPayDeps\Wpify\Model\Attributes;

use Attribute;
use MuzaPayDeps\Wpify\Model\Order;
use MuzaPayDeps\Wpify\Model\OrderItem;
use MuzaPayDeps\Wpify\Model\Product;
use MuzaPayDeps\Wpify\Model\Interfaces\ModelInterface;
use MuzaPayDeps\Wpify\Model\Comment;
use MuzaPayDeps\Wpify\Model\Interfaces\SourceAttributeInterface;
use MuzaPayDeps\Wpify\Model\Post;
use MuzaPayDeps\Wpify\Model\Term;
use MuzaPayDeps\Wpify\Model\User;
#[Attribute(Attribute::TARGET_PROPERTY)]
class Meta implements SourceAttributeInterface
{
    public function __construct(public ?string $meta_key = null, public bool $single = \true)
    {
    }
    public function get(ModelInterface $model, string $key): mixed
    {
        $meta_key = $this->meta_key ?? $key;
        if ($model instanceof Post) {
            return get_post_meta($model->id, $meta_key, $this->single);
        } elseif ($model instanceof User) {
            return get_user_meta($model->id, $meta_key, $this->single);
        } elseif ($model instanceof Term) {
            return get_term_meta($model->id, $meta_key, $this->single);
        } elseif ($model instanceof Comment) {
            return get_comment_meta($model->id, $meta_key, $this->single);
        } elseif ($model instanceof Product || $model instanceof OrderItem || $model instanceof Order) {
            return $model->source()->get_meta($meta_key, $this->single);
        }
        return null;
    }
    public function set(ModelInterface $model, string $key, mixed $value): mixed
    {
        $meta_key = $this->meta_key ?? $key;
        if ($model instanceof Product || $model instanceof OrderItem || $model instanceof Order) {
            return $model->source()->update_meta_data($meta_key, $value);
        }
        return null;
    }
}
