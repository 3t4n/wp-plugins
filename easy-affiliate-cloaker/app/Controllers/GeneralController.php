<?php namespace AffiliateLinkCloaker\Controllers;

use Herbert\Framework\Models\Post;
use Herbert\Framework\Notifier;
use Herbert\Framework\Http;

use AffiliateLinkCloaker\Models\Cloak;
use AffiliateLinkCloaker\Models\Visit;
use AffiliateLinkCloaker\Models\Rule;

class GeneralController {

    public function translations(){
        $strings = [
            __('Cloaks List','easy-affiliate-cloaker'),
            __('Safe Page','easy-affiliate-cloaker'),
            __('Money Page','easy-affiliate-cloaker'),
            __('Redirect Type','easy-affiliate-cloaker'),
            __('Status','easy-affiliate-cloaker'),
            __('Actions','easy-affiliate-cloaker'),
            __('Learning Mode','easy-affiliate-cloaker'),
            __('No results found','easy-affiliate-cloaker'),
            __('total cloaks','easy-affiliate-cloaker'),
            __('Select your Safe Page','easy-affiliate-cloaker'),
            __('Safe Page and Money Page','easy-affiliate-cloaker'),
            __('This page will be displayed during when Learning Mode is active.<br/>Once the Cloak is active, we will show this page only if at least one of the rules specified is true.','easy-affiliate-cloaker'),
            __('Insert your Money Page url','easy-affiliate-cloaker'),
            __('The url of your Landing Page does not have to be a link to a WordPress page or article.<br/>All the GET parameters will be preserved.','easy-affiliate-cloaker'),
            __('Redirect Type','easy-affiliate-cloaker'),
            __('The redirect type can have repercussions on search engine\'s indexing. If you don\'t know what you do select "302".','easy-affiliate-cloaker'),
            __('Rules','easy-affiliate-cloaker'),
            __('Is not necessary to insert rules at the moment: while cloak is on Learning Mode, you can watch your data and insert your rules later.','easy-affiliate-cloaker'),
            __('Nation','easy-affiliate-cloaker'),
            __('ISP','easy-affiliate-cloaker'),
            __('AS Number','easy-affiliate-cloaker'),
            __('It\'s equal to','easy-affiliate-cloaker'),
            __('It\'s not equal to','easy-affiliate-cloaker'),
            __('Contains','easy-affiliate-cloaker'),
            __('Value...','easy-affiliate-cloaker'),
            __('Delete rule','easy-affiliate-cloaker'),
            __('Add rule','easy-affiliate-cloaker'),
            __('Other options','easy-affiliate-cloaker'),
            __('Enabled','easy-affiliate-cloaker'),
            __('Disabled','easy-affiliate-cloaker'),
            __('Save','easy-affiliate-cloaker'),
            __('IP Address','easy-affiliate-cloaker'),
            __('Region','easy-affiliate-cloaker'),
            __('City','easy-affiliate-cloaker'),
            __('Organization','easy-affiliate-cloaker'),
            __('Mobile','easy-affiliate-cloaker'),
            __('Redirect','easy-affiliate-cloaker'),
            __('Error','easy-affiliate-cloaker'),
            __('Date','easy-affiliate-cloaker'),
            __('total visits','easy-affiliate-cloaker'),
            __('Dashboard','easy-affiliate-cloaker'),
            __('New Cloak','easy-affiliate-cloaker'),
            __('Visits','easy-affiliate-cloaker'),
            __('Edit','easy-affiliate-cloaker'),
            __('Delete','easy-affiliate-cloaker'),
            __('Select page or article', 'easy-affiliate-cloaker'),
            __('Device','easy-affiliate-cloaker'),
            __('Platform Version','easy-affiliate-cloaker'),
            __('Platform','easy-affiliate-cloaker'),
            __('Browser','easy-affiliate-cloaker'),
            __('Browser Version','easy-affiliate-cloaker'),
        ];
    }

