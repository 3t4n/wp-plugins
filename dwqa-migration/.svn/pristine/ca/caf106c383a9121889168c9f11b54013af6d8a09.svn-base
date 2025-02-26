<?php  

namespace CDWQA\Includes;

require_once CDWQA_DIR.'/Libraries/cdwqa-db.php';
require_once CDWQA_DIR.'/Migrations/BBpress/BBpress.php';
require_once CDWQA_DIR.'/Migrations/SabaiDiscuss/SabaiDiscuss.php';

use CDWQA\Migrations\BBpress;
use CDWQA\Migrations\SabaiDiscuss;


class Main {

	private static $instance = null;

	public function __construct(){
		// add_action('init', array($this, 'init'));
		add_action( 'admin_menu', array($this, 'menu_init' ));

		add_action( 'wp_ajax_cdwqa_save_db_info', array($this, 'saveDBInfo'));
		add_action( 'wp_ajax_cdwqa_migration', array($this, 'migration'));
	}

	public function menu_init() {

		//add admin menu
		add_menu_page( __('DWQA Migration', CDWQA_SLUG), __('DWQA Migration', CDWQA_SLUG), 'manage_options', 'dwqa-migration', array($this, 'showMain') );
		//add script
		add_action( 'admin_enqueue_scripts', array($this, 'adminEnqueueScripts') );
	}

