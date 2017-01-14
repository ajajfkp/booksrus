<?php

/* User defined constants to be used in application

*	It will autometically get the all path relative to root folder of webserver.
*	Written By	:- Aijaz Ahmad
*	DATE		:- 04/01/201&
*/

/************************************************************/
/*************************production*************************/
/************************************************************/
/*							    							*/
/************************************************************/
/********************|Database Configuration|****************/
/************************************************************/
/*
define("CH_DB_HOST", "localhost");
define("CH_DB_USER", "x8u1f4p4_aijaz");
define("CH_DB_PASSWORD", "!@#dev@db");
define("CH_DB_NAME", "x8u1f4p4_local");

define('BASE_URL', 'http://collegebooksrus.com/mybooksrus/');

*/
/************************************************************/
/*********************|Email Configuration|******************/
/************************************************************/
/*
define("PROTOCOL", "SMTP");
define("SMTP_HOST", "cloud1022.hostgator.com");
define("SMTP_PORT", "465");
define("SMTP_USER", "help@collegebooksrus.com");
define("SMTP_PASS", "!@#dev@email");
define("MAILTYPE", "HTML");
define("CHARSET", "iso-8859-1");
define("WORDWRAP", "TRUE");
define("EMAIL_FROM", "admin@collegebooksrus.com");
define("EMAIL_FROM_NAME", "Admin Tean");
define("EMAIL_VARIFY_URL", "http://collegebooksrus.com/mybooksrus/verifyaccount/");
 */

/************************************************************/
/*************************   LOCAL  *************************/
/************************************************************/
/*															*/
/************************************************************/
/********************|Database Configuration|****************/
/************************************************************/

	define("CH_DB_HOST", "localhost");
	define("CH_DB_USER", "root");
	define("CH_DB_PASSWORD", "");
	define("CH_DB_NAME", "booksrus");
	define('BASE_URL', 'http://localhost/booksrus/mybooksrus/');
/************************************************************/
/*********************|Email Configuration|******************/
/************************************************************/

	define("PROTOCOL", "SMTP");
	define("SMTP_HOST", "smtp.gmail.com");
	define("SMTP_PORT", "465");
	define("SMTP_USER", "aijaz.fkp@gmail.com");
	define("SMTP_PASS", "!@#romio_75");
	define("MAILTYPE", "HTML");
	define("CHARSET", "iso-8859-1");
	define("WORDWRAP", "TRUE");
	define("EMAIL_FROM", "admin@yourdomain.com");
	define("EMAIL_FROM_NAME", "Admin Tean");
	define("EMAIL_VARIFY_URL", "http://localhost/booksrus/mybooksrus/verifyaccount/");



/************************************************************/
/*********************|Common Configuration|*****************/
/************************************************************/

define("CH_DB_PORT", "3306");
define("CH_SITE_KEY", "_dev");
/*define("CH_DB_UPDATE", "1");*/












