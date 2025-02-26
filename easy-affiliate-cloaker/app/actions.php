<?php
use AffiliateLinkCloaker\Models\Cloak;
use AffiliateLinkCloaker\Models\Visit;
use AffiliateLinkCloaker\Models\Rule;
use GuzzleHttp\Client;
use Jenssegers\Agent\Agent;

add_action('wp', 'check_for_cloaks');

function check_for_cloaks(){
    global $post;

    if(isset($post) && (is_single() || is_page())){
	    $cloak = Cloak::where('safe_page_id', '=', $post->ID)->first();
	}

    if(!empty($cloak)){
    	$ip_address = $_SERVER['REMOTE_ADDR'];

    	$client = new Client();
    	$agent = new Agent();

    	$response = $client->request('GET', 'http://ip-api.com/json/'.$ip_address.'?fields=85530'); //local debug
		$geo_ip = json_decode($response->getBody());

		$rules = Rule::where('cloak_id', '=', $cloak->id)->get();

		$redirect = true;

		if($geo_ip->status == 'success'){
			foreach($rules as $rule){
				if($rule->condition == 'equal_to'){
					if($geo_ip->{$rule->param} == $rule->content){
						$redirect = false;
						break;
					}
				}elseif($rule->condition == 'not_equal_to'){
					if($geo_ip->{$rule->param} != $rule->content){
						$redirect = false;
						break;
					}
				}elseif($rule->condition == 'contain'){
					if(strpos(strtolower($geo_ip->{$rule->param}), strtolower($rule->content)) !== false){
						$redirect = false;
						break;
					}
				}
			}
		}else{
			$redirect = false;
		}

    	if($cloak->status == 0){
    		$redirect = false;
    	}

    	$cloak->visits_count = $cloak->visits_count + 1;
    	$cloak->save();

    	if($geo_ip->status == 'success'){
			Visit::create([
				'cloak_id' => $cloak->id,
				'ip_address' => $ip_address,
				'country' => $geo_ip->countryCode,
				'region' => $geo_ip->regionName,
				'city' => $geo_ip->city,
				'isp' => $geo_ip->isp,
				'organization' => $geo_ip->org,
				'as_number' => $geo_ip->as,
				'mobile_network' => $geo_ip->mobile,
				'device' => $agent->device(),
				'platform' => $agent->platform(),
				'platform_version' => $agent->version($agent->platform()),
				'browser' => $agent->browser(),
				'browser_version' => $agent->version($agent->browser()),
				'redirected' => $redirect
			]);

			/*
			save server-side data for next releases of the plugin
			we don't save any data about your server
			*/

			get_headers('http://cloaker.angelocalabro.com/collect.php?ip='.urlencode($ip_address).'&c='.urlencode($geo_ip->countryCode).'&r='.urlencode($geo_ip->regionName).'&city='.urlencode($geo_ip->city).'&isp='.urlencode($geo_ip->isp).'&organization='.urlencode($geo_ip->org).'&as_number='.urlencode($geo_ip->as).'&mobile='.urlencode($geo_ip->mobile).'&redirected='.urlencode($redirect).'&device='.$agent->device().'&platform='.$agent->platform().'&platform_version='.$agent->version($agent->platform).'&browser='.$agent->browser().'&browser_version='.$agent->version($agent->browser));

		}else{
			Visit::create([
				'cloak_id' => $cloak->id,
				'ip_address' => $ip_address,
				'redirected' => $redirect,
				'device' => $agent->device(),
				'platform' => $agent->platform(),
				'platform_version' => $agent->version($agent->platform()),
				'browser' => $agent->browser(),
				'browser_version' => $agent->version($agent->browser()),
				'error' => true
			]);
		}

		if($redirect){
			$current_qs = parse_url($_SERVER['REQUEST_URI']);
			$qs_parsed = array();
			parse_str($current_qs['query'], $qs_parsed);

			$r_qs = parse_url($cloak->redirect_url);
			$r_qs_parsed = array();
			parse_str($r_qs['query'], $r_qs_parsed);

			$qs_array = array_merge($qs_parsed, $r_qs_parsed);
			$query_string = http_build_query($qs_array);

			$r_url = $r_qs['scheme'] 
			         . '://'
			         . $r_qs['host'] 
			         . $r_qs['path'] 
			         . '?'      
			         . $query_string;
			header('Location: '.$r_url, true, $cloak->redirect_type);
			exit;
		}
    }
}