<?php
namespace CDWQA\Migrations\SabaiDiscuss;
class CDWQA_Sabai_Discuss_Migration{

	private $limit = 200;
	private $remote_offset = 0;
	private $remote_total = 0;
	private $current_action;
	private $action_queue;
	private $db;
	private $current_db;
	private $count;
	private $processed;
	private $is_local;

	public function __construct(){
		//add log.txt
		$filename = 'log.txt';
		if(!file_exists($filename)){
			$content =  'Start '. date('Y-m-d H:i:s'). PHP_EOL;
			file_put_contents($filename, $content . PHP_EOL, FILE_APPEND);
		}
	}

	public function init(){
		//need to set current db before
		$this->prepareTable();
		$this->prepareData();
	}

	public function setLimit($limit){
		$this->limit = $limit;
	}
	public function setLocal($is_local = true){
		$this->is_local = $is_local;
	}

	public function setRemoteDB($remote_db){
		$this->remote_db = $remote_db;
	}

	public function setCurrentDB($current_db){
		$this->current_db = $current_db;
	}

	public function updateOption($name, $value){
		$current_prefix = $this->current_db->db_prefix;
		$tab_options_name = $current_prefix . 'options';

		$this->current_db->query("SELECT option_id FROM {$tab_options_name} WHERE option_name = '{$name}' LIMIT 1");
		$option = $this->current_db->getResults();
		$option_id = $option && isset($option[0])? $option[0]['option_id'] : 0 ;
		$jvalue = json_encode($value);
		if(!$option_id){
			$sql = "INSERT INTO {$tab_options_name} (option_name, option_value) VALUES('{$name}', '{$jvalue}')";
			$query = $this->current_db->query($sql);
			return $this->current_db->getLastId();
		}else{
			$sql = "UPDATE {$tab_options_name} SET option_value = '{$jvalue}' WHERE option_id = {$option_id}";
			$query = $this->current_db->query($sql);
			return $option_id;
		}
		
	}

	public function getOption($name, $default = false){
		$current_prefix = $this->current_db->db_prefix;
		$tab_options_name = $current_prefix . 'options';

		$sql = "SELECT * FROM {$tab_options_name} WHERE option_name = '{$name}' LIMIT 1";
		$query = $this->current_db->query($sql);
		$result = $this->current_db->getResults();

		return isset($result[0])?json_decode($result[0]['option_value'], true):$default;
	}

	public function resetDefault(){

		$this->remote_offset = 0;
		$this->remote_total = 0;
		$this->current_action = reset($this->action_queue);
		$this->updateOption('cdwqa_remote_offset', $this->remote_offset);
		$this->updateOption('cdwqa_remote_total', $this->remote_total);
		$this->updateOption('cdwqa_current_action', $this->current_action);
		$this->updateOption('cdwqa_processed', false);
		$this->updateOption('cdwqa_count_total', false);
	}

	public function run(){

		switch ($this->current_action) {
			case 'count_total':
				$this->runCountTotal();
				break;
			case 'update_user':
				$this->runUpdateUser();
				break;
			case 'update_category':
				$this->runUpdateCategory();
				break;
			case 'update_category_parent':
				$this->runUpdateCategoryParent();
				break;
			case 'update_tag':
				$this->runUpdateTag();
				break;
			case 'update_question_answer':
				$this->runUpdateQuestionAnswer();
				break;
			// case 'update_attachment_file':
			// 	$this->runUpdateAttachmentFile();
			// 	break;
			case 'update_question_answer_tree':
				$this->runUpdateQuestionAnswerTree();
				break;
			case 'update_question_category':
				$this->runUpdateQuestionCategory();
				break;
			case 'update_question_tag':
				$this->runUpdateQuestionTag();
				break;
			default:
				# code...
				echo 'xxx';
				die;
				break;
		}
	}

	public function getActionQueue(){
		$actions = array(
			'count_total',	
			'update_user',	//update user data
			'update_category',	//update category data
			'update_category_parent',	//update category tree
			'update_tag',	//update tag data
			'update_question_answer',	//update question answer data
			// 'update_attachment_file',	//update attachment tree
			'update_question_answer_tree',	//update question answer tree
			'update_question_category',	//update question category relationship
			'update_question_tag',	//update question category relationship
			'done',	//done all
		);

		if($this->is_local){
			//if is local ignore update user
			$actions = array(
				'count_total',	
				'update_category',	//update category data
				'update_category_parent',	//update category tree
				'update_tag',	//update tag data
				'update_question_answer',	//update question answer data
				// 'update_attachment_file',	//update attachment tree
				'update_question_answer_tree',	//update question answer tree
				'update_question_category',	//update question category relationship
				'update_question_tag',	//update question category relationship
				'done',	//done all
			);
		}

		return $actions;
	}

	public function prepareData(){
		$this->action_queue = $this->getActionQueue();
		$this->remote_offset = $this->getOption('cdwqa_remote_offset', 0);
		$this->remote_total = $this->getOption('cdwqa_remote_total', 0);
		$this->current_action = $this->getOption('cdwqa_current_action', reset($this->action_queue));
		$this->processed = $this->getOption('cdwqa_processed', false);
	}

	private function nextAction(){
		$filename = 'log.txt';
		$content = $this->current_action .' '. date('Y-m-d H:i:s');
		file_put_contents($filename, $content . PHP_EOL, FILE_APPEND);

		$next_action = false;
		foreach($this->action_queue as $key => $value){
			$next_key = $key+1;
			if($value == $this->current_action && isset($this->action_queue[$next_key])){
				$next_action = $this->action_queue[$next_key];
			}
		}

		if(!$next_action){
			//all done
			return false;
		}

		if(is_array($this->processed)){
			$this->processed[] = $this->current_action;
			$this->updateOption('cdwqa_processed', $this->processed);
		}else{
			$this->processed = array($this->current_action);
			$this->updateOption('cdwqa_processed', $this->processed);
		}

		$this->updateOption('cdwqa_remote_offset', 0);
		$this->updateOption('cdwqa_remote_total', 0);
		$this->updateOption('cdwqa_current_action', $next_action);
		
		return true;
	}

