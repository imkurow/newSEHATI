<?php

$publicPath = getcwd();
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri === '/') {
    header('Location: /login');
    exit;
}
require_once $publicPath.'/index.php';
