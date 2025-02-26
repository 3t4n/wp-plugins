<Style>
#luckydrawaddcontainer{
width:95%;
height:25em;
padding-left: 5%;
padding-top: 2em;

float: left;
  }
.luckydrawcard {
  width: 30%;
  height: 70%;
  float: left;
  border: none;
  margin-left: 2%;;
}

.luckydrawcontent {
  width: 100%;
  padding: 0;
  margin: 0;
  height: 100%;

  box-shadow: 0 0 15px rgba(0,0,0,0.1);
  transition: transform 1s;
  transform-style: preserve-3d;
}

.luckydrawcard:hover .luckydrawcontent {
  transform: rotateY( 180deg ) ;
  transition: transform 0.5s;
}

.front,
.back {
  position: absolute;
  height: 100%;
  width: 100%;
  background: white;
  color: #03446A;
  text-align: center;
  font-size: 30px;
  border-radius: 5px;
  backface-visibility: hidden;
}

.back {
  background: #03446A;
  color: white;
  transform: rotateY( 180deg );
}
form {
  display: inline-flex;
  height: 100%;
  width: 100%;
}
</Style>

<p class="fs-4 w-100 text-center">Choose Draw Type</p>
      <div id="luckydrawaddcontainer">
      <form action="<?php echo wp_kses_post(Lucky_Draw_Home_URL).'admin.php?page=adddraw&next=details';  ?>" method="post">
      <?php

      echo clard_flip("Shortcode","A Simple Draw That Can be placed Anywhere With Shortcode").'</submit>'; 
      echo clard_flip("Pop Up Draw","Create A Draw Box That Opens When User Visits A Page ");
      echo clard_flip("Image Draw","Create A Draw Box With Image Or Image With Text");
      ?> 
      </div>

      <!-- Modal footer -->
