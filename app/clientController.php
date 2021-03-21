<?php

class ClientController
{
    // public $client, ;

    public function index()
    {
        $pageTitle = 'Hello Danny';
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
        $client->topup = $_POST['topup'];
        $client->AC = ClientController::bankIban();


        Json::getDb()->store($client); //???
        header('Location: ' . URL);
        die;
    }

    public static function bankIban()
    {
        $lastfigures = rand(116688, 999688);
        $first = 'LT';
        $x = 7044060000;
        $accountNum =  $first . $x . $lastfigures;
        return $accountNum;
    }

    public function add(int $id)
    {

        $pageTitle = 'Add money - Fill in the fields to add a new account';
        $client = Json::getDb()->getClient($id);
        $client->balance += (int) ($_POST['topup'] ?? 0);

        Json::getDb()->update($client);
        _d($client);
        require DIR . 'views/add.php';
    }


    public function send(int $id)
    {
        $pageTitle = 'Send money - Fill in the fields to add a new account';

        $client = Json::getDb()->getClient($id);
        Json::getDb()->update($client);
        $client->balance -= (int) ($_POST['send'] ?? 0);
        _d($client);
        require DIR . 'views/add.php';
    }

    public function delete($id)
    {
        Json::getDb()->delete($id);

        header('Location: ' . URL);
        die;
    }
}