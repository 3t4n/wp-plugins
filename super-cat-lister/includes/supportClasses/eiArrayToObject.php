<?php
if(!class_exists("eiArrayToObject")) {
class EIArrayToObject {
//Feed the function $convert an associative array and an object and it will convert the array to an object.

function EIArrayToObject() {
}//end function EIArrayToObject



//input both an array and an object and it will convert the array to the object
function convertArrayToObject($array, &$obj)
{
foreach ($array as $key => $value)
{
if (is_array($value))
{
$obj->$key = new stdClass();
$this->convertArrayToObject($value, $obj->$key);
}
else
{
$obj->$key = $value;
}
}
return $obj;
}//end convert 



//input an object and it will output an array
function convertObjectToArray($data) 
{
  if(is_array($data) || is_object($data))
  {
    $result = array(); 
    foreach($data as $key => $value)
    { 
      $result[$key] = $this->convertObjectToArray($value); 
    }
    return $result;
  }
  return $data;
}



}//end class EIArrayToObject
}//end if(!class_exists("ArrayToObject")) {

/*example of usage of this class

//create test array
$inner1['color'] = 'red';
$inner1['background'] = 'black';
$testArray['one'] = $inner1;

$inner2['width'] = 100;
$inner2['height'] = 50;
$testArray['two'] = $inner2;

//display values of test array
echo 'Array Color: '.$testArray['one']['color'];
echo '<br>';
echo 'Array Background: '.$testArray['one']['background'];
echo '<br>';
echo 'Array Width: '.$testArray['two']['width'];
echo '<br>';
echo 'Array Height: '.$testArray['two']['height'];

//create a test object
$testObject = new stdClass();

//instantiate class
$arrayToObject = new ArrayToObject();

//convert array to object
$arrayToObject->convertArrayToObject($testArray, $testObject);

//display values of test object
echo '<br><br>';

echo 'Object Color: '.$testObject->one->color;
echo '<br>';
echo 'Object Background: '.$testObject->one->background;
echo '<br>';
echo 'Object Width: '.$testObject->two->width;
echo '<br>';
echo 'Object Height: '.$testObject->two->height;

echo '<br><br>Now, go the other way...';

echo '<br><br>';

$testArray2 = $arrayToObject->convertObjectToArray($testObject);

//display values of test array
echo 'Array2 Color: '.$testArray2['one']['color'];
echo '<br>';
echo 'Array2 Background: '.$testArray2['one']['background'];
echo '<br>';
echo 'Array2 Width: '.$testArray2['two']['width'];
echo '<br>';
echo 'Array2 Height: '.$testArray2['two']['height'];

//end example of usage of this class
*/

?>