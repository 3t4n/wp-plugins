<?php
if(isset($_REQUEST['q'])){
	$q=$_REQUEST['q'];
	$result = file_get_contents("http://sansarn.com/weTag/xsearch.jsp?q=".$q);
	$json =json_decode($result);
	echo "<p>ผลการค้นหา พบ ".$json->numdoc." เอกสาร</a>";
	foreach($json->docs as $doc){
		echo "<p><a href=\"http://sansarn.com/weTag/doc.jsp?did=".$doc->did."\" target=_blank>".$doc->title."</a>";	
		echo "<br>".$doc->content."<br>";	
		foreach($doc->tag as $t)echo "<a href=# onclick=tdosearch('".$t."')>".$t."</a>,";
		echo "</p><br>";	
		
	}
}
?>