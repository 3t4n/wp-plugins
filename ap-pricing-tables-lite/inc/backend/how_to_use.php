<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
include('common/header.php');
?>
<div class="appts-use-title">HOW TO USE</div>
<div class="appts-use-title-content">
    <div class='appts-how-to-use-wrapper'>
        <p>To create the pricing table is very easy. First you need to create a new pricing table if you haven't created one. </p>

        <p>To create a pricing table please click on "Add new table" button link, A page will load and please configure it as per your need. </p>

        <p>The pricing table creation process is very simple.
        </p>

        <div class='appts-header-wrap'>Table Name</div>
        <p>For the vary first step please enter your pricing table name and shortcode ID. Table name is for your refrence only so that it will be easier for you to view the table for later reference. Shortcode ID is ID that will be used in the shortcode. You can enter your own shortcode id as well so that it will be easier for you to use the shortcode. Or you can use auto generated shortcode id as it is.</p>


        <div class='appts-header-wrap'>Template selection and styles</div>
        <p>Here you can configure various options related to table like you can configure the layout of the table by selecting template. You can define the column border radius for specified templates, space between columns, column width. </p>

        <div class="appts-header-wrap">Currency Settings</div>
        <p>In this section you can configure the currency option. Here you can choose currency symbol, decimal separator, number of decimal to be displayed and thousand separator.</p>

        <div class='wppts-header-wrap'>Custom CSS</div>
        <p>In this section you can write your own custom css for this table if you need to do small changes in the table.</p>

        <div class='appts-header-wrap'>Column Editor</div>
        <p>In this section you will get an option to add columns to the table. You can add upto 4 columns.</p>
        <p>Each column section will have column settings, header, body and footer part. </p>
        <div class="appts-sub_heading-wrap">
            <div class='appts-subheader-wrap'>General settings</div>
            <p>In this settings you can configure the outlay of the column like option to enable/disable column highlight, enable/disable hover effect, ribbon settings, box shadow settings.</p>

            <div class='appts-subheader-wrap'>Header Settings</div>
            <p>In header section you can configure the feature image of the column, title and subtitle of the table, Price fields, Option to remove header section completely.</p>

            <div class='appts-subheader-wrap'>Body settings</div>
            <p>In body section you can add upto 4 body rows as per your need. In each row you can enter either html content or button.</p>

            <div class='appts-subheader-wrap'>Footer settings</div>
            <p>In footer section you can add upto 4 footer rows as per your need. In each row you can enter either html content or button.</p>
        </div>

        <p>After setting up the desired columns for table when you click save button the table will be created and you will get the shortcode.</p>

        <p>To display the pricing table in the frontend is also very easy. You need to insert the generated shortcode in the post or page. You can direclty use the shortcode in post's or page's content as well or you can use template shortcode to use it in the template files.</p>
    </div><!-- How to use wrapper ends -->

</div>
<?php include('common/footer.php'); ?>