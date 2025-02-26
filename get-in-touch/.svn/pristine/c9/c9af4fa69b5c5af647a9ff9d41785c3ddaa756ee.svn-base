<?php
namespace git;

function gitGetCheckBoxVal($Value)
{
	if($Value == 'on')
	{
		return 1;
	}

	return 0;
}

function gitExplodeFields($Data)
{
    $Data = preg_replace('/\W/',' ', $Data);
    $Data = preg_replace('/\s+/', ' ', $Data);
    $Data = trim($Data);

    $Data = explode(' ', $Data);
    $Data = array_unique($Data);

    return $Data;
}

function gitGetFormFieldsData($Data)
{
    $FieldData = array();
    $FieldInnData = array();

    foreach ($Data['name'] as $key => $value)
    {
       $FieldInnData['name'] = sanitize_text_field($value);
       array_push($FieldData, $FieldInnData);
    }

    return json_encode($FieldData);
}

function gitGetInputFields($Fields)
{
    foreach ($Fields as $value)
    {
        $field .= $value;
    }

    return $field;
}

function gitGetCheckBox($Value)
{
    if($Value == '1')
    {
        echo 'checked';
    }
    else
    {
        echo '';
    }
}

function gitRedirectTo($url)
{
    if (headers_sent())
    {
      die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
    }
    else
    {
      header('Location: ' . $url);
      die();
    }
}

//Function to Get Time in Human Readable Form
function humanTiming($time)
{
  $time = time() - $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text)
    {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
}

function color_inverse($color)
{
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6){ return '000000'; }
    $rgb = '';
    for ($x=0;$x<3;$x++){
        $c = 255 - hexdec(substr($color,(2*$x),2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
    }
    return '#'.$rgb;
}
