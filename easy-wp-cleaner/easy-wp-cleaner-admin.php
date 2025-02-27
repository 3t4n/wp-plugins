<?php

	$easy_wp_cleaner_plugin_url = 'admin.php?page=easy-wp-cleaner';
	
	$revision_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_revision' ),
								   admin_url( $easy_wp_cleaner_plugin_url ) );

	$draft_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_draft' ),
								admin_url( $easy_wp_cleaner_plugin_url ) );

	$autodraft_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_autodraft' ),
									admin_url( $easy_wp_cleaner_plugin_url ) );

	$moderated_url = add_query_arg(	array( 'action' => 'easy_wp_cleaner_moderated' ),
									admin_url( $easy_wp_cleaner_plugin_url ) );
	
	$spam_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_spam' ),
							   admin_url( $easy_wp_cleaner_plugin_url ) );

	$trash_url = add_query_arg(	array( 'action' => 'easy_wp_cleaner_trash' ),
								admin_url( $easy_wp_cleaner_plugin_url ) );

	$postmeta_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_postmeta' ),
								   admin_url( $easy_wp_cleaner_plugin_url ) );
	
	$commentmeta_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_commentmeta' ),
									 admin_url( $easy_wp_cleaner_plugin_url ) );
	
	$relationships_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_relationships' ),
										admin_url( $easy_wp_cleaner_plugin_url ) );
	
	$feed_url = add_query_arg( array( 'action' => 'easy_wp_cleaner_feed' ),
							   admin_url( $easy_wp_cleaner_plugin_url ) );

	$delete_all_url = add_query_arg( array(	'action' => 'easy_wp_cleaner_delete_all' ),
									admin_url( $easy_wp_cleaner_plugin_url ) );
	
	
	$optimize_url = add_query_arg( array(	'action' => 'easy_wp_cleaner_optimize' ),
									admin_url( $easy_wp_cleaner_plugin_url ) );

	$revision_nonce_url = wp_nonce_url( $revision_url, 'revision' , 'easy_wp_cleaner_revision_nonce' );
	$draft_nonce_url = wp_nonce_url( $draft_url, 'draft' , 'easy_wp_cleaner_draft_nonce' );
	$autodraft_nonce_url = wp_nonce_url( $autodraft_url, 'autodraft' , 'easy_wp_cleaner_autodraft_nonce' );
	$moderated_nonce_url = wp_nonce_url( $moderated_url, 'moderated' , 'easy_wp_cleaner_moderated_nonce' );
	$spam_nonce_url = wp_nonce_url( $spam_url, 'spam' , 'easy_wp_cleaner_spam_nonce' );
	$trash_nonce_url = wp_nonce_url( $trash_url, 'trash' , 'easy_wp_cleaner_trash_nonce' );
	$postmeta_nonce_url = wp_nonce_url( $postmeta_url, 'postmeta' , 'easy_wp_cleaner_postmeta_nonce' );
	$commentmeta_nonce_url = wp_nonce_url( $commentmeta_url, 'commentmeta' , 'easy_wp_cleaner_commentmeta_nonce' );
	$relationships_nonce_url = wp_nonce_url( $relationships_url, 'relationships' , 'easy_wp_cleaner_relationships_nonce' );
	$feed_nonce_url = wp_nonce_url( $feed_url, 'feed' , 'easy_wp_cleaner_feed_nonce' );
	$delete_all_nonce_url = wp_nonce_url( $delete_all_url, 'delete_all' , 'easy_wp_cleaner_delete_all_nonce' );
	$optimize_nonce_url = wp_nonce_url( $optimize_url, 'optimize' , 'easy_wp_cleaner_optimize_nonce' );
	
	$ewc_message = '';

	if ( isset( $_GET[ 'easy_wp_cleaner_revision_nonce' ] ) &&
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_revision_nonce' ], 'revision' ) ) { 
			easy_wp_cleaner('revision');
			$ewc_message = "All revisions are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_draft_nonce' ] ) &&
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_draft_nonce' ], 'draft' ) ) {
			easy_wp_cleaner('draft');
			$ewc_message = "All drafts are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_autodraft_nonce' ] ) &&
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_autodraft_nonce' ], 'autodraft' ) ) {
			easy_wp_cleaner('autodraft');
			$ewc_message = "All autodraft are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_moderated_nonce' ] ) &&
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_moderated_nonce' ], 'moderated' ) ) {
			easy_wp_cleaner('moderated');
			$ewc_message = "All moderated comments are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_spam_nonce' ] ) && 
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_spam_nonce' ], 'spam' ) ) {
			easy_wp_cleaner('spam');
			$ewc_message = "All spam comments are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_trash_nonce' ] ) && 
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_trash_nonce' ], 'trash' ) ) {
			easy_wp_cleaner('trash');
			$ewc_message = "All trash comments are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_postmeta_nonce' ] ) &&
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_postmeta_nonce' ], 'postmeta' ) ) {
			easy_wp_cleaner('postmeta');
			$ewc_message = "All orphan postmeta are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_commentmeta_nonce' ] ) && 
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_commentmeta_nonce' ], 'commentmeta' ) ) {
			easy_wp_cleaner('commentmeta');
			$ewc_message = "All orphan commentmeta are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_relationships_nonce' ] ) &&
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_relationships_nonce' ], 'relationships' ) ) {
			easy_wp_cleaner('relationships');
			$ewc_message = "All orphan relationships are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_feed_nonce' ] ) && 
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_feed_nonce' ], 'feed' ) ) {
			easy_wp_cleaner('feed');
			$ewc_message = "All dashboard transient feed are deleted";
	}

	if ( isset( $_GET[ 'easy_wp_cleaner_delete_all_nonce' ] ) && 
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_delete_all_nonce' ], 'delete_all' ) ) {
			easy_wp_cleaner('revision');
			easy_wp_cleaner('draft');
			easy_wp_cleaner('autodraft');
			easy_wp_cleaner('moderated');
			easy_wp_cleaner('spam');
			easy_wp_cleaner('trash');
			easy_wp_cleaner('postmeta');
			easy_wp_cleaner('commentmeta');
			easy_wp_cleaner('relationships');
			easy_wp_cleaner('feed');
			$ewc_message = "All unnecessary data are deleted";
	}
	
	if ( isset( $_GET[ 'easy_wp_cleaner_optimize_nonce' ] ) && 
		wp_verify_nonce( $_GET[ 'easy_wp_cleaner_optimize_nonce' ], 'optimize' ) ) {
			easy_wp_cleaner_optimize();
			$ewc_message = "Database optimized successfully";
	}
	
	if($ewc_message != ''){
		echo '<div id="message" class="updated"><p><strong>' . $ewc_message . '</strong></p></div>';
	}
