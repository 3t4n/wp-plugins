<?php
if ( ! defined( 'ABSPATH' ) ) exit;

//列表
function wysj_bottom_pop_list(){
	global $wpdb;
	//获取总数
	$total = $wpdb->get_var("SELECT COUNT(id) FROM ".WYSJ_POP_TABLE);
	//每页显示多少条
	$comments_per_page = 20;
	$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
	//计算偏移
	$offset = ((int)$page-1)*$comments_per_page;
?>
<div class="wy-serv">
	<h1>咨询列表</h1>
	<form id="bp-enquiries-form" method="post">
	<div class="tablenav top">
		<div class="alignleft actions bulkactions">
			<span style="line-height:28px; font-weight:bold;">批量操作：</span>
			<input type="button" class="button button-primary" value="批量删除" onclick="wysjPopAdmin.deleteMulti()">
			<input type="button" class="button button-primary" value="批量处理（升级完整版解锁）" disabled>
			<input type="hidden" name="action" value="export" />
			<!-- <input type="submit" class="button button-primary" value="导出"> -->
		</div>
		<div class="tablenav-pages one-page">
			<span class="displaying-num"><?php echo $total; ?>个项目</span>
		</div>
		<br class="clear">
	</div>
	<table class="wp-list-table widefat fixed striped">
		<thead>
			<tr>
				<td id="cb" class="manage-column column-cb check-column">
					<label class="screen-reader-text" for="cb-select-all-1">全选</label>
					<input id="cb-select-all-1" type="checkbox">
				</td>
				<td width="30">ID</td>
				<th scope="col" id="comment" class="manage-column column-comment column-primary">留言内容</th>
				<th scope="col" id="date" class="manage-column column-date desc">
					提交于
				</th>
				<th scope="col" id="date" class="manage-column column-date desc">
					状态
				</th>
				<th scope="col" id="author" class="manage-column column-author desc">
					操作
				</th>
			</tr>
		</thead>

	<tbody id="bp-enquiries-list">
<?php
	$list = $wpdb->get_results("SELECT * FROM ".WYSJ_POP_TABLE." ORDER BY time DESC LIMIT ".$offset.",".$comments_per_page);
	foreach ($list as $item){
?>
		<tr id="bp-enquiries-<?php echo $item->id; ?>">
			<th scope="row" class="check-column">		
				<label class="screen-reader-text" for="cb-select-1">选择留言</label>
				<input id="cb-select-<?php echo $item->id; ?>" type="checkbox" class="bp-item-check" name="bp_enquiries[]" value="<?php echo $item->id; ?>">
			</th>
			<td><?php echo $item->id; ?></td>
			<td class="tdcenter">
					<a href="javascript:;" class="thickbox" onclick='wysjPopAdmin.view(<?php echo $item->userinfo; ?>,"<?php echo $item->time; ?>")'>
			<?php 
				$userinfo = json_decode($item->userinfo);
				foreach($userinfo as $key => $value){
					if ($value == "") {
						$value = "-";
					}
			?>
				<span><?php echo $key."：".$value."，"; ?></span>
			<?php } ?>
					</a>
			</td>
			<td class="tdcenter">
				<div class="submitted-on"><?php echo $item->time; ?></div>
			</td>
			<td class="tdcenter">
				<div class="submitted-on"><?php $status = $item->status == 0 ? '未处理' : '已处理'; echo $status; ?></div>
			</td>
			<td class="tdcenter">
				<a href="javascript:;" class="button button-primary wysj-pop-manage" onclick='wysjPopAdmin.view(<?php echo $item->userinfo; ?>,"<?php echo $item->time; ?>",<?php echo $item->id; ?>)'>查看</a>
				<a href="javascript:;" class="button button-primary wysj-pop-manage" disabled>处理</a>
				<a href="javascript:;" class="button button-primary wysj-pop-manage" onclick="wysjPopAdmin.del('<?php echo $item->id; ?>', this)">删除</a>
			</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<div class="wysj-pop-page">
<?php 
	echo paginate_links( array(
	    'base' => add_query_arg( 'cpage', '%#%' ),
	    'format' => '',
	    'prev_text' => __('上一页'),
	    'next_text' => __('下一页'),
	    'total' => ceil($total / $comments_per_page),
	    'current' => $page
	));
?>
	<br class="clear">
</div>
</form>
</div>
<div id="wysj-btpop-view" class="wysj-btpop-view">
	<a href="javascript:;" class="wysj wysj-close wysj-btpop-view-close"></a>
	<div class="wysj-btpop-view-content">
		<h2>留言详情</h2>
		<p><strong>提交时间：</strong><span id="wysj-btpop-view-time"></span></p>
		<table class="wysj-btpop-view-table">
			<tbody id="wysj-btpop-view-tbody">
			</tbody>
		</table>
		<input type="hidden" id="wysj-btpop-view-id" value="">
		<div class="wysj-btpop-view-btn">
			<a href="javascript:;" class="button button-primary" disabled>处理（升级完整版解锁）</a>
			<a href="javascript:;" class="button button-primary" onclick="wysjPopAdmin.viewDel()">删除</a>
		</div>
	</div>
</div>
<div id="wysj-btpop-view-overlay" class="wysj-btpop-view-overlay"></div>
<?php
}

if( isset($_POST['action']) && $_POST['action'] == 'export'){
	wysj_bt_pop_export();
}
//导出Excel
function wysj_bt_pop_export(){
	$data = array(
		0=>array(
			'表格1' => '值1',
			'表格2' => '值2',
			'表格3' => '值3',
			'表格4' => '值4',
			'表格5' => '值5',
		)
	);
	$string="";
	$head = "";
    foreach ($data as $key => $value) 
    {
		if($head == ""){
			foreach ($value as $k => $val){
				$k = iconv('utf-8','gb2312', $k);
				$head .= $k.",";
			}
			$head .= "\n";
		}
		foreach ($value as $k => $val)
        {
			$value[$k]=iconv('utf-8','gb2312',$value[$k]);
		}
        $string .= implode(",",$value)."\n"; //用英文逗号分开 
	}
    $filename = date('Ymd').'.csv'; //设置文件名
    header("Content-type:text/csv"); 
    header("Content-Disposition:attachment;filename=".$filename); 
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0'); 
    header('Expires:0'); 
    header('Pragma:public'); 
    echo $head.$string;
	
	exit; 
}
?>