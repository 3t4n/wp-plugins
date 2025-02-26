
<h2 >共<?php echo $videoList['total']; ?>个</h2>
<div ><a href="<?php echo $upload_url; ?>"><?php submit_button( __('视频上传', $this->package), 'primary', 'button');?></a></div>
<?php if( empty( $videoList['list'] ) ) return; ?>
<form action="upload?page=open56" method="post" > 
<table class="wp-list-table widefat fixed media" cellspacing="0"  style="width:80%;align=center;">
	<thead>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">全选</label></th><th scope="col" id="icon" class="manage-column column-icon" style=""></th>
		<th scope="col" id="title" class="manage-column column-title sortable " style=""><span>视频</span><span class="sorting-indicator"></span></th>
		<th scope="col" id="author" class="manage-column column-author sortable " style=""><span>审核情况</span><span class="sorting-indicator"></span></th>
		<th scope="col" id="parent" class="manage-column column-parent sortable " style=""><span>操作</span><span class="sorting-indicator"></span></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">全选</label></th><th scope="col" id="icon" class="manage-column column-icon" style=""></th>
		<th scope="col" id="title" class="manage-column column-title sortable " style=""><span></span><span class="sorting-indicator"></span></th>
		<th scope="col" id="author" class="manage-column column-author sortable " style=""><span></span><span class="sorting-indicator"></span></th>
		<th scope="col" id="parent" class="manage-column column-parent sortable " style=""><span>操作</span><span class="sorting-indicator"></span></th>
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
		</td>
		<td class="author column-author"><a href=""><?php echo $val['chk_yn'] == 'y' ? '通过审核' : ($val['chk_yn'] == 'n' ? '审核中' : '审核删除') ;?></a></td>	
		<td class="parent column-parent"><a href="javascript:open56_insert( '<?php echo $val['title'];?>', '<?php echo $val['swf'];?>' );">插入</a></td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>

</form>
<div ><a href="<?php echo $upload_url; ?>"><?php submit_button( __('视频上传', $this->package), 'primary', 'button');?></a></div>
<script type="text/javascript">
//<![CDATA[
function open56_insert( subject, player) {
    html = "<p>"+subject+"</p><p style='height:400px'><embed src='"+player+"' type='application/x-shockwave-flash' allowFullScreen='true' width='100%' height='100%' allowNetworking='all' wmode='opaque' allowScriptAccess='always'></embed></p>";
    parent.parent.send_to_editor(html);
    return false;
}
//]]>
</script>