    public function main(Http $request){
        if($request->has('cloak_id') && $request->has('action')){
            $action = $request->get('action');
            $cloak_id = $request->get('cloak_id');
            if($action === 'edit'){
                $cloak = Cloak::where('id', '=', $cloak_id)->with('post')->first();
                return view('@AffiliateLinkCloaker/edit.twig', ['cloak' => $cloak]);
            }elseif($action === 'delete'){
                Cloak::destroy($cloak_id);
                return redirect_response(panel_url('AffiliateLinkCloaker::dashboard'));
            }elseif($action === 'visits'){
                $items_per_page = 15;
                $current_page = $request->get('paged', 1);

                $skip = ($current_page-1) * $items_per_page;

                $visits = Visit::where('cloak_id', '=', $cloak_id)->limit($items_per_page)->skip($skip)->orderBy('id','desc')->get();
                $count = Visit::where('cloak_id', '=', $cloak_id)->count();

                if($count > ($items_per_page * $current_page)){
                    $next_url = panel_url('AffiliateLinkCloaker::dashboard').'&action=visits&cloak_id='.$cloak_id.'&paged='.($current_page+1);
                }else{
                    $next_url = '';
                }
                if($current_page != 1){
                    $prev_url = panel_url('AffiliateLinkCloaker::dashboard').'&action=visits&cloak_id='.$cloak_id.'&paged='.($current_page-1);
                }else{
                    $prev_url = '';
                }

                return view('@AffiliateLinkCloaker/visits.twig', ['visits' => $visits, 'count' => $count, 'next_url' => $next_url, 'prev_url' => $prev_url]);
            }
        }

        $items_per_page = 15;
        $current_page = $request->get('paged', 1);

        $skip = ($current_page-1) * $items_per_page;

        $cloaks = Cloak::with('post')->limit($items_per_page)->skip($skip)->get();
        $count = Cloak::count();

        if($count > ($items_per_page * $current_page)){
            $next_url = panel_url('AffiliateLinkCloaker::dashboard').'&paged='.($current_page+1);
        }else{
            $next_url = '';
        }
        if($current_page != 1){
            $prev_url = panel_url('AffiliateLinkCloaker::dashboard').'&paged='.($current_page-1);
        }else{
            $prev_url = '';
        }

    	return view('@AffiliateLinkCloaker/dashboard.twig', ['cloaks' => $cloaks, 'count' => $count, 'next_url' => $next_url, 'prev_url' => $prev_url]);
    }

    public function newCloak(){
    	return view('@AffiliateLinkCloaker/new.twig');
    }

    public function autoCompleteApi(Http $request){
    	if($request->has('term')){
	    	$term = $request->get('term');
	    	$posts = Post::select('post_title as value', 'post_title as label', 'id')
	    				->where('post_title', 'LIKE', '%'.$term.'%')
                        ->where('post_status', '=', 'publish')
	    				->where(function($q){
	    					$q->where('post_type', 'page');
	    					$q->orWhere('post_type', 'post');
	    				})
	    				->take(10)->get();
	    	return $posts;
	    }
	    return [];
    }

    public function insertCloak(Http $request){
        if($request->has('safe-page') && $request->has('landing-page')){
            $safe_page = $request->get('safe-page');
            $landing_page = $request->get('landing-page');
            $redirect_type = $request->get('redirect_type');

            $cloak = Cloak::create(['safe_page_id' => $safe_page, 'redirect_url' => $landing_page, 'redirect_type' => $redirect_type]);

            if($request->has('param') && $request->has('condition') && $request->has('content')){
                $params = $request->get('param');
                $conditions = $request->get('condition');
                $contents = $request->get('content');

                foreach($params as $key => $param){
                    if(!empty($conditions[$key]) && !empty($contents[$key])){
                        Rule::create([
                            'cloak_id' => $cloak->id,
                            'param' => $param,
                            'condition' => $conditions[$key],
                            'content' => $contents[$key]
                        ]);
                    }
                }
            }
        }

        return redirect_response(panel_url('AffiliateLinkCloaker::dashboard'));
    }

    public function saveCloak(Http $request){
        if($request->has('safe-page') && $request->has('landing-page') && $request->has('cloak_id') && $request->has('learning_mode')){
            $safe_page = $request->get('safe-page');
            $landing_page = $request->get('landing-page');
            $redirect_type = $request->get('redirect_type');
            $status = $request->get('learning_mode');
            $cloak_id = $request->get('cloak_id');

            $cloak = Cloak::find($cloak_id);

            $cloak->safe_page_id = $safe_page;
            $cloak->redirect_url = $landing_page;
            $cloak->status = $status;
            $cloak->redirect_type = $redirect_type;
            $cloak->save();

            if($request->has('param') && $request->has('condition') && $request->has('content')){
                Rule::where('cloak_id', '=', $cloak_id)->delete();

                $params = $request->get('param');
                $conditions = $request->get('condition');
                $contents = $request->get('content');

                foreach($params as $key => $param){
                    if(!empty($conditions[$key]) && !empty($contents[$key])){
                        Rule::create([
                            'cloak_id' => $cloak->id,
                            'param' => $param,
                            'condition' => $conditions[$key],
                            'content' => $contents[$key]
                        ]);
                    }
                }
            }
        }

        return redirect_response(panel_url('AffiliateLinkCloaker::dashboard'));
    }
}