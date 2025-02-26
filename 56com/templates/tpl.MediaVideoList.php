
<h2 >共<?php echo count( $videoList['list'] ); ?>个</h2>
<div >
	<a href="<?php echo admin_url() .  $upload_url; ?>" style="float:left;"><?php submit_button( __('视频上传', $this->package), 'primary', 'button');?></a>
	<a href="<?php echo admin_url('upload.php?page=open56') ?>" style="float:left;margin-left:20px;"><?php submit_button( __('刷新', $this->package), 'primary', 'button');?></a>
</div>
<?php if( empty( $videoList['list'] ) ) return; ?>
<form action="upload?page=open56" method="post" > 
<table class="wp-list-table widefat fixed media" cellspacing="0">
	<thead>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">全选</label></th><th scope="col" id="icon" class="manage-column column-icon" style=""></th>
		<th scope="col" id="title" class="manage-column column-title sortable " style=""><span>视频</span><span class="sorting-indicator"></span></th>
		<th scope="col" id="author" class="manage-column column-author sortable " style=""><span>审核情况</span><span class="sorting-indicator"></span></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">全选</label></th><th scope="col" id="icon" class="manage-column column-icon" style=""></th>
		<th scope="col" id="title" class="manage-column column-title sortable " style=""><span></span><span class="sorting-indicator"></span></th>
		<th scope="col" id="author" class="manage-column column-author sortable " style=""><span></span><span class="sorting-indicator"></span></th>
	</tr></tfoot>
	<tbody id="the-list">
		<?php foreach( array_reverse( $videoList['list'] ) as $key => $val ): ?>
		<tr id="post-<?php echo $val['vid'];?>" class="alternate author-self status-inherit" valign="top">
		<th scope="row" class="check-column">
				<label class="screen-reader-text" for="cb-select-<?php echo $val['vid'];?>"><?php echo $val['title']?></label>
				
		</th>
		<td class="column-icon media-icon">
				<a href="<?php echo $val['swf'];?>" title="<?php echo $val['title'];?>”" target="_blank">
				<img width="75" height="60" src="<?php echo $val['img'];?>" class="attachment-80x60" alt="<?php echo $val['title'];?>">				</a>

		</td>
		<td class="title column-title">
			<strong>
				<a href="<?php echo $val['swf'];?>" title="<?php echo $val['title'];?>" target="_blank"><?php echo $val['title'];?></a>
			</strong>
			<p></p>
			<div class="row-actions"><span class="edit"></span><span class="delete"><a class="submitdelete" onclick="return showNotice.warn();" href="upload.php?page=open56&action=delete&post=<?php echo $val['vid'];?>">永久删除</a> | </span><span class="view"><a href="<?php echo $val['swf'];?>" title="<?php echo $val['title'];?> " target="_blank" rel="permalink">查看</a></span></div>		</td>
		<td class="author column-author"><a href=""><?php echo $val['chk_yn'] == 'y' ? '通过审核' : ($val['chk_yn'] == 'n' ? '审核中' : '审核删除') ;?></a></td>	
	</tr>
<?php endforeach; ?>
	</tbody>
</table>

</form>
<div ><a href="<?php echo $upload_url; ?>"><?php submit_button( __('视频上传', $this->package), 'primary', 'button');?></a></div>