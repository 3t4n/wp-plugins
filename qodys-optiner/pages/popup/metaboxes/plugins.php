<?php
global $userData;

$user_roles = maybe_unserialize( $this->get_option( 'user_roles' ) );

$social_triggers = maybe_unserialize( $this->get_option( 'social_triggers' ) );

if( !$social_triggers || !isset( $social_triggers ) ) // Start with all plugins checked
{
	$social_triggers = array();
	// this lets us get a list of all triggers, since we can't reliably fetch all from a selected/not selected list
	$raw_triggers = $this->GetSocialTriggers();
	
	foreach( $raw_triggers as $key => $value )
		$social_triggers[] = $key;
}
?>

<p>Selecting these will trigger the popup when a user interacts with that particular Facebook social 
widget already embedded/added to your page. To disable it on a certain social plugin - like comments - 
simply don't selected it.</p>

<?php $nextItem = 'social_triggers'; ?>

<table class="uiGrid" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<?php $subItem = 'like'; ?>
			<td class="check_container">
				<input <?php if( in_array( $subItem, $social_triggers ) ) echo 'checked="checked"'; ?> type="checkbox" name="<?php echo $nextItem; ?>[]" value="<?php echo $subItem; ?>" id="<?php echo $nextItem; ?><?php echo $subItem; ?>" />
			</td>
			<td>
				<div class="plugin clearfix">
					<div class="thumbnail">
						<label for="<?php echo $nextItem; ?><?php echo $subItem; ?>">
							<img class="img" src="<?php echo $this->Owner()->GetAsset( 'images', 'like', 'url' ); ?>" width="128" height="88">
						</label>
					</div>
					<div class="name">
						<a target="_blank" href="https://developers.facebook.com/docs/reference/plugins/like">Like Button</a>
					</div>
					<div class="desc">
						<p>The Like button lets users share pages from your site back to their Facebook profile with one click.</p>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<?php $subItem = 'send'; ?>
			<td class="check_container">
				<input <?php if( in_array( $subItem, $social_triggers ) ) echo 'checked="checked"'; ?> type="checkbox" name="<?php echo $nextItem; ?>[]" value="<?php echo $subItem; ?>" id="<?php echo $nextItem; ?><?php echo $subItem; ?>" />
			</td>
			<td>
				<div class="plugin clearfix">
					<div class="thumbnail">
						<label for="<?php echo $nextItem; ?><?php echo $subItem; ?>">
							<img class="img" src="<?php echo $this->Owner()->GetAsset( 'images', 'send', 'url' ); ?>" width="128" height="88">
						</label>
					</div>
					<div class="name">
						<a target="_blank" href="https://developers.facebook.com/docs/reference/plugins/send">Send Button</a>
					</div>
					<div class="desc">
						<p>The Send button allows your users to easily send your content to their friends.</p>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<?php $subItem = 'subscribe'; ?>
			<td class="check_container">
				<input <?php if( in_array( $subItem, $social_triggers ) ) echo 'checked="checked"'; ?> type="checkbox" name="<?php echo $nextItem; ?>[]" value="<?php echo $subItem; ?>" id="<?php echo $nextItem; ?><?php echo $subItem; ?>" />
			</td>
			<td>
				<div class="plugin clearfix">
					<div class="thumbnail">
						<label for="<?php echo $nextItem; ?><?php echo $subItem; ?>">
							<img class="img" src="<?php echo $this->Owner()->GetAsset( 'images', 'subscribe', 'url' ); ?>" width="128" height="88">
						</label>
					</div>
					<div class="name">
						<a target="_blank" href="https://developers.facebook.com/docs/reference/plugins/subscribe">Subscribe Button</a>
					</div>
					<div class="desc">
						<p> The Subscribe button allows people to subscribe to other Facebook users directly from your site. </p>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<?php $subItem = 'comments'; ?>
			<td class="check_container">
				<input <?php if( in_array( $subItem, $social_triggers ) ) echo 'checked="checked"'; ?> type="checkbox" name="<?php echo $nextItem; ?>[]" value="<?php echo $subItem; ?>" id="<?php echo $nextItem; ?><?php echo $subItem; ?>" />
			</td>
			<td>
				<div class="plugin clearfix">
					<div class="thumbnail">
						<label for="<?php echo $nextItem; ?><?php echo $subItem; ?>">
							<img class="img" src="<?php echo $this->Owner()->GetAsset( 'images', 'comments', 'url' ); ?>" width="128" height="88">
						</label>
					</div>
					<div class="name">
						<a target="_blank" href="https://developers.facebook.com/docs/reference/plugins/comments">Comments</a>
					</div>
					<div class="desc">
						<p>The Comments plugin lets users comment on any piece of content on your site.</p>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
	</table>