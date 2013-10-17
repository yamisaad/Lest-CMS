<?php

/* * **
 * Lest'CMS par yamisaaf merci de respecter le copyright
 */
session_start();
define('START_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', __DIR__ . DS . 'Core' . DS);
define('EXT', '.php');
define('BASE', __DIR__ . DS);
define('CONTROLLER', BASE . 'app' . DS . 'Controllers' . DS);
define('MODEL', BASE . 'app' . DS . 'Models' . DS);
define('VIEW', BASE . 'app' . DS . 'Views' . DS);
define('HELPER', BASE . 'Core' . DS . 'Helper' . DS);
define('LIBRARY', BASE . 'library' . DS);
define('LAYOUT', BASE . 'app' . DS . 'Layout' . DS);
define('DEBUG', FALSE);
require CORE . 'Session' . EXT;

try {
    require CORE . 'Core' . EXT;
    $core = new Core\Core();
    $core->run();
//Session::Start();
    if (DEBUG) {
        Core\Core::debug($core->_loader->_class);
    }
} catch (Exception $e) {

    exit("probleme generer :  " . $e->getMessage());
}

echo "<br/>";
$temps = function() {
//echo 'Page generee en ' . round(microtime(true) - START_TIME, 5) . ' secondes';
        };
$temps();
if (DEBUG) {
    echo "<pre>";
    print_r(get_included_files());
    echo "</pre>";
}


