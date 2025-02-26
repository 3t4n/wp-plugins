<?php


class atomicreach {

    public $format;

    public function __construct() {
        $this->format = 'json';
    }


    public function tribes_getInfo($args){
        return $this->_callAPI('tribes.getInfo', $args);
    }
    
    public function tribes_getPosts($args){
        return $this->_callAPI('tribes.getPosts', $args);
    }
    
    public function tribes_getUsers($args) {
        return $this->_callAPI('tribes.getUsers', $args);
    }

    public function tribes_getUsersStatus($args){
        return $this->_callAPI('tribes.getUsersStatus', $args);
    }

    public function tribes_search($args){
        return $this->_callAPI('tribes.search', $args);
    }





    public function users_getInfo($args){
       return $this->_callAPI('users.getInfo', $args);
    }
        
    public function users_getPosts($args){
       return $this->_callAPI('users.getPosts', $args);
    }
       
    public function users_getTribes($args){
       return $this->_callAPI('users.getTribes', $args);
    }
    
    
    
    
    public function posts_getInfo($args){
        return $this->_callAPI('posts.getInfo', $args);
    }

    public function posts_search($args){

        return $this->_callAPI('posts.search', $args);
    }


    protected function _callAPI($method, $params){
 
        if (!is_array($params)) throw exception('Please provide an array of arguments.');
        
            $request = 'http://api.atomicreach.com/'
                        . '?format=' . $this->format
                        . '&method=' . $method
                        . $this->_buildquery($params);

            $result = file_get_contents($request);


            switch ($this->format){
                case 'json' :
                    $response = json_decode($result);
                    if ($response->meta->status == 'ok'){
                        return $response->rsp;
                    } else {
                        throw new Exception('API says: ' . $response->meta->message);
                    }

                break;
                case 'phpSerial' :
                    $response = unserialize($result);
                    if ($response['meta']['status'] == 'ok'){
                        return $response['rsp'];
                    } else {
                        throw new Exception('API says: ' .$response['meta']['message']);
                    }

                break;
            }
    }

    private function _buildquery($arr){
		$string='';
		foreach($arr as $k=>$v) {

                    if (is_array($v)){
                        foreach($v as $xv) {
                            $string .= '&'. $k .'[]='. urlencode($xv);
                        }
                    } else if (is_null($v)) {
                        //ignore null
                    }else {
			$string .= '&'. $k .'='. urlencode($v);
                    }
		}
		return $string;
    }


}