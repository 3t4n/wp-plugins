<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if(!class_exists('vxg_freshdesk_api')){
    
class vxg_freshdesk_api extends vxg_freshdesk{
  
  public $token='' ; 
  public $url='' ; 
    public $info='' ; // info
    public $error= "";
    public $timeout= "70";

function __construct($info) {
     
    if(isset($info['data']['api_key'])){ 
       $this->token= $info['data']['api_key'];
    }
    if(isset($info['data']['url'])){ 
       $this->url= trailingslashit( $info['data']['url'] );
    }

 $this->info=$info;
    }
public function get_token(){
  $users=$this->get_crm_fields('contact'); 
 $info=$this->info;
 $info=isset($info['data']) ? $info['data'] : array();
    
    if(is_array($users) && count($users)>0){
    $info['valid_token']='true';    
    }else{
        if(!empty($users)){
        $info['error']= $users;
        }
      unset($info['valid_token']);  
    }

    return $info;
}

public function get_crm_fields($module,$is_options=false){
    $path=$module.'_fields';
     $fields=array();
 $arr=$this->post_crm($path); 
 //var_dump($arr);
  if(!empty($arr['message'])){ $fields=$arr['message']; $arr=array(); }

 if(!empty($arr)){
 if($module == 'ticket' && $is_options === false){
  $fields=array('email'=>array('name'=>'email','label'=>'Email','type'=>'email','req'=>'true'),'name'=>array('name'=>'name','label'=>'Name','type'=>'name'),'phone'=>array('name'=>'phone','label'=>'Phone','type'=>'phone'),'facebook_id'=>array('name'=>'facebook_id','label'=>'Facebook Id','type'=>'text'),'twitter_id'=>array('name'=>'twitter_id','label'=>'Twitter Id','type'=>'text'),'unique_external_id'=>array('name'=>'unique_external_id','label'=>'Unique External Id','type'=>'text'),'email_config_id'=>array('name'=>'email_config_id','label'=>'Email Config Id','type'=>'text'));

 $fields['cc_emails']=array('name'=>'cc_emails','label'=>'cc emails','type'=>'email');
 $fields['id']=array('name'=>'id','label'=>'Ticket ID','type'=>'Number');
 $fields['attachments']=array('name'=>'attachments','label'=>'Attachment (Single or multiple files)','type'=>'file');     
  
}
 $fields['tags']=array('name'=>'tags','label'=>'Tag','type'=>'text');
$not_custom=array('description','subject','ticket_type');
 $convert=array('agent'=>'responder_id','company_name'=>'company_id');
   foreach($arr as $k=>$v){
        if(isset($convert[$v['name']])){
       $v['name']=$convert[$v['name']];
       }
$temp=array('name'=>$v['name'],'label'=>$v['label'],'type'=>$v['type']);
if(!in_array($v['name'],$not_custom)){
    $temp['is_custom']='1';
}
      
       $type= $module == 'contact' && $v['type'] =='default_description' ? '': $v['type'] ;
       if(  in_array($type ,array('default_subject','default_description','default_name','default_email') ) ){
           $temp['req']='true';
       }
        if($v['type'] == 'default_status'){
           $temp['eg']='enter digit, for open=2, pending=3, resolved=4, closed=5';
       }else if($v['type'] == 'default_priority'){
         $temp['eg']='enter digit, for low=1, medium=2, high=3, urgent=4';  
       }
           

$options=array(); $sources=array(1,2,3,7,8,9,10);
if(!empty($v['choices'])){
if(in_array($type,array('default_status'))){
 foreach($v['choices'] as $key=>$label){
     if(is_array($label) && isset($label[0])){
      $label=$label[0];   
     }    
   $options[(string)$key]=$label;   
 }   
}else if(in_array($type,array('default_ticket_type'))){
   foreach($v['choices'] as $key=>$label){
  $options[(string)$label]=$label;   
 }   
}else if(in_array($type,array('default_product'))){
   foreach($v['choices'] as $key=>$label){
  $options[(string)$label]=$key;   
 }   
}else if(in_array($type,array('default_source'))){
   foreach($v['choices'] as $label=>$key){
       if(in_array($key,$sources)){
  $options[(string)$key]=$label;
       }   
 }   
}else if(in_array($type,array('default_priority','default_group','default_agent'))){
   foreach($v['choices'] as $label=>$key){
  $options[(string)$key]=$label;         
 }   
}else if(in_array($type,array('default_language','default_time_zone'))){
   foreach($v['choices'] as $key=>$label){
  $options[(string)$key]=$label;         
 }   
}else if(in_array($type,array('nested_field'))){
    $levels=array();
   foreach($v['choices'] as $kk=>$vv){
       $levels[1][$kk]=$kk;
  if(is_array($vv)){
      foreach($vv as $kkk=>$vvv){
       $levels[2][$kkk]=$kkk;  
       if(is_array($vv)){
      foreach($vvv as $kkkk=>$vvvv){
      $levels[3][$vvvv]=$vvvv;
      }} 
      }
  }        
 }
$temp['options']=$levels[1]; 
$temp['eg']=implode(', ', array_slice($levels[1],0,200)); 
if(!empty($v['nested_ticket_fields'])){
foreach($v['nested_ticket_fields'] as $kk=>$vv){
        $fieldi=array('name'=>$vv['name'],'label'=>$vv['label'],'type'=>$temp['type'],'is_custom'=>'1');
$fieldi['options']=$levels[$vv['level']];
$fieldi['eg']=implode(', ', array_slice($fieldi['options'],0,200)); 
  $fields[$vv['name']]=$fieldi;      
    }
}
    
}else{
 foreach($v['choices'] as $key=>$label){
  $options[(string)$label]=$label;   
 }    
}
if(!empty($options)){
$temp['options']=$options;    
$eg=array();
foreach($options as $op_k=>$op_v){
    $eg[]=$op_k.'='.$op_v;
}
$temp['eg']=implode(', ', array_slice($eg,0,200));    
} }

$fields[$v['name']]=$temp;
   }  
 }
 
 if($is_options === true){
 $fields_op=array();
 foreach($fields as $k=>$v){
 if(empty($v['options'])){  continue;}
$op=array();
foreach($v['options'] as $key=>$val){
  
$op[]=array('name'=>$val,'value'=>$key);    
 }
$v['options']=$op;    
$fields_op[$k]=$v; 
 }    
return $fields_op;
}

 //var_dump($fields,$arr);
 return $fields;
}

public function push_object($module,$fields,$meta){ 
/* $object_url='tickets/155';
    $arr=$this->post_crm($object_url);
    var_dump($arr); die();
*/
//check primary key
 $extra=array();
  $debug = isset($_REQUEST['vx_debug']) && current_user_can('manage_options');
  $event= isset($meta['event']) ? $meta['event'] : '';
  $id= isset($meta['crm_id']) ? $meta['crm_id'] : '';
  $crm_fields= isset($meta['fields']) ? $meta['fields'] : '';

   $object=$module;
 if($module == 'company'){
     $module='companies';
 }else{
     $module.='s';
 }
 
  $req_id='';

  if($debug){ ob_start();}
if(!empty($meta['primary_key']) && !empty($fields[$meta['primary_key']]['value']) ){    

$field=$meta['primary_key'];
$search=is_array($fields[$field]['value']) ? implode(' ',$fields[$field]['value']) : $fields[$field]['value'];
if($field == 'id'){
 $id=$search;  
 $path=$module.'/'.$id; 
 $search_response=$this->post_crm($path,'get');
  if(isset($search_response['requester_id'])){
      $req_id=$search_response['requester_id'];   
     }
$extra["Ticket ID"]=$search;
unset($fields['id']);    
}else{
    if($object == 'company'){
$path=$module.'/autocomplete?name='.urlencode($search);
$search_response=$this->post_crm($path,'get');
if(!empty($search_response['companies'])){
    $search_res=$search_response['companies']; 
    $search_response=array();
    foreach($search_res as $v){
     if($v['name'] == $search){
       $search_response[]=$v;   break;
     }   
    }
}
}else if($object == 'ticket' && $field != 'email'){
  $path='search/'.$module.'?query="'.urlencode($field.':'.$search).'"';
  $search_response=$this->post_crm($path,'get'); 
  if(!empty($search_response['results'])){
    $search_response=$search_response['results'];
} 
}else{
$path=$module.'?'.$field.'='.urlencode($search);
$search_response=$this->post_crm($path,'get');
}

//var_dump($search_response,$path); die();
if($debug){
  ?>
  <h3>Search field</h3>
  <p><?php print_r($field) ?></p>
  <h3>Search term</h3>
  <p><?php print_r($search) ?></p>
    <h3>POST Body</h3>
  <p><?php print_r($body) ?></p>
  <h3>Search response</h3>
  <p><?php print_r($res) ?></p>  
  <?php
  } 
if(isset($search_response[0]['id']) && is_array($search_response[0]) ){
          $id=$search_response[0]['id']; 
     if(isset($search_response[0]['requester_id'])){
      $req_id=$search_response[0]['requester_id'];   
     }
 }
$extra["body"]=array($field=>$search);
$extra["response"]=$search_response;
}
}
     if(in_array($event,array('delete_note','add_note'))){    
  if(isset($meta['related_object'])){
    $extra['Note Object']= $meta['related_object'];
  }
  if(isset($meta['note_object_link'])){
    $extra['note_object_link']=$meta['note_object_link'];
  }
}

 $status=$action=""; $send_body=true; $arr=array();
 $entry_exists=false; $object_url='';
 $link=""; $error=""; $method='post';

$post=array();
$replace_keys=array('ticket_type'=>'type','group'=>'group_id','product'=>'product_id');
$int_vals=array('source','group_id','product_id');

  foreach($fields as $k=>$field){
      if(in_array($k,array('id'))){ continue; }
if(!empty($crm_fields[$k]['type'])){
    $v=$fields[$k]['value'];
    $type=$crm_fields[$k]['type'];
   if($crm_fields[$k]['type'] == 'custom_date'){
     $v=date('Y-m-d',strtotime($v));
 }

 if( is_array($v) && in_array($type,array('default_description','custom_text','custom_paragraph','email'))){
    $v=trim(implode(', ',$v)); 
 }
  if(strpos($type,'custom') === 0 || in_array($type,array('nested_field'))){
      if($object == 'company'){
        if(!isset($post['custom_fields'])){ $post['custom_fields']=array(); }  
        $post['custom_fields'][$k]=$v;   
      }else{
      $post['custom_fields['.$k.']']=$v;      
      }

 }else if($crm_fields[$k]['type'] == 'file' && function_exists('file_get_contents') ){
     $upload = wp_upload_dir();
     if(is_array($v)){
         $is_multi=$v;
     }else{
    $is_multi=json_decode($v,true);
if(!is_array($is_multi)){
 $is_multi=array_filter(array_map('trim',explode(',',$v))); 
}
     }
if(!empty($is_multi)){
foreach($is_multi as $file){
$file=str_replace($upload['baseurl'],$upload['basedir'],$file);
$post['attachments'][]=$file;
} }
//$post['attachments[1]']=curl_file_create($file);
 }else if($k == 'tags'){
  $post['tags[]']= preg_replace("/[^a-zA-Z0-9]+/", "", $v);    
 }else if($k == 'domains'){
      $post[$k]=array($v);
 }else if($k == 'cc_emails'){
      $post['cc_emails[]']=$v; 
 }else{
     if(isset($replace_keys[$k])){ $k=$replace_keys[$k];  }
     if(in_array($k,$int_vals)){
    $v=(float)$v;     
     }
    $post[$k]=$v;
 }   
}    }
//var_dump($post); die();
 
if($id == ""){
    //insert new object
$action="Added";  $status="1";
  $object_url=$module;

}else{
 $entry_exists=true;
    if($event == 'add_note'){
 
$object_url='tickets/'.$id.'/notes';
$post=array('body'=>$fields['body']['value']);
$object='note';
$action="Added";
  $status="1";
  }else if(in_array($event,array('delete','delete_note'))){
 $method='delete';
 $object_url=$module.'/'.$id;
     if($event == 'delete_note'){ 
   $object='notes';
   $object_url='conversations/'.$id;
   
     }
     $action="Deleted";  
  $status="5";  
  }
  else if($event == 'restore'){
     $method='put'; $status='2';
 $object_url=$module.'/'.$id.'/restore';  
 $post='';
  }else{
      $event = 'update';
      
       if($module == 'tickets'){
      $object_ur=$module.'/'.$id.'/reply';      
      $method='post'; $object='thread';
  
  $post_r=array('body'=> !empty($post['description']) ? $post['description'] : '' ); 
  if(!empty($req_id)){
  $post_r['user_id']=$req_id;    
  }
  if(!empty($post['attachments'])){
    $post_r['attachments']=$post['attachments'];  
  }
  if(!empty($post['email'])){
   // $post_r['from_email']=$post['email'];   
  }
 // var_dump($post_r); die();
  unset($post['description']);
  unset($post['attachments']);
  unset($post['email']);
$arr=$this->post_crm($object_ur,$method,$post_r); 
if(isset($arr['body'])){ unset($arr['body']); }
$extra['Reply Response']=$arr;
  }
  
    //update object
 $action="Updated"; $status="2";
 if(empty($meta['update'])){
  $object_url=$module.'/'.$id;
  $method='put';
 }
 
  }
}
//var_dump($object_url,$post,$method); die();
if( !empty($object_url)){ //
if(!empty($post['tag'])){
    $tags=array_filter(explode(',',$post['tag']));
    if(!empty($tags)){
        foreach($tags as $k=>$v){
     $post['tag['.$k.']']=$v;       
        }
    }
}
if(!empty($post['description'])){
$post['description']=nl2br($post['description']);
}
  if($module == 'tickets'){
      $status_i=2;
      if(isset($post['status'])){
          $status_i=(int)$post['status'];
      }else if(isset($meta['status'])){
          $status_i=(int)$meta['status'];
      }
           $priority=2;
      if(isset($post['priority'])){
          $priority=(int)$post['priority'];
      }else if(isset($meta['priority'])){
          $priority=(int)$meta['priority'];
      }
    $post['priority']=$priority;
    $post['status']=$status_i;
}

if($object == 'company'){
    if(isset($post['domains'])){
     unset($post['domains']);   
    }
$post=json_encode($post);
}
//var_dump($post); die();
$arr=$this->post_crm($object_url,$method,$post);
//var_dump($post,$arr,$object_url,$method); die();

if(isset($arr['id']) ){
$id =  isset($arr['ticket_id']) ? $arr['ticket_id'] : $arr['id'];
if($event !='add_note'){ 
//if($module == 'tickets'){
 //only main tickets , not replies
$link=$this->url.'a/'.$module.'/'.$id;
/*}else if($object == 'contact'){     
$link=$this->url.$module.'/'.$id;     
}*/
}
}else if($method !='delete' && $event !='restore'){ 
    $status=''; $id='';
if(isset($arr['errors'][0]['message'])){
$error=$arr['errors'][0]['field'].': '.$arr['errors'][0]['message'];         
}else if(!empty($arr['message'])){
$error=$arr['message'];    
}else if(!empty($arr)){
$error='Error: '.json_encode($arr); $status='';    
}
}
}
  if($debug){
  ?>
  <h3>Account Information</h3>
  <p><?php //print_r($this->info) ?></p>
  <h3>Data Sent</h3>
  <p><?php print_r($post) ?></p>
  <h3>Fields</h3>
  <p><?php echo json_encode($fields) ?></p>
  <h3>Response</h3>
  <p><?php print_r($response) ?></p>
  <h3>Object</h3>
  <p><?php print_r($module."--------".$action) ?></p>
  <?php
  $contents=trim(ob_get_clean());
  if($contents!=""){
  update_option($this->id."_debug",$contents);   
  }
  }
  
       //add entry note
 if(!empty($status) && !empty($meta['__vx_entry_note']) && !empty($id) ){
 $disable_note=$this->post('disable_entry_note',$meta);
   if(!($entry_exists && !empty($disable_note))){
       $entry_note=$meta['__vx_entry_note'];
       
    $object_url='tickets/'.$id.'/notes';
$note=array('body'=>$entry_note['body']);   


$note_response= $this->post_crm( $object_url, 'post',$note);

  $extra['Note Post']=$note;
  $extra['Note Response']=$note_response;

   }  
 }
//var_dump($status); die();
return array("error"=>$error,"id"=>$id,"link"=>$link,"action"=>$action,"status"=>$status,"data"=>$fields,"response"=>$arr,"extra"=>$extra);
}


public function get_entry($module,$id){

    $url=$module.'/'.$id;
     $arr= $this->post_crm($url);
if(!empty($arr['custom_fields'])){
 $arr=array_merge($arr,$arr['custom_fields']);   
}
     if(!empty($arr['requester_id'])){
  $req_id=$arr['requester_id'];
     $url='contacts/'.$req_id;
     $customer= $this->post_crm($url);
     if(!empty($customer['custom_fields'])){
 $customer=array_merge($customer,$customer['custom_fields']);   
}
if(!empty($customer)){
  $arr=array_merge($arr,$customer);    
}
}
//var_dump($arr); die();
  return $arr;     
}

public function post_crm($path,$method='get',$body=''){

    // $head=array('Authorization: Basic '.base64_encode($this->token.':X'),'Content-Type: application/json');
$head=array('Authorization'=>'Basic '.base64_encode($this->token.':X')); 
if(!empty($body) && !is_array($body)){
  $head['Content-Type']='application/json';   
}
if($method == 'json'){
   // $body=json_encode($body);
//  
// $method='post'; 
} 
if(!empty($body) && is_array($body) ){
$files = array();
if(!empty($body['attachments'])){
$files=$body['attachments'];
unset($body['attachments']);
}
$boundary = uniqid();
$delimiter = '-------------' . $boundary;
$head['Content-Type']='multipart/form-data; boundary='.$delimiter;

$body = $this->build_data_files($boundary, $body, $files);
}

$path=$this->url.'api/v2/'.$path; 
  $response = wp_remote_post( $path, array(
  'method' => strtoupper($method),
  'timeout' => $this->timeout,
  'headers' => $head,
  'body' => $body
  )
  ); 

 $arr= array();
 if(!is_wp_error($response) && isset($response['body']) ){

     if(!empty($response['body'])){
    $arr=json_decode($response['body'],true); 
     }else if(isset($response['response'])){
  $arr=$response['response']; 
     }
 }
  
  return $arr; 

}
public function build_data_files($boundary, $fields, $files){
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }

    foreach ($files as $name => $file) {
    $name=basename($file);
   $content = file_get_contents($file);
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="attachments[]"; filename="'.$name.'"' . $eol
            //. 'Content-Type: image/png'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol;

        $data .= $eol;
        $data .= $content . $eol;
    }
    $data .= "--" . $delimiter . "--".$eol;


    return $data;
}
   
}
}
?>