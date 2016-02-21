<?php

// Composer autoloader
if(is_file('vendor/autoload.php'))
    include 'vendor/autoload.php';

$f3 = require('lib/base.php'); // FatFree base file

$f3->mset(array(
    'BASE' => $f3->get("SCHEME") . "://" . $f3->get("HOST"),
    'microtime' => microtime(true),
    'site.url' => $f3->get("SCHEME") . "://" . $f3->get("HOST") . $f3->get("BASE") . "/"
));

// Base conf
$f3->config('app/config/config.ini');
$f3->config('app/config/routes.ini');

// Error handling
$f3->set('ONERROR',
    function(Base $f3) {

        switch($f3->get('ERROR.code')) {
            case 404:
                // Reroute to index
                $f3->reroute('/');
                return true;
                break;
            default:
                return false; // Standart Fat-Free error reporting
        }

    }
);

$f3->run();
