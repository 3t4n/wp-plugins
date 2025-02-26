<?php
 global $wpdb;
     $prefix = $wpdb->prefix;
    // require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    $sqlstudent = "CREATE TABLE `{$prefix}eusr_student_result` (
 `sid` int(10) NOT NULL AUTO_INCREMENT,
 `sno` varchar(5) NOT NULL,
 `regno` varchar(20) NOT NULL,
 `name` varchar(50) NOT NULL,
 `gender` varchar(50) NOT NULL,
 `fname` varchar(50) NOT NULL,
 `mname` varchar(50) NOT NULL,
 `remark` varchar(50) NOT NULL,
 `class` varchar(50) NOT NULL,
 PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1";
    $wpdb->query($sqlstudent);
   
    $sqlschool = "CREATE TABLE `{$prefix}eusr_school_info` ( `sc_id` INT(10) NOT NULL AUTO_INCREMENT ,  `sc_name` VARCHAR(100) NOT NULL ,  `vill` VARCHAR(30) NOT NULL ,  `pin` VARCHAR(10) NOT NULL ,  `ps` VARCHAR(30) NOT NULL ,  `dist` VARCHAR(30) NOT NULL ,  `state` VARCHAR(30) NOT NULL ,  `contact` VARCHAR(20) NOT NULL ,  `website` VARCHAR(100) NOT NULL ,  `logo` VARCHAR(100) NOT NULL ,  `field1` VARCHAR(100) NOT NULL ,    PRIMARY KEY  (`sc_id`)) ENGINE = InnoDB";
    $wpdb->query($sqlschool);
    
    $sqlview = "CREATE TABLE `{$prefix}eusr_view_settings` (
 `vid` int(10) NOT NULL AUTO_INCREMENT,
 `methodfield` varchar(30) NOT NULL,
 `titlefield` varchar(30) NOT NULL,
 `namefield` varchar(50) NOT NULL,
 `genderfield` varchar(30) NOT NULL,
 `fnamefield` varchar(30) NOT NULL,
 `mnamefield` varchar(30) NOT NULL,
 `subjectfield` varchar(50) NOT NULL,
 `classfield` varchar(30) NOT NULL,
 `regnofield` varchar(30) NOT NULL,
 `rollfield` varchar(30) NOT NULL,
 `totalfield` varchar(30) NOT NULL,
 `minimumfield` varchar(30) NOT NULL,
 `obtainedfield` varchar(30) NOT NULL,
 `remarkfield` varchar(30) NOT NULL,
 `percentage` varchar(30) NOT NULL,
 `minimumpercentage` varchar(30) NOT NULL,
 `finalresult` varchar(30) NOT NULL,
 `principalfield` varchar(30) NOT NULL,
 PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
    $wpdb->query($sqlview);
    
    $sqlmark = "CREATE TABLE `{$prefix}eusr_mark` ( `id` INT NOT NULL AUTO_INCREMENT ,  `sid` INT NOT NULL ,  `marks` VARCHAR(455) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
    $wpdb->query($sqlmark);
    
    $sqlinsert = "INSERT INTO `{$prefix}eusr_view_settings` (`vid`, `methodfield`,`titlefield`, `namefield`, `genderfield`, `fnamefield`, `mnamefield`, `classfield`,`regnofield`,`subjectfield`, `rollfield`, `totalfield`, `minimumfield`, `obtainedfield`, `remarkfield`, `percentage`, `minimumpercentage`, `finalresult`, `principalfield`) VALUES (1, 'Roll Number','PROGRESS REPORT', 'Name of the Student :', 'Gender :', 'Father\'s Name :', 'Mother\'s Name :', 'Class :','Registration Number :', 'Subject :', 'Roll No :', 'Total Marks:', 'Min Passing Marks:', 'Obtained Marks:', 'Grade :', 'Percentage :', 'Minimum Passing Percentage :', 'Remark :', 'Principal :');";

    $sqlinsert2 = "INSERT INTO `{$prefix}eusr_view_settings` (`vid`, `methodfield`,`titlefield`, `namefield`, `genderfield`, `fnamefield`, `mnamefield`, `classfield`,`regnofield`,`subjectfield`, `rollfield`, `totalfield`, `minimumfield`, `obtainedfield`, `remarkfield`, `percentage`, `minimumpercentage`, `finalresult`, `principalfield`) VALUES (2, 'y', 'y', 'y','y', 'y', 'y', 'y','y', 'y','y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y');";
    $sqlinsert3 = "INSERT INTO `{$prefix}eusr_view_settings` (`vid`, `methodfield`,`titlefield`) VALUES (3, 'marksheet','watermark');";
    $viewresults = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_view_settings`");
    if(count($viewresults)==0){
    $wpdb->query($sqlinsert);
    $wpdb->query($sqlinsert2);
    $wpdb->query($sqlinsert3);
    }
    
    $sqlsubject = "CREATE TABLE `{$prefix}eusr_subject` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `subid` int(10) NOT NULL,
 `class` varchar(30) NOT NULL,
 `subname` varchar(30) NOT NULL,
 `minmark` int(10) NOT NULL,
 `total` int(10) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    $wpdb->query($sqlsubject);
    
    $sqlclass = "CREATE TABLE `{$prefix}eusr_class` ( `id` INT(10) NOT NULL AUTO_INCREMENT ,  `class` VARCHAR(30) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
    $wpdb->query($sqlclass);
    
    mkdir(wp_get_upload_dir()['basedir'].'/result');
    ?>