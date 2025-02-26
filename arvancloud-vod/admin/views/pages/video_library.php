<?php
use WP_Arvan\Engine\API\VOD\Channels;
use WP_Arvan\Engine\API\VOD\Video;
use WP_Arvan\Engine\Helper;

$Channels = new Channels;
$video    = new Video;
$helper   = new Helper;

$default  = empty($_POST['channel_id'])?get_option( 'arvan-cloud-vod-selected_channel_id'):$_POST['channel_id'];
$chan_list= $Channels->get_channels();
$html_li  = $title_li = '';

if(!empty($chan_list)){
	foreach($chan_list as $chanl){
		$active = '';
		if($chanl['id'] == $default){
			$title_li = $chanl['title'];
			$active   = 'active';
		}
		$html_li .= "<li class='list-item $active' data-id='{$chanl['id']}'>{$chanl['title']}</li>";
	}	
}

if(!empty($_POST['vod_search']))
	$vid_list = $video->search($default,['title'=>"like({$_POST['vod_search']})"]);
else
	$vid_list = $video->showAll($default);
?>
<style>
	li.active{
		background-color: silver;
	}
	.vod-input-icon .search{
		cursor:pointer;
	}
	.vod-input-icon .search:hover{
		opacity:0.6;
	}
</style>
<div class="wrap">
<form method="post" id="post_form">
	<input type="hidden" name="channel_id" value="<?php echo $default; ?>"/>

	<?php if(empty($vid_list[0])){ ?>

	<h1 class="heading-title-one"><?php echo esc_html_e( 'Video Library', 'arvancloud-vod' ) ?></h1>
	<div class="arvan-vod-wrapper">
		<div>
			<p>
			<a href="#"><?php _e('Video arvan cloud platform', 'arvancloud-vod' ); ?></a><?php _e('Prepared for easier access to your videos', 'arvancloud-vod' ); ?> 
			</p>
		</div>

		<div class="vod-card-wide full-height">
			<div class="vod-card-wide__header">
				<div class="vod-input-dropdown">
					<div class="vod-input-dropdown__select">
						<span><?php echo $title_li; ?></span>	
						<i class="arvicon arrow-down"></i>				
					</div>
					<div class="vod-input-dropdown__list">
						<ul>
						<?php echo $html_li; ?>
						</ul>
					</div>
				</div>				
			</div>
			<div class="vod-card-wide__nothing">
					<img src="<?php echo ACVOD_PLUGIN_ROOT_URL . 'assets/images/nothing-vod.svg' ?>" alt="">
					<p class="vod-card-wide__nothing-title"><?php _e('No file found', 'arvancloud-vod'); ?></p>
					<p class="vod-card-wide__nothing-desc"><?php _e('No video was found in this channel', 'arvancloud-vod'); ?></p>
					<a href="<?php echo admin_url('admin.php?page=arvancloud-vod-new-video'); ?>" class="vod-btn primary"><?php _e('New video', 'arvancloud-vod'); ?>
						<i class="arvicon plus"></i>
					</a>
				</div>
		</div>
	</div>

<?php }else{ ?>
	<h1 class="heading-title-one"><?php echo esc_html_e( 'Video Library', 'arvancloud-vod' ) ?></h1>
	<div class="arvan-vod-wrapper">
		<div>
			<p>
			<a href="#"><?php _e('Video arvan cloud platform', 'arvancloud-vod' ); ?></a><?php _e('Prepared for easier access to your videos', 'arvancloud-vod' ); ?>
			</p>
		</div>

		<div class="vod-card-wide half-height">
			<div class="vod-card-wide__header">
				<div class="vod-input-dropdown">
					<div class="vod-input-dropdown__select">
						<span><?php echo $title_li; ?></span>	
						<i class="arvicon arrow-down"></i>				
					</div>
					<div class="vod-input-dropdown__list">
						<ul>
						<?php echo $html_li; ?>
						</ul>
					</div>
				</div>
				<div class="d-flex">
					<div class="vod-input-icon">
						<input type="text" name="vod_search" value="<?php echo isset($_POST['vod_search'])?$_POST['vod_search']:''; ?>" class="vod-input" placeholder="<?php _e('Search in videos ...', 'arvancloud-vod'); ?>">
						<i class="arvicon search"></i>
					</div>
					<a href="<?php echo admin_url('admin.php?page=arvancloud-vod-new-video'); ?>" class="vod-btn primary mr-8">
						<i class="arvicon plus"></i>
						<?php _e('New video', 'arvancloud-vod'); ?>
					</a>
				</div>				
			</div>

			<div class="vod-card-wide__card-row">
			<?php
			$pagination = $helper->paging($vid_list,8);
			foreach($vid_list as $vid){
				if(!is_array($vid))
				break;
				$img = empty($vid['thumbnail_url'])?ACVOD_PLUGIN_ROOT_URL.'assets/images/vid-cover-big.png':$vid['thumbnail_url'];
				echo '
				<div class="vod-card-wide__card-video">
					<div class="vod-card-wide__card-video--box">
						<div class="vod-card-wide__card-video--header">
							<figure>
								<img src="'.$img.'" alt="">
							</figure>
							<span class="vod-card-wide__card-video--quality">'.$vid['file_info']['video']['height'].'p</span>
							<span class="vod-card-wide__card-video--time">'.$vid['file_info']['general']['duration'].'S</span>
						</div>
						<div class="vod-card-wide__card-video--title">
							<h5 class="heading-title-five">'.pathinfo($vid['title'], PATHINFO_FILENAME).'</h5>
						</div>
						<div class="vod-card-wide__card-video--cta">
							<span><bdi>'.date('Y M d',strtotime($vid['created_at'])).'</bdi></span>
							<a href="'.admin_url("admin.php?page=arvancloud-vod-single-video&id={$vid['id']}").'" target="_blank" alt="'.__('Show video','arvancloud-vod').'">'.__('Show video','arvancloud-vod').'</a>
						</div>
					</div>
				</div>';
			}
			?>
			</div>
			<?php echo $pagination; ?>
		</div>
	</div>
	<?php } ?>
</form>
</div>
<script>
	jQuery(document).ready(function($){
		$('.vod-input-dropdown__list li').click(function(){
			id = $(this).data('id');
			if(id != $('[name="channel_id"]').val()){
				$('[name="channel_id"]').val(id);
				$('#post_form').submit();
			}
		});
		$('.search').click(function(){
			$('#post_form').submit();
		});
	});
</script>