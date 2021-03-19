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
} elseif ('add' == $uri[0]) {

    (new ClientController)->add((int)$uri[1]);
} elseif ('send' == $uri[0]) {

    (new ClientController)->send();
} elseif ('delete' == $uri[0]) {

    (new ClientController)->delete((int)$uri[1]);
}

// str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']) 