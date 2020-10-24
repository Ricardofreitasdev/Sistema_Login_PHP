<?php

session_start();

require_once 'lib/Db/Database/Connection.php';
require_once 'app/core/Core.php';
require_once 'app/controller/LoginController.php';
require_once 'app/controller/DashboardController.php';
require_once 'vendor/autoload.php';
require_once 'app/model/User.php';

$core = new Core;
echo $core->start($_GET);