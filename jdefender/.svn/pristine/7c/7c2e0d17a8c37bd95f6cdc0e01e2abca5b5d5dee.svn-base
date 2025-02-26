SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
INSERT INTO `#__role_node` (`rolid`,`parent`,`lft`,`rgt`,`core`,`joomla`,`j16`,`namekey`,`color`,`type`,`depth`) VALUES(1,0,1,78,1,28,1,'allusers','blue',1,0),(2,1,2,77,1,29,1,'visitor','aqua',1,1),(3,2,3,74,1,18,2,'registered','navy',1,2),(4,3,4,15,1,19,3,'author','teal',1,3),(5,4,5,14,1,20,4,'editor','silver',1,4),(6,5,6,13,1,21,5,'publisher','maroon',1,5),(7,6,7,12,1,23,6,'manager','orange',1,6),(8,7,8,11,1,24,7,'admin','fuchsia',1,7),(9,8,9,10,1,25,8,'sadmin','red',1,8),(10,2,75,76,1,0,0,'customer','green',1,2),(11,3,16,21,1,0,0,'supplier','olive',1,3),(12,11,17,20,1,0,0,'vendor','purple',1,4),(13,12,18,19,1,0,0,'storemanager','red',1,5),(14,3,22,25,1,0,0,'affiliate','teal',1,3),(15,14,23,24,1,0,0,'reseller','black',1,4),(16,3,26,31,1,0,0,'sales_support','black',1,3),(17,16,27,30,1,0,0,'sales_agent','purple',1,4),(18,17,28,29,1,0,0,'sales_manager','red',1,5),(19,3,32,37,1,0,0,'supportagent','teal',1,3),(20,19,33,36,1,0,0,'supportmoderator','black',1,4),(21,20,34,35,1,0,0,'supportmanager','orange',1,5),(22,3,38,39,1,0,0,'listmanager','black',1,3),(23,3,40,47,1,0,0,'mailauthor','teal',1,3),(24,23,41,46,1,0,0,'maileditor','silver',1,4),(25,24,42,45,1,0,0,'mailpublisher','maroon',1,5),(26,25,43,44,1,0,0,'mailmanager','orange',1,6),(27,3,48,55,1,0,0,'groupmoderator','teal',1,3),(28,27,49,54,1,0,0,'groupmanager','maroon',1,4),(29,28,50,53,1,0,0,'communitymoderator','orange',1,5),(30,29,51,52,1,0,0,'communitymanager','red',1,6),(31,3,56,61,1,0,0,'project_member','purple',1,3),(32,31,57,60,1,0,0,'project_manager','orange',1,4),(33,32,58,59,1,0,0,'project_admin','red',1,5),(34,3,62,67,1,0,0,'articleauthor','teal',1,3),(35,34,63,66,1,0,0,'articleeditor','silver',1,4),(36,35,64,65,1,0,0,'articlepublisher','maroon',1,5),(37,3,68,73,1,0,0,'developer','purple',1,3),(38,37,69,72,1,0,0,'developer_manager','orange',1,4),(39,38,70,71,1,0,0,'developer_architec','red',1,5);REPLACE INTO `#__role_trans` (`rolid`,`lgid`,`name`,`description`,`auto`,`fromlgid`) VALUES(1,1,'All Users','This is the default role any visitor has.',1,0),(2,1,'Visitor','This is the default role any visitor has.',1,0),(3,1,'Registered','Any user allowed to log in on the front-end of the website.',1,0),(4,1,'Author','This role allows the user to create and modify articles.',1,0),(5,1,'Editor','This role allows the user to edit articles.',1,0),(6,1,'Publisher','This role allows the user to publish articles.',1,0),(7,1,'Manager','This role allows the user to log in on the back-end of the website. Managers can edit any menu or article.',1,0),(8,1,'Administrator','This role allows the administration of menus,articles and applications.',1,0),(9,1,'Super Administrator','This role allows access to all functions on the website,including configuration and maintenance.',1,0),(10,1,'Customer','Any one who purchase a product in the store.',1,0),(11,1,'Supplier','Manufacturer or any organization that provides goods and services.',1,0),(12,1,'Vendor','This role allows the user to be a vendor.',1,0),(13,1,'Store Manager','This role allows to manage the store.',1,0),(14,1,'Affiliate','Any person who register to be an affiliate.',1,0),(15,1,'Reseller','Any person who has signed up to be a reseller.',1,0),(16,1,'Sales Support','This role allows to access customer profile and organization profile.',1,0),(17,1,'Sales Agent','This role allows to access all information about contacts and organization.',1,0),(18,1,'Sales Manager','This role allows to manager all sales agents. Provide access to all information and access to specific settings for contacts and organization.',1,0),(19,1,'Support Agent','Agent responsible to communicate with the customers.',1,0),(20,1,'Moderator','Any person allowed to moderate the forum.',1,0),(21,1,'Support Manager','Agents\' manager. This role enables to create agent,and define their project and access rights.',1,0),(22,1,'List Manager','Allow to manage the list of members.',1,0),(23,1,'Mail Author','This role allows the user to create mails.',1,0),(24,1,'Mail Editor','This role allows the user to edit mails.',1,0),(25,1,'Mail Publisher','This role allows the user to publish mails.',1,0),(26,1,'Mail Manager','With this role user can manager the mail application and preferences',1,0),(27,1,'Group Moderator','Group moderator is allowed to moderate any group she is assigned to.',1,0),(28,1,'Group Manager','Creator of a group,can administrate the group.',1,0),(29,1,'Community Moderator','Can moderate any group part of the community.',1,0),(30,1,'Community Manager','Administrate the community. This role is required to install and setup the community.',1,0),(31,1,'Team Member','Anyone who can be added on a project to create and execute tasks.',1,0),(32,1,'Project Manager','Project manager are able to create and manage projects. They can recruit project members to be part of their project.',1,0),(33,1,'Project Administrator','Person who define general preferences and different project types.',1,0),(34,1,'Article Author','This role allows to create article,blog,or wiki pages.',1,0),(35,1,'Article Editor','This role allows to edit article,blog,or wiki pages.',1,0),(36,1,'Article Publisher','This role allows to publish article,blog,or wiki pages.',1,0),(37,1,'Developer','Any one who develop and customize Apps.',1,0),(38,1,'Developer Manager','The manager of the developers. Has access to create new apps and invite developers.',1,0),(39,1,'Architect','Direct and inspire all developers\' managers.',1,0);

































UPDATE `#__theme_node` SET `premium` = '1' WHERE `namekey` ='joomla30.admin.theme';
UPDATE `#__theme_node` SET `premium` = '1' WHERE `namekey` ='wp40.admin.theme';
UPDATE `#__language_node` SET  `publish` =  1 WHERE `code` = 'en';