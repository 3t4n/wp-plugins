<?php

/*
Template Name: Frontend page layout
*/

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

global $user_ID;



 ?>

<style type="text/css">
  

/***************** Front Page style start **********************/

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-top: 35px;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

.toploginsection {
    height: 100px;
    text-align: center;
    background-color: #f11c64;
}

span.serviceloginheading {
    font-size: 65px;
    font-family: fantasy;
    text-align: center;
    color: #ffffff;
}

/************** Front Page style close**********************/

</style>


<div class="container">

<?php 

$user = get_userdata( $user_ID );

	if ( in_array( 'wp_gs_service_user_key', (array) $user->roles ) ) { 

?>

  <div class="row">
    <div class="col-sm-3">

<div class="card" >
 <!--  <?php
$user = wp_get_current_user();
 
if ( $user ) :
    ?>
    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="John" style="width:100%" />
<?php endif; ?> -->

  <h1><?php echo esc_html($user->display_name); ?></h1>
  <p><?php echo esc_html($user->user_email); ?></p>

<a href="<?php echo site_url().'/wp-admin/profile.php'; ?>">
<button type="button" class="btn btn-primary" style="background-color:#001e80; width: 40%;">
  Edit
</button>
 </a>

  <p><a href="<?php echo wp_logout_url(home_url('my_gs_service')); ?>"><button>Logout</button></a></p>

</div>


    </div>
    <div class="col-sm-9">

  <div class="panel-body">
    
     <?php //my_service_list
     		echo do_shortcode('[my_service_list]');
      ?>
  </div>
</div>
</div>

<?php  } else { ?>

<div class="card" >
  <div class="toploginsection">
  	<span class="serviceloginheading">Login Now</span>
  </div>

<?php 

$user = wp_get_current_user();
$allowed_roles = array( 'editor', 'administrator', 'author' );
if ( ! array_intersect( $allowed_roles, $user->roles ) ) { ?>
<h1>User Login</h1>
<?php
    // show any error messages after form submission
    my_services_error_messages(); ?>
    
  <a type="button" class="btn " data-toggle="modal" data-target="#myModal">
  	<button>Login To Enroll</button>
  </a>
 <?php } else { ?>
  <p><a href="<?php echo wp_logout_url(); ?>"><button>Logout</button></a></p>
<?php  } 
	?>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
<button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 25%;float: right;" >Close</button>

      </div>

<?php echo do_shortcode('[login_form]'); ?>

    </div>
  </div>
</div>


  <p><button><?php echo esc_html(get_bloginfo( 'name' )); ?></button></p>

</div>

<?php } ?>


</div>

 <?php get_footer(); ?>