	public function adminEnqueueScripts() {
		// if(isset($_GET['page']) && $_GET['page'] == 'dwqa-migration'){
		wp_enqueue_style( 'dwqa-migration-admin-style', CDWQA_URI . 'assets/css/admin-style.css');
		wp_enqueue_script( 'dwqa-migration-admin-script', CDWQA_URI . 'assets/js/admin-script.js', array('jquery'));

			// Localize the script with new data
		$ajax_array = array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'ajax_migration' => CDWQA_URI . 'migration.php',
			'ajax_nonce' => wp_create_nonce('dwqa-migration-ajax')
		);
		wp_localize_script( 'dwqa-migration-admin-script', 'cdwqa', $ajax_array );
		// }

	}

	public function migration(){
		check_ajax_referer('dwqa-migration-ajax', 'nonce');
		$db_info = $this->getDBInfo();

		if(isset($db_info['migration_from']) && $db_info['migration_from']=='bbpress'){
			// require_once CDWQA_ROOT_FILE.'/Migrations/BBpress/BBpress.php';

			switch ($_POST['migration_action']) {
				case 'connect':
					
					$db = new \CDWQA_DB($db_info['db_host'], $db_info['db_user'], $db_info['db_password'], $db_info['db_name']);
					if($db->checkConnect()){
						wp_send_json_success();
					}else{
						wp_send_json_error();
					}
					break;
				case 'reset':
					$current_db = new \CDWQA_DB($db_info['current_db_host'], $db_info['current_db_user'], $db_info['current_db_password'], $db_info['current_db_name'], $db_info['current_db_prefix'], $db_info['current_db_blog_id']);

					$bbpress = new BBpress\CDWQA_BBpress_Migration();

					$bbpress->setCurrentDB($current_db);
					$bbpress->init();
					$bbpress->resetDefault();

					$result = $bbpress->returnStatus();
					wp_send_json_success($result);
					break;
				case 're-run':
					$current_db = new \CDWQA_DB($db_info['current_db_host'], $db_info['current_db_user'], $db_info['current_db_password'], $db_info['current_db_name'], $db_info['current_db_prefix'], $db_info['current_db_blog_id']);

					$bbpress = new BBpress\CDWQA_BBpress_Migration();

					$bbpress->setCurrentDB($current_db);
					$bbpress->init();
					$bbpress->resetDefault();

					$result = $bbpress->returnStatus();
					wp_send_json_success($result);
					break;
				case 'run':
					$current_db = new \CDWQA_DB($db_info['current_db_host'], $db_info['current_db_user'], $db_info['current_db_password'], $db_info['current_db_name'], $db_info['current_db_prefix'], $db_info['current_db_blog_id'], '', $db_info['current_upload_dir']);


					$bbpress = new BBpress\CDWQA_BBpress_Migration();

					$bbpress->setCurrentDB($current_db);

					if($db_info['migration_type']=='local'){
						$bbpress->setLocal(true);
						$bbpress->setRemoteDB($current_db);
					}else{
						$remote_db = new \CDWQA_DB($db_info['db_host'], $db_info['db_user'], $db_info['db_password'], $db_info['db_name'], $db_info['db_prefix'], $db_info['db_blog_id'], '', $db_info['upload_dir'] );
						if(!$remote_db->checkConnect()){
							wp_send_json_error();
						}
						
						$bbpress->setRemoteDB($remote_db);

					}

					$bbpress->setLimit($db_info['db_limit']);
					$bbpress->init();
					
					$bbpress->run();

					$result = $bbpress->returnStatus();
					wp_send_json_success($result);
					break;
				
				default:
					# code...
					break;
			}
		}

		if(isset($db_info['migration_from']) && $db_info['migration_from']=='sabai-discuss'){
			// require_once CDWQA_ROOT_FILE.'/Migrations/BBpress/BBpress.php';

			switch ($_POST['migration_action']) {
				case 'connect':
					
					$db = new \CDWQA_DB($db_info['db_host'], $db_info['db_user'], $db_info['db_password'], $db_info['db_name']);
					if($db->checkConnect()){
						wp_send_json_success();
					}else{
						wp_send_json_error();
					}
					break;
				case 'reset':
					$current_db = new \CDWQA_DB($db_info['current_db_host'], $db_info['current_db_user'], $db_info['current_db_password'], $db_info['current_db_name'], $db_info['current_db_prefix'], $db_info['current_db_blog_id']);

					$sabai = new SabaiDiscuss\CDWQA_Sabai_Discuss_Migration();

					$sabai->setCurrentDB($current_db);
					$sabai->init();
					$sabai->resetDefault();

					$result = $sabai->returnStatus();
					wp_send_json_success($result);
					break;
				case 're-run':
					$current_db = new \CDWQA_DB($db_info['current_db_host'], $db_info['current_db_user'], $db_info['current_db_password'], $db_info['current_db_name'], $db_info['current_db_prefix'], $db_info['current_db_blog_id']);

					$sabai = new SabaiDiscuss\CDWQA_Sabai_Discuss_Migration();

					$sabai->setCurrentDB($current_db);
					$sabai->init();
					$sabai->resetDefault();

					$result = $sabai->returnStatus();
					wp_send_json_success($result);
					break;
				case 'run':
					
					$current_db = new \CDWQA_DB($db_info['current_db_host'], $db_info['current_db_user'], $db_info['current_db_password'], $db_info['current_db_name'], $db_info['current_db_prefix'], $db_info['current_db_blog_id'], '', $db_info['current_upload_dir']);


					$sabai = new SabaiDiscuss\CDWQA_Sabai_Discuss_Migration();

					$sabai->setCurrentDB($current_db);

					if($db_info['migration_type']=='local'){
						$sabai->setLocal(true);
						$sabai->setRemoteDB($current_db);
					}else{
						$remote_db = new \CDWQA_DB($db_info['db_host'], $db_info['db_user'], $db_info['db_password'], $db_info['db_name'], $db_info['db_prefix'], $db_info['db_blog_id'], '', $db_info['upload_dir'] );
						if(!$remote_db->checkConnect()){
							wp_send_json_error();
						}
						
						$sabai->setRemoteDB($remote_db);

					}

					$sabai->setLimit($db_info['db_limit']);
					$sabai->init();
					
					$sabai->run();

					$result = $sabai->returnStatus();
					wp_send_json_success($result);
					break;
				
				default:
					# code...
					break;
			}
		}
		wp_die();
	}

	public function saveDBInfo(){
		// If the 'download' URL parameter is set, a WXR export file is baked and returned.
		check_ajax_referer( 'dwqa-migration-ajax', 'nonce' );

		global $wpdb;

		$migration_from = isset($_POST['migration_from'])?$_POST['migration_from']:'';
		$migration_type = isset($_POST['migration_type'])?$_POST['migration_type']:'';
		$db_name = isset($_POST['db_name'])?$_POST['db_name']:'';
		$db_user = isset($_POST['db_user'])?$_POST['db_user']:'';
		$db_password = isset($_POST['db_password'])?$_POST['db_password']:'';
		$db_host = isset($_POST['db_host'])?$_POST['db_host']:'';
		$db_prefix = isset($_POST['db_prefix'])?$_POST['db_prefix']:'';
		$db_blog_id = isset($_POST['db_blog_id'])?$_POST['db_blog_id']:'';
		$db_limit = isset($_POST['db_limit'])?$_POST['db_limit']:'200';
		$upload_dir = isset($_POST['upload_dir'])?$_POST['upload_dir']:'';

		$db_info = array(
			'migration_from' => $migration_from,
			'migration_type' => $migration_type,
			'db_name' => $db_name,
			'db_user' => $db_user,
			'db_password' => $db_password,
			'db_host' => $db_host,
			'db_prefix' => $db_prefix,
			'db_blog_id' => $db_blog_id,
			'db_limit' => $db_limit,

			'current_db_name' => DB_NAME,
			'current_db_user' => DB_USER,
			'current_db_password' => DB_PASSWORD,
			'current_db_host' => DB_HOST,
			'current_db_prefix' => $wpdb->prefix,
			'current_db_blog_id' => $wpdb->blogid,
			'current_db_charset' => $wpdb->get_charset_collate(),
			'current_upload_dir' => wp_get_upload_dir()['basedir'],
		);

		$this->setDBInfo($db_info);

		wp_send_json_success();
		wp_die();
		
	}

	public function setDBInfo($data){
		update_option('cdwqa_db_info', $data);
	}

	public function getDBInfo(){
		return get_option('cdwqa_db_info', false);
	}

	public function getProcessed(){
		$processed =  get_option('cdwqa_processed', false);
		return $processed?json_decode($processed, true):$processed;
	}

	public function getOffset(){
		$offset =  get_option('cdwqa_remote_offset', false);
		return $offset?json_decode($offset, true):$offset;
	}

	public function getCurrentAction(){
		$action =  get_option('cdwqa_current_action', false);
		return $action?json_decode($action, true):$action;
	}

	public function getTotal(){
		$total = get_option('cdwqa_count_total', false);
		return $total?json_decode($total, true):$total;
	}
	public function getCountText(){
		$text = get_option('cdwqa_count_text', false);
		return $text?json_decode($text, true):$text;
	}




	public function showMain(){
		$db_info = $this->getDBInfo();

		$total = $this->getTotal();
		$text = $this->getCountText();
		$current_action = $this->getCurrentAction();
		$offset = $this->getOffset();
		$processed = $this->getProcessed();

		$config = false;
		if(isset($db_info['migration_type']) && $db_info['migration_type']){
			$config = true;
		}

		?>
		<div class="wrap">
			<div class="page-title">
				<h1>Designwall Question and Answer Migration Tool:</h1>
				<p class="description">DW Q&A Migration is a Free tool to migrate <strong>bbPress</strong> or <strong>Sabai Discuss</strong> database to <strong>Designwall Question and Answer</strong> (DW Q&A).</p>
			</div>
			<div class="page-content">
				<div id="migration">
					<div class="box">
						<div id="migration-step-1">
							<h2 class="title">Step 1: Database Configuration</h2>
							<div class="panel <?php echo $config?'':'active';?>">
								<form method="GET" id="remote-migration">
									<fieldset>
										<legend class="screen-reader-text"><?php _e( 'Content to export' ); ?></legend>
										<input type="hidden" name="remote" value="true" />
										<input type="hidden" name="dwqa_nonce" value="<?php echo wp_create_nonce('dwqa-export');?>" />

										<table>
											<tr>
												<th>Migrate From:</th>
												<td>
													<label>
														<input type="radio" name="migration_from" value="bbpress" <?php echo isset($db_info['migration_from']) && $db_info['migration_from']=='bbpress'?'checked':'';?>>
														bbPress
													</label>
													<label>
														<input type="radio" name="migration_from" value="sabai-discuss" <?php echo isset($db_info['migration_from']) && $db_info['migration_from']=='sabai-discuss'?'checked':'';?>>
														Sabai Discuss
													</label>
													
													
												</td>
											</tr>
											<tr>
												<th>Database Source:</th>
												<td>
													<label>
														<input type="radio" name="migration_type" value="local" <?php echo isset($db_info['migration_type']) && $db_info['migration_type']=='local'?'checked':'';?>>
														Local
													</label>
													<label>
														<input type="radio" name="migration_type" value="remote" <?php echo isset($db_info['migration_type']) && $db_info['migration_type']=='remote'?'checked':'';?>>
														Remote
													</label>
													
													
												</td>
											</tr>
											<tr>
												<th>Rows per process</th>
												<td>
													<input type="text" id="db_limit" name="db_limit" value="<?php echo isset($db_info['db_limit'])?$db_info['db_limit']:'200';?>">
												</td>
											</tr>

											<tr class="remote-data <?php echo isset($db_info['migration_type'])?$db_info['migration_type']:''?>">
												<th>Database Name:</th>
												<td><input type="text" id="db_name" name="db_name" value="<?php echo isset($db_info['db_name'])?$db_info['db_name']:'';?>"></td>
											</tr>
											<tr class="remote-data <?php echo isset($db_info['migration_type'])?$db_info['migration_type']:''?>">
												<th>User:</th>
												<td><input type="text" id="db_user" name="db_user" value="<?php echo isset($db_info['db_user'])?$db_info['db_user']:'';?>"></td>
											</tr>
											<tr class="remote-data <?php echo isset($db_info['migration_type'])?$db_info['migration_type']:''?>">
												<th>Password:</th>
												<td><input type="password" id="db_password" name="db_password" value="<?php echo isset($db_info['db_password'])?$db_info['db_password']:'';?>"></td>
											</tr>
											<tr class="remote-data <?php echo isset($db_info['migration_type'])?$db_info['migration_type']:''?>">
												<th>Database Host:</th>
												<td><input type="text" id="db_host" name="db_host" value="<?php echo isset($db_info['db_host'])?$db_info['db_host']:'localhost';?>"></td>
											</tr>
											<tr class="remote-data <?php echo isset($db_info['migration_type'])?$db_info['migration_type']:''?>">
												<th>Table Prefix:</th>
												<td><input type="text" id="db_prefix" name="db_prefix" value="<?php echo isset($db_info['db_prefix'])?$db_info['db_prefix']:'wp_';?>"></td>
											</tr>
											<tr class="remote-data <?php echo isset($db_info['migration_type'])?$db_info['migration_type']:''?>">
												<th>Blog Id:</th>
												<td>
													<input type="text" id="db_blog_id" name="db_blog_id" value="<?php echo isset($db_info['db_blog_id'])?$db_info['db_blog_id']:'';?>">
													<br>
													<span class="description">Keep blank if single site</span>
												</td>
											</tr>
											
										</table>

									</fieldset>

									<?php
									do_action( 'migration_form' );
									?>
									<p class="submit">
										
										<button type="button" id="cdwqa_save" class="button button-primary">Save</button>

									</p>
								</form>
							</div>
						</div>

						<div id="migration-step-2">
							<h2 class="title">Step 2: Database Migration</h2>
							<div class="panel <?php echo $config?'active':'';?>">
								<div id="action-migration">
									<div class="process-wrap">
										<?php if($total): 
											foreach($total as $key => $value ):
												?>
											<div class="process">
												<div class="processed">
													<div class="text"><?php echo $text[$value['action']];?>	</div>
													<div class="per-wrap">
														<div class="per">
															<?php
															$per = 0; 
															if($processed && in_array($value['action'], $processed)){
																$per = 100; 
															}
															if($current_action == $value['action'] && $value['count']){
																$per = number_format((float)($offset*100/$value['count']), 2, '.', '');
															}
															?>
															<span id="per-<?php echo $value['action'];?>" style="width: <?php echo $per;?>%;"></span>
														</div>
													</div>
													<div style="clear:both;"></div>
												</div>
											</div>
											
											<?php endforeach;?>
										<?php else:?>
											<p>Click Run to start migration!</p>
										<?php endif;?>
									</div>
									<p class="submit">
										<button type="button" id="run" class="button button-primary"><?php echo $processed?'Resume':'Run';?></button>
										<button type="button" id="re-run" class="button button-success">Re-Run</button>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="guide">
					<div class="box">
						<h3>Quick Guide:</h3>
						<p class="message"><strong>IMPORTANT:</strong> Please take full backup of your website first.</p>
						<h4><span>Step 1:</span> Database Configuration</h4>
						<div>
							<div>DW Q&A Migration Tool supports 2 migration database source types:</div>
							<ul>
								<li><span class="btn-style">Local</span> Migrate bbPress or Sabai Discuss database to DW Q&amp;A on entire database.</li>
								<li><span class="btn-style">Remote</span> Migrate bbPress or Sabai Discussdatabase to DW Q&amp;A from remote database.</li>
							</ul>
						</div>
						<h4><span>Step 2:</span> Database Migration</h4>
						<div>
							<div>Once the database configuration done, you can start the migration by hitting the Run button.</div>
							<ul>
								<li><span class="btn-style">Run</span> Start the migration process. You will see the migration process status in the panel.</li>
								<li><span class="btn-style">Resume</span> Resume previous migration that is not complete.</li>
								<li>
									<span class="btn-style">Re-Run</span> The return button is to help you to rerun the migration process. It is used in case of:
									<ol>
										<li>When the bbPress database has new update and you want to migrate the updates to DW Q&A</li>
										<li>When the migration process is not complete, you will need to rerun to get the migration process complete</li>
									</ol>
								</li>
							</ul>
						</div>
						<h4>Feature request and get support</h4>
						<p>
							Please submit any feature or support request on our <a href="https://www.designwall.com/question/">support forum</a>.
						</p>
					</div>
				</div>
			</div>
			
			<!-- <div id="migration" class="">
				<div id="connect-status">

				</div>
				<span class="image-loading">
					<img src="http://localhost/wplastest/wp-admin/images/spinner.gif" alt="Loading">
				</span>
			</div> -->
			<div class="clear"></div>
		</div>
		<?php
	}

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}

