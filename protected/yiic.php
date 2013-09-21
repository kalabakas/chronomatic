<?php

// change the following paths if necessary
$base  = require_once dirname(__FILE__).'/config/console.php';
$main  = require_once dirname(__FILE__).'/config/main.php';

$config = array_merge_recursive($base,$main);

$yiic=dirname(__FILE__).'/../lib/yii/framework/yiic.php';
//$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);
