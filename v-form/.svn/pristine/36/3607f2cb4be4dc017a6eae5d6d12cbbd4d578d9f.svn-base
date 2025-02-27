<style>
    .mainpopup {
    position: fixed;
    top: 75px;
    background: rgb(0 0 0 / 14%);
    color: #fff;
    padding: 20px;
    z-index: 99999;
    width: 100%;
    height: 100%;
    left: 0;
    word-wrap: break-word;
    display:none;
}
   .popcode {
    width: 50%;
    background: #000;
    left: 27%;
    top:100px;
    position: relative;
    height: 361px;
    overflow-y: scroll;
    padding: 28px;
    z-index: 999;
}
.popcode[data-id="1"], .popcode[data-id="2"], .popcode[data-id="3"], .popcode[data-id="4"]{
    display:none;
}
.crosspop {
    background: #fff;
    position: absolute;
    top: 10px;
    color: #000;
    width: 30px;
    height: 30px;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50px;
    right: 10px;
    cursor: pointer;
    font-size:15px;
}
.mypar{
    
    color:#fff;
    text-align:center;
    background: #000;
    padding: 9px;
    width: 404px;
    margin: auto;
}
</style>


<!-- template1 -->

<div class="mainpopup">

<p class="mypar">Copy all code and paste in the message section.</p>

    <div class="popcode" data-id="1">
        <div class="crosspop">&#10006;</div>
        <?php
            $file_contents = file_get_contents( VFORM_PLUGIN_PATH."inc/admin/templates/template1.php");
            echo htmlspecialchars($file_contents);
        ?>
    </div>
    <div class="popcode" data-id="2">
        <div class="crosspop"> &#10006;</div>
        <?php
            $file_contents = file_get_contents( VFORM_PLUGIN_PATH."inc/admin/templates/template2.php");
            echo htmlspecialchars($file_contents);
        ?>
    </div>
    <div class="popcode" data-id="3">
        <div class="crosspop"> &#10006;</div>
        <?php
            $file_contents = file_get_contents( VFORM_PLUGIN_PATH."inc/admin/templates/template3.php");
            echo htmlspecialchars($file_contents);
        ?>
    </div>
    <div class="popcode" data-id="4">
        <div class="crosspop"> &#10006;</div>
        <?php
            $file_contents = file_get_contents( VFORM_PLUGIN_PATH."inc/admin/templates/template4.php");
            echo htmlspecialchars($file_contents);
        ?>
    </div>


</div>