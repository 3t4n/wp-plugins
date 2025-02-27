wp-mail-smtp-sendgrid-edition
======================

This plugin reconfigures the wp_mail() function to use SMTP instead of mail() and creates an options page that allows you to specify various options.

## Testing

* Go to Setting -> Email

  1. Setting "Send all WordPress emails via SMTP." should be checked.

  2. Fill in the SMTP Host, SMTP Port, Encryption, Authentication, Username and Password.

  3. Click "Save Changes" button.

  4. Send a test email to your email address.

  5. Check your email inbox and verify mail headers.