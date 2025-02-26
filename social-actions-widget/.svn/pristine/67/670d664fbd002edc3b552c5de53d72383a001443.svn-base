<?php if( is_array( $objActionsArray ) && count( $objActionsArray ) > 0 ){?>
<div>
	<ul>
		<?php foreach( $objActionsArray as $objAction ){;?>
		<li>
			<strong><?php echo $objAction->action_type->name;?>:</strong>
			<a title="<?php echo $objAction->title;?>" href="<?php echo $objAction->url;?>"><?php echo $objAction->title;?></a> 
		</li>
		<?php }?>
	</ul>
</div>
<?php } else {?>
<p>No actions found</p>
<?php }?>