	public function returnStatus(){
		$per = "0";
		if($this->remote_offset >= $this->remote_total){
			$per = "100";
		}else{
			$per = number_format((float)($this->remote_offset*100/$this->remote_total), 2, '.', '');
		}
		$result = array(
			'limit' => $this->limit,
			'remote_offset' => $this->remote_offset,
			'remote_total' => $this->remote_total,
			'per' => $per,
			'current_action' => $this->current_action,
		);
		if($this->current_action == 'count_total'){
			$result['count'] = $this->count;
			$result['countText'] = $this->countText();
		}
		return $result;
	}

	private function countText(){
		$text = array(
			'count_total' => 'Count Total',	
			'update_user' => 'Update User',	//update user data
			'update_category' => 'Update Category',	//update category data
			'update_category_parent' => 'Update Category Tree',	//update category tree
			'update_tag' => 'Update Tag',	//update tag data
			'update_question_answer' => 'Update Question',	//update question answer data
			// 'update_attachment_file' => 'Update Attachment',	//update attachment tree
			'update_question_answer_tree' => 'Update Question Tree',	//update question answer tree
			'update_question_category' => 'Add Question To Category',	//update question category relationship
			'update_question_tag' => 'Add Question To Tag',	//update question category relationship
			'done' => 'Migration Done',	//done all
		);
		return $text;
	}

	private function increaseOffset(){
		$this->remote_offset =  $this->remote_offset + $this->limit;
		$this->updateOption( 'cdwqa_remote_offset', $this->remote_offset );
	}

	public function runCountTotal(){
		$this->count = $this->countTotal();
		$this->updateOption('cdwqa_count_total', $this->count);
		$this->updateOption('cdwqa_count_text', $this->countText());
		
		$this->nextAction();
		return;
	}

	public function countTotal(){
		$result = array();
		if(!$this->is_local){
			$result[] = array(
				'action' => 'update_user',
				'count' =>  $this->countSabaiUsers()
			);
		}

		$result[] = array(
			'action' => 'update_category',
			'count' =>  $this->countSabaiCategories()
		);

		$result[] = array(
			'action' => 'update_category_parent',
			'count' =>  $this->countSabaiCategoryParent()
		);

		$result[] = array(
			'action' => 'update_tag',
			'count' =>  $this->countBBpressTag()
		);

		$result[] = array(
			'action' => 'update_question_answer',
			'count' =>  $this->countSabaiQuestionAnswer()
		);
		// $result[] = array(
		// 	'action' => 'update_attachment_file',
		// 	'count' =>  $this->countDWQAParentAttachment()
		// );
		$result[] = array(
			'action' => 'update_question_answer_tree',
			'count' =>  $this->countDWQAChilds()
		);
		$result[] = array(
			'action' => 'update_question_category',
			'count' =>  $this->countDWQAQuestions()
		);
		$result[] = array(
			'action' => 'update_question_tag',
			'count' =>  $this->countTagsQuestion()
		);

		return $result;
	}

	
	//Update Question Tag
	public function runUpdateQuestionTag(){
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countTagsQuestion();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}

		$posts = $this->getTagsQuestion();

		if($posts){
			foreach($posts as $post){
				$dwqa_post_id = $this->getDWQAPostIdByBBpressPostID($post['sabai_post_id']);
				$dwqa_tag_list = $this->getDWQATagsByBBpressTags($post['sabai_tag_list']);
				
				$tags = array();
				if($dwqa_tag_list){
					foreach($dwqa_tag_list as $item){
						$tags[] = (int)$item['dwqa_tag_id'];
					}
				}

				if($dwqa_post_id && !empty($tags)){
					$this->setPostTerms($dwqa_post_id, $tags);
				}
			}
		}

		// //done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	private function getDWQAPostIdByBBpressPostID($sabai_post_id){
		if(!$sabai_post_id){
			return 0;
		}

		$current_prefix = $this->current_db->db_prefix;
		$table_posts = $current_prefix . 'cdwqa_sabai_posts';
		
