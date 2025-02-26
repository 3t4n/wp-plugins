<div class="wrap">
<h2> <?php _e( 'Link Directory','advlinkdirectory' ); ?> <a href="admin.php?page=add_link" class="add-new-h2">
<?php _e( 'Add New','advlinkdirectory' ); ?></a> </h2>
<div id="center-panel" style="width: 100%; margin: 3px auto 3px auto;">
<table class="widefat" border="1">
<thead>
<tr class="table-header">
<th>№</th>
<th> <?php _e( 'Link','advlinkdirectory' ); ?> </th>

<th> <?php _e( 'Text description of the link','advlinkdirectory' ); ?> </th>

<th class="link"> Back link </th>

<th align="center"><?php _e( 'Action','advlinkdirectory' ); ?></th>
</tr>
</thead>
<tbody>
<?php if (count($data['reviews']) > 0): $i = 1; ?>
<?php foreach ($data['reviews'] as $key => $record): ?>
<tr>
<td class="name" nowrap align="center"> 
<?php  echo $i ; $i = $i+1; ?> 
</td>
<td class="name" nowrap> 
  <a href="<?php echo $record['link'] ?>" target="_blank"><?php echo $record['link'] ?></a>
</td>

<td class="text">
 <?php echo $record['description'] ?>
</td>	

<td class="link" nowrap>
  <?php  
	if ( strlen($record['reverse_link'])>0 ) {
		echo '<a target="_blank" href="', $record['reverse_link'], '"><img src="', plugins_url( 'img/link.png', __FILE__ ), '"></a>'; 
	}
  ?>
</td>

<td class="actions">
  <a href="admin.php?page=edit-reviews&action=edit&id=<?php echo $record['ID']; ?>">
  <img src="<?php echo  plugins_url( 'img/edit.png', __FILE__ ) ; ?>" width="16px"></a>
  <a onclick="return deleteService(); " href="admin.php?page=edit-reviews&action=delete&id=<?php echo $record['ID'];?>">
  <img src="<?php echo  plugins_url( 'img/delete.png', __FILE__ ) ; ?>" width="16px"></a> 
</td>
</tr>
 <?php endforeach; ?>
 <?php else:?>
<tr>
<td colspan="10" style="text-align:center"> <?php _e( 'No Links','advlinkdirectory' ); ?> </td>
</tr>
 <?php endif;?>
 </tbody>
 </table> 
</div> <!-- /#center-panel -->
</div>

<style>
.widefat td { padding: 2px 2px; vertical-align: middle; }
.widefat th { padding: 8px 2px; background: #b0e0e6; }
.widefat a { text-decoration: none; font-size: 13px; }
td.text {  font-size: 13px;}
td.note {  font-size: 11px;}

.link { text-align: center; }
th.link { text-align: center; width: 60px; }
</style>