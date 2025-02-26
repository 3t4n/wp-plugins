<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h4 class="dash_appdashtitle">
    <span>Latest Activities:</span> <span style="margin-left:68px">OFFICE PHONE</span> <span style="margin-left:44px">RETURNS</span>
</h4>
<div class="dash_latest_list">
    <ul style="margin: 0;">
        <?php
// echo '<pre>';
// print_r($activities);
// echo '</pre>';
        for ($i = 0; $i < 3; $i++) {
            ?>
            <li>
                <img src="http://tax.local/wp-content/plugins/application-maker-crm-edition/img//user2_16.png">
                <span class="col1"><?php echo $default_name ?> NAME</span>
                <span class="col2" >(CITY,ST)PHONE11234</span>
                <span class="col3" >NOT PAID PAID</span>
            </li>
            <?php
        }
        ?>
        <li><hr></li>
        <li style="text-align: right;">YOUR TOTAL RETURNS: NOT PAID PAID</li>
    </ul>
</div>

<style>
    .dash_latest_list li {
        border:none;
        float: left;
        width: 100%;
        margin:0;
    }
    .dash_latest_list li hr{
        margin:10px 0;
    }
    .dash_latest_list li img{
        float:left;
    }
    .dash_latest_list li .col1{
        float:left;
        width:132px;
    }
    .dash_latest_list li .col2{
        float:left;
        width:110px;
        margin-left:7px;
    }
    .dash_latest_list li .col3{
        float:left;
        width:75px;
        margin-left: 10px;
    }
</style>
