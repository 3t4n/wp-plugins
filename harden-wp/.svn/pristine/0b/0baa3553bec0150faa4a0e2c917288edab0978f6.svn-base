<?php
/**
 * Bot rewrite rules
 *
 * @author Justin Greer
 */

class harden_botList {

	/**
	 * Contets to be written to the .htaccess File to prevent bots from attacking the site
	 */
	static $botList = '
	
# Harden WP Rewrite Rules For Bad Bots
RewriteEngine on
RewriteCond %{HTTP_USER_AGENT} ^attach [OR] 
RewriteCond %{HTTP_USER_AGENT} ^BackWeb [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Bandit [OR] 
RewriteCond %{HTTP_USER_AGENT} ^BatchFTP [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Bot\ mailto:craftbot@yahoo.com [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Buddy [OR] 
RewriteCond %{HTTP_USER_AGENT} ^ChinaClaw [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Collector [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Copier [OR] 
RewriteCond %{HTTP_USER_AGENT} ^DA [OR] 
RewriteCond %{HTTP_USER_AGENT} ^DISCo\ Pump [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Download\ Demon [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Download\ Wonder [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Downloader [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Drip [OR] 
RewriteCond %{HTTP_USER_AGENT} ^eCatch [OR] 
RewriteCond %{HTTP_USER_AGENT} ^EirGrabber [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Express\ WebPictures [OR] 
RewriteCond %{HTTP_USER_AGENT} ^ExtractorPro [OR] 
RewriteCond %{HTTP_USER_AGENT} ^EyeNetIE [OR] 
RewriteCond %{HTTP_USER_AGENT} ^FileHound [OR] 
RewriteCond %{HTTP_USER_AGENT} ^FlashGet [OR] 
RewriteCond %{HTTP_USER_AGENT} ^GetRight [OR] 
RewriteCond %{HTTP_USER_AGENT} ^GetSmart [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Go!Zilla [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Go-Ahead-Got-It [OR] 
RewriteCond %{HTTP_USER_AGENT} ^gotit [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Grabber [OR] 
RewriteCond %{HTTP_USER_AGENT} ^GrabNet [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Grafula [OR] 
RewriteCond %{HTTP_USER_AGENT} ^HMView [OR] 
RewriteCond %{HTTP_USER_AGENT} ^HTTrack [OR] 
RewriteCond %{HTTP_USER_AGENT} ^InterGET [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Internet\ Ninja [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Iria [OR] 
RewriteCond %{HTTP_USER_AGENT} ^JetCar [OR] 
RewriteCond %{HTTP_USER_AGENT} ^JOC [OR] 
RewriteCond %{HTTP_USER_AGENT} ^JustView [OR] 
RewriteCond %{HTTP_USER_AGENT} ^larbin [OR] 
RewriteCond %{HTTP_USER_AGENT} ^LeechFTP [OR] 
RewriteCond %{HTTP_USER_AGENT} ^lftp [OR] 
RewriteCond %{HTTP_USER_AGENT} ^likse [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Magnet [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Mag-Net [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Mass\ Downloader [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Memo [OR] 
RewriteCond %{HTTP_USER_AGENT} ^MIDown\ tool [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Mirror [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Mister\ PiX [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Navroad [OR] 
RewriteCond %{HTTP_USER_AGENT} ^NearSite [OR] 
RewriteCond %{HTTP_USER_AGENT} ^NetAnts [OR] 
RewriteCond %{HTTP_USER_AGENT} ^NetSpider [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Net\ Vampire [OR] 
RewriteCond %{HTTP_USER_AGENT} ^NetZip [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Ninja [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Octopus [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Offline\ Explorer [OR] 
RewriteCond %{HTTP_USER_AGENT} ^PageGrabber [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Papa\ Foto [OR] 
RewriteCond %{HTTP_USER_AGENT} ^pcBrowser [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Pockey [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Pump [OR] 
RewriteCond %{HTTP_USER_AGENT} ^RealDownload [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Reaper [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Recorder [OR] 
RewriteCond %{HTTP_USER_AGENT} ^ReGet [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Siphon [OR] 
RewriteCond %{HTTP_USER_AGENT} ^SiteSnagger [OR] 
RewriteCond %{HTTP_USER_AGENT} ^SmartDownload [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Snake [OR] 
RewriteCond %{HTTP_USER_AGENT} ^SpaceBison [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Stripper [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Sucker [OR] 
RewriteCond %{HTTP_USER_AGENT} ^SuperBot [OR] 
RewriteCond %{HTTP_USER_AGENT} ^SuperHTTP [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Surfbot [OR] 
RewriteCond %{HTTP_USER_AGENT} ^tAkeOut [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Teleport\ Pro [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Vacuum [OR] 
RewriteCond %{HTTP_USER_AGENT} ^VoidEYE [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Web\ Image\ Collector [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Web\ Sucker [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebAuto [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebCopier [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebFetch [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebReaper [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebSauger [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Website [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Webster [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebStripper [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebWhacker [OR] 
RewriteCond %{HTTP_USER_AGENT} ^WebZIP [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Wget [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Whacker [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Widow [OR] 
RewriteCond %{HTTP_USER_AGENT} ^Xaldon 
RewriteRule ^.* - [F,L]

';

	/**
	 * Enables the Bot List to be add to the .htaccess file
	 *
	 * @return Boolean True if the the content was written to the
	 */
	public function output() {
		return self::$botList;
	}

}
?>