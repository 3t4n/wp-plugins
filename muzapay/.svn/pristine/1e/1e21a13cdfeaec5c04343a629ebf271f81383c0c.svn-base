<?php

declare (strict_types=1);
namespace MuzaPayDeps\Wpify\Model;

use MuzaPayDeps\Wpify\Model\Attributes\TermPostsRelation;
class ProductCat extends Term
{
    /**
     * Products assigned to this tag.
     *
     * @var Post[]
     */
    #[TermPostsRelation(Product::class)]
    public array $products = array();
}
