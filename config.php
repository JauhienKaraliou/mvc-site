<?php

define('DEFAULT_CONTROLLER','Guestbook');
define('DEFAULT_ACTION','default');
define('DS',DIRECTORY_SEPARATOR);
define('CLS_DIR', 'inc');
define('DB_HOST','localhost');
define('DB_NAME','forum');
define('DB_USER','root');
define('DB_PASSWORD','1276547');
define('DB_DSN','mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8');
define('DB_prefix','st1_');
define('BASE_URL',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));

include 'inc/utils/PHPMailer-master/PHPMailerAutoload.php';

function autoload($classname) {
    $clsFile = __DIR__.DS.CLS_DIR.DS.$classname.'.php';
    $clsFileAnother = __DIR__.DS.CLS_DIR.DS.'utils'.DS.$classname.'.php';
    if(file_exists($clsFile)) {
        require_once $clsFile;
        return true;
    } elseif (file_exists($clsFileAnother)) {
        require_once $clsFileAnother;
        return true;
    }
    return false;
}
spl_autoload_register('autoload');