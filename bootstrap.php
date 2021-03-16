<?php
session_start();

define('URL', 'http://localhost:8898/Nbank/'); // define URL
define('INSTALL_DIR', '/Nbank/');
define('DIR', __DIR__ . '/'); // define server path
// require DIR . 'functions.php';

require DIR . 'app/clientController.php'; // controller replaces functions
require DIR . 'app/Json.php';
require DIR . 'app/Client.php';


if (!isset($_SESSION['messages'])) {
    $_SESSION['messages']['success'] = [];
    $_SESSION['messages']['error'] = [];
    $_SESSION['messages']['warning'] = [];
}

foreach ($_SESSION['messages']['success'] as $message) {
    echo "<h3 style='color:green; margin-left: 150px';>$message</h3>";
}
$_SESSION['messages']['success'] = [];


foreach ($_SESSION['messages']['error'] as $message) {
    echo "<h3 style='color:red; margin-left: 150px';>$message</h2>";
}
$_SESSION['messages']['error'] = [];

foreach ($_SESSION['messages']['warning'] as $message) {
    echo "<h3 style='color:orange; margin-left: 150px';>$message</h2>";
}
$_SESSION['messages']['warning'] = [];
// _d($_SESSION);