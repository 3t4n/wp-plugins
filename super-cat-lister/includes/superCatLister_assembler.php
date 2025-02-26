<?php
/*To do: 
Add to wpCategoryExpander:  Create function to check if the category exists.  Also, make sure we use it, even when the category is given as a number.
*/

//Create the plugin class
if(!class_exists("SuperCatLister_Assembler")) {
class SuperCatLister_Assembler {
function SuperCatLister_Assembler($pairs,$pageFlag=FALSE) {
$this->pairs = $pairs;
$this->pageFlag=$pageFlag;
$this->init();
}//end function SuperCatLister_Assembler

function getList() {
return $this->postsList;
}//end function getCatList

function init() {

$this->assignValues();
$this->createListElementCreator();
$this->setPostIdHolder();
$this->createPostsList();
} //end function init()

function setPostIDHolder() {//echo 'id: '.$id.'<br>';
global $post;
$this->idHolder = $post->ID;
}//end function setPostIDHolder

function assignValues() {
extract($this->pairs);
$this->catToList = $cat;
$this->cat_name = $cat_name;
$this->include_self = $include_self;
$this->container_style = $container_style;
$this->orderby = $orderby;
$this->meta_key = $meta_key;
$this->order = $order;
$this->numberposts = $numberposts;
$this->depth = $depth;

$this->weHaveAlreadyAdjustedNumberPosts = FALSE;
}//end function assignValues

function createListElementCreator() {
$this->listElementCreator = new superCatListerCreateListElements($this->pairs);
}//end createListElementCreator

function createPostsList() {
if(!$this->pageFlag) {
$this->postsList = $this->getCatList();//print_r($this->postsList);
} else {
$this->postsList = $this->getPageList();
} //end if(!$this->pageFlag)

}//end function createCatList

function getCatList() {
if($this->catToList || $this->cat_name) {
$this->setCatForQuery();
$this->setSortParameters();
$this->setCurrentPostInCat();

$this->postsArray = $this->createCatPostsArray();

//$this->infoAboutQuery();  //Use this for debugging

$postsList = $this->loopThroughPosts();
}//end if($this->catToList)	
return $postsList;
}//end function getCatList

function getPageList() {
global $post;
$this->postsArray = $this->createPagePostsArray('child_of='.$post->ID);
$this->assignDepth();
$postsList = $this->loopThroughPosts();
return $postsList;
}//end function getPageList

function setCatForQuery() {
if($this->cat_name) {
$wpCategoryExpander = new WPCategoryExpander();
$this->catToList = $wpCategoryExpander->getCatIdFromName($this->cat_name);
}//end if($this->cat_name)
$this->catForQuery = "cat=".$this->catToList;
}//end setCatForQuery

function createCatPostsArray() {
$posts_array =$this->generatePostsArray();
$final_posts_array = $posts_array;
if($this->numberposts !== -1 && !$this->include_self && !$this->weHaveAlreadyAdjustedNumberPosts ) {

$posts_array = $this->checkIfQueryNeedsResetting($posts_array);
$final_posts_array = $posts_array;
}// end if($this->numberposts !== -1) 
return $final_posts_array;
}//end function createPagesArray


function checkIfQueryNeedsResetting($posts_array) {
//The purpose of this function is to determine if we need to redo the query to account for the fact that the mainpost may be included in it, even though it is set not to show.  This can mess up the number of posts that will show up
$this->numberPostsOrig = $this->numberposts;
$this->numberOfPostsMustBeRaised = FALSE;
foreach ($posts_array as $postNow) {
$id = $postNow->ID;
if($id==$this->idHolder  ) {	
$this->numberOfPostsMustBeRaised = TRUE;
}//end if($id==$this->idHolder  )
}//end foreach ($postsArray as $postNow)
$this->weHaveAlreadyAdjustedNumberPosts = TRUE;

if($this->numberOfPostsMustBeRaised) {
$this->numberposts = $this->numberposts+1;

$this->setSortParameters();
$posts_array =$this->generatePostsArray();
}//if($this->numberOfPostsMustBeRaised)
return $posts_array;
}//end function checkIfQueryNeedsResetting

function generatePostsArray() {

$posts_array = get_posts(
//'cat='.$this->catToList
 $this->catForQuery
.$this->orderby_for_sort
.$this->order_for_sort
.$this->meta_key_for_sort
.$this->numberposts_for_sort
.$this->depthForQuery
);
return $posts_array;
}//end function generatePostsArray

function createPagePostsArray($args = '') {
	$defaults = array(
		'depth' => 0, 'show_date' => '',
		'date_format' => get_option('date_format'),
		'child_of' => 0, 'exclude' => '',
		'title_li' => __('Pages'), 'echo' => 1,
		'authors' => '', 'sort_column' => 'menu_order, post_title'
		
	);
    $r = wp_parse_args( $args, $defaults );
	$pages = get_pages($r);
	return $pages;
}//end function createPagePostsArray()


function setSortParameters() {
$this->order_for_sort = NULL;
if($this->order) {
$this->order_for_sort = '&order='.$this->order;
}//end if ($this->oder_by)
$this->meta_key_for_sort = NULL;
if($this->meta_key) {
$this->meta_key_for_sort = '&meta_key='.$this->meta_key;
}//end if ($this->meta_key)
$this->numberposts_for_sort = NULL;
if($this->numberposts) {
$this->numberposts_for_sort = '&showposts='.$this->numberposts;
}//end if ($this->numberposts)
$this->depthForQuery = NULL;
if($this->depth) {
$this->depthForQuery = '&depth='.$this->depth;
}//end if($this->depth)
$this->orderby_for_sort=NULL;
if($this->orderby) {
$this->orderby_for_sort = '&orderby='.$this->orderby;
}//end if($this->orderby)

}//end function setSortParameters

function infoAboutQuery() {
//This is used for testing only

echo '<br>Current post: '.$this->idHolder;
echo '<br>Cat being searched for: '.$this->catToList;
echo '<br>Number of Posts - Prior: '.$this->numberPostsOrig;
echo '<br>Include Current Post: ';if($this->include_self) {echo 'True';} else {echo 'False';}
echo '<br>Is current post in cat : '.$this->currentPostInCat;
echo '<br>Number of Posts - After: '.$this->numberposts;
echo '<br><br>';
}//end function infoAboutQuery()

function setCurrentPostInCat() {
$catsForPost = wp_get_post_categories($this->idHolder);
//print_r($catsForPost);
$this->currentPostInCat = in_array($this->catToList,$catsForPost);
}//end function setCurrentPostInCat()

function set_container_style($postsList) {
$postsList = 
 $this->container_style
.$postsList
.'</div>'
;
return $postsList;
}//end function set_container_style

function loopThroughPosts() {
$postsList = NULL;
foreach ($this->postsArray as $postNow) {
$id = $postNow->ID;
if($id!==$this->idHolder || $this->include_self ) {	//This prevents the current post from being listed inside itself;
$postListElement = $this->getNewListElement($postNow);
$postsList = $postsList.$postListElement;
}//end if($id!==$this->idHolder)
}//end foreach ($postsArray as $postNow)
$postsList = $this->set_container_style($postsList);
return $postsList;
}//end function loopThroughPosts

function getNewListElement($postNow) {
$newListElement = $this->listElementCreator->getElement($postNow);
//$newListElement = $newListElement.'<br>Depth: '.$postNow->depth.'<br>';
return $newListElement;
}//end function getNewListElement

function assignDepth() {
$depth = 1;  //This will get decremented by the first round of the loop
$previousID = 0;
$previousParent = 0;
$count = 0;
foreach ($this->postsArray as $postNow) {
$id = $postNow->ID;
if($id!==$this->idHolder || $this->include_self ) {	//This prevents the current post from being listed inside itself;
$parent = $postNow->post_parent;;
if($parent == $previousParent) {$depth = $depth;}
if($parent == $previousID) {$depth = $depth+1;}
if($parent !==$previousParent and $parent !==$previousID) {$depth = $depth-1;}
$previousID = $id;
$previousParent = $parent;
$postNow->depth = $depth;
$this->postsArray[$count] = $postNow;
}//end if($id!==$this->idHolder)
$count = $count +1;
}//end foreach ($postsArray as $postNow)
}//end function assignDepth

function checkDepth() { //This is just for debugging purposes, to make certain depth has been assigned correctly
foreach ($this->postsArray as $postNow) {
$id = $postNow->ID;
if($id!==$this->idHolder || $this->include_self ) {	//This prevents the current post from being listed inside itself;
echo 'Depth: '.$postNow->depth.' ID: '.$postNow->ID.' Parent: '.$postNow->post_parent.'<br>';
}//end if($id!==$this->idHolder)
}//end foreach ($postsArray as $postNow)
}//end function checkDepth;

} //end class SuperCatLister_Assembler
} //end if (!class_exists("SuperCatLister_Assembler"))
?>