fv-antispam
===========

Powerful and simple antispam plugin. Puts all the spambot comments directly into trash and let's other plugins (Akismet) deal with the rest.

## Testing

* Go to Settings -> FV Antispam

  1. Basic settings should be checked by default.

* Create post with enabled comments

  1. Make comment as non-logged in user

  2. Comment will be set as pending

  3. Make comment to hidden field

  4. Comment will be moved to trash

* Test "Protect the registration form" setting

  1 Enable wp-admin -> Settings -> General - > Membership	(Anyone can register)

  2. Logout & go to register page

  3. Disable javascript in your browser & reload page

  4. You should see the security question

  5. Adding wrong answer will result in error message