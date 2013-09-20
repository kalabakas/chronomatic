<?php
require 'vendor/autoload.php';

date_default_timezone_set('Europe/Athens');
// change the following paths if necessary
require_once dirname(__FILE__).'/lib/yii/framework/yii.php';

$base  = require_once dirname(__FILE__).'/protected/config/base.php';
$main  = require_once dirname(__FILE__).'/protected/config/main.php';

$config = CMap::mergeArray($base,$main);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

Yii::createWebApplication($config)->run();
