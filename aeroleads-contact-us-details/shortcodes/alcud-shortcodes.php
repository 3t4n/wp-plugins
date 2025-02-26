<!-- HTML markup to be returned as a replacement to shortcode -->

<header>
	<i></i>
	<?php if(trim($title)){ ?>
	<span><?php echo $title ?></span>
	<?php } else {?>
	<span>Contact Us</span>
	<?php } ?>
</header>
<div class="alcud-row">
	<div class="col-lg-6 alcud-business">
		<?php if(trim($business_name)!=""){ ?>
		<div class="business_name"><?php echo $business_name; ?></div>
		<?php } 
		else { ?>
		<div class="alcud-icon-holder">
			<i class="md md-work"></i>
		</div>
		<?php } ?>
		<?php if(trim($address)!=""){ ?>
		<div class="address"><i class="md md-location-on"></i><?php echo $address; ?></div>
		<?php } ?>
	</div>
	<div class="col-lg-6 alcud-details">
		<div>
			<?php if(trim($contact_person)!=""){ ?>
			<div class="detail_row">
				<i class="md md-person"></i>
				<span><?php echo $contact_person; ?></span>
			</div>
			<?php } ?>
			<?php if(trim($email_address)!=""){ ?>
			<div class="detail_row">
				<i class="md md-mail"></i>
				<?php if(strlen($email_address) > 35) {?>
				<span><a href="mailto:<?php echo $email_address; ?>">Email Us</a></span>
				<?php } else { ?>
				<span><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></span>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if(trim($contact_number)!=""){ ?>
			<div class="detail_row">
				<i class="md md-phone"></i>
				<span><a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a></span>
			</div>
			<?php } ?>
			<?php if(trim($open_hours)!=""){ ?>
			<div class="detail_row">
				<i class="md md-access-time"></i>
				<span><?php echo $open_hours; ?></span>
			</div>
			<?php } ?>
			<?php if(trim($note)!=""){ ?>
			<div class="detail_row">
				<i class="md md-event-note"></i>
				<span class="address"><?php echo $note; ?></span>
			</div>
			<?php } ?>
		</div>
	</div>
</div>