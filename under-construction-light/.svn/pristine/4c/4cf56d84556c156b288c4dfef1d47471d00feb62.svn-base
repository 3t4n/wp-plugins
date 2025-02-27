<style>
img{max-width: 100%;
    height: 100%;
    position: relative;
    width: 100%;
    object-fit: cover;}
body{margin:0;padding:0;}
body.txtonly {
    background: #333;
}
body.txtonly h1 {
    color: #fff;
    width: 100%;
    font-size: 5vw;
    text-align: center;
    margin: 10vw 0;
}
</style>
<?php
$blogName = get_bloginfo( 'name' );
if(get_option( 'ucl_phpespeto_field' )){
?>
<img src="<?php echo esc_attr(get_option( 'ucl_phpespeto_field' )); ?>" alt="<?php echo esc_attr($blogName); ?>">
<?php
}
else{
    ?>
    <body class='txtonly'>
        <h1> Website <span>Under Construction</span></h1>
    </body>
<?php
}