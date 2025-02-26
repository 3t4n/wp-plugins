<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Controller_Positions extends AnimatedAl_Controller{
private $model_positions;

public function __construct($model_positions)
  {
  parent::__construct();
    $this->model_positions = $model_positions;
  }

public function saveEffect()
  {
   if (isset($_POST['save_items_effect_btn']))
    {
      $this->check('items_effect_ins');
      
      $this->model_positions->saveEffect($_POST, $_POST['proj_id']);
      
      return true;
    }
   return false; 
  }

public function savePositions()
  {
   if (isset($_POST['save_items_positions_btn']))
    {
      $this->check('items_positions_ins');
      
      $this->model_positions->savePositions($_POST, $_POST['proj_id']);
      
      return true;
    }
   return false; 
  }
public function listofEquations()
  {
      $df = new AnimatedAl_DefaultValues();
        $source = $df->defaultPositions();
        
  return $source['equations'];
  }
public function predefinedlist()
  {
      $df = new AnimatedAl_DefaultValues();
        $source = $df->predefinedPositions();
        
  return $source;
  }
public function predefinedEffects()
  {
$effects_class = new AnimatedAl_DefaultValues();
  $effects = $effects_class->predefinedEffects();

  return $effects;
  }

public function execute()
  {
  //List of equation
    $equations = $this->listofEquations();
  
  //Predefined list
    $plist = $this->predefinedlist();
  
  //Predefined Effects
    $peffects = $this->predefinedEffects();
  
  //save positions
    $this->savePositions();
  
  //save effect
    $this->saveEffect();
    
    return array($equations, $plist, $peffects);
  }
}
?>