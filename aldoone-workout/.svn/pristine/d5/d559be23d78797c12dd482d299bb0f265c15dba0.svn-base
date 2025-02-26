<?php
/*
* configure basics
*/
$prefix = '';

$basics_config = array(
    'id' => 'aldo_one_workout_metabox_basic',           // meta box id, unique per meta box 
    'title' => 'Basic Informations',   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_basic_meta = new AT_Meta_Box($basics_config);
$ao_workout_basic_meta->addImage('ao_workout_banner',array('name'=> 'Banner'));
$ao_workout_basic_meta->addSelect($prefix.'ao_workout_banner_size',array('col-lg-offset-2 col-lg-2'=>'Small','col-lg-offset-1 col-lg-3'=>'Medium','col-lg-4'=>'Big'),array('name'=> 'Banner Size', 'std'=> array('col-lg-offset-2 col-lg-2')));
$ao_workout_basic_meta->addSelect($prefix.'ao_workout_type',array('Strength'=>'Strength','Speed'=>'Speed','Endurance'=>'Endurance', 'Flexibility'=>'Flexibility'),array('name'=> 'Type', 'std'=> array('Strength')));
$ao_workout_basic_meta->addText($prefix.'ao_workout_duration',array('name'=> 'Duration'));
$ao_workout_basic_meta->addSelect($prefix.'ao_workout_intensity',array('Beginner'=>'Beginner','Intermediate'=>'Intermediate','Advanced'=>'Advanced','All'=>'All'),array('name'=> 'Intensity', 'std'=> array('ao_workout_intensity_1')));
$ao_workout_basic_meta->addText($prefix.'ao_workout_main_goal',array('name'=> 'Main Goal'));
$ao_workout_basic_meta->addTextarea($prefix.'ao_workout_description',array('name'=> 'Workout Description'));
$ao_workout_basic_meta->Finish();

/*
* configure Monday
*/
$monday_config = array(
    'id' => 'aldo_one_workout_metabox_monday',          // meta box id, unique per meta box 
    'title' => 'Monday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_monday_meta = new AT_Meta_Box($monday_config);
$ao_workout_monday_meta->addRadio($prefix.'ao_workout_monday_enabled',array('ao_workout_monday_enabled_1'=>'True','ao_workout_monday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_monday_enabled_2')));
$ao_workout_monday_meta->addText($prefix.'ao_workout_monday_duration',array('name'=> 'Duration'));
$ao_workout_monday_meta->addText($prefix.'ao_workout_monday_description',array('name'=> 'Description'));
$ao_workout_monday_repeater_fields[] = $ao_workout_monday_meta->addText($prefix.'ao_workout_monday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_monday_repeater_fields[] = $ao_workout_monday_meta->addTextarea($prefix.'ao_workout_monday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_monday_repeater_fields[] = $ao_workout_monday_meta->addText($prefix.'ao_workout_monday_video',array('name'=> 'Video Link'), true);
$ao_workout_monday_repeater_fields[] = $ao_workout_monday_meta->addText($prefix.'ao_workout_monday_sets',array('name'=> 'Sets'), true);
$ao_workout_monday_repeater_fields[] = $ao_workout_monday_meta->addText($prefix.'ao_workout_monday_reps',array('name'=> 'Reps'), true);
$ao_workout_monday_meta->addRepeaterBlock($prefix.'ao_workout_monday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_monday_repeater_fields));
$ao_workout_monday_meta->Finish();

/*
* configure Tuesday
*/
$tuesday_config = array(
    'id' => 'aldo_one_workout_metabox_tuesday',         // meta box id, unique per meta box 
    'title' => 'Tuesday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_tuesday_meta = new AT_Meta_Box($tuesday_config);
$ao_workout_tuesday_meta->addRadio($prefix.'ao_workout_tuesday_enabled',array('ao_workout_tuesday_enabled_1'=>'True','ao_workout_tuesday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_tuesday_enabled_2')));
$ao_workout_tuesday_meta->addText($prefix.'ao_workout_tuesday_duration',array('name'=> 'Duration'));
$ao_workout_tuesday_meta->addText($prefix.'ao_workout_tuesday_description',array('name'=> 'Description'));
$ao_workout_tuesday_repeater_fields[] = $ao_workout_tuesday_meta->addText($prefix.'ao_workout_tuesday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_tuesday_repeater_fields[] = $ao_workout_tuesday_meta->addTextarea($prefix.'ao_workout_tuesday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_tuesday_repeater_fields[] = $ao_workout_tuesday_meta->addText($prefix.'ao_workout_tuesday_video',array('name'=> 'Video Link'), true);
$ao_workout_tuesday_repeater_fields[] = $ao_workout_tuesday_meta->addText($prefix.'ao_workout_tuesday_sets',array('name'=> 'Sets'), true);
$ao_workout_tuesday_repeater_fields[] = $ao_workout_tuesday_meta->addText($prefix.'ao_workout_tuesday_reps',array('name'=> 'Reps'), true);
$ao_workout_tuesday_meta->addRepeaterBlock($prefix.'ao_workout_tuesday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_tuesday_repeater_fields));
$ao_workout_tuesday_meta->Finish();

/*
* configure Wednesday
*/
$wednesday_config = array(
    'id' => 'aldo_one_workout_metabox_wednesday',       // meta box id, unique per meta box 
    'title' => 'Wednesday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_wednesday_meta = new AT_Meta_Box($wednesday_config);
$ao_workout_wednesday_meta->addRadio($prefix.'ao_workout_wednesday_enabled',array('ao_workout_wednesday_enabled_1'=>'True','ao_workout_wednesday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_wednesday_enabled_2')));
$ao_workout_wednesday_meta->addText($prefix.'ao_workout_wednesday_duration',array('name'=> 'Duration'));
$ao_workout_wednesday_meta->addText($prefix.'ao_workout_wednesday_description',array('name'=> 'Description'));
$ao_workout_wednesday_repeater_fields[] = $ao_workout_wednesday_meta->addText($prefix.'ao_workout_wednesday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_wednesday_repeater_fields[] = $ao_workout_wednesday_meta->addTextarea($prefix.'ao_workout_wednesday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_wednesday_repeater_fields[] = $ao_workout_wednesday_meta->addText($prefix.'ao_workout_wednesday_video',array('name'=> 'Video Link'), true);
$ao_workout_wednesday_repeater_fields[] = $ao_workout_wednesday_meta->addText($prefix.'ao_workout_wednesday_sets',array('name'=> 'Sets'), true);
$ao_workout_wednesday_repeater_fields[] = $ao_workout_wednesday_meta->addText($prefix.'ao_workout_wednesday_reps',array('name'=> 'Reps'), true);
$ao_workout_wednesday_meta->addRepeaterBlock($prefix.'ao_workout_wednesday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_wednesday_repeater_fields));
$ao_workout_wednesday_meta->Finish();

/*
* configure Thursday
*/
$thursday_config = array(
    'id' => 'aldo_one_workout_metabox_thursday',       // meta box id, unique per meta box 
    'title' => 'Thursday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_thursday_meta = new AT_Meta_Box($thursday_config);
$ao_workout_thursday_meta->addRadio($prefix.'ao_workout_thursday_enabled',array('ao_workout_thursday_enabled_1'=>'True','ao_workout_thursday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_thursday_enabled_2')));
$ao_workout_thursday_meta->addText($prefix.'ao_workout_thursday_duration',array('name'=> 'Duration'));
$ao_workout_thursday_meta->addText($prefix.'ao_workout_thursday_description',array('name'=> 'Description'));
$ao_workout_thursday_repeater_fields[] = $ao_workout_thursday_meta->addText($prefix.'ao_workout_thursday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_thursday_repeater_fields[] = $ao_workout_thursday_meta->addTextarea($prefix.'ao_workout_thursday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_thursday_repeater_fields[] = $ao_workout_thursday_meta->addText($prefix.'ao_workout_thursday_video',array('name'=> 'Video Link'), true);
$ao_workout_thursday_repeater_fields[] = $ao_workout_thursday_meta->addText($prefix.'ao_workout_thursday_sets',array('name'=> 'Sets'), true);
$ao_workout_thursday_repeater_fields[] = $ao_workout_thursday_meta->addText($prefix.'ao_workout_thursday_reps',array('name'=> 'Reps'), true);
$ao_workout_thursday_meta->addRepeaterBlock($prefix.'ao_workout_thursday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_thursday_repeater_fields));
$ao_workout_thursday_meta->Finish();

/*
* configure Friday
*/
$friday_config = array(
    'id' => 'aldo_one_workout_metabox_friday',    		// meta box id, unique per meta box 
    'title' => 'Friday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_friday_meta = new AT_Meta_Box($friday_config);
$ao_workout_friday_meta->addRadio($prefix.'ao_workout_friday_enabled',array('ao_workout_friday_enabled_1'=>'True','ao_workout_friday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_friday_enabled_2')));
$ao_workout_friday_meta->addText($prefix.'ao_workout_friday_duration',array('name'=> 'Duration'));
$ao_workout_friday_meta->addText($prefix.'ao_workout_friday_description',array('name'=> 'Description'));
$ao_workout_friday_repeater_fields[] = $ao_workout_friday_meta->addText($prefix.'ao_workout_friday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_friday_repeater_fields[] = $ao_workout_friday_meta->addTextarea($prefix.'ao_workout_friday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_friday_repeater_fields[] = $ao_workout_friday_meta->addText($prefix.'ao_workout_friday_video',array('name'=> 'Video Link'), true);
$ao_workout_friday_repeater_fields[] = $ao_workout_friday_meta->addText($prefix.'ao_workout_friday_sets',array('name'=> 'Sets'), true);
$ao_workout_friday_repeater_fields[] = $ao_workout_friday_meta->addText($prefix.'ao_workout_friday_reps',array('name'=> 'Reps'), true);
$ao_workout_friday_meta->addRepeaterBlock($prefix.'ao_workout_friday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_friday_repeater_fields));
$ao_workout_friday_meta->Finish();

/*
* configure Saturday
*/
$saturday_config = array(
    'id' => 'aldo_one_workout_metabox_saturday',    		// meta box id, unique per meta box 
    'title' => 'Saturday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_saturday_meta = new AT_Meta_Box($saturday_config);
$ao_workout_saturday_meta->addRadio($prefix.'ao_workout_saturday_enabled',array('ao_workout_saturday_enabled_1'=>'True','ao_workout_saturday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_saturday_enabled_2')));
$ao_workout_saturday_meta->addText($prefix.'ao_workout_saturday_duration',array('name'=> 'Duration'));
$ao_workout_saturday_meta->addText($prefix.'ao_workout_saturday_description',array('name'=> 'Description'));
$ao_workout_saturday_repeater_fields[] = $ao_workout_saturday_meta->addText($prefix.'ao_workout_saturday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_saturday_repeater_fields[] = $ao_workout_saturday_meta->addTextarea($prefix.'ao_workout_saturday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_saturday_repeater_fields[] = $ao_workout_saturday_meta->addText($prefix.'ao_workout_saturday_video',array('name'=> 'Video Link'), true);
$ao_workout_saturday_repeater_fields[] = $ao_workout_saturday_meta->addText($prefix.'ao_workout_saturday_sets',array('name'=> 'Sets'), true);
$ao_workout_saturday_repeater_fields[] = $ao_workout_saturday_meta->addText($prefix.'ao_workout_saturday_reps',array('name'=> 'Reps'), true);
$ao_workout_saturday_meta->addRepeaterBlock($prefix.'ao_workout_saturday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_saturday_repeater_fields));
$ao_workout_saturday_meta->Finish();

/*
* configure Sunday
*/
$sunday_config = array(
    'id' => 'aldo_one_workout_metabox_sunday',    		// meta box id, unique per meta box 
    'title' => 'Sunday',			   					// meta box title
    'pages' => array('aldo_one_workout'),   			// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',	               				// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',    				            // order of meta box: high (default), low; optional
    'fields' => array(),                 				// list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false,            				// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            				//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$ao_workout_sunday_meta = new AT_Meta_Box($sunday_config);
$ao_workout_sunday_meta->addRadio($prefix.'ao_workout_sunday_enabled',array('ao_workout_sunday_enabled_1'=>'True','ao_workout_sunday_enabled_2'=>'False'),array('name'=> 'Enabled?', 'std'=> array('ao_workout_sunday_enabled_2')));
$ao_workout_sunday_meta->addText($prefix.'ao_workout_sunday_duration',array('name'=> 'Duration'));
$ao_workout_sunday_meta->addText($prefix.'ao_workout_sunday_description',array('name'=> 'Description'));
$ao_workout_sunday_repeater_fields[] = $ao_workout_sunday_meta->addText($prefix.'ao_workout_sunday_exercise',array('name'=> 'Exercise Name'),true);
$ao_workout_sunday_repeater_fields[] = $ao_workout_sunday_meta->addTextarea($prefix.'ao_workout_sunday_exercise_description',array('name'=> 'Exercise Description'),true);
$ao_workout_sunday_repeater_fields[] = $ao_workout_sunday_meta->addText($prefix.'ao_workout_sunday_video',array('name'=> 'Video Link'), true);
$ao_workout_sunday_repeater_fields[] = $ao_workout_sunday_meta->addText($prefix.'ao_workout_sunday_sets',array('name'=> 'Sets'), true);
$ao_workout_sunday_repeater_fields[] = $ao_workout_sunday_meta->addText($prefix.'ao_workout_sunday_reps',array('name'=> 'Reps'), true);
$ao_workout_sunday_meta->addRepeaterBlock($prefix.'ao_workout_sunday_re',array('inline' => true, 'name' => 'Exercise','fields' => $ao_workout_sunday_repeater_fields));
$ao_workout_sunday_meta->Finish();
?>