<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'laragon' . DS . 'www' . DS . 'phpRestApi'); // localhost/laragon/www/phpRestApi
// laragon/www/restapi/includes
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes'); // localhost/laragon/www/phpRestApi/includes
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'core'); // localhost/laragon/www/phpRestApi/core

// load the config file first
require_once(INC_PATH . DS . 'config.php'); // localhost/laragon/www/phpRestApi/includes/config.php 

// core classes
require_once(CORE_PATH . DS . 'post.php'); // localhost/laragon/www/phpRestApi/core/post.php
require_once(CORE_PATH . DS . 'category.php'); // localhost/laragon/www/phpRestApi/core/category.php