?>

<div class="wrap">
	<h2>Easy WP Cleaner</h2>
	<h2 class="nav-tab-wrapper" style="margin:10px 0px">
		<a class="nav-tab nav-tab-active" href="admin.php?page=easy-wp-cleaner">Settings</a>
		<a class="nav-tab" href="admin.php?page=easy-wp-cleaner-help">Help</a>
	</h2>
		
	<table class="widefat" style="width:40%">
		<thead>
			<tr>
				<th>Type</th>
				<th>Count</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="the-list">
			<tr class="alternate">
				<td class="column-name">Revision</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('revision'); ?></td>
				<td class="column-name">
					<form action="<?php echo $revision_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('revision')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr>
				<td class="column-name">Draft</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('draft'); ?></td>
				<td class="column-name">
					<form action="<?php echo $draft_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('draft')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr class="alternate">
				<td class="column-name">Auto Draft</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('autodraft'); ?></td>
				<td class="column-name">
					<form action="<?php echo $autodraft_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('autodraft')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr>
				<td class="column-name">Moderated Comments</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('moderated'); ?></td>
				<td class="column-name">
					<form action="<?php echo $moderated_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('moderated')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr class="alternate">
				<td class="column-name">Spam Comments</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('spam'); ?></td>
				<td class="column-name">
					<form action="<?php echo $spam_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('spam')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr>
				<td class="column-name">Trash Comments</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('trash'); ?></td>
				<td class="column-name">
					<form action="<?php echo $trash_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('trash')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr class="alternate">
				<td class="column-name">Orphan Postmeta</td>
				<td class="column-name">
					<?php echo easy_wp_cleaner_count('postmeta'); ?>
				</td>
				<td class="column-name">
					<form action="<?php echo $postmeta_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('postmeta')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr>
				<td class="column-name">Orphan Commentmeta</td>
				<td class="column-name">
					<?php echo easy_wp_cleaner_count('commentmeta'); ?>
				</td>
				<td class="column-name">
					<form action="<?php echo $commentmeta_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('commentmeta')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr class="alternate">
				<td class="column-name">Orphan Relationships</td>
				<td class="column-name">
					<?php echo easy_wp_cleaner_count('relationships'); ?>
				</td>
				<td class="column-name">
					<form action="<?php echo $relationships_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('relationships')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
			<tr>
				<td class="column-name">Dashboard Transient Feed</td>
				<td class="column-name"><?php echo easy_wp_cleaner_count('feed'); ?></td>
				<td class="column-name">
					<form action="<?php echo $feed_nonce_url;?>" method="post">
						<input type="submit" class="<?php if(easy_wp_cleaner_count('feed')>0){echo 'button-primary';}else{echo 'button';} ?>" value="Delete" />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
		
	<p>
		<form action="<?php echo $delete_all_nonce_url;?>" method="post">
			<input type="submit" class="button-primary" value="Delete All" />
		</form>
	</p>
		
	<hr/>
	
	<table class="widefat" style="width:40%">
		<thead>
			<tr>
				<th>Table</th>
				<th>Size</th>
			</tr>
		</thead>
		<tbody id="the-list">
		<?php
			global $wpdb;
			$total_size = 0;
			$alternate = " class='alternate'";
			$wcu_sql = 'SHOW TABLE STATUS FROM `'.DB_NAME.'`';
			$result = $wpdb->get_results($wcu_sql);

			foreach($result as $row){

				$table_size = $row->Data_length + $row->Index_length;
				$table_size = $table_size / 1024;
				$table_size = sprintf("%0.3f",$table_size);

				$every_size = $row->Data_length + $row->Index_length;
				$every_size = $every_size / 1024;
				$total_size += $every_size;

				echo "<tr". $alternate .">
						<td class='column-name'>". $row->Name ."</td>
						<td class='column-name'>". $table_size ." KB"."</td>
					</tr>\n";
				$alternate = (empty($alternate)) ? " class='alternate'" : "";
			}
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>Total</th>
				<th style="font-family:Tahoma;"><?php echo sprintf("%0.3f",$total_size).' KB'; ?></th>
			</tr>
		</tfoot>
	</table>
	
	<p>
		<form action="<?php echo $optimize_nonce_url;?>" method="post">
			<input type="submit" class="button-primary" value="Optimize Database" />
		</form>
	</p>
		
	<hr/>
	<table class="widefat" style="width:40%">
		<thead>
			<tr>
				<th><strong>Note</strong></th>
			</tr>
		</thead>
		<tbody id="the-list">
			<tr>
				<td>
					If you enjoy this plugin, Please give it 5 stars on WordPress:
					<a title="Easy WP Cleaner" target="_blank" href="https://wordpress.org/support/view/plugin-reviews/easy-wp-cleaner">Rate the plugin</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>