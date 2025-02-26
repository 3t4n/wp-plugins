<?php
$posts = get_posts();
?>
<div class="opaigpt-postTable">
	<table class="post-table">
		<thead>
			<tr>
				<th><?php echo esc_html__('No', 'ai-chatgpt-content-and-image-generator') ?></th>
				<th><?php echo esc_html__('Title', 'ai-chatgpt-content-and-image-generator') ?></th>
				<th><?php echo esc_html__('Action', 'ai-chatgpt-content-and-image-generator') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($posts as $key => $post){ ?>
				<tr>
					<td><?php echo esc_html( $key + 1 ); ?></td>
					<td><?php echo esc_html( $post->post_title ); ?></td>
					<td><a class= "opaigpt-postbtn" href="<?php echo esc_url(admin_url( 'admin.php?page=generator-content&post_wise_title='.$post->post_title ));?>"><?php echo esc_html__('Generate Content', 'ai-chatgpt-content-and-image-generator') ?></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<style>
	.opaigpt-postTable .post-table {
		border-collapse: separate;
		border-radius: 10px;
		border-spacing: 0;
		box-shadow: 0 0 25px #aaa;
		margin: 5rem 60px;
		width: 90%;
	}
	.opaigpt-postTable th {
		background-color: #fff;
		font-weight: normal;
		border-bottom: 1px solid #d1d1d1;
	}
	.opaigpt-postTable th,
	.opaigpt-postTable td {
		line-height: 1.5;
		padding: 0.75em;
		text-align: center;
	}
	.opaigpt-postTable td {
		background-color: white;
	}
	.opaigpt-postTable td:first-child {
		font-weight: bold;
		text-align: left;
	}
	.opaigpt-postTable tbody tr:nth-child(odd) td {
		background-color: #f6f6f6;
	}
	.opaigpt-postTable thead th:first-child {
		border-top-left-radius: 10px;
		text-align: left;
	}
	.opaigpt-postTable thead th:last-child {
		border-top-right-radius: 10px;
	}
	.opaigpt-postTable tbody tr:last-child td:first-child {
		border-bottom-left-radius: 10px;
	}
	.opaigpt-postTable tbody tr:last-child td:last-child {
		border-bottom-right-radius: 10px;
	}
	@media (max-width: 30rem) {
		.opaigpt-postTable thead tr {
			position: absolute;
			top: -9999rem;
			left: -9999rem;
		}
		.opaigpt-postTable tbody tr td {
			border-radius: none;
			text-align: left;
		}
		.opaigpt-postTable tbody tr:first-child td:first-child {
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		.opaigpt-postTable tbody tr:last-child td:last-child {
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		.opaigpt-postTable tr + tr td:first-child {
			border-top: 1px solid #d1d1d1;
		}
		.opaigpt-postTable tr,
		.opaigpt-postTable td {
			display: block;
		}
		.opaigpt-postTable td {
			border: none;
			padding-left: 50%;
		}
		.opaigpt-postTable td:before {
			content: attr(data-label);
			display: inline-block;
			font-weight: bold;
			line-height: 1.5;
			margin-left: -100%;
			width: 100%;
		}
	}
	.opaigpt-postTable .opaigpt-postbtn{
		font-size: 12px;
		font-family: "Montserrat", sans-serif;
		background-color: #2271b1;
		box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
		border: none;
		outline: none;
		text-align: center;
		text-decoration: none;
		gap: 0.5rem;
		padding: 10px 15px;
		border-radius: 0;
		color: #fff;
		display: inline-block;
		cursor: pointer;
	}
</style>