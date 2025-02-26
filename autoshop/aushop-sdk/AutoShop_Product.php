<?php

/**
 * User: AutoShop
 * Date: 1/12/16
 * Time: 5:43 PM
 */
class AutoShop_Product
{
    /**
     * Shop Product ID
     *
     * @var int
     */
    public $spid;

    /**
     * Product Name
     *
     * @var string
     */
    public $name;

    /**
     * Product Code
     *
     * @var string
     */
    public $code;

    /**
     * Product Description
     *
     * @var string
     */
    public $desc;

    /**
     * Product Price
     *
     * @var float
     */
    public $price;

    /**
     * Product Thumbnail
     *
     * @var string
     */
    public $thumbs;

    /**
     * Product Quantity
     *
     * @var string
     */
    public $quantity;

    /**
     * Product Url
     *
     * @var string
     */
    public $link;

    /**
     * AutoShop_Product constructor.
     * @param int $spid
     * @param string $name
     * @param string $code
     * @param string $desc
     * @param float $price
     * @param string $thumbs
     * @param string $quantity
     * @param string $link
     */
    public function __construct($spid, $name, $code, $desc, $price, $thumbs, $quantity, $link)
    {
        $this->spid = $spid;
        $this->name = $name;
        $this->code = $code;
        $this->desc = $desc;
        $this->price = $price;
        $this->thumbs = $thumbs;
        $this->quantity = $quantity;
        $this->link = $link;
    }

}