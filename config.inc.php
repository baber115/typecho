<?php
define('__TYPECHO_DEBUG__', true);
// site root path
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

// plugin directory (relative path)
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

// theme directory (relative path)
define('__TYPECHO_THEME_DIR__', '/usr/themes');

// admin directory (relative path)
define('__TYPECHO_ADMIN_DIR__', '/admin/');

// register autoload
require_once __TYPECHO_ROOT_DIR__ . '/var/Typecho/Common.php';

// init
\Typecho\Common::init();

// config db
$db = new \Typecho\Db('Pdo_Mysql', 'typecho_');
$db->addServer(array (
  'host' => 'rm-bp131xo6uog0hj833wo.mysql.rds.aliyuncs.com',
  'port' => 3306,
  'user' => 'baber',
  'password' => '_pPfvT5eRQuum&L',
  'charset' => 'utf8mb4',
  'database' => 'typecho',
  'engine' => 'InnoDB',
), \Typecho\Db::READ | \Typecho\Db::WRITE);
\Typecho\Db::set($db);