=== Asynchronous Emails ===
Contributors: endisha
Tags: async, emails, async-emails, mails, scheduling
Requires at least: 5.7
Tested up to: 6.1
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This WordPress plugin allows you to send emails asynchronously using cron jobs, instead of the default way of sending emails immediately upon sending. This can help improve the performance of your website and prevent delays caused by email sending.

== Description ==

Asynchronous Emails is a powerful WordPress plugin that enables you to send emails asynchronously using cron jobs, providing an efficient and optimized way to send emails on your website. By scheduling emails to be sent using cron jobs instead of sending them immediately, you can reduce server load and ensure that emails are sent in a timely and efficient manner, especially when sending bulk emails. This helps prevent delays and performance issues, leading to an overall improvement in website performance.

= Features =

* Email log: The plugin provides a log of all processed emails, making it easy to keep track of sent emails and troubleshoot any issues.
* Resend cancelled emails: If an email is cancelled or fails to send, this plugin provides an option to easily resend the email.
* Failed attempts: The plugin allows you to configure the number of attempts to send an email, which helps ensure that important emails are successfully delivered.
* Automatic record cleanup: The plugin offers the option to remove old records automatically after a certain time period or interval, ensuring that your email log stays up to date and doesn't become cluttered with outdated information.

= Requirements =

* WordPress 6.0 or newer.
* PHP version 7.4 or newer. PHP 8 or newer is recommended.

= Configuring Cron Jobs =

To use this plugin and send emails asynchronously, you'll need to configure a cron job on your web server. A cron job is a scheduled task that automatically runs at specified intervals. Here's how you can set up a cron job:

- Log in to your web server control panel, such as cPanel or Plesk.

- Find the option to manage cron jobs and select it.

- In the "Add New Cron Job" section, specify the frequency at which you want the cron job to run, for example, every hour or every day.

- In the "Command" field, enter the following command:

    `wget -q -O - https://[DOMAIN]/wp-cron.php?doing_wp_cron`

    Make sure to replace [DOMAIN] with the URL of your WordPress website.

- Save the cron job.

- Add the following code to your wp-config.php file:

    `define('DISABLE_WP_CRON', true);`

Once the cron job is set up, the plugin will use it to send emails asynchronously.

= Suggestions/Feature Request = 

We value your feedback and ideas. If you have suggestions or feature requests, please feel free to get in touch with us.

== Installation ==


= Minimum Requirements =

* PHP 7.4 or greater is recommended
* MySQL 5.6 or greater is recommended

= Automatic installation =

Automatic installation is the easiest option -- WordPress will handles the file transfer, and you won’t need to leave your web browser. To do an automatic install of Asynchronous Emails, log in to your WordPress dashboard, navigate to the Plugins menu, and click “Add New.”
 
In the search field type “Asynchronous Emails,” then click “Search Plugins.” Once you’ve found us,  you can view details about it such as the point release, rating, and description. Most importantly of course, you can install it by! Click “Install Now,” and WordPress will take it from there.

= Manual installation =

Manual installation method requires downloading the Asynchronous Emails plugin and uploading it to your web server via your favorite FTP application. The WordPress codex contains [instructions on how to do this here](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation).


== Screenshots ==

1. Queue list
2. Settings