<?php

require '../src/vendor/autoload.php';

spl_autoload_register(function ($classname) {
    require ("../src/classes/" . $classname . ".php");
});

$settings = require __DIR__ . '/../src/settings.php';

$app = new \Slim\App(["settings" => $settings]);

require __DIR__ . '/../src/dependencies.php';

require __DIR__ . '/../src/routes.php';

$app->run();

