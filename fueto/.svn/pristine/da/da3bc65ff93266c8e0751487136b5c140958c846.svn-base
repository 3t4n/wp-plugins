<?php
    require_once("../../../../wp-config.php");

    $blogDomain =  get_bloginfo('wpurl');
    $urlGet = API_URL . "/socialproxyurl/?blogDomain=".urlencode($blogDomain);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlGet);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
    $data = curl_exec($ch);
    curl_close($ch);
    
    $callStringLength = strlen(trim($data));
    $apiResponse = json_decode($data);

    if($apiResponse->status == 'OK')
    {

        
        $processUrl = $apiResponse->url; 
    
        $analysisId = $apiResponse->analysisId; 
                              
        if(!preg_match('#^http://#', $processUrl))
        {
            $processUrl = 'http://'.$processUrl;
        }

        if($processUrl)
        {
            $startTime = explode(' ', microtime());
            
            $url = rawurlencode($processUrl);
        
            $socialScore = array();

            $socialScore['blogDomain'] = $blogDomain;
            
            $socialScore['url'] = $apiResponse->url;
			
			$socialScore['idUrl'] = $apiResponse->idUrl;
            
            $socialScore['analysisId'] = (int)$analysisId;
            
            /* Delicious */
            
            $deliciousUrl = 'http://feeds.delicious.com/v2/json/urlinfo/data?url='.$url;

            $result = get_contents($deliciousUrl);
            
            $urlInfo = decode($result[0], true);
            
            $socialScore['Delicious'] = $urlInfo[0]['total_posts'] ? $urlInfo[0]['total_posts'] : 0;
            
            $callStringLength += $result[1];
            
            /* Digg */
            
            $diggUrl = 'http://widgets.digg.com/buttons/count?url='.$url;
            
            $result = get_contents($url);
            
            $urlInfo = decode($result[0], true);
            
            $socialScore['Digg'] = $urlInfo['diggs'] ? $urlInfo['diggs'] : 0;
            
            $callStringLength += $result[1];
            
            /* Facebook */
            
            $query = rawurlencode('select like_count from link_stat where url=');
            
            $facebookUrl = "https://api.facebook.com/method/fql.query?query=$query'$url'&format=json";
            
            $result = get_contents($facebookUrl);
            
            $urlInfo = decode($result[0], true ); 
            
            $socialScore['Facebook'] = $urlInfo[0]['like_count'] ? $urlInfo[0]['like_count'] : 0;
            
            $callStringLength += $result[1];
            
            //exit;
			
            /* Linkedin */
            
            $linkedinUrl = "http://www.linkedin.com/countserv/count/share?url=$url&callback=myCallback&format=jsonp";
            
            $result = get_contents($linkedinUrl);
            
            $urlInfo = decode($result[0], true);
            
            $socialScore['Linkedin'] = $urlInfo['count'];
            
            $callStringLength += $result[1];
            
            /* Pinterest */
            
            $linkPinterest = "http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=$url";
            
            $result = get_contents($linkPinterest);
            
            $urlInfo = decode($result[0], true);
            
            $socialScore['Pinterest'] = $urlInfo['count'] ? $urlInfo['count'] : 0;
            
            $callStringLength += $result[1];
            
            /* StumbleUpon */
            
            $linkStumbleUpon = "http://www.stumbleupon.com/services/1.01/badge.getinfo?url=$url";
            
            $result = get_contents($linkStumbleUpon);
            
            $urlInfo = decode($result[0], true);
            
            $socialScore['Stumbleupon'] = $urlInfo['result']['views'] ? $urlInfo['result']['views'] : 0;
            
            $callStringLength += $result[1];
            
            /* Twitter */
            
            $linkTwitter = "http://urls.api.twitter.com/1/urls/count.json?url=$url";
            
            $result = get_contents($linkTwitter);
            
            $urlInfo = decode($result[0], true);
            
            $socialScore['Twitter'] = $urlInfo['count'] ? $urlInfo['count'] : 0;
            
            $callStringLength += $result[1];
                                            
            /* Google Plus */
            
            $googlePlusUrl = "https://plusone.google.com/u/0/_/%2B1/fastbutton?count=true&url=$url";
            
            $result = get_contents($googlePlusUrl);
            
            preg_match_all('|window.__SSR = {c: ([^\W\r\n]*)|', $result[0], $matches);
            
            $socialScore['Googleplus'] = (int)$matches[1][0] ? (int)$matches[1][0] : 0; 
            
            $endTime = explode(' ', microtime());
            
            $totalTime = number_format(($endTime[0]+$endTime[1])-($startTime[0]+$startTime[1]), 2);
            
            $socialScore['processTime'] = $totalTime;
            
            $callStringLength += $result[1];
            
            $socialScore['bandWidth'] = $callStringLength;
        }
        
        setUrl(API_URL, $socialScore);
    }
    
        
    function get_contents($url, $filter = false) 
    {
        try
        {
            // Client
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $data = curl_exec($ch);
            if($filter)
            {
                $data =  str_replace('$','s',$data); 
            }
            $curl_errno = curl_errno($ch);
            $curl_error = curl_error($ch);
            curl_close($ch);
            
            if ($curl_errno > 0)
            {                
                return null;
            }
            else
            {     
                return array($data, strlen($data));                           
            }
        }
        catch( Exception $e)
        {
            return null;
        }  
        
    }
    
    function decode($jsonp, $assoc = false)
    { 
        if($jsonp[0] !== '[' && $jsonp[0] !== '{') { 
           $jsonp = substr($jsonp, strpos($jsonp, '('));
        }
        return json_decode(trim($jsonp,'();'), $assoc);
    }
    
    function setUrl($apiRoot, $socialScore)
    {   
        $postUrl = $apiRoot . '/socialproxyurl';
        
        $ch = curl_init();
                       
        curl_setopt($ch, CURLOPT_URL, $postUrl);
        curl_setopt($ch, CURLOPT_POST      ,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS    ,$socialScore);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
        $data = curl_exec($ch);
        
        //echo '<pre>'.print_r($data, true).'</pre>';
    }
?>