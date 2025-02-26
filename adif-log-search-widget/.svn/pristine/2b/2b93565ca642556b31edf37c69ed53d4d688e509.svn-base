<?php
global $wpdb;

	function readADIFQSO ($string, &$qso_data)
	{
		$string = strtoupper ($string);

        // Read MyCallsign
		if ($s = stristr($string,"<OPERATOR"))
		{
			$values = sscanf ($s, "<OPERATOR:%d>%s ", $length,$qso_data['MyCallsign']);
        $qso_data['MyCallsign'] = substr($qso_data['MyCallsign'],0,$length);
			if ($values != 2){
				sscanf ($s, "<OPERATOR:%d:%c>%s ", $length,$dummy,$qso_data['MyCallsign']);
				$qso_data['MyCallsign'] = substr($qso_data['MyCallsign'],0,$length);
			}
		}		
		else {
      $qso_data['MyCallsign'] = $_POST['opcallsign'];
    }
       
        // Read Date
		if ($s = stristr($string,"<QSO_DATE"))
		{
			$values = sscanf ($s, "<QSO_DATE:%d>%s ", $length,$qso_data['Date']);
        $qso_data['Date'] = substr($qso_data['Date'],0,$length);
			if ($values != 2){
				sscanf ($s, "<QSO_DATE:%d:%c>%s ", $length,$dummy,$qso_data['Date']);
        $qso_data['Date'] = substr($qso_data['Date'],0,$length);
      }				
		}
		
        // Read Time On
		if ($s = stristr($string,"<TIME_ON"))
		{
      $values = sscanf ($s, "<TIME_ON:%d>%s ", $length,$temp_time);
      $temp_time = substr($temp_time,0,$length);
      if (strlen($temp_time) == 4){
      $qso_data['Time'] = $temp_time ."00";
      }
      else {
      $qso_data['Time'] = $temp_time;
      }
      
			if ($values != 2)
				sscanf ($s, "<TIME_ON:%d:%c>%s ", $length,$dummy,$temp_time);
      $temp_time = substr($temp_time,0,$length);
      if (strlen($temp_time) == 4){
      $qso_data['Time'] = $temp_time ."00";
      }
      else {
      $qso_data['Time'] = $temp_time;
      }      
		}       

        // Read Time Off
		if ($s = stristr($string,"<TIME_OFF"))
		{
      $values = sscanf ($s, "<TIME_OFF:%d>%s ", $length,$temp_time);
      $temp_time = substr($temp_time,0,$length);
      if (strlen($temp_time) == 4){
      $qso_data['Time_off'] = $temp_time ."00";
      }
      else {
      $qso_data['Time_off'] = $temp_time;
      }
      
			if ($values != 2)
				sscanf ($s, "<TIME_OFF:%d:%c>%s ", $length,$dummy,$temp_time);
      $temp_time = substr($temp_time,0,$length);
      if (strlen($temp_time) == 4){
      $qso_data['Time_off'] = $temp_time ."00";
      }
      else {
      $qso_data['Time_off'] = $temp_time;
      }      
		}
                                    
        // Read Callsign
		if ($s = stristr($string,"<CALL"))
		{

			$values = sscanf ($s, "<CALL:%d>%s ", $length,$qso_data['Callsign']);
        $qso_data['Callsign'] = substr($qso_data['Callsign'],0,$length);
			if ($values != 2){
				sscanf ($s, "<CALL:%d:%c>%s ", $length,$dummy,$qso_data['Callsign']);
		    $qso_data['Callsign'] = substr($qso_data['Callsign'],0,$length);
      }
    }            

    	// Read Band
		if ($s = stristr($string,"<BAND"))
		{
      $values = sscanf ($s, "<BAND:%d>%s ", $length,$qso_data['Band']);
      $qso_data['Band'] = substr($qso_data['Band'],0,$length);
			if ($values != 2){
				sscanf ($s, "<BAND:%d:%c>%s ", $length,$dummy,$qso_data['Band']);
        $qso_data['Band'] = substr($qso_data['Band'],0,$length);				
			}	
			// Strip the 'M off e.g. 40M
			if (($pos = strpos ($qso_data['Band'], 'M')) != NULL)
				$qso_data['Band'][$pos] = ' ';
		}

		// Read Frequency (e.g. if Band is not present in the record)
		if ($s = stristr($string,"<FREQ")) 
		{
			$values = sscanf ($s, "<FREQ:%d>%s ", $length,$qso_data['Frequency']);
      $qso_data['Frequency'] = substr($qso_data['Frequency'],0,$length);
			if ($values != 2){
				sscanf ($s, "<FREQ:%d:%c>%s ", $length,$dummy,$qso_data['Frequency']);
      $qso_data['Frequency'] = substr($qso_data['Frequency'],0,$length);
      }
		}

		// Read Mode
		if ($s = stristr($string,"<MODE"))
		{
			$values = sscanf ($s, "<MODE:%d>%s ", $length,$qso_data['Mode']);
      $qso_data['Mode'] = substr($qso_data['Mode'],0,$length);
			if ($values != 2){
				sscanf ($s, "<MODE:%d:%c>%s ", $length,$dummy,$qso_data['Mode']);
      $qso_data['Mode'] = substr($qso_data['Mode'],0,$length);
      }
			switch ($qso_data['Mode'])
			{
			// Convert all Phone modes to SSB
			case "USB":
			case "LSB":

			$qso_data['Mode'] = "SSB";
			break;
			}
		}
     // read propagation mode
		if ($s = stristr($string,"<PROP_MODE"))
		{
			$values = sscanf ($s, "<PROP_MODE:%d>%s ", $length,$qso_data['Prop_Mode']);
      $qso_data['Prop_Mode'] = substr($qso_data['Prop_Mode'],0,$length);
			if ($values != 2){
				sscanf ($s, "<PROP_MODE:%d:%c>%s ", $length,$dummy,$qso_data['Prop_Mode']);
      $qso_data['Prop_Mode'] = substr($qso_data['Mode'],0,$length);
      }
		}     
        
        // Read RSTS
		if ($s = stristr($string,"<RST_SENT"))
		{
			$values = sscanf ($s, "<RST_SENT:%d>%s ", $length,$qso_data['RSTS']);
      $qso_data['RSTS'] = substr($qso_data['RSTS'],0,$length);
			if ($values != 2){
				sscanf ($s, "<RST_SENT:%d:%c>%s ", $length,$dummy,$qso_data['RSTS']);
      $qso_data['RSTS'] = substr($qso_data['RSTS'],0,$length);
      }				
		}

        // Read RSTR
		if ($s = stristr($string,"<RST_RCVD"))
		{
			$values = sscanf ($s, "<RST_RCVD:%d>%s ", $length,$qso_data['RSTR']);
      $qso_data['RSTR'] = substr($qso_data['RSTR'],0,$length);
			if ($values != 2){
				sscanf ($s, "<RST_RCVD:%d:%c>%s ", $length,$dummy,$qso_data['RSTR']);
      $qso_data['RSTR'] = substr($qso_data['RSTR'],0,$length);
      }
		}

    // Read QSLS
    if ($s = stristr($string,"<QSL_SENT"))
    {
    $values = sscanf ($s, "<QSL_SENT:%d>%s ", $length,$qso_data['QSLS']);
    $qso_data['QSLS'] = substr($qso_data['QSLS'],0,$length);
    if ($values != 2){
    sscanf ($s, "<QSL_SENT:%d:%c>%s ", $length,$dummy,$qso_data['QSLS']);
    $qso_data['QSLS'] = substr($qso_data['QSLS'],0,$length);
    }
    }
    
    // Read QSLR
    if ($s = stristr($string,"<QSL_RCVD"))
    {
    $values = sscanf ($s, "<QSL_RCVD:%d>%s ", $length,$qso_data['QSLR']);
    $qso_data['QSLR'] = substr($qso_data['QSLR'],0,$length);
    if ($values != 2){
    sscanf ($s, "<QSL_RCVD:%d:%c>%s ", $length,$dummy,$qso_data['QSLR']);
    $qso_data['QSLR'] = substr($qso_data['QSLR'],0,$length);
    }
    }    

	}
	// Function to read an ADIF file and insert each QSO into the database
	function processADIFFile ($file, &$qso_count,$connection, $string, $dxcallsign, $usertable)
	{
	global $wpdb;
		$EOR = 0;
		$band_found = 0;
		$freq_found = 0;
		$blank_line = 1;

		$qso_data = array ('MyCallsign' => '',
                      'Date' => '',
				              'Time' => '',
                      'Time_off' => '',
                      'Callsign' => '',
				              'Band' => '',
				              'Frequency' => '',
                      'Mode' => '',
                      'Prop_Mode' => '',
                      'RSTS' => '',
                      'RSTR' => '',
                      'QSLS' => '',
                      'QSLR' => ''
                      );

		
		if (stristr($string,"<EOH>"))
			// Skip any blank lines
			while ($string == "\n" || $string == "\r\n")
				$string = fgets ($file, 1024);

		// process the first valid ADIF line
		readADIFQSO ($string, &$qso_data);
		 
    // Insert ref data into database   
            if ($_POST['reference_number'] != NULL){
                if ($_REQUEST['reference_id'] != NULL ) {
                  $refid = $_REQUEST['reference_id'];
                }
                else {
                $refquery="INSERT INTO ".$wpdb->prefix."logbookRef (refnumber,refdescription) VALUES ('$_REQUEST[reference_number]','$_REQUEST[reference_description]')";
                 $wpdb->query($refquery);
                 $refid = $wpdb->insert_id;               
                }
              }
 
            $booksquery = "INSERT INTO ".$wpdb->prefix."logbookBooks SET " .
					  "uploadDate = \"" . date(DATE_RFC822) . "\" , " .
					  "refid = \"" . $refid . "\" ";
            $wpdb->query($booksquery);
            $booksid = $wpdb->insert_id;            
            
		while (($string = fgets ($file,1024)))
		{
			// Skip any blank lines
			if ($string == "\n" || $string == "\r\n")
				continue;
			while (!$EOR)
			{
				readADIFQSO ($string, &$qso_data);
				// Check for End of Record
				if (stristr($string,"<EOR>"))
					$EOR = 1;
				else
					$string = fgets($file,1024);
		}

// Insert QSO into the database
			$query = "INSERT INTO ".$wpdb->prefix."logbook SET " .
						            "MyCallsign = \"" . $qso_data['MyCallsign'] . "\" , " .
                        "Date = \"" . $qso_data['Date'] . "\" , " .
                        "Time = \"" . $qso_data['Time'] . "\" , " .
                        "Time_off = \"" . $qso_data['Time'] . "\" , " .
                        "CallSign = \"" . $qso_data['Callsign'] . "\" , " .
						            "Band = \"" . $qso_data['Band'] . "\" , " .
                        "Frequency = \"" . $qso_data['Frequency'] . "\" , " .
                        "Mode = \"" . $qso_data['Mode'] . "\" , " .
                        "Prop_Mode = \"" . $qso_data['Prop_Mode'] . "\" , " .
						            "RSTS = \"" . $qso_data['RSTS'] . "\" , " .
						            "RSTR = \"" . $qso_data['RSTR'] . "\" , " .
                        "QSLS = \"" . $qso_data['QSLS'] . "\" , " .
                        "QSLR = \"" . $qso_data['QSLR'] . "\" , " .                        
						            "refid = \"" . $refid . "\" , " .
                        "booksid = \"" . $booksid . "\" ";
            
            $result = $wpdb->query($query);
   
            $band_found = 0;
      			$freq_found = 0;
      			$EOR = 0;
      			$qso_data[]='';
      			$qso_count++;
		}	
	}	

	// Start of Main Program
  $valid_file = 0;
  $file_type = "unknown";
  $qso_count = 0;
  
	// Record the start time of the script
	$start = microtime();
	sscanf ($start,"%s %s",&$microseconds,&$seconds);
	$start_time = $seconds + $microseconds;

	// Read data posted from form
	$browser_name = $_FILES['Filename']['name'];
	$temp_name = $_FILES['Filename']['tmp_name'];

	if ($_REQUEST['upload'])
    {
    
// Was a log file uploaded?
        if (is_uploaded_file ($temp_name))
    	{   

// Open the log file
    		if (!($file1 = fopen ($temp_name, "r")))
    			die ("Could not open the log file $file\n");

// Check if ADIF or form contains a callsign
    		if (empty($_POST['opcallsign'])){
    		    $callsign_empty = 0;
    			  while ($string1 = fgets ($file1, 1024))
    			     {
          				if (stristr($string1,"<OPERATOR"))
            				{
            					$valid_file1 = 1;
            					$callsign_empty = 1;
            					break;
            				}
    			     }
           }
           else{
             $callsign_empty = 1;
             $valid_file1 = 1;
           }
           
// Open the log file
    		if (!($file = fopen ($temp_name, "r")))
    			die ("Could not open the log file $file\n");
    		
      if ($callsign_empty == 0 || $valid_file1 == 0){ 

            echo "No Callsign assign!";}
    else {
        // Read the first line
    		$string = fgets ($file, 1024);
    		// Check if it is an ADIF file
    		if (stristr($string, "<EOH>") || stristr($string,"<CALL"))
    		{

          // Process ADIF file
    		
               processADIFFile ($file,&$qso_count,$connection,$string, $dxcallsign,$usertable);
    
    			$file_type = "ADIF";
    		}
    		else
    		{
    			while (($string = fgets ($file, 1024)) && !$valid_file)
    			{
    				if (stristr($string, "<EOH>") || stristr($string,"<CALL"))
    				{
    					$valid_file = 1;
                        
                        processADIFFile ($file,&$qso_count,$connection,$string,$dxcallsign, $usertable);
    					$file_type = "ADIF";
    				}
    			}
    
    			// No ADFI file found - exit with an error
    			if (!$valid_file)
    			{
    				echo "<P>Error - Unable to upload file: $browser_name\n";
    				echo "<P>Invalid ADIF file\n";
    				echo "<P>No QSOs loaded\n";
    				die();
    			}
    		}
    }
    		// Record the end time of the script
    		$end = microtime();
    		sscanf ($end,"%s %s",&$microseconds,&$seconds);
    		$end_time = $seconds + $microseconds;
    
    		// Calculate elapsed time for the script
    		$elapsed = $end_time - $start_time;
    		sscanf ($elapsed,"%5f", &$elapsed_time);
    
    		// Determine the callsign for these logs
    		echo "<div class=\"wrap\">";
    		echo "<P>Number of QSO's Added to the Database:<b> $qso_count qso's</b>.\n";
        echo "<P>Elapsed time = <b>$elapsed_time </b>seconds \n";
    
    		// Count the total number of QSOs in the database
    		$query = "SELECT id from ".$wpdb->prefix."logbook";
            $result = $wpdb->query($query);
            $num_rows = $wpdb -> num_rows;
    
    		echo "<P>There are now <b>$num_rows QSOs</b> in the database \n";
    		echo "</div>";
        }
	else
	{
		// No file uploaded
		echo "<h2>No file Uploaded</h2>";
	}
      }else{?>

<div class="wrap">
<h2>Logbook Search Upload ADIF Log file</h2>
<p>Use this form to upload log file qso's into the database by using an ADIF file exported from your logging program.</p>
<p>Please select the filename of the log to be uploaded into the database.<br> 
<b>Only ADIF format logs are accepted.</b>
</p>
<script type="text/javascript">
function chkRef () {
  if (document.adifUpload.reference_number.value == "") {
    alert("Please insert a Reference number");
    document.adifUpload.reference_number.focus();
    return false;
  }
}
</script>
  
<form action="<?php echo($_SERVER['REQUEST_URI']) ?>" enctype="multipart/form-data" method="post" name="adifUpload" onsubmit="return chkRef()">
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="Filename">Filename</label></th>
<td><input id="Filename" class="regular-file" name="Filename" type="file"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="opcallsign">Callsign if not set in ADIF</label></th>
<td><input id="opcallsign" class="regular-text" name="opcallsign" type="text"></td>
</tr>
<tr valign="top">
<th scope="row"><label for="ref">Select an exiting Reference</label></th>
<td><select name="selectRef" onchange="jsfunction(this);">
<option value="||">New reference</option>
<?php
  $refselectquery = "SELECT id, refnumber, refdescription FROM ".$wpdb->prefix."logbookRef";         
	$results = $wpdb->get_results($refselectquery);
	foreach ($results as $result){
    echo "<option value=\"".$result->id."|".$result->refnumber."|".$result->refdescription."\">".$result->id.":".$result->refnumber."</option>";
}
?>
</select>
<script type="text/javascript">
function jsfunction(sel){
var werte=sel.options[sel.selectedIndex].value.split('|');
document.adifUpload['reference_id'].value=werte[0];
document.adifUpload['reference_number'].value=werte[1];
document.adifUpload['reference_description'].value=werte[2];
}
</script>
</td>
</tr>
<tr valign="top">
<th scope="row"></th>
<td>or define a new one:</td>
</tr>
<tr valign="top">
<th scope="row"><label for="reference_number">Reference number<small> (required)</small></label></th>
<td>
<input name="reference_id" type="hidden" id="reference_id" value="">
<input id="reference_number" class="regular-text" name="reference_number" type="text">
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="reference_description">Reference description</label></th>
<td><textarea rows="6" cols="40" name="reference_description" maxlength="255" id="reference_description"></textarea></td>
</tr>
</table>
<p class="submit"><input class="button-primary" type="submit" name="upload" value="Upload log"></p>
</form>
</div>    
<?php    
}
?>