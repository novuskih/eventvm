<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	define('DOMAIN', 'http://eventvm.com');
	define('BASE_PATH', '/novuskih');
	define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].BASE_PATH);
	define('URL', DOMAIN.BASE_PATH);

	define('APP_PATH', ROOT_PATH.'/application');
	define('CTR_PATH', APP_PATH.'/controller');
	define('MDL_PATH', APP_PATH.'/application');
	define('VIW_PATH', ROOT_PATH.'/views');

	define('EXT_C', '.php');
	define('EXT_V', '.html');
	define('DFT_CTR', 'main');

	define('VIEW', "/_templates_default");