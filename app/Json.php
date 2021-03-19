<?php
class Json
{

    private static $jsonObject;

    private $data;

    public static function getDb()
    {
        return self::$jsonObject ?? self::$jsonObject = new self;
    }
    // __construct is implements when object is created
    public function __construct()
    {
        if (!file_exists(DIR . 'data/client.json')) { // pirmas kartas
            $data = json_encode([]); // encoded empty array, objects will be inside it
            file_put_contents(DIR . 'data/client.json', $data);
        }
        $data = file_get_contents(DIR . 'data/client.json');
        $this->data = json_decode($data); // writes (into this) data array $data
    }

    // __destruct is implements when object is unset
    public function __destruct()
    {
        // before unset data should be put to json file, to store it
        file_put_contents(DIR . 'data/client.json', json_encode($this->data));
    }

    public function store(Client $client): void
    {

        $id = $this->getNextId();
        $client->id = $id;
        $this->data[] = $client;
    }
    public function read(): array
    {
        return $this->data;
    }

    public function write(array $data): void
    {
        $this->data = $data;
    }

    public function getNextId(): int
    {

        if (!file_exists(DIR . 'data/indexes.json')) {
            $index = json_encode(['id' => 1,]);
            file_put_contents(DIR . 'data/indexes.json', $index);
        }

        $index = file_get_contents(DIR . 'data/indexes.json');
        $index = json_decode($index, 1);

        $id = (int) $index['id'];
        $index['id'] = $id + 1;

        $index = json_encode($index);
        file_put_contents(DIR . 'data/indexes.json', $index);
        return $id;
        _dd($id);
    }

    public  function getClient(int $id)
    {

        foreach ($this->data as $client) {
            if ($client->id == $id) {
                return $client;
            }
        }
        // return null;
    }

    public function createClient(Client $client): void
    {
        $id = $this->getNextId();
        $client->id =  $id;
        $this->data[] = $client;
        // $_SESSION['messages']['success'][] = "ACCOUNT was created!";
        $this->write($this->data);
    }

    public function add(object $updateClient)

    {
        foreach ($this->data as $key => $client) {
            if ($client->id == $updateClient->id) {
                // $client = ['id' => $id];
                $this->data[$key] = $updateClient;

                return;
            }
        }
    }
    // public function sendMoney(int $id, int $count)

    // {

    //     $client = $this->getClient($id);
    //     if (!$client) {
    //         return;
    //     }
    //     $client = ['id' => $id];
    //     $client['balance'] -= $count;

    //     if ($client['balance'] < 0) {
    //         $_SESSION['messages']['error'][] = "Account cannot be overdrafted";
    //         header('Location:' . URL . 'send');
    //     } else {
    //         $_SESSION['messages']['success'][] = "Well done - money sent!";
    //         header('Location:' . URL);
    //     }
    // }

    public function delete(int $id): void
    {

        foreach ($this->data as $key => $client) {
            if ($client->id == $id) { // ??
                unset($this->data[$key]);
                _dd($id);
                $this->data = array_values($this->data);
                return;
            }
        }
    }

    public function createID()
    {
        $idn = rand(6688, 7688);
        $firstNum = rand(3, 6);
        $d = (date("ymd"));
        $this->data[] = $firstNum . $d . $idn;
        return $firstNum . $d . $idn;
    }

    public function alert($alertMessage)
    {
        echo "<script>alert('$alertMessage');</script>";
    }
}