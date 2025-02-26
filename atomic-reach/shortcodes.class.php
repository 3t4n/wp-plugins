<?php

                
class ARShortCodes extends atomicreach {
    
    protected $_options;
    protected $_shortcode;
    
    public function __construct($attr){
        parent::__construct();
        $this->_options = $attr;
       if (method_exists($this, '_init'))  $this->_init();
    }

 

    protected function _render($file, $view){
            
        $view['options'] = $this->_options;
	ob_start();
        include('views/' . $file);
        $output = ob_get_contents();
        ob_end_clean();

       return  $output;
       
        
    }

    
    
    
}

        
        
class ARPostList extends ARShortCodes {
    
    protected function _init(){
      //  print_r ($this->_options);
        $this->_shortcode = 'arPosts';
       if (!$this->_options['offset']) $this->_options['offset'] = 0;
       if (!$this->_options['limit']) $this->_options['limit'] = 5;
       if (!$this->_options['loadmore']) $this->_options['loadmore'] = 'false';
       if (!$this->_options['layout']) $this->_options['layout'] = 'horizontal';
       if ((!isset($this->_options['uri'])) AND (!isset($this->_options['username']))) throw new Exception('Need at least a tribe \'uri\' or \'username\'.');
   
       
    }
    
    
    
    
    public function draw(){
        if (isset($this->_options['uri'])){
                $posts = $this->tribes_getPosts(array('tribeUri'=>$this->_options['uri'], 'limit'=>$this->_options['limit'], 'offset'=>$this->_options['offset']));
                $appendUrl = '&uri='.$this->_options['uri'];
        } else if (isset($this->_options['username'])){
                $posts = $this->users_getPosts(array('username'=>$this->_options['username'], 'limit'=>$this->_options['limit'], 'offset'=>$this->_options['offset']));
                $appendUrl =  '&username='.$this->_options['username'];
        }
        
        $loadmoreUrl = $_SESSION['pluginPath'] . '/atomic-reach/ajax.php' . '?shortcode=' . $this->_shortcode . 
                                                             
                                                            '&offset=' . ($this->_options['limit'] + $this->_options['offset']) . 
                                                            '&layout=' . $this->_options['layout'] . 
                                                            '&limit=' . $this->_options['limit'].
                                                             $appendUrl ;
       
        if  (empty($posts)) return 'No Posts found';
        
        
        $view = array('posts'=>$posts,
                      'loadmoreUrl'=>$loadmoreUrl);
        
        
        if ($this->_options['layout'] == 'vertical'){
            return $this->_render('ARPostListV.phtml', $view);
        } else {
           return  $this->_render('ARPostListH.phtml', $view);
        }
        
    
    }
}
        
        
class ARUserGrid extends ARShortCodes{
    
    protected function _init(){
        $this->_shortcode = 'tribeUsers';
       if (!$this->_options['limit']) $this->_options['limit'] = 5;
       if (!$this->_options['layout']) $this->_options['layout'] = 'grid';
       if ((!$this->_options['uri']) AND (!$this->_options['username'])) throw new Exception('Need at least a tribe \'uri\' or \'username\'.');
    }
    
    public function draw(){
             $users = $this->tribes_getUsers(array('tribeUri'=>$this->_options['uri'], 'limit'=>$this->_options['limit']));
        if  (empty($users)) return 'No users found';
        
        //ob_start();
        
        if ($this->_options['layout'] == 'horizontal'){
            $file =  'views/ARUserH.phtml';   
        } else {
            $file =  'views/ARUserGrid.phtml';   
        }
        
        
	ob_start();
        include($file);
        $output = ob_get_contents();
        ob_end_clean();

       return  $output;
    }
    
}
        
        


