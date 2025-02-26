<?php

class GIT_Install
{
    public static function activate()
    {
        global $wpdb;

        $table_prefix = $wpdb->prefix;
        $git_input_data = $table_prefix.'git_inputdata';
        $git_form_data = $table_prefix.'git_formdata';
        $git_function = $table_prefix.'git_function';
        $git_shortcode = $table_prefix.'git_shortcode';
        $git_contact_form_data = $table_prefix.'git_contact_form_data';
        $git_session = $table_prefix.'git_session';
        $git_map = $table_prefix.'git_map';

        $git_input_data_table = "CREATE TABLE IF NOT EXISTS $git_input_data(
            Input_Id BIGINT(9) NOT NULL AUTO_INCREMENT,
            Input_Data TEXT(3000) NOT NULL,
            User_IP VARCHAR(300) NOT NULL,  
            Input_Time DATETIME NOT NULL,              
            Form_Id int(9) NOT NULL,   
            Input_Type VARCHAR(300) NOT NULL,   
            Input_Status VARCHAR(30) NOT NULL,              
            Primary Key Input_Id (Input_Id)
            )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $wpdb->query($git_input_data_table);        

        $git_form_data_table = "CREATE TABLE IF NOT EXISTS $git_form_data(
            Form_Id INT(9) NOT NULL AUTO_INCREMENT,
            Form_Name VARCHAR(100) NOT NULL,
            Form_Label VARCHAR(100) NOT NULL,
            Form_Data TEXT(3000) NOT NULL,  
            Form_Options TEXT(3000) NOT NULL,
            Mail_Subject VARCHAR(500) NOT NULL,
            Mail_Sender_Name VARCHAR(300) NOT NULL,
            Mail_Sender_Email VARCHAR(300) NOT NULL,
            User_IP VARCHAR(300) NOT NULL,              
            Form_Time DATETIME NOT NULL,   
            Form_Type VARCHAR(100) NOT NULL,        
            Input_Ids VARCHAR(100) NOT NULL,
            Form_MailData TEXT(3000) NOT NULL,
            Mail_Copy_To_User VARCHAR(100) NOT NULL,         
            Form_Recipient VARCHAR(1000) NOT NULL,  
            Function_Name VARCHAR(200) NOT NULL,     
            Shortcode_Name VARCHAR(200) NOT NULL,
            Form_Status VARCHAR(30) NOT NULL,
            Primary Key Form_Id (Form_Id),
            UNIQUE (Function_Name),
            UNIQUE (Shortcode_Name)
            )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $wpdb->query($git_form_data_table);     

        $git_contact_form_table = "CREATE TABLE IF NOT EXISTS $git_contact_form_data(
            ContactForm_Id INT(9) NOT NULL AUTO_INCREMENT,
            ContactForm_Data TEXT(3000) NOT NULL,   
            User_IP  VARCHAR(100) NOT NULL,
            ContactForm_Time DATETIME NOT NULL,
            Form_Id INT(9) NOT NULL,
            ContactForm_Type VARCHAR(100) NOT NULL, 
            Form_RatingData TEXT(3000) NOT NULL,    
            ContactForm_Status VARCHAR(30) NOT NULL,
            Primary Key ContactForm_Id (ContactForm_Id)
            )ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $wpdb->query($git_contact_form_table);  
    }

    public static function deactivate()
    {
        return true;
    }

    public static function delete()
    {
        global $wpdb;
        
        $table_prefix = $wpdb->prefix;
        $git_input_data = $table_prefix.'git_inputdata';
        $git_form_data = $table_prefix.'git_formdata';
        $git_function = $table_prefix.'git_function';
        $git_shortcode = $table_prefix.'git_shortcode';
        $git_contact_form_data = $table_prefix.'git_contact_form_data';
        $git_session = $table_prefix.'git_session';
        $git_map = $table_prefix.'git_map';

        $git_input_data = "DROP TABLE $git_input_data;";
        $wpdb->query($git_input_data);

        $git_form_data = "DROP TABLE $git_form_data;";
        $wpdb->query($git_form_data);

        $git_function = "DROP TABLE $git_function;";
        $wpdb->query($git_function);

        $git_shortcode = "DROP TABLE $git_shortcode;";
        $wpdb->query($git_shortcode);

        $git_map = "DROP TABLE $git_map;";
        $wpdb->query($git_map); 

        $git_contact_form_data = "DROP TABLE $git_contact_form_data;";
        $wpdb->query($git_contact_form_data);

        $git_session = "DROP TABLE $git_session;";
        $wpdb->query($git_session);     
    }
}

