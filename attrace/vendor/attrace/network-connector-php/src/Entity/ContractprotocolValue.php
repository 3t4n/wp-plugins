<?php


namespace Attrace\Connector\Entity;


use Attrace\Connector\Protocol\Contractprotocol\ListMap;
use Attrace\Connector\Protocol\Contractprotocol\MapValue;
use Attrace\Connector\Protocol\Contractprotocol\Value;

class ContractprotocolValue
{

    /**
     *
     * Example:
    $listmap = ContractprotocolValue::createListMap(
    [
        [
            "Key"   => 1,
            "Value" => ["Str" => "lead=0.5;sale=12.5"]
        ],
        [
            "Key"   => 2,
            "Value" => ["Str" => "0,20,0.02,1;20,40.5,0.03,1;40.5,5000,10.5,2"]
        ]
    ]
    )
     * @param array $v
     * @return ListMap
     */

    public static function createListMap(array $v)
    {
        $ret = [];
        foreach ($v as $value) {
            $ret[] = self::createMapValue($value['Value'],$value['Key']);
        }
        $listmap = new ListMap();
        $listmap->setValues($ret);
        return $listmap;
    }


    /**
     * Able to handle array of format
     * ['Str' => "123.394"]
     * Example:
     * ContractprotocolValue::createValue(["Str" => "lead=0.5;sale=12.5"], 1);
     *
     * @param array $v
     * @param int null $key
     * @return MapValue
     */
    public static function createMapValue(array $v, $key = null)
    {

        $mapValueObj = new MapValue();
        $valueObj    = self::createValue($v);
        $mapValueObj->setValue($valueObj);
        if ($key) {
            $mapValueObj->setKey($key);
        }
        return $mapValueObj;
    }

    /**
     * Able to handle array of format
     * ['Str' => "123.394"]
     * Example:
     * ContractprotocolValue::createValue(["Str" => "lead=0.5;sale=12.5"], 1);
     *
     * @param array $v
     * @param int null $key
     * @return Value
     */
    public static function createValue(array $v)
    {

        $valueObj    = new Value();
        foreach ($v as $type => $value) {
            $operation = "set" . $type;
            $valueObj->{$operation}($value);
        }
        return $valueObj;
    }

}