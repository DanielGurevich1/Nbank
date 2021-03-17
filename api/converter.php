<?php

function convertCurrency($amount, $from_currency, $to_currency)
{
    $apikey = '5e700b4723aef56b4027';
    $amount = $_GET['currency1'];
    $from_Currency = urlencode($from_currency);
    $to_Currency = urlencode($to_currency);
    $query =  "{$from_Currency}_{$to_Currency}";

    // change to the free URL if you're using the free version
    $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
    $obj = json_decode($json, true);

    $val = floatval($obj["$query"]);


    $total = $val * $amount;
    return number_format($total, 2, '.', '');
}

//uncomment to test
$rez = convertCurrency(10, 'USD', 'SEK');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert</title>
</head>

<body>
    <div class="container">


        <form action="" method="get">
            Euro <input type="text" name="currency1">
            <button type="submit">convert</button>
            SEK <input type="text" name="currency2" value="<?= $rez ?>">


        </form>
    </div>
</body>

</html>