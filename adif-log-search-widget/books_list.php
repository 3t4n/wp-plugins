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
                      'QSLR' => '');

		
		if (stristr($string,"<EOH>"))
			// Skip any blank lines
			while ($string == "\n" || $string == "\r\n")
				$string = fgets ($file, 1024);

		// process the first valid ADIF line
		readADIFQSO ($string, &$qso_data);       
            
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
						            "refid = \"" . $_REQUEST['refid'] . "\" , " .
                        "booksid = \"" . $_REQUEST['booksid'] . "\" ";
            $result = $wpdb->query($query);
   
            $band_found = 0;
      			$freq_found = 0;
      			$EOR = 0;
      			$qso_data[]='';
      			$qso_count++;
		}
    
            $booksquery = "UPDATE ".$wpdb->prefix."logbookBooks SET " .
					  "uploadDate = \"" . date(DATE_RFC822) . "\" WHERE booksid = \"" . $_REQUEST['booksid'] . "\" ";
            $wpdb->query($booksquery);     	
	}	

function books_table() {
global $wpdb;
    $query = "SELECT id, uploadDate, refid
            FROM ".$wpdb->prefix."logbookBooks
            ORDER BY id
            ";

            
$results = $wpdb->get_results($query);

echo "<div class=\"wrap\">";
echo "
              <script type=\"text/javascript\">
                $(document).ready(function() {
                    $(\".delete_book\").click(function() {
                        return confirm(\"Delete this item?\");
                    });
                }); 
              </script>";
echo "<h2>".$wpdb->num_rows." Book(s) in database";
echo "<table class=\"widefat\">";
echo "<thead><tr>";
echo "<th>Book ID</th>";
echo "<th>Upload Date</th>";        
echo "<th>Assign Reference</th>";
echo "<th>QSOs</th>";         
echo "<th>Action</th>";
echo "</tr></thead>";
	foreach ($results as $result){
	echo "<tr>";
	echo "<td>".$result->id."</td>";
	echo "<td>".$result->uploadDate."</td>";
    $resultRef = $wpdb->get_row("SELECT refnumber FROM ".$wpdb->prefix."logbookRef WHERE id = ".$result->refid);
 	echo "<td>".$resultRef->refnumber."</td>";
	echo "<td>";
      $qso_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM ".$wpdb->prefix."logbook WHERE booksid=%s;",$result->id));
      echo $qso_count;
  echo "</td>";
	echo "<td>";
  echo "<a href=\"".$_SERVER['REQUEST_URI']."&booksaction=append&booksid=".$result->id."&refid=".$result->refid."\">Append</a>";
  echo " | ";
  echo "<a class=\"delete_book\" href=\"".$_SERVER['REQUEST_URI']."&booksaction=del&id=".$result->id."\">Delete</a>";
  echo "</td>";
  echo "</tr>";        
    }
echo "</table>";
echo "</div>";
}

	if ($_REQUEST['booksaction'] === "del"){
    $id = $_REQUEST['id'];
    $sql = "DELETE a,b 
                    FROM ".$wpdb->prefix."logbookBooks AS a 
                    LEFT JOIN ".$wpdb->prefix."logbook AS b 
                    ON a.id = b.booksid
                    WHERE a.id = $id";
    
    if ($wpdb->query($sql)){
      echo books_table ();
    }
    else{
      echo "<h2>Book could not be deleted!!</h2><br><a href='books_list.php'>Back to book list</a>";
      }
    }
    elseif ($_REQUEST['booksaction'] === "append") {
    echo "ID:".$_REQUEST['booksid'];
    echo "RefID:".$_REQUEST['refid'];
    
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
    }
    else {
    echo "<div class=\"wrap\">";                          
    echo "<h2>Append ADIF Log file</h2>";
    echo "<p>Please select the filename of the log to be uploaded into the database.<br>"; 
    echo "<b>Only ADIF format logs are accepted.</b>";
    echo "</p>";
    echo "<form action=\"".$_SERVER['REQUEST_URI']."\" enctype=\"multipart/form-data\" method=\"post\" name=\"adifUpload\">";
    echo "<input name=\"reference_id\" type=\"hidden\" id=\"refid\" value=\"".$_REQUEST['refid']."\">";
    echo "<input id=\"reference_number\" name=\"booksid\" type=\"hidden\" value=\"".$_REQUEST['booksid']."\">";
    echo "<table class=\"form-table\">";
    echo "<tr valign=\"top\">";
    echo "<th scope=\"row\"><label for=\"Filename\">Filename</label></th>";
    echo "<td><input id=\"Filename\" class=\"regular-file\" name=\"Filename\" type=\"file\"></td>";
    echo "</tr>";
    echo "<tr valign=\"top\">";
    echo "<th scope=\"row\"><label for=\"opcallsign\">Callsign if not set in ADIF</label></th>";
    echo "<td><input id=\"opcallsign\" class=\"regular-text\" name=\"opcallsign\" type=\"text\"></td>";
    echo "</tr>";
    echo "</table>";
    echo "<p class=\"submit\"><input class=\"button-primary\" type=\"submit\" name=\"upload\" value=\"Upload log\"></p>";
    echo "</form>";
    echo "</div>";
    }
    }
    else {
echo books_table ();
}
?>