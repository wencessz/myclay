<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'root',
	"password" => '',
	"database" => 'clay2',
	"path" => '',
);
Security::setDefaultAdmin('admin','admin');
LeftAndMain::set_application_link("/clay");
Member::add_extension('MemberExtension');
// Set the site locale
i18n::set_locale('en_US');