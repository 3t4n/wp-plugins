=== WP on AWS ===
Author: Seahorse
Contributors: wpseahorse, echomedia
Tags: migration, aws, migrate, website migration, migrate to aws
Requires at least: 4.8
Tested up to: 6.7.1
Requires PHP: 5.6
Stable tag: 5.2.2
License: GPLv2 or later

Easily migrate, transfer, clone, upgrade or backup a site to AWS in minutes. Trial now for FREE!

== Description ==
WP on AWS is not like any other migration tool out there. Introduced by AWS Technical Partners, Seahorse in 2021, this software is built for the non-technical user and allows you to migrate your WordPress website from any host to AWS easily and quickly with little to no cloud technical knowledge or experience.

What makes it different is that unlike other migration tools, WP on AWS is fully automated, so you can simply click through to complete the clone process ensuring  **zero downtime** on your source site.

Ready to test it out? It’s simple and best of all its FREE to trial:

**Trial User Guide** [Link to AWS Labs](https://www.seahorse-data.com/migrating-and-managing-a-wordpress-website-with-amazon-lightsail/) 

1. Install the WP on AWS plugin.
2. Complete steps 2-5 and receive an email with a link to your cloned site in the Seahorse/AWS sandbox environment

The WP on AWS build process uses the latest [Bitnami WordPress AMI](https://bitnami.com/stack/wordpress/cloud/aws/amis) release for AWS ensuring your destination server is using the latest recommended version of PHP and MYSQL/MariaDB.

Trial migrations remain active for a 6-hour period to allow users to review the cloned site in AWS. To complete a migration, clone or upgrade to a nominated AWS account users can purchase a premium licence.

**Core Features:**

* Works on any host or operating system including local environments
* Uses latest [Bitnami WordPress AMI](https://bitnami.com/stack/wordpress/cloud/aws/amis) recommended release
* Supports custom hooks, plugins, themes etc.
* Featured in AWS Lightsail Labs as a recognised migration tool for WordPress
* End-to-end trial support

**[Premium Features:](https://www.seahorse-data.com/pricing/)**

* All the core features above and…
* Migrate, clone or upgrade to a nominated AWS Account
* Select the [AWS Region](https://lightsail.aws.amazon.com/ls/docs/en_us/articles/understanding-regions-and-availability-zones-in-amazon-lightsail) where your new instance will be located
* Select the size of the new instance hosting your cloned site
* Easily clone development/staging instances
* Easily upgrade PHP and MYSQL/MariaDB
* Monitor your AWS Lightsail stack from within WordPress
* Monitor your AWS instance key performance indicators from within WordPress
* End-to-end self-managed support

Here are some more reasons to use WP on AWS ...

**Upgrading your instance (PHP & MYSQL/MariaDB):**

Whether you are currently using AWS or any other hosting provider for your WordPress site, you will be familiar with the alert that is now frequently posted highlighting the need to upgrade your version of PHP & MYSQL/MariaDB. 
WP Webmasters need not stress about this anymore! WP on AWS allows users to easily run a clone, debug any version compatibility issues and simply switch IPs to adopt the latest version with upgraded components.

**Control your development/staging instances:**

Why run over-provisioned development/staging environments? With WP on AWS you can easily spin multiple instances at much reduced sizes than the source site.
This allows you to control your usage costs but also allows for cost optimised performance management where development/staging instances are always ahead of production. This is also useful for cost-effective A-B testing etc.

= Contact us =
* [Free trial support](https://www.seahorse-data.com/wp-on-aws-support-portal/)
* [Report a bug](https://www.seahorse-data.com/contact/)
* [About us](https://www.seahorse-data.com/our-story/)

== Roadmap ==
* v.2.3.* v.2 Self-Managed Solution release: Nov 30, 2020 [Link to Self Managed Tutorial](https://www.seahorse-data.com/migrating-and-managing-wordpress-with-amazon-lightsail-self-manage/)

* v.3.2.* v.3 Self-Managed Solution release: Jun 02, 2022 [WCEU 22](https://europe.wordcamp.org/2022/)

* v.4.1.* v.4 Self-Managed Solution extended functionality release: Oct 14, 2022

* v.5.0.* v.5 Trials: allow trial migrations to run without a Seahorse licence: Nov 17, 2023

== Installation ==
1. WP on AWS can be installed directly through your WordPress
Plugin dashboard.
1. Click "Add New" and Search for "WP on AWS"
1. Install and Activate

Alternatively, you can:
1. Upload the entire 'wp-migrate-2-aws' folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==
1. Validate Your License
2. Prepare Database
3. Prepare File System
4. Clone to AWS
5. Congratulations! Instance Created
6. Management Console

== Changelog ==

= 5.2.2 =
* patch - #34 security update

= 5.2.1 =
* patch - tested with wordpress v6.7.1

= 5.2.0 =
* feature - #25 updated management console endpoint
* fix - #31 fixes to management console portal page

= 5.1.15 =
* feature - !23 Updated handling of source environment settings
* feature - #18 Improved UX after trial instance launch and expiration
* feature - #27 Updated listing of Wordpress themes
* feature - #20 Removed option for selecting existing storage bucket
* fix - #26 Updates to remote error logging
* fix - !21 PHP8 compatibility update

= 5.0.21 =
* feature - #21 Show server info on report section
* patch - tested with wordpress v6.4.3

= 5.0.1 =
* patch - #16 tested with wordpress v6.4.1

= 5.0.0 =
* fix - #13 updates to information links and link text
* fix - #12 updates to readme file
* feature - #7 allow trials to run without seahorse licence key

= 4.4.0 =
* fix - #10 updates to error handling
* feature - #9 automated AWS credentials step for trial users

= 4.3.2 =
* fix - #5 updated readme content

= 4.3.1 =
* fix - compatibility with WordPress 6.2.0

= 4.3.0 =
* feature - #74 updated default launch instance size
* feature - #58 updates to "create staging" functionality

= 4.2.0 =
* feature - #59 added user specific links to interface

= 4.1.1 =
* bugfix - #67 patched Coderatio library and improved db-prefix compatibility

= 4.1.0 =
* feature - #56 updated functionality to identify & isolate large database tables and uploads

= 4.0.0 =
* feature - #50 added new functionality to allow for instance size selection at launch
* feature - #54 added new functionality to support 'clone', 'staging', and 'upgrade'. Including new user interface, menus and navigation pages

= 3.2.1 =
* bugfix - #51 error handling on licence validation check

= 3.2.0 =
* fix - #39 updated error handling on remote API calls
* feature - #43 include global constants for URLs
* feature - #44 added "restart" button and relocated existing "reset all" button
* feature - #45 include option to run process over http

= 3.1.0 =
* feature - #32 updated launch-success view layout & contents
* bugfix - #35 switch-off multi-site support
* feature - #36 updated configuration for remote manage API
* fix - #37 removed check for amazon polly plugin conflict
* testing - #38 tested to WordPress version 5.9
* fix - #41 updates to text, image, and external links on launch screen

== Upgrade Notice ==

= 5.0 =
Upgrade to successfully run trial migrations without the need for a Seahorse licence key.  Existing licence keys for running trial migrations are deprecated and may not work.
Self managed migrations continue to require a Seahorse licence key.

== Frequently Asked Questions ==

= Do I need my own AWS Account? =

You do not need an AWS account to run a trial clone. A self-manage licence however requires an AWS account as this is where the instance will be built. Seahorse offers an account creation service for users if required.

= Where are Trial clones created? =

Trial instances are created in our Seahorse / AWS environment.

= Why is there no option to select another Region? =

Trials are restricted to the eu-west-1 (Ireland) region only. Users have the option to select any of the Lightsail regions however when using a production licence

= Does your software support multisite networks? =

No, the software does not currently allow migration or management of WordPress multisite. Multisite support is part of our development roadmap however and will be delivered at a date yet to be determined

= For how long are trial clones active? =

Trial instances are active for 6 hours after launch.

= Can I log into the Trial clone instance and make changes? =

No, the trial instance is for front-end review only and access to the WordPress admin of the site is restricted.

= What plan level is the Trial instance running on? =

Trial instances are launched on the $10 Lightsail plan. More information on plan types can be found here: [https://aws.amazon.com/lightsail/pricing/](https://aws.amazon.com/lightsail/pricing/). On production licences the initial migration is also launched on the $10 plan but users are free to scale up/down as they wish
