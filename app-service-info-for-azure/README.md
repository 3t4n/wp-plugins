# app-service-info-for-azure
 WordPress plugin that adds a Microsoft Azure App Service deployment identifier to the footer of the admin section.

## Description

Microsoft's Azure App Service offers terrific tools to automatically deploy your application from your version control system to one or more App Service slots (such as staging, production, etc). 

This runs so transparently that sometimes it's difficult to know which version of your site you're working on. This plugin retrieves information about the current App Service deployment and adds that information to the admin page footer.

When you enable this plugin, you'll see the following information in your WordPress admin footer:

* The date the running deployment completed
* The deployment ID
* The author of the version control change
* The commit message from version control

If you are not running in an Azure App Service environment, the plugin will display a warning message. I only tested this plugin on my Azure environment, so it's likely that different environments or configurations will result in weird errors. If that's the case, please reach out and I'll do what I can to update the plugin. Or send me a pull request! 
