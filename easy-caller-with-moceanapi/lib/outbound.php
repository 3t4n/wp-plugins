<?php
/*
emc outbound script
*/

$welcome = sanitize_text_field(urldecode($_GET['welcome']));
$operatornumber = sanitize_text_field(get_option('emc_setting_number'));
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <?php 
    if( $welcome){
        echo '<Say>'. $welcome.'</Say>';
    }
    ?>
    <Dial>
        <Number url="screen_for_machine.php">
            <?php echo $operatorNumber; ?>
        </Number>
    </Dial>
    <Say>Goodbye.</Say>
</Response>
