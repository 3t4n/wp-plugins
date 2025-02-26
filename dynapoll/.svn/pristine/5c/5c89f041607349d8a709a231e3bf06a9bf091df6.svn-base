$myjQuery = jQuery.noConflict();
$myjQuery(document).ready(function() 
{
	$myjQuery("input.submit_vote").click(function() {
		var survey_code = $myjQuery(this).parents("form").attr("id");
		var new_answer = $myjQuery("input#new_answer_"+survey_code).val();
		var spam_answer = $myjQuery("input#spam_answer_"+survey_code).val();
		var spam_number_1 = $myjQuery("input#spam_number_1_"+survey_code).val();
		var spam_number_2 = $myjQuery("input#spam_number_2_"+survey_code).val();
		var submit_vote = $myjQuery("input.submit_vote").val();
		
		var survey_vote_name = "survey_vote_"+survey_code;
		
		var survey_vote = $myjQuery("input[name='" + survey_vote_name + "']:checked").val();
		
		
		if (typeof(survey_vote) == "undefined")
		{
			alert("You did not select an answer!");
			return false;
		}
		
		/*
		alert(survey_vote);
		alert(survey_code);
		alert(submit_vote);
		alert(spam_number_2);
		alert(spam_number_1);
		alert(spam_answer);
		alert(new_answer);
		
		return false; 
		*/
		
		$myjQuery.post(base_url + "submit_vote.php", { new_answer : new_answer, 
			spam_answer : spam_answer,
			spam_number_1 : spam_number_1,
			spam_number_2 : spam_number_2,
			submit_vote : submit_vote,
			survey_code : survey_code,
			survey_vote : survey_vote },
	  			function(data){
					
				switch(data)
					{
					case '900':
						alert("IP Address has been implicated in a previous SPAM answer suggestion.");
						return false;
					  break;
					case '901':
						alert("Spam question was not answered correctly.");
						return false;
					  break;
					case '902':
						alert("Poll not found.");
						return false;
					  break;
					case '903':
						alert("Poll code was not sent.");
						return false;
					  break;
					case '904':
						alert("IP Address has logged a vote within the last 24 hours.");
						return false;
					  break;
					case '2':
						var data = "An error has occurred. If the problem persists please contact DynaPoll.";
						return false;
					default:
					  /* do nothing - therefore load content */
					}	

				$myjQuery("div#survey_" + survey_code).html(data);
		});
		
		return false;
	});
	
	$myjQuery("input.submit_answer").click(function() {
		var survey_code = $myjQuery(this).parents("form").attr("id");
		var new_answer = $myjQuery("input#new_answer_"+survey_code).val();
		var spam_answer = $myjQuery("input#spam_answer_"+survey_code).val();
		var spam_number_1 = $myjQuery("input#spam_number_1_"+survey_code).val();
		var spam_number_2 = $myjQuery("input#spam_number_2_"+survey_code).val();
		
		if (new_answer == '' || spam_answer == '')
		{
			alert("You did not submit an answer suggestion or the spam question!");
			return false;
		}
		
		$myjQuery.post(base_url + "submit_vote.php", { new_answer : new_answer, 
			spam_answer : spam_answer,
			spam_number_1 : spam_number_1,
			spam_number_2 : spam_number_2,
			survey_code : survey_code},
	  			function(data){
				
					switch(data)
					{
					case '900':
						alert("IP Address has been implicated in a previous SPAM answer suggestion.");
						return false;
					  break;
					case '901':
						alert("Spam question was not answered correctly.");
						return false;
					  break;
					case '902':
						alert("Poll not found.");
						return false;
					  break;
					case '903':
						alert("Poll code was not sent.");
						return false;
					  break;
					case '904':
						alert("IP Address has logged a vote within the last 24 hours.");
						return false;
					  break;
					case '2':
						var data = "An error has occurred. If the problem persists please contact DynaPoll.";
						return false;
					default:
					  /* do nothing - therefore load content */
					
					}
					
	    			$myjQuery("div#survey_" + survey_code).html(data);
		});
		
		return false;
	});
	
});
