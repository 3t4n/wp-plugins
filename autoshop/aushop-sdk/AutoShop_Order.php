<?php

/**
 * User: AutoShop
 * Date: 1/12/16
 * Time: 5:42 PM
 */
class AutoShop_Order
{
    /**
     * Shop Order ID
     *
     * @var int
     */
    public $soid;

    /**
     * Guest Full Name
     *
     * @var string
     */
    public $fullname;

    /**
     * Guest Address
     *
     * @var string
     */
    public $address;

    /**
     * Guest Phone
     *
     * @var string
     */
    public $phone;

    /**
     * Guest Email
     *
     * @var string
     */
    public $email;

    /**
     * Array of Products
     *
     * @var object[]
     */
    public $products;

    /**
     * AutoShop_Order constructor.
     * @param string $soid
     * @param string $fullname
     * @param string $address
     * @param string $phone
     * @param string $email
     */
    public function __construct($soid, $fullname, $address, $phone, $email)
    {
        $this->soid = $soid;
        $this->fullname = $fullname;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->products = array();
    }

    /**
     * add Product to Order
     *
     * @param AutoShop_Product $product
     */
    public function addProduct($product)
    {
        if ($product != null)
        {
            $this->products[] = $product;
        }
    }

    /**
     * return Order Json
     *
     * @return string
     */
    public function getPayloadJson()
    {
        $payload = [];
        foreach ($this as $key=>$val)
        {
            $payload[$key] = $val;
        }
        $payload['products'] = $this->products;

        return json_encode($payload);
    }
}