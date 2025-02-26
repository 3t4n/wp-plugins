<?php
/**
 * https://wpguru.co.uk/2014/01/how-to-create-a-cron-job-in-wordpress-teach-your-plugin-to-do-something-automatically/
 */
// here's the function we'd like to call with our cron job
function e_strix_allegro_symc_repeat_function() {
    
    // do here what needs to be done automatically as per your schedule
    // in this example we're sending an email
    
    // components for our email
    $recepients = 'k.mucik@e-strix.pl';
    $subject = 'Hello from your Cron Job';
    $message = 'This is a test mail sent by WordPress automatically as per your schedule.';
    
    // let's send it
    mail($recepients, $subject, $message);
    
    
    $settings = new EStrixAllegroSymcSettings();
    $datetime = new DateTime();
    $datetime->setTimezone(new DateTimeZone('Europe/Warsaw'));
    $settings -> update('allegro_last_updated',$datetime->format('Y-m-d H:i:s'));
    
}

// hook that function onto our scheduled event:
add_action ('e_strix_allegro_symc_cronjob', 'e_strix_allegro_symc_repeat_function'); 