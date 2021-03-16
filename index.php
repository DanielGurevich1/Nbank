<?php
require __DIR__ . '/bootstrap.php';

// echo 'door'; 

// decode the request line
$uri = explode('/', str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']));

_d($uri);

// routing

if ('' == $uri[0]) {
    (new ClientController)->index();
} elseif ('new' == $uri[0]) {
    (new ClientController)->new();
} elseif ('store' == $uri[0]) {
    (new ClientController)->store();
}

// str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']) 