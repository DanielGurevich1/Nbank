<?php

class ClientController
{

    public function index()
    {
        $pageTitle = 'Hello Danny';
        // var_dump(Json::getDb());
        // die;
        $clients = Json::getDb()->read();
        require DIR . 'views/index.php';
    }
    public function new()
    {
        $pageTitle = 'Please, Fill in the fields to add a new account';
        require DIR . 'views/new.php';
    }
    public function store()
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $client = new Client;
        $client->id = $_POST['id'];
        $client->name = $_POST['name'];
        $client->surname = $_POST['surname'];

        $client->idn = $_POST['idn'];
        $client->balance = 0;
        $client->AC = ClientController::bankIban();


        $nameLength = strlen($_POST['name']);
        $surnameLength = strlen($_POST['surname']);

        // if (isset($_POST['name']) && isset($_POST['surname'])) {
        //     if ($nameLength < 3 || $surnameLength < 3) {

        //         echo    "Name or Surname are too short";
        //     } else {
        // echo 'sdfghjkfghdfghjsdfghjkdfghjksdfghjksdfghj';
        // die;
        Json::getDb()->createClient($client);
        header('Location: ' . URL);
        die;
    }
    // iskelta is Json
    public static function bankIban()
    {
        $lastfigures = rand(116688, 999688);
        $first = 'LT';
        $x = 7044060000;
        $accountNum =  "$first" . $x . $lastfigures;
        return $accountNum;
    }
}
        // }
    // }
// } 