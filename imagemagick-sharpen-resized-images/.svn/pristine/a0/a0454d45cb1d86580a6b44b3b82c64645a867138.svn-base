<?php
header("Content-Type: image/png");

date_default_timezone_set('GMT+0');
/* Create a new imagick object */
$im = new Imagick();

/* Create new image. This will be used as fill pattern */
$im->newPseudoImage(50, 50, "gradient:green-green");

/* Create imagickdraw object */
$draw = new ImagickDraw();

/* Start a new pattern called "gradient" */
$draw->pushPattern('gradient', 0, 0, 50, 50);

/* Composite the gradient on the pattern */
$draw->composite(Imagick::COMPOSITE_OVER, 0, 0, 50, 50, $im);

/* Close the pattern */
$draw->popPattern();

/* Use the pattern called "gradient" as the fill */
$draw->setFillPatternURL('#gradient');

/* Set font size to 52 */
$draw->setFontSize(20);

/* Annotate some text */
$draw->annotation(10, 20, "Imagick Installed!");
$draw->setFontSize(10);
$draw->annotation(10, 40, date(DATE_RFC2822));
/* Create a new canvas object and a white image */
$canvas = new Imagick();
$canvas->newImage(190, 50, "white");

/* Draw the ImagickDraw on to the canvas */
$canvas->drawImage($draw);

/* 1px black border around the image */
$canvas->borderImage('black', 1, 1);

/* Set the format to PNG */
$canvas->setImageFormat('png');

/* Output the image */

echo $canvas;
?>
