<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: #f9f9f9;">
    <div style="width: 100%; max-width: 600px; margin: 20px auto; background: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <div style="font-size: 20px; font-weight: bold; margin-bottom: 20px; color: #333;">
            Woocommerce Plugin Task: Apple Pay Registration
        </div>
        <div style="font-size: 14px; color: #555;">
            <p>
		Merchant <strong><?php echo $merchantName;?></strong> has requested Apple Pay registration for the domain 
		<strong><?php echo $domain;?></strong> for the Woocommerce plugin version 
		<strong><?php echo $pluginVer;?></strong>.
            </p>
            <div style="background-color: #f5f5f5; border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin: 20px 0;">
		<p><strong style="display: inline-block; width: 150px;">Merchant Name:</strong> <?php echo $merchantName;?></p>
                <p><strong style="display: inline-block; width: 150px;">Merchant Domain:</strong> <?php echo $domain;?></p>
                <p><strong style="display: inline-block; width: 150px;">Merchant Email:</strong> <?php echo $merchantEmail;?></p>
                <p><strong style="display: inline-block; width: 150px;">Site Admin Email:</strong> <?php echo $adminEmail;?></p>
                <p><strong style="display: inline-block; width: 150px;">Channel Credentials:</strong> <?php echo $entityId;?></p>
            </div>
            <p>
                <em>*Note:</em> Domain registration is performed on the Merchant Level. Channel is provided to speed up the search via the Bip.
            </p>
            <p>Steps to complete domain registration:</p>
            <ol>
                <li>Log in to the Live Bip.</li>
                <li>Locate Merchant - Either via the Entity Id or Merchant Name.</li>
                <li>Select merchant then navigate to: <strong>Administration → Mobile Payments</strong>.</li>
                <li>Select <strong>‘Apple Pay Web Merchant Registration’</strong> → <strong>‘Check Registration Status’</strong>.</li>
                <li>Input merchant domain → Select <strong>Register</strong>.</li>
                <li>Once registered, navigate back to this email and click the button below to update the site's registration status. The merchant will then be able to set Apple Pay to Live.</li>
            </ol>
	    <a href="<?php echo $domainRegStatusLink;?>" target="_blank" style="display: inline-block; background-color: #0073e6; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px;">Registration Complete</a>
        </div>
    </div>
</body>
</html>
