<?php if (empty($_GET['edit'])) : ?>
<div class="wrap">
	<h1 class="wp-heading-inline">Campaign List</h1>
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<td class="cl-ids">ID</td>
				<td>Campaign Name</td>
				<td>Date Start</td>
				<td>Date End</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($list)) : ?>
				<?php foreach ($list as $c): ?>
					<tr>
						<td>
							<a href="<?php echo get_bloginfo('url'); ?>/wp-admin/admin.php?page=sdi-scarcity&edit=<?php echo $c['id']; ?>"><?php echo $c['id']; ?></a>
						</td>
						<td>
							<a href="<?php echo get_bloginfo('url'); ?>/wp-admin/admin.php?page=sdi-scarcity&edit=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a>
						</td>
						<td><?php echo $c['start_datetime']; ?></td>
						<td><?php echo $c['end_datetime']; ?></td>
						<td></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php else: ?>
	<?php sdiAdminInclude('edit-campaign.php', compact('campaign')); ?>
<?php endif; ?>