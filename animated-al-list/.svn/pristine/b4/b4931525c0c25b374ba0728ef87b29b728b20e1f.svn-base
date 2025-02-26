<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class AnimatedAl_DefaultValues{

public function defaultPositions()
  {
  $default_positions = array();
    //Equations
    $default_positions['equations'] = array();
    
    $default_positions['equations'][]='y=c';
    $default_positions['equations'][]='y=a*x+c';
    $default_positions['equations'][]='y=a*x*x+b*x+c';
    $default_positions['equations'][]='y=a*x*x*x+b*x*x+c*x+d';

    $default_positions['equations'][]='y=a*Math.sin(x/b)+c';
    $default_positions['equations'][]='y=a*Math.cos(x/b)+c';
    
    $default_positions['equations'][]='x=c';
    $default_positions['equations'][]='x=a*y*y+b*y+c';
    $default_positions['equations'][]='x=a*y*y*y+b*y*y+c*y+d';

    $default_positions['equations'][]='x=a*Math.sin(y/b)+c';
    $default_positions['equations'][]='x=a*Math.cos(y/b)+c';

    $default_positions['equations'][]='x*x+y*y=r*r';
        
    return $default_positions;
  }
public function predefinedPositions()
  {
    $predefined_settings = array();

    $predefined_settings[0]['name'] = 'ravine';    
    $predefined_settings[0]['equation'] = 'y=a*x*x+b*x+c';
    $predefined_settings[0]['a'] = -0.001;
    $predefined_settings[0]['b'] = 0;
    $predefined_settings[0]['c'] = 120;
    $predefined_settings[0]['left'] = -300;
    $predefined_settings[0]['top'] = 0;

    $predefined_settings[1]['name'] = 'hill';    
    $predefined_settings[1]['equation'] = 'y=a*x*x+b*x+c';
    $predefined_settings[1]['a'] = 0.001;
    $predefined_settings[1]['b'] = 0;
    $predefined_settings[1]['c'] = 0;
    $predefined_settings[1]['left'] = -300;
    $predefined_settings[1]['top'] = 0;

    $predefined_settings[2]['name'] = 'hillside';    
    $predefined_settings[2]['equation'] = 'y=a*x*x+b*x+c';
    $predefined_settings[2]['a'] = -0.001;
    $predefined_settings[2]['b'] = 0;
    $predefined_settings[2]['c'] = 0;
    $predefined_settings[2]['left'] = 0;
    $predefined_settings[2]['top'] = -300;

    $predefined_settings[3]['name'] = 'bluff';    
    $predefined_settings[3]['equation'] = 'x=a*y*y+b*y+c';
    $predefined_settings[3]['a'] = 0.001;
    $predefined_settings[3]['b'] = 1;
    $predefined_settings[3]['c'] = 1;
    $predefined_settings[3]['left'] = 0;
    $predefined_settings[3]['top'] = 0;

    $predefined_settings[4]['name'] = 'arch out';    
    $predefined_settings[4]['equation'] = 'x=a*y*y+b*y+c';
    $predefined_settings[4]['a'] = 0.001;
    $predefined_settings[4]['b'] = 0;
    $predefined_settings[4]['c'] = 0;
    $predefined_settings[4]['left'] = -50;
    $predefined_settings[4]['top'] = -100;

    $predefined_settings[5]['name'] = 'arch in';    
    $predefined_settings[5]['equation'] = 'x=a*y*y+b*y+c';
    $predefined_settings[5]['a'] = -0.001;
    $predefined_settings[5]['b'] = 0;
    $predefined_settings[5]['c'] = 0;
    $predefined_settings[5]['left'] = -150;
    $predefined_settings[5]['top'] = -100;

    $predefined_settings[6]['name'] = 'spiral asc';    
    $predefined_settings[6]['equation'] = 'y=a*Math.cos(x/b)+c';
    $predefined_settings[6]['a'] = 100;
    $predefined_settings[6]['b'] = 10;
    $predefined_settings[6]['c'] = 0;
    $predefined_settings[6]['left'] = -100;
    $predefined_settings[6]['top'] = -100;

    $predefined_settings[7]['name'] = 'spiral desc';    
    $predefined_settings[7]['equation'] = 'y=a*Math.sin(x/b)+c';
    $predefined_settings[7]['a'] = 100;
    $predefined_settings[7]['b'] = 10;
    $predefined_settings[7]['c'] = 0;
    $predefined_settings[7]['left'] = -100;
    $predefined_settings[7]['top'] = -100;

    $predefined_settings[8]['name'] = 'horizontal';    
    $predefined_settings[8]['equation'] = 'y=c';
    $predefined_settings[8]['c'] = 20;
    $predefined_settings[8]['left'] = 0;
    $predefined_settings[8]['top'] = 0;

    $predefined_settings[9]['name'] = 'vertical';    
    $predefined_settings[9]['equation'] = 'x=c';
    $predefined_settings[9]['c'] = 20;
    $predefined_settings[9]['left'] = 0;
    $predefined_settings[9]['top'] = 0;

  return $predefined_settings;
  }
public function predefinedEffects()
  {
    $effects = array();
    
    // 0 index - none
    $effects[0][0] = "1-12";
      $effects[0][1] = "default";
    $effects[1][0] = "1-11";
      $effects[1][1] = "blink";
    $effects[2][0] = "1-11";
      $effects[2][1] = "grow";
    $effects[3][0] = "1-11";
      $effects[3][1] = "reduce";
    $effects[4][0] = "1-11";
      $effects[4][1] = "chain";
    $effects[6][0] = "1-12";
      $effects[6][1] = "two_random_x";
    $effects[7][0] = "1-12";
      $effects[7][1] = "two_random_y";
    $effects[8][0] = "1-12";
      $effects[8][1] = "two_random_min_max";
    $effects[9][0] = "1-12";
      $effects[9][1] = "two_random_opacity";
    $effects[10][0] = "1-12";
      $effects[10][1] = "substitution_y";
    $effects[11][0] = "1-12";
      $effects[11][1] = "substitution_x";
    $effects[12][0] = "1-12";
      $effects[12][1] = "substitution";
    $effects[13][0] = "1-12";
      $effects[13][1] = "left_exchange";
    $effects[14][0] = "1-12";
      $effects[14][1] = "right_exchange";
    $effects[15][0] = "1-12";
      $effects[15][1] = "up_exchange";
    $effects[16][0] = "1-12";
      $effects[16][1] = "down_exchange";
      
    $effects[5][0] = "12-12";
      $effects[5][1] = "appear_disapear";

    $effects[17][0] = "1-11";
      $effects[17][1] = "long_list_move";
    $effects[18][0] = "1-11";
      $effects[18][1] = "long_list_blink";
    $effects[19][0] = "1-11";
      $effects[19][1] = "long_list_up_exchange";
    $effects[20][0] = "1-11";
      $effects[20][1] = "long_list_substitution_y";
    $effects[21][0] = "1-11";
      $effects[21][1] = "long_list_two_opacity";

      
      return $effects;
  }
}
?>