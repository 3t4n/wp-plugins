=== Azure App Insights plugin ===
Contributors: vsacja, ApplicationInsights, bluefireray 
Tags: Application Insights, Microsoft Azure, Appinsights,Windows Azure
Requires at least: 4.0
Tested up to: 4.4.1
Stable tag: 1.0
License: GPL2
Version: 1.1

Azure App Insights plugin gives you the ability to view your Application Insights data in your WordPress dashboard.

== Description ==

Azure App Insights plugin gives you the ability to view your Application Insights data in your WordPress dashboard.

== Installation ==

= Step 1: Install =

1. Extract the plugin.zip to the plugins directory of the WordPress installation. 
e.g. if WordPress is installed in "C:\inetpub\wwwroot\wordpress" directory, extract the plugin.zip file into directory "C:\inetpub\wwwroot\wordpress\wp-content\plugins".

2. To activate the plugin, log in into the WordPress as administrator and navigate to list of plugins. Then check the associated checkbox for the plugin and click on "Activate" link.

= Step 2: Register an Azure Active Directory application =

For these steps, you must have an Azure subscription with access to the Azure Active Directory tenant.

1. Sign in to the Azure portal, and navigate to the ACTIVE DIRECTORY section. Choose the directory (tenant) that you would like to use. This should be the active directory which is linked to your Azure subscription.

2. Under the APPLICATIONS tab, click ADD to register a new application. Choose 'Add an application my organization is developing', and a recognizable name. Select the application type as "Native client application".

3. Enter a value for Redirect URI with the format http://<your blog url>/wp-admin/options-general.php
e.g. http://localhost/wordpress/wp-admin/options-general.php

4. On the configuration page , scroll to the bottom and under permission to other applications set the following permissions 

	Windows Azure Active Directory          Delegated Permissions:1
 	Microsoft Azure Data Catalog            Delegated Permissions:1
 	Windows Azure Service Management API    Delegated Permissions:1

5. Get the Client ID from the Dashboard. 


= Step 3: Create an Application Insights on Azure Portal. =

1. Sign in to the Azure portal, and navigate to the APPLICATION INSIGHTS section.

2. Create new one. 

3. Get the Instrumentation Key from the Dashboard.

= Step 4: Configure the plugin =

1. The plugin can be configured in Settings > Application Insights Dashboard.

2. Enter the Tenant ID and Client ID and click "Authorize Plugin" button. You can find these values under the CONFIGURE tab of your Azure Active Directory application in the Microsoft Azure portal.

3. Login in using your Microsoft Azure credentials.

4. Enter you Instrumentation Key you received from http://portal.azure.com

= Configure Tips =

To get tenant ID

1. Use the Add-AzureAccount cmdlet to add your Windows Azure account to Windows PowerShell:[ You will see a login form and enter you microsft corp account login info ]
   PS C:\> Add-AzureAccount 
2. Then use Get-AzureAccount to get the tenant ID:
   PS C:\>(Get-AzureAccount).ActiveDirectories.ActiveDirectoryTenantID



== Changelog ==

= 1.1 =
	* Updating the latest PHP SDK.
= 1.0 = 
	* Initial Version
	* Merge Application Insights plugin and Application Insights Dashboard Beta plugin into this plugin. 
