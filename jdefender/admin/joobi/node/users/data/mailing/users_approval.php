<?php defined('JOOBI_SECURE') or die('J....');
class Data_users_users_approval_mailing extends WDataMail{
var $namekey='users_approval';
var $rolid='#allusers';
var $html=2;
var $wid='#users.node';
var $alias='User registration admin approval email';
var $level='0';
var $tags='{widget:sitename}
{widget:param|name=approvalLink}
{widget:param|name=name}
{widget:param|name=username}
{widget:param|name=email}
{widget:param|name=language}
{widget:param|name=country}
{widget:param|name=timezone}';
var $template=3;
var $format='0';
var $notify=1;
var $name='1401855800NDHH';
var $ctext='';
var $chtml='1489793765SVMQ';
var $intro='';
var $smsmessage='';
var $title='';
var $subtitle='';}