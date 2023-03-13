<?php
//Database params
define('DB_HOST', 'db');
define('DB_USER', 'abd');
define('DB_PASS', 'pwd');
define('DB_NAME', 'image-service');
define('DB_PORT', '3306');

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT (Dynamic links)
define('URLROOT', 'http://localhost');

//Application path for images
define('APP', 'http://localhost/app');

//Sitename
define('SITENAME', 'anwalt.de Image Service');

define('IMAGEPATH', APPROOT . '/image-files/');