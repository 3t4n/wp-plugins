<?php
define( 'APSRewriter__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once APSRewriter__PLUGIN_DIR.'article-rewriter.php';
require_once APSRewriter__PLUGIN_DIR.'article-rewriter-title.php';

?>

<div class="wrap">

    <h2>Welcome To Auto Post Spinner</h2>

    <div>
        <h3>FAQ</h3>
        <p id="aps_p_blod">How to spin the content?</p>
    <p>Its quit easy to spin the content you have to just fill the Title, Description and hit the Spin Content button.</p>
    <p id="aps_p_blod">Did I get spin content every time?</p>
    <p>Yes off course every time you will add the information and spin it, you will get unique content every time.</p>
    
    </div>
    <form action="<?php the_permalink(); ?>" method="post" >
        <label>Post Title:</label>
        <br/>
        <input type="text" name="aps_title" style="width: 80%" id="aps_title" />
        <br/>
        <br/>
        <label>Post Description:</label>
        <br/>
        <textarea name="aps_description" style="width: 80%" id="aps_description"></textarea>
        <br/>
        <br/>
        <input type="submit" name="asp_submit" id="aspsubmit" value="Spin Content" />
    </form>


    <?php
    if (isset($_POST["asp_submit"])) {


        if (!empty($_POST["aps_description"]) && !empty($_POST["aps_title"])) {

            $aps_description = $_POST["aps_description"];
            $aps_description = urldecode($aps_description);


            $aps_title = $_POST["aps_title"];
            $aps_title = urldecode($aps_title);

            $rewrite_title = auto_post_spinner_plugin_rewrite_title($aps_title);
            $rewrite_description = auto_post_spinner_plugin_rewrite_content($aps_description);
            ?>
            <div>
                <h2>Spin Content Result</h2>   
                <label>Post Title:</label>
                <br/>
                <input type="text" name="aps_rewrite_title" style="width: 80%" value="<?php echo $rewrite_title; ?>" id="aps_rewrite_title" />
                <br/>
                <br/>
                <label>Post Description:</label>
                <br/>
                <textarea name="aps_rewrite_description" style="width: 80%" id="aps_rewrite_description"><?php echo $rewrite_description; ?></textarea>


            </div>            

            <?php
        } else {
            $Title_error = "Title is empty.";

            $Description_error = "Description is empty.";
        
            $aps_error = "aps_error";
        }
        ?> 

        <?php
    }
    ?>     
    <div id="<?php echo $aps_error; ?>">
        <label><?php echo $Title_error; ?></label>
        <br/>
        <label><?php echo $Description_error; ?></label>
    </div>


</div>