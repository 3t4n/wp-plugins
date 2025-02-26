<!DOCTYPE html>
<html lang="en">
<head>
	<title>Feed x WooCommerce</title>

	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta
			name="viewport"
			content="width=device-width,initial-scale=1,shrink-to-fit=no"
	/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="robots" content="noindex, nofollow" />
	<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="https://assets.aftership.com/favicons/automizely/apple-touch-icon.png"
	/>
	<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="https://assets.aftership.com/favicons/automizely/favicon-32x32.png"
	/>
	<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="https://assets.aftership.com/favicons/automizely/favicon-16x16.png"
	/>
	<link
			rel="manifest"
			href="https://assets.aftership.com/favicons/automizely/manifest.json"
	/>
	<link
			rel="mask-icon"
			href="https://assets.aftership.com/favicons/automizely/safari-pinned-tab.svg"
			color="#000000"
	/>
	<link
			rel="shortcut icon"
			href="https://assets.aftership.com/favicons/automizely/favicon.ico"
	/>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		html,
		body {
			height: 100vh;
			font-family: "SF Pro Display", system-ui;
			background-image: url("https://assets.am-static.com/accounts/landing_page/feed/b6326e62aa1c4076e291f8241fa81c10");
		}

		h2 {
			font-weight: 600;
			font-size: 32px;
			line-height: 40px;
			color: rgba(0, 0, 0, 0.92);
		}

		strong {
			font-size: 16px;
			line-height: 24px;
		}

		.text-subdued {
			font-weight: 400;
			font-size: 16px;
			line-height: 24px;
			color: rgba(0, 0, 0, 0.56);
		}

		.container {
			min-height: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}

		.card {
			max-width: 600px;
			border-radius: 24px;
			padding: 48px 72px;
			margin: 40px;
			background-color: #ffffff;
			display: flex;
			flex-direction: column;
			align-items: center;
			text-align: center;
			row-gap: 48px;
		}

		.card-header {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			row-gap: 12px;
		}

		.card-body {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			row-gap: 24px;
		}

		.enable-item {
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			gap: 24px;
			padding: 12px 24px;
			background: #f5f6f7;
			border-radius: 8px;
			text-align: start;
		}

		.open-app-btn {
			padding: 12px 24px;
			background: #ffa300;
			border-radius: 26px;
			border: none;
			text-decoration: none;
		}

		.open-app-btn > strong {
			cursor: pointer;
			font-size: 20px;
			line-height: 28px;
			color: rgba(255, 255, 255, 0.98);
		}
	</style>
</head>

<body>
<main class="container">
	<div class="card">
		<div class="card-header">
			<img src="https://websites.am-static.com/assets/brands/logo/aftership_feed.svg" />
			<h2>Let’s get you started</h2>
			<p class="text-subdued">
				Automatically sync and manage all your product feeds to your TikTok
				Shop with just one click.
			</p>
		</div>
		<div class="card-body">
			<strong
			>After connect TikTok Shop to your WooCommerce store,<br />
				you can:</strong
			>
			<div class="enable-item">
				<img src="https://assets.am-static.com/accounts/landing_page/feed/d95800e5202f4edbff8d49ff1e73f52e" />
				<p class="text-subdued">
					Automatically sync product listing and inventory to your TikTok
					Shop
				</p>
			</div>
			<div class="enable-item">
				<img src="https://assets.am-static.com/accounts/landing_page/feed/188f109bea2b45f5e08b037a1369a84e" />
				<p class="text-subdued">
					Manage your orders purchased from TikTok Shop at WooCommerce admin
				</p>
			</div>
		</div>
		<a class="open-app-btn" href="https://accounts.aftership.com/oauth/woocommerce-automizely-feed?shop=<?php echo esc_url( get_home_url() ); ?>">
			<strong> Start Now </strong>
		</a>
	</div>
</main>
</body>
</html>
