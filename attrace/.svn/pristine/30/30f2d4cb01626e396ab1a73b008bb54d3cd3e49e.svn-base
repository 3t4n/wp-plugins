<?php


set_time_limit(600); // =10 mins


// get phpunit config file
$conf = isset($argv[1]) ? $argv[1] : 'phpunit.xml.dist';


// run phpunit
$output = [];
$retcode = 0;
exec("vendor/bin/phpunit --configuration {$conf}", $output, $retcode);
file_put_contents('build/phpunit.cli.out', implode("\n", $output));
file_put_contents('build/phpunit.cli.retcode', strval($retcode));


// check if all other tests finished
$isLast = true;
$nonZeroRetcodes = 0;
$dirs = ['php56', 'php70', 'php71', 'php72', 'php73', 'php74', 'php80'];
foreach($dirs as $dir) {
	$retcodeFname = "build_all/{$dir}/phpunit.cli.retcode";
	if(file_exists($retcodeFname)) {
		$rcode = file_get_contents($retcodeFname);
		if(intval($rcode) !== 0) {
			$nonZeroRetcodes++;
		}
	} else {
		$nonZeroRetcodes++;
	}
	
	$fname = "build_all/{$dir}/report.junit.xml";
	if(file_exists($fname) && filesize($fname) > 0)
		continue;
	
	$isLast = false;
	break;
}


// the last test go build html summary
if($isLast) {
	file_put_contents('build_all/non_0_exit_codes.txt', strval($nonZeroRetcodes));
	
	$summary = "build_all/summary.html";
	if(file_exists($summary)) {
		unlink($summary);
	}
	
	$errTags = ['error', 'failure'];
	$err = '';
	$out = "<h1>PHPUnit tests summary</h1>\n";
	$out .= "<table border=1>\n<tr><th>Version</th><th>Time</th><th>Errors</th><th>Failures</th><th>Tests</th><th>Assertions</th><th>Skipped</th><th>Warnings</th></tr>\n";
	foreach($dirs as $dir) {
		$fname = "build_all/{$dir}/report.junit.xml";
		$xml = file_get_contents($fname);
		
		if(preg_match('/<testsuite (.+?)>/', $xml, $m)) {
			if(preg_match_all('/([a-z]+)="(.*?)"/', $m[1], $vars)) {
				$v = array_combine($vars[1], $vars[2]);
				$errors = isset($v['errors']) ? $v['errors'] : '-';
				$failures = isset($v['failures']) ? $v['failures'] : '-';
				$a = [
					'version' => $dir,
					'time' => isset($v['time']) ? number_format((float)$v['time'], 3) : '-',
					'errors' => (intval($errors) > 0) ? "<a href='#{$dir}'><b>{$errors}</b></a>" : $errors,
					'failures' => (intval($failures) > 0) ? "<a href='#{$dir}'><b>{$failures}</b></a>" : $failures,
					'tests' => isset($v['tests']) ? $v['tests'] : '-',
					'assertions' => isset($v['assertions']) ? $v['assertions'] : '-',
					'skipped' => isset($v['skipped']) ? $v['skipped'] : '-',
					'warnings' => isset($v['warnings']) ? $v['warnings'] : '-',
					
				];
				$out .= '<tr><td>'.implode('</td><td>', $a)."</td></tr>\n";
			}
		}
		
		$errList = [];
		foreach($errTags as $tag) {
			if(preg_match_all("#<{$tag}.*?>(.+?)</{$tag}>#ms", $xml, $m)) {
				$errList = array_merge($errList, $m[1]);
			}
		}
		if(!empty($errList)) {
			$err .= str_replace('/var/www/html/', '', "<h2 id='{$dir}'>{$dir}</h2>\n<ol><li>".nl2br(implode('<br>&nbsp;</li><li>', $errList))."</li></ol>\n");
		}
	}
	$out .= '<table>';
	$out .= empty($err) ? '' : "\n<h1>Errors</h1>{$err}";
	
	file_put_contents($summary, $out);
}


// return phpunit retcode
exit($retcode);