		$sql = "
			SELECT dwqa_post_id FROM {$table_posts}
			WHERE sabai_post_id = {$sabai_post_id}
		";
		$this->current_db->query($sql);
		$result = $this->current_db->getCell();
		return $result;
	}

	private function getDWQATagsByBBpressTags($sabai_tags = false){
		if(!$sabai_tags){
			return array();
		}

		$current_prefix = $this->current_db->db_prefix;
		$table_tags = $current_prefix . 'cdwqa_sabai_tags';

		$tags_in = "";

		if(is_string($sabai_tags)){
			$tags_in = implode("','", explode(",", $sabai_tags));
		}
		if(is_array($sabai_tags)){
			$tags_in = implode("','", $sabai_tags);
		}

		$sql = "
			SELECT dwqa_tag_id FROM {$table_tags}
			WHERE sabai_tag_id IN ('{$tags_in}')
			";

		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result;
	}

	public function countTagsQuestion(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		$remote_tab_term_taxonomy = $remote_prefix . $remote_blog_id .'term_taxonomy';
		$remote_tab_term_relationships = $remote_prefix . $remote_blog_id .'term_relationships';
		
		$sql = "
			SELECT COUNT(DISTINCT tr.object_id) AS count FROM {$remote_tab_term_taxonomy} tt
			INNER JOIN {$remote_tab_term_relationships} tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
			WHERE tt.taxonomy = 'topic-tag'
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getCell();
		return $result;
	}

	public function getTagsQuestion(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		$remote_tab_term_taxonomy = $remote_prefix . $remote_blog_id .'term_taxonomy';
		$remote_tab_term_relationships = $remote_prefix . $remote_blog_id .'term_relationships';
		
		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT tr.object_id AS sabai_post_id, GROUP_CONCAT(DISTINCT tt.term_id SEPARATOR ',') AS sabai_tag_list FROM {$remote_tab_term_taxonomy} tt
			INNER JOIN {$remote_tab_term_relationships} tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
			WHERE tt.taxonomy = 'topic-tag'
			GROUP BY tr.object_id
			LIMIT {$limit}
			OFFSET {$offset}
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		return $result;
	}


	//Update Question Category
	public function runUpdateQuestionCategory(){
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countDWQAQuestions();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}

		$questions = $this->getDWQAQuestions();
		
		if($questions){
			foreach($questions as $question){
				$category = $this->getDWQAQuestionCategory($question['sabai_post_parent_id']);

				if($category){
					$this->setPostTerms($question['dwqa_post_id'], array($category['term_taxonomy_id']));
				}
				
			}
		}

		// //done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	public function setPostTerms($dwqa_post_id, $term_taxonomy_ids){
		if(!is_array($term_taxonomy_ids)){
			return false;
		}

		$add_array = array();
		foreach ($term_taxonomy_ids as $k => $term_taxonomy_id) {
			$add_array[] = "({$dwqa_post_id}, {$term_taxonomy_id})";
		}
		if(!empty($add_array)){
			//add dwqa user meta

			$current_prefix = $this->current_db->db_prefix;
			//prepare table temp
			$current_tab_term_relationships = $current_prefix .'term_relationships';
			$values = implode(', ', $add_array);
			$sql = "
				INSERT INTO {$current_tab_term_relationships} (object_id, term_taxonomy_id)
				VALUES {$values}
			";
			$query = $this->current_db->query($sql);
		}
	}

	public function getDWQAQuestionCategory($sabai_post_parent_id){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_categories = $current_prefix . 'cdwqa_sabai_categories';

		$sql = "
			SELECT dwqa_category_id, term_taxonomy_id FROM {$table_marked_categories}
			WHERE sabai_category_id = {$sabai_post_parent_id}
		";
		
		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result && isset($result[0])?$result[0]:false;
	}

	public function countDWQAQuestions(){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';


		$sql = "
			SELECT COUNT(1) AS count  FROM {$table_marked_posts}
			WHERE dwqa_post_type = 'dwqa-question' AND sabai_post_parent_id > 0
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getCell();
		return $result;
	}

	public function getDWQAQuestions(){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT dwqa_post_id, sabai_post_parent_id  FROM {$table_marked_posts}
			WHERE dwqa_post_type = 'dwqa-question' AND sabai_post_parent_id > 0
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result;
	}


	//Update Question Answer Attachment Tree
	public function runUpdateQuestionAnswerTree(){
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			
			$this->remote_total = $this->countDWQAChilds();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}

		$childs = $this->getDWQAChilds();

		if($childs){
			foreach($childs as $child){
				$dwqa_post_parent_id = $this->getDWQAPostParent($child['sabai_post_parent_id']);
				if($dwqa_post_parent_id){
					$this->updateDWQAPostParent($child['dwqa_post_id'], $dwqa_post_parent_id);
				}
				
			}
		}

		// //done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	public function updateDWQAPostParent($dwqa_post_id, $dwqa_post_parent_id){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_posts = $current_prefix .'posts';
		$sql = "
			UPDATE {$current_tab_posts} SET post_parent = {$dwqa_post_parent_id} WHERE ID = {$dwqa_post_id}
		";
		$this->current_db->query($sql);
	}

	public function getDWQAPostParent($sabai_post_parent_id){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';


		$sql = "
			SELECT dwqa_post_id FROM {$table_marked_posts}
			WHERE sabai_post_id = {$sabai_post_parent_id}
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getCell();
		return $result;
	}

	public function countDWQAChilds(){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';


		$sql = "
			SELECT COUNT(1) AS count  FROM {$table_marked_posts}
			WHERE dwqa_post_type <> 'dwqa-question'
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getCell();
		return $result;
	}

	public function getDWQAChilds(){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT dwqa_post_id, sabai_post_parent_id  FROM {$table_marked_posts}
			WHERE dwqa_post_type <> 'dwqa-question'
			LIMIT {$limit}
			OFFSET {$offset}
		";
		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result;
	}


	
	//Update Attachment File
	public function runUpdateAttachmentFile(){
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			
			$this->remote_total = $this->countDWQAParentAttachment();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}
		if(!$this->remote_db->upload_dir){
			//ignore
			$this->remote_offset = $this->remote_total;
			$this->nextAction();
			return;
		}

		$result = $this->getDWQAParentAttachment();

		if($result){
			$remote_prefix = $this->remote_db->db_prefix;
			$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

			$remote_tab_posts = $remote_prefix . $remote_blog_id .'posts';

			foreach($result as $item){
				$sql = "
					SELECT * FROM {$remote_tab_posts}
					WHERE post_parent = {$item['sabai_post_id']} AND post_type = 'attachment'
				";
				// echo $sql;
				$this->remote_db->query($sql);
				$attachments = $this->remote_db->getResults();
				
				if($attachments){
					foreach($attachments as $attachment){
						$sabai_post_id = $attachment['ID']; 
						$dwqa_post_id = $this->insertDWQAPost($attachment);

						$post_type = 'attachment';
						
						$this->markedPost($sabai_post_id, $dwqa_post_id, $post_type, $attachment['post_parent']);
					}
				}
			}
		}

		// //done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	public function countDWQAParentAttachment(){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';


		$sql = "
			SELECT COUNT(1) AS count  FROM {$table_marked_posts}
			WHERE dwqa_post_type = 'dwqa-question' OR dwqa_post_type = 'dwqa-answer'
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getCell();
		return $result;
	}

	public function getDWQAParentAttachment(){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		$remote_tab_posts = $remote_prefix . $remote_blog_id .'posts';

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT dwqa_post_id, sabai_post_id FROM {$table_marked_posts}
			WHERE dwqa_post_type = 'dwqa-question' OR dwqa_post_type = 'dwqa-answer'
			LIMIT {$limit}
			OFFSET {$offset}
		";
		$this->current_db->query($sql);
		$result = $this->current_db->getResults();

		return $result;
	}

	//Update Question Answer
	public function runUpdateQuestionAnswer(){
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countSabaiQuestionAnswer();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}
		//
		$questions_answers = $this->getSabaiQuestionAnswer();
		if($questions_answers){
			foreach($questions_answers as $item){
				$sabai_post_id = $item['post_id']; 
				$dwqa_post_id = $this->insertDWQAPost($item);

				$post_type = $item['post_entity_bundle_type'];
				if($item['post_entity_bundle_type'] == 'questions'){
					$post_type = 'dwqa-question';
				}
				if($item['post_entity_bundle_type'] == 'questions_answers'){
					$post_type = 'dwqa-answer';
				}

				$this->markedPost($sabai_post_id, $dwqa_post_id, $post_type, is_numeric($item['post_parent'])?$item['post_parent']:0);
			}
		}

		// //done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	public function markedPost($sabai_post_id, $dwqa_post_id, $dwqa_post_type, $sabai_post_parent_id = 0){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';

		$sql = "
			SELECT id FROM {$table_marked_posts}
			WHERE sabai_post_id = {$sabai_post_id}
		";
		$this->current_db->query($sql);
		$check = $this->current_db->getCell();
		
		if(!$check || empty($check)){
			$sql = "
				INSERT INTO {$table_marked_posts} (sabai_post_id, dwqa_post_id, dwqa_post_type, sabai_post_parent_id)
				VALUES({$sabai_post_id}, {$dwqa_post_id}, '{$dwqa_post_type}', {$sabai_post_parent_id})
			";
			$this->current_db->query($sql);
		}else{
			//only update if dwqa_post <> new dwqa_post
			$sql = "
				UPDATE {$table_marked_posts} SET dwqa_post_id = {$dwqa_post_id}, dwqa_post_type = '{$dwqa_post_type}', sabai_post_parent_id = {$sabai_post_parent_id} WHERE sabai_post_id = {$sabai_post_id} AND dwqa_post_id <> {$dwqa_post_id}
			";
			$this->current_db->query($sql);
		}
	}

	public function getDWQAPostMetaKeys(){
		$current_prefix = $this->current_db->db_prefix;

		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//bbpress key => dwqa key
		return array(
			'_bbp_attachment' => 'dwqa_attachment',
		);
	}

	public function getBBpressPostMeta($sabai_post_id){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table
		$remote_tab_postmeta = $remote_prefix . $remote_blog_id .'postmeta';

		$sql = "
			SELECT meta_key, meta_value FROM {$remote_tab_postmeta}
			WHERE post_id = {$sabai_post_id}
		";

		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		$meta = array();
		foreach($result as $item){
			$meta[$item['meta_key']] = $item['meta_value'];
		}
		return $meta;
	}

	public function insertDWQAPost($post = false){
		if(!$post){
			return false;
		}
		
		$post_type = $post['post_entity_bundle_type'];
		if($post['post_entity_bundle_type'] == 'questions'){
			$post_type = 'dwqa-question';
		}
		if($post['post_entity_bundle_type'] == 'questions_answers'){
			$post_type = 'dwqa-answer';
		}

		
		$post_title = $post['post_title'];
		$post_name = $post['post_slug'];
		if(!$post_name){
			$post_name = sanitize_title_with_dashes($post_title);
		}
		$post_content = $post['post_content'];
		$post_date = date("Y-m-d H:i:s", $post['post_published']);
		$post_date_gmt = $post_date;
		$post_modified = $post_date;
		$post_modified_gmt = $post_date;
		$post_author = $post['post_user_id'];
		$post_status = $post['post_status'];
		if($post['post_status'] == 'published'){
			$post_status = 'publish';
		}
		$post_mime_type = '';

		//check existed
		
		$post_id = $this->checkDWQAPostExist($post);
		if($post_id){
			return $post_id;
		} 

		if(!$this->is_local){
			//user is one
			$post_author = $this->getDWQAPostAuthor($post_author);
		}

		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_posts = $current_prefix .'posts';

		//check post_name unique
		$post_name_check = true;
		$i = 0;
		$temp_post_name = $post_name;
		do{
			if($i){
				//add number after post_name if $i>0
				$temp_post_name = $post_name . '-' . $i;
			}
			$check_sql = "
				SELECT post_name FROM {$current_tab_posts}
				WHERE post_name = '{$temp_post_name}'
				LIMIT 1
			";

			$this->current_db->query($check_sql);
			$post_name_check = $this->current_db->getCell();
			$i++;
		}while($post_name_check && $i<200);

		$post_name = $temp_post_name;

		$sql = "
			INSERT INTO {$current_tab_posts} (post_author, post_date, post_date_gmt, post_content, post_title, post_status, post_name, post_modified, post_modified_gmt, post_parent, post_type, post_mime_type)
			VALUES({$post_author}, '{$post_date}', '{$post_date_gmt}', '{$post_content}', '{$post_title}', '{$post_status}', '{$post_name}', '{$post_modified}', '{$post_modified_gmt}', 0, '{$post_type}', '{$post_mime_type}')
		";
		$this->current_db->query($sql);
		$post_id = $this->current_db->getLastId();

		//update guid
		/*$home_url = home_url();
		$guid = $home_url. '?post_type=' . $post_type . '&#038;p='.$post_id;
		$sql_guid = "
			UPDATE {$current_tab_posts} SET guid = '{$guid}' WHERE ID = {$post_id}
		";
		$this->current_db->query($sql_guid);*/

		//get post meta
		// $sabai_postmeta = $this->getBBpressPostMeta($post['ID']);
		// $meta_array = $this->getDWQAPostMetaKeys();


		/*if($post_type == 'attachment'){
			//if is attachment => copy file
			//copy file
			if(isset($sabai_postmeta['_wp_attached_file'])){
				$remote_upload = rtrim($this->remote_db->upload_dir, '/');
				$current_upload = rtrim($this->current_db->upload_dir, '/');


				$remote_upload_file = $remote_upload. '/' .$sabai_postmeta['_wp_attached_file'];
				if(file_exists($remote_upload_file)){
					$current_upload_file = $current_upload. '/' .$sabai_postmeta['_wp_attached_file'];

					$current_file = $sabai_postmeta['_wp_attached_file'];
					$actual_name = pathinfo($current_file,PATHINFO_FILENAME);
					$dir_name = pathinfo($current_file,PATHINFO_DIRNAME);
					$original_name = $actual_name;
					$extension = pathinfo($current_file, PATHINFO_EXTENSION);

					$i = 0;
					do{
						if($i){
							//add number after post_name if $i>0
							$current_file = $dir_name . '/' . $actual_name . '-' . $i . '.' .$extension;
						}
						$current_upload_file = $current_upload. '/' .$current_file;
						$i++;
					}while(file_exists($current_upload_file));

					//change meta
					$sabai_postmeta['_wp_attached_file'] = $current_file;

					//copy file
					//ignore copy file
					//copy($remote_upload_file, $current_upload_file);
				}

			}
		}*/

		/*foreach ($sabai_postmeta as $k => $v) {
			if(isset($meta_array[$k])){
				$add_array[] = "({$post_id}, '{$meta_array[$k]}', '{$v}')";
			}else{
				$add_array[] = "({$post_id}, '{$k}', '{$v}')";
			}
			
		}*/

		/*if(!empty($add_array)){
			//add dwqa user meta

			//prepare table temp
			$current_tab_postmeta = $current_prefix .'postmeta';
			$values = implode(', ', $add_array);
			$sql = "
				INSERT INTO {$current_tab_postmeta} (post_id, meta_key, meta_value)
				VALUES {$values}
			";
			$query = $this->current_db->query($sql);
		}*/

		return $post_id;
	}

	public function getDWQAPostAuthor($sabai_author = false){
		if(!$sabai_author){
			return 0;
		}

		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$table_marked_users = $current_prefix . 'cdwqa_sabai_users';

		$sql = "
			SELECT dwqa_user_id FROM {$table_marked_users} 
			WHERE sabai_user_id = {$sabai_author}
		";
		$this->current_db->query($sql);
		$user_id = $this->current_db->getCell();

		return $user_id;
	}


	public function checkDWQAPostExist($post) {
		if(!$post){
			return false;
		}
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_posts = $current_prefix .'posts';
		$table_marked_posts = $current_prefix . 'cdwqa_sabai_posts';

		$post_id = $post['post_id'];

		$sql = "
			SELECT ID FROM {$current_tab_posts}
			WHERE 
				ID IN ( SELECT dwqa_post_id FROM {$table_marked_posts} WHERE sabai_post_id = {$post_id})
			LIMIT 1
		";

		$this->current_db->query($sql);
		$post_id = $this->current_db->getCell();
		return $post_id;
	}

	public function countSabaiQuestionAnswer(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table
		$remote_tab_posts = $remote_prefix . $remote_blog_id .'sabai_content_post';

		$sql = "
			SELECT COUNT(1) AS count FROM {$remote_tab_posts} 
			WHERE (post_entity_bundle_type = 'questions' OR post_entity_bundle_type = 'questions_answers') AND post_status != 'draft'
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getCell();
		return $result;
	}


	public function getSabaiQuestionAnswer(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table
		$remote_tab_posts = $remote_prefix . $remote_blog_id .'sabai_content_post';
		$remote_tab_entity_field_content_body = $remote_prefix . $remote_blog_id .'sabai_entity_field_content_body';
		$remote_tab_entity_field_content_parent = $remote_prefix . $remote_blog_id .'sabai_entity_field_content_parent';

		$offset = $this->remote_offset;
		$limit = $this->limit;
		//add attachment post type
		$sql = "
			SELECT p.*, cb.value AS post_content, cp.value AS post_parent FROM {$remote_tab_posts} p
			LEFT JOIN {$remote_tab_entity_field_content_body} cb ON p.post_id = cb.entity_id
			LEFT JOIN {$remote_tab_entity_field_content_parent} cp ON p.post_id = cp.entity_id
			WHERE (p.post_entity_bundle_type = 'questions' OR p.post_entity_bundle_type = 'questions_answers') AND p.post_status != 'draft'
			ORDER BY p.post_id ASC
			LIMIT {$limit}
			OFFSET {$offset}
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		return $result;
	}



	//Update tag
	public function runUpdateTag(){
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countBBpressTag();;
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}

		$tags = $this->getBBpressTag();
		
		if($tags){
			foreach($tags as $tag){
				$sabai_tag_id = $tag['term_id']; 
				$dwqa_tag = $this->insertDWQATag($tag);

				$this->markedTag($sabai_tag_id, $dwqa_tag['term_id'], $dwqa_tag['term_taxonomy_id']);
			}
		}
		
		//done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	public function markedTag($sabai_tag_id, $dwqa_tag_id, $term_taxonomy_id){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_tags = $current_prefix . 'cdwqa_sabai_tags';

		$sql = "
			SELECT id FROM {$table_marked_tags}
			WHERE sabai_tag_id = {$sabai_tag_id}
			LIMIT 1
		";

		$this->current_db->query($sql);
		$check = $this->current_db->getCell();

		if(!$check || empty($check)){

			$sql = "
				INSERT INTO {$table_marked_tags} (sabai_tag_id, dwqa_tag_id, term_taxonomy_id)
				VALUES( {$sabai_tag_id}, {$dwqa_tag_id}, {$term_taxonomy_id})
			";

			$this->current_db->query($sql);
		}else{
			$sql = "
				UPDATE {$table_marked_tags} SET dwqa_tag_id = {$dwqa_tag_id}, term_taxonomy_id = '{$term_taxonomy_id}'
				WHERE sabai_tag_id = {$sabai_tag_id} AND dwqa_tag_id <> {$dwqa_tag_id}
			";
			$this->current_db->query($sql);
		}
	}

	public function insertDWQATag($tag = false){
		if(!$tag){
			return false;
		}

		//check existed
		$tag_return = $this->checkDWQATagExist($tag);
		if($tag_return){
			return $tag_return;
		} 

		$name = $tag['term_title'];
		$slug = $tag['term_name'];
		$description = $tag['term_content'];

		$tag_return = $this->insertDWQATerm('dwqa-question_tag', $name, $slug, $description, 0);

		return $tag_return;
	}

	public function checkDWQATagExist($tag){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_terms = $current_prefix .'terms';
		$current_tab_term_taxonomy = $current_prefix .'term_taxonomy';
		$table_marked_tags = $current_prefix . 'cdwqa_sabai_tags';

		$slug = $tag['term_name'];
		$sabai_tag_id = $tag['term_id'];

		$sql = "
			SELECT tt.term_id, tt.term_taxonomy_id FROM {$current_tab_terms} AS t
			INNER JOIN {$current_tab_term_taxonomy} as tt ON tt.term_id = t.term_id
			WHERE 
				tt.term_id IN ( SELECT dwqa_tag_id FROM {$table_marked_tags} WHERE sabai_tag_id = {$sabai_tag_id})
				OR (t.slug = '{$slug}' AND tt.taxonomy = 'dwqa-question_tag')
			LIMIT 1
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result && isset($result[0])?$result[0]:false;
	}

	public function countBBpressTag(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table
		$remote_tab_taxonomy_term = $remote_prefix . $remote_blog_id .'sabai_taxonomy_term';

		$sql = "
			SELECT COUNT(1) as count FROM {$remote_tab_taxonomy_term}
			WHERE term_entity_bundle_type = 'questions_tags'
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		return $result && isset($result[0])?$result[0]['count']:0;
	}

	public function getBBpressTag(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table
		$remote_tab_taxonomy_term = $remote_prefix . $remote_blog_id .'sabai_taxonomy_term';
		$remote_tab_entity_field_taxonomy_body = $remote_prefix . $remote_blog_id .'sabai_entity_field_taxonomy_body';

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT tt.*, tb.value as term_content FROM {$remote_tab_taxonomy_term} tt
			INNER JOIN {$remote_tab_entity_field_taxonomy_body} tb ON tt.term_id = tb.entity_id
			WHERE tt.term_entity_bundle_type = 'questions_tags'
			LIMIT $limit
			OFFSET $offset
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		
		return $result;
	}



	//update category parent
	public function runUpdateCategoryParent(){
		//get total row
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countSabaiCategoryParent();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}
		if($this->remote_total < $this->remote_offset){
			//done
			//special next action, update option dwqa-question_category_children to clear cache
			$this->updateOption('dwqa-question_category_children', 0);

			$this->nextAction();
			return;
		}

		$categories = $this->getMarkedCategories();

		if($categories){
			foreach($categories as $category){
				$this->updateDWQACategoryParent($category['dwqa_category_id'], $category['dwqa_category_parent_id']);
			}
		}

		//done 1 round => increase offset
		$this->increaseOffset();
		return;
	}

	public function updateDWQACategoryParent($dwqa_category_id, $dwqa_category_parent_id){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_term_taxonomy = $current_prefix .'term_taxonomy';
		$sql = "
			UPDATE {$current_tab_term_taxonomy} SET parent = {$dwqa_category_parent_id} WHERE term_id = {$dwqa_category_id} AND taxonomy = 'dwqa-question_category'
		";
		$this->current_db->query($sql);
	}

	public function getMarkedCategories(){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$table_categories = $current_prefix . 'cdwqa_sabai_categories';

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT c1.dwqa_category_id, c2.dwqa_category_id AS dwqa_category_parent_id FROM {$table_categories} c1
			INNER JOIN {$table_categories} c2 ON c1.sabai_category_parent_id = c2.sabai_category_id
			WHERE 1=1
			LIMIT {$limit}
			OFFSET {$offset}
		";
		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result;
	}

	public function countSabaiCategoryParent(){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$table_categories = $current_prefix . 'cdwqa_sabai_categories';
		
		$sql = "
			SELECT COUNT(1) AS count FROM {$table_categories} WHERE sabai_category_parent_id != 0
		";
		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result && isset($result[0])?$result[0]['count']:0;
	}



	//update category
	public function runUpdateCategory(){
		//get total row
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countSabaiCategories();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}

		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}
		
		//Sabai category is DWQA category
		$categories = $this->getSabaiCategories();

		if($categories){
			foreach($categories as $category){

				$sabai_category_id = $category['term_id']; 
				$dwqa_category = $this->insertDWQACategory($category);

				$this->markedCategory($sabai_category_id, $dwqa_category['term_id'], $dwqa_category['term_taxonomy_id'], $category['term_parent']);
			}
		}
		//done 1 round => increase offset
		$this->increaseOffset();
		
		return;
	}

	public function checkDWQACategoryExist($category){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_terms = $current_prefix .'terms';
		$current_tab_term_taxonomy = $current_prefix .'term_taxonomy';
		$table_categories = $current_prefix . 'cdwqa_sabai_categories';

		$slug = strip_tags($category['term_name']);
		$sabai_category_id = $category['term_id'];

		$sql = "
			SELECT tt.term_id, tt.term_taxonomy_id FROM {$current_tab_terms} AS t
			INNER JOIN {$current_tab_term_taxonomy} as tt ON tt.term_id = t.term_id
			WHERE 
				tt.term_id IN ( SELECT dwqa_category_id FROM {$table_categories} WHERE sabai_category_id = {$sabai_category_id})
				OR (t.slug = '{$slug}' AND tt.taxonomy = 'dwqa-question_category')
			LIMIT 1
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getResults();
		return $result && isset($result[0])?$result[0]:false;
	}

	public function insertDWQACategory($category = false){
		if(!$category){
			return false;
		}

		//check existed
		$category_check = $this->checkDWQACategoryExist($category);
		if($category_check){
			//category is array include term_id , term_taxonomy_id
			return $category_check;
		} 

		//user not existed => insert user
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_terms = $current_prefix .'terms';
		$current_tab_term_taxonomy = $current_prefix .'term_taxonomy';

		$name = strip_tags($category['term_title']);
		$slug = strip_tags($category['term_name']);
		$description = $category['term_content'];

		$category = $this->insertDWQATerm('dwqa-question_category', $name, $slug, $description, 0);

		return $category;
	}

	public function markedCategory($sabai_category_id, $dwqa_category_id, $term_taxonomy_id, $sabai_category_parent_id = 0){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_categories = $current_prefix . 'cdwqa_sabai_categories';

		$sql = "
			SELECT id FROM {$table_marked_categories}
			WHERE sabai_category_id = {$sabai_category_id}
			LIMIT 1
		";

		$this->current_db->query($sql);
		$check = $this->current_db->getCell();

		if(!$check || empty($check)){

			$sql = "
				INSERT INTO {$table_marked_categories} (sabai_category_id, dwqa_category_id, term_taxonomy_id, sabai_category_parent_id)
				VALUES( {$sabai_category_id}, {$dwqa_category_id}, {$term_taxonomy_id}, {$sabai_category_parent_id} )
			";

			$this->current_db->query($sql);
		}else{
			$sql = "
				UPDATE {$table_marked_categories} SET dwqa_category_id = {$dwqa_category_id}, term_taxonomy_id = {$term_taxonomy_id}, sabai_category_parent_id = {$sabai_category_parent_id} WHERE sabai_category_id = {$sabai_category_id} AND dwqa_category_id <> {$dwqa_category_id}
			";
			$this->current_db->query($sql);
		}
	}



	public function insertDWQATerm($taxonomy, $name, $slug, $description, $parent){
		//user not existed => insert user
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_terms = $current_prefix .'terms';
		$current_tab_term_taxonomy = $current_prefix .'term_taxonomy';

		$sql = "
			INSERT INTO {$current_tab_terms} (name, slug)
			VALUES('{$name}', '{$slug}')
		";
		$this->current_db->query($sql);
		$term_id = $this->current_db->getLastId();

		$sql = "
			INSERT INTO {$current_tab_term_taxonomy} (term_id, taxonomy, description, parent)
			VALUES({$term_id}, '{$taxonomy}', '{$description}', $parent)
		";
		$this->current_db->query($sql);
		$term_taxonomy_id = $this->current_db->getLastId();

		return array(
			'term_id' => $term_id,
			'term_taxonomy_id' => $term_taxonomy_id
		);
	}


	public function countSabaiCategories(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		// //prepare table
		$remote_tab_taxonomy_term = $remote_prefix . $remote_blog_id .'sabai_taxonomy_term';

		$sql = "
			SELECT COUNT(1) as count FROM {$remote_tab_taxonomy_term}
			WHERE term_entity_bundle_type = 'questions_categories'
		";
		$this->remote_db->query($sql);

		$result = $this->remote_db->getCell(); 
		return $result?$result:0;
	}

	public function getSabaiCategories(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table
		$remote_tab_taxonomy_term = $remote_prefix . $remote_blog_id .'sabai_taxonomy_term';
		$remote_tab_entity_field_taxonomy_body = $remote_prefix . $remote_blog_id .'sabai_entity_field_taxonomy_body';

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT tt.*, tb.value as term_content FROM {$remote_tab_taxonomy_term} tt
			LEFT JOIN {$remote_tab_entity_field_taxonomy_body} tb ON tt.term_id = tb.entity_id
			WHERE tt.term_entity_bundle_type = 'questions_categories'
			LIMIT $limit
			OFFSET $offset
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		
		return $result;
	}







	//Update User
	public function runUpdateUser(){
		//get total row
		if(!$this->remote_total || $this->remote_total < $this->remote_offset){
			//init
			$this->remote_total = $this->countSabaiUsers();
			$this->updateOption( 'cdwqa_remote_total', $this->remote_total );
		}

		if($this->remote_total < $this->remote_offset){
			//done
			$this->nextAction();
			return;
		}
		
		//get users
		$users = $this->getSabaiUsers();

		if($users){
			foreach($users as $user){
				//check user via email
				$sabai_user_id = $user['ID']; 
				$dwqa_user_id = $this->insertDWQAUser($user);
				$this->markedUser($sabai_user_id, $dwqa_user_id);
			}
		}

		//done 1 round => increase offset
		$this->increaseOffset();
		
		return;
	}

	public function checkDWQAUserExist($user){
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_users = $current_prefix .'users';

		//
		$table_marked_users = $current_prefix . 'cdwqa_sabai_users';
		//if user marked => new user added => no check with this

		$user_id = $user['ID'];
		$user_email = $user['user_email'];

		$sql = "
			SELECT ID FROM {$current_tab_users}
			WHERE 
				ID IN ( SELECT dwqa_user_id FROM {$table_marked_users} WHERE sabai_user_id = {$user_id})
				OR user_email = '{$user_email}'
			LIMIT 1
		";

		$this->current_db->query($sql);
		$result = $this->current_db->getCell();
		return $result;
	}

	public function getDWQAUserMetaKeys(){
		$current_prefix = $this->current_db->db_prefix;

		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//bbpress key => dwqa key
		return array(
			'nickname' => 'nickname',
			'first_name' => 'first_name',
			'last_name' => 'last_name',
			'description' => 'description',
			'rich_editing' => 'rich_editing',
			'comment_shortcuts' => 'comment_shortcuts',
			'admin_color' => 'admin_color',
			'use_ssl' => 'use_ssl',
			'show_admin_bar_front' => 'show_admin_bar_front',
			$remote_prefix . $remote_blog_id . 'capabilities' => $current_prefix . 'capabilities',
			$remote_prefix . $remote_blog_id . 'user_level' => $current_prefix . 'user_level',
		);
	}

	public function insertDWQAUser($user = false){
		if(!$user){
			return false;
		}

		//check existed via email & login
		$user_id = $this->checkDWQAUserExist($user);
		if($user_id) return $user_id;

		//user not existed => insert user
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$current_tab_users = $current_prefix .'users';

		$sql = "
			INSERT INTO {$current_tab_users} (user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name)
			VALUES('{$user['user_login']}', '{$user['user_pass']}', '{$user['user_nicename']}', '{$user['user_email']}', '{$user['user_url']}', '{$user['user_registered']}', '{$user['user_activation_key']}', {$user['user_status']}, '{$user['display_name']}' )
		";

		$query = $this->current_db->query($sql);
		$user_id = $this->current_db->getLastId();

		//get user meta
		$sabai_usermeta = $this->getSabaiUserMeta($user['ID']);
		$meta_array = $this->getDWQAUserMetaKeys();

		foreach ($sabai_usermeta as $k => $v) {
			if(isset($meta_array[$k])){
				$add_array[] = "({$user_id}, '{$meta_array[$k]}', '{$v}')";
			}else{
				$add_array[] = "({$user_id}, '{$k}', '{$v}')";
			}
			
		}


		if(!empty($add_array)){
			//add dwqa user meta

			//prepare table temp
			$current_tab_usermeta = $current_prefix .'usermeta';
			$values = implode(', ', $add_array);
			$sql = "
				INSERT INTO {$current_tab_usermeta} (user_id, meta_key, meta_value)
				VALUES {$values}
			";
			$query = $this->current_db->query($sql);
		}
		return $user_id;
	}

	public function markedUser($sabai_user_id, $dwqa_user_id){
		$current_prefix = $this->current_db->db_prefix;
		$table_marked_users = $current_prefix . 'cdwqa_sabai_users';

		$sql = "
			SELECT id FROM {$table_marked_users}
			WHERE sabai_user_id = {$sabai_user_id}
			LIMIT 1
		";

		$this->current_db->query($sql);
		$check = $this->current_db->getCell();

		if(!$check || empty($check)){

			$sql = "
				INSERT INTO {$table_marked_users} (sabai_user_id, dwqa_user_id)
				VALUES( $sabai_user_id, $dwqa_user_id )
			";

			$this->current_db->query($sql);
		}else{
			$sql = "
				UPDATE {$table_marked_users} SET dwqa_user_id = {$dwqa_user_id}
				WHERE sabai_user_id = {$sabai_user_id} AND dwqa_user_id <> {$dwqa_user_id}
			";
			$this->current_db->query($sql);
		}
	}

	public function countSabaiUsers(){
		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table temp
		$remote_tab_users = $remote_prefix .'users';

		$sql = "
			SELECT COUNT(1) AS count FROM {$remote_tab_users}
		";
		$this->remote_db->query($sql);
		$result = $this->remote_db->getCell();
		return $result;
	}


	public function getSabaiUserMeta($sabai_user_id){
		$remote_prefix = $this->remote_db->db_prefix;

		//prepare table temp
		$remote_tab_usermeta = $remote_prefix .'usermeta';
		$sql = "
			SELECT meta_key, meta_value FROM {$remote_tab_usermeta}
			WHERE user_id = {$sabai_user_id}
		";

		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		$meta = array();
		foreach($result as $item){
			$meta[$item['meta_key']] = $item['meta_value'];
		}
		return $meta;
	}

	public function getSabaiUsers(){

		$remote_prefix = $this->remote_db->db_prefix;
		$remote_blog_id = $this->remote_db->db_blog_id? $this->remote_db->db_blog_id . '_' : '';

		//prepare table temp
		$remote_tab_users = $remote_prefix .'users';
		

		$offset = $this->remote_offset;
		$limit = $this->limit;

		$sql = "
			SELECT DISTINCT * FROM {$remote_tab_users}
			LIMIT {$limit}
			OFFSET {$offset}
		";

		$this->remote_db->query($sql);
		$result = $this->remote_db->getResults();
		return $result;
	}


	public function prepareTable(){
		// global $wpdb;
		// $this->current_db
		$current_prefix = $this->current_db->db_prefix;

		//prepare table temp
		$table_users = $current_prefix . 'cdwqa_sabai_users';
		$table_categories = $current_prefix . 'cdwqa_sabai_categories';
		$table_tags = $current_prefix . 'cdwqa_sabai_tags';
		$table_posts = $current_prefix . 'cdwqa_sabai_posts';

		$charset_collate = $this->current_db->charset_collate?" ".$this->current_db->charset_collate:"";

		//table users
		$sql = "
			CREATE TABLE IF NOT EXISTS `$table_users`(
				id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				sabai_user_id BIGINT(20) NOT NULL,
				dwqa_user_id BIGINT(20) NOT NULL
			)$charset_collate;
		";
		$query = $this->current_db->query($sql);

		//table categories
		$sql = "
			CREATE TABLE IF NOT EXISTS `$table_categories` (
				id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				sabai_category_id BIGINT(20) NOT NULL,
				dwqa_category_id BIGINT(20) NOT NULL,
				term_taxonomy_id BIGINT(20) NOT NULL,
				sabai_category_parent_id BIGINT(20) NOT NULL
			)$charset_collate;
		";
		$query = $this->current_db->query($sql);

		//table tags
		$sql = "
			CREATE TABLE IF NOT EXISTS `$table_tags` (
				id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				sabai_tag_id BIGINT(20) NOT NULL,
				dwqa_tag_id BIGINT(20) NOT NULL,
				term_taxonomy_id BIGINT(20) NOT NULL
			)$charset_collate;
		";
		$query = $this->current_db->query($sql);


		//table posts
		$sql = "
			CREATE TABLE IF NOT EXISTS `$table_posts` (
				id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				sabai_post_id BIGINT(20) NOT NULL,
				dwqa_post_id BIGINT(20) NOT NULL,
				dwqa_post_type VARCHAR(255) NOT NULL,
				sabai_post_parent_id BIGINT(20) NOT NULL
			)$charset_collate;
		";
		$query = $this->current_db->query($sql);
	}
}