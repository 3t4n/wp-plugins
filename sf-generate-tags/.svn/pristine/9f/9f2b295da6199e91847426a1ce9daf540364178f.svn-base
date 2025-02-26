<?php

function filterEnglish($input_array) {
	$output_array = array();
	
	$digits = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten',
		'first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'nineth', 'tenth',
		'hundred', 'hundreds', 'thousand', 'thousands');
	
	$addressing_words = array('another', 'both', 'dud', 'each', 'her', 'other', 'their', 'theirs');

	$easy_words = array( 'after', 'against', 'ago', 'almost', 'along', 'also', 'although', 'always', 
		'and', 'any', 'anyone', 'anytime', 'are', 'around', 'aside', 'all', 'away',
		'become', 'because', 'behind', 'before', 'between', 'but', 'com', 'common', 
		'different', 'down', 'due', 'either', 'etc', 'extra', 'ever', 'every', 
		'far', 'false', 'for', 'forever', 'from', 'further', 'full', 
		'here', 'hers', 'him', 'how', 'however',
		'img', 'inn', 'into', 'its', 'itself', 'jpg', 'just', 'less', 'mean', 'more', 'most', 'myself', 
		'next', 'never', 'new', 'nobody', 'non', 'not', 'now',
		'often', 'once', 'only', 'onto', 'org', 'other', 'others', 'our', 'ours', 'out', 'over', 'per', 'plenty', 'png', 'rather',
		'same', 'since', 'she', 'someone', 'something', 'sure', 'such',
		'than', 'that', 'the', 'then', 'there', 'these', 'them', 'they', 'till', 'those', 'this', 'through', 'thus', 'too', 'together', 'true', 
		'under', 'unless', 'via',
		'what', 'whatever', 'when', 'whenever', 'where', 'whether', 'within', 'without', 'whatever', 'which', 'while', 'whithin', 'who', 'whole', 'whose', 'why', 'with', 
		'yes', 'yet', 'you', 'your', 'yours');
	
	$substantives = array('about', 'above', 'after', 'again', 'ahead', 'already', 'amount', 
		'another', 'anything', 'approach', 'around', 'away', 
		'carefull', 'certain', 'clear', 'correct',
		'days', 'dead', 'define', 'different', 'difference', 'directly',
		'easy', 'easiest', 'easily', 'end', 'even', 'everything', 'everywhere', 'final', 'good', 
		'item', 'kinds', 'least', 'last', 'look',
		'many', 'maybe', 'mode','much', 'needs', 'next', 'new', 'overview', 'purpose', 'reason',
		'several', 'sites', 'site', 'some', 'something', 'step', 'stuff', 'systems', 'system', 'still',
		'thing', 'things', 'type',
		'very');
		
	$adjectives = array('actual', 'authentic', 'avoid', 'bad', 'best', 'better', 'closed', 'cool', 'current', 'difficult', 
		'easier', 'easily', 'few', 'full', 'fun', 'good', 
		'great', 'huge', 'later', 'like', 'long', 'make', 'new', 'old', 'older', 'open', 
		'poor', 'possible', 'proper', 'quite', 'real',
		'seen', 'seldom', 'similar', 'small', 'taken', 'tiny', 'thrown', 'took', 'toward', 'using', 'vice', 'versa');
	
	$verbs = array('able', 'achieve', 'add', 'afford', 'allow', 'allows', 'apply', 'arise', 'ask',
		'been', 'beware', 'bought', 
		'came', 'can', 'care', 'catch', 'choose', 'chosen', 'claim', 'click', 'come', 'consider', 
		'could', 'considers', 'consists', 'contains', 'copy', 'could', 'create',
		'decide', 'delete', 'discuss', 'did', 'does', 'doing', 'done', 'edit', 'enjoy',
		'fill', 'find', 'found', 'gather', 'gave', 'get', 'gets', 'give', 'gone', 'got', 'guess',
		'had', 'happen', 'has', 'have', 'helps', 'jump', 'keep', 'kept', 'know', 'let', 'like', 'look', 'loose',
		'made', 'make', 'may', 'mean', 'means', 'might', 'must', 'occur', 'own', 'paste', 'pay', 'pick', 'put', 'prefer', 'propose',	'read', 'receive', 'remember', 'run',
		'say', 'see', 'select', 'send', 'set', 'should', 'sit', 'spend', 'start', 'stay', 'stop', 'take', 'tell', 'took', 'try', 
		'use', 'var', 'watch', 'want', 'was', 'were', 'will', 'would');
		
	foreach ( $input_array as $word ) 
	{
		$toOutput = true;
		
		if(in_array( $word, $addressing_words )
			|| in_array( $word, $easy_words )
			|| in_array( $word, $digits )
			|| in_array( $word, $substantives )
			|| in_array( $word, $adjectives )
			|| in_array( $word, $verbs )
		)
		{ 	
			$toOutput = false;
		} 
		
		//check same word single and multiple instances
		if($toOutput == TRUE && wordEndsWith($word, "s")){
			foreach ( $input_array as $matchingWord ) 
			{
				$wordWithoutS = substr($word, 0, -1);
					
				if(strcasecmp($wordWithoutS, $matchingWord) == 0)
				{
					$toOutput = false;					
					break;
				}
			}
		}

		if($toOutput == TRUE){
			array_push($output_array, $word);
		}
	}
	
	return $output_array;
}

function limitTagsTo($tagsArrayFilteredEnglish, $limitNumber) {
	$output_array = array();
	
	$tagsArrayFilteredEnglish = excludeSecondImportantWords($tagsArrayFilteredEnglish);
	
	if($tagsArrayFilteredEnglish > $limitNumber) {
		$i = 1;
		//filter by letter number
		foreach($tagsArrayFilteredEnglish as $word) {
		
			if($i > $limitNumber) {
				break;
			}
			
			$tagLength = strlen($word);
			if($tagLength <= 7 && $tagLength > 3) {
				array_push($output_array, $word);
				$i++;
			}			
		}
	}
	
	return $output_array;
}

function excludeSecondImportantWords($input_array) {
	$output_array = array();
	
	$substantives = array('advice', 'chance', 'model', 'failure', 'passion', 'time', 'value');
	
	$easy_words = array('back', 'instead', 'lot');
	
	$adjectives = array('big', 'careful', 'free', 'hard', 'kind', 'major', 'stuck', 'wise', 'young');
	
	$verbs = array('control', 'match', 'track',  'update', 'upgrade');
	
	foreach ( $input_array as $word ) 
	{
		$toOutput = true;
		
		if(in_array( $word, $easy_words )
			|| in_array( $word, $substantives )
			|| in_array( $word, $adjectives )
			|| in_array( $word, $verbs )
			|| wordEndsWith($word, "en")
			|| wordEndsWith($word, "y")
			|| wordEndsWith($word, "al")
			|| wordEndsWith($word, "able")
			|| wordEndsWith($word, "ly")
			|| wordEndsWith($word, "ed")
			|| wordEndsWith($word, "'s")
			|| wordEndsWith($word, "es")
			|| wordEndsWith($word, "ing")
			|| wordEndsWith($word, "est")
			|| wordEndsWith($word, "ugh")
			|| wordEndsWith($word, "id")
			|| wordEndsWith($word, "made")
			|| wordEndsWith($word, "ier")
			|| wordEndsWith($word, "self")
			|| wordEndsWith($word, "ary")
		)
		{ 	
			$toOutput = false;
		} 

		if($toOutput == TRUE){
			array_push($output_array, $word);
		}
	}
	
	return $output_array;
}
?>