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



        $nameLength = strlen($_POST['name']);
        $surnameLength = strlen($_POST['surname']);

        // if (isset($_POST['name']) && isset($_POST['surname'])) {
        //     if ($nameLength < 3 || $surnameLength < 3) {

        //         echo    "Name or Surname are too short";
        //     } else {
        // echo 'sdfghjkfghdfghjsdfghjkdfghjksdfghjksdfghj';
        // die;
        Json::getDb()->createClient($client); //???
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
    public function addMoney($id)

    {
        $client = Json::getDb()->getClient($id);
        $pageTitle = 'Edit Account: ' . $client->id;
        require DIR . 'views/edit.php';
        foreach ($this->data as $key => $client) {
            if ($client['id'] == $id) {
                $client = ['id' => $id];
                $this->data[$key] = $client;
                $client['balance'] += $count;
                if ($client['balance'] > 0) {
                    $_SESSION['messages']['success'][] = "Amount was added!";
                    header('Location:' . URL);
                } else {
                    $_SESSION['messages']['error'][] = "Account cannot be overdrafted";
                    header('Location:' . URL . 'add');
                }
                return;
            }
        }
    }
    // {
    //     // $clients =  read();
    //     $client = $this->getClient($id); // check if client is set
    //     if (!$client) {
    //         return;
    //     }
    //     if ($client->id = $id) {
    //     }
    //     foreach ($this->data as $key => $client) {
    //         if ($client['id'] == $id) {
    //             $client = ['id' => $id];
    //             $this->data[$key] = $client;
    //             $client['balance'] += $count;
    //             if ($client['balance'] > 0) {
    //                 $_SESSION['messages']['success'][] = "Amount was added!";
    //                 header('Location:' . URL);
    //             } else {
    //                 $_SESSION['messages']['error'][] = "Account cannot be overdrafted";
    //                 header('Location:' . URL . 'add');
    //             }
    //             return;
    //         }
    //     }
    // }
}