=== Plugin Name ===
Contributors: yashanm, ggmittal
Tags: chart, charts, coulmn chart, line chart, spline chart, area chart, pie chart, doughnut chart, canvas, canvasjs, json, csv, diagram, graph
Requires at least: 3.1
Tested up to: 4.0
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create interactive charts using HTML5 canvas, Supports 6 types of charts, Creat at backend and easily add in your post

== Description ==

Osnic Charts allows to create and preview interactive charts at backend using canvasjs library. You can add these charts to your posts using short-codes. It creates responsive charts which are compatible on all devices i.e computers, tablets and mobile screens. You just have to define comma separated values for your chart and it will interactive charts for you. Supports six types of charts -

1.Column Chart
2. Line Chart
3. Spline Chart
4. Area Chart
5. Pie Chart
6. Doughnut Chart

= Usage =
Create a chart by filling in the form and save the chart. Now you can use the following short-code in your post to add it in your post -

[osnic_charts id="id"]

id is to be replaced with the chart id. For ex -

[osnic_charts id="5"]

where 5 is the chart id.

The default height and width of the chart is 300x300. You can edit chart width and height easily by passing it in shortcode. Add the following parameters in shortcode - 

[osnic_charts id="id" width="integer value" height="integer value"]

For ex - 

[osnic_charts id="5" width="500" height="400"]

The above shortcode will create a chart of width 400px and height 400px.

== Installation ==

1. Upload `osnic_charts` direcotry to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
	And you are ready to create charts.

== Frequently Asked Questions ==

= What values does x-axis support? =

You can leave x-axis blank and it will create integer intervals automatically. Or you can enter any comma separated values like: apple,banana,orange or 10,20,30

= What values does y-axis support? =

y-axis only support numeric values. apple,banana,orange values are invalid.


== Changelog ==

= 1.0 =
* Initial Version of plugin

= 1.1 =
* Fixed several bugs and improved working

= 1.2 =
* Added admin notices for updation,deletion and creation of new charts
* UI improvements
* Added deletion of charts